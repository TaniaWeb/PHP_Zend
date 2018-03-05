<?php /* Smarty version 2.6.18, created on 
         compiled from customer/customerProfile.tpl */ ?>
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
    <link rel="stylesheet" type="text/css" href="/assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
        <?php $_from = $this->_tpl_vars['clients']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['client_info']):
?>
          <?php if (( $this->_tpl_vars['client_info']['clientname'] == $this->_tpl_vars['customer'] && $this->_tpl_vars['client_info']['userid'] == $this->_tpl_vars['user'] )): ?>
          <div class="profile-header">
            <div class="row">
              <div class="col-md-10">
                <div class="profile-item">Customer Name</div>
                  <div style="font-size:23px"><?php echo $this->_tpl_vars['client_info']['clientname']; ?>
</div>
              </div>
              <div class="col-md-2">
                <div class="pull-right">
                  <div class="profile-item">Configurations</div>
                  <div class="pull-right" style="font-size:23px">2</div>                  
                </div>                
              </div>
            </div>
            <div class="row" style="margin-top:13px">
              <div class="col-md-10">
                <div class="row" >
                  <div class="col-md-3">
                    <div class="profile-item">Phone Number</div>
                    <div style="font-size:15px"><?php echo $this->_tpl_vars['client_info']['c_phone']; ?>
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
"> <?php if (( $this->_tpl_vars['client_info']['gender'] == 0 )): ?>female<?php else: ?>male<?php endif; ?>
                      </div>
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
                  <div class="pull-right">
                    <img src="<?php echo $this->_tpl_vars['client_info']['signature']; ?>
">
                  </div>                  
                </div>                
              </div>
            </div>
            <div class="row" style="margin-top:13px">
              <div class="col-md-12">
                <div class="profile-item"><span style="color:rgb(115, 88, 249);">Next Appointment</span> (User treatment)</div>

                <div style="font-size:20px; color: rgb(115, 88, 249); padding-top: 3px;">
                  <span class="glyphicon glyphicon-calendar"></span>&nbsp;15.08.2017&nbsp;&nbsp;<span class="glyphicon glyphicon-time" style="position: relative; top: 3px;"></span>&nbsp;9:30
                </div>

                </div>                    
              </div>
            </div>
          </div>
          <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>        
          <div class="container-fluid" style="padding:20px; padding-top:0px;">
            <div id="customerProfile_table_container" class="row" >
                  <?php $_from = $this->_tpl_vars['clients']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['client_info']):
?>
                   <?php if (( $this->_tpl_vars['client_info']['clientname'] == $this->_tpl_vars['customer'] )): ?>
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
&nbsp;Konfigurationen</div>
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
                              <img class="avatar" src="<?php echo $this->_tpl_vars['info_user']['avatar']; ?>
">
                              <span><?php echo $this->_tpl_vars['info_user']['fullname']; ?>
</span>
                              <img class="go_detail" src="/img/go_detail.svg">
                          </div>
                      </div>
                    </div>
                   <?php endif; ?>
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
    <script src="/assets/js/main.js" type="text/javascript"></script>
    <script src="/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery.magnific-popup/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <script src="/assets/lib/masonry/masonry.pkgd.min.js" type="text/javascript"></script>
    <script src="/assets/js/app-mail-inbox.js" type="text/javascript"></script>

  </body>
</html>