<?php
session_start();
include '../../connect.php';

if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>
        <title>Project</title>
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
                                            Project Maintenance
                                        </h4>
                                    </div>
                                    <hr>
                                    <div class="mb-5">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProject">Create New <i class="bi bi-plus-lg"></i></button>
                                    </div>
                                    <table class="table" id="example">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Project Title</th>
                                                <th class="text-center">Client Name</th>
                                                <th class="text-center">EWB Count</th>
                                                <th class="text-center">Start Date</th>
                                                <th class="text-center">End Date</th>
                                                <th class="text-center">Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT *,
                                            DATE_FORMAT(start_date, '%M %d %Y') AS start_date,
                                            DATE_FORMAT(end_date, '%M %d %Y') as end_date
                                            FROM client_project";
                                            $result = $link->query($query);
                                            while ($row = $result->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $row['project_title'] ?></td>
                                                    <td class="text-center"><?php echo $row['client_company_name'] ?></td>
                                                    <td class="text-center"><?php echo $row['ewb_count'] ?></td>
                                                    <td class="text-center"><?php echo $row['start_date'] ?></td>
                                                    <td class="text-center"><?php echo $row['end_date'] ?></td>
                                                    <td class="text-center">
                                                        <?php
                                                        if ($row['status'] === '0') {
                                                            echo '<span class="badge bg-success">Active</span>';
                                                        } elseif($row['status'] === '1') {
                                                            echo '<span class="badge bg-secondary">Inactive</span>';
                                                        } elseif($row['status'] === '2') {
                                                            echo '<span class="badge bg-danger">Deleted</span>';
                                                        }

                                                        ?>
                                                    </td>
                                                    <td>


                                                        <?php
                                                        if ($row['is_deleted'] === '0') {
                                                        ?>
                                                            <div class="contains">
                                                                <?php 
                                                                    if($row['status'] === '0'){
                                                                ?>
                                                                <div class="columns">
                                                                    <input type="hidden" name="changeProjectStatusInactiveID" class="changeProjectStatusInactiveID" id="changeProjectStatusInactiveID" value="<?php echo $row['id'] ?>">
                                                                    <button class="btn btn-dark btntooltips  btn-sm changeProjectStatusInactiveBtn" data-bs-toggle="modal" title="Change Project Status (Inactive)">
                                                                        <i class="bi bi-pencil"></i>
                                                                    </button>
                                                                </div>
                                                                <?php }else {?>
                                                                <div class="columns">
                                                                    <input type="hidden" name="changeProjectStatusActiveID" class="changeProjectStatusActiveID" id="changeProjectStatusActiveID" value="<?php echo $row['id'] ?>">
                                                                    <button class="btn btn-dark btntooltips  btn-sm changeProjectStatusActiveBtn" data-bs-toggle="modal" title="Change Project Status (Active)">
                                                                        <i class="bi bi-pencil"></i>
                                                                    </button>
                                                                </div>
                                                                <?php }?>
                                                                <div class="columns">
                                                                    <button class="btn btn-primary btn-sm  btntooltips" data-bs-toggle="modal" data-bs-target="#updateProject-<?php echo $row['id'] ?>" title="Edit Project">
                                                                        <i class="bi bi-pencil-square"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="columns">
                                                                    <input type="hidden" name="deleteProjectID" class="deleteProjectID" id="deleteProjectID" value="<?php echo $row['id'] ?>">
                                                                    <button class="btn btn-danger btntooltips btn-sm  deleteProjectBtn" title="Delete Project">
                                                                        <i class="bi bi-trash3"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="columns">
                                                                <input type="hidden" name="undoDeletedProjectID" class="undoDeletedProjectID" id="undoDeletedProjectID" value="<?php echo $row['id'] ?>">
                                                                <button class="btn btn-secondary btntooltips btn-sm  undoDeletedProjectBtn" title="Undo Deleted Project">
                                                                    <i class="bi bi-arrow-counterclockwise"></i>
                                                                </button>
                                                            </div>
                                </div>
                            <?php } ?>
                            </td>


                            <!-- Modal for updating Project -->
                            <div class="modal fade" id="updateProject-<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Project</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="action.php" method="POST" class="form-group">
                                                <?php
                                                $query = "SELECT * FROM client_project WHERE id = '" . $row['id'] . "'";
                                                $results = $link->query($query);
                                                $rows = $results->fetch_assoc();
                                                ?>
                                                <input type="hidden" name="id" value="<?php echo $rows['id'] ?>">
                                                <div class="col-md-12">
                                                <label for="project_title" class="form-label">Project Title</label>
                                                <input type="text" name="project_title" id="project_title" class="form-control" value="<?php echo $rows['project_title']?>" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="client_company_name" class="form-label">Client Name</label>
                                                    <select name="client_company_name" id="client_company_name" class="form-select" required>
                                                    <option value="<?php echo $rows['client_company_name']?>"><?php echo $rows['client_company_name']?></option>
                                                    <?php 
                                                        $queryy = "SELECT * FROM client_company WHERE is_deleted = '0'";
                                                        $resultt = $link->query($queryy);
                                                        while($roww = $resultt->fetch_assoc()){
                                                            echo '<option>'.$roww['company_name'].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="ewb_count" class="form-label">EWB Count</label>
                                                    <input type="number" name="ewb_count" id="ewb_count" class="form-control" value="<?php echo $rows['ewb_count']?>" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="start_date" class="form-label">Start Date</label>
                                                    <input type="date" name="start_date" id="start_date" class="form-control" value="<?php echo $rows['start_date']?>" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="end_date" class="form-label">End Date</label>
                                                    <input type="date" name="end_date" id="end_date" class="form-control" value="<?php echo $rows['end_date']?>" required>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="updateProjectBtn">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            </tr>
                        <?php } ?>
                        </tbody>
                        </table>

                        <!-- Modal for adding Project -->
                        <div class="modal fade" id="addProject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Project</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="action.php" method="POST" class="form-group">
                                            <div class="col-md-12">
                                                <label for="project_title" class="form-label">Project Title</label>
                                                <input type="text" name="project_title" id="project_title" class="form-control" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="client_company_name" class="form-label">Client Name</label>
                                                <select name="client_company_name" id="client_company_name" class="form-select" required>
                                                    <option value="">Select</option>
                                                    <?php 
                                                        $queryy = "SELECT * FROM client_company WHERE is_deleted = '0'";
                                                        $resultt = $link->query($queryy);
                                                        while($roww = $resultt->fetch_assoc()){
                                                            echo '<option>'.$roww['company_name'].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="ewb_count" class="form-label">EWB Count</label>
                                                <input type="number" name="ewb_count" id="ewb_count" class="form-control" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="start_date" class="form-label">Start Date</label>
                                                <input type="date" name="start_date" id="start_date" class="form-control" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="end_date" class="form-label">End Date</label>
                                                <input type="date" name="end_date" id="end_date" class="form-control" required>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="addProjectBtn">Save changes</button>
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