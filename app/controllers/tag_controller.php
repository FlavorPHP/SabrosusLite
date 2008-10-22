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
        $this->view->conf = $this->conf;
		$param = (!empty($tag))? " WHERE tags LIKE '% {$tag} %' OR tags LIKE '{$tag} %' OR tags LIKE '% {$tag}' OR tags = '{$tag}'" : NULL;
		$tagtag = (!empty($tag)) ? $tag : NULL;
		$this->view->tagtag = $tagtag;		

		$total_rows = $link->countBookmarks($param);
		$page = (is_null($page)) ? 1 : $page ;
		$limit = $this->conf["limit"];		
		$offset = (($page-1) * $limit);
		$limitQuery = $offset.",".$limit;
        $targetpage = $this->path."tag/".$tag."/";
		
        $pagination = $this->pagination->init($total_rows, $page, $limit, $targetpage);
        $this->view->pagination = $pagination;       
        
		$this->view->totalRows =  $total_rows;
		$this->view->from =  ($offset + 1);
		$this->view->to =  (($offset + $limit) >= $total_rows) ? $total_rows : ($offset + $limit);
		     
        $this->view->links = $link->findAll(NULL, "id_link DESC", $limitQuery, $param);		
		
		$this->title_for_layout($this->l10n->__(" tag / ").$tagtag);
		
		$cloud = new tagsCloud();
		$this->view->tagsCloud = $cloud->showTags();
		
		$this->render("view");
	}
}

?>