<style type="text/css">
	.menoKontaktClass .error,.emailKontaktClass .error,.messKontaktClass .error{display:none;}
</style>
<script type="text/javascript">
var kontaktSend = false;
$(document).ready(function(){
	$(".kontaktSend").click(function(){
		if(!kontaktSend){
			if(validateFieldsKontakt()){
				kontaktSend = true;
			}
		}
	});
});
</script>
<form action="#" method="get">
<div class="col-md-8">
	<div class="col-md-6 kontakt-form menoKontaktClass"><label for="meno">Vaše meno:</label> 
		<input class="form-control" type="text" size="30" /> <label class="error">vyplnťe pole</label>
	</div>
	
	<div class="col-md-6 kontakt-form emailKontaktClass"><label for="email">Váš e-mail:</label> 
		<input class="form-control" type="text" size="30" /> <label class="error">pole nie je vyplnené, alebo je vyplnené nesprávne</label>
	</div>
	<div class="col-md-12 kontakt-form vasa-sprava messKontaktClass"><label for="mess">Vaša správa:</label> 
		<textarea class="form-control" rows="9"></textarea> <label class="error">vyplnťe pole</label>
	</div>
	
	<div class="col-md-12">
	<p></p>
	<div class="kontaktSendStatus"></div>
	<button type="button" class="btn-default btn-primary pull-right kontaktSend">Odoslať</button>
	</div>
</div>
</form>
<div class="col-md-3 col-md-offset-1 kontakt-info">
	<p></p>
	<img class="logo-kontakt" src="img/logo-kontakt.png"/>
	<span class="kontakt-separator"></span>
	<p><strong>SIMARC, s.r.o.</strong><br /> Bieloruská 42<br /> Bratislava 821 06</p>
	<p>IČO: 44 782 896<br /> DIC: 20228506653<br /> IČ DPH: SK20228506653</p>
	<p>tel:<br /> e-mail:</p>
</div>