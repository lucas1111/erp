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
            <li class="sub-header"><strong>Sales Status</strong></li>
          </ol>
          <?php
           // var_dump($result);
          ?>

            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Sell ID</th>
                  <th>GoodsName</th>
                  <th>SellGoodsNum</th>
                  <th>SellPrice</th>
                  <th>Account Due</th>
                  <th>Actual Pay</th>
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
                      <a href="" data-toggle="modal" data-target="#myModal'.$value['SellID'].'">
                        '.$value['SellID'].'
                      </a> 
                    </td>
                    <td>
                      <a href="" data-toggle="modal" data-target="#myModal'.$value['SellID'].'">
                        '.$value['GoodsName'].'
                      </a>                                           
                    </td>'; 

                      echo'              
                    <td>'.$value['SellGoodsNum'].'</td>
                    <td>'.$value['SellPrice'].'</td> 
                    <td>'.$value['SellNeedPay'].'</td>
                    <td>'.$value['SellHasPay'].'</td>
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
                  <div class="modal fade" id="myModal'.$value['SellID'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                          <h4 class="modal-title" id="myModalLabel">
                            <span class="label label-info">GOODS NAME:</span>
                             &nbsp '.$value['GoodsName'].'
                          </h4>
                        </div>
                        <div class="modal-body">

                          <div class="container-fluid">
                            
                            <div class="row">
                             <label class="col-sm-2 control-label no-padding-right">
                                SellID:
                              </label>
                              <div class="col-sm-4">
                                <input type="text" class="col-xs-12" value="'.$value['SellID'].'" readonly />
                              </div>
                              
                              <label class="col-sm-2 control-label no-padding-right">
                                GoodsName:
                              </label>
                              <div class="col-sm-4">
                                <input type="text" class="col-xs-12" value="'.$value['GoodsName'].'" readonly/>
                              </div>                              
                            </div>
                            
                            <div class="row">
                             <label class="col-sm-2 control-label no-padding-right">
                                SellPrice:
                              </label>
                              <div class="col-sm-4">
                                <input type="text" class="col-xs-12" value="'.$value['SellPrice'].'" readonly />
                              </div>

                              <label class="col-sm-2 control-label no-padding-right">
                                Sell-Num:
                              </label>
                              <div class="col-sm-4">
                                <input type="text" class="col-xs-12" value="'.$value['SellGoodsNum'].'" readonly/>
                              </div>
                            </div>

                            <div class="row">
                              <label class="col-sm-2 control-label no-padding-right">
                                NeedPay:
                              </label>
                              <div class="col-sm-4">
                                <input type="text" class="col-xs-12" value="'.$value['SellNeedPay'].'" readonly/>
                              </div>

                              <label class="col-sm-2 control-label no-padding-right">
                                HasPay:
                              </label>
                              <div class="col-sm-4">
                                <input type="text" class="col-xs-12" value="'.$value['SellHasPay'].'" readonly/>
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
                ';
              } //foreach 结束标记
                ?>

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