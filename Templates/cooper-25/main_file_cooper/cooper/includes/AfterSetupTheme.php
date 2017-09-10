<?php

class Cooper_AfterSetupTheme{
	
	
	static function return_thme_option($string,$str=null){
		global $cooper_wp;
		if($str!=null)
		return isset($cooper_wp[''.$string.''][''.$str.'']) ? $cooper_wp[''.$string.''][''.$str.''] : null;
		else
		return isset($cooper_wp[''.$string.'']) ? $cooper_wp[''.$string.''] : null;
	}
	
	
}
?>