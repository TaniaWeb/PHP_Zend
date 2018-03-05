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
      {include file='common/header.tpl'}
      <div class="be-content be-no-padding">
        <div class="main-content">
          <div style="background-color:#eee">
            <div class="row">
              <div class="col-md-12"  >
                <div class="module-header">Modules Overview</div>
              </div>
            </div>
          </div>
                  
          <div class="row">
            <div class="col-md-12"  >
              <div class="col-md-6" >
                <div class="beauty-container">              
                  <div class = "row" align="center" style="padding-top:50px;">
                    <img src="/img/image_module_beauty.svg">                  
                  </div>
                  <div class="row" align="center" style="color:#ffffff; font-size: 25px; padding-top: 20px;">
                    Beauty Configurator                    
                  </div>
                  <div class="button" align="center" style="padding-top:20px">
                    <button onclick="loadConfiqureBeauty()" style="width:150px; height:35px; background-color: #fff; font-size:15px; border-radius:5px; border:0px; color:#000;">Edit</button>                    
                  </div>

                </div>    
              </div>
              <div class="col-md-6" >
                <div class="body-container">                  
                  <div class = "row" align="center" style="padding-top:55px;">
                     <img src="/img/image_module_body.svg">                  
                  </div>
                  <div class="row" align="center" style="color:#ffffff; font-size: 25px; padding-top: 20px;">
                    Body Shape Configurator                    
                  </div>
                  <div class="button" align="center" style="padding-top:20px">
                    <button style="width:150px; height:35px; background-color: #fff; font-size:15px; border-radius:5px; border:0px; color:#000;">Edit</button>                    
                  </div>              
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {include file='common/footer.tpl'}
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