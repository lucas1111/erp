<?php
	require_once("model/DBProcessor.class.php");
	//$_GET["updateType"];
	//var_dump("成功转到！".$_GET["updateType"]);
	isset($_GET["updateType"]) ? $updateType = $_GET["updateType"]:$updateType = "";
	$table="staffinfo";
	$turnTo="";
	switch ($updateType) {
		case 'staffEdit':$table="staffinfo";$turnTo=$updateType;break;
		case 'staffRecords':$table="staffinfo";$turnTo=$updateType;break;
		case 'supplierInformationEdit':$table="tb_company";$turnTo=$updateType;break;
		case 'purchaseControlEdit':$table="tb_jhgoodsinfo";$turnTo=$updateType;break;
		case 'salesStatusEdit':$table="tb_sellgoods";$turnTo=$updateType;break;
		case 'returnManagementEdit':$table="tb_thgoodsinfo";$turnTo=$updateType;break;
		case 'stockControlEdit':$table="tb_kcgoods";$turnTo=$updateType;break;		
		default:
			$table=null;$turnTo="404";
			break;
	}

	if(!empty($_GET["id"])){
		$value = $_GET["id"];
		$trans = array_flip($_GET);
		$field = $trans[$_GET["id"]];
		if ($table!=null) {
			$registerSubmit = new DBProcessor();
			$result = $registerSubmit->getRecord($table,$field,$value);	
		}
		//var_dump($result);
		require_once('view/'.$turnTo.'.php');
	}

	if(!empty($_GET["submitUpdate"])){
		$updateArr=array_slice($_POST,1,5);
		$date=$_POST['BYear']."-".$_POST['BMonth'].'-00';
		$tempArr=array('staffBirthday' =>$date);
		$updateArr=array_merge($updateArr,$tempArr);
		//var_dump($_POST["staffName"]);
		if ($table!=null) {
			$updateSubmit = new DBProcessor();
			$updateResult = $updateSubmit->updateAllRecord($table,$updateArr,$_POST["staffName"]);	
		}
		if($updateResult){
			echo "<script>alert('Modify completed!');
				parent.location.href='/?operate=infoCheck&checkType=".$updateType."';</script>";	  
		}		
	}

	//var_dump($result);
	//print_r($result);
	//echo "<script> parent.location.href='/?action=".$updateType."';</script>";
	//require_once('view/'.$turnTo.'.php');
?>