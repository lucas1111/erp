<?php
/**
*登录专用
*测试SQL注入专用
*基本-防范SQL注入：
*1.从服务器：在php.ini中把magic_quotes_gpc【这个特性在PHP5.3.0中已经废弃并且在5.4.0中已经移除了】设置为on，
*display_errors设置为off
*2.从代码入手：PHP中可采用pdo的PDO::prepare()的预处理操作
*这里需启用php.ini中的mysql扩展：extension=php_pdo_mysql.dll
*/
	$username = $_REQUEST['username'];
	$password = md5($_REQUEST['password']);

	$registerTime = "用户登录时间为：".date("Y.m.d h:i:sa")."--";
 	$registerInfo = "用户名：".$username;
	$logPath = "I:\wampserver\wamp\www\log\loginLog.log";
	//把信息输入到文件中查看
	file_put_contents($logPath, $registerTime.$registerInfo."\r\n\n",FILE_APPEND);

	//var_dump($username.'|'.$password);
	$connection='';
	$servername='localhost';
	$user='root';
	$serverpassword='';
	$DB='erp';


/**
*	//连接数据库
*	$connection = mysqli_connect($servername,$user,$serverpassword);
*	if(!$connection){
*		die("Failed to connect the database!".mysqli_error());
*	}
*	//选择数据库
*	mysqli_select_db($connection,$DB) or die("Failed to select database!".mysqli_error());
*	
*$sql = "select * from staffinfo where staffName='$username' and password='$password'";
*对应的万能密码：' or 1='1
*对应的万能用户名：'union select * from 表名/*'
*
*$sql = "select * from staffinfo where staffName=$username and password=$password";
*对应的万能密码：union select * from 表名;
*对应的万能用户名：union select * from 表名/*
*	
*/

/**加入密码比对-版本2.0

*$sql = "select password from staffinfo where staffName='$username'";
*$result = mysqli_query($connection,$sql);
	if($row=mysqli_fetch_array($result)){
		if($row[0]==$password){
			session_start();
			// store session data
			$_SESSION['logionState']='ok';
			$_SESSION['username'] = $username;
			echo "<script> parent.location.href='/?action=management';</script>";	
		}else{
			echo" <script>alert('Wrong password!Please try again!')</script>";
		}
	}else{
		echo" <script>alert('Wrong username or password!Please login again!')</script>";
	}
*/	


/* //版本1.0

	$sql = "select * from staffinfo where staffName='$username' and password='$password'";
*	//var_dump($sql);
*	//查询
*	$result = mysqli_query($connection,$sql);
	if(mysqli_num_rows($result)!=0){
		//header("Location: http://localhost/?action=management"); 
		//exit;
		session_start();
		// store session data
		$_SESSION['logionState']='ok';
		$_SESSION['username'] = $username;
		echo "<script> parent.location.href='/?action=management';</script>";
	}else{
		echo" <script>alert('Wrong username or password!Please login again!')</script>";
	}

*/

	$sql = "select * from staffinfo where staffName=? and password=?";
	//创建pdo对象
	//在MySQL命令行中使用如下命令查看MySQL默认端口：show variables like 'port';
	$myPdo = new PDO("mysql:host=localhost;port=3306;dbname=erp","root",""); 
	//设置编码
	$myPdo -> exec("set names utf8");
	//sql语句预处理
	$pdoStatement = $myPdo -> prepare($sql);
	//填入接收到的用户名和密码
	$pdoStatement -> execute(array($username,$password));
	//取出结果
	$result = $pdoStatement -> fetch();
	//var_dump($result);

	if(empty($result)){
		echo" <script charset='utf8' language='javascript' type='text/javascript'>alert('Wrong username or password!Please try again!')
		parent.location.href='/';</script>";
		/*
		echo" <script charset='utf8' language='javascript' type='text/javascript'>alert('Wrong username or password!Please try again!【用户名或密码错误！请稍后再次尝试！】')
		parent.location.href='/';</script>";
		*/
	}else if($result["loginStatus"]==0){

		/*将用户登入状态改为已登录*/
		$sql="update staffinfo set loginStatus=1 where staffName='$username'";
		$con = mysqli_connect('localhost','root','','erp');
		if (!$con){
			die('Could not connect: ' . mysqli_error($con));
		}
		mysqli_select_db($con,"erp");
		$con->set_charset("utf8");
		$Lresult = mysqli_query($con,$sql);	
		mysqli_close($con);



		//session_start();
		// store session data
		$_SESSION['logionState']='ok';
		$_SESSION['id']=$result["id"];
		$_SESSION['username'] = $username;
		$_SESSION['staffSex']=$result["staffSex"];
		$_SESSION['staffEmail']=$result["staffEmail"];
		$_SESSION['staffBirthday']=$result["staffBirthday"];
		$_SESSION['staffTelephone']=$result["staffTelephone"];
		$_SESSION['staffDepartment']=$result["staffDepartment"];
		$_SESSION['staffAddress']=$result["staffAddress"]==''?'未填写':$result["staffAddress"];
		$_SESSION['Authorization']=$result["Authorization"];
		//var_dump($_SESSION['staffAddress']);
		echo "<script> parent.location.href='/?action=management';</script>";		
	}else{
				echo" <script charset='utf-8' language='javascript' type='text/javascript'>alert('The user has been login!')
		parent.location.href='/';</script>";
	}

?>