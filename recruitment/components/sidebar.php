<style>
  .notification {
    color: black;
    text-decoration: none;
    position: relative;
    display: inline-block;
    border-radius: 2px;
  }

  .notification .badge {
    position: absolute;
    top: -10px;
    right: -10px;
    padding: 2px 5px;
    border-radius: 50%;
    background-color: #D80032 !important;
    color: white;
  }
</style>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="../assets/img/elements/pcn.png" alt="" style="background-color: #6c757d !important;" width="5%">
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
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">MRF SECTION</span>
    </li>
    <!-- Accept MRF-->
    <li class="menu-item">
      <a href="accept_mrf.php" class="menu-link ">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">MRF 
          <span class="notification badge">
            <?php 
              $get = "SELECT * FROM mrf WHERE is_deleted = '0' AND hr_personnel != 'YES'";
              $get_result = $link->query($get);
              while($get_row = $get_result->fetch_assoc()){
                if($notification = $get_result->num_rows){
                  echo '<span class="badge rounded-pill bg-danger">'.$notification.'</span>';
                }
                else{
                  echo "";
                }
              }
            ?>
          </span>
        </div>
      </a>
    </li>
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">EWB CONCERN</span>
    </li>
    <!-- For Requirements-->
    <li class="menu-item">
      <a href="for_requirements.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">For Requirements</div>
      </a>
    </li>
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">RECRUITMENT MENU</span>
    </li>
    <!-- Applicant -->
    <li class="menu-item">
      <a href="applicant.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Shortlisting</div>
      </a>
    </li>
    <!-- Deploy Applicant-->
    <li class="menu-item">
      <a href="deploy.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Deploy</div>
      </a>
    </li>
    <!-- Take Applicant Photo -->
    <li class="menu-item">
      <a href="take_photo.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Take Applicant Photo</div>
      </a>
    </li>
    <!-- Database Entry -->
    <li class="menu-item">
      <!-- <a href="database_entry.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Database Entry</div>
      </a> -->
      <form action="database_entry.php" method="POST" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <button type="submit" class="btn btn-default" name="database_entry" data-i18n="Analytics" style="color: #C2C7D0 !important; outline: none !important; padding: 0;">Database Entry</button>
      </form>
    </li>
    <!-- Applicant -->
    <li class="menu-item">
      <a href="employees.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Employee</div>
      </a>
    </li>
    <!-- Print an entry -->
    <li class="menu-item">
      <a href="print_entry.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Print an Entry</div>
      </a>
    </li>
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">SHORTLISTING MENU</span>
    </li>
    <!-- Create Shortlist Title -->
    <!-- <li class="menu-item">
      <a href="create_shortlist.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Create Shortlist Title</div>
      </a>
    </li> -->
    <!-- Add Applicant to Shortlist -->
    <!-- <li class="menu-item">
      <a href="add_shortlist.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Add to Shortlist</div>
      </a>
    </li> -->
    <!-- Remove Applicant to Shortlist -->
    <!-- <li class="menu-item">
      <a href="remove_shortlist.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Remove to Shortlist</div>
      </a>
    </li> -->




    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">REPORTS</span>
    </li>
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Layouts">Recruitment Reports</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="list_of_blacklisted.php" class="menu-link">
            <div data-i18n="Without navbar">List of Blacklisted</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="list_of_backout.php" class="menu-link">
            <div data-i18n="Container">List of Backout</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="list_of_canceled.php" class="menu-link">
            <div data-i18n="Container">List of Canceled</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="view_database.php" class="menu-link">
            <div data-i18n="Container">Applicant Database Report</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="mrf_report.php" class="menu-link">
            <div data-i18n="Container">MRF Report</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="employee_report.php" class="menu-link">
            <div data-i18n="Container">Employee Report</div>
          </a>
        </li>

      </ul>
    </li>
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Layouts">Shortlist Reports</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="shortlist_download.php" class="menu-link">
            <div data-i18n="Without navbar">Shortlist Download</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="summary_report.php" class="menu-link">
            <div data-i18n="Container">Summary Report</div>
          </a>
        </li>
      </ul>
    </li>


  </ul>
</aside>