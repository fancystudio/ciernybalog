<?php
class Helper
{
	public function getPrice($prichod, $odchod, $dospeli, $deti, $lyoness){
		$begin = new DateTime( date("Y-m-d", strtotime($prichod)) );
		$end = new DateTime( date("Y-m-d", strtotime($odchod)) );
		$end->modify('+1 day');
		$interval = DateInterval::createFromDateString('1 day');
		$period = new DatePeriod($begin, $interval, $end);
		$totalPrice = 0;
		$totalDays = 0;
		$totalSpecialDays = 0;
		foreach ( $period as $dt ){
			if($dt->format( "n" ) == 12){
				if($dt->format( "j" ) > 22 && $dt->format( "j" ) < 28){ //vianoce
					$totalPrice += 340;
					$totalSpecialDays++;
				}
				if($dt->format( "j" ) > 28 && $dt->format( "j" ) <= 31){ //silvester
					$totalPrice += 550;
					$totalSpecialDays++;
				}
			}
			if($dt->format( "n" ) == 1 && $dt->format( "j" ) == 1){ //silvester
				$totalPrice += 550;
				$totalSpecialDays++;
			}
			if($dt->format( "n" ) == 4){
				if($dt->format( "j" ) > 2 && $dt->format( "j" ) < 7){ //velka noc 2015
					$totalPrice += 340;
					$totalSpecialDays++;
				}
			}
			$totalDays++;
		}
		$totalDays -= $totalSpecialDays;
		if($totalDays != 0){
			if(($dospeli + $deti) > 3){
				$totalPrice += ((($dospeli + $deti) * 10) * $totalDays);
			}else{
				$totalPrice += (60 * $totalDays);
			}
		}
		if($lyoness != ""){
			$totalWidth = $totalPrice;
			$totalPrice -= (7 / 100) * $totalPrice;
		}
		return $totalPrice;
	}
	public function sendMailToClient($prichod, $odchod, $dospeli, $deti, $lyoness, $email){
		$cisloObejdnavky = explode(' ',microtime());
		$mailMess = "Vážený klient,</br>";
		$mailMess .= "ďakujeme za Vašu objednávku pobytu na www.chataciernybalog.sk. Týmto e-mailom potvrdzujeme, </br>";
		$mailMess .= "že sme v poriadku prijali Vašu objednávku pobytu v termíne ".date("j.n.Y", strtotime($prichod))." - ".date("j.n.Y", strtotime($odchod))."</br>";
		$mailMess .= "a zasielame upresňujúce informácie.</br></br>";
		$mailMess .= "Objednávka č. ".$cisloObejdnavky[1]."</br></br>";
		$mailMess .= "Prijaté: ".date('j.n.Y')." o ".date("H:i")."</br></br>";
		$mailMess .= "Spôsob platby: prevod na BÚ</br>";
		$mailMess .= "Číslo bankového účtu: </br>";
		$mailMess .= "IBAN: SK8702000000002618976653</br>";
		$mailMess .= "BIC: SUBSKBX</br>";
		$mailMess .= "Bankový dom: Všeobecná úverová banka, a.s.</br>";
		$mailMess .= "VS: ".$cisloObejdnavky[1]."</br>";
		$mailMess .= "Cena celkom: ".$this->getPrice($prichod, $odchod, $dospeli, $deti, $lyoness)." eur bez DPH</br></br>";
		$mailMess .= "Prevádzkovateľ Chaty Čierny Balog:</br>";
		$mailMess .= "SIMARC, s.r.o.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IČO: 44 782 896</br>";
		$mailMess .= "Bieloruská 42&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DIC: 2022850665</br>";
		$mailMess .= "821 06 Bratislava</br></br>";
		$mailMess .= "Pre záväzné rezervovanie Vami zvoleného termínu je potrebné uhradiť sumu ".$this->getPrice($prichod, $odchod, $dospeli, $deti, $lyoness)." na vyššie</br>";
		$mailMess .= "uvedený bankový účet s uvedením variabilného symbolu do 3 pracovných dní odo dňa</br>";
		$mailMess .= "vygenerovania tohto emailu. Po tomto termíne bude Vami zvolený termín pobytu opäť</br>";
		$mailMess .= "uvoľnený pre ďalšie rezervácie.</br></br>";
		$mailMess .= "S priateľským pozdravom,</br>";
		$mailMess .= "Zákaznícky servis SIMARC, s.r.o.</br></br>";
		$mailMess .= "Tento email je generovaný automaticky, prosíme, neodpovedajte naň.";
		$subject = "chataciernybalog.sk - rezervácia pobytu";
		$toZakaznik = $email;
		$from = "mail@mail.sk";
		//mail($toZakaznik,$subject,$mailMess,"From:".$from." \r\nMIME-Version: 1.0\r\nContent-Type: text/html; charset=UTF-8\r\n");
		return $cisloObejdnavky[1];
	}
	public function sendMailToAdmin($meno, $adresa, $number, $email, $prichod, $odchod, $lyoness, $dospeli, $deti, $poznamka, $cisloObjednavky){
		$mailInfo = "<table>";
			$mailInfo .= "<tr>";
				$mailInfo .= "<td>";
				$mailInfo .=  "Meno";
				$mailInfo .= "</td>";
				$mailInfo .= "<td>";
				$mailInfo .=  $meno;
				$mailInfo .= "</td>";
			$mailInfo .= "</tr>";
			$mailInfo .= "<tr>";
				$mailInfo .= "<td>";
				$mailInfo .=  "Adresa";
				$mailInfo .= "</td>";
				$mailInfo .= "<td>";
				$mailInfo .=  $adresa;
				$mailInfo .= "</td>";
			$mailInfo .= "</tr>";
			$mailInfo .= "<tr>";
				$mailInfo .= "<td>";
				$mailInfo .=  "Tel. číslo";
				$mailInfo .= "</td>";
				$mailInfo .= "<td>";
				$mailInfo .=  $number;
				$mailInfo .= "</td>";
			$mailInfo .= "</tr>";
			$mailInfo .= "<tr>";
				$mailInfo .= "<td>";
				$mailInfo .=  "Číslo objednávky";
				$mailInfo .= "</td>";
				$mailInfo .= "<td>";
				$mailInfo .=  $cisloObjednavky;
				$mailInfo .= "</td>";
			$mailInfo .= "</tr>";
			$mailInfo .= "<tr>";
				$mailInfo .= "<td>";
				$mailInfo .=  "Email";
				$mailInfo .= "</td>";
				$mailInfo .= "<td>";
				$mailInfo .=  $email;
				$mailInfo .= "</td>";
			$mailInfo .= "</tr>";
			$mailInfo .= "<tr>";
				$mailInfo .= "<td>";
				$mailInfo .=  "Príchod";
				$mailInfo .= "</td>";
				$mailInfo .= "<td>";
				$mailInfo .=  $prichod;
				$mailInfo .= "</td>";
			$mailInfo .= "</tr>";
			$mailInfo .= "<tr>";
				$mailInfo .= "<td>";
				$mailInfo .=  "Odchod";
				$mailInfo .= "</td>";
				$mailInfo .= "<td>";
				$mailInfo .=  $odchod;
				$mailInfo .= "</td>";
			$mailInfo .= "</tr>";
			$mailInfo .= "<tr>";
				$mailInfo .= "<td>";
				$mailInfo .=  "Lyoness číslo";
				$mailInfo .= "</td>";
				$mailInfo .= "<td>";
				$mailInfo .=  $lyoness;
				$mailInfo .= "</td>";
			$mailInfo .= "</tr>";
			$mailInfo .= "<tr>";
				$mailInfo .= "<td>";
				$mailInfo .=  "Počet dospelých";
				$mailInfo .= "</td>";
				$mailInfo .= "<td>";
				$mailInfo .=  $dospeli;
				$mailInfo .= "</td>";
			$mailInfo .= "</tr>";
			$mailInfo .= "<tr>";
				$mailInfo .= "<td>";
				$mailInfo .=  "Počet detí";
				$mailInfo .= "</td>";
				$mailInfo .= "<td>";
				$mailInfo .=  $deti;
				$mailInfo .= "</td>";
			$mailInfo .= "</tr>";
			$mailInfo .= "<tr>";
				$mailInfo .= "<td>";
				$mailInfo .=  "Poznámka";
				$mailInfo .= "</td>";
				$mailInfo .= "<td>";
				$mailInfo .=  $poznamka;
				$mailInfo .= "</td>";
			$mailInfo .= "</tr>";
		$mailInfo .= "</table>";
		$subject = "chataciernybalog.sk - rezervácia pobytu";
		$toAdmin = "admin@mail.sk";
		$from = "mail@mail.sk";
		//mail($toAdmin,$subject,$mailInfo,"From:".$from." \r\nMIME-Version: 1.0\r\nContent-Type: text/html; charset=UTF-8\r\n");
	}
	public function sendMailFromKontakt($meno, $email, $message){
			$mailInfo = "<table>";
			$mailInfo .= "<tr>";
				$mailInfo .= "<td>";
				$mailInfo .=  "Meno";
				$mailInfo .= "</td>";
				$mailInfo .= "<td>";
				$mailInfo .=  $meno;
				$mailInfo .= "</td>";
			$mailInfo .= "</tr>";
			$mailInfo .= "<tr>";
				$mailInfo .= "<td>";
				$mailInfo .=  "Adresa";
				$mailInfo .= "</td>";
				$mailInfo .= "<td>";
				$mailInfo .=  $adresa;
				$mailInfo .= "</td>";
			$mailInfo .= "</tr>";
			$mailInfo .= "<tr>";
				$mailInfo .= "<td>";
				$mailInfo .=  "Tel. číslo";
				$mailInfo .= "</td>";
				$mailInfo .= "<td>";
				$mailInfo .=  $number;
				$mailInfo .= "</td>";
			$mailInfo .= "</tr>";
		$mailInfo .= "</table>";
		$subject = "chataciernybalog.sk - kontaktný formulár";
		$toAdmin = "admin@mail.sk";
		$from = "mail@mail.sk";
		//mail($toAdmin,$subject,$mailInfo,"From:".$from." \r\nMIME-Version: 1.0\r\nContent-Type: text/html; charset=UTF-8\r\n");
	
	}
}