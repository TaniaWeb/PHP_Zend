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
    <link rel="stylesheet" href="/assets/css/customize.css" type="text/css"/>
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css"/>
    
  </head>
  <body>
    <div class="be-wrapper be-fixed-sidebar">
      {include file='common/header.tpl'}
      <div class="be-content be-no-padding">

        <div class="main-content container-fluid">
          <div class="email-inbox-header">
            <div class="row">
              <div class="col-md-8">
                <div class="email-title">Companies</div>
              </div>
              <div class="col-md-4" style="text-align:right;">
                <button class="btn btn-default add_company" onclick="loadCompany()">Add Company</button>
              </div>
            </div>
          </div>
          <form id="search_form" action="/admin/company/list" method="post">
          <input type=hidden name="search_status" id="search_status" value={$search.status}>
          <input type=hidden name="search_orderby" id="search_orderby" value={$search.orderby}>
          <input type=hidden name="search_page" id="search_page" value={$search.page}>
          <input type=hidden name="search_total_count" id="search_total_count" value={$search.total_count}>

          <div class="email-filters">
            <div class="email-filters-left">
              <div class="col-md-3">
                <div class="configuration-search">
                  <div class="input-group input-search input-group-sm">
                    <input type="text" name="search_company" value="{$search.company}" placeholder="find Company" class="form-control"><span class="input-group-btn">
                      <button type="button" onclick="submitCompanySearch()" class="btn btn-default"><i class="icon mdi mdi-search"></i></button></span>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="configuration-search">
                  <div class="input-group input-search input-group-sm">
                    <input type="text" name="search_worker" value="{$search.worker}" placeholder="by Worker" class="form-control"><span class="input-group-btn">
                      <button type="button" onclick="submitCompanySearch()" class="btn btn-default"><i class="icon mdi mdi-search"></i></button></span>
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
                    <li onclick="searchWithOrder('email')"><a href="#">EMail</a></li>
                    <li onclick="searchWithOrder('fullname')"><a href="#">Company Name</a></li>
                    <li class="divider"></li>
                    <li onclick="searchWithOrder('date_last_saved')"><a href="#">Last Modified Date</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="email-filters-right"><span class="email-pagination-indicator">{$search.page*20+1} - {if ($search.total_count<$search.page*20+20)}{$search.total_count}{else}{$search.page*20+20}{/if} of {$search.total_count}</span>
              <div class="btn-group email-pagination-nav">
                <button type="button" onclick="prevPage()" class="btn btn-default" {if $search.page==0} disabled="true" {/if}>
                  <i class="mdi mdi-chevron-left"></i>
                </button>
                <button type="button" onclick="nextPage()" class="btn btn-default" {if $search.page*20+20>$search.total_count} disabled="true" {/if}>
                  <i class="mdi mdi-chevron-right"></i>
                </button>
              </div>
            </div>
          </div>
          </form>

          <div class="container-fluid">
            <div id="bycustomer_table_container" class="row">
              <div class="col-md-12">
                <div class="panel panel-default panel-table">
                  <div class="panel-body table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr >
                          <th style="width:25%;">Name</th>
                          <th style="width:10%;">Modules</th>
                          <th style="width:20%;">Location</th>
                          <th style="width:10%; text-align:right;">Total Conf.</th>
                          <th style="width:5%; text-align:right;">Workers</th>
                          <th style="width:10%; text-align:right;">Type</th> 
                          <th style="width:5%;">Payment</th>                          
                          <th style="width:15%;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        {foreach from=$companies item=company_info}

                        <tr onclick="viewCompanyProfile({$company_info.id})" style="cursor:pointer">
                          <td class="user-avatar">
                            {if ($company_info.activated==1)}
                            <span class="circle-status small-button-circle status-completed"></span>
                            {/if}
                            {if ($company_info.activated==0 && $company_info.days<=3)}
                            <span class="circle-status small-button-circle status-new"></span>
                            {/if}
                            {if ($company_info.activated==0 && $company_info.days>3)}
                            <span class="circle-status small-button-circle status-pending"></span>
                            {/if}
                            <img src="{$company_info.avatar}" alt="Avatar">{$company_info.fullname}</img>
                            <br>
<!--                        <img src="{$company_info.logo}" alt="Avatar"></img>
                            <img src="{$company_info.logo}" alt="Avatar"></img>
                            <img src="{$company_info.logo}" alt="Avatar"></img>
 -->
                          </td>
                          <td>
                            {if ($company_info.bc_check==1)}
                            <i class="icon mdi mdi-favorite"  style="color:rgb(43, 176, 212);"></i>
                            {/if}
                            <br>
                            <br>
                          </td>
                          <td>
                            {$company_info.street}                            
                            <br>
                            <br>
                          </td>
                          <td style="text-align:right">
                            {$company_info.points_count}                            
                            <br>
                            <br>
                          </td>
                          <td style="text-align:right">
                            {$company_info.user_count}                            
                            <br>
                            <br>
                          </td>
                          <td style="text-align:right">
                            {if $company_info.type==0}
                            Hotel
                            {/if}
                            {if $company_info.type==1}
                            Spa
                            {/if}
                            {if $company_info.type==2}
                            Hairdress
                            {/if}
                            <br>
                            <br>
                          </td>                          
                          <td class="actions" style="text-align:right">
                            <img class="go_detail" style=" fill: #ff0000;" src="/img/company_payment_check.svg">
                            <br>
                            <br>
                          </td>
                          <td style="text-align:right;">
                            <div class="btn-group">
                              <button id="btn_remove_company" onclick="removeCompany(event, '{$company_info.id}')" class="btn btn-default" style="width:70px;">remove</button>
                              <button id="btn_edit_company" onclick="editCompany(event, '{$company_info.id}')" class="btn btn-default" style="width:53px;">edit</button>
                            </div>
                            <br>
                          </td>
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
    <script src="/assets/js/company_manage.js" type="text/javascript"></script>

  </body>
</html>