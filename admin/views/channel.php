<?php
session_start();
include '../../connect.php';

if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>
        <title>Channel</title>
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
                                            Channel Maintenance
                                        </h4>
                                    </div>
                                    <hr>
                                    <form action="" class="mb-5">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addChannel">Create New <i class="bi bi-plus-lg"></i></button>
                                    </form>
                                    <table class="table" id="example">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM channels";
                                            $result = $link->query($query);
                                            while ($row = $result->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $row['description'] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row['is_deleted'] === '0') {
                                                        ?>
                                                            <div class="contains">
                                                                <div class="columns">
                                                                    <button class="btn btn-success btn-sm  btntooltips" data-bs-toggle="modal" data-bs-target="#updateChannel-<?php echo $row['id'] ?>" title="Edit Channel">
                                                                        <i class="bi bi-pencil-square"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="columns">
                                                                    <input type="hidden" name="deleteChannelID" class="deleteChannelID" id="deleteChannelID" value="<?php echo $row['id'] ?>">
                                                                    <button class="btn btn-danger btn-sm  btntooltips deleteChannelBtn" title="Delete Channel">
                                                                        <i class="bi bi-trash3"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="columns">
                                                                <input type="hidden" name="undoDeletedChannelID" class="undoDeletedChannelID" id="undoDeletedChannelID" value="<?php echo $row['id'] ?>">
                                                                <button class="btn btn-secondary btn-sm  btntooltips undoDeletedChannelBtn" title="Undo Deleted Channel">
                                                                    <i class="bi bi-arrow-counterclockwise"></i>
                                                                </button>
                                                            </div>
                                </div>
                            <?php } ?>

                            </td>


                            <!-- Modal for updating Channel -->
                            <div class="modal fade" id="updateChannel-<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Channel</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                                $query = "SELECT * FROM channels WHERE id = '" . $row['id'] . "'";
                                                $results = $link->query($query);
                                                $rows = $results->fetch_assoc();
                                            ?>
                                            <form action="action.php" method="POST" class="form-group">
                                                <input type="hidden" name="id" value="<?php echo $rows['id'] ?>">
                                                <div class="col-md-12">
                                                    <label for="channel_name" class="form-label">Channel Title</label>
                                                    <input type="text" name="channel_name" id="channel_name" class="form-control" placeholder="Enter here" value="<?php echo $rows['description'] ?>" required>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="updateChannelBtn">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            </tr>
                        <?php } ?>
                        </tbody>
                        </table>

                        <!-- Modal for adding channels -->
                        <div class="modal fade" id="addChannel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Channel</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="action.php" method="POST" class="form-group">
                                            <div class="col-md-12">
                                                <label for="channel_name" class="form-label">Channel Title</label>
                                                <input type="text" name="channel_name" id="channel_name" class="form-control" placeholder="Enter here" required>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="addChannelBtn">Save changes</button>
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