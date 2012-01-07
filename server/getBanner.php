<?php
	header("content-type:text/html;charset=utf-8");
	include_once 'DBTools.php';
	//--get user input--
	$style=$_GET['style'];
	$callback=isset($_GET['callback'])?$_GET['callback']:'';
	//--db parameter------------------------------		
	$link=DBT_OpenLink('localhost','ozzysun','psaw','svplayer');
	echo loadList($style);
	mysql_close($link);
	
	function loadList($value){
		global $callback;
		$sql="SELECT * FROM itemtable where style='".$value."'";
		$result=mysql_query($sql);
		//--output---------
		$items=array();
		while($data=mysql_fetch_assoc($result)){			
			$obj=array(
				"id"=>$data["id"],				
				"name"=>$data["name"],				
				"artist_thumb"=>"http://192.168.11.83/project/svplayer/img/".$data["artist_thumb"]								
			);	
			array_push($items,$obj);								
		};		
		if(!empty($callback)){
			return $callback."(".json_encode($items).")";			
		}else{			
			return json_encode($items);
		}		
	} 
?>