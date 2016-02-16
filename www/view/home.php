<?php
require("indexframe.inc.php");
?>

	<div class="site-wrapper">
	  <div class="site-wrapper-inner">
	    <div class="container-fluid">
	      <div class="row">
	        <div class="col-md-9">
	          <div class="inner cover">
	            <h1 class="cover-heading">Supply Chain Management System</h1>
	            <p class="lead">Supply chain management (SCM) is the management of the flow of goods. It includes the movement and storage of raw materials, work-in-process inventory, and finished goods from point of origin to point of consumption. Interconnected or interlinked networks, channels and node businesses are involved in the provision of products and services required by end customers in a supply chain.......</p>
	            <p class="lead">
	              <a href="#" class="btn btn-lg btn-default">Learn more >></a>
	            </p>
	          </div>
	        </div>
	        <div class="col-md-3">
	          <div class="container-fluid">
	            <form class="form-signin" role="form" action= "/?operate=login" method= "post">              
	                <h2 class="form-signin-heading"><span class="glyphicon glyphicon-user"></span> Please Login</h2>
	                <input type="text" class="form-control" placeholder="User Name" name='username' required autofocus>
	                <input type="password" class="form-control" placeholder="Password" name='password' required>
	                <div class="checkbox">
	                <div class="row" style="display: block;">
					  <div class="col-sm-7">
					    <label>
							<input type="checkbox" value="remember-me"> Remember me
						</label>
					  </div>
					  <div class="col-sm-5">
					  	<a href="/?action=register"><span class="glyphicon glyphicon-pencil">Register</span></a>
					  </div>
				    </div>
	              </div>
	              <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	            </form>
		              	
	          </div>
	        </div>
	      </div>
	    </div>

	    <div class="cover-container">
	      <div class="mastfoot">
	        <div class="inner">
	        <p>Cover for <a href="/">ERP</a>, by <a href="">ME</a>.</p>
	        </div>
	      </div>
	    </div>
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