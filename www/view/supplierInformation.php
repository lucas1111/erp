<?php
  require_once("mainframe.inc.php");
  //var_dump($result);
?>
    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-3 col-md-2 sidebar">

          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">OVERVIEW</a></li>
            <li><a href="/">Home</a></li>
            <li><a href="/?action=management">Management</a></li>
            <li><a href="/?logout=logout">Exit</a></li>
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
            <li><a href="/">Home</a></li>
            <li><a href="/">Management</a></li>
            <li class="sub-header"><strong>Supplier Information</strong></li>
          </ol>
          <?php
           // var_dump($result);
          ?>

            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Company ID</th>
                  <th>Company Name</th>
                  <th>Company Director</th>
                  <th>Cellphone</th>
                  <th>Fax Number</th>
                  <th>Operation</th>
                </tr>
              </thead>
              <tbody>
                <?php  
                $num=1;
                foreach ($result as  $value) {
                  //var_dump($value);

                  
                  echo '                       
                  <tr>
                    <td><span class="badge">'.$num++.'</span></td>
                    <td>
                      <a href="" data-toggle="modal" data-target="#myModal'.$value['CompanyID'].'">
                        '.$value['CompanyID'].'
                      </a> 
                    </td>
                    <td>
                      <a href="" data-toggle="modal" data-target="#myModal'.$value['CompanyID'].'">
                        '.$value['CompanyName'].'
                      </a>                                           
                    </td>'; 

                      echo'              
                    <td>'.$value['CompanyDirector'].'</td>
                    <td>'.$value['CompanyPhone'].'</td> 
                    <td>'.$value['CompanyFax'].'</td>
                    <td>
                      <a href="" class="btn btn-primary" title="Edit">
                        <span class="glyphicon glyphicon-edit"></span>
                      </a>
                      ';
                      if($_SESSION['Authorization']!="level1") {

                           echo '                      
                          <a href="" 
                          class="btn btn-danger" >
                            <span class="glyphicon glyphicon-trash" title="Delete"></span> 
                          </a>';  

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
                  <div class="modal fade" id="myModal'.$value['CompanyID'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                          <h4 class="modal-title" id="myModalLabel">
                            <span class="label label-info">COMPANY NAME:</span>
                             &nbsp '.$value['CompanyName'].'
                          </h4>
                        </div>
                        <div class="modal-body">

                          <div class="container-fluid">
                            
                            <div class="row">
                             <label class="col-sm-2 control-label no-padding-right">
                                CompanyID:
                              </label>
                              <div class="col-sm-4">
                                <input type="text" class="col-xs-12" value="'.$value['CompanyID'].'" readonly />
                              </div>
                            </div>
                            
                            <div class="row">
                             <label class="col-sm-2 control-label no-padding-right">
                                NAME:
                              </label>
                              <div class="col-sm-4">
                                <input type="text" class="col-xs-12" value="'.$value['CompanyName'].'" readonly />
                              </div>

                              <label class="col-sm-2 control-label no-padding-right">
                                Telephone:
                              </label>
                              <div class="col-sm-4">
                                <input type="text" class="col-xs-12" value="'.$value['CompanyPhone'].'" readonly/>
                              </div>
                            </div>

                            <div class="row">
                              <label class="col-sm-2 control-label no-padding-right">
                                Director:
                              </label>
                              <div class="col-sm-4">
                                <input type="text" class="col-xs-12" value="'.$value['CompanyDirector'].'" readonly/>
                              </div>

                              <label class="col-sm-2 control-label no-padding-right">
                                CompanyFax:
                              </label>
                              <div class="col-sm-4">
                                <input type="text" class="col-xs-12" value="'.$value['CompanyFax'].'" readonly/>
                              </div>
                            </div>

                            <div class="row">
                              <label class="col-sm-2 control-label no-padding-right">
                                Address:
                              </label>
                              <div class="col-sm-10">
                                <input type="text" class="col-xs-12" value="'.$value['CompanyAddress'].'" readonly/>
                              </div>
                            </div>

                            <div class="row">
                            <label class="col-sm-2 control-label no-padding-right">
                              Remark:
                            </label>
                              <div class="col-sm-10">
                                <input type="text" class="col-xs-12" value="'.$value['CompanyRemark'].'" readonly/>
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
                '; //if结束标记
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