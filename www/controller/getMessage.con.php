<?php
	//用于响应用户取数据的请求

	header("content-type: text/xml;charset=utf-8");
	header("Cache-Control: no-cache");

	//接收信息
	$sender = $_POST["getter"];
	$getter = $_POST["sender"];

	$logPath = "I:\wampserver\wamp\www\log\mylog.log";
	//把信息输入到文件中查看
	//file_put_contents($logPath, "数据请求-发送者：".$sender."-接收者：".$getter."\r\n",FILE_APPEND);

	// $sql="select * from messages where getter='$sender' and sender='$getter'and isGet=0";

	// //创建pdo对象
	// //在MySQL命令行中使用如下命令查看MySQL默认端口：show variables like 'port';
	// $myPdo = new PDO("mysql:host=localhost;port=3306;dbname=erp","root",""); 
	// //设置编码
	// $myPdo -> exec("set names utf8");
	// //sql语句预处理
	// $pdoStatement = $myPdo -> prepare($sql);
	
	// 	// execute函数是用于执行已经预处理过的语句，只是返回执行结果成功或失败。
	// 	// 也就是说execute需要配合prepare函数使用，这个的确是麻烦了一点，每次都要先prepare，然后才能exec。
	// 	// 所以，如果执行SELECT等SQL语句，则还需要借助fetch等函数进行结果读取
	
	// $pdoStatement -> execute();
	// //执行成功$test值为：1,反之则为0
	// $test =$pdoStatement -> execute();
	// //取出结果
	// $ajaxResult = $pdoStatement -> fetch();


	$con = mysqli_connect('localhost','root','','erp');
	if (!$con){
		die('Could not connect: ' . mysqli_error($con));
	}

	mysqli_select_db($con,"erp");
	$con->set_charset("utf8");
	$sql="select * from messages where getter='$sender' and sender='$getter'and isGet=0";

	$result = mysqli_query($con,$sql);

	$ajaxResult = $result;
	// if(!$test){
	// 	file_put_contents($logPath, "信息插入失败，CODE：".$test."\r\n",FILE_APPEND);
	// 	echo "插入失败！";
	// }

/**/	
	$sql="update messages set isGet=1 where getter='$sender' and sender='$getter'";
	$con = mysqli_connect('localhost','root','','erp');
	if (!$con){
		die('Could not connect: ' . mysqli_error($con));
	}

	mysqli_select_db($con,"erp");
	$con->set_charset("utf8");

	$result = mysqli_query($con,$sql);	

	mysqli_close($con);


	date_default_timezone_set("Asia/Shanghai");
	file_put_contents($logPath, "访问时间：".date("Y.m.d h:i:sa")." 返回的数组长度：".count($ajaxResult)."\r\n\n",FILE_APPEND);
	//file_put_contents($logPath, "信息查找结果：".$test."Num:".count($ajaxResult)."-".$sql."\r\n\n",FILE_APPEND);


	$i=0;
	$messageInfo = "<meses>";

	//出现未知错误无法进入循环2014.12.26 09:00:02pm
	// for ($a=0; $a <=count($ajaxResult) ; $a++) { 
	// 		$value = $ajaxResult[$a];
	// 		//可以正常读取无乱码数据并发送
	// 		$messageInfo .="<mesid>{$value["id"]}</mesid>";
	// 		$messageInfo .="<sender>{$value["sender"]}</sender>";
	// 		$messageInfo .="<getter>{$value["getter"]}</getter>";
	// 		$messageInfo .="<con>{$value["content"]}</con>";
	// 		$messageInfo .="<sendTime>{$value["sendTime"]}</sendTime>";
	// }


/**/	
	//出现未知错误无法进入循环2014.12.26 08:53:02pm
	foreach ($ajaxResult as $value) {
		$i++;
		//可以正常读取无乱码数据并发送
		$messageInfo .="<mesid>".$value["id"]."</mesid>";
		$messageInfo .="<sender>".$value["sender"]."</sender>";
		$messageInfo .="<getter>".$value["getter"]."</getter>";
		$messageInfo .="<con>".$value["content"]."</con>";
		$messageInfo .="<sendTime>".$value["sendTime"]."</sendTime>";
		//可以正常读取无乱码数据并发送
		// $messageInfo .="<mesid>{$value["id"]}</mesid>";
		// $messageInfo .="<sender>{$value["sender"]}</sender>";
		// $messageInfo .="<getter>{$value["getter"]}</getter>";
		// $messageInfo .="<con>{$value["content"]}</con>";
		// $messageInfo .="<sendTime>{$value["sendTime"]}</sendTime>";		
		//基本测试正常
		// $messageInfo .="<mesid>123</mesid>";
		// $messageInfo .="<sender>123</sender>";
		// $messageInfo .="<getter>123</getter>";
		// $messageInfo .="<con>123</con>";
		// $messageInfo .="<sendTime>123</sendTime>";		
	}
	
	$messageInfo .= "</meses>";

	file_put_contents($logPath, "循环次数：".$i." RESULT:".$messageInfo."\r\n\n",FILE_APPEND);
	echo $messageInfo;

	
?>