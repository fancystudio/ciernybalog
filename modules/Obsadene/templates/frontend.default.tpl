{if isset($Obsadene)}
<ul>
	{foreach from=$Obsadene item=item}
	<li><a href="{{Obsadene action="url_for" maction="detail" item_id=$item->getId() detailpage=$detailpage title=$item->title}}">{$item->title}</a></li>
	{/foreach}
</ul>
{/if}