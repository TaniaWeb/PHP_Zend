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

  </head>
  <body>
    <div class="be-wrapper be-aside be-fixed-sidebar">
      {include file='common/header.tpl'}
      <div class="be-content be-no-padding">
        <aside class="page-aside">
          <div class="be-scroller">
            <div class="aside-content">
              <div class="content">
                <div class="aside-header">
                  <button data-target=".aside-nav" data-toggle="collapse" type="button" class="navbar-toggle"><span class="icon mdi mdi-caret-down"></span></button><span class="title">Configurations</span>
                </div>
              </div>
              <div class="aside-nav collapse">
                <span class="title">BY MODULE</span>
                <ul class="nav">
                    <li id="beauty_configurator_menu" class="active"><a><i class="icon mdi mdi-favorite"></i><span>Beauty Configurator</span></a>
                    </li>
                    <li id="style_vigagistic_menu"><a><i class="icon mdi mdi-male"></i><span>Style & Visagistic</span></a>
                    </li>
                    <li id="cosmetic_configurator_menu"><a><i class="icon mdi mdi-mood"></i><span>Cosmetic Configurator</span></a>
                    </li>
                    <li id="detox_sliming_menu"><a><i class="icon mdi mdi-gesture"></i><span>Detox & Sliming</span></a>
                    </li>
                    <li id="weight_loss_configurator_menu"><a><i class="icon mdi mdi-local-dining"></i><span>Weight Loss Configurator</span></a>
                    </li>
                </ul>
                <span class="title">Labels</span>
                <ul class="nav nav-pills nav-stacked">
                  <li id="all_configurations_menu" {if ($search.status==-1)}class="active"{/if} 
                    onclick="searchByStatus(-1)">
                    <a>
                      <span class="circle-status small-circle status-all"></span>
                      <span>All Configurations</span>
                    </a>
                  </li>
                  <li id="new_menu" onclick="searchByStatus(0)" {if ($search.status==0)}class="active"{/if}>
                    <a>
                      <span class="circle-status small-circle status-new"></span>
                      <span >New</span>
                    </a>
                  </li>
                  <li id="appointment_menu" onclick="searchByStatus(4)" {if ($search.status==4)}class="active"{/if}>
                    <a>
                      <span class="circle-status small-circle status-appointment"></span>
                      <span >Appointment Agreed</span>
                    </a>
                  </li>
                  <li id="treatment_menu" onclick="searchByStatus(5)" {if ($search.status==5)}class="active"{/if}>
                    <a>
                      <span class="circle-status small-circle status-treatment"></span>
                      <span >Beauty Treatment</span>
                    </a>
                  </li>
                  <li id="completed_menu" onclick="searchByStatus(1)" {if ($search.status==1)}class="active"{/if}>
                    <a>
                      <span class="circle-status small-circle status-completed"></span>
                      <span>Completed</span>
                    </a>
                  </li>
                  <li id="pending_menu" onclick="searchByStatus(2)" {if ($search.status==2)}class="active"{/if}>
                    <a>
                      <span class="circle-status small-circle status-pending"></span>
                      <span>Pending</span>
                    </a>
                  </li>
                  <li id="deleted_menu" onclick="searchByStatus(3)" {if ($search.status==3)}class="active"{/if}>
                    <a>
                      <span class="circle-status small-circle status-deleted"></span>
                      <span>Deleted</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </aside>
        <div class="main-content container-fluid">

          <form id="search_form" action="/admin/customer/configurations" method="post">
          <input type=hidden name="search_status" id="search_status" value={$search.status}>
          <input type=hidden name="search_orderby" id="search_orderby" value="{$search.orderby}">
          <input type=hidden name="search_ordertype" id="search_ordertype" value={$search.ordertype}>
          <input type=hidden name="search_page" id="search_page" value={$search.page}>
          <input type=hidden name="search_total_count" id="search_total_count" value={$search.total_count}>

          <div class="email-inbox-header">
            <div class="row">
              <div class="col-md-6">
                <div class="email-title"> All <span class="new-messages">(2 New)</span>  </div>
              </div>
              <div class="col-md-6">
                <div class="email-search">
                  <div class="input-group input-search input-group-sm">
                    <input type="text" name="search_clientname" placeholder="Find Configuration" class="form-control" value="{$search.clientname}"><span class="input-group-btn">
                      <button type="button" class="btn btn-default" onclick="submitClientSearch()" ><i class="icon mdi mdi-search"></i></button></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="email-filters">
            <div class="email-filters-left">
              <div class="col-md-5">
                <div class="configuration-search">
                  <div class="input-group input-search input-group-sm">
                    <input type="text" name="search_user" placeholder="by User / Company" class="form-control" value="{$search.user}"><span class="input-group-btn">
                      <button class="btn btn-default" onclick="submitClientSearch()"><i class="icon mdi mdi-search"></i></button></span>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="configuration-search">
                  <div class="input-group input-search input-group-sm">
                    <input type="text" name="search_location" placeholder="by Location" class="form-control" value="{$search.location}"><span class="input-group-btn">
                      <button class="btn btn-default" onclick="submitClientSearch()"><i class="icon mdi mdi-search"></i></button></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="email-filters-right">
              <div class="btn-group">
                <button data-toggle="dropdown" type="button" class="btn btn-default dropdown-toggle">Order by <span class="caret"></span></button>
                  <ul role="menu" class="dropdown-menu dropdown-menu-right">
                    <li onclick="searchWithOrder('date_last_saved', 'ASC')">
                      <a href="#">Date Ascending
                        {if ($search.ordertype=="ASC")}
                        <span class="glyphicon glyphicon-ok" style="margin-left: 10px;"></span>
                        {/if}
                      </a>
                    </li>
                    <li onclick="searchWithOrder('date_last_saved', 'DESC')">
                      <a href="#">Date Descending
                        {if ($search.ordertype=="DESC")}
                        <span class="glyphicon glyphicon-ok" style="margin-left: 10px;"></span>
                        {/if}
                      </a>
                    </li>
                  </ul>
              </div>
              <span class="email-pagination-indicator">{$search.page*20+1} - {if ($search.total_count<$search.page*20+20)}{$search.total_count}{else}{$search.page*20+20}{/if} of {$search.total_count}</span>
              <div class="btn-group email-pagination-nav">

                <button type="button" onclick="prevPage()" class="btn btn-default" {if $search.page==0} disabled="true" {/if}><i class="mdi mdi-chevron-left"></i></button>
                <button type="button" onclick="nextPage()" class="btn btn-default" {if $search.page*20+20>$search.total_count} disabled="true" {/if}><i class="mdi mdi-chevron-right"></i></button>
              </div>
            </div>
          </div>
          </form>
          <div class="container-fluid">
              <div id="configurations_container" class="row">
                {foreach from=$clients item=client_info}
                <div class="col-md-4" onclick="loadBeauty('{$client_info.id}', '{$client_info.clientname}','{$client_info.userid}')">
                
                    <div class="card" >
                        <div class="image">
                            <img src="{$client_info.points_image}">
                            <div class="status new-label">
                              <span class="helper"></span>
                              {if ($client_info.finished ==1)}
                                <span class="circle-status status-completed"></span>
                                <span>completed</span>
                              {/if}
                              {if ($client_info.finished==0)}
                                {if ($client_info.draft =="0")}
                                  <span class="circle-status status-new"></span>
                                  <span>new</span>
                                {/if}
                                {if ($client_info.draft =="1")}
                                  <span>
                                  <span class="circle-status status-pending" style="position: relative; z-index: 200;"></span>
                                  <span class="circle-status status-treatment" style="position: relative; left: -8px; z-index: 199;"></span>
                                  </span>
                                  <span>pending</span>
                                {/if}
                              {/if}
                              
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
                            <img class="avatar" src="{$client_info.avatar}">
                            <span>{$client_info.username}</span>
                            <img class="go_detail" src="/img/go_detail.svg">
                        </div>
                    </div>
               
                </div>
                {/foreach}
             </div>
          </div>
        </div>
      </div>
      {include file='common/footer.tpl'}
    </div>

  </body>

    <script src="/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="/assets/js/configurations.js" type="text/javascript"></script>
    <script src="/assets/js/main.js" type="text/javascript"></script>
    <script src="/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery.magnific-popup/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <script src="/assets/lib/masonry/masonry.pkgd.min.js" type="text/javascript"></script>
    <script src="/assets/js/app-mail-inbox.js" type="text/javascript"></script>
    <script src="/assets/js/customer_manage.js" type="text/javascript"></script>

</html>