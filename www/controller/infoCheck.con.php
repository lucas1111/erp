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
		case 'reportForm':$table="staffinfo";$turnTo=$checkType;break;
		case 'orderCenter':$table="tb_sellgoods";$turnTo=$checkType;break;
		case 'contact':$table="staffinfo";$turnTo=$checkType;break;				
		default:
			$table="staffinfo";$turnTo="staffRecords";
			break;
	}

	$registerSubmit = new DBProcessor();
	$result = $registerSubmit->getAllRecords("$table");
	//var_dump($result);
	//print_r($result);
	//echo "<script> parent.location.href='/?action=".$checkType."';</script>";
	require_once('view/'.$turnTo.'.php');
?>