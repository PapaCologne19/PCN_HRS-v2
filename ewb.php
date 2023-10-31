<?php
include("connect.php");
session_start();

date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y');

if (isset($_POST['to_index'])) {
  session_unset();

  // destroy the session 
  session_destroy();
  header("location:index.php");
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="deo1.css">

  <!--for data table-->
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">

  <link rel="https://cdn.datatables.net/fixedcolumns/3.3.1/css/fixedColumns.dataTables.min.css">
  <link rel="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">

  <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style type="text/css">
    #results {
      padding: 10px;
      border: 1px solid;
      background: #ccc;
    }

    .bs-example {
      margin: 20px;
    }

    body {
      font-family: Arial;
      font-size: 20
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
      border: 5px solid black;
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
  </style>






  <title>HRS EWB</title>
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
  } ?>

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
                                                                                  <li class="cd-nav__sub-item"><BUTTON class="button2 btn btn-secondary" name = "to_index" style="font-size:14; width:98%;height:50px">Log out</button></li>
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
                                                <li class="cd-side__label" style="font-size:26"><span>EWB MENU</span></li>
                                                <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children">
                                                        <a href="">REPORTS</a>
                                                        
                                                        <ul class="cd-side__sub-list">
                                                          <form action = "" method = "POST">
                                                          <li class="cd-side__btn"><a><BUTTON class="btn" name = "report1" style="font-size:14; width:150px;height:50px">EWB database</button></a></li>     
                                                          <li class="cd-side__btn"><a><BUTTON class="btn" name = "report2" style="font-size:14; width:150px;height:50px">Summary Report</button></a></li>     

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
                                                    <li class="cd-side__label"><span>EWB Action</span></li>
                                                    <li class="cd-side__btn"><a><BUTTON class="btn" name = "applicant">+ For Verification</button></li>
                                                    <li class="cd-side__btn"><a><BUTTON class="btn" name = "multipleme">+ Multiple Transaction</button></a></li>
                                                    <li class="cd-side__btn"><a><BUTTON class="btn" name = "databaselist">+ Applicants</button></a></li>        





                                       <ul class="cd-side__list js-cd-side__list">
                                                <!--<li class="cd-side__label" style="font-size:26"><span>SHORTLISTING MENU</span></li>-->
                                                <!--<li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children">-->
                                                      <!--  <a href="">REPORTS</a>-->
                                                        
                                                        <ul class="cd-side__sub-list">
                                                          <form action = "" method = "POST">
                                                          <!--<li class="cd-side__sub-item"><a><BUTTON class="btn" name = "blacklistr">List of Blacklisted</button></a></li>-->
                                                         <!--<li class="cd-side__sub-item"><a><BUTTON class="btn" name = "viewdatabaseshort">View Database</button></a></li>-->
                                                         <li class="cd-side__btn"><a><button type="button" class="btn" style="font-size:14; width:150px;height:50px" data-toggle="modal" data-target="#myModaladdshortview" >+ Shortlist Download</button></a></li>
                                                          <!--<li class="cd-side__sub-item"><a><BUTTON class="btn" name = "additionalr">Additional Repots</button></a></li>-->
                                                          <li class="cd-side__btn"><a><BUTTON class="btn" name = "summary" style="font-size:14; width:150px;height:50px">+ Summary</button></a></li>     
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








                                                      <!--<li class="cd-side__label"><span>Shortlisting Action</span></li>-->
                                                          <!-- <form action = "" method = "POST">-->
                                                    <!--<li class="cd-side__btn"><a><BUTTON class="btn" name = "shortlisttitle">+ Create Shortlist Title</button></a></li>        -->
                                                   <!-- <li class="cd-side__btn"><a><BUTTON class="btn" name = "addapp">+ Add Applicant to Shorlist1</button></a></li>        -->

                                                         
                                                   <!--</form>-->
                                  <!--<li class="cd-side__btn"><button type="button" class="btn" data-toggle="modal" data-target="#myModaladdshort" >+ Add to Shortlist</button></li>-->
                                  <!--<li class="cd-side__btn"><button type="button" class="btn" data-toggle="modal" data-target="#myModaldelshort" >+ Remove / EWB</button></li>-->
                                                     <!--<div  id="my_camera"></div>-->
                                                    
                                                    
                                               
                                                  </ul>
                                             
                                    


                                      </nav>
';

  //}

  //else

  //{
  // // kapag wala pang user name na kaparehas
  //      $kekelpogi_index = "Page direct Un Authorized";

  //  // remove all session variables

  //session_unset(); 

  // // destroy the session 
  // session_destroy(); 

  // }
  ?>
  <?php




  if (isset($_POST['verify1'])) {
    $shadowewb1 = $_POST['shadowewb']; ?>
    <center>

      <div class="how12">
        <div class="many"><br>
          <?php $shadowewb1 = $_POST['shadowewb']; ?>
          <form action="" method="POST"><br>
            <input type="hidden" name="ewbid" value="' . $shadowewb1 . '">


            <div class="col-md-12 mb-4 mt-3" style="justify-content: center; text-align:center;">
              <label class="form-label"> Select EWB Status </label><br>
              <select class="form-select " name="ewbchoiceto" autofocus>
                <option>Select</option>
                <?php
                $resultpro = mysqli_query($link, "SELECT * FROM ewb_choices");
                while ($rowpro = mysqli_fetch_array($resultpro)) {
                  echo '<option  value="' . $rowpro[1] . '">' . $rowpro[1] . ' </option>';
                }
                ?>
              </select>
            </div>

            <input type="submit" name="processit" value="Submit" class="btn btn-success">
            <input type="submit" name="Cancelko" value="Cancel" class="btn btn-info">



          </form>

        </div>
      </div>
    </center>
  <?php } ?>

  <?php


  if (isset($_POST['processit'])) {
    $dtnow = date("m/d/Y");
    $ewbid1 = $_POST['ewbid'];
    $ewbc1 = $_POST['ewbchoiceto'];


    mysqli_query($link, "UPDATE employees

                            SET
                      
                       ewbdeploy='$ewbc1',
                               ewbdate='$dtnow'
                            WHERE
                            appno = '$ewbid1'
                            ");

    $kekelpogi = "Single EWB Process Succesful !";
  }

  




  if (isset($_POST['applicant'])) {
    echo '
   <div class="containers">


                                  <div class="">
                <div class = "" >
                            <!--- laman -->
                            <form action = "" method = "POST">
                              <button class="btn btn-success btnsall" Name ="" style="float:right;"><span>Close</span></button>
                                  <br> <br><br>
                             </form>
                            
                <center>
                                    <h2 class="fs-2">EWB FOR VERIFICATION LISTING</h2>
                 </center>        


                      <table id="example" class="table table-sm align-middle mb-0 bg-white p-3 bg-opacity-10 border border-secondary border-start-0 border-end-0 rounded-end mdc-data-table" style="width:100%; font-size: 14px !important;">
                            <thead>
                               <tr>
                                <th> Applicant No </th>
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
                                <th> Date Deployed </th>
                                <th> Action </th>

                                </tr>   
                            </thead>
                            <tbody>';

    $resultx = mysqli_query($link, "SELECT * FROM employees where actionpoint = 'EWB' AND ewb_status = 'NOT VERIFY'");
    while ($rowx = mysqli_fetch_assoc($resultx)) {
      $police = $rowx['policed'];
      $barangay = $rowx['brgyd'];
      $nbi = $rowx['nbid'];
      $birthday = $rowx['birthday'];
      $date_deployed = $rowx['ewbdate'];
      $timestamp_police = strtotime($police);
      $timestamp_barangay = strtotime($barangay);
      $timestamp_nbi = strtotime($nbi);
      $timestamp_birthday = strtotime($birthday);
      $timestamp_date_deployed = strtotime($date_deployed);
      $formattedDate_police = date("F d, Y", $timestamp_police);
      $formattedDate_barangay = date("F d, Y", $timestamp_barangay);
      $formattedDate_nbi = date("F d, Y", $timestamp_nbi);
      $formattedDate_birthday = date("F d, Y", $timestamp_birthday);
      $formattedDate_date_deployed = date("F d, Y", $timestamp_date_deployed);

      echo ' <tr> ';


      echo '  <td>  ' . $rowx['appno'] . '   </td> ';
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
      echo '  <td> ' . $formattedDate_date_deployed . '   </td> ';


      echo '<td> <form action = "" method = "POST">

  <input type = "hidden" name = "verified_id" class="verified_id" id = "verified_id" value = "' . $rowx['appno'] . '">
  <button type="button" name = "verify1s" class="btn btn-info verify1s">
    <span class="glyphicon glyphicon-edit" >Verify</span>
  </button>

  <input type = "hidden" name = "decline_ewbID" class="decline_ewbID" id = "decline_ewbID" value = "' . $rowx['appno'] . '">
    <button type="submit" name = "decline_ewb" class="btn btn-info decline_ewb" id="decline_ewb">
      <span class="glyphicon glyphicon-edit" >Decline</span>
    </button>



     ';
      echo '</form>
      
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal-' . $rowx['appno'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> 
            
            <form action="" method="POST"><br>
              <input type="hidden" name="ewbid" value="' . $rowx['appno'] . '">
  
              <div class="col-md-10 mb-4 mt-3" style="justify-content: center; text-align:center;">
                <label class="form-label"> Select EWB Status </label><br>
                <select class="form-select " name="ewbchoiceto" autofocus>
                  <option>Select</option>';
      $resultpro = mysqli_query($link, "SELECT * FROM ewb_choices");
      while ($rowpro = mysqli_fetch_assoc($resultpro)) {

        echo '<option  value="' . $rowpro['description'] . '">' . $rowpro['description'] . ' </option>';
      }

      ' </select>
              </div>
  
              <input type="submit" name="processit" value="Submit" class="btn btn-success">
              <input type="submit" name="Cancelko" value="Cancel" class="btn btn-info">
  
  
  
            </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      </td>';

      echo ' </tr> 

 ';
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
                  <td><?php echo $rowx['actionpoint']; ?></td>
                <?php } else { ?>
                  <td><?php echo $rowx['actionpoint']; ?></td>
              <?php }
                echo '<td> 
                        <form action = "" method = "POST" class="contain">
                          <div class="columns">
                            <input type = "hidden" name = "shadowE" value = "' . $rowx['id'] . '">
                              <button type="submit" name = "Editbtn" class="btn btn-default btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View Applicant">
                              <i class="bi bi-eye"></i>
                              </button>
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



  if (isset($_POST['Editbtn'])) {
    $idshadow = $_POST['shadowE'];
    $resulted = mysqli_query($link, "SELECT * FROM employees WHERE id = '$idshadow'");
    while ($rowed = mysqli_fetch_assoc($resulted)) {
      echo '   
                                  <div class="container" style="padding-left: 20rem; padding-right: 20rem; padding-top: 5rem; ">
                                    <div class="row ">
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
                                                <select class="form-select" name="source" disabled value= "' . $rowed["source"] . '" data-placeholder="Select Source"; ';
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
                                                  <input type="text" name = "lastnameko" value= "' . $rowed["lastnameko"] . '" class="form-control"  disabled >
                                                </div>
                                              </div>
                                                                  
                                              <div class="row mt-3" >
                                                <div class="col-md-2">
                                                  <label class="form-label">First Name:</font></label>
                                                </div>
                                                <div class="col-md-10">
                                                  <input type="text" name = "firstnameko" value= "' . $rowed["firstnameko"] . '" class="form-control"  disabled>
                                                </div>
                                              </div>
                                              <div class="row mt-3" >
                                                <div class="col-md-2">
                                                  <label class="form-label">Middle Name:</font></label>
                                                </div>
                                                <div class="col-md-10">
                                                  <input type="text`" name = "mnko" value= "' . $rowed["mnko"] . '" class="form-control"  disabled>
                                                </div>
                                              </div>
                                                                  
                                              <div class="row mt-3" >
                                                <div class="col-md-2">
                                                  <label class="form-label">Extension Name:</font></label>
                                                 </div>
                                                 <div class="col-md-10">
                                                  <input type="text" name = "extnname" value= "' . $rowed["extnname"] . '" maxlength="5" class="form-control"  disabled placeholder="">
                                                 </div>
                                              </div>
                                                                  
                                              <div class="row mt-3" >
                                                <div class="col-md-2">
                                                  <label class="form-label">Present Address:</font></label>
                                                </div>
                                                <div class="col-md-10">
                                                  <input type="text" name = "paddress" value= "' . $rowed["paddress"] . '" class="form-control"  disabled>
                                                </div>
                                              </div>
                                                                  
                                              <div class="row mt-3">
                                                <div class="col-md-2">
                                                  <label class="form-label">Region :</font></label>
                                                </div>
                                                <div class="col-md-10">
                                                  <select class="form-select cbo" name="regionn" id="regionn"  data-placeholder="Select User type"  disabled > ;';
      echo '<option>' . $rowed["regionn"] . '</option> ';
      $resultrg = mysqli_query($link, "SELECT * FROM region");
      while ($rowrg = mysqli_fetch_assoc($resultrg)) {
        echo '<option  value="' . $rowrg["regCode "] . '">' . $rowrg["regDesc"] . '</option>';
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
                                                  <select class="form-select"  disabled name="cityn" id="cityn"  data-placeholder="Select City"  disabled> ;
                                                    <option value="">' . $rowed["cityn"] . '</option>
                                                  </select>
                                                </div>                    
                                              </div>
                                                              
                                              <div class="row mt-3" >
                                                <div class="col-md-2">
                                                  <label class="form-label">Permanent Address </font></label>
                                                </div>
                                                <div class="col-md-10">
                                                  <input type="text" name = "peraddress" value= "' . $rowed["peraddress"] . '" class="form-control"  disabled>
                                                </div>
                                              </div>  
                                              
                                              <div class="row mt-3" >
                                                <div class="col-md-2">
                                                  <label class="form-label">Date of Birth </font></label>
                                                </div>
                                                <div class="col-md-10">
                                                  <input type="date" name = "birthday" value= "' . $rowed["birthday"] . '"  class="form-control"  disabled>
                                                </div>
                                              </div>
                                                                  
                                              <div class="row mt-3" >
                                                <div class="col-md-2">
                                                  <label class="form-label">Age </font></label>
                                                </div>
                                                <div class="col-md-10">
                                                  <input type="text" name = "agen" id ="agen" value= "' . $rowed["age"] . '" class="form-control"  disabled placeholder="" readonly>
                                                </div>
                                              </div>
                                                      
                                              <div class="row mt-3" >
                                                <div class="col-md-2">
                                                  <label class="form-label">Gender </font></label>
                                                </div>
                                                <div class="col-md-10">
                                                  <select class="form-select cbo" name="gendern"  value= "' . $rowed["gendern"] . '" data-placeholder="Select Gendert " disabled > ;';
      echo '<option>' . $rowed["gendern"] . '</option> ';
      $resultg = mysqli_query($link, "SELECT * FROM gender");
      while ($rowg = mysqli_fetch_assoc($resultg)) {
        echo '<option  value="' . $rowg["gender"] . '">' . $rowg["gender"] . ' </option> ';
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
                                                  <select class="form-select cbo" name="civiln" value= "' . $rowed["civiln"] . '" data-placeholder=""  disabled> ;';
      echo '<option>' . $rowed["civiln"] . '</option> ';
      $resultt = mysqli_query($link, "SELECT * FROM tax_status");
      while ($rowtt = mysqli_fetch_assoc($resultt)) {
        echo '<option  value="' . $rowtt["description"] . '">' . $rowtt["description"] . ' </option> ';
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
                                                  <input type="text" name = "cpnum"  value= "' . $rowed["cpnum"] . '" class="form-control"  disabled placeholder="">
                                                </div>
                                              </div>  
                                                                  
                                              <div class="row mt-3" >
                                                <div class="col-md-2">
                                                  <label class="form-label">landline </font></label>
                                                </div>
                                                <div class="col-md-10">
                                                  <input type="text" name = "landline" value= "' . $rowed["landline"] . '" class="form-control"  disabled placeholder="">
                                                </div>
                                              </div>  
                                                
                                              <div class="row mt-3" >
                                                <div class="col-md-2">
                                                  <label class="form-label">Email Address </font></label>
                                                </div>
                                                <div class="col-md-10">
                                                  <input type="text" name = "emailadd" value= "' . $rowed["emailadd"] . '" class="form-control"  disabled placeholder="">
                                                </div>
                                              </div>  
                                                                  
                                              <div class="row mt-3" >
                                                <div class="col-md-2">
                                                  <label class="form-label">Desired Position </font></label>
                                                </div>
                                                                        
                                                <div class="col-md-10">
                                                  <select class="form-select cbo" name="despo"  value= "' . $rowed["despo"] . '" data-placeholder=""  disabled> ;';
      echo '<option>' . $rowed["despo"] . '</option> ';
      $resultjt = mysqli_query($link, "SELECT * FROM job_title ");
      while ($rowjt = mysqli_fetch_assoc($resultjt)) {
        echo '<option  value="' . $rowjt["description"] . '">' . $rowjt["description"] . ' </option> ';
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
                                               <select class="form-select cbo" name="classn"  value= "' . $rowed["classn"] . '" data-placeholder=""  disabled> ;';
      echo '<option>' . $rowed["classn"] . '</option> ';
      $resultca = mysqli_query($link, "SELECT * FROM classifications");
      while ($rowca = mysqli_fetch_assoc($resultca)) {
        echo '<option  value="' . $rowca["description"] . '">' . $rowca["description"] . ' </option> ';
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
                                              <select class="form-select cbo" name="idenn"  value= "' . $rowed["idenn"] . '" data-placeholder="" disabled > ;';
      echo '<option>' . $rowed["idenn"] . '</option> ';
      $resultide = mysqli_query($link, "SELECT * FROM distinguishing_qualification_marks");
      while ($rowider = mysqli_fetch_assoc($resultide)) {
        echo '<option  value="' . $rowider["description"] . '">' . $rowider["description"] . ' </option> ';
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
                                                <input type="text" name = "sssnum" value= "' . $rowed["sssnum"] . '" class="form-control"  disabled>
                                              </div>
                                            </div>
                                                 
                                            <div class="row mt-3" >
                                              <div class="col-md-2">
                                                <label class="form-label">PAG-IBIG:</font></label>
                                              </div>
                                                 
                                              <div class="col-md-10">
                                                <input type="text" name = "pagibignum" value= "' . $rowed["pagibignum"] . '" class="form-control"  disabled>
                                              </div>
                                            </div>
                                                 
                                            <div class="row mt-3" >
                                              <div class="col-md-2">
                                                <label class="form-label">PHILHEALTH:</font></label>
                                              </div>
                                                
                                              <div class="col-md-10">
                                                <input type="text" name = "phnum" value= "' . $rowed["phnum"] . '" class="form-control"  disabled>
                                              </div>
                                            </div>
                                                 
                                            <div class="row mt-3" >
                                              <div class="col-md-2">
                                                <label class="form-label">TIN:</font></label>
                                              </div>
                                                 
                                              <div class="col-md-10">
                                                <input type="text" name = "tinnum" value= "' . $rowed["tinnum"] . '" class="form-control"  disabled>
                                              </div>
                                            </div>
                                                 
                                            <div class="row mt-3" >
                                              <div class="col-md-2">
                                                <label class="form-label">POLICE:</font></label>
                                              </div>
                                                 
                                              <div class="col-md-10">
                                                <input type="date" name = "policed" value= "' . $rowed["policed"] . '" class="form-control"  disabled>
                                              </div>       
                                            </div>
                                                 
                                            <div class="row mt-3" >
                                              <div class="col-md-2">
                                                <label class="form-label">BRGY:</font></label>
                                              </div>
                                                 
                                              <div class="col-md-10">
                                                <input type="date" name = "brgyd" value= "' . $rowed["brgyd"] . '" class="form-control"  disabled>
                                              </div>
                                            </div>
                                                 
                                            <div class="row mt-3" >
                                              <div class="col-md-2">
                                                <label class="form-label">NBI:</font></label>
                                              </div>
                                                 
                                              <div class="col-md-10">
                                                <input type="date" name = "nbid" value= "' . $rowed["nbid"] . '" class="form-control"  disabled>
                                              </div>
                                            </div>
                                                 
                                            <div class="row mt-3" >
                                              <div class="col-md-2">
                                                <label class="form-label">PSA:</font></label>
                                              </div>
                                                 
                                              <div class="col-md-10">
                                                <select class="form-select cbo" name="psa" value= "' . $rowed["psa"] . '"  disabled data-placeholder=""> ;      
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
                                                <input type="text" name = "e_person" value= "' . $rowed["e_person"] . '" class="form-control"  disabled>
                                              </div>     
                                            </div>
                                                 
                                            <div class="row mt-3" >
                                              <div class="col-md-2">
                                                <label class="form-label">Emergency Contact Address:</font></label>
                                              </div>
                                                 
                                              <div class="col-md-10">
                                                <input type="text" name = "e_address" value= "' . $rowed["e_address"] . '" class="form-control"  disabled>
                                              </div>   
                                            </div>
                                                 
                                            <div class="row mt-3" >
                                              <div class="col-md-2">
                                                <label class="form-label">Emergency Contact Number:</font></label>
                                              </div>
                                                 
                                              <div class="col-md-10">
                                                <input type="text" name="e_contact" value= "' . $rowed["e_number"] . '" class="form-control"  disabled>
                                              </div>
                                            </div>
                                                                  
                                            <div class="row mt-3 mb-5">
                                              <div class="col-md-2">
                                                <label class="form-label">REMARKS:</font></label>
                                              </div>
                                            
                                              <div class="col-md-10">
                                                <input type="text" name = "remarks" value= "' . $rowed["remarks"] . '" class="form-control"  disabled>
                                              </div>
                                            </div>
                   
                                           
                                            <a href = "ewb.php" name = "Back" value = "" class="btn btn-info btn-lg mb-5" style="vertical-align:middle">Cancel</a>
                                            
                             </form>
                                                  
                                    </div>
                                  </div> <!-- .content-wrapper -->';
    }
  }



  if (isset($_POST['multipleme'])) {
    echo '
                                <div class="containers">
                                  <div class="">
                <div class = "">
                            <!--- laman -->

<form action = "" method = "POST" class="row">

                <center>
                  <h2 class="fs-2">EWB LISTING</h2>
                 </center>        

<table id="example" class="table table-striped table-sm align-middle mb-0 bg-white p-3 bg-opacity-10 border border-secondary border-start-0 border-end-0 rounded-end mdc-data-table" style="width:100%; font-size: 14px !important;">
                            <thead>
                               <tr>
                                <th></th>
                                <th> Applicant No </th>
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
                                <th> Action </th>

                                 </tr>   
                             </thead>

                            <tbody> 

                ';

    $resultx = mysqli_query($link, "SELECT * FROM employees where actionpoint='EWB' and ewbdeploy='0'");
    while ($rowx = mysqli_fetch_assoc($resultx)) {

      echo ' <tr> ';

      echo '  <td><input type="checkbox" name="check_list[]" value="' . $rowx["appno"] . '"></td> ';
      echo '  <td>  ' . $rowx['appno'] . '   </td> ';
      echo '  <td>  ' . $rowx['lastnameko'] . ", " . $rowx['firstnameko'] . " " . $rowx['mnko'] . '   </td> ';
      echo '  <td> ' . $rowx['sssnum'] . '   </td> ';
      echo '  <td> ' . $rowx['pagibignum'] . '   </td> ';
      echo '  <td> ' . $rowx['phnum'] . '   </td> ';
      echo '  <td> ' . $rowx['tinnum'] . '   </td> ';
      echo '  <td> ' . $rowx['policed'] . '   </td> ';
      echo '  <td> ' . $rowx['brgyd'] . '   </td> ';
      echo '  <td> ' . $rowx['nbid'] . '   </td> ';
      echo '  <td> ' . $rowx['psa'] . '   </td> ';
      echo '  <td> ' . $rowx['birthday'] . '   </td> ';


      echo '<td> 

<input type = "hidden" name = "shadowewb" id = "shadowewb" value = "' . $rowx["appno"] . '">

  <!--<button type="submit" name = "verify1"  class="btn btn-info btnsall" style = "font-size:15;width:100px;height:60px">
                                      <span class="glyphicon glyphicon-edit" >Verify</span>
                                    </button>-->


     ';
      echo '</td>';

      echo ' </tr> 

 ';
    }



    echo ' 
              <div class="col-md-4 col-sm-12 mb-2" >
              <label class="form-label"> Select One </label><br>
                                                     
    <select class="form-select" name="ewbchoiceto1" autofocus required> ';
    echo '<option value="">Select</option> ';


    $resultpro1 = mysqli_query($link, "SELECT * FROM ewb_choices");
    while ($rowpro1 = mysqli_fetch_assoc($resultpro1)) {

      echo '<option  value="' . $rowpro1["description"] . '">' . $rowpro1["description"] . ' </option> 
                                                   
                                                                       ';
    }
    echo '          
                                                           </select> 
               </div>
      <div class="col-sm-12 mt-2">
      <button type="submit" class="btn btn-success btnsall" Name ="processmultiple"><span>Multiple</span></button>
      </div>
      <br><br>
                     </tbody>
                        </table> 

</form>
                               </div>
                            <!--- laman -->
                                  </div>
                                </div> <!-- .content-wrapper -->
                  
                  ';
  }

  if (isset($_POST['report1'])) {
    echo '


<div class="containers">
<div class = "">
<!--- laman -->

                <center>
                                    <h2 class="fs-2">EWB REPORT</h2>
                 </center>        

<table id="example" class="table table-sm align-middle mb-0 bg-white p-3 bg-opacity-10 border border-secondary border-start-0 border-end-0 rounded-end" style="width:100%">
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
                                <th> Birthday </th>
                                <th> EWB Date </th>
                                <th> Shortlist </th>
                                <th> Project </th>

                                 </tr>   
                             </thead>

                            <tbody> 

                ';

    $resultx = mysqli_query($link, "SELECT * FROM employees where actionpoint='EWB' and ewbdeploy!='0'");
    while ($rowx = mysqli_fetch_row($resultx)) {


      $resulty = mysqli_query($link, "SELECT * FROM shortlist_master where  appnumto='$rowx[4]'");
      while ($rowy = mysqli_fetch_row($resulty)) {

        $resultz = mysqli_query($link, "SELECT * FROM shortlist_details where  shortlistname='$rowy[1]'");
        while ($rowz = mysqli_fetch_row($resultz)) {



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
          echo '  <td> ' . $rowx[14] . '   </td> ';
          echo '  <td> ' . $rowx[37] . '   </td> ';
          echo '  <td> ' . $rowy[1] . '   </td> ';
          echo '  <td> ' . $rowz[2] . '   </td> ';



          echo ' </tr> 

 ';
        }
      }
    }



    echo ' 
            

 

                     </tbody>
                        </table> 



<!--- laman -->
</div>
</div> <!-- .content-wrapper -->
                  
                  ';
  }

  if (isset($_POST['report2'])) {
    echo '


<div class="container">
<div class = "how2">
<!--- laman -->

 <form action = "" method = "POST">
                              <button class="btn btn-success btnsall" Name ="" style="float:right;"><span>Close</span></button>
                                  <br><br><br>
                             </form>


                <center>
                                    <h2 class="fs-2">EWB REPORT</h2>
                 </center>        

<table id="example" class="table table-sm align-middle mb-0 bg-white p-3 bg-opacity-10 border border-secondary border-start-0 border-end-0 rounded-end" style="width:100%">
                            <thead>
                              <tr>
                                <th class="text-white"> EWB Date </th>
                                <th class="text-white"> Manpower Count </th>
                              </tr>   
                             </thead>

                            <tbody> 

                ';


    $resultdis = mysqli_query($link, "SELECT ewbdate, count(*) FROM employees where actionpoint='EWB' and ewbdeploy!='0' group by ewbdate asc ");
    while ($rowdis = mysqli_fetch_array($resultdis)) {
      echo ' <tr> ';
      echo '  <td>  ' . $rowdis[0] . '   </td> ';
      echo '  <td>  ' . $rowdis[1] . '   </td> ';
    }
    echo ' </tr> ';






    echo ' 
            

 

                     </tbody>
                        </table> 



<!--- laman -->
</div>
</div> <!-- .content-wrapper -->
                  
                  ';
  }



  ?>

  </main> <!-- .cd-main-content -->
  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>



  <script language="JavaScript">
    $(document).ready(function() {
      $('#example').DataTable();
    });



    function myFunction() {
      var checkBox = document.getElementById("myCheck");
      var text = document.getElementById("text");
      if (checkBox.checked == true) {
        var text = document.getElementById("shadowewb");
        text.style.display = "block";
      } else {
        text.style.display = "none";
      }
    }


    // For Declining of ewb
    $(document).ready(function() {
      $('.decline_ewb').click(function(e) {
        e.preventDefault();

        var decline_ewbID = $(this).closest("tr").find('.decline_ewbID').val();

        Swal.fire({
          title: "Are you sure you want to decline this?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes, decline it!",
          cancelButtonText: "No, cancel",
          showCloseButton: true, // Add a close button

          // Customize the content of the modal
          html: '<input type="text" id="declineReason" placeholder="Enter reason for declining" class="swal2-input">',

          preConfirm: () => {
            // Retrieve the entered reason from the input field
            var reason = document.getElementById("declineReason").value;

            if (!reason) {
              Swal.showValidationMessage("Reason is required");
            }

            // Send the reason along with the AJAX request
            return {
              reason: reason
            };
          }
        }).then((result) => {
          if (result.isConfirmed) {
            var reason = result.value.reason; // Get the reason entered by the user
            if (reason) {
              // Send the reason along with the AJAX request
              $.ajax({
                type: "POST",
                url: "action.php",
                data: {
                  "declined_button": 1,
                  "declinedID": decline_ewbID,
                  "reason": reason, // Include the reason
                },
                success: function(response) {
                  Swal.fire({
                    title: "Successfully Declined!",
                    icon: "success",
                  }).then((result) => {
                    location.reload();
                  });
                },
                error: function(xhr, status, error) {
                  console.log("AJAX Error: " + error);
                }
              });
            }
          }
        });
      });
    });


    // For Verification 
    $(document).ready(function() {
      $('.verify1s').click(function(e) {
        e.preventDefault();

        var verified_id = $(this).closest("tr").find('.verified_id').val();
        Swal.fire({
          title: "Are you sure you want to verify this?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes!",
          cancelButtonText: "No, cancel",
        }).then((willDelete) => {
          if (willDelete.isConfirmed) {
            $.ajax({
              type: "POST",
              url: "action.php",
              data: {
                "verify_button_click": 1,
                "verify_id": verified_id,
              },
              success: function(response) {

                Swal.fire({
                  title: "Successfully Verified!",
                  icon: "success"
                }).then((result) => {
                  location.reload();
                });

              }
            });
          }
        });
      });
    });

    

    // Enabling Tooltips
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
  </script>


</body>

</html>