<?php
	require("mainframe.inc.php");

	if(0){
		echo '	<div class="alert alert-danger" role="alert">
					Oh snap! Change a few things up and try submitting again.
				</div>';
	}

?>
	<hr>
	<div class="container">

		<div class="row row-offcanvas row-offcanvas-right">

			<div class="col-xs-12 col-sm-9">	

				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="display: block;">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					</ol>
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">						
						<?php 					
							$picArr = array();
							for($a=1;$a <= 13 ;$a++)
								$picArr[$a-1] = "picstrap".$a;

							$picRand = array_rand($picArr,3);

							for($a=0;$a < 3;$a++)
								$pic[]= $picArr[$picRand[$a]];

							for($a=0;$a <= 2;$a++){
								$active = $a == 0 ? ' active ' : '';
								echo '<div class="item '.$active.'">';
								echo '<img src="./../resource/img/'.$pic[$a].'.jpg" alt="p'.($a+1).'" height="100%">';
								echo '<div class="carousel-caption">';
								echo '<h1>PICTURE: '.($a+1).'</h1>';
								echo "</div>";
								echo "</div>";									   
							}

						?>						
					</div>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>



	<hr>


				<div class="row col-sm-12">
				    <div class="col-sm-4 ">
				      <h3>个人中心</h3>
				      <p><font color='red'>功能已开通！</font></p>
				      <p>
				      	<a class="btn btn-default" href="/?action=personalCenter" role="button">
				      		Go &raquo;
				        </a>
				  	  </p>
				    </div><!--/span-->

				    <div class="col-sm-4 ">
				      <h3>文件管理</h3>
				      <p><font color='red'>功能已开通！</font></p>
				      <p>
				      	<a class="btn btn-default" href="/?action=fileManagement" role="button">
				      		Go &raquo;
				      	</a>
				      </p>
				    </div><!--/span-->

				    <div class="col-sm-4 ">
				      <h3>站内联系</h3>
				      <p><font color='red'>功能已开通！</font></p>
				      <p>
				      	<a class="btn btn-default" href="/?operate=infoCheck&checkType=contact" role="button">
				      		Go &raquo;
				      	</a>
				      </p>
				    </div><!--/span-->

				</div>

				<div class="row col-sm-12">

				    <div class="col-sm-4">
				      <h3>订单中心</h3>
				      <p><font color='red'>功能已开通！</font></p>
				      <p>
				      	<a class="btn btn-default" href="/?operate=infoCheck&checkType=orderCenter" role="button">
				      		Go &raquo;
				      	</a>
				      </p>
				    </div><!--/span-->

				    <div class="col-sm-4 ">
				      <h3>报表统计</h3>
				      <p><font color='red'>功能已开通！</font></p>
				      <p>
				      	<a class="btn btn-default" href="/?operate=infoCheck&checkType=reportForm" role="button">
				      		Go &raquo;
				      	</a>
				      </p>
				    </div><!--/span-->

				    <div class="col-sm-4 ">
				      <h3>数据备份</h3>
				      <p><font color='red'>功能已开通！</font></p>
				      <p>
				      	<a class="btn btn-default" href="/?action=dataBackup" role="button">
				      		Go &raquo;
				      	</a>
				      </p>
				    </div><!--/span-->

				</div><!--/row-->

			</div><!--/.col-xs-12.col-sm-9-->



			<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
				<?php
					$params = array();
					if (isset($_GET['year']) && isset($_GET['month'])) {
					    $params = array(
					        'year' => $_GET['year'],
					        'month' => $_GET['month'],
					    );
					}
					//$params['url']  = '/?action=management';
					require_once("calendar.inc.php");
					echo '<div style="align:center">';
						$cal = new Calendar($params);
	                	$cal->display();
                	echo "</div>";
				?>
				<div class=" list-group">
					<a href="#" class="list-group-item active">CHECK&nbsp;&nbsp;&nbsp;INFO</a>
					<a href="/?operate=infoCheck&checkType=staffRecords" class="list-group-item">
						Go&raquo;<span class="glyphicon glyphicon-user">：StaffRecords</span>
					</a>
					<a href="/?operate=infoCheck&checkType=supplierInformation" class="list-group-item">
						<span class="glyphicon glyphicon-earphone">&raquo;</span>
						<span class="glyphicon glyphicon-user">：SupplierInformation</span>
						<font color='red'>未完善！</font>
					</a>
					<a href="/?operate=infoCheck&checkType=purchaseControl" class="list-group-item">
						<span class="glyphicon glyphicon-credit-card">&raquo;</span>
						<span class="glyphicon glyphicon-shopping-cart">：PurchaseControl</span>
						<font color='red'>未完善！</font>
					</a>
					<a href="/?operate=infoCheck&checkType=salesStatus" class="list-group-item">
						<span class="glyphicon glyphicon-shopping-cart">&raquo;</span> 
						<span class="glyphicon glyphicon-usd">：SalesStatus</span>
						<font color='red'>未完善！</font>
					</a>
					<a href="/?operate=infoCheck&checkType=returnManagement" class="list-group-item">
						<span class="glyphicon glyphicon-gift">&raquo;</span> 
						<span class="glyphicon glyphicon-retweet">：ReturnManagement</span>
						<font color='red'>未完善！</font>
					</a>
					<a href="/?operate=infoCheck&checkType=stockControl" class="list-group-item">
						<span class="glyphicon glyphicon-inbox">&raquo;</span> 
						<span class="glyphicon glyphicon-compressed">：StockControl</span>
						<font color='red'>未完善！</font>
					</a>
				</div>
			</div><!--/.sidebar-offcanvas-->

		</div><!--/row-->

		<hr>

        <footer>
        	<p>&copy; Company 2014</p>
        </footer>

    </div><!--/.container-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/style/bootstrap/js/jquery.js"></script>
    <script src="/style/bootstrap/js/bootstrap.js"></script>
    <script src="/style/bootstrap/js/myholder/holder.js"></script>
  </body>
</html>