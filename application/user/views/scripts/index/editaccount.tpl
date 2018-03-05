<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->

    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Aesthetic Partner</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Einloggen" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="RS" />
        <link rel="shortcut icon" href="/img/Artboard.png"> 
        <link rel="stylesheet" type="text/css" href="/css/reset.css">
        <link rel="stylesheet" type="text/css" href="/css/site.css">

        <link rel="stylesheet" type="text/css" href="/css/container.css">
        <link rel="stylesheet" type="text/css" href="/css/grid.css">
        <link rel="stylesheet" type="text/css" href="/css/header.css">
        <link rel="stylesheet" type="text/css" href="/css/image.css">
        <link rel="stylesheet" type="text/css" href="/css/menu.css">

        <link rel="stylesheet" type="text/css" href="/css/divider.css">
        <link rel="stylesheet" type="text/css" href="/css/list.css">
        <link rel="stylesheet" type="text/css" href="/css/segment.css">
        <link rel="stylesheet" type="text/css" href="/css/dropdown.css">
        <link rel="stylesheet" type="text/css" href="/css/icon.css">
        <link rel="stylesheet" type="text/css" href="/css/modal.css">
        <link rel="stylesheet" type="text/css" href="/css/dimmer.css">

        <link rel="stylesheet" type="text/css" href="/css/main.css" />
        <link rel="stylesheet" type="text/css" href="/css/fontface.css">
        <link rel="stylesheet" type="text/css" href="/css/semantic.min.css">
    </head>

    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/fabric.min.js"></script>
    <script src="/js/dimmer.min.js" type="text/javascript"></script>
    <script src="/js/modal.min.js" type="text/javascript"></script>
    <script src="/js/transition.min.js" type="text/javascript"></script>

    <script src="/js/main.js" type="text/javascript"></script>
    <script src="/js/select_zones.js" type="text/javascript"></script>

    <body>
        <div id="header_area" class="ui fixed menu">
            <div class="left menu">
                <img id="header_logo" class="logo" src="/img/logo.svg">
            </div>
            <div class="right menu">
                <div class="borderless item">
                    <span id = "username">{$user_info.fullname}</span>
                    <img id="img_mini_user" class="ui left spaced avatar image" src="/img/user.png">                
                </div>
                <div class="item">
                    <span id = "dashboard">Dashboard</span>
                    <img id="img_down_arrow" src = "/img/down_arrow.svg"/>
                    <!-- <div id="dashboard_menu"> -->
                    <div id="dashboard_menu" class="ui items">
                        <div id="edit_account_item" class="item">
                            <div class="ui circle image">
                                <img id="user_image" clss="ui avatar image" src="/img/user.png">
                            </div>
                            <div class="middle aligned content">
                                <div id="username" class="header">{$user_info.fullname}</div>
                                <div id="email" class="description">{$user_info.username}</div>
                            </div>
                            <form id="editaccount" action="/user/index/editaccount" method="post">
                            </form>
                        </div>                        
                        <div class="item">
                            <form id="logout" action="/user/index/logout" method="post">
                                <div name="logoutitem" id="logoutitem" class="middle aligned content">
                                    <div id="edit_profile" class="header">Mein Profil bearbeit</div>
                                    <div id="logined" class="description">Ausloggen</div>
                                </div>
                            </form>    
                        </div>                        
                    </div>                        
                </div>  
                <div id="go_panel_project" class="item">
                    <form id="gopanelproject" action="/user/index/panelproject" method="post">
                    </form>
                    <span id = "main_menu">Meine Konfiguratione</span>
                </div>
            </div>
        </div>
        <div id="edit_account_area" class="ui main container">
            <div class="ui container">
                <div class="ui items">
                    <div class="item">
                        <div id="user_image" class="image">
                            <img clss="ui avatar image" src="/img/user.png">
                        </div>
                        <div class="middle aligned content">
                            <div class="header">BENUTZERBILD</div>
                            <div class="description">
                                <button id="picture_button" class="ui button">
                                    <img id="camera_image" class="ui middle aligned image" src="/img/camera.svg">
                                    <span>Logo / Bild ändern</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <form id="edit_account_form" class="ui form" action="/user/index/updateaccount" method="post">
                    <div class="two fields">
                        <div class="eight wide field">
                            <label>UNTERNEHMEN</label>
                            <div class="field">
                                <input id="user_input" class="input_user" type="text" value="{$user_info.fullname}">
                            </div>
                        </div>
                        <div class="one wide field">
                        </div>
                        <div class="eight wide field">
                            <label>STRASSE / HAUSNUMMER</label>
                            <div class="field">
                                <input name="address_input" id="address_input" class="input_user" type="text" value="{$user_info.street}">
                            </div>
                        </div>
                    </div>
                    <div class="three fields">
                        <div class="eight wide field">
                            <label>VOLLSTÄNDIGER NAME</label>
                            <div class="field">
                                <input name="fullname_input" id="fullname_input" class="input_user" type="text" value="{$user_info.fullname}">
                            </div>
                        </div>
                        <div class="one wide field">
                        </div>                        
                        <div class="three wide field">
                            <label>PLZ</label>
                            <div class="field">
                                <input name="postal_input" id="postal_input" class="input_user" type="number" value="{$user_info.postal}">
                            </div>
                        </div> 
                        <div class="five wide field">
                            <label>ORT</label>
                            <div class="field">
                                <input name="city_input" id="city_input" class="input_user" type="text" value="{$user_info.city}">
                            </div>
                        </div>                                                  
                    </div>
                    <div id="space_field" class="field">
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label>EMAIL ADDRESSE</label>
                            <div class="field">
                                <input name="email_input" id="email_input" class="input_user" required="required" type="email" value="{$user_info.username}">
                            </div>
                        </div>
                        <div class="one wide field">
                        </div>                        
                        <div class="field">
                            <label>PASSWORD</label>
                            <div class="field">
                                <input name="password_input" id="password_input" class="input_user"  required="required" type="password" value="">
                            </div>
                        </div>                            
                    </div>
                    <div class="field">
                        <div class="field">
<!--                             <div id="save_account_button" class="ui center aligned button">
                                <span class="helper"></span>
                                <span>Speichern</span>
                            </div> -->
                            <button id="save_account_button" class="ui center aligned button">
                                Speichern
                            </button>                              
                        </div>
                    </div>                                             
                </form>
            </div>
        </div>
    </body>
</html>