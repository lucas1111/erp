<?php
	require("mainframe.inc.php");
	$value = $_SESSION['data'];

	isset($_GET["num"])?$_GET["num"]:0;
	//var_dump($value[$_GET["num"]]["GoodsName"]);
?>
<hr>
<div class="container">

	<ol class="breadcrumb">
		<li><a href="/"><span class="glyphicon glyphicon-home">Home</span></a></li>
		<li><a href="/">Management</a></li>
		<li><a href="/?operate=infoCheck&checkType=orderCenter">Order Center</a></li>
		<li class="sub-header"><strong>Sales List</strong></li>
	</ol>

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->

			<div class="space-6"></div>

			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
								<div class="row">
									<div class="col-sm-9 pull-left">
										<h3 class="grey lighter pull-left position-relative">
											<span class="glyphicon glyphicon-leaf">SALES-LIST</span>
										</h3>
									</div>


									<div class="col-sm-3 pull-right">
										<span >SALES-ID:</span>
										<span >
											<font color="red">
												<?php echo "#".$value[$_GET["num"]]["SellID"];?>
											</font>
										</span>

										<br />
										<span >Date:</span>
										<span >											
											<font color="red">
												<?php echo "#".$value[$_GET["num"]]["SellGoodsTime"];?>
											</font>
										</span>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-6">
										<div class="row">
											<div class="col-xs-11 label label-lg label-info">
												<b>Company Info</b>
											</div>
										</div>

										<div class="row">
											<ul class="list-unstyled spaced">
												<li>
													<i class="icon-caret-right blue"></i>
													Street, City
												</li>

												<li>
													<i class="icon-caret-right blue"></i>
													Zip Code
												</li>

												<li>
													<i class="icon-caret-right blue"></i>
													Phone:
													<b class="red">111-111-111</b>
												</li>
											</ul>
										</div>
									</div><!-- /span -->

									<div class="col-sm-6">
										<div class="row">
											<div class="col-xs-11 label label-lg label-success">
												<b>Customer Info</b>
											</div>
										</div>

										<div>
											<ul class="list-unstyled  spaced">
												<li>
													<i class="icon-caret-right green"></i>
													Street, City
												</li>

												<li>
													<i class="icon-caret-right green"></i>
													Zip Code
												</li>

												<li>
													<i class="icon-caret-right green"></i>
													Contact Info
												</li>
											</ul>
										</div>
									</div><!-- /span -->
								</div><!-- row -->

								<br>

								<div>
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th class="center">#</th>
												<th>Product</th>
												<th>NUM</th>
												<th>UnitPrice</th>
												<th>Discount</th>
												<th>AcountDue</th>
												<th>ActualPay</th>
												<th>Total</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<td class="center">1</td>

												<td>
													<a href="#">
													<?php echo $value[$_GET["num"]]["GoodsName"];?>
													</a>
												</td>
												<td><?php echo $value[$_GET["num"]]["SellGoodsNum"];?></td>
												<td><?php echo $value[$_GET["num"]]["SellPrice"];?></td>
												<td> --- </td>
												<td><?php echo $value[$_GET["num"]]["SellNeedPay"];?></td>
												<td><?php echo "￥".$value[$_GET["num"]]["SellHasPay"];?></td></td>
												<td><?php echo "￥".$value[$_GET["num"]]["SellHasPay"];?></td></td>
											</tr>
										</tbody>
									</table>
								</div>

								<div class="row">
									<div class="col-sm-5 pull-right">
										<h4 class="pull-right">
											Total amount :
											<font color="red">
												<?php echo "￥".$value[$_GET["num"]]["SellHasPay"];?>
											</font>
										</h4>
									</div>
									<div class="col-sm-7 pull-left"></div>
								</div>

								<br>
								<div class="well">
									<?php echo "备注信息：".$value[$_GET["num"]]["SellRemark"];?>
								</div>


				</div>
			</div>

			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/style/bootstrap/js/jquery.js"></script>
    <script src="/style/bootstrap/js/bootstrap.js"></script>
    <script src="/style/bootstrap/js/myholder/holder.js"></script>
  </body>
</html>