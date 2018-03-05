<?php /* Smarty version 2.6.18, created on 
         compiled from product/productlist.tpl */ ?>
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
                <button id="status-arrange" data-toggle="modal" data-target="#myModal" class="btn btn-default add_user" type="button" style="width: 200px;">Neues Produkt hinzufugen</button>
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
   
    <form id="appoint_form" action="/admin/customer/setappoint" method="post">
      <input type=hidden name="client_id" id="client_id" value=<?php echo $this->_tpl_vars['client_info']['id']; ?>
>
    <div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="StartProcessModalLabel" aria-hidden="true" style=" position:absolute; top:10%;" >
      <div class="modal-ku modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="height:40px" align="right">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-md-12" align="center">
              <p style="font-size:27px">Add / Edit Product</p>
            </div>

            <div class="col-md-12" style="margin-bottom: 20px;">
              <div class="col-md-7" style="padding-left: 0px; padding-right: 0px;">
                <div class="col-md-12" style="margin-bottom: 20px; padding-left: 0px; padding-right: 0px;">
                  <label align="left">Name</label>
                  <input name="name" type="text" placeholder="product name" class="form-control" pattern="[0-9]<?php echo 4; ?>
-[0-9]<?php echo 2; ?>
-[0-9]<?php echo 3; ?>
">
                </div>
                <div class="col-md-12" style="margin-bottom: 20px; padding-left: 0px; padding-right: 0px;">
                  <label align="left">Product Image</label>
                  <input name="discription" type="text" placeholder="discription" class="form-control">
                </div>
              </div>
              <div class="col-md-5" style="padding-left: 20px; padding-right: 0px;">
                <label align="left">Product Image</label>
                <div>
                  <div class="col-md-7" style="width:144px; height:144px; padding: 10px; border-width: 1px; border-style: dashed; border-color: gainsboro" align="center">
                    <img id="upload_image1" src="<?php if (( $this->_tpl_vars['user']['avatar'] == null || $this->_tpl_vars['user']['avatar'] == '' )): ?>/assets/img/image_product_icon.png<?php else: ?><?php echo $this->_tpl_vars['user']['avatar']; ?>
<?php endif; ?>" alt="Avatar" height="112px">
                  </div>
                  <div class="col-md-7">
                    <input name="avatar" id="avatar" type="hidden" value="<?php if (( $this->_tpl_vars['user']['avatar'] == null || $this->_tpl_vars['user']['avatar'] == '' )): ?>/assets/img/image_product_icon.png<?php else: ?><?php echo $this->_tpl_vars['user']['avatar']; ?>
<?php endif; ?>">

                    <div class="btn-group">
                      <button class="btn btn-default upload_picture" type="button">New Picture</button>
                      <br>
                      <button class="btn btn-default remove_picture" type="button">Remove</button>
                    </div>
                    <div id="divfile">
                      <input id="fileDialog" type="file" accept="image/*" style='display:none;'>
                    </div>   
                  </div>                     
                </div>
              </div>

              <div class="col-md-12" style="padding-left: 0px; padding-right: 0px;">
                <label align="left">Kategory</label>
                <div class="col-sm-12" style="padding-left: 0px;">
                  <div class="be-radio col-sm-3" style="width: 20%;">
                    <input id="subc_radio1" type="radio" name="subscription_type" value="Reinigung"checked="checked">
                    <label for="subc_radio1" class="radio_label">Reinigung</label>
                  </div>
                  <div class="be-radio col-sm-3" style="width: 20%;">
                    <input id="subc_radio2" type="radio" name="subscription_type" value="Peeling">
                    <label for="subc_radio2" class="radio_label">Peeling</label>
                  </div>
                  <div class="be-radio col-sm-3" style="width: 20%;">
                    <input id="subc_radio3" type="radio" name="subscription_type" value="Toner">
                    <label for="subc_radio3" class="radio_label">Toner</label>
                  </div>
                  <div class="be-radio col-sm-3" style="width: 20%;">
                    <input id="subc_radio4" type="radio" name="subscription_type" value="Tapespfledge">
                    <label for="subc_radio4" class="radio_label">Tapespfledge</label>
                  </div>
                  <div class="be-radio col-sm-3" style="width: 20%;">
                    <input id="subc_radio5" type="radio" name="subscription_type" value="Nachtpfledge">
                    <label for="subc_radio5" class="radio_label">Nachtpfledge</label>
                  </div>
                  <div class="be-radio col-sm-3" style="width: 20%;">
                    <input id="subc_radio6" type="radio" name="subscription_type" value="Augenpfledge">
                    <label for="subc_radio6" class="radio_label">Augenpfledge</label>
                  </div>
                  <div class="be-radio col-sm-3" style="width: 20%;">
                    <input id="subc_radio7" type="radio" name="subscription_type" value="Poner">
                    <label for="subc_radio7" class="radio_label">Poner</label>
                  </div>
                  <div class="be-radio col-sm-3" style="width: 20%;">
                    <input id="subc_radio8" type="radio" name="subscription_type" value="Serum">
                    <label for="subc_radio8" class="radio_label">Serum</label>
                  </div>
                  <div class="be-radio col-sm-3" style="width: 20%;">
                    <input id="subc_radio9" type="radio" name="subscription_type" value="Maske">
                    <label for="subc_radio9" class="radio_label">Maske</label>
                  </div>
                  <div class="be-radio col-sm-3" style="width: 20%;">
                    <input id="subc_radio10" type="radio" name="subscription_type" value="Individuel Empfehlung">
                    <label for="subc_radio10" class="radio_label">Individuel Empfehlung</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12" style="margin-bottom: 20px">
                <div class="panel-divider"></div>
            </div>
            <div class="col-md-12" align="center" style="margin-bottom: 20px">
              <a data-dismiss="modal" data-toggle="modal" href="#">
                <button type="button" id="appoint-date" class="btn btn-primary" style="width:150px; height: 45px; line-height: 45px;" >Save Product</button>
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
    <script src="/assets/js/main.js" type="text/javascript"></script>
    <script src="/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery.magnific-popup/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <script src="/assets/lib/masonry/masonry.pkgd.min.js" type="text/javascript"></script>
    <script src="/assets/js/app-mail-inbox.js" type="text/javascript"></script>
    
  </body>
</html>