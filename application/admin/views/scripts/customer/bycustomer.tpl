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
    <div class="be-wrapper be-fixed-sidebar">
      {include file='common/header.tpl'}
      <div class="be-content be-no-padding">
        <div class="main-content container-fluid">
          <form id="search_form" action="/admin/customer/bycustomer" method="post">
          <input type=hidden name="search_status" id="search_status" value={$search.status}>
          <input type=hidden name="search_orderby" id="search_orderby" value="{$search.orderby}">
          <input type=hidden name="search_ordertype" id="search_ordertype" value={$search.ordertype}>
          <input type=hidden name="search_page" id="search_page" value={$search.page}>
          <input type=hidden name="search_total_count" id="search_total_count" value={$search.total_count}>

          <div class="email-inbox-header">
            <div class="row">
              <div class="col-md-8">
                <div class="email-title">by Customers</div>
              </div>
              <div class="col-md-4">
                <div class="email-search">
                  <div class="input-group input-search input-group-sm">
                    <input type="text" name="search_clientname" placeholder="Find Customer" class="form-control" value="{$search.clientname}"><span class="input-group-btn">
                      <button type="button" class="btn btn-default" onclick="submitClientSearch()"><i class="icon mdi mdi-search"></i></button></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="email-filters">
            <div class="email-filters-left">
              <div class="col-md-3">
                <div class="configuration-search">
                  <div class="input-group input-search input-group-sm">
                    <input name="search_user" type="text" placeholder="by User / Company" class="form-control" value="{$search.user}"><span class="input-group-btn">
                      <button type="button" class="btn btn-default" onclick="submitClientSearch()"><i class="icon mdi mdi-search"></i></button></span>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="configuration-search">
                  <div class="input-group input-search input-group-sm">
                    <input name="search_location" type="text" placeholder="by Location" class="form-control" value="{$search.location}"><span class="input-group-btn">
                      <button type="button" class="btn btn-default" onclick="submitClientSearch()"><i class="icon mdi mdi-search"></i></button></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="btn-group">
                  <button onclick="searchByStatus(-1)" class="btn btn-default" style="width:55px;">All</button>
                  <button onclick="searchByStatus(0)" class="btn btn-default"><span class="circle-status small-button-circle status-new"></span>new</button>
                  <button onclick="searchByStatus(1)" class="btn btn-default"><span class="circle-status small-button-circle status-completed"></span>completed</button>
                  <button onclick="searchByStatus(2)" class="btn btn-default"><span class="circle-status small-button-circle status-pending"></span>pending</button>
                </div>
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
                    <!-- <li class="divider"></li> -->
                  </ul>
                </div>
              </div>
            </div>
            <div class="email-filters-right">
              <span class="email-pagination-indicator">{$search.page*20+1} - {if ($search.total_count<$search.page*20+20)}{$search.total_count}{else}{$search.page*20+20}{/if} of {$search.total_count}</span>
              <div class="btn-group email-pagination-nav">

                <button type="button" onclick="prevPage()" class="btn btn-default" {if $search.page==0} disabled="true" {/if}><i class="mdi mdi-chevron-left"></i></button>
                <button type="button" onclick="nextPage()" class="btn btn-default" {if $search.page*20+20>$search.total_count} disabled="true" {/if}><i class="mdi mdi-chevron-right"></i></button>
              </div>
            </div>
          </div>
          <div class="container-fluid">
            <div id="bycustomer_table_container" class="row">
              <div class="col-md-12">
                <div class="panel panel-default panel-table">
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
                        <tr onclick="loadProfile('{$client_info.clientname}', '{$client_info.userid}')">
                          <td class="user-avatar"> <img src="{$client_info.image}" alt="Avatar">{$client_info.clientname}</td>
                          <td>{$client_info.points_count}</td>
                          <td style="color: rgb(246, 114, 114);"><span class="glyphicon glyphicon-ok"></span></td>
                          <td style="color: rgb(115, 88, 249); font-weight: bold;">01.09.2017</td>
                          <td><img class="gender-img-{$client_info.gender}"></td>
                          <td>{$client_info.address}</td>
                          <td>{$client_info.date_last_saved}</td>
                          <td>{$client_info.username}</td>
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
    <script src="/assets/js/customer_manage.js" type="text/javascript"></script>
    
  </body>
</html>