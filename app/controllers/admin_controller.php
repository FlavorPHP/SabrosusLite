<?php

class admin_controller extends controller {

	private $conf;
	
	public function __construct() {
		parent::__construct();
		$this->conf = new configuration();
		$this->conf->find(1);
		$this->l10n->setLanguage($this->conf["language"]);
	}
	
	public function index($id = NULL) {		
		return $this->pag($id);
	}

	public function add() {		
		$link = new bookmark();
		$this->view->conf = $this->conf;
		if ($_SERVER["REQUEST_METHOD"]=="POST"){
			$link->prepareFromArray($_POST);
			$link->save();
			$this->redirect("admin/");
		} else {
			$tags = new tagsCloud();			
			$this->view->tags = $tags->showTagsJs();
			$this->title_for_layout($this->l10n->__("Add a bookmark"));
			$this->render();
		}
	}
	
	public function edit($id) {
        $this->view->conf = $this->conf;	
		$link = new bookmark();		
		$this->view->link = $link->find($id);
		$this->view->id = $id;
		if ($_SERVER["REQUEST_METHOD"]=="POST"){
			$link->prepareFromArray($_POST);
			$link->save();
			$this->redirect("admin");
		} else {
			$tags = new tagsCloud();
			$this->view->tags = $tags->showTagsJs();
			$this->title_for_layout($this->l10n->__("Edit a bookmark"));
			$this->render();
		}		
	}
	
	public function pag($page){
		$link = new bookmark();
        $this->view->conf = $this->conf;
		$total_rows = $link->countBookmarks();
		$page = (is_null($page)) ? 1 : $page ;
		$limit = $this->conf["limit"];		
		$offset = (($page-1) * $limit);
		$limitQuery = $offset.",".$limit;
        $targetpage = $this->path.'admin/pag/';
		
        $pagination = $this->pagination->init($total_rows, $page, $limit, $targetpage);
        $this->view->pagination = $pagination;
		
		$this->view->links = $link->findAll(NULL, "id_link DESC",$limitQuery,NULL);
		
		$this->title_for_layout($this->l10n->__("Manage your bookmarks"));
		$this->render("admin");
	}
	
	public function remove($id) {		
		$link = new bookmark();
		$link->find($id);
		$link->delete();
		$this->redirect("admin/");
	}
	
	public function configuration($id) {		
		$this->view->conf = $this->conf;
		if ($_SERVER["REQUEST_METHOD"]=="POST"){
			if($_POST['admin_pass1']!=$_POST['admin_pass2']) {
				$this->session->flash($this->l10n->__("Passwords must match"));
				$this->render();
			} else {
				if($_POST['admin_pass1']!=""){
					$_POST['admin_pass']=md5($_POST['admin_pass1']);
				} 
				unset($_POST['admin_pass1']);
				unset($_POST['admin_pass2']);
				$this->conf->prepareFromArray($_POST);
				$this->conf->save();
				$this->redirect("admin/");
			}
		} else {
			$this->view->languages = $this->l10n->getLocalization();
			$this->title_for_layout($this->l10n->__("Configure"));
			$this->render();
		}
	}
	
	public function login($msg = "") {
		$this->view->conf = $this->conf;
		if ($msg == "nosession") {
			$this->session->flash($this->l10n->__("The URL you've followed requires your login."));
		} elseif ($msg == "fail") {
			$this->session->flash($this->l10n->__("Sorry, the information you've entered is incorrect."));
		} elseif ($msg == "logout") {
			$this->session->flash($this->l10n->__("You've successfully logged out."));
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST") {			
			if(($valid = $this->conf->validateLogin($_POST)) == true) {
                $this->session->logged = $valid;
                $this->redirect("admin/");
            } else {
				$this->redirect("admin/login/fail/");
            } 
		} else {
			$this->title_for_layout($this->l10n->__("Login"));
			$this->render();
		}		
	}
	
	function logout() {
        $this->session->destroy("logged");        
        $this->redirect("admin/login/logout/");		
    } 
	
	public function beforeRender() {
		if($this->action != "login" && $this->action != "logout") {
            if($this->session->check("logged") == false) {
                $this->redirect("admin/login/nosession/");
            }
        } 
	}

}

?>