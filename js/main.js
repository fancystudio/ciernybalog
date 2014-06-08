// Activates the Carousel
$(function() {
	var selectBox = $(".lang").selectBoxIt();
});

$('.carousel').carousel({
  interval: 5000
});
function createDatepickers(reservedDays, startSelectedDay, finishSelectedDay, refresh){
	if(refresh){
		$("#prichod").datepicker("destroy");
		$("#odchod").datepicker("destroy");
	}
	$('#prichod').datepicker({
		inline: true,
		defaultDate: startSelectedDay,
		showOtherMonths: true,
		monthNames: [ "Január", "Február", "Marec", "Apríl", "Máj", "Jún", "Júl", "August", "September", "Október", "November", "December" ],
		beforeShowDay: function (date) {
			datum = $.datepicker.formatDate('mm/dd/yy', date);
			return [true,$.inArray(datum, reservedDays) >=0 ? "specialDate":''];
		},
		onSelect: function(dateText) {
			calculatePriceIsValid(lyonessValue);
	  	}
	});
	$('#odchod').datepicker({
		inline: true,
		defaultDate: finishSelectedDay,
		showOtherMonths: true,
		monthNames: [ "Január", "Február", "Marec", "Apríl", "Máj", "Jún", "Júl", "August", "September", "Október", "November", "December" ],
		beforeShowDay: function (date) {
			datum = $.datepicker.formatDate('mm/dd/yy', date);
			return [true,$.inArray(datum, reservedDays) >=0 ? "specialDate":''];
		},
		onSelect: function(dateText) {
			calculatePriceIsValid(lyonessValue);
	  	}
	});
	if(refresh){
		$( "#prichod" ).datepicker("refresh");
		$( "#odchod" ).datepicker("refresh");
	}
}
function checkIfselectedDateIsValid(prichod, odchod){
	isOk = true;
	var today = new Date();
	var plusTwoWeeks = new Date();
	plusTwoWeeks.setDate(today.getDate()+13);
	if(prichod < plusTwoWeeks){
		$(".prichodClass .error").html("dátum príchodu musí byť neskorší ako 14 dní od dnešného dátumu");
		return false;
		isOk = false;
	}
	if(prichod >= odchod){
		$(".prichodClass .error").html("dátum odchodu musí byť vačší ako dátum príchodu");
		return false;
		isOk = false;
	}
	if(prichod < odchod){
		jeObsadene = false;
		start = prichod;
	    end = odchod;
	    currentDate = new Date(start);
		while (currentDate <= end) {
			datum = $.datepicker.formatDate('mm/dd/yy', currentDate);
			if($.inArray(datum, reservedDays) >= 0){
				jeObsadene = true;
			}
		    currentDate.setDate(currentDate.getDate() + 1);
		}
		if(jeObsadene){
			$(".prichodClass .error").html("vo zvolenom časovom intervale sa už nachádza rezervovaný termín");
			return false;
			isOk = false;
		}
	}
	if(isOk){
		$(".prichodClass .error").html("");
		return true;
	}
}
function validateFields(lyonessValue){
	menoIsFilled = isFilled($(".menoAPriezviskoClass .form-control"),$(".menoAPriezviskoClass .error"));
	adresaIsFilled = isFilled($(".adresaClass .form-control"),$(".adresaClass .error"));
	numberIsValid = isFilled($(".telefonClass .form-control"),$(".telefonClass .error")) && isNumber($(".telefonClass .form-control").val(),".telefonClass .error");
	emailIsValid = isValidEmailAddress($(".emailClass .form-control").val(),".emailClass .error");
	dateIsValid = checkIfselectedDateIsValid($( "#prichod" ).datepicker( "getDate" ),$( "#odchod" ).datepicker( "getDate" ));
	checkPrivacyIsValid = isPrivacyChecked($('.check-privacy').is(':checked'),".privacyError");
	lyonessIsValid = isLionessValid(lyonessValue,$(".cislo-ly .form-control"),$(".cislo-ly .error"));
	pocetDospelychClass = pocetOsobIsValid($('.pocetDospelychSelect option:selected').val() > 0, ".pocetDospelychClass .error");
	if(menoIsFilled && adresaIsFilled && numberIsValid && emailIsValid && dateIsValid
			&& checkPrivacyIsValid && lyonessIsValid && pocetDospelychClass){
		sendMailAndReserve(lyonessValue);
	}	
}
function validateFieldsKontakt(){
	menoIsFilled = isFilled($(".menoKontaktClass .form-control"),$(".menoKontaktClass .error"));
	emailIsValid = isValidEmailAddress($(".emailKontaktClass .form-control").val(),".emailKontaktClass .error");
	messIsFilled = isFilled($(".messKontaktClass .form-control"),$(".messKontaktClass .error"));
	if(menoIsFilled && emailIsValid && messIsFilled){
		sendMailFromKontakt();
		return true;
	}	
	return false;
}
function sendMailAndReserve(lyonessValue){
	$.ajax({
		type: "POST",
		url: "lib/sendMailAndReserve.php",
		data: {
			meno: $(".menoAPriezviskoClass .form-control").val(),
			adresa: $(".adresaClass .form-control").val(),
			number: $(".telefonClass .form-control").val(),
			email: $(".emailClass .form-control").val(),
			prichod: $( "#prichod" ).datepicker( "getDate" ),
			odchod: $( "#odchod" ).datepicker( "getDate" ),
			lyoness: ((lyonessValue == "ano") ? $(".cislo-ly .form-control").val() : ""),
			dospeli: $('.pocetDospelychSelect option:selected').val(),
			deti: $('.pocetDetiSelect option:selected').val(),
			poznamka : $('.poznamkaClass .form-control').val()
		},
		beforeSend: function() 
		{
			//sem dat gifko
		},
		success: function(response)
		{
			if(response.status == 'success'){
				$(".modal-body").fadeOut('slow');
				$(".privacy-ag,.buttonRezervovat").fadeOut('slow', function(){
					$(".reservationStatus").show();
					$(".reservationStatus").html("Rezervácia prebehla úspešne").addClass("alert").addClass("alert-success");
					$(".zavrietrezervacia").fadeIn();
				});
			}else{
				$(".modal-body").fadeOut('slow');
				$(".privacy-ag,.buttonRezervovat").fadeOut('slow', function(){
					$(".reservationStatus").show();
					$(".reservationStatus").html("Rezervácia prebehla úspešne").addClass("alert").addClass("alert-danger");
					$(".zavrietrezervacia").fadeIn();
				});
			}     
		},
		error: function(response)
		{
			$(".modal-body").fadeOut('slow');
			$(".privacy-ag,.buttonRezervovat").fadeOut('slow', function(){
				$(".reservationStatus").show();
				$(".reservationStatus").html("Rezervácia prebehla úspešne").addClass("alert").addClass("alert-danger");
				$(".zavrietrezervacia").fadeIn();
			});
		}
	});
}
function sendMailFromKontakt(){
	$.ajax({
		type: "POST",
		url: "lib/sendMailFromKontakt.php",
		data: {
			meno: $(".menoKontaktClass .form-control").val(),
			email: $(".emailKontaktClass .form-control").val(),
			message: $(".messKontaktClass .form-control").val()
		},
		beforeSend: function() 
		{
			//sem dat gifko
		},
		success: function(response)
		{
			if(response.status == 'success'){
				$(".kontaktSendStatus").html("Správa úspešne odoslaná").addClass("alert").addClass("alert-success");
			}else{
				$(".kontaktSendStatus").html("Správa nebola odoslaná").addClass("alert").addClass("alert-danger");
			}     
		},
		error: function(response)
		{
			$(".kontaktSendStatus").html("Správa nebola odoslaná").addClass("alert").addClass("alert-danger");
		}
	});
}
function computePrice(prichod, odchod, pocetDospelych, pocetDeti, lyonessValue, cisloLy){
	console.log(lyonessValue);
	console.log(cisloLy);
	$.ajax({
		type: "POST",
		url: "lib/computePrice.php",
		data: {
			prichod: $( "#prichod" ).datepicker( "getDate" ),
			odchod: $( "#odchod" ).datepicker( "getDate" ),
			lyoness: ((lyonessValue == "ano") ? cisloLy : ""),
			dospeli: $('.pocetDospelychSelect option:selected').val(),
			deti: $('.pocetDetiSelect option:selected').val(),
			
		},
		beforeSend: function() 
		{
			//sem dat gifko
		},
		success: function(response)
		{
			console.log(response.price);    
			$(".suma.price").html(response.price + " €");
		},
		error: function(response)
		{
			alert("Nevypocitane");
		}
	});
}
function isFilled(object,errorClass){
	if($(object).val() == ""){
		$(errorClass).show();
		return false;
	}else{
		$(errorClass).hide();
		return true;
	}
}
function isNumber(value,errorClass) {
	if ((undefined === value) || (null === value)) {
		$(errorClass).show();
        return false;
    }
    if (typeof value == 'number') {
    	$(errorClass).hide();
        return true;
    }
    if(!isNaN(value - 0)){
    	$(errorClass).hide();
    }else{
    	$(errorClass).show();
    }
    return !isNaN(value - 0);
}
function isValidEmailAddress(emailAddress,errorClass) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    if(pattern.test(emailAddress)){
    	$(errorClass).hide();
    }else{
    	$(errorClass).show();
    }
    return pattern.test(emailAddress);
}
function isPrivacyChecked(isChecked,errorClass){
	if($('.check-privacy').is(':checked')){
		$(errorClass).hide();
	}else{
		$(errorClass).show();
	}
	return $('.check-privacy').is(':checked');
}
function isLionessValid(lyonessValue,value,errorClass){
	if(lyonessValue == "nie"){
		return true;
	}else{
		return isFilled(value,errorClass);
	}
}
function pocetOsobIsValid(isNotZero, errorClass){
	if(isNotZero){
		$(errorClass).hide();
		return true;
	}else{
		$(errorClass).show();
		return false;
	}
}
function calculatePriceIsValid(lyonessValue) {
    if(checkIfselectedDateIsValid($( "#prichod" ).datepicker( "getDate" ),$( "#odchod" ).datepicker( "getDate" ))
			&& $('.pocetDospelychSelect option:selected').val() > 0){
			computePrice($( "#prichod" ).datepicker( "getDate" ),
				$( "#odchod" ).datepicker( "getDate" ),
				$('.pocetDospelychSelect option:selected').val(),
				$('.pocetDetiSelect option:selected').val(),
				lyonessValue,
				$(".cislo-ly .form-control").val()
			);
	}else{
		$(".suma.price").html("0.00€");
	}
}