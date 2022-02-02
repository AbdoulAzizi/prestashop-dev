{extends file=$layout}

{block name='content'}
<section id="main" >

<div class="container_1200">
	{block name='breadcrumb'}
      {include file='_partials/breadcrumb.tpl'}
    {/block}
	{block name='page_header_container'}
		{block name='page_header'}
			<h1 class="h1" itemprop="name"><span class="title_underlined">{$folder->name}</span></h1>
		{/block}
	{/block}
	<div class="row product-container-files">
		<div class="col-xl-4 col-md-12">
			<span>{l s='CATÉGORIE' d='Modules.CodiDocs.Admin'}</span>
			<span>{l s='TÉLÉCHARGER' d='Modules.CodiDocs.Admin'}</span>
		</div>
		<div class="col-xl-4 col-md-12">
			<span>{l s='CATÉGORIE' d='Modules.CodiDocs.Admin'}</span>
			<span>{l s='TÉLÉCHARGER' d='Modules.CodiDocs.Admin'}</span>
		</div>
		<div class="col-xl-4 col-md-12">
			<span>{l s='CATÉGORIE' d='Modules.CodiDocs.Admin'}</span>
			<span>{l s='TÉLÉCHARGER' d='Modules.CodiDocs.Admin'}</span>
		</div>
		{foreach $files as $file}
			<div class="col-xl-4 col-md-12">
				<div class="bloc-file">
					<div><img src="/themes/codigel-classic-child/assets/img/doc_icon.png" />{$file->name}</div>
					<div>
						<p class="bloc-folder-content">
							<a href="{$file->url}" class="bloc-folder-picture-link" download><img src="/modules/codidocs/picto/download_icon.png" class="bloc-folder-picture" /></a>
							<a  class="bloc-file-name" href="{$file->url}" download></a>
						</p>
					</div>
				</div>
			</div>
		{/foreach}
	</div>
</div>
{/block}