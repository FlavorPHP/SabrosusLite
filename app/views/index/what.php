	<div id="titulo">
    	<h2>        	
			<?php echo $conf["name"]; ?> / <a href="<?php echo $this->path; ?>">sabros.us lite</a><?php echo (!empty($tagtag)) ? " / {$tagtag}" : ""; ?>
		</h2>
        
		<ul id="submenu">
			<li><?php  echo $this->html->linkTo($this->l10n->__("Home"), "", "title=\"".$this->l10n->__("Go to home")."\""); ?></li>
         </ul>
         <ul id="submenu_derecho">
        	<li><?php
            if($this->session->check("logged") == true) {
                    echo $this->html->linkTo($this->l10n->__("Control panel"), "admin/", " title=\"".$this->l10n->__("Manage bookmarks")."\"");  
                } else {
                    echo $this->html->linkTo($this->l10n->__("Login"), "admin/login/", " title=\"".$this->l10n->__("Start session")."\"");
                }
            ?></li> 
         </ul>
	</div>
	
	<?php 
		$search = array("Pedro Santana","Victor Bracco","flavor.fwk");
		$replace = array("<a href=\"http://www.pecesama.net\">Pedro Santana</a>","<a href=\"http://www.vbracco.com.ar\">Victor Bracco</a>","<a href=\"#\">flavor.fwk</a>");
	?>
    <div id="contenido">
		<p><?php echo $this->l10n->__("sabros.us is a web-based bookmarking system to organize your bookmarks on your website. It is similar to del.icio.us in that you can manage your bookmarks online, but with sabros.us you can do it on your own website.");?></p>
		<p>&nbsp;</p>
		<p><?php echo str_ireplace($search,$replace,$this->l10n->__("sabros.us lite is a parallel project created by Pedro Santana and Victor Bracco that arose with the need to show the power and versatility of flavor.fwk")); ?></p>
		<p>&nbsp;</p>
    </div>

	<?php echo $this->renderElement("footer"); ?>
	