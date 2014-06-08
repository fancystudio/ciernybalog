{if isset($form)}
	<div style="color: red;">{$form->showErrors()}</div>
	{$form->getHeaders()}
	<p style="text-align: right;">
		{$form->getButtons()}
	</p>
<style type="text/css">
.specialDate { background-color: #6F0 !important; }
</style>	
<script type="text/javascript">
{literal}
	var datesArray={/literal}{$dates}{literal};
  jQuery(function($) {
	  	$( "<input type='text' id='datepicker'>" ).appendTo( ".formfield:eq(1)" );
	  	$("#datepicker").datepicker({ 
	  		dateFormat: "dd.mm.yy",
			beforeShowDay: function (date) {
			datum = $.datepicker.formatDate('mm/dd/yy', date);
			return [true,$.inArray(datum, datesArray) >=0 ? "specialDate":''];
			},
			onSelect: function(dateText) {
				selectedDate = $( "#datepicker" ).datepicker( "getDate" );
				$(".selectDen").val(selectedDate.getDate());
				$(".selectMesiac").val(selectedDate.getMonth()+1);
				$(".selectRok").val(selectedDate.getFullYear());
				$.ajax({
					type: "POST",
					url: "../lib/dateChecker.php",
					data: {
						dateChecker : true,
						day : selectedDate.getDate(),
						month : selectedDate.getMonth()+1,
						year : selectedDate.getFullYear()
					},
					success: function(response)
					{
						if(response.status == 'success'){
							$("#struc-default input[type=checkbox]").prop('checked', ((response.osadene == 1) ? true: false));
						}else{
							alert("Chyba pri zvolení dátumu");
						}	
					},
					error: function(response)
					{
						alert("Chyba pri odoslaní objednávky");
					}
				});
			}
		});
	  	$( "#datepicker" ).datepicker( "setDate", {/literal}{$defaultDate}{literal} );
		$( "#structure" ).tabs();
		$(".selectRok,.selectMesiac,.selectDen").change(function(){
			$.ajax({
				type: "POST",
				url: "../lib/dateChecker.php",
				data: {
					dateChecker : true,
					day : $(".selectDen").val(),
					month : $(".selectMesiac").val(),
					year : $(".selectRok").val()
				},
				success: function(response)
				{
					if(response.status == 'success'){
						$("#struc-default input[type=checkbox]").prop('checked', ((response.osadene == 1) ? true: false));
					}else{
						alert("Chyba pri zvolení dátumu");
					}	
				},
				error: function(response)
				{
					alert("Chyba pri odoslaní objednávky");
				}
			});
		});			
    });  
{/literal}
</script>

	
	<div id="structure" style="margin-bottom: 7px;">
	<ul>
				<li><a href="{$request_uri}#struc-default">Main</a></li>
				{foreach from=$submodules item=module}
		<li{if $tab == $module.gname} class="ui-tabs-selected ui-state-active"{/if}><a href="{$request_uri}#struc-{$module.gname}">{$module.name}</a></li>
		{/foreach}
		{if $xtended_form != ''}
		<li{if $tab == 'related'} class="ui-tabs-selected ui-state-active"{/if}><a href="{$request_uri}#struc-related">Related items</a></li>
    {/if}
    <li><a href="{$request_uri}#module---options">Options</a></li>
	</ul>

			<div id="struc-default">
					{$form->renderFieldset('default---default','<div class="formfield">
					<div class="pagetext">%LABEL%:</div>
					<div class="pageinput">%INPUT% <em>%TIPS%</em></div>
					<div class="pageinput" style="color: red;">%ERRORS%</div>
			</div>')}
			
				</div>
	{foreach from=$submodules item=module}
	  <div id="struc-{$module.gname}">
    			{$module.template}
    			<p>{if $module.add_item_link}{$module.add_item_icon} {$module.add_item_link}{else}<em>First click on "Save &amp; continue editing" to be able to add {$module.name} items.</em>{/if}</p>
	  </div>
	{/foreach}
	{if $xtended_form != ''}
	<div id="struc-related">
	  {$xtended_form}
	</div>
	{/if}	
	
	<div id="module---options">
	  {$form->renderFieldset('module---options','<div class="formfield">
				<div class="pagetext">%LABEL%:</div>
				<div class="pageinput">%INPUT% <em>%TIPS%</em></div>
				<div class="pageinput" style="color: red;">%ERRORS%</div>
		</div>')}
	</div>
	</div>
	
	{$form->renderFieldsets('<div class="formfield">
		<div class="pagetext">%LABEL%:</div>
		<div class="pageinput">%INPUT% <em>%TIPS%</em></div>
		<div class="pageinput" style="color: red;">%ERRORS%</div>
	</div>')}
	{$form->showWidgets('<div class="formfield">
		<div class="pagetext">%LABEL%:</div>	
		<div class="pageinput">%INPUT% <em>%TIPS%</em></div>
		<div class="pageinput" style="color: red;">%ERRORS%</div>
	</div>')}

	<p style="text-align: right; margin-top: 15px;">
		{$form->getButtons()}
	</p>
	{$form->getFooters()}
{/if}