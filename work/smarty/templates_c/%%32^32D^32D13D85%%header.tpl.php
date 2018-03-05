<?php /* Smarty version 2.6.18, created on 
         compiled from common/header.tpl */ ?>
<nav class="navbar navbar-default navbar-fixed-top be-top-header">
  <div class="container-fluid">
    <div class="navbar-header"><a href="#" class="navbar-brand"></a></div>
    <div class="be-right-navbar">
      <ul class="nav navbar-nav navbar-right be-user-nav">
        <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="/assets/img/avatar.png" alt="Avatar"><span class="user-name"><?php echo $this->_tpl_vars['user_info']['fullname']; ?>
</span></a>
          <ul role="menu" class="dropdown-menu">
            <li>
              <div class="user-info">
                <div class="user-name"><?php echo $this->_tpl_vars['user_info']['fullname']; ?>
</div>
                <div class="user-position online">Available</div>
              </div>
            </li>
            <li><a href="#"><span class="icon mdi mdi-face"></span> Account</a></li>
            <li><a href="#"><span class="icon mdi mdi-settings"></span> Settings</a></li>                  
            <li><a href="#"><span class="icon mdi mdi-power"></span> Logout</a></li>                  
          </ul>
        </li>
      </ul>
      <div class="page-title"><span><?php echo $this->_tpl_vars['page_title']; ?>
</span></div>
      <ul class="nav navbar-nav navbar-right be-icons-nav">
<!--         <li class="dropdown"><a href="#" role="button" aria-expanded="false" class="be-toggle-right-sidebar"><span class="icon mdi mdi-settings"></span></a></li>
 -->        <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-notifications"></span><span class="indicator"></span></a>
          <ul class="dropdown-menu be-notifications">
            <li>
              <div class="title">Notifications<span class="badge">3</span></div>
              <div class="list">
                <div class="be-scroller">
                  <div class="content">
                    <ul>
                      <li class="notification notification-unread"><a href="#">
                          <div class="image"><img src="/assets/img/avatar2.png" alt="Avatar"></div>
                          <div class="notification-info">
                            <div class="text"><span class="user-name">Jessica Caruso</span> accepted your invitation to join the team.</div><span class="date">2 min ago</span>
                          </div></a></li>
                      <li class="notification"><a href="#">
                          <div class="image"><img src="/assets/img/avatar3.png" alt="Avatar"></div>
                          <div class="notification-info">
                            <div class="text"><span class="user-name">Joel King</span> is now following you</div><span class="date">2 days ago</span>
                          </div></a></li>
                      <li class="notification"><a href="#">
                          <div class="image"><img src="/assets/img/avatar4.png" alt="Avatar"></div>
                          <div class="notification-info">
                            <div class="text"><span class="user-name">John Doe</span> is watching your main repository</div><span class="date">2 days ago</span>
                          </div></a></li>
                      <li class="notification"><a href="#">
                          <div class="image"><img src="/assets/img/avatar5.png" alt="Avatar"></div>
                          <div class="notification-info"><span class="text"><span class="user-name">Emily Carter</span> is now following you</span><span class="date">5 days ago</span></div></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="footer"> <a href="#">View all notifications</a></div>
            </li>
          </ul>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
<div class="be-left-sidebar">
  <div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">Dashboard</a>
    <div class="left-sidebar-spacer">
      <div class="left-sidebar-scroll">
        <div class="left-sidebar-content">
          <ul class="sidebar-elements">
            <li class="divider">Menu</li>
            <li id="dashboard_menu" <?php if (( $this->_tpl_vars['selected_menu'] == 'dashboard_menu' )): ?> class="active" <?php endif; ?>><a><img class="left_menu_icon" src="/img/dashboard_menu_icon.svg"><span>Dashboard</span></a>
            </li>
            <li id="customers_menu" class="parent <?php if (( $this->_tpl_vars['open_menu'] == 'customers_menu' )): ?>active open<?php endif; ?>"><a><img class="left_menu_icon" src="/img/dashboard_customer_icon<?php if (( $this->_tpl_vars['open_menu'] == 'customers_menu' )): ?>_active<?php endif; ?>.svg"><span>Customers</span></a>
              <ul class="sub-menu">
                <li <?php if (( $this->_tpl_vars['selected_menu'] == 'configurations' )): ?> class="active" <?php endif; ?>>
                  <a>Configurations</a>
                </li>
                <li <?php if (( $this->_tpl_vars['selected_menu'] == 'by_customer' )): ?> class="active" <?php endif; ?>>
                  <a>by Customer</a>
                </li>
              </ul>
            </li>
            <li id="user_company_menu" class="parent <?php if (( $this->_tpl_vars['open_menu'] == 'user_company_menu' )): ?>active open<?php endif; ?>"><a><img class="left_menu_icon" src="/img/dashboard_user_icon<?php if (( $this->_tpl_vars['open_menu'] == 'user_company_menu' )): ?>_active<?php endif; ?>.svg"><span>User / Company</span></a>
              <ul class="sub-menu">
                <li <?php if (( $this->_tpl_vars['selected_menu'] == 'user_users' )): ?> class="active" <?php endif; ?>>
                  <a>Users</a>
                </li>
                <li <?php if (( $this->_tpl_vars['selected_menu'] == 'user_companies' )): ?> class="active" <?php endif; ?>><a>Companies</a>
                </li>
                <li <?php if (( $this->_tpl_vars['selected_menu'] == 'user_add' )): ?> class="active" <?php endif; ?>>
                  <a>Add</a>
                </li>
              </ul>
            </li>
            <li id="product_menu" class="parent <?php if (( $this->_tpl_vars['open_menu'] == 'product_menu' )): ?>active open<?php endif; ?>"><a><img class="left_menu_icon" src="/img/dashboard_product_icon<?php if (( $this->_tpl_vars['open_menu'] == 'product_menu' )): ?>_active<?php endif; ?>.svg"><span>Produkte</span></a>
              <ul class="sub-menu">
                <li <?php if (( $this->_tpl_vars['selected_menu'] == 'product_brandlist' )): ?> class="active" <?php endif; ?>>
                  <a>Produktpalette</a>
                </li>
              </ul>
            </li>
<!--             <li id="modules_menu" class="parent <?php if (( $this->_tpl_vars['open_menu'] == 'modules_menu' )): ?>active open<?php endif; ?>"><a><img class="left_menu_icon" src="/img/dashboard_modules_icon<?php if (( $this->_tpl_vars['open_menu'] == 'modules_menu' )): ?>_active<?php endif; ?>.svg"><span>Modules</span></a>
              <ul class="sub-menu">
                <li <?php if (( $this->_tpl_vars['selected_menu'] == 'beautyconfigurator' )): ?> class="active" <?php endif; ?>><a>Beauty Configurator</a>
                </li>
               </ul>
            </li>
 -->            
            <li id="notifications_menu"><a><img class="left_menu_icon" src="/img/dashboard_notification_icon.svg"><span>Notifications</span></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>