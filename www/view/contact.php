<?php
	require("mainframe.inc.php");
	$userName = $_SESSION['username'];
	//var_dump($userName);
?>	


	<hr>
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="/"><span class="glyphicon glyphicon-home">Home</span></a></li>
			<li><a href="/">Management</a></li>
			<li class="sub-header"><strong>Online Contact</strong></li>
		</ol>


		<div class="row">

			<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">

				<div class="list-group">
					<a  class="list-group-item active">Contacts List【<?php echo count($result)-2;?>】</a>
					<?php
						$i=1;
						foreach ($result as $value) {
							if($value["staffName"]!=$_SESSION['username']&&$value["staffName"]!='admin')
							echo '<a  class="list-group-item" value="1" onclick="showCurrentContact(this)">'.$value["staffName"].'</a>';
							//echo "<br>".$i++.". User: ".$value["staffName"];
						}
						//var_dump($result);
					?>
				</div>
			</div><!--/.sidebar-offcanvas-->

			<div class="col-xs-12 col-sm-9">
				<label>请在左侧点击选择联系人！</label>
				<hr>
				<label>当前联系人为：</label><font color="red"><span id="currentContact">未选择</span></font>
				<textarea class="form-control" rows="10" readOnly="true" id="myContents"></textarea>
				<hr>
				<font color="red">当前用户：<span id="userName" class=><?php echo $userName;?></span></font>
				<hr>
				<div class="row">
					<div class="col-sm-offset-1 col-xs-8">
						<input type="text" class="form-control" id="con" placeholder="Enter Here...">
					</div>
					<div class="col-xs-3">
						<button type="submit" class="btn btn-default" onclick="sendMessage()">
							<span class="glyphicon glyphicon-send"></span>Send
						</button>
					</div>
				</div>
			</div>

		</div><!--row-->

<hr>
    </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/style/bootstrap/js/my.js"></script>
    <script src="/style/bootstrap/js/myAjax.js"></script>
    <script src="/style/bootstrap/js/jquery.js"></script>
    <script src="/style/bootstrap/js/bootstrap.js"></script>
    <script src="/style/bootstrap/js/myholder/holder.js"></script>
  </body>
</html>