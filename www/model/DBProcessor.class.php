<?php
/**
*处理数据库连接及相关处理函数
*
*/
	class DBProcessor{
		protected $connection;
		protected $sql;

		public function __construct($servername='localhost',$username='root',$password='',$DB='erp'){
			//连接数据库
			$this->connection = mysqli_connect($servername,$username,$password);
			if(!$this->connection){
				die("Failed to connect the database!".mysqli_error());
			}
			//选择数据库
			mysqli_select_db($this->connection,$DB) or die("Failed to select database!".mysqli_error());
			//设置数据入库编码
 			$this->connection->set_charset("utf8");
		}

		//获取SQL语句
		public function getSQL($sql){
			$this->sql = $sql;
			return $this->sql;
		}

/*根据SQL语句进行相关操作*/
		public function processBySQL($sql){
			$result = mysqli_query($this->connection,$sql) or die(mysqli_error());
			if(!$result){
				return 0; //失败
			}else {
				if(mysqli_affected_rows($this->connection)>0){
					return 1;//执行成功
				}else{
					return 2;//表示没有行受到影响
				}
			}
		}

/*查询-函数【SELECT】*/		
		//根据表名，字段名和查询条件进行查询
		public function getRecord($table,$field,$value){
			$this->sql = "select * from $table where $field = '$value'";
			//var_dump($this->sql);
			$result =mysqli_query($this->connection,$this->sql);
			$records = mysqli_fetch_array($result);
			return $records;
		}
		//根据表名查询所有记录
		public function getAllRecords($table){
			$this->sql = "select * from $table";
			$result =mysqli_query($this->connection,$this->sql);
			//var_dump($result);
			while($Record = mysqli_fetch_array($result)){
				$allRecord[] = $Record;
			 }
			//var_dump($allRecord);
			return $allRecord;
		}

/*新增-函数【INSERT】*/	
		//新增一条记录
		public function addOneRecord(){
			$this->sql = "insert ";
		}
		//新增全部提交的数据
		public function addAllRecord($table,$dataArr,$FirstKey){
			$time = date('Y-m-d H:i:s',time());
			$i=1;
			$j=0;
			foreach($dataArr as $key=>$value){ 
				if($i==1){
					$sqlStr="INSERT INTO $table (staffName, Authorization,created_at,updated_at)VALUES('$FirstKey','level1','$time','$time')";
				}else{
					$sqlStr="UPDATE $table SET $key = '$value' where staffName='$FirstKey'";
				}

				$i++;
			    $result = mysqli_query($this->connection,$sqlStr);	
				if(!$result){
					$j++;
					echo "<script>alert('Register Failed !Please try again later!code:".$i."');
						parent.location.href='/';</script>";
					return false;	    
				} 		
			}
			if($j==0){
				return true;
			}

		}


/*更新-函数【UPDATE】*/
		public function updateAllRecord($table,$dataArr,$FirstKey){
			$time = date('Y-m-d H:i:s',time());
			$j=0;
			foreach($dataArr as $key=>$value){ 
				$sqlStr="UPDATE $table SET $key = '$value',updated_at='$time' where staffName='$FirstKey'";
			    $result = mysqli_query($this->connection,$sqlStr);	
				if(!$result){
					$j++;
					echo "<script>alert('Register Failed !Please try again later!code:".$i."');
						parent.location.href='/';</script>".mysqli_error();
					return false;	    
				} 		
			}
			if($j==0){
				return true;
			}

		}

/*删除-函数【DELETE】*/	
		public function deleteByID($table,$id){
				$sqlStr="DELETE FROM $table WHERE id = '$id'";
			    $result = mysqli_query($this->connection,$sqlStr) or die(mysqli_error());	
				if(!$result){
					echo "<script>alert('Delete Records Failed !Please try again later!');
						parent.location.href='/';</script>".mysqli_error();
					return false;	    
				}else{
					return true;
				}

		}


		//析构函数
		function __destruct(){
			if (!$this->connection)
			{
				die('Could not connect: ' . mysqli_error());
			}
			mysqli_close($this->connection);
		}


	}



?>