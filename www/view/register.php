<?php
require("mainframe.inc.php");
?>
<div class="row">
			<ol class="col-sm-offset-1 col-sm-10 breadcrumb">
				<li><a href="/">Home</a></li>
				<li class="sub-header"><strong>SIGN UP</strong></li>
			</ol>	
</div>

			<hr/>
			<form class="form-horizontal col-md-offset-3" method="post" action="/?operate=register" name="registerForm">
				<div class="row">					
					<div class="col-sm-offset-1 col-sm-10">
						<label class="col-sm-2 ">User Name</label>
						<input type="text" class="col-sm-3"  placeholder="User Name" name="staffName" 
						onblur="checkname()"  id="staffName" onchange="checkNameExist()" onkeyup="checkNameExist()">
						<div class="col-sm-5" id="divNameTip"><font color='red'>*必填*</font></div>
					</div>
				</div>
				<br>
				<div class="row">					
					<div class="col-sm-offset-1 col-sm-10">
						<label class="col-sm-2 ">Password</label>
						<input type="password" class="col-sm-3" placeholder="Password" name="password" 
						onblur="checkpassword()"  id="password" onchange="checkRetypePWD()">
						<div class="col-sm-5" id="divPasswordTip"><font color='red'>*必填*</font></div>
					</div>
				</div>
				<br>
				<div class="row">					
					<div class="col-sm-offset-1 col-sm-10">
						<label class="col-sm-2 ">Retype</label>
						<input type="password" class="col-sm-3" placeholder="Retype Password" 
						onblur="checkRetypePWD()"  id="RetypePWD">
						<div class="col-sm-5" id="divRetypeTip"><font color='red'>*必填*</font></div>
					</div>
				</div>
				<br>
				<div class="row">					
					<div class="col-sm-offset-1 col-sm-10">
						<label class="col-sm-2 ">E-mail</label>
						<input type="text" class="col-sm-3" placeholder="E-mail" name="staffEmail"
						onblur="checkEmail()" id="Email">
						<div class="col-sm-5" id="divEmailTip"><font color='red'>*必填*</font></div>
					</div>
				</div>
				<br>
				<div class="row">					
					<div class="col-sm-offset-1 col-sm-10">
						<label class="col-sm-2 ">Telephone</label>
						<input type="text" class="col-sm-3" placeholder="Telephone Number" name="staffTelephone" 
						onblur="checkTelephone()"  id="Telephone">
						<div class="col-sm-5" id="divTelephoneTip"><font color='red'>*必填*</font></div>
					</div>
				</div>
				<br>
				<div class="row">					
					<div class="col-sm-offset-1 col-sm-10">
						<label class="col-sm-2 ">Address</label>
						<input type="text" class="col-sm-7" name="staffAddress" id="address">
					</div>
				</div>
				<br/>
				<div class="row">					
					<div class="col-sm-offset-1 col-sm-11">
						<div class="col-sm-3">
							<label>Department&nbsp;</label>
							<select name="staffDepartment" >
								<option value="人事部门" selected>人事部门</option>
								<option value="销售部门" >销售部门</option>
								<option value="后勤部门" >后勤部门</option>	
								<option value="电算部门" >电算部门</option>
								<option value="地球防卫部" >地球防卫部</option>		
							</select>
						</div>
						<div class="col-sm-2">
							<label>Sex&nbsp;</label>
							<select name="staffSex" >
								<option value="1" selected>male</option>
								<option value="0" >female</option>			
							</select>
						</div>

						<div class="col-sm-6">
							<label>Birthday&nbsp;</label>
							<select name="BYear" >
							<?php 
								//var_dump(date('Y'));
								$year = date('Y');
								$j = 0;
								for($i=$year-65;$i<=$year;$year--){
									$j++;
									if($year==date('Y')){
										echo '<option value="'.$year.'"selected>'.$year.'</option>';
									}else{
										echo '<option value="'.$year.'">'.$year.'</option>';
									}

								}
							?>		
							</select>&nbsp;年&nbsp;&nbsp;
							<select name="BMonth" >
							<?php
								for($i=1;$i<=12;$i++){
									if($i==1){
										echo '<option value="'.$i.'"selected>'.$i.'</option>';
									}else{
										echo '<option value="'.$i.'">'.$i.'</option>';
									}
									
								}
							?>			
							</select>&nbsp;月
						</div>

					</div>
				</div>
				<br>


				<div class="row">
				    <label class="col-sm-offset-2 col-sm-3">
						&nbsp;<input type="checkbox" name="regiaterCheck" onclick="checkcBeSelected()">
						<a href="#">我已阅读并同意相关服务条款</a>
					</label>
					<button type="submit" class="btn btn-info col-md-offset-1" name="regiaterBtn" disabled="true">
					Submit</button>
				</div>

<!---->				
			</form>
		<hr/>

		<script src="/style/bootstrap/js/my.js"></script>
	    <script src="/style/bootstrap/js/jquery.js"></script>
	    <script src="/style/bootstrap/js/bootstrap.js"></script>
	    <script src="/style/bootstrap/js/myholder/holder.js"></script>
	</body> 
</html>