<?php 
	
	/* //未知错误--备份文件内容输出为空

	$dbname="erp";
	$dbuser="root";
	$dbpwd="";
	// 设置SQL文件保存文件名 
	$filename=date("Y-m-d_H-i-s")."-".$dbname.".sql"; 
	// 获取当前页面文件路径，SQL文件就导出到此文件夹内 
	$tmpFile = (dirname(__FILE__))."\\".$filename; 
	// 用MySQLDump命令导出数据库 
	// exec("mysqldump -u$dbuser -p$dbpwd --default-character-set=utf8 $dbname > ".$tmpFile); 
	// $file = fopen($tmpFile, "r"); // 打开文件 
	// echo fread($file,filesize($tmpFile)); //读取整个文件
	// fclose($file);
	// exit;
	system('mysqldump -u$dbuser -p$dbpwd --opt $dbname >'.$tmpFile.'', $i);  
	var_dump($i);
	*/

if($_SESSION['Authorization']=='admin'){

	// 备份数据库
	$host = "localhost";
	$user = "root"; //数据库账号
	$password = ""; //数据库密码
	$dbname = "erp"; //数据库名称
	$connection = mysqli_connect($host, $user, $password);

	if(!$connection){
		// 连接mysql数据库
	    echo '数据库连接失败，请核对后再试';
	    exit;
	}
	if(!mysqli_select_db($connection,$dbname)){ 
		// 是否存在该数据库
	    echo '不存在数据库:' . $dbname . ',请核对后再试';
	    exit;
	}
	mysqli_query($connection,"set names 'utf8'");
	$mysql = "set charset utf8;\r\n";
	$q1 = mysqli_query($connection,"show tables");

	while($t = mysqli_fetch_array($q1)){

	    $table = $t[0];
	    $q2 = mysqli_query($connection,"show create table `$table`");
	    $sql = mysqli_fetch_array($q2);
	    $mysql .= $sql['Create Table'] . ";\r\n";
	    $q3 = mysqli_query($connection,"select * from `$table`");

	    while ($data = mysqli_fetch_assoc($q3)){

	        $keys = array_keys($data);
	        $keys = array_map('addslashes', $keys);
	        $keys = join('`,`', $keys);
	        $keys = "`" . $keys . "`";
	        $vals = array_values($data);
	        $vals = array_map('addslashes', $vals);
	        $vals = join("','", $vals);
	        $vals = "'" . $vals . "'";
	        $mysql .= "insert into `$table`($keys) values($vals);\r\n";
	    }
	}
	 
	//$filename = "./backup/".date("Y-m-d_H-i-s").".".$dbname.".sql"; //存放路径，默认存放到项目最外层
	$filename = "./backup/".date("Y-m-d_H-i-s").".Backup.sql"; //存放路径，默认存放到项目最外层
	$fp = fopen($filename, 'w');
	fputs($fp, $mysql);
	fclose($fp);
	//echo "数据备份成功!";
	$messages ="";
	$messages .= "数据备份成功!<br>";
	 
	$file = $filename;
	//打开文件，r表示以只读方式打开
	$handle = fopen($file,"r");
	//获取文件的统计信息
	$fstat = fstat($handle);
	//echo "文件名：".basename($file)."<br>";
	//echo "文件大小：".round(filesize("$file")/1024,2)."kb<br>";
	//echo "文件大小：".round($fstat["size"]/1024,2)."kb<br>";
	//echo "最后访问时间：".date("Y-m-d h:i:s",fileatime($file))."<br>";
	//echo "最后访问时间：".date("Y-m-d h:i:s",$fstat["atime"])."<br>";
	//echo "最后修改时间：".date("Y-m-d h:i:s",filemtime($file))."<br>";
	//echo "最后修改时间：".date("Y-m-d h:i:s",$fstat["mtime"]); 

	$messages .= "文件名：".basename($file)."<br>";
	$messages .= "文件大小：".round($fstat["size"]/1024,2)."kb<br>";
	$messages .= "最后访问时间：".date("Y-m-d h:i:s",$fstat["atime"])."<br>";
	$messages .= "最后修改时间：".date("Y-m-d h:i:s",$fstat["mtime"]);
	fclose($handle);
	$_SESSION['messages'] = $messages;
	echo "<script> parent.location.href='/?action=dataBackup';</script>";

}else{
	$_SESSION['messages'] = '<font color="red">您无操作权限!</font>';
	echo "<script> parent.location.href='/?action=dataBackup';</script>";
}

?> 