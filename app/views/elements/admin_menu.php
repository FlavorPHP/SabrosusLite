	<div id="titulo">
    	<h2>
			<?php echo $conf["name"]; ?> / <a href="<?php echo $this->path; ?>">sabros.us lite</a><?php echo (!empty($tagtag)) ? " / {$tagtag}" : ""; ?>
		</h2>
        <ul id="submenu">
        	<li><?php echo $this->html->linkTo($this->l10n->__("Manage bookmarks"), "admin/", " title=\"".$this->l10n->__("Manage your bookmarks")."\""); ?></li>
			<li><?php echo $this->html->linkTo($this->l10n->__("Add bookmark"), "admin/add/", " title=\"".$this->l10n->__("Add a new bookmark")."\""); ?></li>
            <li><?php echo $this->html->linkTo($this->l10n->__("Configuration"), "admin/configuration/", " title=\"".$this->l10n->__("Change the configuration")."\""); ?></li>
		</ul>
        <ul id="submenu_derecho">
        	<li><?php echo $this->html->linkTo($this->l10n->__("Logout"), "admin/logout/", " title=\"".$this->l10n->__("Logout from the system")."\""); ?></li>
        	<li><?php echo $this->html->linkTo($this->l10n->__("Home"), "", " title=\"".$this->l10n->__("Go to home")."\""); ?></li>
	    </ul>
    
    </div>