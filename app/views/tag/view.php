    <div id="titulo">
    	<h2>        	
			<?php echo $conf["name"]; ?> / <a href="<?php echo $this->path; ?>">sabros.us lite</a><?php echo (!empty($tagtag)) ? " / {$tagtag}" : ""; ?>
		</h2>
        
		<p class="submenu_derecho">
			<?php  echo $this->html->linkTo($this->l10n->__("What is sabros.us lite?"), "index/what/", "title=\"".$this->l10n->__("What is sabros.us lite?")."\""); ?>
            |
            <?php
            if($this->session->check("logged") == true) {
                    echo $this->html->linkTo($this->l10n->__("Control panel"), "admin/", " title=\"".$this->l10n->__("Manage bookmarks")."\"");  
                } else {
                    echo $this->html->linkTo($this->l10n->__("Login"), "admin/login/", " title=\"".$this->l10n->__("Start session")."\"");
                }
            ?>
         </p>
	</div>

    <div id="contenido">
	
	<div id="indicador_pagina"><?php echo $this->l10n->__("There are") ?> <strong><?php echo $totalRows; ?></strong> <?php echo $this->l10n->__("links with the tag ") ?><strong><?php echo $tagtag; ?></strong><?php echo $this->l10n->__(". Showing from") ?> <strong><?php echo $from; ?></strong> <?php echo $this->l10n->__("to") ?> <strong><?php echo $to; ?></strong></div>
    
    <?php foreach ($links as $link) { ?>
        <div class="enlace">
			<h3>
            	<a href="<?php echo $link["url"]; ?>" title="<?php echo $link["title"]; ?>"><?php echo $link["title"]; ?></a>
<?php 			if($this->session->check("logged") == true) {
					echo " | ";
                	echo $this->ajax->linkToBox($this->l10n->__("Edit"), "admin/edit/".$link["id_link"]."/", " name=\"editlink-".$link["id_link"]."\"  title=\"".$this->l10n->__("Edit bookmark")."\"");
				} ?>
            </h3>
        	
            <p><? echo $link["description"]; ?></p>
            <p class="pie"><?php echo $this->html->image("tag.gif", $this->l10n->__("tags")); ?> 
			<?php $tags = explode(" ",$link["tags"]); foreach($tags as $tag){ ?>
				<span class="link_tags"><a href="<?php echo $this->path; ?>tag/<?php echo $tag; ?>/"><? echo $tag; ?></a></span> 
			<?php } ?>
			<?php echo $this->l10n->__("at");?> <? echo date($this->l10n->__("m.d.y"),strtotime($link["created"])); ?></p>
        </div>
    <?php } ?>     
<?php echo $pagination; ?>
    </div>
<?php echo $tagsCloud; ?>	

	<?php echo $this->renderElement("footer"); ?>