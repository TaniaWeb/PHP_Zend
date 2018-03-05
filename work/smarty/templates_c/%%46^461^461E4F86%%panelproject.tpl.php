<?php /* Smarty version 2.6.18, created on 
         compiled from index/panelproject.tpl */ ?>
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
    
    <script src="/js/main.js" type="text/javascript"></script>
    <script src="/js/select_zones.js" type="text/javascript"></script>
    <script src="/js/common.js"></script>  

    <body>
        <div id="header_area" class="ui fixed menu">
            <div class="left menu">
                <img id="header_logo" class="logo" src="/img/logo.svg">
            </div>
            <div class="right menu">
                <div class="borderless item">
                    <span id = "username"><?php echo $this->_tpl_vars['user_info']['fullname']; ?>
</span>
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
                                <div id="username" class="header"><?php echo $this->_tpl_vars['user_info']['fullname']; ?>
</div>
                                <div id="email" class="description"><?php echo $this->_tpl_vars['user_info']['username']; ?>
</div>
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
        <div id="panel_project_area" class="ui container">
            <div id ="header_panel_project" class="ui borderless inverted menu">
                <div class="item">
                    <span id = "panel_project_title">Meine Konfiguationen</span>
                </div>
            </div>
            <button id="new_project_button_2" class="ui circular icon button">
                <img id="new_project" src = "/img/new_project.svg"/>
            </button>
            <button id="help_button" class="ui button">    
                <!-- <img src="/img/help.svg">         -->
                <img class="ui middle aligned image" src="/img/help.svg">                    
                <span>Hilfe</span>
            </button>
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
            <!-- <div id="body_panel_project" class="ui center aligned container"> -->
            <!-- <div class="ui center aligned special cards">                 -->
            <p id="msg" align=center><?php echo $this->_tpl_vars['msg']; ?>
</p>
            <div class="main ui container">
                <div id="body_panel_project" class="ui stackable three cards">
                    <?php $_from = $this->_tpl_vars['clients']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['client_info']):
?>
                    <div class="ui centered card project_card">
                        <div class="image image_project_item">
                            <?php if ($this->_tpl_vars['client_info']['points_image'] != ""): ?>
                            <img id="project_item_image" src="<?php echo $this->_tpl_vars['client_info']['points_image']; ?>
">
                            <?php else: ?>
                            <img id="project_item_image" src="<?php echo $this->_tpl_vars['client_info']['image']; ?>
">
                            <?php endif; ?>
                            <button id="draw_button" class="ui circular icon button">
                                <img src = "/img/draw.svg"/>
                            </button>
                            <button id="email_button" class="ui circular icon button">
                                <img src = "/img/email.svg"/>
                            </button>
                            <button id="printer_button" class="ui circular icon button">
                                <img src = "/img/printer.svg"/>
                            </button>                                                        
                            <div id="hover_project_item">
                                <form id="go_workspace" action="/user/index/workspace" method="post">
                                    <input name="clientid" id="clientid" type="hidden" value="<?php echo $this->_tpl_vars['client_info']['id']; ?>
">
                                    <input name="mode" id="mode" type="hidden" value="0">
                                    <button id="go_workspace_button" class="ui blue button" type="submit">
                                        Zur Konfiguration
                                    </button>
                                </form>
                                <form id="delete_client" action="/user/index/deleteClient" method="post">
                                    <input name="clientid" id="clientid" type="hidden" value="<?php echo $this->_tpl_vars['client_info']['id']; ?>
">
                                    <button id="delete_client_button" class="ui circular icon button" type="submit">
                                        <img src="/img/close.svg">
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="content">
                            <div id="user_title" class="header">Kunde</div>
                            <div id="user_name" class="meta"><?php echo $this->_tpl_vars['client_info']['clientname']; ?>
</div>
                            <div id="count_configurations" class="description"><?php echo $this->_tpl_vars['client_info']['points_count']; ?>
 Konfigurationen</div>
                        </div>
                    </div>
                    <?php endforeach; endif; unset($_from); ?>
                </dev>
            </div>
        </div>
    </body>
</html>