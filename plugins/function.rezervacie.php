<?php
function smarty_function_rezervacie($params, &$template)
{
  	$db = cms_utils::get_db();
	$dates = array();
	$rs = $db->query("SELECT DATE_FORMAT(dtum,'%m/%d/%Y') AS datum FROM cms_module_obsadene_date where je_obsadene = 1");
	while ($arr = $rs->fetchRow()) {
	   $dates[] = $arr['datum'];
	}
	$gCms = cmsms();
	$contentops = $gCms->GetContentOperations();
	$smarty = $gCms->GetSmarty();
	$lang_parent = $smarty->get_template_vars('lang_parent');
	if($lang_parent == "SK"){
		$rezervacia = "Rezervácia";
	}else if($lang_parent == "EN"){
		$rezervacia = "Booking";
	}else if($lang_parent == "DE"){
		$rezervacia = "Buchung";
	}else if($lang_parent == "FR"){
		$rezervacia = "Réservation";
	}
	?>
	<script>
	var reservedDays=<?php echo "['".implode("','",$dates)."']"?>;
	var daysBetweenSelected = [];
	var lyonessValue = "nie";
	var typingTimer;
	var doneTypingInterval = 500;
	var today = new Date();
	var add14DaysFromNow = new Date();
	var add19DaysFromNow = new Date();
	add14DaysFromNow.setDate(today.getDate()+14);
	add19DaysFromNow.setDate(today.getDate()+19);
	$(document).ready(function(){
		createDatepickers(reservedDays, add14DaysFromNow, add19DaysFromNow, false);
		$(".pocetDospelychSelect,.pocetDetiSelect").change(function(){
			calculatePriceIsValid(lyonessValue);
		});
		$('.cislo-ly input').keyup(function(){
		    clearTimeout(typingTimer);
		    typingTimer = setTimeout(function(){calculatePriceIsValid(lyonessValue)}, doneTypingInterval);
		});
		$('.cislo-ly input').keydown(function(){
		    clearTimeout(typingTimer);
		});
		$(".buttonRezervovat").click(function(){
			if(!$(this).hasClass("inactive")){
				validateFields(lyonessValue);
			}
		});
		$(".lyoness .btn-primary").click(function() {
			lyonessValue = $("input:radio[name=options]",this).val();
			if(lyonessValue == "ano"){
				$(".cislo-ly").show();
			}else{
				$(".cislo-ly").hide();
			}
			calculatePriceIsValid(lyonessValue);
		});
		if(window.location.hash == '#rezervacia'){
	        $("#myModal").modal('show');
	    }
	    $(".rezervacia").click(function(){
	        window.location.hash = 'rezervacia';
	    });
	    $('#myModal').on('hidden.bs.modal', function () {
	        window.location.hash = '';
	        history.pushState('', document.title, window.location.pathname);
	    });
	});
	</script>
	
	<div class="modal fade rezervacia-formular" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel"><?php echo $rezervacia?></h4>
	      </div>
	      <div class="modal-body">
	 
	 <form action="#" method="post" class="form-horizontal">     
	      <div class="form-group">
	
	    <div class="col-sm-6 rezervacia-form menoAPriezviskoClass">
	        <label for="meno-a-priezvisko">Meno a Priezvisko</label>
	        <input class="form-control" size="30" type="text" />
	        <label class="error">vyplnťe pole</label>
	    </div>
	    
	    <div class="col-sm-6 rezervacia-form adresaClass">
	        <label for="user_login">Adresa trvalého alebo súčasného pobytu</label>
	        <input class="form-control" size="30" type="text" />
	        <label class="error">vyplnťe pole</label>
	    </div>
	    
	    <div style="clear:both"></div>
	    
	    <div class="col-sm-6 rezervacia-form telefonClass">
	        <label for="user_login">Tel. číslo</label>
	        <input class="form-control" size="30" type="text" />
	        <label class="error">pole nie je vyplnené, alebo je vyplnené nesprávne</label>
	    </div>
	    
	    <div class="col-sm-6 rezervacia-form emailClass">
	        <label for="user_login">E-mail</label>
	        <input class="form-control" size="30" type="text" />
	        <label class="error">pole nie je vyplnené, alebo je vyplnené nesprávne</label>
	    </div>
	    
	    <div style="clear:both"></div>
	    
	    <div class="col-sm-6 rezervacia-form pocetDospelychClass">
	        <label for="user_login">Počet dospelých</label>
	  <select name="pocetDospelych" class="pocetDospelychSelect selectpicker form-control">
	    <option value="0">O</option>
	    <option value="1">1</option>
	    <option value="2">2</option>
	    <option value="3">3</option>
	    <option value="4">4</option>
	    <option value="5">5</option>
	    <option value="6">6</option>
	    <option value="7">7</option>
	    <option value="8">8</option>
	  </select>
	  <label class="error">vyplnťe pole</label>
	    </div>
	    
	        <div class="col-sm-6 rezervacia-form pocetDetiClass">
	        <label for="user_login">Počet detí</label>
	  <select name="pocetDeti" class="pocetDetiSelect selectpicker form-control">
	    <option value="0">O</option>
	    <option value="1">1</option>
	    <option value="2">2</option>
	    <option value="3">3</option>
	    <option value="4">4</option>
	    <option value="5">5</option>
	    <option value="6">6</option>
	    <option value="7">7</option>
	    <option value="8">8</option>
	  </select>
	    </div>
	    
	    <div style="clear:both"></div>
	    
	    
	    <div class="col-md-6 lyoness rezervacia-form">
			<label>Lyoness Karta</label>
	  		
	<div class="btn-group pull-right" data-toggle="buttons">
	  <label class="btn btn-primary ch-l">
	    <input type="radio" name="options" id="option1" value="ano"> Áno
	  </label>
	  <label class="btn btn-primary active ch-l">
	    <input type="radio" name="options" id="option2" checked="checked" value="nie"> Nie
	  </label>
	
	</div>	
	  		<!--<label class="radio-inline">
	          <input name="radioGroup" id="radio1" value="option1" type="radio"> Áno
	        </label>
	        <label class="radio-inline">
	          <input name="radioGroup" id="radio2" value="option2" type="radio" checked=""> Nie
	        </label>  -->      
	  	</div>    
	  	
	<div style="clear: both"></div> 
	    <div class="col-sm-6 cislo-ly">
	        
	        <input class="form-control" size="30" type="text" placeholder="číslo Lyoness karty"/>
	        <label class="error">zadajte číslo karty</label>
	    </div>  	
	  	
	  	
	  	    
	<div style="clear: both"></div>
	 
	 <div class="col-sm-6 rezervacia-form prichodClass">
	        <label for="prichod">Dátum príchodu:</label> 
	        <div id="prichod"></div>
	        <label class="error"></label>
	</div>
	
	 <div class="col-sm-6 rezervacia-form odchodClass">
	        <label for="prichod">Dátum odchodu:</label> 
	        <div id="odchod"></div>
	        <label class="error"></label>
	</div>
	<div style="clear: both"></div>
	<br><br>
	
	<div class="col-md-12 poznamkaClass">
	<label for="prichod">Poznámka:</label> 
	<textarea class="form-control" rows="3"></textarea>
	</div>
	<div style="clear: both"></div>
	
	
	
	</div>
	
	<div class="well well-sm">
		suma rezervácie: <span class="suma price">0.00€</span>
	</div>
	<div class="alert alert-danger"> Pre výpočet ceny zadajte dátum rezervácie a počet osôb</div>
	 </form>       
	        
	        
	        
	        
	      </div>
	      <div class="reservationStatus" style="display:none"></div>
	      <div class="modal-footer">
	<div class="col-md-10 pull-left privacy-ag">
	  <div class="panel panel-default">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
	          Súhlas so spracovaním osobných údajov
	        </a>
	        
	        
	      
	      <input type="checkbox" class="check-privacy"> 
	    <label class="privacyError error" style="margin-left:15px">musíte súhlasiť so spracovaním os. údajov</label>
	        
	      </h4>
	    </div>
	   
	    <div id="collapseOne" class="panel-collapse collapse out">
	      <div class="panel-body">
	        Prehlasujem, že mám minimálne 18 rokov. Súhlasím so správou, spracovaním a uchovaním mojich osobných údajov v spoločnosti SIMARC, s.r.o., ktorá je prevádzkovateľom objektu Chata Čierny Balog. Vyhlasujem, že všetky uvedené informácie sú pravdivé, úplné a poskytnutie údajov je dobrovoľné a bez dôsledkov s tým, že tieto údaje môžu byť spracované na marketingové účely. Súhlas je daný na dobu neurčitú a podľa §20 odst.3 cit. zákona je ho možné kedykoľvek písomne odvolať v lehote do 30 dní. Som si vedomý/á, že v prípade potvrdenia klamlivých informácií alebo v prípade vzniknutých problémov, bude bezodkladne a natrvalo ukončená spolupráca, údaje budú zmazané a uhradím vzniknuté škody.
	      </div>
	    </div>
	  </div>
	</div>
	        <button type="button" class="btn-lg btn-primary buttonRezervovat ">Rezervovať</button>
	        <button type="button" class="btn-lg btn-primary zavrietrezervacia " data-dismiss="modal">Zavrieť</button>
	      </div>
	    </div>
	  </div>
	</div>
	<?php
}
?>
