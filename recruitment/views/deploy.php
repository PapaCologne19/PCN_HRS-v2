<?php
session_start();
include '../../connect.php';
if(isset($_SESSION['username'], $_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    <title>Deploy</title>
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
                                        <select class="form-select" name="shortlisttitle1del" required> ;
                                            <option value="">Select shortlist Name</option>
                                            <?php
                                            $resultpro = mysqli_query($link, "SELECT * FROM shortlist_details WHERE activity = 'ACTIVE' order by shortlistname ASC ");
                                            while ($rowpro = mysqli_fetch_assoc($resultpro)) { ?>
                                                <option value="<?php echo $rowpro["shortlistname"] ?>"><?php echo $rowpro['shortlistname'] . '(' . $rowpro['project'] . ')' ?></option>';
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </center>
                            </div>
                            <div class="modal-footer mt-3">
                                <input type="submit" name="addappdel1" value="Okay" class="btn btn-info">
                            </div>
                            </form>

                            <!-- If the button click, show this -->
                            <?php
                            if (isset($_POST['addappdel1'])) {
                                $short1 = $_POST['shortlisttitle1del'];
                                $_SESSION["data"] = $short1;
                                $_SESSION["account"] = "recruitment";
                                $data = $_SESSION["data"];
                                $view = "Applicants Shortlisted on (" . $data . ")";
                                $_SESSION["dataexport1"] = $data;
                            ?>

                                <div class="modal fade" id="addtoshortlist" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <table class="table" id="myTable" style="width:100%; font-size: 14px !important;">
                                                        <thead class="p-3">
                                                            <tr>
                                                                <th>Select</th>
                                                                <th>ID</th>
                                                                <th>Name</th>
                                                                <th>Birthday</th>
                                                                <th>EWB Status</th>
                                                            </tr>
                                                        </thead> 
                                                        <tbody>
                                                            <tr>
                                                                <?php

                                                                $query_employee = "SELECT * FROM employees";
                                                                $result_employee = $link->query($query_employee);
                                                                while ($row = mysqli_fetch_assoc($result_employee)) {
                                                                    $appno = $row['appno'];
                                                                    $user_id = $row["id"];
                                                                    $birth_date = $row['birthday'];
                                                                    $timestamp_birthdate = strtotime($birth_date);
                                                                    $formattedDate_birthdate = date("F d, Y", $timestamp_birthdate);

                                                                    $query_shortlist_master = "SELECT * FROM shortlist_master WHERE appnumto = '$appno' AND shortlistnameto = '$data'";
                                                                    $result_shortlist_master = $link->query($query_shortlist_master);

                                                                    if (mysqli_num_rows($result_shortlist_master) === 0) {
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
                                                                } ?>
                                                    </table>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="add_to_shortlist" class="btn btn-primary">Add to Shortlist</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <hr>
                                <div class="title justify-content-center align-items-center mx-auto text-center">
                                    <h4 class="fs-4">
                                        <?php echo $view ?>
                                    </h4>
                                </div>
                                <hr>

                                <div class="col-md-6 mb-5">
                                    <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#addtoshortlist" style="float: left !important;"><i class="bi bi-plus-circle-fill"></i> &nbsp;Add shortlist</button>
                                </div>
                                <br>
                                <table id="example" class="table " style="width:100%;font-size:14 !important;">
                                    <thead>
                                        <tr>
                                            <th> ID </th>
                                            <th> Name </th>
                                            <th> SSS </th>
                                            <th> Pag-ibig </th>
                                            <th> Philhealth </th>
                                            <th> TIN </th>
                                            <th> PSA </th>
                                            <th> STATUS </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php

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
                                                if ($rowx['actionpoint'] == "DEPLOYED") { ?>
                                                    <tr>
                                                        <td> <?php echo $rowx['id'] ?> </td>
                                                        <td> <?php echo $rowx['lastnameko'] . ", " . $rowx['firstnameko'] . " " . $rowx['mnko'] ?> </td>
                                                        <td> <?php echo $rowx['sssnum'] ?> </td>
                                                        <td> <?php echo $rowx["pagibignum"] ?> </td>
                                                        <td> <?php echo $rowx["phnum"] ?> </td>
                                                        <td> <?php echo $rowx["tinnum"] ?> </td>
                                                        <td> <?php echo $rowx["psa"] ?> </td>
                                                        <td> <?php echo $rowx["ewb_status"] ?> </td>
                                                        <td>

                                                            <form action="" method="POST">
                                                                <input type="hidden" name="shadowE1x" value="<?php echo $rowx["appno"] ?>">
                                                                <input type="hidden" name="shadowE1" value="<?php echo $rowx["appno"] ?>">
                                                                <?php
                                                                $appno = $rowx["appno"];
                                                                $resultcem = mysqli_query($link, "SELECT * FROM shortlist_master where appnumto = '$appno'");
                                                                $corow = mysqli_num_rows($resultcem); ?>
                                                                <input type="hidden" name="shad" value="<?php echo $corow ?>">

                                                                <button type="submit" name="addtoewb" class="btn btn-info notification mt-1 mb-1 addtoewb" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Deploy">
                                                                    <i class="bi bi-layer-forward"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php
                                                } else { ?>
                                                    <tr>
                                                        <td><?php echo $rowx['id'] ?> </td>
                                                        <td> <?php echo $rowx['lastnameko'] . ", " . $rowx['firstnameko'] . " " . $rowx['mnko'] ?> </td>
                                                        <td><?php echo $rowx['sssnum'] ?> </td>
                                                        <td><?php echo $rowx["pagibignum"] ?> </td>
                                                        <td><?php echo $rowx["phnum"] ?> </td>
                                                        <td><?php echo $rowx["tinnum"] ?> </td>
                                                        <td><?php echo $rowx["psa"] ?> </td>
                                                        <td><?php echo $rowx["ewb_status"] ?> </td>
                                                        <td>

                                                            <form action="" method="POST">
                                                                <input type="hidden" name="shadowE1x" value="<?php echo $rowx["appno"] ?>">
                                                                <input type="hidden" name="appno_deploy" class="appno_deploy" id="appno_deploy" value="<?php echo $rowx["appno"] ?>">
                                                                <?php
                                                                $appno = $rowx["appno"];
                                                                $resultcem = mysqli_query($link, "SELECT * FROM shortlist_master where appnumto = '$appno'");
                                                                $corow = mysqli_num_rows($resultcem);
                                                                ?>
                                                                <input type="hidden" name="shad" value="<?php echo $corow ?>">
                                                                <?php
                                                                if ($rowx['ewb_status'] === 'VERIFIED') { ?>

                                                                    <button type="submit" name="addtoewb" class="btn btn-default notification mt-1 mb-1 addtoewb" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Deploy" style="visibility: hidden !important;">
                                                                        <i class="bi bi-layer-forward"></i>
                                                                    </button>
                                                                <?php } else { ?>

                                                                    <button type="submit" name="addtoewb" class="btn btn-default notification mt-1 mb-1 addtoewb" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Deploy">
                                                                        <i class="bi bi-layer-forward"></i>
                                                                    </button>
                                                                <?php } ?>
                                                            </form>
                                                        </td>
                                                    <?php } ?>
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