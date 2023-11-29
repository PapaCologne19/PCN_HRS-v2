<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="../../assets/img/pcnlogo1.png" alt="" style="background-color: #6c757d !important;">
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

    <!-- Components -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Applicant Shortlist</span></li>
    <li class="menu-item">
      <a href="applicant_resume.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-table"></i>
        <div data-i18n="Tables">Resume</div>
      </a>
    </li>

    <!-- Components -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>
    <!-- LOA -->
    <li class="menu-item">
      <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-box"></i>
        <div data-i18n="User interface">LOA</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item">
          <a href="loa.php" class="menu-link">
            <div data-i18n="Accordion">LOA table</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="create_loa.php" class="menu-link">
            <div data-i18n="Accordion">Create LOA Template</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Administrator -->
    <li class="menu-item">
      <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-box"></i>
        <div data-i18n="User interface">Administrator</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item">
          <a href="javascript:void(0)" class="menu-link menu-toggle">
            <div data-i18n="Accordion">Recruitment Maintenance</div>
          </a>
          <ul class="menu-sub">
            <!-- For Category -->
            <li class="menu-item">
              <a href="category.php" class="menu-link">
                <div data-i18n="User interface">Category</div>
              </a>
            </li>

            <!-- For Channels -->
            <li class="menu-item">
              <a href="channel.php" class="menu-link">
                <div data-i18n="User interface">Channels</div>
              </a>
            </li>

            <!-- For Classifications -->
            <li class="menu-item">
              <a href="classification.php" class="menu-link">
                <div data-i18n="User interface">Classifications</div>
              </a>
            </li>

            <!-- For Client Companies -->
            <li class="menu-item">
              <a href="client_companies.php" class="menu-link">
                <div data-i18n="User interface">Client Companies</div>
              </a>
            </li>

            <!-- For Division -->
            <li class="menu-item">
              <a href="division.php" class="menu-link">
                <div data-i18n="User interface">Division</div>
              </a>
            </li>

            <!-- For Identification Marks -->
            <li class="menu-item">
              <a href="identification_mark.php" class="menu-link">
                <div data-i18n="User interface">Identification Marks</div>
              </a>
            </li>

            <!-- For Locator -->
            <li class="menu-item">
              <a href="locator.php" class="menu-link">
                <div data-i18n="User interface">Locator</div>
              </a>
            </li>

            <!-- For Projects -->
            <li class="menu-item">
              <a href="project.php" class="menu-link">
                <div data-i18n="User interface">Projects</div>
              </a>
            </li>

            <!-- For Sources -->
            <li class="menu-item">
              <a href="source.php" class="menu-link">
                <div data-i18n="User interface">Sources</div>
              </a>
            </li>

            <!-- For Type of Separation -->
            <li class="menu-item">
              <a href="type_of_separation.php" class="menu-link">
                <div data-i18n="User interface">Type of Separation</div>
              </a>
            </li>

            <!-- For LOA - LOA Word Format -->
            <li class="menu-item">
              <a href="create_loa.php" class="menu-link">
                <div data-i18n="User interface">LOA - LOA Word Format</div>
              </a>
            </li>

          </ul>
        </li>
      </ul>


    </li>

    <!-- History components -->
    <li class="menu-item">
      <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-copy"></i>
        <div data-i18n="History UI">History</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="employee_history.php" class="menu-link">
            <div data-i18n="Perfect Scrollbar">Employee History</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="loa_history.php" class="menu-link">
            <div data-i18n="Perfect Scrollbar">LOA History</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Forms & Tables -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li>
    <!-- Forms -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-detail"></i>
        <div data-i18n="Form Elements">Account Management</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="applicant_account_management.php" class="menu-link">
            <div data-i18n="Basic Inputs">Applicant</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="user_account_management.php" class="menu-link">
            <div data-i18n="Input groups">User</div>
          </a>
        </li>
      </ul>
    </li>
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-detail"></i>
        <div data-i18n="Form Layouts">Form Layouts</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="form-layouts-vertical.html" class="menu-link">
            <div data-i18n="Vertical Form">Vertical Form</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="form-layouts-horizontal.html" class="menu-link">
            <div data-i18n="Horizontal Form">Horizontal Form</div>
          </a>
        </li>
      </ul>
    </li>
    <!-- Tables -->
    <li class="menu-item">
      <a href="tables-basic.html" class="menu-link">
        <i class="menu-icon tf-icons bx bx-table"></i>
        <div data-i18n="Tables">Tables</div>
      </a>
    </li>
    <!-- Misc -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
    <li class="menu-item">
      <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank" class="menu-link">
        <i class="menu-icon tf-icons bx bx-support"></i>
        <div data-i18n="Support">Support</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="menu-link">
        <i class="menu-icon tf-icons bx bx-file"></i>
        <div data-i18n="Documentation">Documentation</div>
      </a>
    </li>
  </ul>
</aside>