<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
      <span class="app-brand-logo demo mb-3">
        <img src="../assets/img/icons/brands/pcnlogo1.png" alt="PCN logo" style="background-color: #6c757d !important;">
      </span>
      <!-- <span class="app-brand-text demo menu-text fw-bolder ms-2">PCN</span> -->
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item active">
      <a href="index.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>

    <!-- Layouts -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Layouts">Deployment</div>
      </a>

      <ul class="menu-sub">
        <!-- <li class="menu-item">
                  <a href="javascript:void(0);"class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Deployment</div>
                  </a>
                    <ul class="menu-sub">
                      <li class="menu-item">
                        <a href="index.php" class="menu-link">
                          <i class="menu-icon tf-icons bx bx-layout"></i>
                          <div data-i18n="Layouts">Deployments</div>
                        </a>
                      </li>
                    </ul>
                </li> -->


        <li class="menu-item">
          <a href="shortlist.php" class="menu-link">
            <div data-i18n="Without navbar">Shortlist</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="layouts-container.html" class="menu-link">
            <div data-i18n="Container">Container</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Deployment Action</span>
    </li>
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Account Settings">Print</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="pages-account-settings-account.html" class="menu-link">
            <div data-i18n="Account">Account</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="pages-account-settings-notifications.html" class="menu-link">
            <div data-i18n="Notifications">Notifications</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="pages-account-settings-connections.html" class="menu-link">
            <div data-i18n="Connections">Connections</div>
          </a>
        </li>
      </ul>
    </li>
    <li class="menu-item">
      <a href="tables-basic.html" class="menu-link">
      <i class="bi bi-printer" style="margin-right: .5rem !important"></i>
        <div data-i18n="Tables">Print an Entry</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="tables-basic.html" class="menu-link">
      <i class="bi bi-file-plus" style="margin-right: .5rem !important"></i>
        <div data-i18n="Tables">Create ID</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="tables-basic.html" class="menu-link">
        <i class="bi bi-person-lines-fill" style="margin-right: .5rem !important"></i> 
        <div data-i18n="Tables">LOA</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="tables-basic.html" class="menu-link">
        <i class="bi bi-envelope" style="margin-right: .5rem !important"></i>
        <div data-i18n="Tables">Excuse Letter</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="tables-basic.html" class="menu-link">
        <i class="bi bi-terminal-x" style="margin-right: .5rem !important"></i>
        <div data-i18n="Tables">Terminate</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="tables-basic.html" class="menu-link">
        <i class="bi bi-person-x" style="margin-right: .5rem !important"></i>
        <div data-i18n="Tables">Resign</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="tables-basic.html" class="menu-link">
        <i class="bi bi-person-dash" style="margin-right: .5rem !important"></i>
        <div data-i18n="Tables">Retrench</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="tables-basic.html" class="menu-link">
        <i class="bi bi-person-up" style="margin-right: .5rem !important"></i>
        <div data-i18n="Tables">Float</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="tables-basic.html" class="menu-link">
        <i class="bi bi-layer-forward" style="margin-right: .5rem !important"></i>
        <div data-i18n="Tables">Forward to EWB</div>
      </a>
    </li>


    <!-- Components -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Reports</span></li>
    <!-- LOA -->
    <li class="menu-item">
      <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-box"></i>
        <div data-i18n="User interface">Deployment Reports</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="loa.php" class="menu-link">
            <div data-i18n="Accordion">Presently Deployed</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="create_loa.php" class="menu-link">
            <div data-i18n="Accordion">Employee History</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="create_loa.php" class="menu-link">
            <div data-i18n="Accordion">Project History</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="create_loa.php" class="menu-link">
            <div data-i18n="Accordion">LOA Database</div>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</aside>