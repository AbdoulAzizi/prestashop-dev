{extends file=$layout}

{block name='content'}
<section id="main" >
	<div class="container_1200">
		{block name='breadcrumb'}
		{include file='_partials/breadcrumb.tpl'}
		{/block}
		{block name='page_header_container'}
			{block name='page_header'}
				<h1 class="h1" itemprop="name"><span class="title_underlined">{l s='Documentation' d='Modules.CodiDocs.Admin'}</span></h1>
			{/block}
		{/block}
		<div class="product-container">
			{foreach $folders as $folder}
				<div class="">
					<div class="bloc-folder">
						{if $folder->name == 'Vidéos'}
							<div class="bloc-folder-picture">
								<a target="_blank" href="https://www.youtube.com/channel/UCjIH46oXXdPtAIEbwZ0ZilA"><img src="{$folder->ico}" /></a>
							</div>
							<h5 class="title-folder"><a target="_blank" href="https://www.youtube.com/channel/UCjIH46oXXdPtAIEbwZ0ZilA">{$folder->name}</a></h5>
						{else}
							<div class="bloc-folder-picture">
								<a href="{$folder->url}"><img src="{$folder->ico}" /></a>
							</div>
							<h5 class="title-folder"><a href="{$folder->url}">{$folder->name}</a></h5>
						{/if}
					</div>
				</div>
			{/foreach}
		</div>
	</div>
</section>
{/block}