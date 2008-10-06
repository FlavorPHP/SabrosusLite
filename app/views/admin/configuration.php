    <?php echo $this->renderElement("admin_menu"); ?>

    <div id="contenido">
	
		<div id="formulario">
		
			<?php echo $this->html->formPost("admin/configuration/"); ?>
				<fieldset>
					<legend><?php echo $this->l10n->__("Configuration"); ?></legend>					
					<label for="name"><?php echo $this->l10n->__("Name:"); ?></label><br />
					<?php echo $this->html->textField("name", " value=\"".$conf["name"]."\" class=\"input_morado\" size=\"86\" "); ?>
					<br />
					<label for="description"><?php echo $this->l10n->__("Description:"); ?></label><br />
					<?php echo $this->html->textField("description", " value=\"".$conf["description"]."\" class=\"input_morado\" size=\"86\" "); ?>
					<br />
					<label for="language"><?php echo $this->l10n->__("Language:"); ?></label><br />
					<?php echo (count($languages>0))? $this->html->select("language", $languages, $conf["language"]) : "" ?>
					<br />
					<label for="limit"><?php echo $this->l10n->__("Links by page:"); ?></label><br />
					<?php echo $this->html->textField("limit", " value=\"".$conf["limit"]."\" class=\"input_morado\" size=\"86\" "); ?>
					<br />
					<label for="admin_pass1"><?php echo $this->l10n->__("Admin Password:"); ?></label><br />
					<?php echo $this->html->passwordField("admin_pass1", " value=\"\" class=\"input_morado\" size=\"86\" "); ?>
					<br />
					<label for="admin_pass2"><?php echo $this->l10n->__("Repite Password:"); ?></label><br />
					<?php echo $this->html->passwordField("admin_pass2", " value=\"\" class=\"input_morado\" size=\"86\" "); ?>
					<br />					
					<p><?php echo $this->l10n->__("Leave blank to not change the password"); ?></p>
					<input class="submit" type="submit" value="<?php echo $this->l10n->__("Modify"); ?>" /><br />
				</fieldset>				
			</form>
            <?php if ($this->session->issetFlash()) { ?>
                <div class="error" id="divMessages"><?php echo $this->session->getFlash(); ?></div>
            <?php } ?>
		
		</div>
		
    </div>

	<?php echo $this->renderElement("footer"); ?>