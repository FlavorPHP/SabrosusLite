    <?php echo $this->renderElement("admin_menu"); ?>

    <div id="contenido">
	
		<div id="formulario">
		
			<?php echo $this->html->formPost("admin/add/"); ?>
				<fieldset>
					<legend><?php echo $this->l10n->__("Add a bookmark"); ?></legend>
					<label><?php echo $this->l10n->__("URL:"); ?></label><br />
					<?php echo $this->html->textField("url", " class=\"input_morado url\" size=\"86\" title=\"the site url\" "); ?>
					<br />
					<label><?php echo $this->l10n->__("Title:"); ?></label><br />
					<?php echo $this->html->textField("title", " class=\"input_morado required\" size=\"86\" title=\"the site title\" "); ?>
					<br />					
					<label><?php echo $this->l10n->__("Description:"); ?></label><br />
					<?php echo $this->html->textArea("description", "", " rows=\"3\" cols=\"84\" title=\"the site description\" "); ?>
					<br />					
					<label><?php echo $this->l10n->__("Tags:"); ?></label><br />
					<?php echo $this->html->textField("tags", " class=\"input_morado\" size=\"86\" "); ?>
					<br /><br />
                    <?php echo $this->html->image("tag.gif", $this->l10n->__("tags"))." ".$tags."<br />"; ?>
                    <br />
					<div class="information"><?php echo $this->l10n->__("The tags must be space-separated"); ?></div>
	  				<input class="submit" type="submit" value="<?php echo $this->l10n->__("Add"); ?>" /><br />
				</fieldset>				
			</form>
		
		</div>        
		
    </div>

	<?php echo $this->renderElement("footer"); ?>