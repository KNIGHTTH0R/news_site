<?php
//функция для реализации подключения отдельных блоков в view.

function render($template,$vars = array()){

	extract($vars);
    if(empty($template)){}

	else if(is_array($template)){

		foreach($template as $k){

			$cl = strtolower(get_class($k));
			$$cl = $k;
			include "views/_$cl.php";
		}

	}
	else {
		include "views/$template.php";
	}
}

	function formatTitle($title = ''){
		if($title){
			$title.= ' | ';
		}

		$title .= $GLOBALS['defaultTitle'];

		return $title;
	}


// получает строку с тэгами, разбивает их и отдает внутри <a>..</a>
	function tagsDivider($newspage = array()){
	    $kom = ", ";
	    $tags = $newspage->tags;
        $tags = explode(", ", $tags);

        for($i=0; $i<count($tags); $i++){
            if ($i !== count($tags)-1){
                echo "<a href='?tag=$tags[$i]'>" . $tags[$i] . "</a>" . "$kom";
            }else{
                echo "<a href='?tag=$tags[$i]'>" . $tags[$i] . "</a>";
            }
        };


}


?>
