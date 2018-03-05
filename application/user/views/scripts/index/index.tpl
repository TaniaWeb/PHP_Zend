<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Standard Meta -->
  
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<!-- Site Properties -->
<title>Aesthetic Partner</title>

<link rel="shortcut icon" href="/img/Artboard.png"> 
<link rel="stylesheet" type="text/css" href="/css/reset.css">
<link rel="stylesheet" type="text/css" href="/css/site.css">

<link rel="stylesheet" type="text/css" href="/css/container.css">
<link rel="stylesheet" type="text/css" href="/css/grid.css">
<link rel="stylesheet" type="text/css" href="/css/header.css">
<link rel="stylesheet" type="text/css" href="/css/image.css">
<link rel="stylesheet" type="text/css" href="/css/menu.css">

<link rel="stylesheet" type="text/css" href="/css/divider.css">
<link rel="stylesheet" type="text/css" href="/css/segment.css">
<link rel="stylesheet" type="text/css" href="/css/form.css">
<link rel="stylesheet" type="text/css" href="/css/input.css">
<link rel="stylesheet" type="text/css" href="/css/button.css">
<link rel="stylesheet" type="text/css" href="/css/list.css">
<link rel="stylesheet" type="text/css" href="/css/message.css">
<link rel="stylesheet" type="text/css" href="/css/icon.css">
<link rel="stylesheet" type="text/css" href="/css/login.css">
<link rel="stylesheet" type="text/css" href="/css/fontface.css">  

<script src="/js/jquery.min.js"></script>
<script src="/js/fabric.min.js"></script>
<script src="/js/form.js"></script>
<script src="/js/transition.js"></script>

<script src="/js/login.js"></script>
<script src="/js/common.js"></script>

<script src="/js/select_zones.js"></script>

<body>
    <div id="wrapper"class="ui main container">
        <div id="context" class="middle aligned content">
        	<form id="loginform" method="POST" action="/user/index/index">
        		<input type="hidden" name="userid" value="{$userid}"/>
        		<input type="hidden" name="page_action" value="{$page_action}"/>
        		<input type="hidden" name="client_id" value="{$client_id}"/>
        		
	            <div style="text-align:center">
	                <img src="/img/logo.svg" class="image">
	            </div>
	            <div class="ui container">
	                <label class="ui label">EMAIL ADDRESSE</label>
	                <input id="username" name="username" class="ui fluid input" required="required" type="email" onKeyPress="onNameKeydown(event)"/>
	            </div>
	            <div class="ui container">
	                <div id="horizontal_segments" class="ui borderless horizontal segments">
	                    <div class="ui borderless segment">
	                        <label class="ui label">PASSWORD</label>
	                    </div>
	                    <div class="ui right aligned segment">
	                        <label class="ui label">Passwort vergessen?</label>
	                    </div>
	                </div>
	                <input id="password" name="password" class="ui fluid input" required="required" type="password" onKeyPress="onPwdKeydown(event)"/> 
	            </div>
	            <div class="ui center aligned container">  	
	                <button id="login_button" class="ui button">    
	                    Speichern
	                </button>
	            </div>
            </form>
        </div>
        <p id="msg" align=center>{$msg}</p>
    </div>
</body>
</html>