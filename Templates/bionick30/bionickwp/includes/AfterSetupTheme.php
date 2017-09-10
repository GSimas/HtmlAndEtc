<?php

class AfterSetupTheme{
	
	
	static function return_thme_option($string,$str=null){
		global $bionick_wp;
		if($str!=null)
		return isset($bionick_wp[''.$string.''][''.$str.'']) ? $bionick_wp[''.$string.''][''.$str.''] : null;
		else
		return isset($bionick_wp[''.$string.'']) ? $bionick_wp[''.$string.''] : null;
	}
	
	
}
?>