<?php
	require("mainframe.inc.php");
?>	
<style type="text/css">

.footer {
  position: absolute;
  bottom: 0%;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 30px;
  background-color: #f5f5f5;
}

</style>

	<hr>
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="/"><span class="glyphicon glyphicon-home">Home</span></a></li>
			<li><a href="/">Management</a></li>
			<li class="sub-header"><strong>Report Form</strong></li>
		</ol>
		<h4>公司男女比例图</h4>
		<h6>蓝色区域代表男性，红色区域代表女性</h6>
		<img src="./../view/reportForm.pic.php" class="img-responsive" alt="Report Form Image">


		<?php 
			//var_dump($result);
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
				//$ratio = intval($male/($male+$female)*360);
				//var_dump($ratio);
				$ratio = intval($male/($male+$female)*100);
				return $ratio;

			}

			$ratio = getData();
			//var_dump(getData());
			echo "男女比例为==>男 = ".$ratio."% — 女= ".(100-$ratio)."%";
		 ?>



    </div><!--/.container-->

    <div class="footer">
      <div class="container">
        <p>&copy; Company 2014</p>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/style/bootstrap/js/jquery.js"></script>
    <script src="/style/bootstrap/js/bootstrap.js"></script>
    <script src="/style/bootstrap/js/myholder/holder.js"></script>
  </body>
</html>