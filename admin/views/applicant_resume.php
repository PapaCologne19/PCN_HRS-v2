<?php
session_start();
include '../../connect.php';

if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>

        <title>Applicant Resume</title>
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
                                            Applicant Resume Management 
                                        </h4>
                                    </div>
                                    <hr>
                                    <table class="table table-hover" id="example">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Applicant Name</th>
                                                <th>Resume File</th>
                                                <th>Project Title</th>
                                                <th>Status</th>
                                                <th>Project Status</th>
                                                <th>Date Submitted</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT applicant.*, resume.*, project.*, 
                                            DATE_FORMAT(date_applied, '%M %d, %Y') AS date_applied, 
                                            resume.status AS resume_status, 
                                            resume.is_deleted AS resume_deleted,
                                            resume.id AS resume_ID
                                            FROM applicant applicant, applicant_resume resume, projects project
                                            WHERE applicant.id = resume.applicant_id
                                            AND project.id = resume.project_id";
                                            $result = $link->query($query);
                                            while ($row = $result->fetch_assoc()) {
                                            ?>
                                                <tr>

                                                    <td><?php echo $row['id'] ?></td>
                                                    <td><?php echo $row['firstname'] . ", " . $row['middlename'] . " " . $row['lastname'] . $row['extension_name'] ?></td>
                                                    <td><?php echo $row['resume_file'] ?></td>
                                                    <td><?php echo $row['project_title'] ?></td>
                                                    <td><?php echo $row['resume_status'] ?></td>
                                                    <td><?php echo $row['project_status'] ?></td>
                                                    <td><?php echo $row['date_applied'];?></td>
                                                    <td>
                                                        <div class="contains">
                                                            <?php 
                                                                if($row['resume_deleted'] === "0"){
                                                            ?>
                                                            <div class="columns"></div>
                                                            <div class="columns">
                                                                <input type="hidden" class="delete_resume_id" name="delete_resume_id" id="delete_resume_id" value="<?php echo $row['resume_ID'];?>">
                                                                <button class="btn btn-danger btn-sm delete_resume_btn" data-bs-toggle="tooltip" data-bs-title="Delete Resume">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                            </div>
                                                            <?php } else {?>
                                                                <div class="columns">
                                                                <input type="hidden" class="undo_delete_resume_id" name="undo_delete_resume_id" id="undo_delete_resume_id" value="<?php echo $row['resume_ID'];?>">
                                                                <button class="btn btn-secondary btn-sm undo_delete_resume_btn" data-bs-toggle="tooltip" data-bs-title="Undo Deleted Resume">
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