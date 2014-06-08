{if isset($Obsadene)}

    <div class="mcf_obsadene">
        <h2>{$Obsadene->title}</h2>

                        {if $Obsadene->dtum ne ''}
        <p><strong>Dátum:</strong>
                        {$Obsadene->dtum}
                    </p>
        {/if}
                                {if $Obsadene->je_obsadene ne ''}
        <p><strong>je obsadene:</strong>
                        {$Obsadene->je_obsadene}
                    </p>
        {/if}
                    </div>

    {* Call child modules *}

    
    {* Call ModuleXtender items *}

    {if isset($Obsadene->xtended_felist)}
        <div class="mcf_modulextender">
            {if $Obsadene->xtended_felist->documents|@count gt 0}
                <ul class="mx_documents">
                    {foreach from=$Obsadene->xtended_felist->documents item=document}
                        <li>
                            <img src="{$document->getIcon()}" align="absmiddle"/>
                            <a href="{$document->getDocumentUrl()}" rel="external">
                                {if $document->getTitle() ne ''}{$document->getTitle()}{else}{$document->getFilename()}{/if}
                            </a> ({$document->getSize(true)})
                        </li>
                    {/foreach}
                </ul>
            {/if}

            {if $Obsadene->xtended_felist->images|@count gt 0}
                <ul class="mx_images">
                    {foreach from=$Obsadene->xtended_felist->images item=image}
                        <li><a href="{$image->url}" rel="external">
                                <img src="{$image->resized_images.thumbnail}"/>
                            </a></li>
                    {/foreach}
                </ul>
            {/if}

            {if $Obsadene->xtended_felist->links|@count gt 0}
                <ul class="mx_links">
                    {foreach from=$Obsadene->xtended_felist->links item=link}
                        <li><a href="{$link->url}"{if $link->is_new_window == 1} rel="external"{/if}>
                                {if $link->title ne ''}{$link->title}{else}{$link->url}{/if}
                            </a></li>
                    {/foreach}
                </ul>
            {/if}

            {if $Obsadene->xtended_felist->categories|@count gt 0}
                <ul class="mx_categories">
                    {foreach from=$Obsadene->xtended_felist->categories item=options key=category}
                        <li><strong>{$category}</strong>
                            <ul>
                                {foreach from=$options item=option}
                                    <li>{$option->getTitle()}</li>
                                {/foreach}
                            </ul>
                        </li>
                    {/foreach}
                </ul>
            {/if}

            {* FEATURE DISABLED BY DEFAULT (REMOVE SMARTY COMMENTS TO MAKE IT WORK)}
            {if $Obsadene->xtended_felist->pages|@count gt 0}
            <ul class="mx_pages">
                {foreach from=$Obsadene->xtended_felist->pages item=page}
                <li>{cms_selflink page=$page->alias}</li>
                {/foreach}
            </ul>
            {/if}
            {**}

            {* FEATURE DISABLED BY DEFAULT (REMOVE SMARTY COMMENTS TO MAKE IT WORK)}
            {if $Obsadene->xtended_felist->modules|@count gt 0}
            <ul class="mx_modules">
                {foreach from=$Obsadene->xtended_felist->modules item=module}
                <li><a href="{cms_module module=$module->getModuleName() item_id=$module->getId() action="geturl" urlaction="detail"}">{$module->getTitle()}</a></li>
                {/foreach}
            </ul>
            {/if}
            {**}

            {* FEATURE DISABLED BY DEFAULT (REMOVE SMARTY COMMENTS TO MAKE IT WORK)}
            {if $Obsadene->xtended_felist->target_modules|@count gt 0}
            <ul class="mx_target_modules">
                {foreach from=$Obsadene->xtended_felist->target_modules item=module}
                <li><a href="{cms_module module=$module->getModuleName() item_id=$module->getId() action="geturl" urlaction="detail"}">{$module->getTitle()}</a></li>
                {/foreach}
            </ul>
            {/if}
            {**}

        </div>
    {/if}
{/if}