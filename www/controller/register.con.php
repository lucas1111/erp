<?php
	require_once("model/DBProcessor.class.php");

	$registerTime = "新用户-注册时间为：".date("Y.m.d h:i:sa")."--";
 	$registerInfo = "用户名：".$_POST['staffName'];
	$logPath = "I:\wampserver\wamp\www\log\myRegisterLog.log";
	//把信息输入到文件中查看
	file_put_contents($logPath, $registerTime.$registerInfo."\r\n\n",FILE_APPEND);

	//var_dump($_POST);
	$_POST["password"]=md5($_POST["password"]);
	$staffName = $_POST['staffName'];
	$submitArr=array_slice($_POST,0,6);
	//var_dump($submitArr);
	//$submitArr=array_merge($submitArr,array_slice($_POST,8,1));
	//var_dump($submitArr);
	$date=$_POST['BYear']."-".$_POST['BMonth'].'-00';
	$tempArr=array('staffBirthday' =>$date);
	$submitArr=array_merge($submitArr,$tempArr);
	//var_dump($submitArr);



	$registerSubmit = new DBProcessor();
	$result = $registerSubmit->addAllRecord("staffinfo",$submitArr,$staffName);

	if($result){
		echo "<script>alert('Register completed!Please login!');
			parent.location.href='/';</script>";	  
	}



/*

	//$registerSubmit = new DBProcessor();
	//$result = $registerSubmit->addAllRecord("staffinfo",$submitArr);

版本1.0
	$connection='';
	$servername='localhost';
	$user='root';
	$serverpassword='';
	$DB='erp';
 	//连接数据库
 	$connection = mysqli_connect($servername,$user,$serverpassword);
 	if(!$connection){
  		die("Failed to connect the database!".mysqli_error());
  	}
 	//选择数据库
 	mysqli_select_db($connection,$DB) or die("Failed to select database!".mysqli_error());
 	//设置数据入库编码
 	$connection->set_charset("utf8");
	// if (!$connection->set_charset("utf8")) {
	// 	printf("Error loading character set utf8: %s\n", $connection->error);
	// } else {
	// 	printf("Current character set: %s\r\n", $connection->character_set_name());
	// }

	$table="staffinfo";
	$i=1;
	foreach($submitArr as $key=>$value){ 
		if($i==1){
			$sqlStr="INSERT INTO $table (staffName, Authorization)VALUES('$staffName','level1')";
		}else{
			$sqlStr="UPDATE $table SET $key = '$value' where staffName='$staffName'";
		}
		$i++;
	    $result = mysqli_query($connection,$sqlStr);			
		}
		if(!$result){
			echo "<script>alert('Register Failed !Please try again later!');
				parent.location.href='/';</script>".mysqli_error();	  
		}		  
	} 


//数组操作

$bbbb=array("11"=>"aaa","22"=>"bbb");

//只能输出值value不能输出key
foreach($bbbb as $color)
{
　　echo $color;
}

//value与key都可输出
foreach($bbbb as $key=>$value)
{
　　echo $key."=>".$value;
}
 

//value与key都可输出
while($color=each($bbbb)){
　　echo $color['key'];
}
//或
while(list($key,$value)=each($bbbb)){
　　echo "$key : $value<br>";
}


*/

?>