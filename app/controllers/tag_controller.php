<?php

class tag_controller extends appcontroller {

	private $conf;

	public function __construct() {
		parent::__construct();
		$this->conf = new configuration();
		$this->conf->find(1);
		$this->l10n->setLanguage($this->conf["language"]);
	}

	public function __call($method, $args){
		$page = (is_numeric($args[0])) ? $args[0] : 1 ;
		return $this->view($method, $page);
	}

	public function index($id=NULL) {
		$this->redirect("index/");
	}

	public function view($tag, $page="1") {
		$link = new bookmark();

		$param = (!empty($tag))? " WHERE tags LIKE '% {$tag} %' OR tags LIKE '{$tag} %' OR tags LIKE '% {$tag}' OR tags = '{$tag}'" : NULL;
		$tagtag = (!empty($tag)) ? $tag : NULL;
		$this->themes->tagtag = $tagtag;

		$total_rows = $link->countBookmarks($param);
		$page = (is_null($page)) ? 1 : $page ;
		$limit = $this->conf["limit"];
		$offset = (($page-1) * $limit);
		$limitQuery = $offset.",".$limit;
        $targetpage = $this->path."tag/".$tag."/";

        $pagination = $this->pagination->init($total_rows, $page, $limit, $targetpage);
        $this->themes->pagination = $pagination;

		$this->html = html::getInstance();
		$this->html->setType($this->conf->theme);
		$this->ajax = new ajax();

		$includes = $this->html->charsetTag("UTF-8");
		$includes .= $this->html->includeCss("sabor");
		$includes .= $this->html->includeJs("jquery");
		$includes .= $this->html->includeJs("edit");
		$includes .= $this->html->includeJs("jtagging");
		$includes .= $this->html->includeJs("simplevalidate");
		$includes .= $this->html->includeJs("hint");
		$includes .= $this->html->includePluginFacebox();
		$includes .= $this->html->includeFavicon();
		$includes .= $this->html->includeRSS();
		$includes .= $this->html->includeATOM();

		$conf = array(
			'language'=>$this->conf->language,
			'name'=>$this->conf->name
		);
		$session = array(
			'logged'=>$this->session->check("logged")
		);
		$linkTo = array(
			'feed'=>$this->html->linkTo($this->html->image("feed.png", $this->l10n->__("Feed")), "feed/", " title=\"".$this->l10n->__("The Feed")."\"")
		);

		$this->themes->conf = $conf;
		$this->themes->session = $session;
		$this->themes->linkTo = $linkTo;

		$this->themes->totalRows =  $total_rows;
		$this->themes->from =  ($offset + 1);
		$this->themes->to =  (($offset + $limit) >= $total_rows) ? $total_rows : ($offset + $limit);

		$links = $link->findAll(NULL, "id_link DESC", $limitQuery, $param);
		foreach($links as $k=>$link){
			$link['linkToBox'] = $this->ajax->linkToBox($this->l10n->__("Edit"), "admin/edit/".$link["id_link"]."/", " name=\"editlink-".$link["id_link"]."\" title=\"".$this->l10n->__("Edit bookmark")."\"");
			$link['created'] = date($this->l10n->__("m.d.y"),strtotime($link["created"]));
			$tags = explode(" ",$link["tags"]);
			$link['tags']='';
			foreach($tags as $tag)
				$link['tags'] .= "<span class=\"link_tags\"><a href=\"".$this->path."tag/$tag/\">$tag</a></span> ";
			$links[$k] = $link;
		}
		$this->themes->links = $links;

		$this->themes->title = $this->l10n->__(" tag / ").$tagtag;
		$this->themes->includes = $includes;
		$this->themes->pagination = $pagination;
		$this->themes->totalRows = $total_rows;
		$this->themes->from = ($offset + 1);
		$this->themes->to = (($offset + $limit) >= $total_rows) ? $total_rows : ($offset + $limit);
		$this->themes->path = $this->path;

		$cloud = new tagsCloud();
		$this->themes->cloud = $cloud->showTags();

		$this->renderTheme($this->conf->theme);
	}
}

?>