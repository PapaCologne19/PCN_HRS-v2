<?php
session_start();
include '../../connect.php';
if(isset($_SESSION['username'], $_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    <title>Remove to Shortlist</title>

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
                                        <select class="form-select" name="shortlisttitle1del" required> ;
                                            <option value="">Select shortlist Name:</option>
                                            <?php
                                            $resultpro = mysqli_query($link, "SELECT * FROM shortlist_details WHERE activity ='ACTIVE' order by shortlistname ASC ");
                                            while ($rowpro = mysqli_fetch_array($resultpro)) {
                                                echo '<option  value="' . $rowpro[1] . '">' . $rowpro[1] . '(' . $rowpro[2] . ') </option> ';
                                            }
                                            ?>
                                        </select>
                                    </center>
                                    <div class="modal-footer mt-3">
                                        <input type="submit" name="addappdel" value="Okay" class="btn btn-info">
                                    </div>
                                </form>
                                            <br><br><br>
                                <!-- If the button click, show this -->
                                <?php
                                if (isset($_POST['addappdel'])) {
                                    $short1 = $_POST['shortlisttitle1del'];
                                    $_SESSION["data"] = $short1;
                                    $data = $_SESSION["data"];
                                    $view = "Applicants Shortlisted on : (" . $data . ")";
                                    $_SESSION["dataexport1"] = $data;
                                ?>
                                    <hr>
                                    <div class="title justify-content-center align-items-center mx-auto text-center">
                                        <h4 class="fs-4">
                                            <?php echo $view ?>
                                        </h4>
                                    </div>
                                    <hr>
                                    <br><br>

                                    <table id="example" class="table" style="width:100%; font-size: 14px !important;">
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
                                            <?php
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
                                                    $formattedDate_nbi = date("F d, Y", $timestamp_nbi); ?>

                                                    <tr>
                                                        <td><?php echo $rowx['id'] ?></td>
                                                        <td><?php echo $rowx['lastnameko'] . ", " . $rowx['firstnameko'] . " " . $rowx['mnko'] ?></td>
                                                        <td><?php echo $rowx['sssnum'] ?></td>
                                                        <td><?php echo $rowx['pagibignum'] ?></td>
                                                        <td><?php echo $rowx['phnum'] ?></td>
                                                        <td><?php echo $rowx['tinnum'] ?></td>
                                                        <td><?php echo $formattedDate_police ?></td>
                                                        <td><?php echo $formattedDate_barangay ?></td>
                                                        <td><?php echo $formattedDate_nbi ?></td>
                                                        <td><?php echo $rowx['psa'] ?></td>
                                                        <td>
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="shadowE1x" value="<?php echo $rowx['appno'] ?>">
                                                                <input type="hidden" name="shadowE1" class="shadowE1" id="shadowE1" value="<?php echo $rowx['appno'] ?>">
                                                                <?php
                                                                $appno = $rowx['appno'];
                                                                $resultcem = mysqli_query($link, "SELECT * FROM shortlist_master where appnumto = '$appno'");
                                                                $corow = mysqli_num_rows($resultcem); ?>

                                                                <input type="hidden" name="shad" class="shad" id="shad" value="<?php echo $corow ?>">
                                                                <button type="submit" name="remove" class="btn btn-default notification remove" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Remove to shortlist">
                                                                    <i class="bi bi-trash"></i> <span class="badge"><?php echo  $corow ?></span>
                                                                </button>
                                                            </form>
                                                        </td>
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
    <?php include '../components/footer.php' ?>
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