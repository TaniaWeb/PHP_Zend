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
    <link rel="stylesheet" type="text/css" href="/css/fontface.css">        
    <link rel="stylesheet" type="text/css" href="/css/semantic.min.css"> 

    <link rel="stylesheet" type="text/css" href="/css/main.css" />

    </head>

    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/fabric.min.js"></script> 
    <script src="/js/dropdown.js" type="text/javascript"></script>
    <script src="/js/semantic.min.js"></script> 

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
                    <span id = "username">{$user_info.fullname}</span>
                    <img id="img_mini_user" class="ui left spaced avatar image" src="/img/user.png">                
                </div>
<!--                 <div class="ui dropdown item">
                    <span id = "dashboard">Dashboard</span>
                    <img id="img_down_arrow" src = "/img/down_arrow.svg"/>            
                    <div class="ui vertical menu">                                                
                        <div class="item">
                            <div class="ui left floated image">
                                <img id="user_image" clss="ui avatar image" src="/img/user.png">
                            </div>
                            <div class="middle aligned content">
                                <div class="header">Brooke Mayer</div>
                                <div class="description">info@feelgoodstudio.de</div>
                            </div>
                        </div>
                    </div>
                </div> -->

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
        <div id="workspace_area">
            <!-- <img id="workspace_image" class="ui centered image" src="/img/sample_background.png"> -->
            <input name="created" id="created" type="hidden" value="{$created}">
            <form id="update_points" action="/user/index/updatepoints" method="post">
                <input name="clientid" id="clientid" type="hidden" value="{$client.id}">
                <input name="points" id="points" type="hidden" value='{$client_info.points}'>
                <input name="photourl" id="photourl" type="hidden" value=''>
                <input name="points_count" id="points_count" type="hidden" value=''>
                <input name="emotions_shown" id="emotions_shown" type="hidden" value='{$client.emotions_shown}'>
                <input name="mode" id="mode" type="hidden" value="{$mode}">
                <input name="sub_mode" id="sub_mode" type="hidden" value="{$sub_mode}">
            </form>
            <div id="canvas_area">
                <canvas id="canvas" src="{$client.image}"></canvas>
            </div>
        </div>
        <div id="help_area">
            <img src="/img/help_emotion.svg">
            <img src="/img/help_select.svg">
            <img src="/img/help_draw.svg">
            <img src="/img/help_zone.svg">            
            <img src="/img/help_takephoto.svg">
        </div>
        <div id="project_summary_area">
            <div id="summary_canvas_area">
                <canvas id="summary_canvas"></canvas>
            </div>
            <div class="ui container">
                <div id="summary_menu_area" class="ui grid">
                    <div class="row header">
                        <div class="thirteen wide column">
                            Zusammenfassung
                        </div>
                        <div class="three wide column">
                            <button id="edit_client_button" class="ui circular icon button">
                                <img src = "/img/draw.svg"/>
                            </button>
                        </div>
                    </div>
                    <div class="row title">
                        <div class="six wide column">
                            <span class="header">Name</span>
                        </div>
                        <div class="five wide column">
                            <span class="header">Alter</span>
                        </div>
                        <div class="five wide column">
                            <span class="header">Geschlecht</span>
                        </div>
                    </div>
                    <div class="row title">
                        <div class="six wide column">
                            <span class="content">{$client.clientname}</span>
                        </div>
                        <div class="five wide column">
                            <span class="content">{$client.age}</span>                      
                        </div>
                        <div class="five wide column">
                            <span id="summary_client_gender" class="content">{$client.gender}</span>                      
                        </div>
                    </div>
                </div>
                <div id="summary_content_area" class="ui grid">
                </div>
                <div id="summary_button_area" class="ui grid">
                    <div class="row">
                        <div class="three wide column">
                        </div>
                        <div class="three wide column">
                            <button id="summary_back_button" class="ui button summary">
                                zurück
                            </button>
                        </div>
                        <div class="seven wide column">
                            <button id="make_appointment_button" class="ui button summary">
                                Termin Vereinbaren
                            </button>
                        </div>
                        <div class="three wide column">
                        </div>                        
                    </div>
                </div>
            </div>
        </div>  
        <div class="ui container">
            <button id="help_button" class="ui button">
                <img class="ui middle aligned image" src="/img/help.svg">                    
                <span>Hilfe</span>
            </button>

            <button id="save_mask_button" class="ui button">    
                Speichern
            </button>

            <button id="clear_mask_button" class="ui button">
                <img class="ui middle aligned image" src="/img/erase_mask.svg">
            </button>

            <div id="edit_canvas_buttons" class="ui container">
                <button id="edit_object_button" class="ui circular icon button">
                    <img src = "/img/draw.svg"/>
                </button>
                <button id="cancel_object_button" class="ui circular icon button">
                    <img src = "/img/close.svg"/>
                </button>
                <button id="move_object_button" class="ui circular icon button">
                    <img src = "/img/move.svg"/>
                </button>
            </div>
            
            <div id="edit_mask_menu" class="ui vertical icon menu">
                <a class="item">
                    <img class="ui middle aligned image" src="/img/move_mask.svg">
                </a>
                <a class="item">
                    <img class="ui middle aligned image" src="/img/zoomin_mask.svg">
                </a>
                <a class="item">
                    <img class="ui middle aligned image" src="/img/zoomout_mask.svg">
                </a>
            </div>            
            <div id="divfile_change">
                <input id="fileDialog_change" type="file" accept="image/*" style='display:none;'>
            </div>
            <button id="take_picture_button" class="ui button">    
                <img class="ui middle aligned image" src="/img/camera.svg">                    
                <span>Eigenes Bild</span>
            </button>

            <button id="edit_position_button" class="ui button">    
                <img class="ui middle aligned image" src="/img/edit_position.svg">                    
                <span>Position editieren</span>
            </button>

            <div id="right_sidebar_area" class="ui compact vertical menu">
                <a class="item">
                    <div>
                        <img class="centered image" src="/img/emotion.svg">
                    </div>
                    <label>Emotionen</label>
                </a>                
                <a class="item">
                    <div>
                        <img class="centered image" src="/img/zones_select.svg">
                    </div>
                    <label>Zonen Selekieren</label>             
                </a>
                <a class="item">
                    <div>
                        <img class="centered image" src="/img/zones_draw.svg">
                    </div>
                    <label>Zonen Zeichnen</label>             
                </a>
                <a class="item">
                    <div>
                        <img class="centered image" src="/img/select_zones.svg">
                    </div>
                    <label>Zonen Wählen</label>             
                </a>
                <a class="item"></a>
            </div>
            <div id="right_sidebar_area_mask">
            </div>
            <div class="item" id="right_btn_area">
                <div id="title" class="header">Project Name</div>
                <div id="name" class="header">{$client.clientname}</div>
                <button id="save_button" class="ui button">    
                    Speichern
                </button> 
                <button id="continue_button" class="ui button">    
                    Weiter
                </button>                               
            </div>
            <div id="sign_layer_area" class="ui small signlayer modal transition hidden">
                <div class="top_header">
                    <div class="brand">
                        <span class="helper"></span>
                        <img src = "/img/sign_pen.svg"/>
                    </div>
                </div>
                <div id="draw_sign_area">
                    <canvas id="sign_canvas"></canvas>
                </div>
                <div class="content">
                    <div id="title_label" class="ui center aligned header">
                        Signieren und AGBs zustimmen
                    </div>
                    <div class="sign_space">
                    </div>
                    <div class="ui section divider"></div>
                    <div class="ui grid">
                        <div class="five wide column">
                            {$client.clientname}
                        </div>
                        <div class="six wide column">
                            {$date}
                        </div>
                        <div class="five wide column">
                            löschen
                        </div>
                    </div>
                </div>
                <form id="do_sign" action="/user/index/dosign" method="post">
                    <input name="justcreated" id="justcreated" type="hidden" value="{$created}">
                    <input name="clientid" id="clientid" type="hidden" value="{$client.id}">
                    <input name="signed" id="signed" type="hidden" value="{$signed}">
                    <input name="signature" id="signature" type="hidden" value="">
                </form>
                <div id="bottom_buttons" class="actions">
                    <span class="helper"></span>
                    <button id="save_edit_button" class="ui button">
                        Speichern
                    </button>                    
                    <button id="cancel_edit_button" class="ui button">
                        Abbrechen
                    </button>
                    <button id="erase_canvas_button" class="ui button">
                    </button>
                </div>
            </div>
            <div id="confirm_layer_area" class="ui small confirmlayer modal transition hidden">
                <div class="top_header">
                    <div class="brand">
                        <span class="helper"></span>
                        <img src = "/img/client_checked.svg"/>
                    </div>
                </div>
                <div class="content">
                    <img class="confirm_background" src = "/img/confirm_background.svg"/>
                    <div id="title_label" class="ui center aligned header">
                        Vielen Dank für die
                        Konfiguration, {$user_info.fullname}
                    </div>
                    <div class="large_avatar">
                        <img class="confirm_client_image" src = "{$client.image}"/>
                    </div>
                    <div id="description" class="ui center aligned header">
                        Sie hören binnen 24 Stunden von uns
                        mit Informationen zu einem Termin mit
                        einen unserer AestheticPartner Beauty experten.
                    </div>
                    <button id="confirm_continue_button" class="ui button">
                        Weiter
                    </button>
                </div>
            </div>
            <div id="edit_layer_area" class="ui small editlayer modal">
                <div class="content">
                    <div id="title_label" class="ui center aligned header">
                        Kundeninformation
                    </div>
                    <form id="edit_client" class="ui form" action="/user/index/editClient" method="POST">
                        <input name="clientid" id="clientid" type="hidden" value="{$client.id}">
                        <div class="field height_section">
                            <label>Kundenname</label>
                            <div class="field">
                                <input name="clientname" id="clientname" type="text" required="required" value="{$client.clientname}">
                            </div>
                        </div>
                        <div class="two fields height_section">
                            <div class="field">
                                <label>Telefonnummer</label>
                                <div class="field">
                                    <input name="phone_number" id="phone_number" type="tel" value="{$client.phonenumber}">
                                </div>
                            </div>
                            <div class="field">
                                <label>Email</label>
                                <div class="field">
                                    <input name="email" id="clientemail" type="email" required="required" value="{$client.email}">
                                </div>
                            </div>                            
                        </div>
                        <div class="field height_section">
                            <label>Anschrift</label>
                            <div class="field">
                                <input name="address" id="address" type="text" value="{$client.address}">
                            </div>
                        </div>    
                        <div class="two fields height_section">
                            <div class="field">
                                <label>Alter</label>
                                <div class="field">
                                    <input name="age" id="age" type="number" value="{$client.age}">
                                </div>
                            </div>
                            <div class="field">
                                <label id="label_btn_group">Geschlecht</label>
                                <div class="field">
                                    <div class="ui buttons btn_group">
                                        <input name="gender" id="gender" type="hidden" value="{$client.gender}">
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
                            <input name="image_src" id="image_src" type="hidden" value="{$client.image}">
                            <div id="image_group" class="fields">
                                <div id="image_list_field" class="field">
                                    <div class="ui images">
                                        <img id="first_image" class="ui middle aligned image" src="/upload/model_1.png">
                                        <img id="second_image" class="ui middle aligned image" src="/upload/model_2.png">
                                        <img id="third_image" class="ui middle aligned image" src="/upload/model_3.png">
                                        <img id="fourth_image" class="ui middle aligned image" src="/upload/model_4.png">
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
                        Speichern
                    </button>                    
                    <button id="cancel_edit_button" class="ui button">
                        Abbrechen
                    </button>
                </div>
            </div>  
            <div id="bottom_bar_area" class="ui borderless labeled icon menu">                                       
            </div>
            <div id="topleft_bar_area" class="ui borderless labeled icon menu">                                       
            </div>            
            <div id="zone_select_area" class="ui modal scrolling transition hidden">
                <div class="content">
                    <form class="ui form">
                        <div class="field height_section">
                            <label>Bemerkung</label>
                            <div class="field">
                                <input id="customer_name_input" type="text">
                            </div>
                        </div>
                        <div class="field height_section">
                            <label>Gesichtsregion</label>
                            <div class="field">
                                <div id="btn_zone_select_group" class="ui buttons">
                                    <div class="ui button border_btn_zone_select">
                                        <img class="ui middle aligned image" src="/img/eye_region.svg">
                                        <span>Augenregion</span>
                                    </div>
                                    <div class="ui button border_btn_zone_select">
                                        <img class="ui middle aligned image" src="/img/nasal_region.svg">
                                        <span>Nasenregion</span>
                                    </div>
                                    <div class="ui button border_btn_zone_select">
                                        <img class="ui middle aligned image" src="/img/forehead_region.svg">
                                        <span>Stirnregion</span>
                                    </div>
                                    <div class="ui button border_btn_zone_select">
                                        <img class="ui middle aligned image" src="/img/mouth_region.svg">
                                        <span>Mundregion</span>
                                    </div>
                                </div>
                            </div>                           
                        </div>
                        <div class="field">
                            <label>Wünsche</label>
                            <div class="field">
                                <div id="wish_list_section" class="ui stackable three cards">     
                                    <div id="wish_card" class="ui card border_wish_card">
                                        <div class="ui centered image image_wish_item">                                           
                                            <img id="wish_item_image" src="/img/brow_lift.svg">
                                        </div>
                                        <div id="wish_title" class="center aligned content">
                                            <div class="header">Augenbrauen <span>(Brow lift)</span></div>
                                        </div>
                                    </div>
                                    <div id="wish_card" class="ui centered card border_wish_card">
                                        <div class="ui centered image image_wish_item">
                                            <img id="wish_item_image" src="/img/crow_fleet.svg">
                                        </div>
                                        <div id="wish_title" class="center aligned content">
                                            <div class="header">Augenfalten <span>(Crow Fleet)</span></div>
                                        </div>
                                    </div>
                                    <div id="wish_card" class="ui centered card border_wish_card">                                        
                                        <div class="ui centered image image_wish_item">
                                            <img id="wish_item_image" src="/img/eyebrows_tear.svg">
                                        </div>
                                        <div id="wish_title" class="center aligned content">
                                            <div class="header">Augenringe & Tränenringe</div>
                                        </div>
                                    </div>
                                    <div id="wish_card" class="ui centered card border_wish_card">
                                        <div class="ui centered image image_wish_item">
                                            <img id="wish_item_image" src="/img/glabella.svg">
                                        </div>
                                        <div id="wish_title" class="center aligned content">
                                            <div class="header">Zonesfalten <span>(Glabella)</span></div>
                                        </div>
                                    </div>
                                    <div id="wish_card" class="ui centered card border_wish_card">
                                        <div class="ui centered image image_wish_item">
                                            <img id="wish_item_image" src="/img/eyebrow_lift.svg">
                                        </div>
                                        <div id="wish_title" class="center aligned content">
                                            <div class="header">Augenbraun Lift</div>
                                        </div>
                                    </div>
                                    <div id="wish_card" class="ui centered card border_wish_card">
                                        <div class="ui centered image image_wish_item">
                                            <img id="wish_item_image" src="/img/morefresh_eyes.svg">
                                        </div>
                                        <div id="wish_title" class="center aligned content">
                                            <div class="header">Frischere Augen</div>
                                        </div>
                                    </div>
                                    <div id="wish_card" class="ui centered card border_wish_card">
                                        <div class="ui centered image image_wish_item">
                                            <img id="wish_item_image" src="/img/crowfoot.svg">
                                        </div>
                                        <div id="wish_title" class="center aligned content">
                                            <div class="header">Krähenfüße</div>
                                        </div>
                                    </div>
                                </div>                
                            </div>
                        </div>
                    </form>
                </div>
                <div id="bottom_buttons" class="actions">
                    <span class="helper"></span>
                    <button id="save_point_button" class="ui button">
                        Speichern
                    </button>
                    <button id="cancel_point_button" class="ui button">
                        <img class="ui middle aligned image" src="/img/erase_mask.svg">
                    </button>
                </div>
            </div>
            <div id="draw_comment_area" class="ui small modal transition hidden">
                <div class="header">
                    Bemerkung
                </div>
                <div class="content">
                    <div class="ui form">
                        <div class="field">
                            <textarea></textarea>
                        </div>
                    </div>
                </div>
                <div id="bottom_buttons" class="actions">
                    <span class="helper"></span>
                    <button id="save_point_button" class="ui button">
                        Speichern
                    </button>
                    <button id="cancel_point_button" class="ui button">
                        <img class="ui middle aligned image" src="/img/erase_mask.svg">
                    </button>
                </div>
            </div>
        </div>
    </body>
</html> 