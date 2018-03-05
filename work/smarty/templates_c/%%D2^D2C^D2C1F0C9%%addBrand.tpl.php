<?php /* Smarty version 2.6.18, created on 
         compiled from product/addBrand.tpl */ ?>
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

    <link rel="stylesheet" type="text/css" href="/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/lib/select2/css/select2.min.css"/>

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
              <div class="col-md-12">
                <div class="email-title">Edit Brand</div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12" style="padding-bottom: 10px;">
                <div class="col-md-12" style="padding-bottom: 10px; background-color: white; border-radius: 5px; padding-top: 20px; padding-bottom: 20px;">

                  <div class="col-sm-12">
                    <div class="form-group col-sm-6" style="padding-left: 0px;">
                      <label>Brand Name</label>
                      <input name="street" type="text" placeholder="Street + Number" class="form-control" value="Teoxane">
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Brand Logo</label>
                      <div>
                        <img id="upload_image1" src="<?php if (( $this->_tpl_vars['user']['avatar'] == null || $this->_tpl_vars['user']['avatar'] == '' )): ?>/assets/img/image_brand_teoxane.png<?php else: ?><?php echo $this->_tpl_vars['user']['avatar']; ?>
<?php endif; ?>" alt="Avatar" style="padding:10px; border-width: 2px;">

                        <input name="avatar" id="avatar" type="hidden" value="<?php if (( $this->_tpl_vars['user']['avatar'] == null || $this->_tpl_vars['user']['avatar'] == '' )): ?>/assets/img/image_brand_teoxane.png<?php else: ?><?php echo $this->_tpl_vars['user']['avatar']; ?>
<?php endif; ?>">

                        <button class="btn btn-default upload_picture" type="button">Upload Picture</button>
                        <div id="divfile">
                          <input id="fileDialog" type="file" accept="image/*" style='display:none;'>
                        </div>                        
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 sub_heading">
                    <div class="panel-divider"></div>                      
                  </div>
                  <div class="form-group col-sm-12">
                    <button class="btn btn-default add submit" type="submit">Save</button>
                    <button class="btn btn-default add cancel" type="button" onclick="listBrand()">Back</button>
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
    <script src="/assets/js/product_manage.js" type="text/javascript"></script>

    
  </body>
</html>