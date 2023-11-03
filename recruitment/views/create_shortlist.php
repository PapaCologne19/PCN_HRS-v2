<?php
session_start();
include '../../connect.php';
if(isset($_SESSION['username'], $_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    <title>Create Shortlist Title</title>
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
                                        CREATE SHORTLIST TITLE
                                    </h4>
                                </div>
                                <hr>
                                <form action="action.php" method="POST"><br>
                                    <div class="row">
                                        <label class="form-label"> Project Title </label>
                                        <select class="form-select" name="projecttitle" required>
                                            <option value="" selected disabled>Select Project</option>
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
                                    <div class="mt-5 mb-4">
                                        <input type="submit" name="createshortlist" value="Create Shortlist" class="btn btn-info">
                                    </div>
                                </form>
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