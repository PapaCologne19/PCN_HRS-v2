<?php
session_start();
include '../../connect.php';
if(isset($_SESSION['username'], $_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    <title>Add to Shortlist</title>

    <style>
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
    <div class="body5010p" id="my_camera" style="z-index: 1;"></div>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include '../components/sidebar.php'; ?>

            <!-- Main page -->
            <div class="layout-page">
                <?php include '../components/navbar.php'; ?>

                <!-- Content -->
                <div class="content-wrapper mt-2">
                    <div class="container">
                        <div class="card">
                            <div class="container">
                                <hr>
                                <div class="title justify-content-center align-items-center mx-auto text-center">
                                    <h4 class="fs-4">
                                        SELECT SHORTLIST TITLE
                                    </h4>
                                </div>
                                <hr>
                                <form action="" method="POST"><br>
                                    <label class="form-label"> Project Title </label>
                                    <center>
                                        <select class="form-select" name="shortlisttitle" required>
                                            <option value="">Select Shortlist Title</option>
                                            <?php
                                            $resultpro = mysqli_query($link, "SELECT * FROM shortlist_details WHERE activity = 'ACTIVE' ORDER BY shortlistname ASC ");
                                            while ($rowpro = mysqli_fetch_assoc($resultpro)) {
                                                echo '<option  value="' . $rowpro['shortlistname'] . '">' . $rowpro['shortlistname'] . '(' . $rowpro['project'] . ') </option>';
                                            ?>
                                            <?php } ?>
                                        </select>
                                    </center>
                                    <div class="modal-footer mt-3">
                                        <input type="submit" name="addapp" value="Okay" class="btn btn-info">
                                    </div>
                                </form>

                                                <br><br><br>
                                <!-- If the button click, show this -->
                                <?php
                                if (isset($_POST['addapp'])) {
                                    $short1 = $_POST['shortlisttitle'];
                                    $_SESSION["data"] = $short1;
                                    $data = $_SESSION["data"];
                                    $view = "Add Applicant to Shortlist (" . $data . ")";
                                ?>
                                    <form action="export_shortlist.php" method="post">
                                        <input type="hidden" name="title" id="" class="form-control" value="<?php echo $data ?>">
                                        <button type="submit" class="btn btn-primary btnsall" name="export_excel" style="float: right;">
                                            <i class="bi bi-cloud-download"></i>&nbsp; Export to Excel</button>
                                    </form>
                                    <hr>
                                    <div class="title justify-content-center align-items-center mx-auto text-center">
                                        <h4 class="fs-4">
                                        <?php echo $view ?>
                                        </h4>
                                    </div>
                                    <hr>
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
                                            <?php
                                            $queryx = "SELECT * FROM employees WHERE is_deleted = '0' AND actionpoint != 'BLACKLISTED'";
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
                                                
                                                // $select = "SELECT * FROM shortlist_master WHERE appnumto = '$appno' AND shortlistnameto = '$data' AND is_deleted = '0'";
                                                // $select_result = $link->query($select);
                                                // while ($select_row = mysqli_fetch_assoc($select_result)) {
                                            ?>

                                                    <tr>
                                                        <td> <?php echo $rowx['lastnameko'] . ", " . $rowx['firstnameko'] . " " . $rowx['mnko'] ?> </td>
                                                        <td> <?php echo $rowx['sssnum'] ?> </td>
                                                        <td> <?php echo $rowx['pagibignum'] ?> </td>
                                                        <td> <?php echo $rowx['phnum'] ?> </td>
                                                        <td> <?php echo $rowx['tinnum'] ?> </td>
                                                        <td> <?php echo $formattedDate_police ?> </td>
                                                        <td> <?php echo $formattedDate_barangay ?> </td>
                                                        <td> <?php echo $formattedDate_nbi ?> </td>
                                                        <td> <?php echo $rowx['psa'] ?> </td>
                                                        <td>
                                                            <input type="hidden" name="shadowd1" class="shadowd1" id="shadowd1" value="<?php echo $rowx['appno'] ?>">
                                                            <input type="hidden" name="shadowd2" value="<?php echo $data ?>">
                                                            <input type="hidden" name="appname88" value="<?php echo $rowx['lastnameko'] . ","  . $rowx['firstnameko'] . " "  . $rowx['mnko'] ?>">

                                                            <button type="button" name="displaymo" class="btn btn-success displaymo" id="displaymo">
                                                                <span class="glyphicon glyphicon-edit"><?php echo $rowx['actionpoint'] ?></span>
                                                            </button>

                                                        </td>

                                                        <?php
                                                        if ($rowx['actionpoint'] == "TERMINATED") { ?>


                                                            <td>
                                                                <form action="" method="POST">
                                                                    <input type="hidden" name="emp_number" class="emp_number" id="emp_number" value="<?php echo $rowx['appno'] ?>">
                                                                    <input type="hidden" name="appname88" class="appname88" id="appname88" value="<?php echo $rowx['lastnameko'] . ', ' . $rowx['firstnameko'] . ' ' . $rowx['mnko'] ?>">
                                                                    <?php
                                                                    $appno = $rowx['appno'];
                                                                    $querycem = "SELECT * FROM shortlist_master where appnumto = '$appno' AND shortlistnameto = '$data' AND is_deleted = '0'";
                                                                    $resultcem = mysqli_query($link, $querycem);
                                                                    $corow = mysqli_num_rows($resultcem); ?>

                                                                    <input type="hidden" name="shad" value="<?php echo $corow ?>">
                                                                    <button type="submit" name="unterminate_me" class="btn btn-default notification unterminate_me" style="font-size:15; box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Unterminate this Applicant"><i class="bi bi-arrow-counterclockwise"></i><span class="badge"><?php echo $corow ?></span></button>
                                                                </form>
                                                            </td>

                                                        <?php } else { ?>
                                                            <td>
                                                                <form action="" method="POST">
                                                                    <input type="hidden" name="app_number" class="app_number" id="app_number" value="<?php echo $rowx['appno'] ?>">
                                                                    <input type="hidden" name="appno_id" class="appno_id" id="appno_id" value="<?php echo $rowx['id'] ?>">
                                                                    <?php
                                                                    $appno = $rowx['appno'];
                                                                    $querycem = "SELECT * FROM shortlist_master where appnumto = '$appno' AND shortlistnameto = '$data' AND is_deleted = '0'";
                                                                    $resultcem = mysqli_query($link, $querycem);
                                                                    $corow = mysqli_num_rows($resultcem); ?>

                                                                    <button type="submit" name="add_shortlist_btn" id="add_shortlist_btn" class="btn btn-default notification add_shortlist_btn" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to shortlist">
                                                                        <i class="bi bi-plus-lg"></i> <span class="badge"><?php echo $corow ?></span>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        <?php
                                                        }
                                                        ?>

                                                    </tr>
                                            <?php
                                                }
                                            // }
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