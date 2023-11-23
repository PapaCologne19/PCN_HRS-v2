<?php
session_start();
include '../../connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    <title>Files</title>
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

                            <div class="card-body">
                                <div class="container">
                                    <button type="button" class="btn btn-dark mb-5" data-bs-toggle="modal" data-bs-target="#addFileModal" title="Add Folder"><i class="bi bi-filetype-docx"></i></button>
                                    <table class="table" id="example">
                                        <thead>
                                            <tr>
                                                <th>Folder</th>
                                                <th>Date Uploaded</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $id = $link->real_escape_string($_GET['id']);
                                            $folder_id = $link->real_escape_string($_GET['folder_id']);
                                            $query = "SELECT * FROM employees WHERE id = '$id'";
                                            $result = $link->query($query);
                                            while ($rower = $result->fetch_assoc()) {
                                                $applicant_id = $rower['app_id'];
                                                $select_resume_file = "SELECT * FROM applicant_resume WHERE folder_id = '$folder_id' AND applicant_id = '$applicant_id'";
                                                $select_resume_file_result = $link->query($select_resume_file);
                                                while ($select_resume_file_row = $select_resume_file_result->fetch_assoc()) {
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <img src="../assets/img/elements/file.png" width="5%" alt="">
                                                            <a href=""><?php echo $select_resume_file_row['resume_file']; ?></a>
                                                        </td>
                                                        <td><?php echo $select_resume_file_row['date_applied']; ?></td>
                                                    </tr>
                                            <?php
                                                }
                                            } ?>
                                        </tbody>
                                    </table>


                                    <!-- Modal for Adding File -->
                                    <div class="modal fade" id="addFileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add File/s</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <form action="action.php" method="POST" class="form-group row" enctype="multipart/form-data">
                                                            <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $_GET['id']?>">
                                                            <input type="hidden" name="folder_id" id="folder_id" value="<?php echo $_GET['folder_id']?>">
                                                            <div class="col-md-12">
                                                                <label for="" class="form-label">Attach File</label>
                                                                <input type="file" name="files[]" id="files" class="form-control" required multiple>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="upload_file_btn">Upload</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>













                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    </script>
    <?php include '../components/footer.php'; ?>
</body>

</html>