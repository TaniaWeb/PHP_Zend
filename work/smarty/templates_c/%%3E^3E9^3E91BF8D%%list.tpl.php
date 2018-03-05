<?php /* Smarty version 2.6.18, created on 
         compiled from product/list.tpl */ ?>
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
        <div class="main-content">
          <div class="product-list-header">
            <div class="row" style="padding-bottom: 30px;">
              <div class="col-md-8">
                <div class="email-title" style="font-size: 24px; font-weight: bold;"><img src="/assets/img/image_brand_teoxane.png" height="28px">&nbsp;&nbsp;Teoxane Produkte</div>
              </div>
              <div class="col-md-4" style="text-align:right;">
                <button class="btn btn-default add_user" onclick="addProduct()" style="width: 200px;">Neues Produkt hinzufugen</button>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12" style="padding-bottom: 10px;">
                <div class="col-md-12" style="padding-bottom: 10px; background-color: white; border-radius: 5px; padding-top: 20px; padding-bottom: 20px;">
                  <div class="col-md-1">
                    <img src="/assets/img/image_product_icon.png" height="70px;">
                  </div>
                  <div class="col-md-9" style="padding-top: 15px;">
                    <span style="font-size: 16px;">RHA SERUM - 30ML</span>
                    <br>
                    <span style="color: rgb(110, 201, 226);">Peeling</span>
                  </div>
                  <div class="col-md-2" align="right">
                    <div class="btn-group">
                      <button id="btn_edit_user" onclick="editUser(event, '<?php echo $this->_tpl_vars['user_info']['id']; ?>
')" class="btn btn-default" style="width:70px;">edit</button>
                      <br>
                      <button id="btn_remove_user" onclick="removeUser(event, '<?php echo $this->_tpl_vars['user_info']['id']; ?>
')" class="btn btn-default" style="width:70px;">remove</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12" style="padding-bottom: 10px;">
                <div class="col-md-12" style="padding-bottom: 10px; background-color: white; border-radius: 5px; padding-top: 20px; padding-bottom: 20px;">
                  <div class="col-md-1">
                    <img src="/assets/img/image_product_icon.png" height="70px;">
                  </div>
                  <div class="col-md-9" style="padding-top: 15px;">
                    <span style="font-size: 16px;">ADVANCED FILTER - NORMALE BIS MISCHAUT - 50ML</span>
                    <br>
                    <span style="color: rgb(110, 201, 226);">Toner</span>
                  </div>
                  <div class="col-md-2" align="right">
                    <div class="btn-group">
                      <button id="btn_edit_user" onclick="editUser(event, '<?php echo $this->_tpl_vars['user_info']['id']; ?>
')" class="btn btn-default" style="width:70px;">edit</button>
                      <br>
                      <button id="btn_remove_user" onclick="removeUser(event, '<?php echo $this->_tpl_vars['user_info']['id']; ?>
')" class="btn btn-default" style="width:70px;">remove</button>
                    </div>
                  </div>
                </div>
              </div>

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