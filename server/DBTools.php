<?php
	//---DB Link------------------------------------
	function DBT_OpenLink($host,$user,$pass,$dbName){
		$link=mysql_connect($host,$user,$pass) or die('無法連接'.mysql_error());	
		mysql_select_db($dbName,$link) or die('cannot find db');
		mysql_query("SET NAMES utf8");
		return $link;
	}
	//----Check Login-------------------------------------	
	function DBT_CheckLogin($acc,$pwd){
		$sql="SELECT * FROM usertable where account='".$acc."' and pwd='".$pwd."'";
		$result=mysql_query($sql);
		$data=mysql_fetch_assoc($result);
		if(mysql_num_rows($result)>0){		
			$outPutStr=1;			
		}else{		
			$outPutStr=0;	
		}
		echo $outPutStr;	
	}
	
?>