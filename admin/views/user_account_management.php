<?php
session_start();
include '../../connect.php';

if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>

        <title>User Maintenance</title>
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
                                            User Account Management
                                        </h4>
                                    </div>
                                    <hr>
                                    <div class="container mt-4 mb-4">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                            Add User
                                        </button>
                                    </div>
                                    <table class="table table-hover" id="example">
                                        <thead>
                                            <tr>
                                                <th>ID Number</th>
                                                <th>Name</th>
                                                <th>Contact Number</th>
                                                <th>Email Address</th>
                                                <th>Division</th>
                                                <th>User Type</th>
                                                <th>Username</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM data";
                                            $result = $link->query($query);
                                            while ($row = $result->fetch_assoc()) {
                                            ?>
                                                <tr>

                                                    <td><?php echo $row['idnum'] ?></td>
                                                    <td><?php echo $row['lastname'] . ", " . $row['firstname'] . " " . $row['mi'] ?></td>
                                                    <td><?php echo $row['contactno'] ?></td>
                                                    <td><?php echo $row['emailadd'] ?></td>
                                                    <td><?php echo $row['fms'] ?></td>
                                                    <td><?php echo $row['typenya']; ?></td>
                                                    <td><?php echo $row['uname']; ?></td>
                                                    <td><?php
                                                        if ($row['approve'] === '1') {
                                                            echo '<span class="badge rounded bg-success">Approved</span>';
                                                        } elseif ($row['approve'] === '0') {
                                                            echo '<span class="badge rounded bg-warning">Pending</span>';
                                                        } else {
                                                            echo '<span class="badge rounded bg-danger">Rejected</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <div class="contains">
                                                            <?php
                                                            if ($row['is_deleted'] === "0") {
                                                            ?>
                                                                <div class="columns">
                                                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#updateUserModal-<?php echo $row['id'] ?>" title="Update User Information">
                                                                        <i class="bi bi-gear"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="columns">
                                                                    <input type="hidden" name="delete_id" class="delete_id" value="<?php echo $row['id'];?>">
                                                                    <button type="button" class="btn btn-danger btn-sm delete_user_btn" data-bs-toggle="tooltip" data-bs-title="Delete User">
                                                                        <i class="bi bi-trash"></i>
                                                                    </button>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="columns">
                                                                    <input type="hidden" name="undo_deleted_id" class="undo_deleted_id" value="<?php echo $row['id'];?>">
                                                                    <button type="button" class="btn btn-secondary btn-sm undo_deleted_user_btn" title="Undo Deleted User">
                                                                        <i class="bi bi-arrow-counterclockwise"></i>
                                                                    </button>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Modal for Updating User -->
                                                <div class="modal fade" id="updateUserModal-<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container">
                                                                    <form action="action.php" method="POST" class="form-group row">
                                                                        <input type="hidden" name="update_id" id="" value="<?php echo $row['id'] ?>">
                                                                        <div class="col-md-12">
                                                                            <label for="" class="form-label">ID Number</label>
                                                                            <input type="number" name="id_number" id="id_number" class="form-control" value="<?php echo $row['idnum']?>" required>
                                                                        </div>
                                                                        <div class="col-md-12 mt-3">
                                                                            <label for="" class="form-label">Firstname</label>
                                                                            <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $row['firstname']?>" required>
                                                                        </div>
                                                                        <div class="col-md-12 mt-3">
                                                                            <label for="" class="form-label">Middlename</label>
                                                                            <input type="text" name="middlename" id="middlename" class="form-control" value="<?php echo $row['mi']?>" required>
                                                                        </div>
                                                                        <div class="col-md-12 mt-3">
                                                                            <label for="" class="form-label">Lastname</label>
                                                                            <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $row['lastname']?>" required>
                                                                        </div>
                                                                        <div class="col-md-12 mt-3">
                                                                            <label for="" class="form-label">Contact Number</label>
                                                                            <input type="number" name="contact_number" id="contact_number" class="form-control" value="<?php echo $row['contactno']?>" required>
                                                                        </div>
                                                                        <div class="col-md-12 mt-3">
                                                                            <label for="" class="form-label">Email Address</label>
                                                                            <input type="email" name="email_address" id="email_address" class="form-control" value="<?php echo $row['emailadd']?>" required>
                                                                        </div>
                                                                        <div class="col-md-12 mt-3">
                                                                            <label for="" class="form-label">Division</label>
                                                                            <select name="division" id="division" class="form-select" required>
                                                                                <option value="<?php echo $row['fms']?>" selected><?php echo $row['fms']?></option>
                                                                                <?php
                                                                                $sql = "SELECT * FROM divisions WHERE is_deleted = '0'";
                                                                                $sql_result = $link->query($sql);
                                                                                while ($sql_row = $sql_result->fetch_assoc()) {
                                                                                ?>
                                                                                    <option value="<?php echo $sql_row['description']; ?>"><?php echo $sql_row['description']; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-12 mt-3">
                                                                            <label for="" class="form-label">User Account Type</label>
                                                                            <select name="user_account_type" id="user_account_type" class="form-select" required>
                                                                                <option value="<?php echo $row['typenya']?>" selected><?php echo $row['typenya']?></option>
                                                                                <option value="ADMIN">ADMIN</option>
                                                                                <option value="RECRUITMENT">RECRUITMENT</option>
                                                                                <option value="MRF">MRF</option>
                                                                                <option value="EWB">EWB</option>
                                                                                <option value="DEPLOYMENT">DEPLOYMENT</option>
                                                                                <option value="POOLERS">POOLERS</option>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" name="update_user_btn" class="btn btn-primary">Update</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>



                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <!-- Modal for Adding User -->
                                    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <form action="action.php" method="post" class="form-group row">
                                                            <div class="col-md-12">
                                                                <label for="" class="form-label">ID Number</label>
                                                                <input type="number" name="id_number" id="id_number" class="form-control" required>
                                                            </div>
                                                            <div class="col-md-12 mt-3">
                                                                <label for="" class="form-label">Firstname</label>
                                                                <input type="text" name="firstname" id="firstname" class="form-control" required>
                                                            </div>
                                                            <div class="col-md-12 mt-3">
                                                                <label for="" class="form-label">Middlename</label>
                                                                <input type="text" name="middlename" id="middlename" class="form-control" required>
                                                            </div>
                                                            <div class="col-md-12 mt-3">
                                                                <label for="" class="form-label">Lastname</label>
                                                                <input type="text" name="lastname" id="lastname" class="form-control" required>
                                                            </div>
                                                            <div class="col-md-12 mt-3">
                                                                <label for="" class="form-label">Contact Number</label>
                                                                <input type="number" name="contact_number" id="contact_number" class="form-control" required>
                                                            </div>
                                                            <div class="col-md-12 mt-3">
                                                                <label for="" class="form-label">Email Address</label>
                                                                <input type="email" name="email_address" id="email_address" class="form-control" required>
                                                            </div>
                                                            <div class="col-md-12 mt-3">
                                                                <label for="" class="form-label">Division</label>
                                                                <select name="division" id="division" class="form-select" required>
                                                                    <option value="" selected disabled>Select</option>
                                                                    <?php
                                                                    $sql = "SELECT * FROM divisions WHERE is_deleted = '0'";
                                                                    $sql_result = $link->query($sql);
                                                                    while ($sql_row = $sql_result->fetch_assoc()) {
                                                                    ?>
                                                                        <option value="<?php echo $sql_row['description']; ?>"><?php echo $sql_row['description']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 mt-3">
                                                                <label for="" class="form-label">User Account Type</label>
                                                                <select name="user_account_type" id="user_account_type" class="form-select" required>
                                                                    <option value="" selected disabled>Select</option>
                                                                    <option value="ADMIN">ADMIN</option>
                                                                    <option value="RECRUITMENT">RECRUITMENT</option>
                                                                    <option value="MRF">MRF</option>
                                                                    <option value="EWB">EWB</option>
                                                                    <option value="DEPLOYMENT">DEPLOYMENT</option>
                                                                    <option value="POOLERS">POOLERS</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 mt-3">
                                                                <label for="" class="form-label">Username</label>
                                                                <input type="text" name="username" id="username" class="form-control" required>
                                                            </div>
                                                            <div class="col-md-12 mt-3">
                                                                <label for="" class="form-label">Password</label>
                                                                <input type="password" name="password" id="password" class="form-control" required>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="create_user_btn" class="btn btn-primary">Create</button>
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