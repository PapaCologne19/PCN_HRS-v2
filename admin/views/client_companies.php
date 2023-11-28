<?php
session_start();
include '../../connect.php';

if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>
        <title>Client Companies</title>
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
                                            Client Companies Maintenance
                                        </h4>
                                    </div>
                                    <hr>
                                    <form action="" class="mb-5">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClientCompanies">Create New <i class="bi bi-plus-lg"></i></button>
                                    </form>
                                    <table class="table" id="example">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Company Name</th>
                                                <th class="text-center">Area</th>
                                                <th class="text-center">Region</th>
                                                <th class="text-center">Branch</th>
                                                <th class="text-center">Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM client_company";
                                            $result = $link->query($query);
                                            while ($row = $result->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $row['company_name'] ?></td>
                                                    <td class="text-center"><?php echo $row['area'] ?></td>
                                                    <td class="text-center"><?php echo $row['region'] ?></td>
                                                    <td class="text-center"><?php echo $row['branch'] ?></td>
                                                    <td class="text-center"><?php echo $row['address'] ?></td>
                                                    <td>


                                                        <?php
                                                        if ($row['is_deleted'] === '0') {
                                                        ?>
                                                            <div class="contains">
                                                                <div class="columns">
                                                                    <button class="btn btn-success btn-sm  btntooltips" data-bs-toggle="modal" data-bs-target="#updateClientCompanies-<?php echo $row['id'] ?>" title="Edit Client Company">
                                                                        <i class="bi bi-pencil-square"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="columns">
                                                                    <input type="hidden" name="deleteClientCompanyID" class="deleteClientCompanyID" id="deleteClientCompanyID" value="<?php echo $row['id'] ?>">
                                                                    <button class="btn btn-danger btntooltips  btn-sm deleteClientCompanyBtn" title="Delete Client Company">
                                                                        <i class="bi bi-trash3"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="columns">
                                                                <input type="hidden" name="undoDeletedClientCompanyID" class="undoDeletedClientCompanyID" id="undoDeletedClientCompanyID" value="<?php echo $row['id'] ?>">
                                                                <button class="btn btn-secondary btntooltips btn-sm  undoDeletedClientCompanyBtn" title="Undo Deleted Client Company">
                                                                    <i class="bi bi-arrow-counterclockwise"></i>
                                                                </button>
                                                            </div>
                                </div>
                            <?php } ?>
                            </td>


                            <!-- Modal for updating Client Company -->
                            <div class="modal fade" id="updateClientCompanies-<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Client Company</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="action.php" method="POST" class="form-group">
                                                <?php
                                                $query = "SELECT * FROM client_company WHERE id = '" . $row['id'] . "'";
                                                $results = $link->query($query);
                                                $rows = $results->fetch_assoc();
                                                ?>
                                                <input type="hidden" name="id" value="<?php echo $rows['id'] ?>">
                                                <div class="col-md-12">
                                                    <label for="client_company_name" class="form-label">Client Company Name</label>
                                                    <input type="text" name="client_company_name" id="client_company_name" class="form-control" value="<?php echo $row['company_name'] ?>" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="area" class="form-label">Area</label>
                                                    <input type="text" name="area" id="area" class="form-control" value="<?php echo $row['area'] ?>" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="region" class="form-label">Region</label>
                                                    <input type="text" name="region" id="region" class="form-control" value="<?php echo $row['region'] ?>" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="branch" class="form-label">Branch</label>
                                                    <input type="text" name="branch" id="branch" class="form-control" value="<?php echo $row['branch'] ?>" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="address" class="form-label">Address</label>
                                                    <textarea name="address" id="address" class="form-control" cols="30" rows="10"><?php echo $row['address'] ?></textarea>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="updateClientCompanyBtn">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            </tr>
                        <?php } ?>
                        </tbody>
                        </table>


                        <!-- Modal for adding Client Company -->
                        <div class="modal fade" id="addClientCompanies" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Client Company</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="action.php" method="POST" class="form-group">
                                            <div class="col-md-12">
                                                <label for="client_company_name" class="form-label">Client Company Name</label>
                                                <input type="text" name="client_company_name" id="client_company_name" class="form-control" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="area" class="form-label">Area</label>
                                                <input type="text" name="area" id="area" class="form-control" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="region" class="form-label">Region</label>
                                                <input type="text" name="region" id="region" class="form-control" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="branch" class="form-label">Branch</label>
                                                <input type="text" name="branch" id="branch" class="form-control" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="address" class="form-label">Address</label>
                                                <textarea name="address" id="address" class="form-control" cols="30" rows="10"></textarea>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="addClientCompanyBtn">Save changes</button>
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