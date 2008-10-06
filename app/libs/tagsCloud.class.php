<?php
/*
Como esto es un librería externa, aca debería tener algun encabezado...así que Pedro te dejo para que acomodes esta parte de arriba
Generada a partir de la clase tags.class de sabros.us cuyo autor es Jorge Condomí bajo licencia GPL
Adaptada por: Victor Bracco <vbracco@gmail.com> para sabros.us lite
bla bla bla
 */
 

class tagsCloud{

	protected $registry;
	protected $path;
	protected $l10n;
	protected $links;
	protected $tags;
	private $output;
	
	public function __construct() {
		$this->registry = registry::getInstance();
		$this->l10n = l10n::getInstance();
		$this->path = $this->registry["path"];
	}
	
	public function showTags($max_font=30, $min_font=12){
		$keys = array();
		$link = new bookmark();
		$this->links = $link->findAll();
		foreach($this->links as $bookmark){
			if(trim($bookmark["tags"])!=""){
				$tags = explode(" ",$bookmark["tags"]);
				foreach($tags as $tag){
					$this->tags[$tag] = (isset($this->tags[$tag]))? $this->tags[$tag]+1 : 1;
				}
			}
		}
		if(isset($this->tags[""])){
			unset($this->tags[""]);
		}
		if(count($this->tags) > 0){
			ksort($this->tags);
			$max = max($this->tags);
			$min = min($this->tags);
			$prop = 255 / $max;
			if($max!=$min){
				$step = round(($max_font - $min_font)/($max - $min),4);
			}else{
				$step=1;
			}
			$this->output = "<div id=\"tagsx\">\n";
			$this->output .= "\t<ol id=\"cloud\">\n";
	
			foreach($this->tags as $key => $value) {
				$colores[5]['r'] = (rand(5,40)) / 10;
				$colores[5]['g'] = (rand(5,40)) / 10;
				$colores[5]['b'] = (rand(5,40)) / 10;
				$selectedColor = 5;
	
				$color = round(255 - ($prop * $value),0);
				$r = round(($color/$colores[$selectedColor]['r']),0);
				$g = round(($color/$colores[$selectedColor]['g']),0);
				$b = round(($color/$colores[$selectedColor]['b']),0);
				$r = ($r>215)? 215 : $r;
				$g = ($g>215)? 215 : $g;
				$b = ($b>215)? 215 : $b;
				$size = (($value - $min)*$step) + $min_font;
				$this->output .= "\t\t\t<li><a title=\"".$value." ".$this->l10n->__("links with this tag")."\" style=\"font-size:".$size."px; color:rgb(".$r.",".$g.",".$b.");\" href=\"".$this->path.'tag/'.urlencode($key)."/\"> ".htmlspecialchars($key)."</a></li>\n";
			}
			$this->output .= "\t\t</ol>\n";
			$this->output .= "</div>\n";
			return $this->output;
		}
	}
	
	public function showTagsJs(){
		$keys = array();
		$link = new bookmark();
		$this->links = $link->findAll();
		foreach($this->links as $bookmark){
			if(trim($bookmark["tags"])!=""){
				$tags = explode(" ",$bookmark["tags"]);
				foreach($tags as $tag){
					$this->tags[$tag] = (isset($this->tags[$tag]))? $this->tags[$tag]+1 : 1;
				}
			}
		}
		if(isset($this->tags[""])){
			unset($this->tags[""]);
		}
		if(count($this->tags) > 0){
			ksort($this->tags);

			$this->output = "<div style=\"display:inline;\" id=\"tagslst\">\n";
	
			foreach($this->tags as $key => $value) {				
				$this->output .= "\t\t\t<a title=\" ".$this->l10n->__("add/remove this tag")."\" style=\"color:rgb(255,0,0);\" href=\"#\" onclick=\"return false;\">".htmlspecialchars($key)."</a>&nbsp;&nbsp;\n";				
			}
			$this->output .= "</div>\n";
			return $this->output;
		}
	}
}
?>