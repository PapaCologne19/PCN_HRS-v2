<?php
session_start();
include '../../connect.php';

if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>
        <title>Document</title>

        <style>
            .form-control {
                pointer-events: none !important;
                border-top: none !important;
                border-left: none !important;
                border-right: none !important;
                border-radius: 0;
            }
        </style>
    </head>

    <body>
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <?php include '../components/sidebar.php'; ?>

                <!-- Main page -->
                <div class="layout-page">
                    <?php include '../components/navbar.php'; ?>

                    <!-- Content -->
                    <div class="content-wrapper">
                        <div class="container">
                            <div class="card">
                                <div class="container">
                                    <hr>
                                    <div class="title justify-content-center align-items-center mx-auto text-center">
                                        <h4 class="fs-4">
                                            Employee History
                                        </h4>
                                    </div>
                                    <hr>
                                    <table class="table" id="example">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Updated By</th>
                                                <th>Date Updated</th>
                                                <th>Remarks</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT *,
                                            DATE_FORMAT(date_update, '%M %d, %Y - %h:%i %p') AS date_update
                                            FROM employee_update_history";
                                            $result = $link->query($query);
                                            while ($row = $result->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['id'] ?></td>
                                                    <td><?php echo $row['fullname'] ?></td>
                                                    <td><?php echo $row['updated_by'] ?></td>
                                                    <td><?php echo $row['date_update'] ?></td>
                                                    <td><?php echo $row['remarks'] ?></td>
                                                    <td>
                                                        <!-- If not deleted -->
                                                        <?php
                                                        if ($row['is_deleted'] === '0') {
                                                        ?>
                                                            <button type="button" class="btn btn-info  btn-sm  btntooltips" data-bs-toggle="modal" data-bs-target="#viewDetails-<?php echo $row['id'] ?>" title="View"><i class="bi bi-eye"></i></button>
                                                            <input type="hidden" class="deletedHistoryID" value="<?php echo $row['id'] ?>">
                                                            <button type="button" class="btn btn-danger  btn-sm  btntooltips deletedHistoryBtn" title="Delete"><i class="bi bi-trash"></i></button>
                                                        <?php } else { ?>
                                                            <input type="hidden" class="undoDeletedHistoryID" value="<?php echo $row['id'] ?>">
                                                            <button type="button" class="btn btn-secondary  btn-sm  btntooltips undoDeletedHistoryBtn" title="Undo"><i class="bi bi-arrow-counterclockwise"></i></button>
                                                        <?php } ?>
                                                    </td>
                                                </tr>

                                                <!-- Modal for Viewing Details -->
                                                <div class="modal fade" id="viewDetails-<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php
                                                                $id = $row['id'];
                                                                $fetch = "SELECT * FROM employee_update_history WHERE id = '$id'";
                                                                $output = $link->query($fetch);
                                                                $fetched = $output->fetch_assoc();
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-md-12 mt-3 mb-5">
                                                                        <center>
                                                                            <img src="<?php echo $fetched['photo'] ?>" class="img-responsive" alt="Photo" style="flex: none; width: 230px;height: 230px; object-fit: cover;">
                                                                        </center>
                                                                    </div>
                                                                    <div class="col-md-4 mt-3">
                                                                        <label for="" class="form-label">Applicant Number</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['tracking_no'] ?>">
                                                                    </div>
                                                                    <div class="col-md-4 mt-3">
                                                                        <label for="" class="form-label">Date Applied</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['date_applied'] ?>">
                                                                    </div>
                                                                    <div class="col-md-4 mt-3">
                                                                        <label for="" class="form-label">Source</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['source'] ?>">
                                                                    </div>
                                                                    <div class="col-md-6 mt-3">
                                                                        <label for="" class="form-label">Name</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['fullname'] ?>">
                                                                    </div>
                                                                    <div class="col-md-6 mt-3">
                                                                        <label for="" class="form-label">Address</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['present_address'] ?>">
                                                                    </div>
                                                                    <div class="col-md-4 mt-3">
                                                                        <label for="" class="form-label">Birthday</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['birthday'] ?>">
                                                                    </div>
                                                                    <div class="col-md-2 mt-3">
                                                                        <label for="" class="form-label">Age</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['age'] ?>">
                                                                    </div>
                                                                    <div class="col-md-6 mt-3">
                                                                        <label for="" class="form-label">Gender</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['gender'] ?>">
                                                                    </div>
                                                                    <div class="col-md-6 mt-3">
                                                                        <label for="" class="form-label">Civil Status</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['civil_status'] ?>">
                                                                    </div>
                                                                    <div class="col-md-6 mt-3">
                                                                        <label for="" class="form-label">Contact Number</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['contact_number'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label for="" class="form-label">Landline</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['landline'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label for="" class="form-label">Email Address</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['email'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label for="" class="form-label">Desired Position</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['desired_position'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label for="" class="form-label">Classification</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['classification'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label for="" class="form-label">Identification</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['indentification'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label for="" class="form-label">SSS Number</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['sss'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label for="" class="form-label">Philhealth Number</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['philhealth'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label for="" class="form-label">PagIBIG Number</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['pagibig'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label for="" class="form-label">TIN Number</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['tin'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label for="" class="form-label">PSA</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['psa'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label for="" class="form-label">Emergency Contact Person</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['e_person'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label for="" class="form-label">Emergency Contact Address</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['e_address'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label for="" class="form-label">Emergency Contact Number</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['e_number'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label for="" class="form-label">Remarks</label>
                                                                        <textarea name="" id="" class="form-control" cols="120" rows="5"><?php echo $fetched['tin'] ?></textarea>
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label for="" class="form-label">TIN Number</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['tin'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label for="" class="form-label">TIN Number</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['tin'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label for="" class="form-label">TIN Number</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['tin'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label for="" class="form-label">TIN Number</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['tin'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label for="" class="form-label">TIN Number</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['tin'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label for="" class="form-label">TIN Number</label>
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo $fetched['tin'] ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
    header("Location: ../../index.php");
    exit(0);
}
?>