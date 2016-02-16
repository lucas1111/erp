<?php
	require("mainframe.inc.php");
?>	

<!--
enctype 属性规定在发送到服务器之前应该如何对表单数据进行编码。
属性值：
1.application/x-www-form-urlencoded
	描述：在发送前编码所有字符（默认）
2.multipart/form-data
	描述：不对字符编码。在使用包含文件上传控件的表单时，必须使用该值。
3.text/plain
	描述：空格转换为 "+" 加号，但不对特殊字符编码。
注.默认地，表单数据会编码为 "application/x-www-form-urlencoded"。就是说，在发送到服务器之前，所有字符都会进行编码（空格转换为 "+" 加号，特殊符号转换为 ASCII HEX 值）。
-->
	<hr>
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="/"><span class="glyphicon glyphicon-home">Home</span></a></li>
			<li><a href="/">Management</a></li>
			<li class="sub-header"><strong>Files-Management</strong></li>
		</ol>

		<div class="row">
			<form role="form" enctype="multipart/form-data" action="" method="POST">
				<div class="form-group">
					<label for="exampleInputFile">PIC UPLOAD</label>
					<input type="hidden" name="MAX_FILE_SIZE" value="100000">
					<input type="file"  name="uploadedfile">
					<p class="help-block">请上传小于512KB的图片文件。可上传的图片类型为：gif/jpeg/pjpeg</p>
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
		<br>

<?php
	
/*	
	basename(path,suffix) 函数返回路径中的文件名部分。
	1.path 必需。规定要检查的路径。
	2.suffix 可选。规定文件扩展名。如果文件有 suffix，则不会输出这个扩展名。
	实例：
		$path = "/testweb/home.php";
		//显示带有文件扩展名的文件名
		echo basename($path);
		//显示不带有文件扩展名的文件名
		echo basename($path,".php");
	输出为：
		home.php
		home

	file_exists(path)函数检查文件或目录是否存在。
		如果指定的文件或目录存在则返回 true，否则返回 false。
		path 必需。规定要检查的路径。

	move_uploaded_file(file,newloc)函数将上传的文件移动到新位置。若成功，则返回 true，否则返回 false。
		1.file 必需。规定要移动的文件。
		2.newloc 必需。规定文件的新位置。
		注释：本函数仅用于通过 HTTP POST 上传的文件。
		注意：如果目标文件已经存在，将会被覆盖。
*/
		
	if(isset($_FILES['uploadedfile'])){

		if ((($_FILES["uploadedfile"]["type"] == "image/gif")
		|| ($_FILES["uploadedfile"]["type"] == "image/jpeg")
		|| ($_FILES["uploadedfile"]["type"] == "image/pjpeg"))
		&& (($_FILES["uploadedfile"]["size"]/1024) < 512))
		{
			if ($_FILES["uploadedfile"]["error"] > 0){
				$error='';
				switch($_FILES["uploadedfile"]['error']) {   

				    case 1:// 文件大小超出了服务器的空间大小    
				        $error = "The file is too large (server).";break;    

					case 2:// 要上传的文件大小超出浏览器限制    
				        $error = "The file is too large (form).";break;       
				    case 3:// 文件仅部分被上传    
				        $error = "The file was only partially uploaded.";break;       
				    case 4:// 没有找到要上传的文件    
				        $error = "No file was uploaded.";break;       
				    case 5: // 服务器临时文件夹丢失    
				        $error = "The servers temporary folder is missing.";break;      
				    case 6:// 文件写入到临时文件夹出错    
				        $error = "Failed to write to the temporary folder.";break;    
				}	

				//echo "Return Code: " . $_FILES["uploadedfile"]["error"] . $error."<br />";
				echo "<font color='red'>ERROR: ". $error."</font><br />";

			}else{
				echo "<font color='green'>";
				echo "Upload: " . $_FILES["uploadedfile"]["name"] . "<br />";
				echo "Type: " . $_FILES["uploadedfile"]["type"] . "<br />";
				echo "Size: " . ($_FILES["uploadedfile"]["size"] / 1024) . " Kb<br />";
				echo "</font>";
				//echo "Temp file: " . $_FILES["uploadedfile"]["tmp_name"] . "<br />";

				if (file_exists("upload/" . $_FILES["uploadedfile"]["name"])){
					echo "<font color='red'>已存在相同文件或同名，请确认文件无误或修改文件名后再次上传！ </font>";
				}else{
					move_uploaded_file($_FILES["uploadedfile"]["tmp_name"],"upload/" . $_FILES["uploadedfile"]["name"]);
					//echo "Stored in: " . "upload/" . $_FILES["uploadedfile"]["name"];
					echo "<font color='green'>Upload Compelete!</font>";
					echo '<img src="./../upload/'.$_FILES["uploadedfile"]["name"].'" class="img-responsive" alt="Image">';
				}
			}
		}else{
			echo "<font color='red'>ERROR OCCUR: Invalid file!</font>";
		}
	}
?>


    </div><!--/.container-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/style/bootstrap/js/jquery.js"></script>
    <script src="/style/bootstrap/js/bootstrap.js"></script>
    <script src="/style/bootstrap/js/myholder/holder.js"></script>
  </body>
</html>