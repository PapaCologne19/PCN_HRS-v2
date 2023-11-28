<?php
session_start();
include '../../connect.php';

if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>

        <title>Applicant Maintenance</title>
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
                                        <h4 class="fs-4 justify-content-center align-">
                                            Applicant Account Management 
                                        </h4>
                                    </div>
                                    <hr>
                                    <table class="table table-hover" id="example">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Applicant Name</th>
                                                <th>Address</th>
                                                <th>Contact Number</th>
                                                <th>Email Address</th>
                                                <th>Username</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM applicant";
                                            $result = $link->query($query);
                                            while ($row = $result->fetch_assoc()) {
                                            ?>
                                                <tr>

                                                    <td><?php echo $row['id'] ?></td>
                                                    <td><?php echo $row['lastname'] . ", " . $row['firstname'] . " " . $row['middlename'] . " " . $row['extension_name'] ?></td>
                                                    <td><?php echo $row['present_address'] ?></td>
                                                    <td><?php echo $row['mobile_number'] ?></td>
                                                    <td><?php echo $row['email_address'] ?></td>
                                                    <td><?php echo $row['username'];?></td>
                                                    <td>
                                                        <div class="contains">
                                                            <?php 
                                                                if($row['is_deleted'] === "0"){
                                                            ?>
                                                            <div class="columns"></div>
                                                            <div class="columns">
                                                                <input type="hidden" class="delete_applicant_id" name="delete_applicant_id" id="delete_applicant_id" value="<?php echo $row['id'];?>">
                                                                <button class="btn btn-danger btn-sm delete_applicant_account_btn" data-bs-toggle="tooltip" data-bs-title="Delete Applicant">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                            </div>
                                                            <?php } else {?>
                                                                <div class="columns">
                                                                <input type="hidden" class="undo_delete_applicant_id" name="undo_delete_applicant_id" id="undo_delete_applicant_id" value="<?php echo $row['id'];?>">
                                                                <button class="btn btn-secondary btn-sm undo_delete_applicant_account_btn" data-bs-toggle="tooltip" data-bs-title="Undo Deleted Applicant">
                                                                    <i class="bi bi-arrow-counterclockwise"></i>
                                                                </button>
                                                            </div>
                                                            <?php }?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- End of Main page -->
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