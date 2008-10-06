	<div id="titulo">
    	<h2>        	
			<?php echo $conf["name"]; ?> / <a href="<?php echo $this->path; ?>">sabros.us lite</a><?php echo (!empty($tagtag)) ? " / {$tagtag}" : ""; ?>
		</h2>
        
		<ul id="submenu">
			<li><?php  echo $this->html->linkTo($this->l10n->__("Home"), "", " title=\"".$this->l10n->__("Go to home")."\""); ?></li>
         </ul>
	</div>

    <div id="formulario">    	
        <?php echo $this->html->formPost("admin/login/"); ?>
			<fieldset>
				<legend><?php echo $this->l10n->__("Type your password"); ?></legend>
				<label><?php echo $this->l10n->__("Password:"); ?></label>
                <?php echo $this->html->passwordField("password", " class=\"input_rojo\" "); ?><br />
				<input class="submit" type="submit" value="<?php echo $this->l10n->__("Login"); ?>" />
			</fieldset>
		</form>
        <?php if ($this->session->issetFlash()) { ?>
    		<div class="error" id="divMessages"><?php echo $this->session->getFlash(); ?></div>
     	<?php } ?>
	</div>
        
	<?php echo $this->renderElement("footer"); ?>