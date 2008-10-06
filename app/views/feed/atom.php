<?php header("Content-type: text/xml; charset=utf-8"); ?>

<feed xmlns="http://www.w3.org/2005/Atom" xml:lang="en">
	<title><?php echo $conf["name"]; ?> / sabros.us lite</title>
	<author><name><?php echo $conf["name"]; ?></name></author>
	<id><?php echo $this->path;?></id>
	<updated><?php echo date("Y-m-d\TH:i:s\Z"); ?></updated>
	<link rel="self" href="<?php echo $this->path;?>feed/atom/" />
	<link href="<?php echo $this->path;?>" />
	<generator uri="http://sabros.us/" version="1.0">sabros.us lite</generator>
	<icon><?php echo $this->path;?>views/images/sabrosus_icon.png</icon>
		
	<?php foreach ($links as $link) { ?>
	<entry>
		<title><?php echo $link["title"]; ?></title>
		<link rel="alternate" href="<?php echo $this->path; ?>index/go/<?php echo $link["id_link"]; ?>/" title="<?php echo $link["title"]; ?>" />
		<link rel="related" href="<?php echo $link["url"]; ?>" title="<?php echo $link["title"]; ?>" />
		<id><?php echo $this->path; ?>index/view/<?php echo $link["id_link"]; ?>/</id>

		<content type="html">
			<div><a title="<?php echo $link["title"]; ?>" href="<?php echo $link["url"]; ?>"></a></div>
			<div><?php echo $link["description"]; ?></div>
		</content>
		<updated><?php echo date("Y-m-d\TH:i:s\Z", strtotime($link["modified"])); ?></updated>
		<category term="<?php echo $link["tags"]; ?>" label="<?php echo $link["tags"]; ?>" />
	</entry>
	<?php } ?>
</feed>