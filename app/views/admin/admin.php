	<?php echo $this->renderElement("admin_menu"); ?>

    <div id="contenido">
	
		<table cellspacing="0">
		<thead>
			<th><?php echo $this->l10n->__("Manage your bookmarks"); ?></th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</thead>
    
    <?php foreach ($links as $link) { ?>
	
		<tr>
			<td class="objeto">
<?php 					echo $link["title"];	?>
			</td>
			<td class="edita">
				<?php echo $this->html->linkTo($this->l10n->__("Edit"), "admin/edit/".$link["id_link"]."/", " title=\"Edit bookmark\""); ?>
			</td>
			<td class="elimina">
				<?php echo $this->html->linkToConfirm($this->l10n->__("Remove"), "admin/remove/".$link["id_link"]."/"); ?>
								
			</td>
		</tr>	
        
    <?php } ?>
	
    	</table>
<?php echo $pagination; ?>	
    </div>
	
	<?php echo $this->renderElement("footer"); ?>