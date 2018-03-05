<?php /* Smarty version 2.6.18, created on 
         compiled from company/profile.tpl */ ?>
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
        <div class="main-content container-fluid">
       
          <div class="profile-header">
            <div class="row">
              <div class="col-md-1">
                 <img src="/assets/img/avatar3.png" alt="Avatar">       
              </div>
              <div class="col-md-11" style="padding-right:0px">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-4">
                      <div style="font-size:23px"><?php echo $this->_tpl_vars['company_info']['fullname']; ?>
</div>
                      <div>
                        <?php if (( $this->_tpl_vars['company_info']['type'] == 0 )): ?>
                          Hotel
                        <?php endif; ?>
                        <?php if (( $this->_tpl_vars['company_info']['type'] == 1 )): ?>
                          Spa
                        <?php endif; ?>
                        <?php if (( $this->_tpl_vars['company_info']['type'] == 2 )): ?>
                          Wellness
                        <?php endif; ?>
                      </div>  
                    </div>
                    <div class="col-md-2" align="center">
                      <div class="profile-item">
                          <?php if (( $this->_tpl_vars['company_info']['activated'] == 1 )): ?>
                          <span class="circle-status small-button-circle status-completed"></span>
                          <?php endif; ?>
                          <?php if (( $this->_tpl_vars['company_info']['activated'] == 0 && $this->_tpl_vars['company_info']['days'] <= 3 )): ?>
                          <span class="circle-status small-button-circle status-new"></span>
                          <?php endif; ?>
                          <?php if (( $this->_tpl_vars['company_info']['activated'] == 0 && $this->_tpl_vars['company_info']['days'] > 3 )): ?>
                          <span class="circle-status small-button-circle status-pending"></span>
                          <?php endif; ?>
                          Account active
                      </div>
                    </div>
                    <div class="col-md-3" align="center">
                      <div class="profile-item">Basic Business Account</div>
                    </div>
                    <div class="col-md-3 pull-right">
                      <div class="btn-group pull-right">
                        <button id="btn_remove_company" onclick="removeCompany(event, <?php echo $this->_tpl_vars['company_info']['id']; ?>
)" class="btn btn-default" style="width:70px;">remove</button>
                        <button id="btn_edit_company" onclick="editCompany(event, <?php echo $this->_tpl_vars['company_info']['id']; ?>
)" class="btn btn-default" style="width:100px;">edit company</button>
                      </div>
                    </div>  
                  </div>
                </div>
                <div class="row" style="padding-top:10px">
                  <div class="col-md-12">
                    <div class="col-md-2">
                      <div class="profile-item">Workers / Users</div>
                      <div style="font-size:23px; padding-left:30px"><?php echo $this->_tpl_vars['company_info']['user_count']; ?>
</div>  
                    </div>
                    <div class="col-md-2" align="center" >
                      <div class="profile-item">Total Configurations</div>
                      <div style="font-size:23px;"><?php echo $this->_tpl_vars['company_info']['points_count']; ?>
</div>  
                    </div>
                    <div class="col-md-3" align="center" style="padding-left:0px">
                      <div class="profile-item">
                        Completed Configurations
                      </div>
                      <div style="font-size:23px">
                        <span class="circle-status status-completed"></span>
                          <?php echo $this->_tpl_vars['config_info']['completed']; ?>

                      </div>  
                    </div>
                    <div class="col-md-3" align="center">
                      <div class="profile-item">Pending Configurations</div>
                      <div style="font-size:23px">
                        <span class="circle-status status-pending "></span>
                          <?php echo $this->_tpl_vars['config_info']['pending']; ?>

                      </div>  
                    </div>
                    <div class="col-md-2" align="right">
                      <div class="profile-item">Certificated Modules</div>
                      <div style="font-size:23px">
                          1
                      </div>  
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="panel-divider" style="margin-top:20px"></div>

            <div class="row" style="margin-top:20px">
              <div class="col-md-12">
                <div class="row" >
                  <div class="col-md-2">
                    <div class="profile-item">Phone</div>
                    <div style="font-size:15px"><?php echo $this->_tpl_vars['company_info']['phone']; ?>
</div>    
                  </div>
                  <div class="col-md-3">
                    <div class="profile-item">Email</div>
                    <div style="font-size:15px"><?php echo $this->_tpl_vars['company_info']['email']; ?>
</div>    
                  </div>
                  <div class="col-md-3">
                    <div class="profile-item">Website</div>
                    <div style="font-size:15px"><?php echo $this->_tpl_vars['company_info']['website']; ?>
</div>    
                  </div>
                  <div class="col-md-2">
                    <div class="profile-item">Type</div>
                    <div style="font-size:15px">Beauty Configurator</div>    
                  </div>
                  <div class="col-md-2" align="right">
                    <div class="profile-item">Date added</div>
                    <div style="font-size:15px"><?php echo $this->_tpl_vars['company_info']['date_last_saved']; ?>
</div>    
                  </div>
                </div>  
                <div class="row" style="margin-top:13px">
                  <div class="col-md-2">
                    <div class="profile-item">Address</div>
                    <div style="font-size:15px"><?php echo $this->_tpl_vars['company_info']['street']; ?>
 <?php echo $this->_tpl_vars['company_info']['city']; ?>
</div>
                  </div>
                  <div class="col-md-3">
                    <div class="profile-item">Frontend Language</div>
                    <div style="font-size:15px">
                      <?php if (( $this->_tpl_vars['company_info']['frontend_language'] == 'AK' )): ?>
                        German
                      <?php else: ?>
                        USA
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="profile-item"></div>
                    <div style="font-size:15px"></div>    
                  </div>
                  <div class="col-md-2">
                    <div class="profile-item"></div>
                    <div style="font-size:15px"></div>
                  </div>
                  <div class="col-md-2" align="right">
                    <div class="profile-item ">Payed</div>
                    <div style="font-size:20px">99</div>
                    <div style="font-size:15px">renewal 19.12.2017</div>    
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row" style="margin:10px; margin-top:35px ;">
            <div class="col-md-12">
              <div class="col-md-6" style="padding:0px; font-size:25px"> Workers</div>
              <div class="col-md-6" align="right" style="padding:0px;">
                <button id="addUser" data-toggle="modal" data-target="#myModal" class="btn btn-default add_worker" style="color:#fff; background-color: rgb(43, 176, 212);">Add User</button>
              </div>         
            </div>
          </div>

           <div class="container-fluid">
            <div id="bycustomer_table_container" class="row">
              <div class="col-md-12">
                <div class="panel panel-default panel-table">
                  <div class="panel-body table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th style="width:22%;">Name</th>
                          <th style="width:8%;">Type</th>
                          <th style="width:10%;">Modules</th>
                          <th style="width:20%;">Location</th>
                          <th style="width:10%;">Configurations</th>
                          <th style="width:15%;">Qualification</th>                          
                          <th style="width:15%;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user_info']):
?>
                        <tr>
                          <td class="user-avatar">
                            <span class="circle-status small-button-circle status-new"></span>
                            <img src="<?php echo $this->_tpl_vars['user_info']['avatar']; ?>
" alt="Avatar"><?php echo $this->_tpl_vars['user_info']['fullname']; ?>

                          </td>
                          <td>Basic</td>
                          <td>
                            <i class="icon mdi mdi-favorite" style="color:rgb(43, 176, 212);"></i>
                          </td>
                          <td><?php echo $this->_tpl_vars['user_info']['street']; ?>
</td>
                          <td style="text-align:center;">3</td>
                          <td><?php echo $this->_tpl_vars['user_info']['qualification']; ?>
</td>
                          <td style="text-align:right;">
                            <div class="btn-group">
                              <button id="btn_remove_user" onclick="removeUser(<?php echo $this->_tpl_vars['user_info']['id']; ?>
)" class="btn btn-default" style="width:70px;">remove</button>
                              <button id="btn_edit_user" onclick="editUser(<?php echo $this->_tpl_vars['user_info']['id']; ?>
)" class="btn btn-default" style="width:53px;">edit</button>
                            </div>
                          </td>
                        </tr>
                        <?php endforeach; endif; unset($_from); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row" style="margin:20px; margin-top:35px ;  font-size:25px"> All Configurations</div>

          <div class="container-fluid" style="padding:20px; padding-top:0px;">
            <div id="customerProfile_table_container" class="row" >
              <?php $_from = $this->_tpl_vars['clients']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['client_info']):
?>
              <div class="col-md-3" onclick="loadBeauty('<?php echo $this->_tpl_vars['client_info']['clientname']; ?>
','<?php echo $this->_tpl_vars['client_info']['userid']; ?>
')">
                <div class="card">
                    <div class="image">
                        <img src="<?php echo $this->_tpl_vars['client_info']['points_image']; ?>
">
                        <div class="status new-label">
                          <span class="helper"></span>
                          <span class="circle-status status-new"></span>
                          <span>new</span>
                        </div>
                    </div>
                    <div class="content">
                        <div class="header">
                          <span><?php echo $this->_tpl_vars['client_info']['clientname']; ?>
</span>
                          <img class="gender-img-<?php echo $this->_tpl_vars['client_info']['gender']; ?>
">
                        </div>
                        <div class="meta"><?php echo $this->_tpl_vars['client_info']['points_count']; ?>
 Konfigurationen</div>
                        <div class="description">
                          <i class="mdi mdi-pin"></i>
                          <span class="location"><?php echo $this->_tpl_vars['client_info']['address']; ?>
</span>
                          <span class="date"><?php echo $this->_tpl_vars['client_info']['date_last_saved']; ?>
</span>
                        </div>
                    </div>
                    <div class="bottom_bar">                              
                        <img class="avatar" src="<?php echo $this->_tpl_vars['client_info']['avatar']; ?>
">
                        <span><?php echo $this->_tpl_vars['client_info']['username']; ?>
</span>
                        <img class="go_detail" src="/img/go_detail.svg">
                    </div>
                </div>
              </div>                  
              <?php endforeach; endif; unset($_from); ?>
            </div>
          </div>
        </div>
      </div>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    <div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="StartProcessModalLabel" aria-hidden="true" style=" position:absolute; top:20%;" >
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-header" style="height:80px">
          </div>
          <div style="height:40px" align="center">
            <img style="height:35px" src="/img/dashboard_users.svg">
          </div>

          <div class="modal-body" align="center">
            <p style="font-size:30px">Add a new User for the Company</p>
            <br>           
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
            <div> Fusce ultrices euismod lobortis.</div>
            
          </div>
          <br> 
          <div align="center">
            <a data-dismiss="modal" data-toggle="modal" href="#addExistingUser"><button type="button" class="btn btn-default" style="width:150px;  height: 31px; line-height: 30px; "  align="center">Add existing User</button></a>
            
            <button type="button" onclick="addNewUser(<?php echo $this->_tpl_vars['company_info']['id']; ?>
)" class="btn btn-default add_new_user" style="width:150px;" >Add new User</button>
          </div>
          <div style="height:80px">
          </div>
        </div>
      </div>
    </div>
    <div id="addExistingUser" class="modal" tabindex="-1" role="dialog" aria-labelledby="StartProcessModalLabel" aria-hidden="true"  style=" position:absolute; top:20%;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="height:50px">
          </div>          
          <div class="modal-body" align="center">
            <p style="font-size:30px">Find Existing User</p>
            <br>           
            <div class="input-group input-search input-group-sm" style="width:70%; ">
              <input type="text" placeholder="find User" class="form-control"><span class="input-group-btn">
                <button type="button" class="btn btn-default"><i class="icon mdi mdi-search"></i></button></span>
            </div>
            <br>
            <br>
            <br>
            <p style="font-weight:bold"> Results</p>
            <div class="panel-divider" style="margin-top:20px; width:90%;"></div>
            <div class="col-sm-12">
              <div class="be-radio1 col-sm-6">
                There is no free user.
<!--            <input name="bc_check1" id="bc_check1" type="checkbox">
                <img src="<?php echo $this->_tpl_vars['user_info']['avatar']; ?>
" alt="Avatar"><?php echo $this->_tpl_vars['user_info']['fullname']; ?>

                <label for="bba_radio" class="radio_label">Basic Business Account</label>
 -->              </div>
              <div class="be-radio1 col-sm-6">
<!--                 <input name="bc_check2" id="bc_check2" type="checkbox">
                <img src="<?php echo $this->_tpl_vars['user_info']['avatar']; ?>
" alt="Avatar"><?php echo $this->_tpl_vars['user_info']['fullname']; ?>

                <label for="bba_radio" class="radio_label">Basic Business Account</label>
 -->              </div> 
            </div>
          </div>
          <br> <br> <br> <br>
          <br>
          <div align="center">           
            <button type="button" class="btn btn-default add_user" style="width:150px;" >Add User</button>
          </div>
          <div style="height:50px">
          </div>
        </div>
      </div>
    </div>
    <script src="/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>  

    <script src="/assets/js/configurations.js" type="text/javascript"></script>
    <script src="/js/fabric.min.js"></script> 
    <script src="/assets/js/main.js" type="text/javascript"></script>

     <script src="/assets/js/beauty.js" type="text/javascript"></script>
    
    <script src="/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery.magnific-popup/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <script src="/assets/lib/masonry/masonry.pkgd.min.js" type="text/javascript"></script>
    <script src="/assets/js/app-mail-inbox.js" type="text/javascript"></script>
    <script src="/assets/js/company_manage.js" type="text/javascript"></script>

  </body>
</html>