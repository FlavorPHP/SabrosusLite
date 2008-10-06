<?php

class configuration extends models {
	
	public function validateLogin($data) {
        $valid = $this->findBySql("SELECT admin_pass FROM configurations WHERE admin_pass='".md5($data["password"])."'");
        if(empty($valid) == false) {
            return true;
		}
        return false;
    } 
	
}

?>