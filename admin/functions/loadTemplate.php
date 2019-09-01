<?php 
	// function to load template
	function loadTemplate($fileName, $templateVars){
		extract($templateVars);
		ob_start();
		require $fileName;
		$content = ob_get_clean();
		return $content;
	}
?>