<?php
//phpinfo();

session_start();

//页面访问权限部分
	if(isset($_GET['action'])){
		//从url中取出action参数，如果没有提供action参数，就设置一个默认的'home'作为参数
		$action=$_GET['action']==''?'home':$_GET['action'];
		//根据$action参数调用不同的代码文件，从而满足单一入口实现对应的不同的功能
		//登录状态下限制访问登录页（首页）
		if(isset($_SESSION['logionState'])&&$action!='home'){
			require_once('view/'.$action.'.php');
		}else if($action=='register'){
			//非登录状态下保持注册页面可访问
			require_once('view/'.$action.'.php');
		}else{
			//非登录状态下默认访问首页
			require_once('view/home.php');
			echo" <script>alert('Please login!')</script>";			
		}
	}else if(isset($_SESSION['logionState'])&&isset($_GET['operate'])||isset($_GET['operate'])&&$_GET['operate']=='login'||isset($_GET['operate'])=="register"){
		//数据操作部分

		$operate=$_GET['operate']==''?'null':$_GET['operate'];
		if($operate!='null'){
			require_once('controller/'.$operate.'.con.php');
			//echo "yes";
		}

	}else if(isset($_GET['logout'])){ 
		//账户登出部分

		if($_GET['logout']=="logout"){

			$user=$_GET['user'];
			/*将用户登入状态改为登出*/
			$logoutsql="update staffinfo set loginStatus=0 where staffName='$user'";
			$logoutCon = mysqli_connect('localhost','root','root','erp');
			if (!$logoutCon){
				die('Could not connect: ' . mysqli_error($logoutCon));
			}
			mysqli_select_db($logoutCon,"erp");
			$logoutCon->set_charset("utf8");
			$result = mysqli_query($logoutCon,$logoutsql);	
			mysqli_close($logoutCon);


			session_destroy();
		    //unset($_SESSION['logionState']);
		   // unset($_SESSION['username']);
		    echo "<script> parent.location.href='/';</script>";
		    //exit;			
		}

	}else{
		
		//无跳转目的访问则默认访问首页
		$_GET['action']='';
		$action=$_GET['action']==''?'home':$_GET['action'];
		//在登录状态下的无跳转目的访问则默认访问功能管理页面
		if(isset($_SESSION['logionState'])&&$action=='home'){
			require_once('view/management.php');
		}else{
			require_once('view/'.$action.'.php');
		}			
	}








?>

