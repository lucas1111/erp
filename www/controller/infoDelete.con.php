<?php
	require_once("model/DBProcessor.class.php");
	//$_GET["checkType"];
	//var_dump("成功转到！".$_GET["checkType"]);
	isset($_GET["checkType"]) ? $checkType = $_GET["checkType"]:$checkType = "";
	$table="staffinfo";
	$turnTo="staffRecords";
	switch ($checkType) {
		case 'staffRecords':$table="staffinfo";$turnTo=$checkType;break;
		case 'supplierInformation':$table="tb_company";$turnTo=$checkType;break;
		case 'purchaseControl':$table="tb_jhgoodsinfo";$turnTo=$checkType;break;
		case 'salesStatus':$table="tb_sellgoods";$turnTo=$checkType;break;
		case 'returnManagement':$table="tb_thgoodsinfo";$turnTo=$checkType;break;
		case 'stockControl':$table="tb_kcgoods";$turnTo=$checkType;break;		
		default:
			$table=null;$turnTo="staffRecords";
			break;
	}

	if(isset($_GET["id"])&&$_GET["id"]!=$_SESSION['id']){
		if(!empty($_GET["id"])){			
				//echo "<script>alert('The User Can Be Delete!');</script>";
				if($table!=null){
					$recordDelete = new DBProcessor();
					$deleteResult = $recordDelete->deleteByID($table,$_GET["id"]);
				}
				if($deleteResult){
					echo "<script>alert('Delete Record completed!');
						parent.location.href='/?operate=infoCheck&checkType=".$turnTo."';</script>";	  
				}		
		}

	}else{
		echo "<script>alert('Can Not Delete The Online User!');
			parent.location.href='/?operate=infoCheck&checkType=".$turnTo."';</script>";	
		//echo "<script>parent.location.href='/?operate=infoCheck&checkType=".$turnTo."';</script>";		
	}
?>