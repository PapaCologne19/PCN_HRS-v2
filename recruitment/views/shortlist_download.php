<?php
session_start();
include '../../connect.php';

if(isset($_SESSION['username'], $_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    <title>Shortlist Download</title>
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
    }
    ?>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include '../components/sidebar.php'; ?>

            <!-- Main page -->
            <div class="layout-page">
                <?php include '../components/navbar.php'; ?>

                <!-- Content -->
                <div class="content-wrapper mt-2">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="container-fluid">
                                <hr>
                                <div class="title justify-content-center align-items-center mx-auto text-center">
                                    <h4 class="fs-4">
                                        SELECT SHORTLIST TITLE
                                    </h4>
                                </div>
                                <hr>
                                <form action="" method="POST"><br>
                                    <center>
                                        <select class="form-select" name="shortlisttitle1" required>
                                            <option value="" selected disabled>Select Shortlist Title</option>
                                            <?php
                                            $resultpro = mysqli_query($link, "SELECT * FROM shortlist_details WHERE activity ='ACTIVE' order by shortlistname ASC ");
                                            while ($rowpro = mysqli_fetch_array($resultpro)) {
                                                echo '<option  value="' . $rowpro[1] . '">' . $rowpro[1] . '(' . $rowpro[2] . ') </option> ';
                                            }
                                            ?>
                                        </select>
                                    </center>
                                    <div class="modal-footer">
                                        <input type="submit" name="addappview" value="Okay" class="btn btn-info">
                                    </div>
                                </form>

                                <!-- If button click, show this -->
                                <?php
                                if (isset($_POST['addappview'])) {
                                    $short1 = $_POST['shortlisttitle1'];
                                    $_SESSION["data"] = $short1;
                                    $data = $_SESSION["data"];
                                    $view = "Applicants Shortlisted on <strong>" . $data . "</strong>";
                                ?>
                                    <br>
                                    <br>
                                    <form method="post" action="export1.php">
                                        <?php
                                        $_SESSION["dataexport1"] = $data;
                                        ?>
                                        <input type="submit" name="export" class="btn btn-success btnsall" value="Export" style="float:right;" />
                                    </form>
                                    <br>
                                    <br>
                                    <br>
                                    <hr>
                                    <div class="title justify-content-center align-items-center mx-auto text-center">
                                        <h4 class="fs-4">
                                            <?php echo $view ?>
                                        </h4>
                                    </div>
                                    <hr>
                                    <br>
                                    <br>

                                    <table id="example" class="table" style="width:100%;">
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

                                        <tbody>
                                            <?php
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
                                                    $formattedDate_birthday = date("F d, Y", $timestamp_birthday); ?>

                                                    <tr>
                                                        <td> <?php echo $rowx['id'] ?> </td>
                                                        <td> <?php echo $rowx['lastnameko'] . ", " . $rowx['firstnameko'] . " " . $rowx['mnko'] ?> </td>
                                                        <td> <?php echo $rowx['sssnum'] ?> </td>
                                                        <td> <?php echo $rowx['pagibignum'] ?> </td>
                                                        <td> <?php echo $rowx['phnum'] ?> </td>
                                                        <td> <?php echo $rowx['tinnum'] ?> </td>
                                                        <td> <?php echo $formattedDate_police ?> </td>
                                                        <td> <?php echo $formattedDate_barangay ?> </td>
                                                        <td> <?php echo $formattedDate_nbi ?> </td>
                                                        <td> <?php echo $rowx['psa'] ?> </td>
                                                        <td> <?php echo $formattedDate_birthday ?> </td>
                                                        <td> <?php echo $rowx['peraddress'] ?> </td>
                                                        <td> <?php echo $rowx['actionpoint'] ?> </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../components/footer.php'; ?>
</body>

</html>
<?php 
}
else{
    header("Location: ../../index.php");
    session_destroy();
    exit(0);
}
?>