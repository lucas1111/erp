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
			<li class="sub-header"><strong>Order Center</strong></li>
		</ol>

		<ul class="list-unstyled">
			<li><label><h3>销售清单</h3>【请点击下列清单，查看详情！】</label>
				<ol >
				<?php
					$i=0;
					foreach ($result as $value) {
						echo "<li><a href='/?action=salesList&num=".$i."'>销售编号：".$value['SellID'].'  商品名称：'.$value['GoodsName']."</a></li>";
						$i++;
					}
				?>
				</ol>
			</li>
		</ul>

		<?php 
			$_SESSION['data']=$result;
			var_dump(count($result));
			//var_dump($result);
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