<?php /* Smarty version 2.6.18, created on 
         compiled from user/profile.tpl */ ?>
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
              <div class="col-md-1" align="center">
                 <img width="81px" height="81px" src="<?php echo $this->_tpl_vars['user']['avatar']; ?>
" alt="Avatar">       
              </div>
              <div class="col-md-11" style="padding-right:0px">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-5">
                      <div style="font-size:23px"><?php echo $this->_tpl_vars['user']['fullname']; ?>
</div>
                      <div><?php echo $this->_tpl_vars['user']['qualification']; ?>
</div>  
                    </div>
                    <div class="col-md-2" align="center">
                      <?php if (( $this->_tpl_vars['user']['activated'] == 1 )): ?>
                      <div class="profile-item" style="color: #54B76A;">
                            <span class="circle-status small-button-circle status-completed"></span>
                        Account active
                      </div>
                      <?php else: ?>
                      <div class="profile-item">
                            <span class="circle-status small-button-circle status-pending"></span>
                        Account active
                      </div>
                      <?php endif; ?>
                    </div>
                    <div class="col-md-3" align="center">
                      <div class="profile-item" style="border-radius: 10px; background-color: #8156E8; padding:3px;">
                        <?php if (( $this->_tpl_vars['user_info']['account_type'] == 1 )): ?>
                          Free Account
                        <?php else: ?>
                          Basic Business Account
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="col-md-2 pull-right" style="padding:0px">
                      <div class="btn-group">
                        <button id="btn_remove_user" onclick="removeUser(event, <?php echo $this->_tpl_vars['user']['id']; ?>
)" class="btn btn-default" style="width:70px;">remove</button>
                        <button id="btn_edit_user" onclick="editUser(event, <?php echo $this->_tpl_vars['user']['id']; ?>
)" class="btn btn-default" style="width:93px;">edit account</button>
                      </div>
                    </div>  
                  </div>
                </div>
                <div class="row" style="padding-top:10px">
                  <div class="col-md-12">
                    <div class="col-md-3">
                      <div class="profile-item">Total Configurations</div>
                      <div style="font-size:23px; padding-left:50px"><?php echo $this->_tpl_vars['user']['points_count']; ?>
</div>  
                    </div>
                    <div class="col-md-3" align="center" style="padding-left:0px">
                      <div class="profile-item">Completed Configurations</div>
                      <div style="font-size:23px">
                        <span class="circle-status status-completed"></span>
                        <?php echo $this->_tpl_vars['config_info']['completed']; ?>

                      </div>  
                    </div>
                    <div class="col-md-3" align="center">
                      <div class="profile-item">Pending Configurations</div>
                      <div style="font-size:23px">
                        <span class="circle-status status-pending"></span>
                        <?php echo $this->_tpl_vars['config_info']['pending']; ?>

                      </div>  
                    </div>
                    <div class="col-md-3" align="right">
                      <div class="profile-item">Certificated Modules</div>
                      <div style="font-size:23px">
                        <?php if (( $this->_tpl_vars['user']['bc_check'] == 1 )): ?>
                          1
                        <?php else: ?>
                          0
                        <?php endif; ?>
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
                    <div style="font-size:15px"><?php echo $this->_tpl_vars['user']['phone_country']; ?>
&nbsp;<?php echo $this->_tpl_vars['user']['phonenumber']; ?>
</div>    
                  </div>
                  <div class="col-md-3">
                    <div class="profile-item">Email</div>
                    <div style="font-size:15px"><?php echo $this->_tpl_vars['user']['username']; ?>
</div>    
                  </div>
                  <div class="col-md-3">
                    <div class="profile-item">Website</div>
                    <div style="font-size:15px"><?php echo $this->_tpl_vars['user']['website']; ?>
</div>    
                  </div>
                  <div class="col-md-2">
                    <div class="profile-item">Type</div>
                    <div style="font-size:15px"><?php echo $this->_tpl_vars['user']['qualification']; ?>
</div>    
                  </div>
                  <div class="col-md-2" align="right">
                    <div class="profile-item">Date added</div>
                    <div style="font-size:15px"><?php echo $this->_tpl_vars['user']['date_last_saved']; ?>
</div>    
                  </div>
                </div>  
                <div class="row" style="margin-top:13px">
                  <div class="col-md-2">
                    <div class="profile-item">Address</div>
                    <div style="font-size:15px"><?php echo $this->_tpl_vars['user']['street']; ?>
</div>
                  </div>
                  <div class="col-md-3">
                    <div class="profile-item">Frontend Language</div>
                    <div style="font-size:15px">
                      <?php if (( $this->_tpl_vars['user']['language'] == 'AK' )): ?>
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
                    <div style="font-size:20px">0</div>
                    <div style="font-size:15px">renewal 19.05.2017</div>    
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row" style="margin:20px; margin-top:35px; font-size:25px;">All Configurations</div>

          <div class="container-fluid" style="padding:20px; padding-top:0px;">
            <div id="customerProfile_table_container" class="row" >
              <?php $_from = $this->_tpl_vars['clients']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['client_info']):
?>
              <div class="col-md-3" onclick="loadBeauty('<?php echo $this->_tpl_vars['client_info']['id']; ?>
', '<?php echo $this->_tpl_vars['client_info']['clientname']; ?>
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
                        <div class="meta"><span class="glyphicon glyphicon-ok"></span>&nbsp;<?php echo $this->_tpl_vars['client_info']['points_count']; ?>
 Konfigurationen</div>
                        <div class="treatment"><span class="glyphicon glyphicon-ok"></span>&nbsp;Beauty Treatment</div>
                        <div class="appointment"><span class="glyphicon glyphicon-calendar"></span>&nbsp;15.08.2017&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>&nbsp;9:30</div>
                        <div class="description">
                          <i class="mdi mdi-pin"></i>
                          <span class="location"><?php echo $this->_tpl_vars['client_info']['address']; ?>
</span>
                          <span class="date"><?php echo $this->_tpl_vars['client_info']['date_last_saved']; ?>
</span>
                        </div>
                    </div>
                    <div class="bottom_bar">                              
                        <img class="avatar" src="<?php echo $this->_tpl_vars['user']['avatar']; ?>
">
                        <span><?php echo $this->_tpl_vars['user']['fullname']; ?>
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
    <script src="/assets/js/user_manage.js" type="text/javascript"></script>

  </body>
</html>