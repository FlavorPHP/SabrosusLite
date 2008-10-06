    <?php echo $this->renderElement("admin_menu"); ?>

    <div id="contenido">
	
		<div id="formulario">        
		
			<?php echo $this->html->formPost("admin/edit/".$id."/"); ?>
				<fieldset>
					<legend><?php echo $this->l10n->__("Edit the bookmark"); ?></legend>
					<label><?php echo $this->l10n->__("URL:"); ?></label><br />
					<?php echo $this->html->textField("url", " value=\"".$link["url"]."\" class=\"input_morado\" size=\"86\" "); ?>
					<br />
					<label><?php echo $this->l10n->__("Title:"); ?></label><br />
					<?php echo $this->html->textField("title", " value=\"".$link["title"]."\" class=\"input_morado\" size=\"86\" "); ?>
					<br />					
					<label><?php echo $this->l10n->__("Description:"); ?></label><br />
					<?php echo $this->html->textArea("description", $link["description"], " rows=\"3\" cols=\"84\" "); ?>
					<br />					
					<label><?php echo $this->l10n->__("Tags:"); ?></label><br />
					<?php echo $this->html->textField("tags", " value=\"".$link["tags"]."\" class=\"input_morado\" size=\"86\" "); ?>
					<br /><br />
                    <?php echo $this->html->image("tag.gif", $this->l10n->__("tags"))." ".$tags."<br />"; ?>
                    <br />
					<div class="information"><?php echo $this->l10n->__("The tags must be space-separated"); ?></div>
	  				<input class="submit" type="submit" value="<?php echo $this->l10n->__("Modify"); ?>" /><br />
				</fieldset>				
			</form>
		
		</div>
		
    </div>

	<?php echo $this->renderElement("footer"); ?>