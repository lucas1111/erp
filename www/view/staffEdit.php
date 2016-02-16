<?php
require("mainframe.inc.php");
?>
<div class="row">
			<ol class="col-sm-offset-1 col-sm-10 breadcrumb">
				<li><a href="/">Home</a></li>
				<li><a href="/"><a href="/?action=management">Management</a></a></li>
				<li><a href="/?operate=infoCheck&checkType=staffRecords">Staff Records</a></li>
				<li class="sub-header"><strong>STAFF INFOMATION EDIT</strong></li>
			</ol>	
</div>

			<hr/>
			<form class="form-horizontal col-md-offset-3" method="post" 
			action="/?operate=staffEdit&updateType=staffRecords&submitUpdate=true" name="editForm">
				<div class="row">					
					<div class="col-sm-offset-1 col-sm-10">
						<label class="col-sm-2 ">User Name</label>
						<input type="text" class="col-sm-3"  placeholder="User Name" name="staffName"
						 value="<?php echo $result['staffName'];?>" onblur="checkname()"  id="staffName"  readonly/>
						<div class="col-sm-5" id="divNameTip"><font color='red'>*必填*</font></div>
					</div>
				</div>
				<br>
		
				<div class="row">					
					<div class="col-sm-offset-1 col-sm-10">
						<label class="col-sm-2 ">E-mail</label>
						<input type="text" class="col-sm-3" placeholder="E-mail" name="staffEmail"
						value="<?php echo $result['staffEmail'];?>" onblur="checkEmail()" id="Email">
						<div class="col-sm-5" id="divEmailTip"><font color='red'>*必填*</font></div>
					</div>
				</div>
				<br>
				<div class="row">					
					<div class="col-sm-offset-1 col-sm-10">
						<label class="col-sm-2 ">Telephone</label>
						<input type="text" class="col-sm-3" placeholder="Telephone Number" name="staffTelephone" 
						value="<?php echo $result['staffTelephone'];?>" onblur="checkTelephone()"  id="Telephone">
						<div class="col-sm-5" id="divTelephoneTip"><font color='red'>*必填*</font></div>
					</div>
				</div>
				<br>
				<div class="row">					
					<div class="col-sm-offset-1 col-sm-10">
						<label class="col-sm-2 ">Address</label>
						<input type="text" class="col-sm-7" name="staffAddress" id="address" 
						value="<?php echo $result['staffAddress'];?>">
					</div>
				</div>
				<br/>
				<div class="row">					
					<div class="col-sm-offset-1 col-sm-11">
						<div class="col-sm-3">
							<label>Department&nbsp;</label>
							<select name="staffDepartment" >
								<option value="<?php echo $result['staffDepartment'];?>" selected>
									<?php echo $result['staffDepartment'];?>
								</option>
								<option value="人事部门" >人事部门</option>
								<option value="销售部门" >销售部门</option>
								<option value="后勤部门" >后勤部门</option>	
								<option value="电算部门" >电算部门</option>
								<option value="地球防卫部" >地球防卫部</option>		
							</select>
						</div>
						<div class="col-sm-2">
							<label>Sex&nbsp;</label>
							<select name="staffSex" >
								<option value="<?php echo $result['staffSex']==1?'male':'female';?>" selected>
									<?php echo $result['staffSex']==1?'male':'female';?>
								</option>
								<option value="1" selected>male</option>
								<option value="0" >female</option>			
							</select>
						</div>

						<div class="col-sm-6">
							<label>Birthday&nbsp;</label>
							<select name="BYear" >
							<?php 
								$dateArr = explode("-",$result['staffBirthday']);
								echo '<option value="'.$dateArr[0].'"selected>'.$dateArr[0].'</option>';
								//var_dump(date('Y'));
								$year = date('Y');
								$j = 0;
								for($i=$year-65;$i<=$year;$year--){
									$j++;
										echo '<option value="'.$year.'">'.$year.'</option>';		
								}
							?>		
							</select>&nbsp;年&nbsp;&nbsp;
							<select name="BMonth" >
							<?php
								echo '<option value="'.$dateArr[1].'"selected>'.$dateArr[1].'</option>';
								for($i=1;$i<=12;$i++){
										echo '<option value="'.$i.'">'.$i.'</option>';
								}
							?>			
							</select>&nbsp;月
						</div>

					</div>
				</div>
				<br>


				<div class="row">
				    <label class="col-sm-offset-2 col-sm-3">
						&nbsp;<input type="checkbox" name="editCheck" onclick="checkEdit()">
						确认修改！
					</label>
					<button type="submit" class="btn btn-info col-md-offset-1" name="editBtn" disabled="true">
					提交修改</button>
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