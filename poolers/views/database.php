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
                                <div class="container table-responsive">
                                    <hr>
                                    <div class="title justify-content-center align-items-center mx-auto text-center">
                                        <h4 class="fs-4">
                                            FORM
                                        </h4>
                                    </div>
                                    <hr>
                                    <table class="table" id="example">
                                        <thead>
                                            <tr>
                                                <th>Date Added</th>
                                                <th>Name</th>
                                                <th>Desired Position</th>
                                                <th>Area</th>
                                                <th>Preferred Outlet</th>
                                                <th>Contact Number</th>
                                                <th>Resume File</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $query = "SELECT *, DATE_FORMAT(date_added, '%M %d, %Y') AS date_added 
                                                FROM applicant_referral 
                                                WHERE is_deleted = '0' 
                                                AND referred_by_id = '" . $_SESSION['user_id'] . "'";
                                                $result = $link->query($query);
                                                while($row = $result->fetch_assoc()){
                                                    $fileNames = explode(',', $row['resume_file']);
                                                    $path = $row['resume_location'] . "/" . $row['resume_file'];
                                            ?>
                                            <tr>
                                                <td><?php echo $row['date_added'];?></td>
                                                <td><?php echo $row['lastname'] . ", " . $row['firstname'] . " " . $row['middlename'] . " " . $row['extension_name'];?></td>
                                                <td><?php echo $row['desired_position'];?></td>
                                                <td><?php echo $row['area'];?></td>
                                                <td><?php echo $row['preferred_outlet'];?></td>
                                                <td><?php echo $row['contact_number'];?></td>
                                                <td>
                                                    <?php 
                                                        foreach ($fileNames as $fileName) {
                                                            echo '<a href="' . $row['resume_location'] . '/' . $fileName . '" download>' . $fileName . '</a><br>';
                                                        };
                                                    ?>
                                                </td>
                                                <td><?php echo $row['status'];?></td>
                                            </tr>
                                            <?php }?>
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
    $_SESSION['errorMessage'] = "Hacker ka ba?!";
    header('Location: ../../index.php');
    session_destroy();
    exit();
}
?>