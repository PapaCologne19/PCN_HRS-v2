<?php
session_start();
include '../../connect.php';

if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>

        <title>LOA</title>
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
                                    <div class="col-md-3 mt-3 mx-3 mb-4">
                                        <a href="create_loa.php" class="btn btn-info">Create LOA</a>
                                    </div>
                                    <table class="table table-hover" id="example">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Date Created</th>
                                                <th>LOA Title</th>
                                                <th>Division</th>
                                                <th>Filename</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT loa_main.*, loa_files.*, DATE_FORMAT(date_modified, '%M %d %Y') AS date_modified
                                                FROM loa_maintenance_word loa_main, loa_files loa_files
                                                WHERE loa_files.loa_main_id = loa_main.id";
                                            $result = $link->query($query);
                                            while ($row = $result->fetch_assoc()) {
                                            ?>
                                                <tr>

                                                    <td><?php echo $row['id'] ?></td>
                                                    <td><?php echo $row['date_modified'] ?></td>
                                                    <td><?php echo $row['loa_name'] ?></td>
                                                    <td><?php echo $row['division'] ?></td>
                                                    <td><?php echo $row['file_name'] ?></td>
                                                    <td><?php
                                                        if ($row['status'] === '0') {
                                                            echo '<p class="badge round-pill bg-secondary">Not Active</p>';
                                                        } else {
                                                            echo '<p class="badge round-pill bg-success text-white">Active</p>';
                                                        }
                                                        ?></td>
                                                    <td>
                                                        <div class="contains">
                                                            <div class="columns">
                                                                <?php
                                                                if ($row['status'] === '0') { ?>
                                                                    <input type="hidden" name="template_id" class="template_id" value="<?php echo $row["id"] ?>">
                                                                    <button type="button" class="btn btn-secondary  btn-sm  make_default" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Set as default (Active)"><i class="bi bi-pin"></i></button>
                                                                <?php } else { ?>
                                                                    <input type="hidden" name="template_inactive_id" class="template_inactive_id" value="<?php echo $row["id"] ?>">
                                                                    <button type="button" class="btn btn-secondary  btn-sm  make_inactive" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Set as Inactive"><i class="bi bi-pencil"></i></i></button>
                                                                <?php  } ?>
                                                            </div>
                                                            <div class="columns">
                                                                <button type="button" class="btn btn-dark btn-sm btntooltips" data-bs-toggle="modal" data-bs-target="#changeLOATemplate-<?php echo $row['id'] ?>" title="Change LOA Template">
                                                                    <i class="bi bi-filetype-docx"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <!-- Modal for Changing LOA Template file -->
                                                    <div class="modal fade" id="changeLOATemplate-<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">CHANGE LOA TEMPLATE</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="action.php" method="POST" class="form-group" enctype="multipart/form-data">
                                                                        <input type="hidden" name="loatemplate_id" value="<?php echo $row['id'] ?>">
                                                                        <label for="loatemplate_file" class="form-label">LOA Template File</label>
                                                                        <input type="file" name="loatemplate_file" id="loatemplate_file" class="form-control" required> 
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" name="change_file_btn" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>



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