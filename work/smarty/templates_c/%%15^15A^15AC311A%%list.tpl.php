<?php /* Smarty version 2.6.18, created on 
         compiled from user/list.tpl */ ?>
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
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <div class="be-content be-no-padding">
        <div class="main-content container-fluid">
          <div class="email-inbox-header">
            <div class="row">
              <div class="col-md-8">
                <div class="email-title">Users</div>
              </div>
              <div class="col-md-4" style="text-align:right;">
                <button class="btn btn-default add_user" onclick="addUser()">Add User</button>
              </div>
            </div>
          </div>

          <form id="search_form" action="/admin/user/list" method="post">
          <input type=hidden name="search_status" id="search_status" value=<?php echo $this->_tpl_vars['search']['status']; ?>
>
          <input type=hidden name="search_orderby" id="search_orderby" value=<?php echo $this->_tpl_vars['search']['orderby']; ?>
>
          <input type=hidden name="search_ordertype" id="search_ordertype" value=<?php echo $this->_tpl_vars['search']['ordertype']; ?>
>
          <input type=hidden name="search_page" id="search_page" value=<?php echo $this->_tpl_vars['search']['page']; ?>
>
          <input type=hidden name="search_total_count" id="search_total_count" value=<?php echo $this->_tpl_vars['search']['total_count']; ?>
>

          <div class="email-filters">
            <div class="email-filters-left">
              <div class="col-md-3">
                <div class="configuration-search">
                  <div class="input-group input-search input-group-sm">
                    <input type="text" name="search_user" placeholder="find User" class="form-control" value="<?php echo $this->_tpl_vars['search']['username']; ?>
"><span class="input-group-btn">
                      <button type="button" onclick="submitUserSearch()" class="btn btn-default"><i class="icon mdi mdi-search"></i></button></span>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="configuration-search">
                  <div class="input-group input-search input-group-sm">
                    <input type="text" name="search_location" placeholder="by Location" class="form-control" value="<?php echo $this->_tpl_vars['search']['location']; ?>
"><span class="input-group-btn">
                      <button type="button" onclick="submitUserSearch()" class="btn btn-default"><i class="icon mdi mdi-search"></i></button></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="btn-group">
                  <button onclick="searchByStatus(-1)" class="btn btn-default" style="width:55px;">All</button>
                  <button onclick="searchByStatus(0)" class="btn btn-default"><span class="circle-status small-button-circle status-new"></span>new</button>
                  <button onclick="searchByStatus(1)" class="btn btn-default"><span class="circle-status small-button-circle status-completed"></span>activated</button>
                  <button onclick="searchByStatus(2)" class="btn btn-default"><span class="circle-status small-button-circle status-pending"></span>pending</button>
                </div>
                <div class="btn-group">
                  <button data-toggle="dropdown" type="button" class="btn btn-default dropdown-toggle">Order by <span class="caret"></span></button>
                  <ul role="menu" class="dropdown-menu dropdown-menu-right">
                    <li onclick="searchWithOrder('date_last_saved', 'ASC')">
                      <a href="#">Date Ascending
                        <?php if (( $this->_tpl_vars['search']['ordertype'] == 'ASC' )): ?>
                        <span class="glyphicon glyphicon-ok" style="margin-left: 10px;"></span>
                        <?php endif; ?>
                      </a>
                    </li>
                    <li onclick="searchWithOrder('date_last_saved', 'DESC')">
                      <a href="#">Date Descending
                        <?php if (( $this->_tpl_vars['search']['ordertype'] == 'DESC' )): ?>
                        <span class="glyphicon glyphicon-ok" style="margin-left: 10px;"></span>
                        <?php endif; ?>
                      </a>
                    </li>
                    <!-- <li class="divider"></li> -->
                  </ul>
                </div>
              </div>
            </div>
            <div class="email-filters-right"><span class="email-pagination-indicator"><?php echo $this->_tpl_vars['search']['page']*20+1; ?>
 - <?php if (( $this->_tpl_vars['search']['total_count'] < $this->_tpl_vars['search']['page']*20+20 )): ?><?php echo $this->_tpl_vars['search']['total_count']; ?>
<?php else: ?><?php echo $this->_tpl_vars['search']['page']*20+20; ?>
<?php endif; ?> of <?php echo $this->_tpl_vars['search']['total_count']; ?>
</span>
              <div class="btn-group email-pagination-nav">
                <button type="button" onclick="prevPage()" class="btn btn-default" <?php if ($this->_tpl_vars['search']['page'] == 0): ?> disabled="true" <?php endif; ?>><i class="mdi mdi-chevron-left"></i></button>
                <button type="button" onclick="nextPage()" class="btn btn-default" <?php if ($this->_tpl_vars['search']['page']*20+20>$search.total_count): ?> disabled="true" <?php endif; ?>><i class="mdi mdi-chevron-right"></i></button>
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
                        <tr>
                          <th style="width:20%;">Name</th>
                          <th style="width:10%;">Type</th>
                          <th style="width:10%;">Modules</th>
                          <th style="width:20%;">Location</th>
                          <th style="width:10%;">Configurations</th>
                          <th style="width:15%;">Qualification</th>                          
                          <th style="width:15%;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user_info']):
?>
                        <tr onclick="viewUserProfile(<?php echo $this->_tpl_vars['user_info']['id']; ?>
)" style="cursor:pointer">
                          <td class="user-avatar">
                            <?php if (( $this->_tpl_vars['user_info']['activated'] == 1 )): ?>
                            <span class="circle-status small-button-circle status-completed"></span>
                            <?php endif; ?>
                            <?php if (( $this->_tpl_vars['user_info']['activated'] == 0 && $this->_tpl_vars['user_info']['days'] <= 2 )): ?>
                            <span class="circle-status small-button-circle status-new"></span>
                            <?php endif; ?>
                            <?php if (( $this->_tpl_vars['user_info']['activated'] == 0 && $this->_tpl_vars['user_info']['days'] > 2 )): ?>
                            <span class="circle-status small-button-circle status-pending"></span>
                            <?php endif; ?>
                            <img src="<?php echo $this->_tpl_vars['user_info']['avatar']; ?>
" alt="Avatar"><?php echo $this->_tpl_vars['user_info']['fullname']; ?>

                          </td>
                          <td>
                            <?php if (( $this->_tpl_vars['user_info']['account_type'] == 0 )): ?>
                              Basic
                            <?php else: ?>
                              Free
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php if (( $this->_tpl_vars['user_info']['bc_check'] == 1 )): ?>
                            <i class="icon mdi mdi-favorite" style="color:rgb(43, 176, 212);"></i>
                            <?php endif; ?>
                          </td>
                          <td><?php echo $this->_tpl_vars['user_info']['street']; ?>
</td>
                          <td style="text-align:center;"><?php echo $this->_tpl_vars['user_info']['points_count']; ?>
</td>
                          <td><?php echo $this->_tpl_vars['user_info']['qualification']; ?>
</td>
                          <td style="text-align:right;">
                            <div class="btn-group">
                              <button id="btn_remove_user" onclick="removeUser(event, '<?php echo $this->_tpl_vars['user_info']['id']; ?>
')" class="btn btn-default" style="width:70px;">remove</button>
                              <button id="btn_edit_user" onclick="editUser(event, '<?php echo $this->_tpl_vars['user_info']['id']; ?>
')" class="btn btn-default" style="width:53px;">edit</button>
                            </div>
                          </td>
                        </tr>
                        <?php endforeach; endif; unset($_from); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    <script src="/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="/assets/js/configurations.js" type="text/javascript"></script>
    <script src="/assets/js/main.js" type="text/javascript"></script>
    <script src="/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery.magnific-popup/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <script src="/assets/lib/masonry/masonry.pkgd.min.js" type="text/javascript"></script>
    <script src="/assets/js/app-mail-inbox.js" type="text/javascript"></script>
    <script src="/assets/js/user_manage.js" type="text/javascript"></script>

  </body>
</html>