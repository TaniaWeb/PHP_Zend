<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <title>Aesthetic Partner</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Aesthetic Partner" />
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
    
    <script src="/js/common.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/select_zones.js"></script> 

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

        <div id="panel_area" class="ui main container">
            <div class="ui lists">
                <div class="item">
                    <img id="img_user_picture" class="ui centered medium circular image" src="/img/user.png">
                    <button id="new_project_button_1" class="ui circular icon button">
                        <img id="new_project" src = "/img/new_project.svg"/>
                    </button>
                </div>
                <div class="item">
                    <div class="header">Noch keine Konfiguration vorhanden</div>
                </div>
                <div class="item">
                    <button id="configuration" class="ui center aligned button">
                        Konfiguration erstellen
                    </button>
                </div>
            </div>
            <p id="msg" align=center>{$msg}</p>
            <div id="edit_layer_area" class="ui small editlayer modal">
                <div class="content">
                    <div id="title_label" class="ui center aligned header">
                        Kundeninformation
                    </div>
                    <form id="edit_client" class="ui form" action="/user/index/addClient" method="POST">
                        <div class="field height_section">
                            <label>Kundenname</label>
                            <div class="field">
                                <input name="clientname" id="clientname" type="text" required="required">
                            </div>
                        </div>
                        <div class="two fields height_section">
                            <div class="field">
                                <label>Telefonnummer</label>
                                <div class="field">
                                    <input name="phone_number" id="phone_number" type="tel">
                                </div>
                            </div>
                            <div class="field">
                                <label>Email</label>
                                <div class="field">
                                    <input name="email" id="clientemail" type="email" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="field height_section">
                            <label>Anschrift</label>
                            <div class="field">
                                <input name="address" id="address" type="text">
                            </div>
                        </div>    
                        <div class="two fields height_section">
                            <div class="field">
                                <label>Alter</label>
                                <div class="field">
                                    <input name="age" id="age" type="number">
                                </div>
                            </div>
                            <div class="field">
                                <label id="label_btn_group">Geschlecht</label>
                                <div class="field">
                                    <div class="ui buttons btn_group">
                                        <input name="gender" id="gender" type="hidden" value="0">
                                        <div id="female_button" class="ui button">
                                            <div class="item">
                                                <img id="female_image" class="ui middle aligned image" src="/img/female_selected.svg">
                                            </div>
                                            <div class="item">
                                                <span>weiblich</span>
                                            </div>
                                        </div>
                                        <div id="male_button" class="ui button">
                                            <div class="item">
                                                <img id="male_image" class="ui middle aligned image" src="/img/male.svg">                    
                                            </div>
                                            <div class="item">
                                                <span>männlich</span>
                                            </div>
                                        </div>                                    
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div id="image_list_section" class="field height_section">
                            <label>Vorlage wählen</label>
                            <input name="image_src" id="image_src" type="hidden" value="">
                            <div id="image_group" class="fields">
                                <div id="image_list_field" class="field">
                                    <div class="ui images">
                                        <img id="first_image" class="ui middle aligned image" src="/upload/model/model_1.png">
                                        <img id="second_image" class="ui middle aligned image" src="/upload/model/model_2.png">
                                        <img id="third_image" class="ui middle aligned image" src="/upload/model/model_3.png">
                                        <img id="fourth_image" class="ui middle aligned image" src="/upload/model/model_4.png">
                                    </div>
                                     <div id="selected_model_mask"> </div>           
                                </div>
                                <div id="own_picture_field" class="field">
                                    <div id="divfile">
                                        <input id="fileDialog" type="file" accept="image/*" style='display:none;'>
                                    </div>
                                    <div id="own_picture_button" class="ui button">
                                        <div class="ui item">
                                            <img id="own_picture_image" class="ui middle aligned image" src="/img/own_picture.svg">                    
                                        </div>
                                        <div class="ui item">
                                            <span>Eigenes Bild</span>                                      
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="bottom_buttons" class="actions">
                    <span class="helper"></span>
                    <button id="save_edit_button" class="ui button">
                        Anlegen
                    </button>                    
                    <button id="cancel_edit_button" class="ui button">
                        Abbrechen
                    </button>
                </div>
            </div> 
        </div>
    </body>
</html>