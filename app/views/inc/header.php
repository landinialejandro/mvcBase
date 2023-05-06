<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo SITE_NAME ?></title>

  <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/one/main.css">
  <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/style.css">
  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

</head>

<body>
  <div id="app">
    <nav id="navbar-main" class="navbar is-fixed-top">
      <div class="navbar-brand">
        <a class="navbar-item is-hidden-desktop jb-aside-mobile-toggle">
          <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>
        <div class="navbar-item has-control">
          <div class="control"><input placeholder="Search everywhere..." class="input"></div>
        </div>
      </div>
      <div class="navbar-brand is-right">
        <a class="navbar-item is-hidden-desktop jb-navbar-menu-toggle" data-target="navbar-menu">
          <span class="icon"><i class="mdi mdi-dots-vertical"></i></span>
        </a>
      </div>
      <div class="navbar-menu fadeIn animated faster" id="navbar-menu">
        <div class="navbar-end">
          <div class="navbar-item has-dropdown has-dropdown-with-icons has-divider is-hoverable">
            <a class="navbar-link is-arrowless">
              <span class="icon"><i class="mdi mdi-menu"></i></span>
              <span>Sample Menu</span>
              <span class="icon">
                <i class="mdi mdi-chevron-down"></i>
              </span>
            </a>
            <div class="navbar-dropdown">
              <a href="profile.html" class="navbar-item">
                <span class="icon"><i class="mdi mdi-account"></i></span>
                <span>My Profile</span>
              </a>
              <a class="navbar-item">
                <span class="icon"><i class="mdi mdi-settings"></i></span>
                <span>Settings</span>
              </a>
              <a class="navbar-item">
                <span class="icon"><i class="mdi mdi-email"></i></span>
                <span>Messages</span>
              </a>
              <hr class="navbar-divider">
              <a class="navbar-item">
                <span class="icon"><i class="mdi mdi-logout"></i></span>
                <span>Log Out</span>
              </a>
            </div>
          </div>
          <div class="navbar-item has-dropdown has-dropdown-with-icons has-divider has-user-avatar is-hoverable">
            <a class="navbar-link is-arrowless">
              <div class="is-user-avatar">
                <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe">
              </div>
              <div class="is-user-name"><span>John Doe</span></div>
              <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
            </a>
            <div class="navbar-dropdown">
              <a href="profile.html" class="navbar-item">
                <span class="icon"><i class="mdi mdi-account"></i></span>
                <span>My Profile</span>
              </a>
              <a class="navbar-item">
                <span class="icon"><i class="mdi mdi-settings"></i></span>
                <span>Settings</span>
              </a>
              <a class="navbar-item">
                <span class="icon"><i class="mdi mdi-email"></i></span>
                <span>Messages</span>
              </a>
              <hr class="navbar-divider">
              <a class="navbar-item">
                <span class="icon"><i class="mdi mdi-logout"></i></span>
                <span>Log Out</span>
              </a>
            </div>
          </div>
          <a href="https://justboil.me/bulma-admin-template/free-html-dashboard/" title="About" class="navbar-item has-divider is-desktop-icon-only">
            <span class="icon"><i class="mdi mdi-help-circle-outline"></i></span>
            <span>About</span>
          </a>
          <a title="Log out" class="navbar-item is-desktop-icon-only">
            <span class="icon"><i class="mdi mdi-logout"></i></span>
            <span>Log out</span>
          </a>
        </div>
      </div>
    </nav>
    <aside class="aside is-placed-left is-expanded">
      <div class="aside-tools">
        <div class="aside-tools-label">
          <span><b>Admin</b> One HTML</span>
        </div>
      </div>
      <div class="menu is-menu-main">
        <p class="menu-label">General</p>
        <ul class="menu-list">
          <li>
            <a href="index.html" class="is-active router-link-active has-icon">
              <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
              <span class="menu-item-label">Dashboard</span>
            </a>
          </li>
        </ul>
        <p class="menu-label">Examples</p>
        <ul class="menu-list">
          <li>
            <a href="tables.html" class="has-icon">
              <span class="icon has-update-mark"><i class="mdi mdi-table"></i></span>
              <span class="menu-item-label">Tables</span>
            </a>
          </li>
          <li>
            <a href="forms.html" class="has-icon">
              <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
              <span class="menu-item-label">Forms</span>
            </a>
          </li>
          <li>
            <a href="profile.html" class="has-icon">
              <span class="icon"><i class="mdi mdi-account-circle"></i></span>
              <span class="menu-item-label">Profile</span>
            </a>
          </li>
          <li>
            <a class="has-icon has-dropdown-icon">
              <span class="icon"><i class="mdi mdi-view-list"></i></span>
              <span class="menu-item-label">Submenus</span>
              <div class="dropdown-icon">
                <span class="icon"><i class="mdi mdi-plus"></i></span>
              </div>
            </a>
            <ul>
              <li>
                <a href="#void">
                  <span>Sub-item One</span>
                </a>
              </li>
              <li>
                <a href="#void">
                  <span>Sub-item Two</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <p class="menu-label">About</p>
        <ul class="menu-list">
          <li>
            <a href="https://github.com/vikdiesel/admin-one-bulma-dashboard" target="_blank" class="has-icon">
              <span class="icon"><i class="mdi mdi-github-circle"></i></span>
              <span class="menu-item-label">GitHub</span>
            </a>
          </li>
          <li>
            <a href="https://justboil.me/bulma-admin-template/free-html-dashboard/" class="has-icon">
              <span class="icon"><i class="mdi mdi-help-circle"></i></span>
              <span class="menu-item-label">About</span>
            </a>
          </li>
        </ul>
      </div>
    </aside>
    <section class="section is-title-bar">
      <div class="level">
        <div class="level-left">
          <div class="level-item">
            <ul>
              <li>Admin</li>
              <li>Dashboard</li>
            </ul>
          </div>
        </div>
        <div class="level-right">
          <div class="level-item">
            <div class="buttons is-right">
              <a href="https://github.com/vikdiesel/admin-one-bulma-dashboard" target="_blank" class="button is-primary">
                <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                <span>GitHub</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="hero is-hero-bar">
      <div class="hero-body">
        <div class="level">
          <div class="level-left">
            <div class="level-item">
              <h1 class="title">
                Dashboard
              </h1>
            </div>
          </div>
          <div class="level-right" style="display: none;">
            <div class="level-item"></div>
          </div>
        </div>
      </div>
    </section>
    <section class="section is-main-section">
      <div class="tile is-ancestor">
        <div class="tile is-parent">
          <div class="card tile is-child">
            <div class="card-content">
              <div class="level is-mobile">
                <div class="level-item">
                  <div class="is-widget-label">
                    <h3 class="subtitle is-spaced">
                      Clients
                    </h3>
                    <h1 class="title">
                      512
                    </h1>
                  </div>
                </div>
                <div class="level-item has-widget-icon">
                  <div class="is-widget-icon"><span class="icon has-text-primary is-large"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tile is-parent">
          <div class="card tile is-child">
            <div class="card-content">
              <div class="level is-mobile">
                <div class="level-item">
                  <div class="is-widget-label">
                    <h3 class="subtitle is-spaced">
                      Sales
                    </h3>
                    <h1 class="title">
                      $7,770
                    </h1>
                  </div>
                </div>
                <div class="level-item has-widget-icon">
                  <div class="is-widget-icon"><span class="icon has-text-info is-large"><i class="mdi mdi-cart-outline mdi-48px"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tile is-parent">
          <div class="card tile is-child">
            <div class="card-content">
              <div class="level is-mobile">
                <div class="level-item">
                  <div class="is-widget-label">
                    <h3 class="subtitle is-spaced">
                      Performance
                    </h3>
                    <h1 class="title">
                      256%
                    </h1>
                  </div>
                </div>
                <div class="level-item has-widget-icon">
                  <div class="is-widget-icon"><span class="icon has-text-success is-large"><i class="mdi mdi-finance mdi-48px"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>