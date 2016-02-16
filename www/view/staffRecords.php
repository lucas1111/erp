<?php
  require_once("mainframe.inc.php");
  //var_dump($result);
?>
    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-3 col-md-2 sidebar">

          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">OVERVIEW</a></li>
            <li><a href="/"><span class="glyphicon glyphicon-home">Home</span></a></li>
            <li><a href="/?action=management">Management</a></li>
            <li><a href="/?logout=logout"><span class="glyphicon glyphicon-log-out">Exit</span></a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="active"><a href="">CHECK INFORMATION</a></li>
            <li><a href="/?operate=infoCheck&checkType=staffRecords">Staff Records</a></li>
            <li><a href="/?operate=infoCheck&checkType=supplierInformation">Supplier Information</a></li>
            <li><a href="/?operate=infoCheck&checkType=purchaseControl">Purchase Control</a></li>
            <li><a href="/?operate=infoCheck&checkType=salesStatus">Sales Status</a></li>
            <li><a href="/?operate=infoCheck&checkType=returnManagement">Return Management</a></li>
            <li><a href="/?operate=infoCheck&checkType=stockControl">Stock Control</a></li>
          </ul>

        </div><!--右侧导航栏-->
           
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <ol class="breadcrumb">
            <li><a href="/"><span class="glyphicon glyphicon-home">Home</span></a></li>
            <li><a href="/">Management</a></li>
            <li class="sub-header"><strong>STAFF INFORMATION</strong></li>
          </ol>
          <?php
           // var_dump($result);
          ?>

            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Staff-ID</th>
                  <th>Staff-Name</th>
                  <th>Sex</th>
                  <th>Department</th>
                  <th>Telephone</th>
                  <th>Birthday</th>
                  <th>Operation</th>
                </tr>
              </thead>
              <tbody>
                <?php  
                $num=1;
                foreach ($result as  $value) {
                  //var_dump($value);
                  if($value['staffName']!="admin"){

                  
                  echo '                       
                  <tr>
                    <td><span class="badge">'.$num++.'</span></td>
                    <td>
                      <a href="" data-toggle="modal" data-target="#myModal'.$value['id'].'">
                        '.$value['id'].'
                      </a> 
                    </td>
                    <td>
                      <a href="" data-toggle="modal" data-target="#myModal'.$value['id'].'">
                        '.$value['staffName'].'
                      </a>                                           
                    </td>';

                    if($value['staffSex']==1)
                      echo'<td>male</td>';
                    else
                      echo '<td>female</td>';   

                      echo'              
                    <td>'.$value['staffDepartment'].'</td>
                    <td>'.$value['staffTelephone'].'</td> 
                    <td>'.$value['staffBirthday'].'</td>
                    <td>
                      <a href="/?operate=staffEdit&updateType=staffEdit&id='.$value['id'].'" class="btn btn-primary" title="Edit">
                        <span class="glyphicon glyphicon-edit"></span>
                      </a>
                      ';
                      if($_SESSION['Authorization']!="level1") {
                        if($value['id']==$_SESSION['id']){
                          echo '                      
                          <a  class="btn btn-danger" title="不能删除在线用户！">
                            不能删除在线用户 
                          </a>';                          
                        }else{
                           echo '                      
                          <a href="/?operate=infoDelete&checkType=staffRecords&id='.$value['id'].'" 
                          class="btn btn-danger" >
                            <span class="glyphicon glyphicon-trash" title="Delete"></span> 
                          </a>';                         
                        }
                      }else{
                        echo '                      
                        <a class="btn btn-danger" title="无操作权限！">
                          <span class="glyphicon glyphicon-trash">无操作权限</span> 
                        </a>';                        
                      }

                     echo '
                    </td>
                  </tr>

                   <!-- Modal -->
                  <div class="modal fade" id="myModal'.$value['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                          <h4 class="modal-title" id="myModalLabel">
                            <span class="label label-info">STAFF NAME:</span>
                             &nbsp '.$value['staffName'].'
                          </h4>
                        </div>
                        <div class="modal-body">

                          <div class="container-fluid">
                            
                            <div class="row">
                             <label class="col-sm-2 control-label no-padding-right">
                                Staff ID:
                              </label>
                              <div class="col-sm-4">
                                <input type="text" class="col-xs-12" value="'.$value['id'].'" readonly />
                              </div>
                            </div>
                            
                            <div class="row">
                             <label class="col-sm-2 control-label no-padding-right">
                                NAME:
                              </label>
                              <div class="col-sm-4">
                                <input type="text" class="col-xs-12" value="'.$value['staffName'].'" readonly />
                              </div>

                              <label class="col-sm-2 control-label no-padding-right">
                                Telephone:
                              </label>
                              <div class="col-sm-4">
                                <input type="text" class="col-xs-12" value="'.$value['staffTelephone'].'" readonly/>
                              </div>
                            </div>

                            <div class="row">
                              <label class="col-sm-2 control-label no-padding-right">
                                Department:
                              </label>
                              <div class="col-sm-4">
                                <input type="text" class="col-xs-12" value="'.$value['staffDepartment'].'" readonly/>
                              </div>

                              <label class="col-sm-2 control-label no-padding-right">
                                E-mail:
                              </label>
                              <div class="col-sm-4">
                                <input type="text" class="col-xs-12" value="'.$value['staffEmail'].'" readonly/>
                              </div>
                            </div>

                            <div class="row">
                              <label class="col-sm-2 control-label no-padding-right">
                                SEX:
                              </label>
                              <div class="col-sm-4">
                                <input type="text" class="col-xs-12" value="'.($value['staffSex']==1?'male':'female').'" readonly/>
                              </div>

                              <label class="col-sm-2 control-label no-padding-right">
                                Birthday:
                              </label>
                              <div class="col-sm-4">
                                <input type="text" class="col-xs-12" value="'.$value['staffBirthday'].'" readonly/>
                              </div>
                            </div>

                            <div class="row">
                            <label class="col-sm-2 control-label no-padding-right">
                              Address:
                            </label>
                              <div class="col-sm-10">
                                <input type="text" class="col-xs-12" value="'.$value['staffAddress'].'" readonly/>
                              </div>
                            </div>

                          </div>

                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>

                      </div>
                    </div>
                  </div> 
                '; }//if结束标记
              } //foreach 结束标记
                ?>  
              </tbody>
            </table>

        </div><!--面包屑导航+显示信息表格-->

      </div><!--row-->
    </div><!--container-fluid-->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/style/bootstrap/js/jquery.js"></script>
    <script src="/style/bootstrap/js/bootstrap.js"></script>
    <script src="/style/bootstrap/js/myholder/holder.js"></script>
  </body>
</html>