<?php
session_start();
include '../../connect.php';

if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>
        <title>Type of Separation</title>
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
                                            Type of Separation Maintenance
                                        </h4>
                                    </div>
                                    <hr>
                                    <form action="" class="mb-5">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_type_of_separation">Create New <i class="bi bi-plus-lg"></i></button>
                                    </form>
                                    <table class="table" id="example">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM types_of_separation";
                                            $result = $link->query($query);
                                            while ($row = $result->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $row['type'] ?></td>
                                                    <td>


                                                        <?php
                                                        if ($row['is_deleted'] === '0') {
                                                        ?>
                                                            <div class="contains">
                                                                <div class="columns">
                                                                    <button class="btn btn-success btn-sm  btntooltips" data-bs-toggle="modal" data-bs-target="#update_type_of_separation-<?php echo $row['id'] ?>" title="Edit Source">
                                                                        <i class="bi bi-pencil-square"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="columns">
                                                                    <input type="hidden" name="delete_type_of_separation_ID" class="delete_type_of_separation_ID" id="delete_type_of_separation_ID" value="<?php echo $row['id'] ?>">
                                                                    <button class="btn btn-danger btn-sm  btntooltips delete_type_of_separation_Btn" title="Delete Type of Separation">
                                                                        <i class="bi bi-trash3"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="columns">
                                                                <input type="hidden" name="undo_type_of_separation_ID" class="undo_type_of_separation_ID" id="undo_type_of_separation_ID" value="<?php echo $row['id'] ?>">
                                                                <button class="btn btn-secondary btn-sm  btntooltips undo_type_of_separation_Btn" title="Undo Deleted Type of Separation">
                                                                    <i class="bi bi-arrow-counterclockwise"></i>
                                                                </button>
                                                            </div>
                                </div>
                            <?php } ?>
                            </td>



                            <!-- Modal for updating Type of Separation -->
                            <div class="modal fade" id="update_type_of_separation-<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Source</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                                $query = "SELECT * FROM types_of_separation WHERE id = '" . $row['id'] . "'";
                                                $results = $link->query($query);
                                                $rows = $results->fetch_assoc();
                                            ?>
                                            <form action="action.php" method="POST" class="form-group">
                                                <input type="hidden" name="id" value="<?php echo $rows['id'] ?>">
                                                <div class="col-md-12">
                                                    <label for="type" class="form-label">Type</label>
                                                    <input type="text" name="type" id="type" class="form-control" placeholder="Enter here" value="<?php echo $rows['type'] ?>" required>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="update_type_of_separationBtn">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            </tr>
                        <?php } ?>
                        </tbody>
                        </table>

                        <!-- Modal for adding Source -->
                        <div class="modal fade" id="add_type_of_separation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Type of Separation</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="action.php" method="POST" class="form-group">
                                            <div class="col-md-12">
                                                <label for="type" class="form-label">Type</label>
                                                <input type="text" name="type" id="type" class="form-control" placeholder="Enter here" required>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="add_type_of_separationBtn">Save changes</button>
                                    </div>
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
        <?php include '../components/footer.php'; ?>
    </body>

    </html>
<?php
} else {
    header("Location: ../../index.php");
    exit(0);
}
?>