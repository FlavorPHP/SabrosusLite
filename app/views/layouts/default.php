<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo $conf["language"]; ?>" xml:lang="<?php echo $conf["language"]; ?>">
	<head>
    	<title>sabros.us lite / <?php echo $title_for_layout; ?></title>
		<meta name="generator" content="mini-sabros.us 1.0" />		
        <?php echo $this->html->charsetTag("UTF-8"); ?>
		<?php echo $this->html->includeCss("sabor"); ?>
        <?php echo $this->html->includeJs("jquery"); ?>        
        <?php echo $this->html->includeJs("edit"); ?>
        <?php echo $this->html->includeJs("jtagging"); ?>
        <?php echo $this->html->includeJs("simplevalidate"); ?>        
        <?php echo $this->html->includeJs("hint"); ?>
        <?php echo $this->html->includePluginFacebox(); ?>
		<?php echo $this->html->includeFavicon(); ?>
		<?php echo $this->html->includeRSS(); ?>
        <?php echo $this->html->includeATOM(); ?>        
		<script type="text/javascript">
			$(document).ready(function(){
				$("#tags").jTagging($("#tagslst"), " ");
				$('input[title!=""]').hint();
				$('textarea[title!=""]').hint();
				$("#divMessages").fadeOut(5000,function(){
					$("#divMessages").css({display:"none"});
				});				
			});
		</script>
	</head>
    <body>
        <div id="pagina">
            <?php echo $content_for_layout ?>
        </div>
    </body>
</html>
