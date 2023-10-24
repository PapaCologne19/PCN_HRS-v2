<?php
session_start();
include("connect.php");

date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y');


if (isset($_POST['SubButton'])) {
  $Username = mysqli_real_escape_string($link, $_POST['Username']);
  $Password = mysqli_real_escape_string($link, $_POST['Password']);
  $Usert1 = "ADMIN";

  if (strlen($Username) == 0 || strlen($Password) == 0) {
    $_SESSION['errorMessage'] = "Invalid Input";
  }

  $query = "SELECT * FROM data WHERE uname = '$Username' AND pname = '$Password' ";
  $result = mysqli_query($link, $query);

  if (mysqli_num_rows($result) === 0) {
    $_SESSION['errorMessage'] = "No Such User Here!";
  } 
  else {
    $query1 = "SELECT * FROM data WHERE uname = '$Username' and pname = '$Password' and approve = '1'";
    $result1 = mysqli_query($link, $query1);
    while ($rowd = mysqli_fetch_assoc($result1))

      if ($rowd["typenya"] == "EWB") {

        $_SESSION["dmark"] = $rowd["uname"];
        $_SESSION["firstname"] = $rowd["firstname"];
        $_SESSION["lastname"] = $rowd['lastname'];
        $_SESSION["dmark1"] = $rowd["uname"] . $rowd["pname"];
        $_SESSION["darkk"] = "ewb";
        $_SESSION["dept"] = $rowd["fms"];
        $_SESSION["data"] = $rowd["id"];

        $dtnow = date("m/d/Y");

        $query3 = "INSERT INTO log (Username, Datelog, time, activitynya) VALUES('$Username','$dtnow',now(),'EWB login Accepted')";
        $result3 = mysqli_query($link, $query3);

        if($result3){
          $_SESSION[] = "Successfully Login";
          header("location:ewb.php");
        }
        else{
          $_SESSION["errorMessage"] = "Error Login";
        }
      } else if ($rowd["typenya"] == "DEPLOYMENT") {

        $_SESSION["dmark"] = $rowd["uname"];
        $_SESSION["firstname"] = $rowd["firstname"];
        $_SESSION["lastname"] = $rowd['lastname'];
        $_SESSION["dmark1"] = $rowd["uname"] . $rowd["pname"];
        $_SESSION["darkk"] = "deployment";
        $_SESSION["dept"] = $rowd["fms"];
        $_SESSION["data"] = $rowd["id"];

        $dtnow = date("m/d/Y");

        $query4 = "INSERT INTO log (Username, Datelog, time, activitynya) VALUES('$Username','$dtnow',now(),'DEPLOYMENT login Accepted')";
        $result4  = mysqli_query($link, $query4);

        if($result4){
          $_SESSION[] = "Successfully Login";
          header("location:deployment.php");
        }
        else{
          $_SESSION["errorMessage"] = "Error Login";
        }
      } else	if ($rowd["typenya"] === "RECRUITMENT") {

        $_SESSION["firstname"] = $rowd["firstname"];
        $_SESSION["lastname"] = $rowd['lastname'];
        $_SESSION["username"] = $rowd["uname"];
        $_SESSION["password"] =  $rowd["pname"];
        $_SESSION["data"] = $rowd["id"];

        $dtnow = date("m/d/Y");

        $query5 = "INSERT INTO log(Username, Datelog, time, activitynya) VALUES('$Username', '$dtnow', now(), 'RECRUITMENT login Accepted')";
        $result5 = mysqli_query($link, $query5);

        if ($result5) {
          $_SESSION['successMessage'] = "Successfully Login";
          $message = $_SESSION['successMessage'];
          header("Location: recruitment.php?$message");
        } else {
          $_SESSION['errorMessage'] = "Error Login";
        }
      } else if ($rowd["typenya"] == "MRF") {

        $_SESSION["username"] = $rowd["uname"];
        $_SESSION["password"] = $rowd["pname"];
        $_SESSION["firstname"] = $rowd["firstname"];
        $_SESSION["lastname"] = $rowd['lastname'];
        $_SESSION["dmark1"] = $rowd["uname"] . $rowd["pname"];
        $_SESSION["darkk"] = "mrf";
        $_SESSION["dept"] = $rowd["fms"];
        $_SESSION["id"] = $rowd["id"];

        $dtnow = date("m/d/Y");

        $query5 = "INSERT INTO log(Username, Datelog, time, activitynya) VALUES('$Username', '$dtnow', now(),'MRF login Accepted')";
        $result5 = mysqli_query($link, $query5);

        if($result5){
          $_SESSION['successMessage'] = "Successfully Login";
          header("location: mrf/index.php");
        }
        else{
          $_SESSION["errorMessage"] = "Error Login";
        }
      } else if ($rowd["typenya"] == "CASHIER") {

        $_SESSION["dmark"] = $rowd[1];
        $_SESSION["dmark1"] = $rowd["typenya"];
        $_SESSION["darkk"] = "Cashier";
        $_SESSION["data"] = $rowd["id"];
        $dtnow = date("m/d/Y");

        $query6 = "INSERT INTO log(Username, Datelog, time, activitynya) VALUES('$Username', '$dtnow', now(),'Cashier login Accepted')";
        $result6 = mysqli_query($link, $query6);

        if($result6){
          $_SESSION['successMessage'] = "Successfully Login";
          header("location:cashier.php");
        }
        else{
          $_SESSION["errorMessage"] = "Error Login";
        }
      } else if ($rowd["typenya"] == "REPORT") {

        $_SESSION["dmark"] = $rowd[1];
        $_SESSION["firstname"] = $rowd["firstname"];
        $_SESSION["lastname"] = $rowd['lastname'];
        $_SESSION["dmark1"] = $rowd["typenya"];
        $_SESSION["darkk"] = "report";
        $_SESSION["dept"] = "Report";
        $_SESSION["data"] = $rowd["id"];

        $dtnow = date("m/d/Y");

        $query7 = "INSERT INTO log(Username, Datelog, time, activitynya) VALUES('$Username', '$dtnow', now(),'report log in identified')";
        $result7 = mysqli_query($link, $query7);

        if($result7){
          $_SESSION['successMessage'] = "Successfully Login";
          header("location:report.php");
        }
        else{
          $_SESSION["errorMessage"] = "Error Login";
        }
      } else if ($rowd["typenya"] == "ADMIN") {
        $_SESSION["dmark"] = $rowd[1];
        $_SESSION["firstname"] = $rowd["firstname"];
        $_SESSION["lastname"] = $rowd['lastname'];
        $_SESSION["dmark1"] = $rowd["typenya"];
        $_SESSION["data"] = $rowd["id"];
        $_SESSION["darkk"] = "green";
        //log control
        $dtnow = date("m/d/Y");

        $query8 = "INSERT INTO log(Username, Datelog, time, activitynya) VALUES('$Username', '$dtnow', now(), 'Admin login Accepted')";
        $result8 = mysqli_query($link, $query8);

        if($result8){
          $_SESSION['successMessage'] = "Successfully Login";
          header("Location: adminfinal.php");
        }
        else{
          $_SESSION["errorMessage"] = "Error Login";
        }
      } else if ($rowd["typenya"] == "OTHERS") {
        $_SESSION["dmark"] = $rowd[1];
        $_SESSION["firstname"] = $rowd["firstname"];
        $_SESSION["lastname"] = $rowd['lastname'];
        $_SESSION["dmark1"] = $rowd[3] . $rowd[4];
        $_SESSION["data"] = $rowd["id"];

        $dtnow = date("m/d/Y");

        $query9 = "INSERT INTO log(Username, Datelog, time, activitynya) VALUES('$Username', '$dtnow', now(), 'OTHERS login Accepted')";
        $result9 = mysqli_query($link, $query9);

        if($result9){
          $_SESSION['successMessage'] = "Successfully Login";
          header("location:declaration.php");
        }
        else{
          $_SESSION["errorMessage"] = "Error Login";
        }
      } else if ($resultsss = mysqli_query($link, "SELECT * FROM data WHERE uname = '$Username' AND pname = '$Password' AND approve = '0'")); {
        $_SESSION['errorMessage'] = "User not allowed by MIS, Please notify Mike or Deo";
    }
  }
}

if (isset($_POST['next1'])) {
  header("location:index.php");
}

if (isset($_POST['SavenewUser1'])) {

  $lastname = strtoupper($_POST['lastnameko']);
  $firstname = strtoupper($_POST['firstnameko']);
  $mi = strtoupper($_POST['miko']);
  $contactno = $_POST['contactno'];
  $email1 = $_POST['email'];
  $fms = $_POST['fmsname'];
  $uname = $_POST['uname'];
  $pname = $_POST['pname'];
  $idno = $_POST['idnoko'];

  if (strlen($lastname) == 0 || strlen($firstname) == 0 || strlen($contactno) == 0 || $fms == "Select FMS Name" || strlen($uname) == 0 || strlen($pname) == 0) {
    $_SESSION['errorMessage'] = "All Fields are required. Try Again !";
  } else {

    //check if username exist na
    $query10 = "select * from data WHERE uname = '$uname' ";
    $result = mysqli_query($link, $query10);

    if (mysqli_num_rows($result) == 0) {
      $query11 = "INSERT INTO data(lastname,firstname,mi,contactno,emailadd,fms,uname,pname,typenya,approve,idnum) VALUES('$lastname','$firstname','$mi','$contactno','email','$fms','$uname','$pname','DISER','0','$idno')";
      mysqli_query($link, $query11);

      $fmsnamelog = $lastname . ", " . $firstname . " " . $mi;
      $dtnow = date("m/d/Y");

      $query12 = "INSERT INTO log(Username,Datelog,time,activitynya) VALUES('$fmsnamelog','$dtnow',now(),'Account Created')";
      mysqli_query($link, $query12);

      $_SESSION['successMessage'] = "Save Successful!";
    } else {
      $_SESSION['errorMessage'] = "username already taken! Try Again";
    }
  }
}
?>
<html>


<head>

  <title>Welcome</title>
  <meta charset="utf-8">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="deo1.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Julius+Sans+One&family=Poppins&family=Quicksand&family=Roboto&family=Thasadith&display=swap" rel="stylesheet">


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style type="text/css">
    * {
      font-family: 'Inter', sans-serif;
    }
    .username::placeholder, .password::placeholder{
      color: white !important;
    }
  </style>

</head>

<body onload="myFunction()" style="background-image: url(bg3a.jpg); background-size:100% 100%; background-repeat: no-repeat;">

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
  if (isset($_SESSION['warningMessage'])) { ?>
    <script>
      Swal.fire({
        icon: 'warning',
        title: "<?php echo $_SESSION['warningMessage']; ?>",
      })
    </script>
  <?php unset($_SESSION['warningMessage']);
  } ?>



  <div id="wrapper" class="wrapper">
    <div id="loader"></div>
  </div>

  <div class="login">

    <br>
    <h2>
      <font color="white">LOG IN</font>
    </h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">

      <div class="form-group mt-3">
        <label class="form-label">
          <font color="white">Username</font>
        </label>
        <input type="username" name="Username" class="form-control username" placeholder="Please enter username" style="height:45px;width:250px;background: #445793 !important; color: white !important; " autofocus>
      </div>
      

      <div class="form-group mt-4 mb-4">
        <label class="form-label">
          <font color="white">Password</font>
        </label>
        <input type="password" name="Password" class="form-control password" placeholder="Please enter password" style="height:45px;width:250px;background: #445793 !important; color: white !important; ">
      </div>
      <input type="submit" name="SubButton" value=" " class="loginButton">;
    </form>

    <br><br><br>
    <div class="container signin">
    </div>
  </div>

  <form action="" method="POST">
    <!--  Modal -->
    <div class="modal fade" id="Modaladduser" role="dialog">
      <div class="modal-dialog modal-med"> <!--//sm,med, lg , xl-->
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add New User</h4>
          </div>

          <div class="modal-body">
            <center>
              <form action="" method="POST">
                <div class="form-group">
                  <label for="email">Id Number:</font></label>
                  <input type="username" name="idnoko" class="form-control" placeholder="ID Number" style="height:45px;width:250px;">
                </div>

                <div class="form-group">
                  <label for="email">Last Name:</font></label>
                  <input type="username" name="lastnameko" class="form-control" placeholder="Last name" style="height:45px;width:250px;">
                </div>

                <div class="form-group">
                  <label for="email">First Name:</font></label>
                  <input type="username" name="firstnameko" class="form-control" placeholder="First name" style="height:45px;width:250px;">
                </div>

                <div class="form-group">
                  <label for="email">Middle Name:</font></label>
                  <input type="username" name="miko" class="form-control" placeholder="Middle Initial" style="height:45px;width:250px;">
                </div>

                <div class="form-group">
                  <label for="email">Contact Number:</font></label>
                  <input type="username" name="contactno" maxlength="11" class="form-control" placeholder="Contact Number" style="height:45px;width:250px;">
                </div>

                <div class="form-group">
                  <label for="pwd">* Division :</font></label>
                  <select class="form-control cbo" name="fmsname" data-placeholder="Select User type" style="height:45px;width:250px"> ;

                    <?php echo '<option >Select Division Name</option> ';
                    $query13 = "SELECT * FROM divisionnya";
                    $resultpop1 = mysqli_query($link, $query13);
                    while ($rowm1 = mysqli_fetch_array($resultpop1)) {
                      echo '<option  value=' . $rowm1[1] . '>' . $rowm1[1] . ' </option> "';
                    }
                    ?>
                  </select>
                </div>

                <br>
                <div class="form-group">
                  <label for="email">Preferred Username:</font></label>
                  <input type="text" name="uname" id="uname" class="form-control" placeholder="User Name" style="height:45px;width:250px;">

                </div>

                <div class="form-group">
                  <label for="email">Preferred Password:</font></label>
                  <input type="password" name="pname" id="pnameiddiser" class="form-control" placeholder="Password" style="height:45px;width:250px;">

                </div>
                <div class="checkbox">
                  <label><input type="checkbox" id="myCheck" onclick="myFunctiondiser()">Show Password</font></label>
                </div>
              </form>
            </center>
          </div>

          <div class="modal-footer">
            <input type="submit" name="SavenewUser1" value="Save" class="btn btn-info btn-lg" style="height:50px;width:100px;">
            <input type="submit" name="Cancelko" value="Cancel" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
          </div>

        </div>
      </div>
    </div>
    </div>
  </form>
  </div>

  <script type="text/javascript">
    function myFunctiondiser() {
      var x = document.getElementById("pnameiddiser");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>

  <script>
    document.getElementById("myFrame").onload = function() {
      myFunction()
    };
    var myVar;

    function myFunction() {
      document.getElementById("loader").style.display = "none";
      document.getElementById("wrapper").style.display = "none";

    }
  </script>