<?php
	require("mainframe.inc.php");
?>	
<style type="text/css">

.footer {
  position: relative;
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
			<li class="sub-header"><strong>Personnal Center</strong></li>
		</ol>
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">

				<ul class="nav nav-tabs" role="tablist">
				  <li role="presentation" class="active"><a href="#">Profile</a></li>
				  <li role="presentation"><a href="#">Messages <span class="badge">3</span></a></li>
				  <li role="presentation"><a href="#">Setting</a></li>
				</ul>
				<br/><br/>

					<div class="row">
						<div class="col-sm-3 placeholder placeholders">
							<img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Avatar">
							<h4><span class="glyphicon glyphicon-user">USER:</span><?php echo $_SESSION['username']?></h4>
							<br/>
							<span class="text-muted"><strong>MY-OATH:</strong>You can You up, No can No BB!</span>
						</div>
						<div class="col-sm-9 placeholder">
						
							<form class="form-horizontal" role="form">

								<div class="form-group">
									<label class="col-sm-offset-1 col-sm-2 control-label">Sex</label>
									<div class="col-sm-offset-1 col-sm-8">
										<p class="form-control-static">
										<?php echo $_SESSION['staffSex']==1?'male':'female';?>
										</p>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-offset-1 col-sm-2 control-label">E-mail</label>
									<div class="col-sm-offset-1 col-sm-8">
										<p class="form-control-static">
											<?php echo $_SESSION['staffEmail'];?>
										</p>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-offset-1 col-sm-2 control-label">Birthday</label>
									<div class="col-sm-offset-1 col-sm-8">
										<p class="form-control-static">
											<?php echo $_SESSION['staffBirthday'];?>
										</p>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-offset-1 col-sm-2 control-label">Telephone</label>
									<div class="col-sm-offset-1 col-sm-8">
										<p class="form-control-static">
											<?php echo $_SESSION['staffTelephone'];?>
										</p>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-offset-1 col-sm-2 control-label">Department</label>
									<div class="col-sm-offset-1 col-sm-8">
										<p class="form-control-static">
											<?php echo $_SESSION['staffDepartment'];?>
										</p>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-offset-1 col-sm-2 control-label">UserAddress</label>
									<div class="col-sm-offset-1 col-sm-8">
										<p class="form-control-static">
											<?php echo $_SESSION['staffAddress'];?>
										</p>
									</div>
								</div>

							</form>						
						</div>
					</div>
				
				<hr>
				<br>

			</div><!--/.col-xs-12.col-sm-9-->
			<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
				<div class="sidebar-module sidebar-module-inset">
				<h4>About</h4>
				<p>Etiam porta <em>sem malesuada magna</em>mollis euismod.
				 Cras mattis consectetur purus sit amet fermentum.
				 Aenean lacinia bibendum nulla sed consectetur.</p>
				</div>
				<div class="list-group">
					<a  class="list-group-item active">Link</a>
					<a href="#" class="list-group-item">Link</a>
					<a href="#" class="list-group-item">Link</a>
					<a href="#" class="list-group-item">Link</a>
					<a href="#" class="list-group-item">Link</a>
					<a href="#" class="list-group-item">Link</a>
					<a href="#" class="list-group-item">Link</a>
				</div>
			</div><!--/.sidebar-offcanvas-->

		</div><!--row row-offcanvas row-offcanvas-right-->


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