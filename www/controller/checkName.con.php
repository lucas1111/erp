<?php
	header("Content-Type:text/xml;charset=utf-8");
	header("Cache-Control:no-cache");

	//接收数据
	$staffName = $_GET['staffName'];

	$sql = "select * from staffinfo where staffName=?";
	//创建pdo对象
	//在MySQL命令行中使用如下命令查看MySQL默认端口：show variables like 'port';
	$myPdo = new PDO("mysql:host=localhost;port=3306;dbname=erp","root",""); 
	//设置编码
	$myPdo -> exec("set names utf8");
	//sql语句预处理
	$pdoStatement = $myPdo -> prepare($sql);
	//填入接收到的用户名和密码
	$pdoStatement -> execute(array($staffName));
	//取出结果
	$result = $pdoStatement -> fetch();

	if(empty($result)){
		echo"<font color='green'>用户名可用！</font>";
	}else{
		echo"<font color='red'>用户名已存在！</font>";		
	}

	//第三步：返回结果
	//echo "用户名为：".$staffName;
?>