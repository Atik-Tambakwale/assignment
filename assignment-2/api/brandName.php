<?php 
 require "config/db_connection.php";

 $sql=" select * from brand";
 $result=mysqli_query($link, $sql);

 $dataList=[];
 while($row=MYSQLI_FETCH_ARRAY($result)){
			array_push($dataList,$row);
 }
 if(count($dataList)>0){
	 $response["status"]=200;
	 $response['list']= $dataList;
 }
 else{
	 $response['status']=201;
	 $response['msg']="no record";
 }
 echo json_encode($response);
?>