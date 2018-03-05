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
        <div class="main-content container-fluid" >
        {foreach from=$clients item=client_info}
          {if ($client_info.clientname == $customer && $client_info.userid == $user)}
          <div class="profile-header">
            <div class="row">
              <div class="col-md-10">
                <div class="profile-item">Customer Name</div>
                  <div style="font-size:23px">{$client_info.clientname}</div>
              </div>
              <div class="col-md-2">
                <div class="pull-right">
                  <div class="profile-item">Configurations</div>
                  <div class="pull-right" style="font-size:23px">2</div>                  
                </div>                
              </div>
            </div>
            <div class="row" style="margin-top:13px">
              <div class="col-md-10">
                <div class="row" >
                  <div class="col-md-3">
                    <div class="profile-item">Phone Number</div>
                    <div style="font-size:15px">{$client_info.c_phone}</div>    
                  </div>
                  <div class="col-md-3">
                    <div class="profile-item">Email</div>
                    <div style="font-size:15px">{$client_info.email}</div>    
                  </div>
                  <div class="col-md-3">
                    <div class="profile-item">Age</div>
                    <div style="font-size:15px">{$client_info.age}</div>    
                  </div>
                  <div class="col-md-3">
                    <div class="profile-item">Gender</div>
                    
                      <div style="font-size:15px"><img class="gender-img-{$client_info.gender}"> {if ($client_info.gender==0)}female{else}male{/if}
                      </div>
                  </div>
                </div>
                <div class="row" style="margin-top:13px">
                  <div class="col-md-12">
                    <div class="profile-item">Address</div>

                    <div style="font-size:15px">{$client_info.address}</div>                    
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="pull-right">
                  <div class="profile-item">Signature</div>
                  <div class="pull-right">
                    <img src="{$client_info.signature}">
                  </div>                  
                </div>                
              </div>
            </div>
            <div class="row" style="margin-top:13px">
              <div class="col-md-12">
                <div class="profile-item"><span style="color:rgb(115, 88, 249);">Next Appointment</span> (User treatment)</div>

                <div style="font-size:20px; color: rgb(115, 88, 249); padding-top: 3px;">
                  <span class="glyphicon glyphicon-calendar"></span>&nbsp;15.08.2017&nbsp;&nbsp;<span class="glyphicon glyphicon-time" style="position: relative; top: 3px;"></span>&nbsp;9:30
                </div>

                </div>                    
              </div>
            </div>
          </div>
          {/if}
        {/foreach}        
          <div class="container-fluid" style="padding:20px; padding-top:0px;">
            <div id="customerProfile_table_container" class="row" >
                  {foreach from=$clients item=client_info}
                   {if ($client_info.clientname == $customer)}
                    <div class="col-md-3" onclick="loadBeauty('{$client_info.id}', '{$client_info.clientname}','{$client_info.userid}')">
                      <div class="card">
                          <div class="image">
                              <img src="{$client_info.points_image}">
                              <div class="status new-label">
                                <span class="helper"></span>
                                <span class="circle-status status-new"></span>
                                <span>new</span>
                              </div>
                          </div>
                          <div class="content">
                              <div class="header">
                                <span>{$client_info.clientname}</span>
                                <img class="gender-img-{$client_info.gender}">
                              </div>
                              <div class="meta"><span class="glyphicon glyphicon-ok"></span>&nbsp;{$client_info.points_count}&nbsp;Konfigurationen</div>
                              <div class="treatment"><span class="glyphicon glyphicon-ok"></span>&nbsp;Beauty Treatment</div>
                              <div class="appointment"><span class="glyphicon glyphicon-calendar"></span>&nbsp;15.08.2017&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>&nbsp;9:30</div>
                              <div class="description">
                                <i class="mdi mdi-pin"></i>
                                <span class="location">{$client_info.address}</span>
                                <span class="date">{$client_info.date_last_saved}</span>
                              </div>
                          </div>
                          <div class="bottom_bar">                              
                              <img class="avatar" src="{$info_user.avatar}">
                              <span>{$info_user.fullname}</span>
                              <img class="go_detail" src="/img/go_detail.svg">
                          </div>
                      </div>
                    </div>
                   {/if}
                  {/foreach}
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