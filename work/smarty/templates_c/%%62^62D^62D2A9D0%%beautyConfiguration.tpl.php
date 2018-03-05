<?php /* Smarty version 2.6.18, created on 
         compiled from customer/beautyConfiguration.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/img/Artboard.png">
    <title>AestheticConfigurator Admin</title>
    <link rel="stylesheet" type="text/css" href="/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
   
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css"/>
    <link rel="stylesheet" href="/assets/css/customize.css" type="text/css"/>
  </head>
  <body>
    <div class="be-wrapper be-fixed-sidebar">
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <div class="be-content be-no-padding">
        <div class="main-content container-fluid" >
          <div class="profile-header">
            <div class="row">
              <div class="col-md-10">
                <div class="profile-item">Customer Name</div>
                  <div style="font-size:23px"><?php echo $this->_tpl_vars['client_info']['clientname']; ?>
</div>
              </div>
              <div class="col-md-2">
                <div class="pull-right">
                  <div class="profile-item" align="right">Date of Configuration</div>
                  <div class="pull-right" style="font-size:23px"><?php echo $this->_tpl_vars['client_info']['date_last_saved']; ?>
</div>                  
                </div>                
              </div>
            </div>
            <div class="row" style="margin-top:13px">
              <div class="col-md-10">
                <div class="row" >
                  <div class="col-md-3">
                    <div class="profile-item">Phone Number</div>
                    <div style="font-size:15px"><?php echo $this->_tpl_vars['client_info']['phonenumber']; ?>
</div>    
                  </div>
                  <div class="col-md-3">
                    <div class="profile-item">Email</div>
                    <div style="font-size:15px"><?php echo $this->_tpl_vars['client_info']['email']; ?>
</div>    
                  </div>
                  <div class="col-md-3">
                    <div class="profile-item">Age</div>
                    <div style="font-size:15px"><?php echo $this->_tpl_vars['client_info']['age']; ?>
</div>    
                  </div>
                  <div class="col-md-3">
                    <div class="profile-item">Gender</div>
                    <div style="font-size:15px"><img class="gender-img-<?php echo $this->_tpl_vars['client_info']['gender']; ?>
"> <?php if (( $this->_tpl_vars['client_info']['gender'] == 0 )): ?>female<?php else: ?>mail<?php endif; ?></div>
                  </div>
                </div>
                <div class="row" style="margin-top:13px">
                  <div class="col-md-12">
                    <div class="profile-item">Address</div>
                    <div style="font-size:15px"><?php echo $this->_tpl_vars['client_info']['address']; ?>
</div>                    
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="pull-right">
                  <div class="profile-item">Signature</div>
                  <div class="pull-right" >
                    <?php if (( $this->_tpl_vars['client_info']['signature'] != "" )): ?>
                    <img src="<?php echo $this->_tpl_vars['client_info']['signature']; ?>
" style="width:120px; height:60px">
                    <?php endif; ?>
                  </div>                  
                </div>                
              </div>
            </div>
            <div class="row" style="margin-top:13px">
                <div class="col-md-6">
                  <div class="profile-item"><span style="color:rgb(115, 88, 249);">Next Appointment</span> (User treatment)</div>
                  <div style="font-size:20px; color: rgb(115, 88, 249); padding-top: 3px; padding-left: 0px;">
                    <span class="glyphicon glyphicon-calendar"></span>&nbsp;15.08.2017&nbsp;&nbsp;<span class="glyphicon glyphicon-time" style="position: relative; top: 3px;"></span>&nbsp;9:30
                  </div>
                </div>                    
                <div class="col-md-6" align="right">
                  <div class="profile-item">Status</div>
                  <div align="right">
                    <div style="border-radius: 10px; background-color: #8156E8; padding:7px; width: 30%; color:white;" align="center">
                        <span class="circle-status status-blank"></span>&nbsp;&nbsp;new appointment
                    </div>
                  </div>
                </div>                    
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" style="padding-left:20px; padding-top:0px">              
              <div class="col-md-6" id="canvas_parent">
                <input  id="clientid" type="hidden" value="<?php echo $this->_tpl_vars['client_info']['id']; ?>
">
                <input  id="points" type="hidden" value='<?php echo $this->_tpl_vars['client_info']['points']; ?>
'>
                <input  id="image_url" type="hidden" value='<?php echo $this->_tpl_vars['client_info']['image']; ?>
'>
                <input  id="points_count" type="hidden" value='<?php echo $this->_tpl_vars['client_info']['points_count']; ?>
'>
                <input  id="hair_questions" type="hidden" value='<?php echo $this->_tpl_vars['client_info']['hairQuestions']; ?>
'>
                <div id="canvas_area" style="overflow: hidden;">
                  <canvas id="canvas"></canvas>                
                </div>
              </div>
              <div class="col-md-6">
                <div class="row" style="padding:10px">
                  <div class="col-md-12" style="margin-left:20px; padding:10px">                   
                      <div id="content_num">                   
                      </div>                             
                  </div>  
                </div>                             
              </div>
                
            </div>            
          </div> 

          <div class="profile-header">
            <div class="row">
              <div class="col-md-10">
                <div class="profile-item">User Name</div>
                  <div style="font-size:23px"><img src="<?php echo $this->_tpl_vars['user_info1']['avatar']; ?>
" width="30px" alt="Avatar">     <?php echo $this->_tpl_vars['user_info1']['fullname']; ?>
</div>
              </div>
              <div class="col-md-2">
                <div class="pull-right">
                  <div class="profile-item">Profile Type</div>
                  <div class="pull-right" style="font-size:23px">
                    <?php if (( $this->_tpl_vars['user_info1']['account_type'] == 0 )): ?>
                      Basic Business
                    <?php else: ?>
                      Free Account
                    <?php endif; ?>
                  </div>               
                </div>                
              </div>
            </div>
            <div class="row" style="margin-top:13px">
              <div class="col-md-12">
                <div class="row" >
                  <div class="col-md-3">
                    <div class="profile-item">Phone Number</div>
                    <div style="font-size:15px"><?php echo $this->_tpl_vars['user_info1']['phone_country']; ?>
 <?php echo $this->_tpl_vars['user_info1']['phonenumber']; ?>
</div>    
                  </div>                 
               
                  <div class="col-md-4">
                    <div class="profile-item">Address</div>
                    <div style="font-size:15px"><?php echo $this->_tpl_vars['user_info1']['street']; ?>
</div>                    
                  </div>
              
                  <div class="col-md-2">
                    <div class="pull-left">
                      <div class="profile-item">Qualification</div>
                      <div class="pull-left">
                        <?php echo $this->_tpl_vars['user_info1']['qualification']; ?>

                      </div>                  
                    </div>                
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div>
            <div class="col-sm-12" style="margin-left: 0px; margin-top: 10px; margin-bottom: 10px;">
              <?php if (( $this->_tpl_vars['client_info']['finished'] != 1 )): ?>

              <?php if (( $this->_tpl_vars['client_info']['pending'] == 0 )): ?>
              <button id="status-new-no" class="btn btn-default add" type="button" style="margin-left: 0px; border-radius: 5px; background-color: #4145BB; color: white;">Status: new</button>
              <?php endif; ?>
              <?php if (( $this->_tpl_vars['client_info']['pending'] == 1 )): ?>
              <button id="status-pending-no" class="btn btn-default add" type="button" style="margin-left: 0px; border-radius: 5px; background-color: #F5B16B; color: white;">Status: pending</button>
              <?php endif; ?>

              <?php if (( $this->_tpl_vars['client_info']['pending'] == 2 )): ?>
              <button id="status-arranged" class="btn btn-default add" type="button" style="margin-left: 0px; border-radius: 5px; background-color: #7722FD; min-width: 250px; color: white;">Status: appointment arranged</button>
              <?php else: ?>
              <button id="status-arrange" data-toggle="modal" data-target="#myModal" class="btn btn-default add" type="button" style="margin-left: 0px; border-radius: 5px; background-color: #7722FD; min-width: 250px; color: white;">Status: appointment arrange</button>
              <?php endif; ?>

              <button id="status-finish" class="btn btn-default add" type="button" style="margin-left: 0px; border-radius: 5px; background-color: #6CB77B; color: white;">Status: finish</button>
              <?php else: ?>
              <button id="status-finished-no" class="btn btn-default add" type="button" style="margin-left: 0px; border-radius: 5px; background-color: #6CB77B; color: white;">Status: finished</button>
              <?php endif; ?>
            </div>
        </div>
      </div>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    <form id="finish_form" action="/admin/customer/tofinish" method="post">
      <input type=hidden name="client_id" id="client_id" value=<?php echo $this->_tpl_vars['client_info']['id']; ?>
>
    </form>
    <div style="display: none;">
      <div class="config-point">
        <div class="row col-md-12" style="min-height: 90px;">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-2" align="right">
                <div class="order-label point-index">1</div>
              </div>
              <div class="col-md-10">
                <div class="order-text point-desc"></div>
              </div>
            </div>
          </div>
          <div class="row col-md-12 point-subcate" style="min-height: 50px;">
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                  <img class="subcate-img" src="/img/image_subcategory_3_4.svg"/>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-2"> 
                </div>
                <div class="col-md-10" style="margin-top: 5px;">
                  <span class="subcate-title"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-2"> </div>
              <div class="col-md-10 h-devider"></div>
            </div>
          </div>      
        </div>
      </div>
      <div class="config-hair">
        <div class="row col-md-12" style="min-height: 90px;">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-2" align="right">
                <div class="hair-label point-index">1</div>
              </div>
              <div class="col-md-10">
                <div class="hair-text point-desc">Haut & Haare</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-2" align="right">
              </div>
              <div class="col-md-10 hair-content">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-2"> </div>
              <div class="col-md-10 h-devider"></div>
            </div>
          </div>      
        </div>
      </div>

      <div class="hair-item">
        <div class="col-md-12">
          <div class="row">
            <div class="title hair-item-title"></div>
          </div>          
          <div class="row">
            <div class="category-container"></div>
          </div>          
        </div>
      </div>

      <div class="hair-category">
        <div class="col-md-12">
          <div class="row">
            <div class="title hair-category-title"></div>
          </div>          
          <div class="row">
            <div class="subcategory-container"></div>
          </div>          
        </div>
      </div>

      <div class="hair-subcategory">
        <div class="hair-subcategory-title">
          <div class="col-md-2"><img src="/img/image_hair_1_1_1.svg" width="24px" height="24px" style="position: absolute; top:5px; left: 5px;"></div>
          <div class="col-md-10""><div class="title" style="position: absolute; top:3px; left: 40px;">title</div></div>
        </div>
      </div>

      <div class="hair4-subcategory">
        <div class="col-md-12 row">
          <div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
            <div class="hair4-label point-index">1</div>
          </div>
          <div class="col-md-10">
            <div class="hair-text point-desc title"></div>
          </div>
        </div>
        <div class="row">
          <div class="subcategory4-container"></div>
        </div>          
      </div>

      <div class="hair4-desc">
        <div class="col-md-12 row">
          <div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
          </div>
          <div class="col-md-10">
            <div class="hair-text point-desc title" style="margin-left: 15px;"></div>
          </div>
        </div>
      </div>
    </div>

    <form id="appoint_form" action="/admin/customer/setappoint" method="post">
      <input type=hidden name="client_id" id="client_id" value=<?php echo $this->_tpl_vars['client_info']['id']; ?>
>
    <div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="StartProcessModalLabel" aria-hidden="true" style=" position:absolute; top:40%;" >
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-header" style="height:40px" align="right">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" align="center">
            <div class="col-md-12">
              <p style="font-size:27px">Set a medical<br>appointment</p>
            </div>
            <div class="col-md-12" style="margin-bottom: 20px;">
              <div class="col-md-12" align="left" style="padding-bottom: 10px;">
                Date / Time
              </div>
              <div class="col-md-12">
                <input name="appointment" type="date" placeholder="appointment" class="form-control" pattern="[0-9]<?php echo 4; ?>
-[0-9]<?php echo 2; ?>
-[0-9]<?php echo 3; ?>
">
              </div>
            </div>
            <div class="col-md-12" style="margin-bottom: 20px;">
              <div class="col-md-12" align="left" style="padding-bottom: 10px;">
                Location
              </div>
              <div class="col-md-12">
                <input name="location" type="text" placeholder="location" class="form-control">
              </div>
            </div>
            <div class="col-md-12" style="margin-bottom: 20px">
              <div class="col-md-12">
                <div class="panel-divider"></div>
              </div>
            </div>
            <div class="col-md-12" align="center" style="margin-bottom: 20px">
              <a data-dismiss="modal" data-toggle="modal" href="#">
                <button type="button" id="appoint-date" class="btn btn-success" style="width:150px; height: 45px; line-height: 45px;" >Send Email</button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
    <script src="/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>  

    <script src="/assets/js/configurations.js" type="text/javascript"></script>
    <script src="/js/fabric.min.js"></script> 
    <script src="/assets/js/main.js" type="text/javascript"></script>

    <script src="/assets/js/admin_beauty.js" type="text/javascript"></script>
    
    <script src="/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery.magnific-popup/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <script src="/assets/lib/masonry/masonry.pkgd.min.js" type="text/javascript"></script>
    <script src="/assets/js/app-mail-inbox.js" type="text/javascript"></script>

  </body>
</html>