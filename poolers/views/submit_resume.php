<?php
session_start();
include '../../connect.php';

date_default_timezone_set('Asia/Hong_Kong');
$datenow = date("m/d/Y");

if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>
        <title>Form</title>

        <style>
            .form-control {
                text-transform: uppercase;
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

        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <?php include '../components/sidebar.php'; ?>

                <div class="layout-page">
                    <?php include '../components/navbar.php'; ?>

                    <!-- Content -->
                    <div class="content-wrapper mt-3">
                        <div class="container">
                            <div class="card">
                                <div class="container">
                                    <hr>
                                    <div class="title justify-content-center align-items-center mx-auto text-center">
                                        <h4 class="fs-4">
                                            FORM
                                        </h4>
                                    </div>
                                    <hr>
                                    <form action="action.php" method="post" class="row" enctype="multipart/form-data">
                                        <div class="col-md-7 mt-3">
                                            <label for="lastname" class="form-label">Lastname</label>
                                            <input type="text" name="lastname" id="lastname" class="form-control" required>
                                        </div>
                                        <div class="col-md-7 mt-3">
                                            <label for="firstname" class="form-label">Firstname</label>
                                            <input type="text" name="firstname" id="firstname" class="form-control" required>
                                        </div>
                                        <div class="col-md-7 mt-3">
                                            <label for="middlename" class="form-label">Middlename</label>
                                            <input type="text" name="middlename" id="middlename" class="form-control" required>
                                        </div>
                                        <div class="col-md-7 mt-3">
                                            <label for="extension_name" class="form-label">Extension Name</label>
                                            <input type="text" name="extension_name" id="extension_name" class="form-control">
                                        </div>
                                        <div class="col-md-7 mt-3">
                                            <label for="desired_position" class="form-label">Desired Position</label>
                                            <select name="desired_position" id="desired_position" class="form-select">
                                                <option value="">Select</option>
                                                <?php
                                                $query = "SELECT * FROM job_title WHERE is_deleted = '0'";
                                                $result = $link->query($query);
                                                while ($row = $result->fetch_assoc()) {
                                                ?>
                                                    <option value="<?php echo $row['description'] ?>"><?php echo $row['description'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-7 mt-3">
                                            <label for="area" class="form-label">Area</label>
                                            <input type="text" name="area" id="area" class="form-control" required>
                                        </div>
                                        <div class="col-md-7 mt-3">
                                            <label for="preferred_outlet" class="form-label">Preferred Outlet</label>
                                            <input list="preferred_outlets" name="preferred_outlet" id="preferred_outlet" class="form-control" required>
                                            <datalist id="preferred_outlets">
                                                <option value="Option 1">
                                                <option value="Option 2">
                                                <option value="Option 3">
                                                <option value="Option 4">
                                            </datalist>
                                        </div>

                                        <div class="col-md-7 mt-3">
                                            <label for="contact_number" class="form-label">Contact Number</label>
                                            <input type="text" name="contact_number" id="contact_number" class="form-control" maxlength="11" minlength="11" required>
                                        </div>
                                        <div class="col-md-7 mt-3">
                                            <label for="files" class="form-label">Resume Attachment</label>
                                            <input type="file" name="files[]" id="files" class="form-control" multiple required>
                                        </div>
                                        <div class="col-md-12 mt-5 mb-5">
                                            <button type="submit" class="btn btn-primary" name="submit_btn">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Reset</button>
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
} else {
    $_SESSION['errorMessage'] = "Hacker ka ba?!";
    header('Location: ../../index.php');
    session_destroy();
    exit();
}
?>