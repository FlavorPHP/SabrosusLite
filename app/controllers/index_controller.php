<?php

class index_controller extends appcontroller {

	private $conf;
	
	public function __construct() {
		parent::__construct();
		$this->conf = new configuration();
		$this->conf->find(1);
		$this->l10n->setLanguage($this->conf["language"]);
	}
	
	public function index($id=NULL) {
		$link = new bookmark();
		
		$total_rows = $link->countBookmarks();
		$page = (is_null($id)) ? 1 : $id ;
		$limit = $this->conf["limit"];
		$offset = (($page-1) * $limit);
		$limitQuery = $offset.",".$limit;
        $targetpage = $this->path;
        $pagination = $this->pagination->init($total_rows, $page, $limit, $targetpage);
		$cloud = new tagsCloud();
		
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
		
		$links = $link->findAll(NULL, "id_link DESC", $limitQuery, NULL);
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
		
		$this->themes->title = $this->l10n->__("home");
		$this->themes->includes = $includes;
		$this->themes->pagination = $pagination;
		$this->themes->totalRows = $total_rows;
		$this->themes->from = ($offset + 1);
		$this->themes->to = (($offset + $limit) >= $total_rows) ? $total_rows : ($offset + $limit);
		$this->themes->path = $this->path;
		$this->themes->cloud = $cloud->showTags();
		
		$this->renderTheme($this->conf->theme);
	}
	
	public function view($id) {
		$link = new bookmark();
        $this->view->conf = $this->conf;
		$this->view->links = $link->findAll(NULL,NULL,1," WHERE id_link={$id}");
		$this->title_for_layout(" link / ".$id);
		
		$cloud = new tagsCloud();
		$this->view->tagsCloud = $cloud->showTags();
		
		$this->render("index");
	}
	
	public function go($id) {
		$link = new bookmark();
		$link->find($id);
		$this->redirect($link["url"], false);
	}
	
	public function what(){
        $this->view->conf = $this->conf;
		$this->title_for_layout($this->l10n->__("what is sabros.us lite?"));
		$this->render();
	}
}

?>