		<div id="formulario">
		
			<?php echo $this->html->formPost("ajax/edit/".$id."/"); ?>
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
					<br />
					<p><?php echo $this->l10n->__("Tags: space-separated"); ?></p>
	  				<input class="submit" type="submit" value="<?php echo $this->l10n->__("Modify"); ?>" /><br />
				</fieldset>				
			</form>
		
		</div>