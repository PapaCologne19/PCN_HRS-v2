<?php
include 'connect.php';
session_start();

date_default_timezone_set('Asia/Hong_Kong');
$datenow = date("m/d/Y");

if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>
        <title>MRF List</title>

        <style>
            * {
                font-family: 'Inter', sans-serif;
            }

            .form-check-label,
            .form-control {
                font-size: 13px;
            }

            .indent {
                text-decoration: underline;
                color: #3876BF;
                font-weight: bold;
            }

            .icon:hover {
                color: red;
            }

            .form-check-input {
                pointer-events: none;
            }

            .contain {
                display: grid;
                grid-template-columns: 0fr 0fr;
                grid-template-rows: 0fr 0fr;
                gap: 5px;
                margin: 0 auto;
            }

            .columns .btn {
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
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <?php include '../components/sidebar.php'; ?>

                <div class="layout-page">
                    <?php include '../components/navbar.php'; ?>

                    <!-- Content -->
                    <div class="content-wrapper mt-3">
                        <div class="container">
                            <div class="card">
                                <hr>
                                <div class="title justify-content-center align-items-center mx-auto">
                                    <h4 class="fs-4">
                                        LOA REQUESTS
                                    </h4>
                                </div>
                                <hr>
                                <table class="table" id="example" style="width: 100%; font-size: 15px !important; ">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Date Requested</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">Division</th>
                                            <th class="text-center">Project Title</th>
                                            <th class="text-center">Request Status</th>
                                            <th class="text-center">Requested By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT employee.*, project.*, request.* 
                                        FROM employees employee, projects project, loa_requests request
                                        WHERE employee.id = request.employee_id
                                        AND project.id = request.project_id";
                                        $result = $link->query($query);
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo $row['date_requested'] ?></td>
                                                <td class="text-center"><?php echo $row['lastnameko'] . ", " . $row['firstnameko'] . " " . $row['mnko'] . " " . $row['extnname'] ?></td>
                                                <td class="text-center"><?php echo $row['category'] ?></td>
                                                <td class="text-center"><?php echo $row['division'] ?></td>
                                                <td class="text-center"><?php echo $row['project_title'] ?></td>
                                                <td class="text-center">
                                                    <?php
                                                    if ($row['request_status'] === "PENDING") {
                                                    ?>
                                                        <span class="badge rounded bg-warning"><?php echo $row['request_status'] ?></span>
                                                    <?php } elseif ($row['request_status'] === "DEPLOYED") { ?>
                                                        <span class="badge rounded bg-success"><?php echo $row['request_status'] ?></span>
                                                    <?php } elseif ($row['request_status'] === "REJECTED") { ?>
                                                        <span class="badge rounded bg-danger"><?php echo $row['request_status'] ?></span>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center"><?php echo $row['requested_by'] ?></td>
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
        <?php include '../components/footer.php'; ?>
    </body>

    </html>
<?php
} else {
    header('Location: ../../index.php');
    session_destroy();
    exit();
}
?>