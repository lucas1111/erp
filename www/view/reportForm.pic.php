<?php
	// $im=imagecreatetruecolor(400,300);
	// $red=imagecolorallocate($im,255,0,0);
	// 圆
	// imageellipse($im,20,20,20,20,$red);
	// 直线
	// imageline($im,0,0,400,300,$red);
	// 矩形
	// imagerectangle($im,2,2,40,50,$red);
	// 填充矩形
	// imagefilledrectangle($im,2,2,40,50,$red);
	// 弧线
	// imagearc($im,100,100,50,50,180,270,$red);
	// 扇形
	// imagefilledarc($im,100,100,80,50,180,270,$red,IMG_ARC_PIE);
	
	// 拷贝图片到画布
	// 1.加载源图片
	// $srcImage=imagecreatefromgif("2.GIF");
	// 这里我们可以使用一个getimagesize()
	// $srcImageInfo=getimagesize("2.GIF");

	// 拷贝源图片到目标画布
	// imagecopy($im,$srcImage,0,0,0,0,$srcImageInfo[0],$srcImageInfo[1]);

	// 写字
	// $str="hello,world,显示中文";
	// imagestring($im,5,0,0,"hello,world,中文",$red); 
	// 在字体库中去找中文
	// imagettftext($im,20,10,50,50,$red,"simhei.ttf",$str);
	// header("content-type: image/png");
	// imagepng($im);
	// imagedestory($im);

	function getData(){
		require_once("model/DBProcessor.class.php");
		$table="staffinfo";
		$registerSubmit = new DBProcessor();
		$result = $registerSubmit->getAllRecords("$table");	
		$ratio = 0;
		$male = $female =0;

		foreach ($result as  $value){
			if($value['staffSex']==1)
				$male++;
			else
				$female++;
		}
		$ratio = intval($male/($male+$female)*360);
		//var_dump($ratio);
		return $ratio;

	}


	function setPic($im,$i,$Color1,$Color2){
		$ratio = getData();
		imagefilledarc($im,300,$i,300,150,0,$ratio,$Color1,IMG_ARC_PIE);
		imagefilledarc($im,300,$i,300,150,$ratio,360,$Color2,IMG_ARC_PIE);	
	}


	function reportForm($im){
		//1.画布
		//$im=imagecreatetruecolor(600,300);

		//创建颜色
		$red=imagecolorallocate($im,255,106,106);
		$darkred=imagecolorallocate($im,205,85,85);
		$blue=imagecolorallocate($im,99,184,255);
		$darkblue=imagecolorallocate($im,79,148,205);	
		$white=imagecolorallocate($im,255,255,255);

		//背景填充
		imagefill($im,0,0,$white);

		//2.画出多个扇形
		for($i=160;$i>=150;$i--){

			// setPic($im,$i,$darkblue,$darkred);
			
			// $ratio = getData();
			// if(getData())
			// imagefilledarc($im,300,$i,300,150,0,$ratio,$darkblue,IMG_ARC_PIE);
			// imagefilledarc($im,300,$i,300,150,$ratio,360,$darkred,IMG_ARC_PIE);

			imagefilledarc($im,300,$i,300,150,0,108,$darkblue,IMG_ARC_PIE);
			imagefilledarc($im,300,$i,300,150,108,360,$darkred,IMG_ARC_PIE);
		}

		//顶层图像
		imagefilledarc($im,300,150,300,150,0,108,$blue,IMG_ARC_PIE);
		imagefilledarc($im,300,150,300,150,108,360,$red,IMG_ARC_PIE);

		//输出图片
		// header("content-type: image/png");
		// imagepng($im);
		// imagedestory($im);		
	}



	// $temp = getData();
	// reportForm($temp);
	//reportForm();





	//1.画布
	$im=imagecreatetruecolor(600,300);
	reportForm($im);
	header("content-type: image/png");
	imagepng($im);
	imagedestory($im);


?>