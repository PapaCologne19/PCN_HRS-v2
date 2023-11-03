<?php
include("connect.php");
session_start();


date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y');
$datenow1 = date("Y-m-d");
$datenow = date("m/d/Y h:i:s A");


//check synchronizatioin of projects
$resultap = mysqli_query($link, "SELECT * FROM synch where id ='2'");
while ($rowap = mysqli_fetch_array($resultap)) {
  if ($rowap[2] != $datenow1) {
    $day1 = date("d") - 1;
    $month1 = date("m");
    $year1 = date("Y");
    $date_old = $year1 . "-" . $month1 . "-" . $day1;

    //change employee status to EWB
    $resultemp1 = mysqli_query($link, "SELECT * FROM projects WHERE end_date <= '$date_old'");
    while ($rowem1 = mysqli_fetch_array($resultemp1)) {


      $resultemp = mysqli_query($link, "UPDATE shortlist_details set activity='INACTIVE'  WHERE project = '$rowem1[1]'");
    }

    $query_sync = "UPDATE synch SET datenow1 = '$datenow1', katsing = 'Shortlist' WHERE id = '2'";
    $result_sync = mysqli_query($link, $query_sync);

    $_SESSION['successMessage'] = "Shortlist Database Synch Complete";
  } else {
    //echo "synch na do nothing";

  }
}



if (isset($_POST['to_index'])) {
  session_unset();

  // destroy the session 
  session_destroy();

  header("location:index.php");
}


if (isset($_POST['printapp'])) {
  $appnoto = $_POST['applicant_no'];

  $_SESSION["appnoto"] = $appnoto;

  header("location:printapp.php");
}


$resultap = mysqli_query($link, "SELECT * FROM track where id ='1'");
while ($rowap = mysqli_fetch_array($resultap)) {
  $appno = $rowap[1];
}
echo '
';

if (isset($_SESSION['username'], $_SESSION['password'])) {
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Include WebcamJS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <!-- SelectPicker Plugin -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"> -->

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Julius+Sans+One&family=Poppins&family=Quicksand&family=Roboto&family=Thasadith&display=swap" rel="stylesheet">

  <!-- Style CSS -->
  <link rel="stylesheet" type="text/css" href="deo1.css">
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- Datatables -->
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">

  <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <style type="text/css">
    * {
      font-family: 'Inter', sans-serif;
    }

    #results {
      padding: 10px;
      font-size: 18px;
    }

    .bs-example {
      margin: 20px;
    }

    img {
      border-radius: 8px;
    }

    .body50 {
      position: absolute;
      top: 0;
      left: 0%;
      border: 5px solid black;
      height: 100%;
      width: 50%;
    }

    .body5010p {
      position: absolute;
      top: 10%;
      left: 20%;
      border: 0px solid black;
      height: 90%;
      width: 60%;
    }

    .body5025p {
      position: absolute;
      top: 10%;
      left: 25%;
      border: 0px solid green;
      height: 90%;
      width: 50%;
    }


    .body60 {
      position: absolute;
      top: 0;
      left: 50%;
      border: 5px solid black;
      height: 100%;
      width: 50%;
    }

    .body6010p {
      position: absolute;
      top: 10%;
      left: 20%;
      border: 5px solid black;
      height: 90%;
      width: 60%;
    }


    .body50100 {
      position: absolute;
      top: 10%;
      left: 20%;
      border: 0px solid black;
      height: 10%;
      width: 70%;
    }


    .body5010p2 {
      position: absolute;
      top: 10%;
      left: 15%;
      border: 0px solid black;
      height: 10%;
      width: 80%;
    }

    th {
      text-align: center;
    }

    table {
      border: 1px solid black !important;
      font-size: 12px;
    }

    .table td,
    .table th {
      padding: 0 .3rem;
    }

    table tr td {
      padding-top: .1rem !important;
      padding-bottom: 0rem !important;

    }

    table thead tr th {
      background: whitesmoke !important;
    }

    .contain {
      display: grid;
      grid-template-columns: 0fr 0fr;
      grid-template-rows: 0fr 0fr;
      gap: 5px;
      margin: 0 auto;
    }

    .notification {
      color: black;
      text-decoration: none;
      position: relative;
      display: inline-block;
      border-radius: 2px;
    }

    .notification:hover {
      background: green;
    }

    .notification .badge {
      position: absolute;
      top: -10px;
      right: -10px;
      padding: 2px 5px;
      border-radius: 50%;
      background-color: #D80032;
      color: white;
    }
  </style>






  <title>HRS RECRUITMENT</title>
</head>

<body>

  <?php
  if (isset($_SESSION['successMessage'])) { ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: "<?php echo $_SESSION['successMessage']; ?>",
      })
    </script>
  <?php unset($_SESSION['successMessage']);
  } 
  ?>

  <?php
  if (isset($_SESSION['errorMessage'])) { ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: "<?php echo $_SESSION['errorMessage']; ?>",
      })
    </script>
  <?php unset($_SESSION['errorMessage']);
  } ?>
  <?php
  if (isset($_SESSION['warningMessage'])) { ?>
    <script>
      Swal.fire({
        icon: 'warning',
        title: "<?php echo $_SESSION['warningMessage']; ?>",
      })
    </script>
  <?php unset($_SESSION['warningMessage']);
  } ?>





  <div class="body5010p" id="my_camera"></div>

  <?php



    echo '
                                  <header class="cd-main-header js-cd-main-header">
                                                    <div class="cd-logo-wrapper">
                                                      <a href="#0" class="cd-logo"><img src="assets/img/pcnlogo1.png" alt="Logo"></a>
                                                    </div>
                                                    
                                                              <div class=" js-cd-search">
                                                                <form>
                                                                 <!-- <input class="reset" type="search" placeholder="Search...">-->
                                                                </form>
                                                              </div>
                                 
                                             <button class="reset cd-nav-trigger js-cd-nav-trigger" aria-label="Toggle menu"><span></span></button>
                                  
                                                        <ul class="cd-nav__list js-cd-nav__list">
                                                                              <!--<li class="cd-nav__item"><a href="#0">Tour</a></li>
                                                                              <li class="cd-nav__item"><a href="#0">Support</a></li>
                                                                              -->
                                                                              <li class="cd-nav__item cd-nav__item--has-children cd-nav__item--account js-cd-item--has-children">
                                                                                                <a href="">
                                                                                                  <img src="assets/img/cd-avatar.svg" alt="avatar">
                                                                                                  <span>Account</span>
                                                                                                </a>
                                                                                               <form action = "" method = "POST">
                                                                                <ul class="cd-nav__sub-list">
                                                                                 <!-- <li class="cd-nav__sub-item"><a href="#0">My Account</a></li>
                                                                                  <li class="cd-nav__sub-item"><a href="#0">Edit Account</a></li>-->
                                                                                  <li class="cd-nav__sub-item"><BUTTON class="button2" name = "to_index" style="font-size:14; width:98%;height:50px">Log out</button></li>
                                                                                   </ul>
                                                                                </form>
                                                                              </li>
                                                        </ul>
                                  </header> <!-- .cd-main-header -->
                                  
                                  <main class="cd-main-content">
                                    <nav class="cd-side-nav js-cd-side-nav">
                                            <ul class="cd-side__list js-cd-side__list">
                                              <!--<li class="cd-side__label"><span>Recruitment</span></li>-->
                                                      <li class="cd-side__item cd-side__item--has-children cd-side__item--overview js-cd-item--has-children">
                                                        <!--<a href="#0">Overview</a>-->
                                                        
                                                                <ul class="cd-side__sub-list">
                                                               <!--   <li class="cd-side__sub-item"><a href="#0">All Data</a></li>
                                                                  <li class="cd-side__sub-item"><a href="#0">Category 1</a></li>
                                                                  <li class="cd-side__sub-item"><a href="#0">Category 2</a></li>
                                                                -->
                                                                </ul>
                                                      </li>
                                                      <li class="cd-side__item cd-side__item--has-children cd-side__item--notifications cd-side__item--selected js-cd-item--has-children">
                                                            <!--          <a href="#0">Notifications<span class="cd-count">3</span></a>-->
                                                                      
                                                                      <ul class="cd-side__sub-list">
                                                                        <!--<li class="cd-side__sub-item"><a aria-current="page" href="">All Notifications</a></li>-->
                                                                        <!--<li class="cd-side__sub-item"><a href="">Recruitment Request</a></li>-->
                                                                        <!--<li class="cd-side__sub-item"><a href="">Shortlist Request</a></li>-->
                                                                      </ul>
                                                      </li>
                                          
                                                              <li class="cd-side__item cd-side__item--has-children cd-side__item--comments js-cd-item--has-children">
                                                                      <!--<a href="#0">Comments</a>-->
                                                                      
                                                                      <ul class="cd-side__sub-list">
                                                                     <!--   <li class="cd-side__sub-item"><a href="#0">All Comments</a></li>
                                                                        <li class="cd-side__sub-item"><a href="#0">Edit Comment</a></li>
                                                                        <li class="cd-side__sub-item"><a href="#0">Delete Comment</a></li>
                                                                      -->
                                                                      </ul>
                                                              </li>
                                            </ul>
                                    
                                      <ul class="cd-side__list js-cd-side__list">
                                              <li class="cd-side__label" style="font-size:26"><span>Recruitment Menu</span></li>
                                              <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children">
                                                      <a href="">REPORTS</a>
                                                      
                                                      <ul class="cd-side__sub-list">
                                                        <form action = "" method = "POST">
                                                        <li class="cd-side__btn"><a><BUTTON class="btn" name = "blacklistr" style="font-size:14; width:150px;height:50px">List of Blacklisted</button></a></li>     
                                                        <li class="cd-side__btn"><a><BUTTON class="btn" name = "canceledbtn" style="font-size:14; width:150px;height:50px">List of Canceled</button></a></li>     
                                                        <li class="cd-side__btn"><a><BUTTON class="btn" name = "viewdatabase" style="font-size:14; width:150px;height:50px">View Database</button></a></li>     
                                                        <!--<li class="cd-side__sub-item"><a><BUTTON class="btn" name = "additionalr">Additional Repots</button></a></li>-->
                                                        </form>
                                                      </ul>
                                              </li>
                                                      <li class="cd-side__item cd-side__item--has-children cd-side__item--images js-cd-item--has-children">
                                                        <!--<a href="#0">Images</a>-->
                                                        
                                                        <ul class="cd-side__sub-list">
                                                          <!--<li class="cd-side__sub-item"><a href="#0">All Images</a></li>
                                                          <li class="cd-side__sub-item"><a href="#0">Edit Image</a></li>
                                                        --> 
                                                        </ul>
                                                      </li>
                                                
                                                    <li class="cd-side__item cd-side__item--has-children cd-side__item--users js-cd-item--has-children">
                                                    <!--  <a href="#0">Users</a>-->
                                                      
                                                      <ul class="cd-side__sub-list">
                                                        <!--
                                                        <li class="cd-side__sub-item"><a href="#0">All Users</a></li>
                                                        <li class="cd-side__sub-item"><a><BUTTON class="btn" name = "next1">Edit User</button></a></li>
                                                        <li class="cd-side__sub-item"><a><BUTTON class="btn" name = "next">Add User</button></a></li>
                                                        -->
                                                      </ul>
                                                    </li>
                                          
                                      </ul>
                                              
                                                <ul class="cd-side__list js-cd-side__list">
                                            
                                                  <form action = "" method = "POST">
                                                  <!--<li class="cd-side__label"><span>Recruitment Action</span></li>-->
                                                  <li class="cd-side__btn"><a><BUTTON class="btn" name = "applicant"><i class="bi bi-camera" style="margin-right: 1rem"></i> Take Applicant Photo</button></li>
                                                  <li class="cd-side__btn"><a><BUTTON class="btn" name = "shortlistsss"><i class="bi bi-database" style="margin-right: 1rem"></i> Database Entry</button></a></li>
                                                  <li class="cd-side__btn"><a><BUTTON class="btn" name = "databaselist"><i class="bi bi-person-rolodex" style="margin-right: 1rem;"></i> Applicant</button></a></li>
                                                        
                                                  <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModalapp_print" ><i class="bi bi-printer" style="margin-right: 1rem;"></i> Print an Entry</button></li>
                                                      <ul class="cd-side__list js-cd-side__list">
                                                        <li class="cd-side__label" style="font-size:26"><span>SHORTLISTING MENU</span></li>
                                                        <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children">
                                                          <a href="">REPORTS</a>
                                                      
                                                          <ul class="cd-side__sub-list">
                                                          <form action = "" method = "POST">
                                                            <li class="cd-side__btn"><a><button type="button" class="btn" style="font-size:14; width:180px;height:50px" data-bs-toggle="modal" data-bs-target="#myModaladdshortview" >Shortlist Download</button></a></li>
                                                            <li class="cd-side__btn"><a><BUTTON class="btn" name = "summary" style="font-size:14; width:150px;height:50px">Summary</button></a></li>     
                                                          </form>
                                                        </ul>
                                                      </li>
                                              </ul>
                                                <form action = "" method = "POST">
                                                  <li class="cd-side__btn"><a><BUTTON type="button" class="btn" name = "shortlisttitle" data-bs-toggle="modal" data-bs-target="#shortlist_title"><i class="bi bi-folder-plus" style="margin-right: 1rem;"></i> Create Shortlist Title</button></a></li>        
                                                  <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModaladdshort" ><i class="bi bi-file-earmark-plus" style="margin-right: 1rem;"></i> Add to Shortlist</button></li>
                                                  <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModaldelshort" ><i class="bi bi-file-earmark-minus" style="margin-right: 1rem;"></i> Remove from shortlist</button></li>
                                                  <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModalewb" ><i class="bi bi-layer-forward" style="margin-right: 1rem;"></i> Deploy</button></li>
                                                  <li class="cd-side__btn"> <a><BUTTON class="btn" name = "for_requirements"><i class="bi bi-person-rolodex" style="margin-right: 1rem;"></i>  For Requirements</button></a></li>
                                                 
                                                  <li class="cd-side__btn"><button name="mrfbutton" class="btn" ><i class="bi bi-person" style="margin-right: 1rem;"></i> MRF </button></li>
                                                </form> 
                                              </ul>
                                           
                                  
                                    </nav>';
                              
  ?>
  
  <?php
  if (isset($_POST['summary'])) {
    echo '
<div class="containers">
<table id="example" class="table table-striped table-sm align-middle mb-0 bg-white p-3 bg-opacity-10 border border-secondary border-start-0 border-end-0 rounded-end" style="width:100%; font-size: 14px;">
            <thead>
            <tr>
            <th> Shortlist Name </th>
            <th> Manpower Count </th>
            
             </tr>   
            </thead>
            <tbody> 
';

    $resultdis1 = mysqli_query($link, "SELECT distinct shortlistnameto FROM shortlist_master");
    while ($rowdis1 = mysqli_fetch_array($resultdis1)) {


      $resultdis = mysqli_query($link, "SELECT shortlistnameto, count(*) FROM shortlist_master where shortlistnameto='$rowdis1[0]' group by shortlistnameto ");
      while ($rowdis = mysqli_fetch_array($resultdis)) {
        echo ' <tr> ';
        echo '  <td>  ' . $rowdis[0] . '   </td> ';
        echo '  <td>  ' . $rowdis[1] . '   </td> ';
      }
      echo ' </tr> ';
    }
    '
     </tbody>
        </table> 
        <br><br><br>  
</div>
';
  }



  if (isset($_POST['addapp1'])) {
    echo '
<div class = ""><div class = "how1">
<br><br>
      <center>
<h2><font color="white">Add Applicant to Shortlist</font> </h2>
<br><br>
<form action = "" method = "POST"><br>
 <div class="row mt-3" >
                                                            <div class="col-md-2">
                                                            </div><label class="form-label"> Project  Title : </labe
                                                            l>


                                                     
          <select class="" name="shortlisttitle"  data-placeholder="" style= "height:45px;width:60%" > ';
    echo '<option>Select shortlist Name:</option> ';


    $resultpro = mysqli_query($link, "SELECT * FROM shortlist_details WHERE activity ='ACTIVE' order by shortlistname ASC ");
    while ($rowpro = mysqli_fetch_array($resultpro)) {

      echo '<option  value="' . $rowpro[0] . '">' . $rowpro[1] . '(' . $rowpro[2] . ') </option> 
                                                   
                                                                       ';
    }
    echo '          
                                                           </select> </div>
   
<input type = "text" name = "shadowE" value = "' . $rowx[0] . '">
       
     <button type="button" name = "addtoshortlistbtn" id = "addtoshortlistbtn" class="buttton btn-default">
      <span class="glyphicon glyphicon-edit" ></span> ADD
   </button>
     
     
<table id="example" class="table" style="width:100%">
            <thead>
            <tr>
            <th> Applicant No </th>
            <th> Lastname </th>
            <th> Firstname </th>
            <th> Middlename </th>
            <th> SSS </th>
            <th> Pag-ibig </th>
            <th> Philhealth </th>
            <th> TIN </th>
            <th> Police </th>
            <th> Brgy </th>
            <th> NBI </th>
            <th> PSA </th>
            <th> Action </th>
             </tr>   
            </thead>
            <tbody> 
';

    $resultx = mysqli_query($link, "SELECT * FROM employees WHERE actionpoint <> 'BLACKLISTED' AND actionpoint <> 'REJECTED' AND actionpoint <> 'SHORTLISTED'");
    while ($rowx = mysqli_fetch_row($resultx)) {

      echo ' <tr> ';
      echo '  <td>  ' . $rowx[4] . '   </td> ';
      echo '  <td>  ' . $rowx[6] . '   </td> ';
      echo '  <td> ' . $rowx[7] . '   </td> ';
      echo '  <td> ' . $rowx[8] . '   </td> ';
      echo '  <td> ' . $rowx[24] . '   </td> ';
      echo '  <td> ' . $rowx[25] . '   </td> ';
      echo '  <td> ' . $rowx[26] . '   </td> ';
      echo '  <td> ' . $rowx[27] . '   </td> ';
      echo '  <td> ' . $rowx[28] . '   </td> ';
      echo '  <td> ' . $rowx[29] . '   </td> ';
      echo '  <td> ' . $rowx[30] . '   </td> ';
      echo '  <td> ' . $rowx[31] . '   </td> ';

      echo '<td> <form action = "" method = "POST">
<input type = "hidden" name = "shadowE" value = "' . $rowx[0] . '">
       
     <button type="submit" name = "addtoshortlistbtn" id = "addtoshortlistbtn1" class="btn btn-default">
      <span class="glyphicon glyphicon-edit" ></span> ADD
    </button>
  
    ';


      echo '</form></td>';




      echo ' </tr> ';
    }
    '
     </tbody>
        </table> 
  
</form>
';
    echo '</center>
                  <!--- laman -->
                        </div>     </div>
             
';
  }
  ?>



  <!-- For Creating Shortlist Title -->
  <div class="modal fade" id="shortlist_title" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create Shortlist title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form action="action.php" method="POST"><br>
              <div class="row">
                <label class="form-label"> Project Title </label>
                <select class="form-select" name="projecttitle" required>
                  <option selected disabled>Select Project:</option>
                  <?php
                  $querypro = "SELECT *, DATE_FORMAT(end_date, '%M %d %Y') AS date_end 
                    FROM projects 
                    WHERE end_date >= '$datenow1' 
                    ORDER BY project_title ASC ";
                  $resultpro = mysqli_query($link, $querypro);
                  while ($rowpro = mysqli_fetch_assoc($resultpro)) {
                    echo '<option value="' . $rowpro['id'] . '">' . $rowpro['project_title'] . '(' . $rowpro['client_company_id'] . ') - ' . $rowpro['date_end'] . ' </option>';
                  }
                  ?>
                </select>
              </div>
              <br>
              <div class="row mt-3">
                <label class="form-label">Shortlist Name :</label>
                <input type="text" name="newshortlist" value="" class="form-control" placeholder="New Shorlist Name" required>
              </div>
              <div class="modal-footer">
                <div class="mt-5">
                  <input type="submit" name="createshortlist" value="Create Shortlist" class="btn btn-info">
                  <input type="button" name="cancel" value="Cancel" class="btn btn-info" data-bs-dismiss="modal">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php


  if (isset($_POST['databaselist'])) {

  ?>

    <div class="containers" id="databaselist">
      <div class="cd-content-wrappers">
        <div class="text-component text-center">
          <h2 class="fs-2">Applicant Database</h2>
          <table id="example" class="table p-3 table-bordered align-middle mb-0 border border-dark border-start-0 border-end-0 rounded-end" style="border: 1px solid whitesmoke !important; width: 100%; font-size: 13px !important;">
            <thead>
              <tr>
                <th>ID</th>
                <th>Applicant No </th>
                <th>Applicant Name </th>
                <th>Email </th>
                <th>Contact No.</th>
                <th>Birthday </th>
                <th>Address </th>
                <th>Status </th>
                <th>Action </th>

              </tr>
            </thead>
            <tbody>
              <?php
              $resultx = mysqli_query($link, "SELECT * FROM employees WHERE actionpoint <> 'BLACKLISTED' AND actionpoint <> 'REJECTED' AND actionpoint <> 'SHORTLISTED' AND actionpoint <> 'CANCELED'");
              while ($rowx = mysqli_fetch_assoc($resultx)) {

                echo ' <tr> ';
                echo '  <td>  ' . $rowx['id'] . '   </td> ';
                echo '  <td>  ' . $rowx['appno'] . '   </td> ';
                echo '  <td>  ' . $rowx['lastnameko'] . ", " . $rowx['firstnameko'] . " " . $rowx['mnko'] . '   </td> ';
                echo '  <td> ' . $rowx['emailadd'] . '   </td> ';
                echo '  <td> ' . $rowx['cpnum'] . '   </td> ';
                echo '  <td> ' . $rowx['birthday'] . '   </td> ';
                echo '  <td> ' . $rowx['peraddress'] . '   </td> ';
                if ($rowx['actionpoint'] === "ACTIVE") { ?>
                  <td class="badge bg-success rounded-pill p-2 text-white"><?php echo $rowx['actionpoint']; ?></td>
                <?php } else { ?>
                  <td><?php echo $rowx['actionpoint']; ?></td>
              <?php }
                echo '<td> 
                      <form action = "" method = "POST" class="contain">
                        <div class="columns">
                          <input type = "hidden" name = "shadowE" value = "' . $rowx['id'] . '">
                            <button type="submit" name = "Editbtn" class="btn btn-default btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Applicant">
                              <i class="bi bi-pencil-square"></i>
                            </button>
                        </div>
                           
                        <div class="columns">
                          <input type = "hidden" name = "blackbtnID" class="blackbtnID" value = "' . $rowx['id'] . '">
                            <button type="button" name = "blackbtn" class="btn btn-default btn-sm blackbtn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Blacklist">
                              <i class="bi bi-person-fill-x"></i>
                          </button>
                        </div>
                            
                        <div class="columns">
                          <input type = "hidden" name = "deleteID" class="deleteID" value = "' . $rowx['id'] . '">
                            <button type="button" name = "deletebtn" class="btn btn-default btn-sm deletebtn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Applicant">
                              <i class="bi bi-trash"></i>
                          </button>
                        </div>
                          
                        <div class="columns">
                          <input type = "hidden" name = "downloadinfoID" class="downloadinfoID" value = "' . $rowx['id'] . '">
                            <a href="export_applicant.php?id=' . $rowx['id'] . '" name = "downloadinfobtn" class="btn btn-default btn-sm downloadinfobtn  mb-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Download Applicant Information">
                              <i class="bi bi-download"></i>
                            </a>
                          </div>
                            ';
                echo  '</form>
                          
                                    </td>';
                echo ' </tr> ';
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <?php
  }
  if (isset($_POST['for_requirements'])) {
  ?>

    <div class="containers" id="databaselist">
      <div class="cd-content-wrappers">
        <div class="text-component text-center">
          <h2 class="fs-2">For Requirements</h2>
          <table class="table p-3 table-bordered align-middle mb-0 border border-dark border-start-0 border-end-0 rounded-end" style="border: 1px solid whitesmoke !important; width: 100%; font-size: 13px !important;" id="example">
            <thead>
              <tr>
                <th>Applicant ID</th>
                <th>Name</th>
                <th>SSS</th>
                <th>Pag-IBIG</th>
                <th>Philhealth</th>
                <th>TIN</th>
                <th>Birthday</th>
                <th>Comment</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = "SELECT * FROM employees WHERE ewb_status = 'DECLINED'";
              $result = $link->query($query);
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <tr>
                  <td><?php echo $row['id'] ?></td>
                  <td><?php echo $row['lastnameko'] . ", " . $row['firstnameko'] . " " . $row['mnko'] ?></td>
                  <td><?php echo $row['sssnum'] ?></td>
                  <td><?php echo $row['pagibignum'] ?></td>
                  <td><?php echo $row['phnum'] ?></td>
                  <td><?php echo $row['tinnum'] ?></td>
                  <td><?php echo $row['birthday'] ?></td>
                  <td><?php echo $row['ewb_reason'] ?></td>
                  <td>
                    <input type="hidden" name="for_reverification_id" class="for_reverification_id" id="for_reverification_id" value="<?php echo $row['id'] ?>" class="form-control">
                    <button type="button" name="for_reverification_btn" class="btn btn-primary for_reverification_btn" id="for_reverification_btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="For verification"><i class="bi bi-send-check"></i></button>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  <?php
  }
  if (isset($_POST['Editbtn'])) {
    $idshadow = $_POST['shadowE'];
    $resulted = mysqli_query($link, "SELECT * FROM employees WHERE id = '$idshadow'");
    while ($rowed = mysqli_fetch_assoc($resulted)) {
      echo '   
                      <div class="container" style="padding-left: 20rem; padding-right: 20rem; padding-top: 5rem; ">
                        <div class="row ">
                  <!--- laman -->
    <form action = "action.php" method = "POST">
                      <center>
                          <img src="' . $rowed["photopath"] . '" alt="" class="img-circle" style="width:200px;height:200px;">
                          </center>
                          </div>
                                <div class="row mt-5">
                                  <div class="col-md-2">
                                    <label class="form-label">Sources :</font></label>
                                  </div>
                                  <div class="col-md-10">
                                    <select class="form-select" name="source" value= "' . $rowed["source"] . '" data-placeholder="Select Source";';
      echo '<option>' . $rowed["source"] . '</option>';
      $results = mysqli_query($link, "SELECT * FROM sources");
      while ($rows = mysqli_fetch_assoc($results)) {
        echo '<option value="' . $rows["description"] . '">' . $rows["description"] . '</option>';
      }
      echo '          
                                    </select>
                                  </div>                                 
                                </div>

                                  <div class="row mt-3" >
                                    <div class="col-md-2">
                                      <label class="form-label">Last Name</font></label>
                                    </div>  
                                    <div class="col-md-10">
                                      <input type="text" name = "lastnameko" value= "' . $rowed["lastnameko"] . '" class="form-control" >
                                    </div>
                                  </div>
                                                      
                                  <div class="row mt-3" >
                                    <div class="col-md-2">
                                      <label class="form-label">First Name:</font></label>
                                    </div>
                                    <div class="col-md-10">
                                      <input type="text" name = "firstnameko" value= "' . $rowed["firstnameko"] . '" class="form-control" >
                                    </div>
                                  </div>
                                  <div class="row mt-3" >
                                    <div class="col-md-2">
                                      <label class="form-label">Middle Name:</font></label>
                                    </div>
                                    <div class="col-md-10">
                                      <input type="text`" name = "mnko" value= "' . $rowed["mnko"] . '" class="form-control" >
                                    </div>
                                  </div>
                                                      
                                  <div class="row mt-3" >
                                    <div class="col-md-2">
                                      <label class="form-label">Extension Name:</font></label>
                                     </div>
                                     <div class="col-md-10">
                                      <input type="text" name = "extnname" value= "' . $rowed["extnname"] . '" maxlength="5" class="form-control"  placeholder="">
                                     </div>
                                  </div>
                                                      
                                  <div class="row mt-3" >
                                    <div class="col-md-2">
                                      <label class="form-label">Present Address:</font></label>
                                    </div>
                                    <div class="col-md-10">
                                      <input type="text" name = "paddress" value= "' . $rowed["paddress"] . '" class="form-control" >
                                    </div>
                                  </div>
                                                      
                                  <div class="row mt-3">
                                    <div class="col-md-2">
                                      <label class="form-label">Region :</font></label>
                                    </div>
                                    <div class="col-md-10">
                                      <select class="form-select cbo" name="regionn" id="regionn"  data-placeholder="Select User type" required> ;';
      echo '<option value="">Select Region:</option> ';
      $resultrg = mysqli_query($link, "SELECT * FROM region");
      while ($rowrg = mysqli_fetch_array($resultrg)) {
        echo '<option  value="' . $rowrg[3] . '">' . $rowrg[2] . '</option>';
      }
      echo '          
                                      </select>
                                    </div>      
                                  </div>
                                                      
                                  <div class="row mt-3" >
                                    <div class="col-md-2">
                                      <label class="form-label">City : </font></label>
                                    </div>  
                                    <div class="col-md-10">
                                      <select class="form-select" name="cityn" id="cityn"  data-placeholder="Select City"> ;</select>
                                    </div>                    
                                  </div>
                                                  
                                  <div class="row mt-3" >
                                    <div class="col-md-2">
                                      <label class="form-label">Permanent Address </font></label>
                                    </div>
                                    <div class="col-md-10">
                                      <input type="text" name = "peraddress" value= "' . $rowed["peraddress"] . '" class="form-control" >
                                    </div>
                                  </div>  
                                  
                                  <div class="row mt-3" >
                                    <div class="col-md-2">
                                      <label class="form-label">Date of Birth </font></label>
                                    </div>
                                    <div class="col-md-10">
                                      <input type="date" name = "birthday" id="birthdate" onchange="calculateAge()" value= "' . $rowed["birthday"] . '"  class="form-control" >
                                    </div>
                                  </div>
                                                      
                                  <div class="row mt-3" >
                                    <div class="col-md-2">
                                      <label class="form-label">Age </font></label>
                                    </div>
                                    <div class="col-md-10">
                                      <input type="text" name = "agen" id ="agen" value= "' . $rowed["age"] . '" class="form-control"  placeholder="" disabled>
                                    </div>
                                  </div>
                                          
                                  <div class="row mt-3" >
                                    <div class="col-md-2">
                                      <label class="form-label">Gender </font></label>
                                    </div>
                                    <div class="col-md-10">
                                      <select class="form-select cbo" name="gendern"  value= "' . $rowed["gendern"] . '" data-placeholder="Select Gendert "  > ;';
      echo '<option>' . $rowed[16] . '</option> ';
      $resultg = mysqli_query($link, "SELECT * FROM gender");
      while ($rowg = mysqli_fetch_array($resultg)) {
        echo '<option  value="' . $rowg[1] . '">' . $rowg[1] . ' </option> ';
      }
      echo '          
                                      </select>
                                    </div>         
                                  </div>
                                                          
                                  <div class="row mt-3" >
                                    <div class="col-md-2">
                                      <label class="form-label">Civil Status </font></label>
                                    </div>
                                    <div class="col-md-10">
                                      <select class="form-select cbo" name="civiln" value= "' . $rowed["civiln"] . '" data-placeholder=""  > ;';
      echo '<option>' . $rowed[17] . '</option> ';
      $resultt = mysqli_query($link, "SELECT * FROM tax_status");
      while ($rowtt = mysqli_fetch_array($resultt)) {
        echo '<option  value="' . $rowtt[2] . '">' . $rowtt[2] . ' </option> ';
      }
      echo '          
                                      </select>
                                    </div>           
                                  </div>
                                                      
                                  <div class="row mt-3" >
                                    <div class="col-md-2">
                                      <label class="form-label">Cell Phone Number </font></label>
                                    </div>
                                    <div class="col-md-10">
                                      <input type="text" name = "cpnum"  value= "' . $rowed["cpnum"] . '" class="form-control"  placeholder="">
                                    </div>
                                  </div>  
                                                      
                                  <div class="row mt-3" >
                                    <div class="col-md-2">
                                      <label class="form-label">landline </font></label>
                                    </div>
                                    <div class="col-md-10">
                                      <input type="text" name = "landline" value= "' . $rowed["landline"] . '" class="form-control"  placeholder="">
                                    </div>
                                  </div>  
                                    
                                  <div class="row mt-3" >
                                    <div class="col-md-2">
                                      <label class="form-label">Email Address </font></label>
                                    </div>
                                    <div class="col-md-10">
                                      <input type="text" name = "emailadd" value= "' . $rowed["emailadd"] . '" class="form-control"  placeholder="">
                                    </div>
                                  </div>  
                                                      
                                  <div class="row mt-3" >
                                    <div class="col-md-2">
                                      <label class="form-label">Desired Position </font></label>
                                    </div>
                                                            
                                    <div class="col-md-10">
                                      <select class="form-select cbo" name="despo"  value= "' . $rowed["despo"] . '" data-placeholder=""  > ;';
      echo '<option>' . $rowed[21] . '</option> ';
      $resultjt = mysqli_query($link, "SELECT * FROM job_title ");
      while ($rowjt = mysqli_fetch_array($resultjt)) {
        echo '<option  value="' . $rowjt[2] . '">' . $rowjt[2] . ' </option> ';
      }
      echo '          
                                      </select>
                                     </div>                   
                                  </div>
                                 
                                <div class="row mt-3">
                                  <div class="col-md-2">
                                    <label class="form-label">Classification of Applicant </font></label>
                                  </div>
                                                            
                                   <div class="col-md-10">
                                   <select class="form-select cbo" name="classn"  value= "' . $rowed["classn"] . '" data-placeholder=""  > ;';
      echo '<option>' . $rowed[22] . '</option> ';
      $resultca = mysqli_query($link, "SELECT * FROM classifications");
      while ($rowca = mysqli_fetch_array($resultca)) {
        echo '<option  value="' . $rowca[1] . '">' . $rowca[1] . ' </option> ';
      }
      echo '          
                                    </select> 
                                   </div>
                                </div>
                                                      
                                <div class="row mt-3" >
                                  <div class="col-md-2">
                                    <label class="form-label">Identification Marks </font></label>
                                  </div>
                                                            
                                  <div class="col-md-10">
                                  <select class="form-select cbo" name="idenn"  value= "' . $rowed["idenn"] . '" data-placeholder="" > ;';
      echo '<option>' . $rowed[23] . '</option> ';
      $resultide = mysqli_query($link, "SELECT * FROM distinguishing_qualification_marks");
      while ($rowider = mysqli_fetch_array($resultide)) {
        echo '<option  value="' . $rowider[1] . '">' . $rowider[1] . ' </option> ';
      }
      echo  '          
                                   </select>
                                  </div> 
                                </div>
                  
                                <div class="row mt-3" >
                                  <div class="col-md-2">
                                    <label class="form-label">SSS:</font></label>
                                  </div>
                                  
                                  <div class="col-md-10">
                                    <input type="text" name = "sssnum" value= "' . $rowed["sssnum"] . '" class="form-control" >
                                  </div>
                                </div>
                                     
                                <div class="row mt-3" >
                                  <div class="col-md-2">
                                    <label class="form-label">PAG-IBIG:</font></label>
                                  </div>
                                     
                                  <div class="col-md-10">
                                    <input type="text" name = "pagibignum" value= "' . $rowed["pagibignum"] . '" class="form-control" >
                                  </div>
                                </div>
                                     
                                <div class="row mt-3" >
                                  <div class="col-md-2">
                                    <label class="form-label">PHILHEALTH:</font></label>
                                  </div>
                                    
                                  <div class="col-md-10">
                                    <input type="text" name = "phnum" value= "' . $rowed["phnum"] . '" class="form-control" >
                                  </div>
                                </div>
                                     
                                <div class="row mt-3" >
                                  <div class="col-md-2">
                                    <label class="form-label">TIN:</font></label>
                                  </div>
                                     
                                  <div class="col-md-10">
                                    <input type="text" name = "tinnum" value= "' . $rowed["tinnum"] . '" class="form-control" >
                                  </div>
                                </div>
                                     
                                <div class="row mt-3" >
                                  <div class="col-md-2">
                                    <label class="form-label">POLICE:</font></label>
                                  </div>
                                     
                                  <div class="col-md-10">
                                    <input type="date" name = "policed" value= "' . $rowed["policed"] . '" class="form-control" >
                                  </div>       
                                </div>
                                     
                                <div class="row mt-3" >
                                  <div class="col-md-2">
                                    <label class="form-label">BRGY:</font></label>
                                  </div>
                                     
                                  <div class="col-md-10">
                                    <input type="date" name = "brgyd" value= "' . $rowed["brgyd"] . '" class="form-control" >
                                  </div>
                                </div>
                                     
                                <div class="row mt-3" >
                                  <div class="col-md-2">
                                    <label class="form-label">NBI:</font></label>
                                  </div>
                                     
                                  <div class="col-md-10">
                                    <input type="date" name = "nbid" value= "' . $rowed["nbid"] . '" class="form-control" >
                                  </div>
                                </div>
                                     
                                <div class="row mt-3" >
                                  <div class="col-md-2">
                                    <label class="form-label">PSA:</font></label>
                                  </div>
                                     
                                  <div class="col-md-10">
                                    <select class="form-select cbo" name="psa" value= "' . $rowed["psa"] . '"  data-placeholder=""> ;      
                                      <option>' . $rowed["psa"] . '</option> 
                                      <option value="With">With</option>
                                      <option value="Without">Without</option>
                                    </select> 
                                  </div>
                                </div>
                                     
                                <div class="row mt-3" >
                                  <div class="col-md-2">
                                    <label class="form-label">Emergency Contact Person:</font></label>
                                  </div>
                                     
                                  <div class="col-md-10">
                                    <input type="text" name = "e_person" value= "' . $rowed["e_person"] . '" class="form-control" >
                                  </div>     
                                </div>
                                     
                                <div class="row mt-3" >
                                  <div class="col-md-2">
                                    <label class="form-label">Emergency Contact Address:</font></label>
                                  </div>
                                     
                                  <div class="col-md-10">
                                    <input type="text" name = "e_address" value= "' . $rowed["e_address"] . '" class="form-control" >
                                  </div>   
                                </div>
                                     
                                <div class="row mt-3" >
                                  <div class="col-md-2">
                                    <label class="form-label">Emergency Contact Number:</font></label>
                                  </div>
                                     
                                  <div class="col-md-10">
                                    <input type="text" name="e_contact" value= "' . $rowed["e_contact"] . '" class="form-control" >
                                  </div>
                                </div>
                                                      
                                <div class="row mt-3 mb-5">
                                  <div class="col-md-2">
                                    <label class="form-label">REMARKS:</font></label>
                                  </div>
                                
                                  <div class="col-md-10">
                                    <input type="text" name = "remarks" value= "' . $rowed["remarks"] . '" class="form-control" >
                                  </div>
                                </div>
       
                                <input type="hidden" name = "shadowEdit" value= "' . $rowed["id"] . '" class="form-control" >
                                <button <input type = "submit" name = "updateit" value = "" class="btn btn-info btn-lg mb-5" style="vertical-align:middle">Update It</button>
                                <a href = "recruitment.php" name = "Cancel" value = "" class="btn btn-info btn-lg mb-5" style="vertical-align:middle">Cancel</a>
                                
                 </form>
                                      
                        </div>
                      </div> <!-- .content-wrapper -->';
    }
  }




  if (isset($_POST['applicant'])) {




    echo '   
    
                      <div class="cd-content-wrapper">
                        <div class="text-component text-center">
                    
                  <!--- laman -->
        
                        <br><br><br><br><br><br><br>
       <button class="btn btn-success btnsall" onclick="myFunctioncam()">Display Camera</button><br><br>
              <form method="POST" action="storeImage.php">   
       
                                     <input type="button" class="btn btn-success btnsall" value="Take Photo" onClick="take_snapshot()" >
                                  <input type="submit" class="btn btn-success btnsall" Value ="Submit">
    <hr>
                    
                   <h2 class="a"><div class="container">
                      
                               <label class="fs-2"><font color="Black"></font>Image Capture</label> <br>
                    
                      
                                  <input type="hidden" name="image" class="image-tag">
                           
                                  <div id="results">Your captured image will appear here...</div>
                        
                     
                          </form>
              
                  </h2>
                  <!--- laman -->
                        </div>
                      </div> <!-- .content-wrapper -->
  ';
  }

  if (isset($_POST['shortlistsss'])) {
    if (!isset($_SESSION["photoko"]) || (trim($_SESSION["photoko"]) == '')) {
      $_SESSION['warningMessage'] = "Take Photo First";
    } else {
      $resulttracking = mysqli_query($link, "SELECT * FROM track WHERE id = '1'");
      while ($rowtr = mysqli_fetch_array($resulttracking))
        $newtracking = $rowtr[1] + 1;
      mysqli_query($link, "UPDATE track SET appno = '$newtracking' WHERE id = '1'");




      $datenow = date("m/d/Y h:i:s A");
      echo '
         <div class="container containers">
  
      <form action="action.php" method="POST">
          
                    <div class="">
                      <center>
                          <img src="' . $_SESSION["photoko"] . '" alt="" style="width:200px;height:200px;">
                      </center>
                    </div>
          
                    <div class="row mt-5">
                      <div class="col-md-2">
                        <label class="form-label">Date Applied</label>
                      </div>   
                      <div class="col-md-10">
                        <input type="text" name = "dapplied" class="form-control"  value= "' . $datenow . '"  readonly>
                      </div>                               
                    </div>
                      
                    <div class="row mt-3">
                      <div class="col-md-2">
                        <label class="form-label">Applicant Number</font></label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" name = "appnoko"  value= "' . $newtracking . '" class="form-control" readonly>
                      </div> 
                    </div>
                                                             
                    <div class="row mt-3">
                      <div class="col-md-2">
                        <label class="form-label">Source</font></label>
                      </div>                              
                      <div class="col-md-10">
                        <select class="form-select cbo" name="source"  data-placeholder="Select Source" > ;';
      echo '<option>Select Source</option>';
      $results = mysqli_query($link, "SELECT * FROM sources");
      while ($rows = mysqli_fetch_array($results)) {
        echo '<option value="' . $rows[1] . '">' . $rows[1] . '</option>';
      }
      echo '  
                        </select>        
                      </div>                               
                    </div>

                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">Last Name</font></label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" name = "lastnameko" class="form-control"  placeholder="" >
                      </div>
                    </div>                                 
                                                      
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">First Name</font></label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" name = "firstnameko" class="form-control"  placeholder="" >
                      </div>                               
                    </div>                               
                                                      
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">Middle Name</font></label>
                      </div>
                      <div class="col-md-10">
                        <input type="text`" name = "mnko"  class="form-control"  placeholder="" >
                      </div>
                    </div>       

                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">Extension Name</font></label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" name = "extnname" maxlength="5" class="form-control"  placeholder="">
                      </div>
                    </div>                                
                                                      
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">Present Address</font></label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" name = "paddress"  class="form-control"  placeholder="" >
                      </div>
                    </div>                                       
                                                        
                    <div class="row mt-3">
                      <div class="col-md-2">
                        <label class="form-label">Region</font></label>
                      </div>
                                                      
                                                      
                      <div class="col-md-10">
                        <select class="form-select cbo" name="regionn" id="regionn"  data-placeholder="Select User type"  > ;';
      echo '<option value="" selected disabled>Select Region</option> ';
      $resultrg = mysqli_query($link, "SELECT * FROM region");
      while ($rowrg = mysqli_fetch_array($resultrg)) {
        echo '<option  value="' . $rowrg[3] . '">' . $rowrg[2] . '</option>';
      }
      echo '          
                        </select> 
                      </div>                             
                    </div>                                  
                                                          
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">City </font></label>
                      </div>  
                    
                    
                      <div class="col-md-10">
                        <select class="form-select" name="cityn" id="cityn"  data-placeholder="Select City"  > ;</select>
                      </div>
                    </div>                                 
                                                                                               
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">Permanent Address </font></label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" name = "peraddress"  class="form-control"  placeholder="" >
                      </div>
                    </div>                                      
                                                      
                    <div class="row mt-3">
                    <div class="col-md-2">
                      <label class="form-label">Date of Birth</label>
                    </div>
                    <div class="col-md-10">
                      <input type="date" name="birthday" id="birthdate" onchange="calculateAge()" class="form-control" placeholder="">
                    </div>
                  </div>
                  
                  <div class="row mt-3">
                    <div class="col-md-2">
                      <label class="form-label">Age</label>
                    </div>
                    <div class="col-md-10">
                      <input type="text" name="age" id="age" class="form-control" placeholder="" disabled>
                    </div>
                  </div>                                               
                    
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">Gender </font></label>
                      </div>
                      <div class="col-md-10">
                        <select class="form-select cbo" name="gendern"  data-placeholder="Select Gendert " > ;';
      echo '<option>Select Gender</option> ';
      $resultg = mysqli_query($link, "SELECT * FROM gender");
      while ($rowg = mysqli_fetch_array($resultg)) {
        echo '<option  value="' . $rowg[1] . '">' . $rowg[1] . ' </option> ';
      }
      echo '          
                        </select>
                      </div>
                    </div>                                                     
                                                          
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">Civil Statuss </font></label>
                      </div>
                      <div class="col-md-10">
                        <select class="form-select cbo" name="civiln" onchange="myFunction_focusout()"  data-placeholder="" > ;';
      echo '<option>Select Civil Status:</option> ';
      $resultt = mysqli_query($link, "SELECT * FROM tax_status");
      while ($rowtt = mysqli_fetch_array($resultt)) {
        echo '<option  value="' . $rowtt[2] . '">' . $rowtt[2] . ' </option> ';
      }
      echo '          
                        </select>
                      </div>
                    </div>   
                    
                                                      
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">Cell Phone Number </font></label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" name = "cpnum"  class="form-control"  placeholder="">
                      </div>
                    </div>                                              
                                                      
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">landline </font></label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" name = "landline"  class="form-control"  placeholder="">
                      </div>
                    </div> 
              
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">Email Address </font>
                      </div></label>
                      <div class="col-md-10">
                        <input type="text" name = "emailadd"  class="form-control"  placeholder="">
                      </div>
                    </div>                                                     
                                                      
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">Desired Position </font></label>
                      </div>
                      <div class="col-md-10">
                        <select class="form-select cbo" name="despo"   data-placeholder="" > ;';
      echo '<option>Select job title:</option> ';
      $resultjt = mysqli_query($link, "SELECT * FROM job_title ");
      while ($rowjt = mysqli_fetch_array($resultjt)) {
        echo '<option  value="' . $rowjt[2] . '">' . $rowjt[2] . ' </option> ';
      }
      echo '          
                        </select>
                      </div>      
                    </div>

                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">Classification of Applicant </font></label>
                      </div>
                      
                      <div class="col-md-10">
                        <select class="form-select cbo" name="classn"   data-placeholder="" > ;';
      echo '<option>Select Classification:</option> ';
      $resultc = mysqli_query($link, "SELECT * FROM classifications");
      while ($rowc = mysqli_fetch_array($resultc)) {
        echo '<option  value="' . $rowc[1] . '">' . $rowc[1] . ' </option> ';
      }
      echo '          
                        </select> 
                      </div>
                    </div>

                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">Identification Marks </font></label>
                      </div>
                      <div class="col-md-10">
                        <select class="form-select cbo" name="idenn"   data-placeholder=""> ;';
      echo '<option>Select Identification Marks:</option> ';
      $resultide = mysqli_query($link, "SELECT * FROM distinguishing_qualification_marks");
      while ($rowider = mysqli_fetch_array($resultide)) {
        echo '<option  value="' . $rowider[1] . '">' . $rowider[1] . ' </option> ';
      }
      echo  '          
                        </select> 
                      </div>
                    </div>                                                   
                                                      
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">SSS</font></label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" name = "sssnum" class="form-control"  placeholder="" >
                      </div>
                    </div>
                                     
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">Pag-IBIG</font></label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" name = "pagibignum" class="form-control"  placeholder="" >
                      </div>
                    </div>                       
                                     
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">PhilHealth</font></label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" name = "phnum" class="form-control"  placeholder="" >
                      </div>
                    </div>                
                                     
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">TIN</font></label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" name = "tinnum" class="form-control"  placeholder="" >
                      </div>
                    </div>               
                                     
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">POLICE</font></label>
                      </div>
                      <div class="col-md-10">
                        <input type="date" name = "policed" class="form-control"  placeholder="" >
                      </div>
                    </div>                   
                                     
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">BRGY</font></label>
                      </div>
                      <div class="col-md-10">
                        <input type="date" name = "brgyd" class="form-control"  placeholder="" >
                      </div>
                    </div>                     
                                     
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">NBI</font></label>
                      </div>
                      <div class="col-md-10">
                        <input type="date" name = "nbid" class="form-control"  placeholder="" >
                      </div>
                    </div>                  
                                     
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">PSA</font></label>
                      </div>
                      <div class="col-md-10">
                        <select class="form-select cbo" name="psa"   data-placeholder=""> ;';
      echo '<option>Select One:</option> 
                                 <option value="With">With</option>
                                 <option value="Without">Without</option>
                        </select> 
                      </div>    
                    </div>                          
                                                      
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">Emergency Contact Person</font></label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" name = "e_person" value= "" class="form-control"  placeholder="" >
                      </div>
                    </div>
                                     
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">Emergency Contact Address</font></label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" name = "e_address" value= "" class="form-control"  placeholder="" >
                      </div>
                    </div>                     
                  
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">Emergency Contact Number</font></label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" name = "e_contact" value= "" class="form-control"  placeholder="" >
                      </div> 
                    </div>
                                     
                    <div class="row mt-3" >
                      <div class="col-md-2">
                        <label class="form-label">REMARKS</font></label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" name = "remarks" class="form-control"  placeholder="" >
                      </div>
                    </div>                 
                                    
       
    
                     <center>
                      <div class="col-md-6 mt-5 mb-5">
                        <input type = "submit" name = "next" value = "Save" class="btn btn-info">
                      </div>
                     </center>
                 </form>
                                      
         
                </div> <!-- .content-wrapper -->
              ';
    }
  }



  if (isset($_POST['viewdatabase'])) {
    echo '
                <div class="cd-content-wrapper">
                  <div class="text-component text-center">
<div class = "container" style="width:100%">
            <!--- laman -->
  
   <form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success btnsall" value="Export All" style="float:right;" />
    </form>
<br><br><br>
                    <h2 class="fs-2">Recruitment Database</h2>
         
          <table id="example" class="table table-sm table-striped align-middle mb-3 bg-white p-3 bg-opacity-10 border border-secondary border-start-0 border-end-0 rounded-end" style="width:100%; font-size: 13px !important;">
            <thead>
              <tr>
                <th> ID </th>
                <th> Applicant No. </th>
                <th> Applicant Name </th>
                <th> Email </th>
                <th> Contact No. </th>
                <th> Birthday </th>
                <th> Action </th>
              </tr>   
            </thead>
            <tbody> ';
    $resultx = mysqli_query($link, "SELECT * FROM employees ");
    while ($rowx = mysqli_fetch_assoc($resultx)) {
      $police = $rowx['policed'];
      $barangay = $rowx['brgyd'];
      $nbi = $rowx['nbid'];
      $birthday = $rowx['birthday'];
      $timestamp_police = strtotime($police);
      $timestamp_barangay = strtotime($barangay);
      $timestamp_nbi = strtotime($nbi);
      $timestamp_birthday = strtotime($birthday);
      $formattedDate_police = date("F d, Y", $timestamp_police);
      $formattedDate_barangay = date("F d, Y", $timestamp_barangay);
      $formattedDate_nbi = date("F d, Y", $timestamp_nbi);
      $formattedDate_birthday = date("F d, Y", $timestamp_birthday);
      echo ' <tr> ';
      echo '  <td>  ' . $rowx['id'] . '   </td> ';
      echo '  <td>  ' . $rowx['appno'] . '   </td> ';
      echo '  <td>  ' . $rowx['lastnameko'] . ", " . $rowx['firstnameko'] . " " . $rowx['mnko'] . '   </td> ';
      echo '  <td> ' . $rowx['emailadd'] . '   </td> ';
      echo '  <td> ' . $rowx['cpnum'] . '   </td> ';
      echo '  <td> ' . $formattedDate_birthday . '   </td> ';
      echo '  <td> <button type="button" class="btn btn-secondary data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Print MRF"><i class="bi bi-pencil-square"></i></button></td> ';
      echo ' </tr> ';
    }
    echo '
     </tbody>
        </table> 
  
   
                  </div>
            <!--- laman -->
                  </div>
                </div> <!-- .content-wrapper -->
  
  ';
  }


  ?>

  <!-- Edit Recruitment Database -->
  <div class="modal fade" id="edit_database" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>







  <?php
  if (isset($_POST['blacklistr'])) {
    echo '
                <div class="cd-content-wrapper">
                  <div class="text-component text-center">
<div class = "container">
            <!--- laman -->
             <form action = "" method = "POST" style="align=left">
             <button type="submit" class="btn btn-default btnsall" Name ="Back" style="float:right;"><span>Close Report</span></button>
             <br><br><br>
</form>
                    <h2 class="fs-2">List of Blacklisted</h2>
         
<table id="example" class="table table-sm align-middle mb-0 bg-white p-3 bg-opacity-10 border border-secondary border-start-0 border-end-0 rounded-end" style="width:100%; font-size: 13px !important;">
            <thead>
            <tr>
            <th> ID</th>
            <th> Applicant No </th>
            <th> Lastname </th>
            <th> Firstname </th>
            <th> Middlename </th>
            <th> Birthday </th>
            <th> Reason </th>
            <th> Action </th>
             </tr>   
            </thead>
            <tbody> 
';
    $resultx = mysqli_query($link, "SELECT * FROM employees where actionpoint = 'BLACKLISTED'");
    while ($rowx = mysqli_fetch_assoc($resultx)) {
      $inputDate = $rowx['birthday'];
      $timestamp = strtotime($inputDate);
      $formattedDate = date("F d, Y", $timestamp);

      echo ' <tr> ';
      echo '  <td>  ' . $rowx['id'] . '   </td> ';
      echo '  <td>  ' . $rowx['appno'] . '   </td> ';
      echo '  <td>  ' . $rowx['lastnameko'] . '   </td> ';
      echo '  <td> ' . $rowx['firstnameko'] . '   </td> ';
      echo '  <td> ' . $rowx['mnko'] . '   </td> ';
      echo '  <td> ' . $formattedDate . '   </td> ';
      echo '  <td> ' . $rowx['reasonofaction'] . '   </td> ';

      echo '<td> <form action = "" method = "POST">
        <input type = "hidden" name = "undoblacklistID" class="undoblacklistID" id="undoblacklistID" value = "' . $rowx['id'] . '">
        <button type="submit" name = "undoblacklistbtn" class="btn btn-default undoblacklistbtn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Undo Blacklist">
       <i class="bi bi-arrow-counterclockwise"></i></button>
  
    ';


      echo '</form></td>';




      echo ' </tr> ';
    }
    echo '
     </tbody>
        </table> 
  
     
                  </div>
            <!--- laman -->
                  </div>
                </div> <!-- .content-wrapper -->
  
  ';
  }

  if (isset($_POST['canceledbtn'])) {
    echo '
                <div class="cd-content-wrapper">
                  <div class="text-component text-center">
<div class = "container">
            <!--- laman -->
             <form action = "" method = "POST" style="align=left">
             <button type="submit" class="btn btn-default btnsall" Name ="Back" style="float:right;"><span>Close Report</span></button>
             <br><br><br>
</form>
                    <h2 class="fs-2">List of Canceled</h2>
         
<table id="example" class="table table-sm align-middle mb-0 bg-white p-3 bg-opacity-10 border border-secondary border-start-0 border-end-0 rounded-end" style="width:100%; font-size: 13px !important;">
            <thead>
            <tr>
            <th> ID</th>
            <th> Applicant No </th>
            <th> Lastname </th>
            <th> Firstname </th>
            <th> Middlename </th>
            <th> Birthday </th>
            <th> Reason </th>
            <th> Action </th>
             </tr>   
            </thead>
            <tbody> 
';
    $resultx = mysqli_query($link, "SELECT * FROM employees where actionpoint = 'CANCELED'");
    while ($rowx = mysqli_fetch_assoc($resultx)) {
      $inputDate = $rowx['birthday'];
      $timestamp = strtotime($inputDate);
      $formattedDate = date("F d, Y", $timestamp);

      echo ' <tr> ';
      echo '  <td>  ' . $rowx['id'] . '   </td> ';
      echo '  <td>  ' . $rowx['appno'] . '   </td> ';
      echo '  <td>  ' . $rowx['lastnameko'] . '   </td> ';
      echo '  <td> ' . $rowx['firstnameko'] . '   </td> ';
      echo '  <td> ' . $rowx['mnko'] . '   </td> ';
      echo '  <td> ' . $formattedDate . '   </td> ';
      echo '  <td> ' . $rowx['reasonofaction'] . '   </td> ';

      echo '<td> <form action = "" method = "POST">
        <input type = "hidden" name = "undocanceledID" class="undocanceledID" id="undocanceledID" value = "' . $rowx['id'] . '">
        <button type="submit" name = "undocanceledbtn" class="btn btn-default undocanceledbtn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Undo Canceled">
       <i class="bi bi-arrow-counterclockwise"></i></button>
  
    ';


      echo '</form></td>';




      echo ' </tr> ';
    }
    echo '
     </tbody>
        </table> 
  
     
                  </div>
            <!--- laman -->
                  </div>
                </div> <!-- .content-wrapper -->
  
  ';
  }



  if (isset($_POST['shorlistr'])) {
    echo '
                <div class="cd-content-wrapper">
                  <div class="text-component text-center">
            shortlistr
            <!--- laman -->
                    <h1>Responsive Sidebar Navigation</h1>
                    <p>👈<a href="https://codyhouse.co/gem/responsive-sidebar-navigation">Article &amp; Download</a></p>
                  
            <!--- laman -->
                  </div>
                </div> <!-- .content-wrapper -->
  ';
  }

  if (isset($_POST['additionalr'])) {
    echo '
                <div class="cd-content-wrapper">
                  <div class="text-component text-center">
            additionalr
            <!--- laman -->
                    <h1>Responsive Sidebar Navigation</h1>
                    <p>👈<a href="https://codyhouse.co/gem/responsive-sidebar-navigation">Article &amp; Download</a></p>
                  
            <!--- laman -->
                  </div>
                </div> <!-- .content-wrapper -->
  ';
  }


  ?>
  <?php

  if (isset($_POST['addappview'])) {
    $short1 = $_POST['shortlisttitle1'];
    $_SESSION["data"] = $short1;
    $data = $_SESSION["data"];
    $view = "Applicants Shortlisted on : (" . $data . ")";

    echo '
  <div class="cd-content-wrapper">
    <div class="text-component text-center">
      <div class = "container">
      <!--- laman -->

  <form method="post" action="export1.php">';
    $_SESSION["dataexport1"] = $data;
    echo '
          <input type="submit" name="export" class="btn btn-success btnsall" value="Export" style="float:right;" />
          </form>
      <br><br>
      <h2 class="fs-2"><font color="black"> ' . $view . ' </font> </h2>
    <br><br>

                  <table id="example" class="table table-striped table-bordered table-sm align-middle mb-0 bg-white p-3 bg-opacity-10 border border-secondary border-start-0 border-end-0 rounded-end" style="width:100%; font-size: 13px !important;" style="width:100%;">
                          <thead>
                            <tr>
                              <th> ID </th>
                              <th> Name </th>
                              <th> SSS </th>
                              <th> Pag-ibig </th>
                              <th> Philhealth </th>
                              <th> TIN </th>
                              <th> Police </th>
                              <th> Brgy </th>
                              <th> NBI </th>
                              <th> PSA </th>
                              <th> Birthday </th>
                              <th> Address </th>
                              <th> Status </th>
                            </tr>   
                          </thead>

                          <tbody>';

    $queryx1 = "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data'";
    $resultx1 = mysqli_query($link, $queryx1);
    while ($rowx1 = mysqli_fetch_assoc($resultx1)) {
      // echo $rowx1[2]; 
      $appno = $rowx1["appnumto"];
      $queryx = "SELECT * FROM employees WHERE appno = '$appno'";
      $resultx = mysqli_query($link, $queryx);
      while ($rowx = mysqli_fetch_assoc($resultx)) {
        $police = $rowx['policed'];
        $barangay = $rowx['brgyd'];
        $nbi = $rowx['nbid'];
        $birthday = $rowx['birthday'];
        $timestamp_police = strtotime($police);
        $timestamp_barangay = strtotime($barangay);
        $timestamp_nbi = strtotime($nbi);
        $timestamp_birthday = strtotime($birthday);
        $formattedDate_police = date("F d, Y", $timestamp_police);
        $formattedDate_barangay = date("F d, Y", $timestamp_barangay);
        $formattedDate_nbi = date("F d, Y", $timestamp_nbi);
        $formattedDate_birthday = date("F d, Y", $timestamp_birthday);


        echo ' <tr> ';

        echo '  <td>  ' . $rowx['id'] . '   </td> ';
        echo '  <td>  ' . $rowx['lastnameko'] . ", " . $rowx['firstnameko'] . " " . $rowx['mnko'] . '   </td> ';
        echo '  <td> ' . $rowx['sssnum'] . '   </td> ';
        echo '  <td> ' . $rowx['pagibignum'] . '   </td> ';
        echo '  <td> ' . $rowx['phnum'] . '   </td> ';
        echo '  <td> ' . $rowx['tinnum'] . '   </td> ';
        echo '  <td> ' . $formattedDate_police . '   </td> ';
        echo '  <td> ' . $formattedDate_barangay . '   </td> ';
        echo '  <td> ' . $formattedDate_nbi . '   </td> ';
        echo '  <td> ' . $rowx['psa'] . '   </td> ';
        echo '  <td> ' . $formattedDate_birthday . '   </td> ';
        echo '  <td> ' . $rowx['peraddress'] . '   </td>  ';
        echo '  <td> ' . $rowx['actionpoint'] . '   </td>    ';
        echo ' 
                                </form>
                              </td>
                            </tr> ';
      }
    }
    '
                       </tbody>
                    </table> 





  </div>
<!--- laman -->
  </div>
</div> <!-- .content-wrapper -->

';
  } ?>


  <?php
  if (isset($_POST['addapp'])) {
    $short1 = $_POST['shortlisttitle'];
    $_SESSION["data"] = $short1;
    $data = $_SESSION["data"];
    $view = "Add Applicant to Shortlist (" . $data . ")";

    echo '
  <div class="cd-content-wrapper">
  <div class="text-component text-center">
<div class = "container-fluid">
<br><br>

<form action="export_shortlist.php" method="post">
    <input type="hidden" name="title" id="" class="form-control" value="' .$data. '">
    <button type="submit" class="btn btn-primary btnsall" name="export_excel" style="float: right;"><i class="bi bi-cloud-download"></i>&nbsp; Export to Excel</button>
</form>
    <h2 class="fs-2"><font color="black"> ' . $view . ' </font> </h2>
      <br><br>

                  <table id="example" class="table align-middle mb-0 bg-white p-3 bg-opacity-10 border-start-0 border-end-0 rounded-end" style="width:100%; font-size: 13px !important;" style="width:100%;">
                              <thead>
                              <tr>
                              
                              <th> Name. </th>
                              <th> SSS </th>
                              <th> Pag-ibig </th>
                              <th> Philhealth </th>
                              <th> TIN </th>
                              <th> Police </th>
                              <th> Brgy </th>
                              <th> NBI </th>
                              <th> PSA </th>
                              <th> Status </th>
                              <th> Action </th>

                               </tr>   
                              </thead>

                              <tbody> 
                  ';
 

    $queryx = "SELECT * FROM employees WHERE  actionpoint <> 'BLACKLISTED' AND actionpoint <> 'REJECTED' AND actionpoint <> 'DEPLOYED' AND actionpoint <> 'CANCELED'";
    $resultx = mysqli_query($link, $queryx);
    while ($rowx = mysqli_fetch_assoc($resultx)) {
      $appno = $rowx['appno'];
      $police = $rowx['policed'];
      $barangay = $rowx['brgyd'];
      $nbi = $rowx['nbid'];
      $birthday = $rowx['birthday'];
      $timestamp_police = strtotime($police);
      $timestamp_barangay = strtotime($barangay);
      $timestamp_nbi = strtotime($nbi);
      $timestamp_birthday = strtotime($birthday);
      $formattedDate_police = date("F d, Y", $timestamp_police);
      $formattedDate_barangay = date("F d, Y", $timestamp_barangay);
      $formattedDate_nbi = date("F d, Y", $timestamp_nbi);
      $formattedDate_birthday = date("F d, Y", $timestamp_birthday);

      $select = "SELECT * FROM shortlist_master WHERE appnumto = '$appno' AND shortlistnameto = '$data' AND is_deleted = '0'";
      $select_result = $link->query($select);
      while ($select_row = mysqli_fetch_assoc($select_result)) {

      echo ' <tr> ';

      echo '  <td>  ' . $rowx['lastnameko'] . ", " . $rowx['firstnameko'] . " " . $rowx['mnko'] . '   </td> ';
      echo '  <td> ' . $rowx['sssnum'] . '   </td> ';
      echo '  <td> ' . $rowx['pagibignum'] . '   </td> ';
      echo '  <td> ' . $rowx['phnum'] . '   </td> ';
      echo '  <td> ' . $rowx['tinnum'] . '   </td> ';
      echo '  <td> ' . $formattedDate_police . '   </td> ';
      echo '  <td> ' . $formattedDate_barangay . '   </td> ';
      echo '  <td> ' . $formattedDate_nbi . '   </td> ';
      echo '  <td> ' . $rowx['psa'] . '   </td> ';
      echo ' 
                                           <td>  
                                           <input type = "hidden" name = "shadowd1" class="shadowd1" id="shadowd1" value = "' . $rowx['appno'] . '">
                                           <input type = "hidden" name = "shadowd2" value = "' . $data . '">
                                           <input type = "hidden" name = "appname88" value = "' . $rowx['lastnameko'] . ', ' . $rowx['firstnameko'] . ' ' . $rowx['mnko'] . '">

                                          <button type="button" name = "displaymo" class="btn btn-success displaymo" id="displaymo" style = "font-size:15;width:90px;">
                                          <span class="glyphicon glyphicon-edit" >' . $rowx['actionpoint'] . '</span> 
                                          </button>
                                           
                                            </td> ';


      if ($rowx['actionpoint'] == "TERMINATED") {


        echo '<td> 
        <form action = "" method = "POST">

          <input type = "hidden" name = "emp_number" class="emp_number" id="emp_number" value = "' . $rowx['appno'] . '">
            <input type = "hidden" name = "appname88" class="appname88" id="appname88" value = "' . $rowx['lastnameko'] . ', ' . $rowx['firstnameko'] . ' ' . $rowx['mnko'] . '">';
        $appno = $rowx['appno'];
        $querycem = "SELECT * FROM shortlist_master where appnumto = '$appno' AND shortlistnameto = '$data' AND is_deleted = '0'";
        $resultcem = mysqli_query($link, $querycem);
        $corow = mysqli_num_rows($resultcem);

        echo '
            <input type = "hidden" name = "shad" value = "' . $corow . '">
              <button type="submit" name="unterminate_me" class="btn btn-info notification unterminate_me" style = "font-size:15;"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Unterminate this Applicant"><i class="bi bi-arrow-counterclockwise"></i><span class="badge">' . $corow . '</span></button>
            </form>
        </td>
                                                  ';
      } else {
        echo '<td> <form action="" method = "POST">
        <input type = "hidden" name = "app_number" class="app_number" id="app_number" value = "' . $rowx['appno'] . '">
        <input type = "hidden" name = "appno_id" class="appno_id" id="appno_id" value = "' . $rowx['id'] . '">
        ';
        $appno = $rowx['appno'];
        $querycem = "SELECT * FROM shortlist_master where appnumto = '$appno' AND shortlistnameto = '$data' AND is_deleted = '0'";
        $resultcem = mysqli_query($link, $querycem);
        $corow = mysqli_num_rows($resultcem);
        echo '
                <button type="submit" name="add_shortlist_btn" id="add_shortlist_btn" class="btn btn-info notification add_shortlist_btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to shortlist">
                <i class="bi bi-plus-lg"></i> <span class="badge">' . $corow . '</span>
                </button>
          </form>
        </td>
                                                  ';
      }
      echo '
               
                                          </tr> ';
    }
  }
    '

                       </tbody>
                          </table> 


</div>
</div>
</div>
            ';
  } ?>

  <div class="modal fade" id="viewdetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">

        </div>

      </div>
    </div>
  </div>


  <?php
  if (isset($_POST['addappdel'])) {
    $short1 = $_POST['shortlisttitle1del'];
    $_SESSION["data"] = $short1;
    $data = $_SESSION["data"];
    $view = "Applicants Shortlisted on : (" . $data . ")";
    $_SESSION["dataexport1"] = $data;

    echo '
  <div class="cd-content-wrapper">
  <div class="text-component text-center">
<div class = "container">
            <br><br><br>
            <h2 class="fs-2">' . $view . '  </h2>
            <br><br>

                <table id="example" class="table table-striped table-sm align-middle mb-0 p-3 border border-info border-start-0 border-end-0 rounded-end" style="width:100%; font-size: 14px !important;">
                            <thead>
                              <tr>
                                <th> ID </th>
                                <th> Name </th>
                                <th> SSS </th>
                                <th> Pag-ibig </th>
                                <th> Philhealth </th>
                                <th> TIN </th>
                                <th> Police </th>
                                <th> Brgy </th>
                                <th> NBI </th>
                                <th> PSA </th>
                                <th> Action </th>
                              </tr>   
                            </thead>

                            <tbody> 
                ';

    $resultx1 = mysqli_query($link, "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data'");
    while ($rowx1 = mysqli_fetch_assoc($resultx1)) {
      $appnumto = $rowx1['appnumto'];

      $resultx = mysqli_query($link, "SELECT * FROM employees WHERE appno = '$appnumto' ");
      while ($rowx = mysqli_fetch_assoc($resultx)) {
        $police = $rowx['policed'];
        $barangay = $rowx['brgyd'];
        $nbi = $rowx['nbid'];
        $timestamp_police = strtotime($police);
        $timestamp_barangay = strtotime($barangay);
        $timestamp_nbi = strtotime($nbi);
        $formattedDate_police = date("F d, Y", $timestamp_police);
        $formattedDate_barangay = date("F d, Y", $timestamp_barangay);
        $formattedDate_nbi = date("F d, Y", $timestamp_nbi);

        echo ' <tr> ';
        echo '  <td>  ' . $rowx['id'] . '   </td> ';
        echo '  <td>  ' . $rowx['lastnameko'] . ", " . $rowx['firstnameko'] . " " . $rowx['mnko'] . '   </td> ';
        echo '  <td> ' . $rowx['sssnum'] . '   </td> ';
        echo '  <td> ' . $rowx['pagibignum'] . '   </td> ';
        echo '  <td> ' . $rowx['phnum'] . '   </td> ';
        echo '  <td> ' . $rowx['tinnum'] . '   </td> ';
        echo '  <td> ' . $formattedDate_police . '   </td> ';
        echo '  <td> ' . $formattedDate_barangay . '   </td> ';
        echo '  <td> ' . $formattedDate_nbi . '   </td> ';
        echo '  <td> ' . $rowx['psa'] . '   </td> ';
        echo '<td> 
                    <form action = "" method = "POST">
                        <input type = "hidden" name = "shadowE1x" value = "' . $rowx['appno'] . '">
                        <input type = "hidden" name = "shadowE1" class="shadowE1" id="shadowE1" value = "' . $rowx['appno'] . '">';
        $appno = $rowx['appno'];
        $resultcem = mysqli_query($link, "SELECT * FROM shortlist_master where appnumto = '$appno'");
        $corow = mysqli_num_rows($resultcem);

        echo '
                    <input type = "hidden" name = "shad" class="shad" id="shad" value = "' . $corow . '">
                      <button type = "submit" name = "remove"  class="btn btn-info notification remove" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Remove to shortlist">
                      <i class="bi bi-trash"></i> <span class="badge">' . $corow . '</span>
                      </button>
                  </form>
                </td>
            </tr> ';
      }
    }
    '
      </tbody>
     </table> 
</div>
</div>
</div>';
  }
  ?>



  <?php
  if (isset($_POST['addappdel1'])) {
    $short1 = $_POST['shortlisttitle1del'];
    $_SESSION["data"] = $short1;
    $_SESSION["account"] = "recruitment";
    $data = $_SESSION["data"];
    $view = "Applicants Shortlisted on (" . $data . ")";

    $_SESSION["dataexport1"] = $data;
    echo '
    <div class="modal fade" id="addtoshortlist"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Applicant to Shortlists</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="col-md-6 mb-3">
                <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
              </div>
            <form action="action.php" method="POST" class="form-group row">
              <div class="col-md-6 form-check">
                <input type="checkbox" name="select-all" id="select-all" class="form-check-input"> Select All
              </div>
              <table class="table table-striped table-sm align-middle mb-0 p-3 border border-secondary border-start-0 border-end-0 rounded-end" id="myTable" style="width:100%; font-size: 14px !important;">
                <thead class="p-3">
                  <tr>
                    <th>Select</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>EWB Status</th>
                  </tr>
                </thead>' ?>
    <tbody>
      <tr>
        <?php

        $query_employee = "SELECT * FROM employees";
        $result_employee = $link->query($query_employee);
        while ($row = mysqli_fetch_assoc($result_employee)){
          $appno = $row['appno'];
          $user_id = $row["id"];
          $birth_date = $row['birthday'];
          $timestamp_birthdate = strtotime($birth_date);
          $formattedDate_birthdate = date("F d, Y", $timestamp_birthdate);
          
          $query_shortlist_master = "SELECT * FROM shortlist_master WHERE appnumto = '$appno' AND shortlistnameto = '$data'";
          $result_shortlist_master = $link->query($query_shortlist_master);
          
            if(mysqli_num_rows($result_shortlist_master) === 0){
             
        ?>
            <td>
              <div class="col-md-6 form-check">
                <input type="checkbox" name="user[]" class="form-check-input" value="<?php echo $appno ?>">
              </div>
            </td>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['lastnameko'] . ", " . $row['firstnameko'] . " " . $row['mnko'] ?></td>
            <td><?php echo $formattedDate_birthdate ?></td>
            <td><?php echo $row['ewb_status'] ?></td>
      </tr>
    </tbody>
<?php }
        }
        echo '</table>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="add_to_shortlist" class="btn btn-primary">Add to Shortlist</button>
          </div>
          </form>
        </div>
      </div>
    </div>



        <div class="cd-content-wrapper">
        <div class="text-component text-center">
      <div class = "container">
                <!-- <form action = "" method = "POST">
                  <button class="btn btn-success btnsall" Name ="alltoewb" style="float:right;"><span>ALL TO EWB</span></button>
                 </form> -->
    <br><br><br>
              <h2><font color="black"> ' . $view . ' </font> </h2>
              <br><br>
                <div class="col-md-6 mb-5">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addtoshortlist" style="float: left !important; background: green !important; color: white !important;"><i class="bi bi-plus-circle-fill"></i> &nbsp;Add shortlist</button>
                </div>
                <br>
                      <table id="example" class="table table-striped table-sm align-middle mb-0 bg-white p-3 bg-opacity-10 border border-secondary border-start-0 border-end-0 rounded-end " style="width:100%;font-size:14 !important;">
                                  <thead class="bg-success">
                                  <tr>
                                    <th> ID </th>
                                    <th> Name </th>
                                    <th> SSS </th>
                                    <th>  Pag-ibig </th>
                                    <th > Philhealth </th>
                                    <th> TIN </th>
                                    <th> PSA </th>
                                    <th> STATUS </th>
                                    <th> Action </th>
                                   </tr>   
                                  </thead>
    
                                  <tbody>';

        $queryx1 = "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data' AND is_deleted = '0'";
        $resultx1 = mysqli_query($link, $queryx1);

        while ($rowx1 = mysqli_fetch_assoc($resultx1)) {
          $app_num = $rowx1['appnumto'];

          $queryx1 = "SELECT * FROM employees WHERE appno = '$app_num'";
          $resultx = mysqli_query($link, $queryx1);
          while ($rowx = mysqli_fetch_assoc($resultx)) {
            $police = $rowx['policed'];
            $barangay = $rowx['brgyd'];
            $nbi = $rowx['nbid'];
            $timestamp_police = strtotime($police);
            $timestamp_barangay = strtotime($barangay);
            $timestamp_nbi = strtotime($nbi);
            $formattedDate_police = date("F d, Y", $timestamp_police);
            $formattedDate_barangay = date("F d, Y", $timestamp_barangay);
            $formattedDate_nbi = date("F d, Y", $timestamp_nbi);
            // or  $rowx["ewbdate"] != ''
            if ($rowx['actionpoint'] == "DEPLOYED") {
              echo ' <tr> ';
              echo '  <td> ' . $rowx['id'] . '   </td> ';
              echo '  <td>  ' . $rowx['lastnameko'] . ", " . $rowx['firstnameko'] . " " . $rowx['mnko'] . '   </td> ';
              echo '  <td> ' . $rowx['sssnum'] . '   </td> ';
              echo '  <td> ' . $rowx["pagibignum"] . '   </td> ';
              echo '  <td> ' . $rowx["phnum"] . '   </td> ';
              echo '  <td> ' . $rowx["tinnum"] . '   </td> ';
              echo '  <td> ' . $rowx["psa"] . '   </td> ';
              echo '  <td> ' . $rowx["ewb_status"] . '   </td> ';
              echo '<td> 
                               
              <form action = "" method = "POST">
                <input type = "hidden" name = "shadowE1x" value = "' . $rowx["appno"] . '">
                <input type = "hidden" name = "shadowE1" value = "' . $rowx["appno"] . '">';
              $appno = $rowx["appno"];
              $resultcem = mysqli_query($link, "SELECT * FROM shortlist_master where appnumto = '$appno'");
              $corow = mysqli_num_rows($resultcem);

              echo '
                    <input type = "hidden" name = "shad" value = "' . $corow . '">
           
                    <button type="submit" name = "addtoewb" class="btn btn-info notification mt-1 mb-1 addtoewb" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Deploy">
                      <i class="bi bi-layer-forward"></i>
                    </button>
                      </form>
                      </td>
            </tr> ';
            } else {
              echo ' <tr> ';
              echo '  <td> ' . $rowx['id'] . '   </td> ';
              echo '  <td>  ' . $rowx['lastnameko'] . ", " . $rowx['firstnameko'] . " " . $rowx['mnko'] . '   </td> ';
              echo '  <td> ' . $rowx['sssnum'] . '   </td> ';
              echo '  <td> ' . $rowx["pagibignum"] . '   </td> ';
              echo '  <td> ' . $rowx["phnum"] . '   </td> ';
              echo '  <td> ' . $rowx["tinnum"] . '   </td> ';
              echo '  <td> ' . $rowx["psa"] . '   </td> ';
              echo '  <td> ' . $rowx["ewb_status"] . '   </td> ';
              echo '<td> 
                               
              <form action = "" method = "POST">
                <input type = "hidden" name = "shadowE1x" value = "' . $rowx["appno"] . '">
                <input type = "hidden" name = "appno_deploy" class="appno_deploy" id="appno_deploy" value = "' . $rowx["appno"] . '">';
              $appno = $rowx["appno"];
              $resultcem = mysqli_query($link, "SELECT * FROM shortlist_master where appnumto = '$appno'");
              $corow = mysqli_num_rows($resultcem);

              echo '
                <input type = "hidden" name = "shad" value = "' . $corow . '">';
           if($rowx['ewb_status'] === 'VERIFIED'){ ?>

                <button type="submit" name = "addtoewb" class="btn btn-info notification mt-1 mb-1 addtoewb" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Deploy" style="visibility: hidden !important;">
                  <i class="bi bi-layer-forward"></i>
                </button>
        <?php     } else{ ?>
              
              <button type="submit" name = "addtoewb" class="btn btn-info notification mt-1 mb-1 addtoewb" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Deploy">
                  <i class="bi bi-layer-forward"></i>
                </button>
           <?php } '
              </form>
            </td>
          </tr> ';
            }
          }
        }
        '
        </tbody>
        </table> 
    
    
    </div>
    </div>
    </div>';
      }
?>

<?php

if (isset($_POST['mrfbutton'])) {
?>
  <center class="containers">
    <h3 class="fs-2">Summary Report</h3>
    <hr>
    <table id="e99" class="table table-sm align-middle mb-0 border border-info border-start-0 border-end-0 rounded-end" style="width:100%; font-size: 14px !important;">
      <thead>
        <tr>
          <th> FILLED BY </th>
          <th> LOCATION </th>
          <th> PROJECT TITLE </th>
          <th> POSITION </th>
          <th> NEEDED </thh>
          <th> PROVIDED </th>
          <th> RECEIVED BY: </th>
        </tr>
      </thead>
      <tbody>

        <?php
        $query = "SELECT * FROM mrf WHERE is_deleted = '0'";
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_assoc($result)) {
          $uid1 = $row['uid'];
          $totalneed = $row['np_male'] + $row['np_female'];
          $totalprovided = $row['s_male'] + $row['s_female'];
          $fullname = $row['prepared_by'];

          if ($row['hr_personnel'] == "YES") {
            echo ' <tr> ';
            echo '  <td>  ' . $row['prepared_by'] . '   </td> ';
            echo '  <td>  ' . $row['location'] . '   </td> ';
            echo '  <td>  ' . $row['project_title'] . '   </td> ';
            if (!empty($row['position'])) {
              echo '  <td>  ' . $row['position_detail'] . '   </td> ';
            } else {
              echo '  <td>  ' . $row['position'] . '   </td> ';
            }
            echo '  <td style=" text-align: center;">  ' . $totalneed . '   </td> ';
            echo '  <td style=" text-align: center;">  ' . $totalprovided . '   </td> ';

            echo ' <td> 
            <form action = "" method = "POST">
              <input type = "hidden" name = "mrf_id" value = "' . $row['id'] . '">
                <button type="button" name = "r_mrf" class="btn btn-default r_mrf"><span class="glyphicon glyphicon-edit" ></span> Provide Shortlist</button>
            </form>
          </td>
        </tr> ';
          } else {
            echo ' <tr> ';
            echo '  <td>  ' . $fullname . '   </td> ';
            echo '  <td>  ' . $row['location'] . '   </td> ';
            echo '  <td>  ' . $row['project_title'] . '   </td> ';
            if (!empty($row['position'])) {
              echo '  <td>  ' . $row['position_detail'] . '   </td> ';
            } else {
              echo '  <td>  ' . $row['position'] . '   </td> ';
            }
            echo '  <td style=" text-align: center;">  ' . $totalneed . '   </td> ';
            echo '  <td style=" text-align: center;">  ' . $totalprovided . '   </td> ';
            echo '
              <td> 
                <form action = "" method = "POST">
                  <input type = "hidden" name = "mrf_ids" class="mrf_ids" value = "' . $row['id'] . '">
                      <button type="button" name = "r_mrfs" class="btn btn-default r_mrfs"><span class="glyphicon glyphicon-edit" ></span> Accept MRF</button>
                </form>
              </td>
            </tr> ';
          }
        }
        //} 
        ?>
      </tbody>
    </table>
  </center>
<?php } ?>




</main> <!-- .cd-main-content -->

<!-- Modal -->
<div class="modal fade" id="myModaladdshort" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <label for="text">
          <font color="Black">
            <font color="red">*</font>Select Shortlist Title
          </font>
        </label>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        <br>
      </div>

      <div class="modal-body">
        <form action="" method="POST"><br>
          <label class="form-label"> Project Title </label>
          <center>
            <select class="form-select" name="shortlisttitle" required>
              <option value="">Select shortlist Name:</option>
              <?php
              $resultpro = mysqli_query($link, "SELECT * FROM shortlist_details WHERE activity ='ACTIVE' order by shortlistname ASC ");
              while ($rowpro = mysqli_fetch_assoc($resultpro)) {
                echo '<option  value="' . $rowpro['shortlistname'] . '">' . $rowpro['shortlistname'] . '(' . $rowpro['project'] . ') </option>';
              ?>       
              <?php }?>
            </select>
          </center>
      </div>
      <div class="modal-footer">
        <input type="submit" name="addapp" value="Okay" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
        <input type="button" name="Cancelko" value="Close" data-bs-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModaladdshortview" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <label for="text">
          <font color="Black">
            <font color="red">*</font> Select Shortlist Title:
          </font>
        </label>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        <br>
      </div>

      <div class="modal-body">
        <form action="" method="POST"><br>
          <label class="form-label"> Project Title : </label>
          <center>
            <select class="form-select" name="shortlisttitle1"> ;
              <option>Select shortlist Name:</option>
              <?php
              $resultpro = mysqli_query($link, "SELECT * FROM shortlist_details WHERE activity ='ACTIVE' order by shortlistname ASC ");
              while ($rowpro = mysqli_fetch_array($resultpro)) {
                echo '<option  value="' . $rowpro[1] . '">' . $rowpro[1] . '(' . $rowpro[2] . ') </option> ';
              }
              ?>
            </select>
          </center>
      </div>
      <div class="modal-footer">
        <input type="submit" name="addappview" value="Okay" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
        <input type="submit" name="Cancelko" value="Close" data-bs-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModaldelshort" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <label for="text">
          <font color="Black">
            <font color="red">*</font>Select Shortlist Title:
          </font>
        </label>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        <br>
      </div>

      <div class="modal-body">
        <form action="" method="POST"><br>
          <label class="form-label"> Project Title </label>
          <center>
            <select class="form-select" name="shortlisttitle1del" data-placeholder="" style="height:45px;width:60%"> ;
              <option>Select shortlist Name:</option>
              <?php
              $resultpro = mysqli_query($link, "SELECT * FROM shortlist_details WHERE activity ='ACTIVE' order by shortlistname ASC ");
              while ($rowpro = mysqli_fetch_array($resultpro)) {
                echo '<option  value="' . $rowpro[1] . '">' . $rowpro[1] . '(' . $rowpro[2] . ') </option> ';
              }
              ?>
            </select>
          </center>
      </div>
      <div class="modal-footer">

        <input type="submit" name="addappdel" value="Okay" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
        <input type="submit" name="Cancelko" value="Close" data-bs-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
        </form>
      </div>
    </div>
  </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModalewb" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <label for="text">
          <font color="Black">
            <font color="red">*</font>Select Shortlist Title:
          </font>
        </label>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        <br>
      </div>

      <div class="modal-body">
        <form action="" method="POST"><br>
          <label class="form-label"> Project Title </label>
          <center>
            <select class="form-select"  name="shortlisttitle1del"  required> ;
              <option value="">Select shortlist Name:</option>
              <?php
              $resultpro = mysqli_query($link, "SELECT * FROM shortlist_details WHERE activity = 'ACTIVE' order by shortlistname ASC ");
              while ($rowpro = mysqli_fetch_assoc($resultpro)) {
                echo '<option  value="' . $rowpro["shortlistname"] . '">' . $rowpro['shortlistname'] . '(' . $rowpro['project'] . ') </option>';
              }
              ?>
            </select>
          </center>
      </div>

      <div class="modal-footer">
        <input type="submit" name="addappdel1" value="Okay" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
        <input type="submit" name="Cancelko" value="Close" data-bs-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
        </form>
      </div>
    </div>
  </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModalapp_print" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <label for="text">
          <font color="Black">
            <font color="red">*</font>Select Applicant
          </font>
        </label>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        <br>
      </div>

      <div class="modal-body">
        <form action="" method="POST"><br>
          <label class="form-label"> Project Title </label>
          <center>
              <select class="form-select" name="applicant_no"> 
              <option>Select shortlist Name:</option>
              <?php
              $resultpro = mysqli_query($link, "SELECT * FROM employees WHERE actionpoint !='BLACKLISTED' OR actionpoint !='DEPLOYED' order by lastnameko ASC ");
              while ($rowpro = mysqli_fetch_array($resultpro)) {
                echo '<option  value="' . $rowpro[4] . '">' . $rowpro[6] . ", " . $rowpro[7] . " " . $rowpro[8] . ' </option>';
              }
              ?>
            </select>
          </center>
      </div>
      <div class="modal-footer">
        <input type="submit" name="printapp" value="Okay" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
        <input type="submit" name="Cancelko" value="Close" data-bs-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
        </form>
      </div>
    </div>
  </div>
</div>
</div>




<script>
  // Enabling Tooltips
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>


<!-- JAVASCRIPT SECTION -->
<script src="assets/js/util.js"></script>
<script src="assets/js/menu-aim.js"></script>
<script src="assets/js/main.js"></script>
<script language="JavaScript">


</script>
<script>
  $(document).ready(function() {
    $('#example').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    });
  });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
</body>

</html>

<?php 
} else {
  // kapag wala pang user name na kaparehas
  $_SESSION['errorMessage'] = "Page direct Un Authorized";
  header("Location: logout.php");
  // remove all session variables

  session_unset();

  // destroy the session 
  session_destroy();
}
?>