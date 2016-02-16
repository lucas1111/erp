<?php
	//require_once"model/DBProcessor.class.php";
		
	//接收信息
	$content = $_POST["con"];
	$sender = $_POST["getter"];
	$getter = $_POST["sender"];
	$logPath = "I:\wampserver\wamp\www\log\mylog.log";
	//把信息输入到文件中查看
	file_put_contents($logPath, "信息发送-发送者：".$sender."-接收者：".$getter."-内容:".$content."\r\n",FILE_APPEND);


	// $sql = "insert into messages (sender,getter,content,sendTime,isGet)
	// values('$sender','$getter','$content',now(),0)";
	// //创建pdo对象
	// //在MySQL命令行中使用如下命令查看MySQL默认端口：show variables like 'port';
	// $myPdo = new PDO("mysql:host=localhost;port=3306;dbname=erp","root",""); 
	// //设置编码
	// $myPdo -> exec("set names utf8");
	// //sql语句预处理
	// $pdoStatement = $myPdo -> prepare($sql);
	
	// 	//execute函数是用于执行已经预处理过的语句，只是返回执行结果成功或失败。
	// 	//也就是说execute需要配合prepare函数使用，这个的确是麻烦了一点，每次都要先prepare，然后才能exec。
	// 	//所以，如果执行SELECT等SQL语句，则还需要借助fetch等函数进行结果读取
	
	// $pdoStatement -> execute();
	// //插入成功$test值为：1,反之则为0
	// $test =$pdoStatement -> execute();
	// //取出结果
	// $ajaxResult = $pdoStatement -> fetch();

	// //file_put_contents($logPath, "信息插入结果：".$test."\r\n",FILE_APPEND);
	// if(!$test){
	// 	file_put_contents($logPath, "信息插入失败，CODE：".$test."\r\n",FILE_APPEND);
	// 	echo "插入失败！";
	// }
	

	$con = mysqli_connect('localhost','root','','erp');
	if (!$con){
		die('Could not connect: ' . mysqli_error($con));
	}

	mysqli_select_db($con,"erp");
	$con->set_charset("utf8");
	$sql="insert into messages (sender,getter,content,sendTime)values('$sender','$getter','$content',now())";

	$result = mysqli_query($con,$sql);
	$test = $result;
	if(!$test){
		file_put_contents($logPath, "信息插入失败，CODE：".$test."\r\n",FILE_APPEND);
		echo "插入失败！";
	}
	mysqli_close($con);

?>

