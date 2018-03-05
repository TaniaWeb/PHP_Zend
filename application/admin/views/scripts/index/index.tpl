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
    <link rel="stylesheet" type="text/css" href="/assets/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/lib/jqvmap/jqvmap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css"/>
  </head>
  <body>
    <div class="be-wrapper be-fixed-sidebar">
      {include file='common/header.tpl'}
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-3">
              <div class="widget widget-tile">
                <div class="data-info">
                  <div class="desc">New Configurations</div>
                  <!-- <div class="desc2"><img src="/assets/img/dropbox.png" alt="Avatar"></div> -->
                  <div class="value">
                    <ul class="chart-legend-horizontal value">
                      <li>
                      {$new}
                        <span data-color="main-chart-color1" style="background-color: rgb(43, 176, 212);"></span>
                        <!-- <button class="btn btn-space btn-primary">Primary</button> -->
                      </li>
                      <li>
                        <img class="title-image" src="/img/dashboard_configuration.svg">
                        <button class="btn btn-default btn-view" onclick="loadNew({$new})">View</button>
                          <form id="new_config_form" action="/admin/customer/configurations" method="post">
                            <input type=hidden name="search_status" id="search_status" value=0>
                          </form>
                       </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
              <div class="widget widget-tile">
                <div class="data-info">
                  <div class="desc">Unfinished Configurations</div>
                  <div class="value">

                    <ul class="chart-legend-horizontal value">
                      <li>
                        {$pending}                                 
                        <span style="background-color: rgb(228, 163, 91);"></span>
                      </li>
                      <li>
                        <img class="title-image" src="/img/dashboard_configuration.svg">
                        <button class="btn btn-default btn-view" onclick="loadPending({$pending})">View</button>
                      </li>
                    </ul> 
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
              <div class="widget widget-tile">
                <div class="data-info">
                  <div class="desc">New Users requests</div>
                  <div class="value">
                    <ul class="chart-legend-horizontal value">
                      <li>
                        {$new_user}
                      </li>
                      <li>
                        <form id="new_user_form" action="/admin/user/list" method="post">
                          <input type=hidden name="search_status" id="user_search_status" value=0>
                        </form>
                        <img class="title-image" src="/img/dashboard_users.svg">
                        <button class="btn btn-default btn-view" onclick="loadNewUser()">View</button>
                      </li>                      
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
              <div class="widget widget-tile">
                <div class="data-info">
                  <div class="desc">Total Configurations</div>
                  <div class="value">
                    <ul class="chart-legend-horizontal value">
                      {foreach from=$clients item=client_info}
                       
                         <input type="hidden" value="{$k++}">
                      
                       {/foreach}
                      <li>
                        {$k}
                      </li>
                    </ul>
                  </div>
                </div>
                <div id="spark4" class="chart sparkline"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default panel-table">
                <div class="panel-heading">
                  <div class="title">Last Aesthetic Configurations</div>
                </div>
                <div class="panel-body table-responsive">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th style="width:22%;">Customer</th>
                        <th style="width:6%;">Pts.</th>
                        <th style="width:7%;">Treats.</th>
                        <th style="width:10%;">Next Appoint.</th>
                        <th style="width:6%;">Gender</th>
                        <th style="width:14%;">Location</th>
                        <th style="width:14%;">Date</th>
                        <th style="width:12%;">User/Company</th>
                        <th>Status</th>
                        <th class="actions"></th>
                      </tr>
                    </thead>
                    <tbody>
                      {foreach from=$clients item=client_info}
                      <tr onclick="loadBeauty('{$client_info.id}', '{$client_info.clientname}','{$client_info.userid}')">
                        <td class="user-avatar">
                          <img src="{$client_info.image}" alt="Avatar">{$client_info.clientname}
                        </td>
                        <td>{$client_info.points_count}</td>
                        <td style="color: rgb(246, 114, 114);"><span class="glyphicon glyphicon-ok"></span></td>
                        <td style="color: rgb(115, 88, 249); font-weight: bold;">01.09.2017</td>
                        <td><img class="gender-img-{$client_info.gender}"></td>
                        <td>{$client_info.address}</td>
                        <td>{$client_info.c_date}</td>
                        <td>{$client_info.fullname}</td>
                        <td>
                        {if ($client_info.finished ==1)}
                        <span class="circle-status status-completed" style="float: right;"></span>
                        {/if}
                        {if ($client_info.finished !=1)}
                          {if ($client_info.draft =="0")}
                            <span class="circle-status" style="float: right;"></span>
                          {/if}
                          {if ($client_info.draft =="1")}
                            <span class="circle-status status-pending" style="position: relative; float: right;"></span>
                            <span class="circle-status status-completed" style="position: relative; left: 5px; float: right;"></span>
                          {/if}
                        {/if}
                        </td>
                        <td class="actions"><img class="go_detail" src="/img/go_detail.svg"></td>
                      </tr>
                      {/foreach}
                    </tbody>
                  </table>
                </div>
                <div class="bottom_table">
                  <button class="btn btn-default btn-show-all">show all Configurations</button>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="panel panel-default panel-table">
                <div class="panel-heading"> 
                  <div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div>
                  <div class="title">User Status</div>
                </div>
                <div class="panel-body table-responsive">
                  <table class="table table-striped table-borderless">
                    <thead>
                      <tr>
                        <th style="width:35%;">User</th>
                        <th style="width:20%;">Account Type</th>
                        <th style="width:25%;">Date</th>
                        <th style="width:15%;">State</th>
                        <th style="width:5%;" class="actions"></th>
                      </tr>
                    </thead>
                    <tbody class="no-border-x">
                      {foreach from=$users item=user_info}
                      <tr>
                        <td>{$user_info.fullname}</td>
                        <td>
                          {if ($user_info.account_type==0)}
                            Basic
                          {/if}
                          {if ($user_info.account_type==1)}
                            Free
                          {/if}
                        </td>
                        <td>{$user_info.date_last_saved}</td>
                        <td class="text-success">
                          {if ($user_info.activated==1)}
                            activated
                          {else}                          
                            deactivated
                          {/if}
                        </td>
                        <td class="actions"><a href="/admin/user/profile?user_id={$user_info.id}" class="icon"><i class="mdi mdi-plus-circle-o"></i></a></td>
                      </tr>
                      {/foreach}
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="widget be-loading">
                <div class="widget-head">
                  <div class="tools"><span class="icon mdi mdi-chevron-down"></span><span class="icon mdi mdi-refresh-sync toggle-loading"></span><span class="icon mdi mdi-close"></span></div>
                  <div class="title">Account Types</div>
                </div>
                <div class="widget-chart-container">
                  <div id="top-sales" style="height: 178px;"></div>
                  <div class="chart-pie-counter">{$free_user+$basic_user}</div>
                </div>
                <div class="chart-legend">
                  <table>
                    <tr>
                      <td class="chart-legend-color"><span data-color="top-sales-color1"></span></td>
                      <td>Basic Business Account</td>
                      <td class="chart-legend-value">
                      <input type="hidden" id="basic_user" value="{$basic_user}">
                      {$basic_user}
                      </td>
                    </tr>
                    <tr>
                      <td class="chart-legend-color"><span data-color="top-sales-color2"></span></td>
                      <td>Advanced Business Account</td>
                      <td class="chart-legend-value">0</td>
                    </tr>
                    <tr>
                      <td class="chart-legend-color"><span data-color="top-sales-color3"></span></td>
                      <td>Free Account</td>
                      <td class="chart-legend-value">
                        <input type="hidden" id="free_user" value="{$free_user}">
                        {$free_user}
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="be-spinner">
                  <svg width="40px" height="40px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                    <circle fill="none" stroke-width="4" stroke-linecap="round" cx="33" cy="33" r="30" class="circle"></circle>
                  </svg>
                </div>
              </div>
            </div>
          </div>          
          <div class="row">
            <div class="col-md-12">
              <div class="widget widget-fullwidth be-loading">
                <div class="widget-head">
                  <div class="tools">
                    <div class="dropdown"><span data-toggle="dropdown" class="icon mdi mdi-more-vert visible-xs-inline-block dropdown-toggle"></span>
                      <ul role="menu" class="dropdown-menu">
                        <li><a href="#">Week</a></li>
                        <li><a href="#">Month</a></li>
                        <li><a href="#">Year</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Today</a></li>
                      </ul>
                    </div><span class="icon mdi mdi-chevron-down"></span><span class="icon toggle-loading mdi mdi-refresh-sync"></span><span class="icon mdi mdi-close"></span>
                  </div>
                  <div class="button-toolbar hidden-xs">
                    <div class="btn-group">
                      <button type="button" class="btn btn-default">Week</button>
                      <button type="button" class="btn btn-default active">Month</button>
                      <button type="button" class="btn btn-default">Year</button>
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default">Today</button>
                    </div>
                  </div><span class="title">Statistics</span>
                </div>
                <div class="widget-chart-container">
                  <div class="widget-chart-info">
                    <ul class="chart-legend-horizontal">
                      <li><span data-color="main-chart-color1"></span> Konfigurationen</li>
                      <li><span data-color="main-chart-color2"></span> Benutzer</li>
                      <li><span data-color="main-chart-color3"></span> Business Konten</li>
                    </ul>
                  </div>
                  <div class="widget-counter-group widget-counter-group-right">
                    <div class="counter counter-big">
                      <div class="value">25%</div>
                      <div class="desc">Purchase</div>
                    </div>
                    <div class="counter counter-big">
                      <div class="value">5%</div>
                      <div class="desc">Plans</div>
                    </div>
                    <div class="counter counter-big">
                      <div class="value">5%</div>
                      <div class="desc">Services</div>
                    </div>
                  </div>
                  <div id="main-chart" style="height: 260px;"></div>
                </div>
                <div class="be-spinner">
                  <svg width="40px" height="40px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                    <circle fill="none" stroke-width="4" stroke-linecap="round" cx="33" cy="33" r="30" class="circle"></circle>
                  </svg>
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
    <script src="/assets/js/dashboard.js" type="text/javascript"></script>
    <script src="/assets/js/main.js" type="text/javascript"></script>
    <script src="/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery.sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="/assets/lib/countup/countUp.min.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="/assets/lib/jqvmap/jquery.vmap.min.js" type="text/javascript"></script>
    <script src="/assets/lib/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="/assets/js/app-dashboard.js" type="text/javascript"></script>

  </body>
</html>