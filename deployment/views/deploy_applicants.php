<?php
session_start();
include '../../connect.php';
if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>
        <title>Deploy Applicant</title>

        
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
                    <div class="content-wrapper mt-3">
                        <div class="containers">
                            <div class="card">
                                <?php
                                $shortlist_id = $_GET['shortlist_title'];
                                $_SESSION['shortlist_title'] = $_GET['shortlist_title'];
                                ?>
                                <hr>
                                <div class="title justify-content-center align-items-center mx-auto">
                                    <h4 class="fs-4">
                                        Deploy (<?php echo $shortlist_id ?>)
                                    </h4>
                                </div>
                                <hr>
                                <table class="table" id="example" style="font-size: 13px !important;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>SSS</th>
                                            <th>PagIBIG</th>
                                            <th>PhilHealth</th>
                                            <th>TIN</th>
                                            <th>Birthday</th>
                                            <th>Contact No.</th>
                                            <th>Date Start</th>
                                            <th>Date End</th>
                                            <th>Emp. status</th>
                                            <th>Status</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $queries = "SELECT shortlist.*, employee.*, shortlist.project_status AS for_loa_status
                                                    FROM shortlist_master shortlist, employees employee
                                                    WHERE shortlist.employee_id = employee.id 
                                                    AND shortlistnameto = '$shortlist_id'";
                                        $results = $link->query($queries);

                                        while ($rows = $results->fetch_assoc()) {
                                            $birthday = $rows['birthday'];
                                            $timestamp_birthday = strtotime($birthday);
                                            $formattedDate_birthday = date("F d, Y", $timestamp_birthday);
                                            $id = $rows['id'];

                                            // IF DEPLOYED NA
                                            if ($rows['deployment_status'] === 'DEPLOYED') {
                                        ?>
                                                <tr>
                                                    <td><?php echo $rows['id'] ?></td>
                                                    <td><?php echo $rows['lastnameko'], ", " . $rows['firstnameko'] . " " . $rows['mnko'] ?></td>
                                                    <td><?php echo $rows['sssnum'] ?></td>
                                                    <td><?php echo $rows['pagibignum'] ?></td>
                                                    <td><?php echo $rows['phnum'] ?></td>
                                                    <td><?php echo $rows['tinnum'] ?></td>
                                                    <td><?php echo $formattedDate_birthday ?></td>
                                                    <td><?php echo $rows['cpnum'] ?></td>
                                                    <?php
                                                    $deployment_query = "SELECT * FROM deployment WHERE employee_id = '$id'";
                                                    $deployment_result = $link->query($deployment_query);
                                                    $deployment_row = $deployment_result->fetch_assoc();
                                                    $loa_start_date = $deployment_row['loa_start_date'];
                                                    $loa_end_date = $deployment_row['loa_end_date'];
                                                    $dateObj = date_create_from_format('Y-m-d', $loa_start_date);
                                                    $dateObj2 = date_create_from_format('Y-m-d', $loa_end_date);

                                                    if ($dateObj !== false && $dateObj2 !== false) {
                                                        $formattedDate_start = date_format($dateObj, 'F j, Y');
                                                        $formattedDate_end = date_format($dateObj2, 'F j, Y');
                                                    } else {
                                                        // Handle the case where date parsing fails
                                                        echo "Date parsing failed for one or both dates.";
                                                    }
                                                    ?>
                                                    <td><?php echo $formattedDate_start; ?></td>
                                                    <td><?php echo $formattedDate_end; ?></td>
                                                    <td><?php echo $deployment_row['employment_status']; ?></td>

                                                    <td>DEPLOYED</td>
                                                    <td><?php echo $rows['remarks'] ?></td>
                                                    <td>
                                                        <?php if ($rows['deployment_status'] === 'DEPLOYED' && $rows['for_loa_status'] === "FOR LOA") { ?>
                                                            <div class="contain">
                                                                <div class="columns">
                                                                    <input type="hidden" name="deployUpdateID" id="deployUpdateID" class="deployUpdateID" value="<?php echo $rows['id'] ?>">
                                                                    <button type="button" name="deploy" class="btn btn-info btn-sm updateDeployOpenModal" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Update"><i class="bi bi-gear"></i></button>
                                                                </div>
                                                                <div class="columns">
                                                                    <a href="download_loa.php?id=<?php echo $rows['id'] ?>" name="download_deploy" class="btn btn-dark btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Download LOA"><i class="bi bi-cloud-download"></i></a>
                                                                </div>
                                                                <div class="columns">
                                                                    <button type="button" class="btn btn-success btn-sm clearBtn" data-bs-toggle="modal" data-bs-target="#clearModal-<?php echo $rows['id'] ?>" title="Separation">
                                                                        <i class="bi bi-trash"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="columns">
                                                                    <input type="hidden" value="<?php echo $rows['id'] ?>" class="backOutID">
                                                                    <input type="hidden" value="<?php echo $_GET['shortlist_title'] ?>" name="project_title">
                                                                    <button type="button" class="btn btn-danger btn-sm backOutBtn" data-bs-toggle="tooltip" data-bs-title="Backout Applicant">
                                                                    <i class="bi bi-x-octagon-fill"></i>
                                                                    </button>
                                                                </div>
                                                            </div>


                                                            <!-- Modal for Clear -->
                                                            <div class="modal fade" id="clearModal-<?php echo $rows['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="container">
                                                                                <?php 
                                                                                    $select = "SELECT deployment.*, employee.*, deployment.id AS deployment_id 
                                                                                    FROM deployment deployment, employees employee 
                                                                                    WHERE deployment.employee_id = employee.id
                                                                                    AND deployment.employee_id = '" . $rows['id'] . "'";
                                                                                    $select_result = $link->query($select);
                                                                                    $select_row = $select_result->fetch_assoc();
                                                                                    $date_now = date('Y-m-d');
                                                                                ?>
                                                                                <form action="action.php" method="post" class="row" enctype="multipart/form-data">
                                                                                    <input type="hidden" name="deployment_id" value="<?php echo $select_row['deployment_id']?>">
                                                                                    <input type="hidden" name="employee_id" value="<?php echo $select_row['employee_id']?>">
                                                                                    <input type="hidden" name="category" value="<?php echo $select_row['category']?>">
                                                                                    <input type="hidden" name="position" value="<?php echo $select_row['job_title']?>">
                                                                                    <input type="hidden" name="project_title" value="<?php echo $select_row['shortlist_title']?>">
                                                                                    <input type="hidden" name="employee_status" value="<?php echo $select_row['employment_status']?>">
                                                                                    <input type="hidden" name="start_date" value="<?php echo $select_row['project_start_date']?>">
                                                                                    <input type="hidden" name="outlet" value="<?php echo htmlspecialchars($select_row['outlet']); ?>">

                                                                                    <div class="col-md-12 mt-2">
                                                                                        <input type="date" name="date_created" id="date_create" class="form-control" value="<?php echo $date_now; ?>" style="display: none !important;">
                                                                                    </div>
                                                                                    <div class="col-md-12 mt-2">
                                                                                        <label for="" class="form-label">Name</label>
                                                                                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $select_row['firstnameko'] . " " . $select_row['mnko'] . " " . $select_row['lastnameko'] . " " . $select_row['extnname'] ?>" readonly>
                                                                                    </div>
                                                                                    <div class="col-md-12 mt-2">
                                                                                        <label for="" class="form-label">Types of Separation</label>
                                                                                        <input list="type_of_separations" id="type_of_separation" class="form-control" name="type_of_separations" required>
                                                                                        <datalist id="type_of_separations">
                                                                                            <?php 
                                                                                                $select_type = "SELECT * FROM types_of_separation";
                                                                                                $select_type_result = $link->query($select_type);
                                                                                                while($select_type_row = $select_type_result->fetch_assoc()){
                                                                                            ?>
                                                                                            <option value="<?php echo $select_type_row['type'];?>"><?php echo $select_type_row['type'];?></option>
                                                                                            <?php }?>
                                                                                        </datalist>
                                                                                    </div>
                                                                                    <div class="col-md-12 mt-2">
                                                                                        <label for="" class="form-label">Reason</label>
                                                                                        <textarea name="reason_of_separation" id="reason_of_separation" class="form-control" cols="30" rows="3"></textarea>
                                                                                    </div>
                                                                                    <div class="col-md-12 mt-2">
                                                                                        <label for="" class="form-label">Effectivity Date</label>
                                                                                        <input type="date" name="effectivity_date" id="effectivity_date" class="form-control" required>
                                                                                    </div>
                                                                                    <div class="col-md-12 mt-2">
                                                                                        <label for="" class="form-label">Process By</label>
                                                                                        <input type="text" name="process_by" id="process_by" class="form-control" value="<?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'];?>" readonly>
                                                                                    </div>
                                                                                    <div class="col-md-12 mt-2">
                                                                                        <label for="" class="form-label">Attach File/s</label>
                                                                                        <input type="file" name="files[]" id="files" class="form-control" multiple required>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" name="insert_typeBtn" class="btn btn-primary">Process</button>
                                                                        </div>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>





                                                        <?php } else { ?>
                                                            <button type="button" name="deploy" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateDeployModal-<?php echo $rows['id'] ?>" style="visibility: hidden !important;"></button>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <!-- IF HINDI PA NADEDEPLOY -->
                                            <?php
                                            } elseif ($rows['deployment_status'] === 'FOR DEPLOYMENT' && $rows['for_loa_status'] === "FOR LOA") { ?>
                                                <tr>
                                                    <td><?php echo $rows['id'] ?></td>
                                                    <td><?php echo $rows['lastnameko'], ", " . $rows['firstnameko'] . " " . $rows['mnko'] ?></td>
                                                    <td><?php echo $rows['sssnum'] ?></td>
                                                    <td><?php echo $rows['pagibignum'] ?></td>
                                                    <td><?php echo $rows['phnum'] ?></td>
                                                    <td><?php echo $rows['tinnum'] ?></td>
                                                    <td><?php echo $formattedDate_birthday ?></td>
                                                    <td><?php echo $rows['cpnum'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?php echo $rows['ewbdeploy'] ?></td>
                                                    <td><?php echo $rows['remarks'] ?></td>
                                                    <td>
                                                        <?php if ($rows['deployment_status'] === 'FOR DEPLOYMENT' && $rows['for_loa_status'] === "FOR LOA") { ?>
                                                            <input type="hidden" name="deployID" id="deployID" class="deployID" value="<?php echo $rows['id'] ?>">
                                                            <button type="button" name="deploy" class="btn btn-primary btn-sm open-modal" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Deploy and Appoint LOA"><i class="bi bi-folder-check"></i></button>
                                                        <?php } else { ?>
                                                            <button type="button" name="deploy" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deployModal-<?php echo $rows['id'] ?>" style="visibility: hidden !important;">Not empty</button>
                                                        <?php } ?>

                                                    </td>

                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>




                                <!-- Modal for Deployment and Appoint LOA form -->
                                <div class="modal fade" id="deployModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-2" id="exampleModalLabel">LOA</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                            </div>
                                        </div>
                                        <!-- End of Modal -->


                                        <hr>

                                    </div>
                                </div>

                                <!-- Modal for Deployment form -->
                                <div class="modal fade" id="updateDeployModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-2" id="exampleModalLabel">LOA</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

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