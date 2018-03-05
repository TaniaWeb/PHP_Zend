<?php /* Smarty version 2.6.18, created on 
         compiled from module/configureBeauty.tpl */ ?>
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
          <div style="background-color:#eee">
            <div class="row">
              <div class="col-md-12"  >
                <div class="module-header">Configure Beauty Configurator</div>
              </div>
            </div>
          </div>
                  
          <div class="row">
            <div class="col-md-12" style="padding-left:30px; padding-right:30px" >
              <div class="col-md-4" style="padding:10px" >
                <div class="part-container">              
                  <div class = "row" align="center" style="padding-top:40px;">
                    <img src="/img/zones_select.svg">
                  </div>
                  <div class="row" align="center" style="color:#333; font-size: 20px; padding-top: 5px;">
                    Selektieren                    
                  </div>
                  <div class="button" align="center" style="padding-top:5px">
                    <button onclick="loadSelektieren()"  style="width:150px; height:30px; background-color: #fff; font-size:15px; border-radius:5px; color:#000;">Edit</button>                    
                  </div>
                </div>    
              </div> 
              <div class="col-md-4" style="padding:10px" >
                <div class="part-container">              
                  <div class = "row" align="center" style="padding-top:40px;">
                    <img src="/img/zones_draw.svg">
                  </div>
                  <div class="row" align="center" style="color:#333; font-size: 20px; padding-top: 5px;">
                    Zeichnen                    
                  </div>
                  <div class="button" align="center" style="padding-top:5px">
                    <button style="width:150px; height:30px; background-color: #fff; font-size:15px; border-radius:5px; color:#000;">Edit</button>                    
                  </div>
                </div>    
              </div> 
              <div class="col-md-4" style="padding:10px" >
                <div class="part-container">              
                  <div class = "row" align="center" style="padding-top:40px;">
                    <img src="/img/select_zones.svg">
                  </div>
                  <div class="row" align="center" style="color:#333; font-size: 20px; padding-top: 5px;">
                    Auswahlen                    
                  </div>
                  <div class="button" align="center" style="padding-top:5px">
                    <button style="width:150px; height:30px; background-color: #fff; font-size:15px; border-radius:5px; color:#000;">Edit</button>                    
                  </div>
                </div>    
              </div> 
            </div>
            <div class="col-md-12"  style="padding-left:30px; padding-right:30px; padding-top:10px">
              <div class="col-md-4" style="padding:10px" >
                <div class="part-container">              
                  <div class = "row" align="center" style="padding-top:40px;">
                    <img src="/img/emotion.svg">
                  </div>
                  <div class="row" align="center" style="color:#333; font-size: 20px; padding-top: 5px;">
                    Emotion                    
                  </div>
                  <div class="button" align="center" style="padding-top:5px">
                    <button style="width:150px; height:30px; background-color: #fff; font-size:15px; border-radius:5px; color:#000;">Edit</button>                    
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