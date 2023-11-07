<?php
session_start();
include '../../connect.php';

if (isset($_POST['printapp'])) {
    $appnoto = $_POST['applicant_no'];

    $_SESSION["appnoto"] = $appnoto;

    header("location: printapp.php");
}
if(isset($_SESSION['username'], $_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    <title>Print an Entry</title>
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
                                            PRINT AN ENTRY
                                        </h4>
                                    </div>
                                    <hr>
                                <form action="" method="POST"><br>
                                    <label class="form-label"> Shortlist Name</label>
                                    <center>
                                        <select class="form-select" name="applicant_no" required>
                                            <option value="">Select shortlist Name</option>
                                            <?php
                                            $resultpro = mysqli_query($link, "SELECT * FROM employees WHERE actionpoint !='BLACKLISTED' OR actionpoint !='DEPLOYED' order by lastnameko ASC ");
                                            while ($rowpro = mysqli_fetch_array($resultpro)) {
                                                echo '<option  value="' . $rowpro[4] . '">' . $rowpro[6] . ", " . $rowpro[7] . " " . $rowpro[8] . ' </option>';
                                            }
                                            ?>
                                        </select>
                                    </center>
                                    <div class="col-md-12 mt-3 mb-3">
                                        <input type="submit" name="printapp" value="Okay" class="btn btn-info">
                                    </div>
                                </form>


                                <!-- If already selected, show this  -->
                            </div>
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