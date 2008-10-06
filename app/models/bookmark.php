<?php

class bookmark extends models {

	public function countBookmarks($extra=NULL) {
		$sql = "SELECT count(*) as totalRows FROM `bookmarks`";
		if(is_null($extra) == false) $sql.= " ".$extra;
		$valid = $this->findBySql($sql);
        if(empty($valid) == false) {
            return $valid["totalRows"];
		}
        return 0;
	}
	
}

?>