<?php
session_start();
include '../../connect.php';
if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>
        <title>List of Employees</title>

        <style>
            .contain {
                display: grid;
                grid-template-columns: 0fr 0fr;
                grid-template-rows: 0fr 0fr;
                gap: 5px;
                margin: 0 auto;
            }

            .columns {
                box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
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
                    <div class="content-wrapper mt-1">
                        <div class="container">
                            <div class="card">
                                <div class="container">
                                    <hr>
                                    <div class="title justify-content-center align-items-center mx-auto text-center">
                                        <h4 class="fs-4">
                                            List of Employees
                                        </h4>
                                    </div>
                                    <hr>
                                    <table id="example" class="table" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>App No. </th>
                                                <th>Employee Name </th>
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
                                            $resultx = mysqli_query($link, "SELECT *, DATE_FORMAT(birthday, '%M %d %Y') AS birthday FROM employees WHERE actionpoint <> 'BLACKLISTED' AND actionpoint <> 'REJECTED' AND actionpoint <> 'CANCELED' AND is_deleted <> '1'");
                                            while ($rowx = mysqli_fetch_assoc($resultx)) { ?>
                                                <tr>
                                                    <td> <?php echo $rowx['id'] ?> </td>
                                                    <td> <?php echo $rowx['appno'] ?> </td>
                                                    <td> <?php echo $rowx['lastnameko'] . ", " . $rowx['firstnameko'] . " " . $rowx['mnko'] ?> </td>
                                                    <td> <?php echo $rowx['emailadd'] ?> </td>
                                                    <td> <?php echo $rowx['cpnum'] ?> </td>
                                                    <td> <?php echo $rowx['birthday'] ?> </td>
                                                    <td> <?php echo $rowx['peraddress'] ?> </td>
                                                    <td class="badge bg-success rounded-pill p-2 text-white"><?php echo $rowx['actionpoint']; ?></td>
                                                    <td>
                                                        <div class="contain">
                                                            <div class="columns">
                                                                <a href="update_applicants.php?id=<?php echo $rowx['id'] ?>" name="Editbtn" class="btn btn-default" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Applicant">
                                                                    <i class="bi bi-pencil-square"></i>
                                                                </a>
                                                            </div>

                                                            <div class="columns">
                                                                <input type="hidden" name="blackbtnID" class="blackbtnID" value="<?php echo $rowx['id'] ?>">
                                                                <button type="button" name="blackbtn" class="btn btn-default blackbtn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Blacklist">
                                                                    <i class="bi bi-person-fill-x"></i>
                                                                </button>
                                                            </div>

                                                            <div class="columns">
                                                                <input type="hidden" name="deleteID" class="deleteID" value="<?php echo $rowx['id'] ?>">
                                                                <button type="button" name="deletebtn" class="btn btn-default deletebtn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Applicant">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                            </div>

                                                            <div class="columns">
                                                                <input type="hidden" name="downloadinfoID" class="downloadinfoID" value="<?php echo $rowx['id'] ?>">
                                                                <a href="export_applicant.php?id=<?php echo $rowx['id'] ?>" name="downloadinfobtn" class="btn btn-default downloadinfobtn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Download Applicant Information">
                                                                    <i class="bi bi-download"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                    </table>
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
    header("Location: ../../index.php");
    session_destroy();
    exit(0);
}
?>