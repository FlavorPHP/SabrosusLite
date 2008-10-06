<?php header("Content-type: text/xml; charset=utf-8"); ?>

<rss version="2.0">
	<channel>
		<title><?php echo htmlspecialchars($conf["name"]); ?> / sabros.us lite</title>
		<link><?php echo $this->path;?></link>
		<description><?php echo htmlspecialchars($conf["description"]);?></description>
		<generator>sabros.us lite</generator>
		<image>
			<url><?php echo $this->path;?>views/images/sabrosus_icon.png</url>
			<title><?php echo htmlspecialchars($conf["name"]);?> / sabros.us lite</title>
			<link><?php echo $this->path;?></link>
		</image>
		
		<?php foreach ($links as $link) { ?>
			<item>
				<title><?php echo htmlspecialchars($link["title"]); ?></title>
                <description><![CDATA[<?php echo htmlspecialchars($link["description"]); ?>]]></description>
				<link><?php echo $link["url"]; ?></link>								
                <guid isPermaLink="true"><?php echo $this->path; ?>index/view/<?php echo $link["id_link"]; ?>/</guid>
                <pubDate><?php echo date("D, d M Y H:i:s \G\M\T",strtotime($link["created"])); ?></pubDate>
				<category><?php echo htmlspecialchars($link["tags"]); ?></category>
			</item>
		<?php } ?>
    </channel>
</rss>