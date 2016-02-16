<?php
	require("mainframe.inc.php");
?>	


	<hr>
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="/"><span class="glyphicon glyphicon-home">Home</span></a></li>
			<li><a href="/">Management</a></li>
			<li class="sub-header"><strong>Data Backup</strong></li>
		</ol>
		<?php
			if($_SESSION['Authorization']=='admin'){
				echo '<a href="/?operate=dataBackup" >
					<button type="submit" class="btn btn-default">数据备份</button>
				</a>';

			}else{
				echo '<a>
					<button type="submit" class="btn btn-default" disabled="disabled">
					数据备份:<font color="red">您无操作权限</font>
					</button>
				</a>';
			}
		?>		 


		<?php
			if(isset($_SESSION['messages'])){
				echo "<br><br>".$_SESSION['messages'];
			}

			echo "<br><br>历史备份文件：";
			//php获取目录所有文件并将结果保存到数组
			foreach(glob("./backup/*") as $d){
				$tmp=explode('.',$d);
				$k=end($tmp);
				//判断是否为文件
				if(is_file($d)){
					$files[]=$d;
				}
			}
			//echo '<pre>';print_r($files);
			$i=1;
			foreach ($files as  $value) {
				echo "<br>【".$i.".】".basename($value);
				$i++;
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