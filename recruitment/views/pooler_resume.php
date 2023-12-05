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

            .swal2-select {
                padding: 10px;
                /* Add padding for better appearance */
                font-size: 16px;
                /* Set the font size */
                border: 1px solid #ccc;
                /* Add a border */
                border-radius: 5px;
                /* Add border-radius for rounded corners */
                box-sizing: border-box;
                /* Include padding and border in the total width/height */
            }
            .swal2-select:focus{
                border: 1px solid #ccc;
            }

            /* Style the options in the dropdown */
            .swal2-select option {
                background-color: #fff;
                /* Set background color for options */
                color: #333;
                /* Set text color for options */
                font-size: 16px;
                /* Set font size for options */
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT *, DATE_FORMAT(date_added, '%M %d, %Y') AS date_added 
                                                FROM applicant_referral 
                                                WHERE is_deleted = '0' 
                                                AND (status = 'FOR SCREENING'
                                                OR status = 'PASSED')
                                                AND referred_by_division = '" . $_SESSION['division'] . "'";
                                            $result = $link->query($query);
                                            while ($row = $result->fetch_assoc()) {
                                                $fileNames = explode(',', $row['resume_file']);
                                                $path = $row['resume_location'] . "/" . $row['resume_file'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['date_added']; ?></td>
                                                    <td><?php echo $row['lastname'] . ", " . $row['firstname'] . " " . $row['middlename'] . " " . $row['extension_name']; ?></td>
                                                    <td><?php echo $row['desired_position']; ?></td>
                                                    <td><?php echo $row['area']; ?></td>
                                                    <td><?php echo $row['preferred_outlet']; ?></td>
                                                    <td><?php echo $row['contact_number']; ?></td>
                                                    <td>
                                                        <?php
                                                        foreach ($fileNames as $fileName) {
                                                            echo '<a href="' . $row['resume_location'] . '/' . $fileName . '" download>' . $fileName . '</a><br>';
                                                        };
                                                        ?>
                                                    </td>
                                                    <td><?php echo $row['status']; ?></td>
                                                    <td>
                                                        <div class="contain">
                                                            <input type="hidden" name="id" id="id" class="poolID" value="<?php echo $row['id'] ?>">
                                                            <?php
                                                            if ($row['status'] === "FOR SCREENING") {
                                                            ?>
                                                                <div class="column">
                                                                    <button type="button" class="btn btn-primary btn-sm passPoolBtn">Pass</button>
                                                                </div>
                                                            <?php } elseif ($row['status'] === "PASSED") { ?>
                                                                <div class="column">
                                                                    <button type="button" class="btn btn-primary btn-sm deployPoolBtn">Deploy</button>
                                                                </div>
                                                            <?php } ?>
                                                            <div class="column">
                                                                <button type="button" class="btn btn-danger btn-sm failedPoolBtn">Failed</button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
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