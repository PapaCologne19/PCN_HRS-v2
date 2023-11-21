<?php
include 'connect.php';
session_start();

date_default_timezone_set('Asia/Hong_Kong');
$datenow = date("m/d/Y");

if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include '../components/header.php'; ?>

    <head>

        <title>Request LOA</title>
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

                <div class="layout-page">
                    <?php include '../components/navbar.php'; ?>

                    <!-- Content -->
                    <div class="content-wrapper mt-3">
                        <div class="container">
                            <div class="card">
                                <div class="container">
                                    <hr>
                                    <div class="title justify-content-center align-items-center mx-auto text-center">
                                        <h4 class="fs-4">
                                            REQUEST LOA
                                        </h4>
                                    </div>
                                    <hr>

                                    <form action="action.php" method="post" class="form-group row" id="form_request_loa">

                                        <div class="container mt-3 mb-5">
                                            <button type="button" class="btn btn-primary" id="add_request_loa" data-bs-toggle="modal" data-bs-target="#add_request_loa_modal">Add Request LOA</button>
                                        </div>

                                        <div class="container mb-4">
                                            <input type="checkbox" class="form-check-input" name="select-all" id="select-all">
                                            <label for="" class="form-check-label">Select All</label>
                                        </div>

                                        <table class="table" id="example">
                                            <thead>
                                                <tr>
                                                    <th>

                                                    </th>
                                                    <th>Applicant Name</th>
                                                    <th>Gender</th>
                                                    <th>Age</th>
                                                    <th>Contact Number</th>
                                                    <th>Date Applied</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $id = $_GET['id'];
                                                $query = "SELECT employees.*, project.*, shortlist.*, shortlist.id AS shortlist_id  
                                                      FROM employees employees, projects project, shortlist_master shortlist
                                                      WHERE employees.id = shortlist.employee_id 
                                                      AND project.project_title = shortlist.shortlistnameto 
                                                      AND project.id = '$id'";
                                                $result = $link->query($query);
                                                while ($row = $result->fetch_assoc()) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="form-check-control" name="applicants[]" value="<?php echo $row['employee_id'] . " | " . $row['shortlist_id']; ?>">
                                                        </td>

                                                        <td><?php echo $row['lastnameko'] . ", " . $row['firstnameko'] . " " . $row['mnko'] . " " . $row['extnname']?></td>
                                                        <td><?php echo $row['gendern'] ?></td>
                                                        <td><?php echo $row['age'] ?></td>
                                                        <td><?php echo $row['cpnum'] ?></td>
                                                        <td><?php echo $row['dapplied'] ?></td>


                                                        <td>
                                                            <div class="contain">
                                                                <?php
                                                                if ($row['status'] === 'QUALIFIED' && $row['project_status'] === 'PENDING') {
                                                                ?>
                                                                    <div class="columns">
                                                                        <input type="hidden" class="approve_applicants_ID" value="<?php echo $row['id'] ?>">
                                                                        <button type="button" class="btn btn-primary btn-sm btnApprove btntooltips" id="btnApprove" title="Search">Deploy</button>
                                                                    </div>
                                                                    <div class="columns">
                                                                        <input type="hidden" class="editID" value="<?php echo $row['id'] ?>">
                                                                        <button type="button" class="btn btn-danger btn-sm btnReject btntooltips" id="btnReject" title="Search">Reject</button>
                                                                    </div>

                                                                <?php
                                                                } else {
                                                                ?>

                                                                <?php } ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                        <!-- Modal for adding request LOA-->
                                        <div class="modal fade" id="add_request_loa_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <?php
                                                        $select_project = "SELECT employees.*, project.*, shortlist.*, shortlist.id AS shortlist_id
                                                        FROM employees employees, projects project, shortlist_master shortlist
                                                        WHERE employees.id = shortlist.employee_id 
                                                        AND project.project_title = shortlist.shortlistnameto 
                                                        AND project.id = '$id'";
                                                        $select_project_result = $link->query($select_project);
                                                        $select_project_row = $select_project_result->fetch_assoc();
                                                        $appno = $select_project_row['appno'];


                                                        ?>
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $select_project_row['project_title']; ?></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <?php

                                                    $project_title = $select_project_row['project_title'];
                                                    $query_select = "SELECT shortlist.*, employee.* 
                                                        FROM shortlist_master shortlist, employees employee
                                                        WHERE shortlist.employee_id = employee.id 
                                                        AND shortlistnameto = '$project_title'";
                                                    $query_select_result = $link->query($query_select);
                                                    $query_select_row = $query_select_result->fetch_assoc();
                                                    ?>
                                                    <div class="modal-body">
                                                        <div class="row mt-3">
                                                            <div class="col-md-3">
                                                                <label for="" class="form-label">Category</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <select name="category" id="category" class="form-select" required>
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $querys = "SELECT * FROM categories";
                                                                    $results = $link->query($querys);
                                                                    while ($rowsss = $results->fetch_assoc()) {
                                                                    ?>
                                                                        <option value="<?php echo $rowsss['description'] ?>"><?php echo $rowsss['description'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                            <input type="hidden" name="employee_id" value="<?php echo $query_select_row['employee_id'] ?>">
                                                            <input type="hidden" name="project_id" value="<?php echo $id ?>">
                                                            <input type="hidden" name="project_title" value="<?php echo $query_select_row['project_title'] ?>">


                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label for="" class="form-label">LOA Date Start</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input type="date" name="start_date" class="form-control" id="start_date">
                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label for="" class="form-label">LOA Date End</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input type="date" name="end_date" class="form-control" id="end_date">
                                                                </div>
                                                            </div>



                                                        <?php
                                                        $shortlist_title = $query_select_row['shortlistnameto'];
                                                        $queries = "SELECT * FROM shortlist_details WHERE shortlistname = '$shortlist_title'";
                                                        $result_queries = $link->query($queries);
                                                        while ($fetch_row = $result_queries->fetch_assoc()) {
                                                            $project_title = $fetch_row['project'];
                                                            $mrf_tracking = $fetch_row['mrf_tracking'];
                                                        ?>


                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label for="" class="form-label">Channel</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <select name="channel" id="channel" class="form-select" required>
                                                                        <option value="">Select</option>
                                                                        <?php
                                                                        $channel_query = "SELECT * FROM channels";
                                                                        $channel_result = $link->query($channel_query);
                                                                        while ($channel_rows = $channel_result->fetch_assoc()) {
                                                                        ?>
                                                                            <option value="<?php echo $channel_rows['description'] ?>"><?php echo $channel_rows['description'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label for="" class="form-label">Employment Status</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <select name="employment_status" id="employment_status" class="form-select" required>
                                                                        <?php
                                                                        $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                        $mrf_result = $link->query($mrf_query);
                                                                        while ($mrf_row = $mrf_result->fetch_assoc()) {
                                                                            $status = ucwords(strtolower($mrf_row['employment_stat']));
                                                                        ?>
                                                                            <option value="<?php echo ucwords(strtolower($mrf_row['employment_stat'])); ?>"><?php echo $status; ?></option>
                                                                        <?php } ?>
                                                                        <?php
                                                                        $emp_query = "SELECT * FROM employment_status";
                                                                        $emp_result = $link->query($emp_query);
                                                                        while ($emp_row = $emp_result->fetch_assoc()) {
                                                                        ?>
                                                                            <option value="<?php echo ucwords(strtolower($emp_row['name'])) ?>"><?php echo ucwords(strtolower($emp_row['name'])) ?></option>
                                                                        <?php } ?>
                                                                    </select>

                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label for="" class="form-label">Position</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <select name="job_title" id="job_title" class="form-select" required>
                                                                        <?php
                                                                        $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                        $mrf_result = $link->query($mrf_query);
                                                                        while ($mrf_row = $mrf_result->fetch_assoc()) {
                                                                        ?>
                                                                            <option value="<?php echo $mrf_row['position'] ?>"><?php echo $mrf_row['position'] ?></option>
                                                                        <?php } ?>
                                                                        <?php
                                                                        $job_title_query = "SELECT * FROM job_title";
                                                                        $job_title_result = $link->query($job_title_query);
                                                                        while ($job_title_row = $job_title_result->fetch_assoc()) {
                                                                        ?>
                                                                            <option value="<?php echo $job_title_row['description'] ?>"><?php echo $job_title_row['description'] ?></option>
                                                                        <?php } ?>
                                                                    </select>

                                                                </div>
                                                            </div>


                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label for="" class="form-label">Basic Salary</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <?php
                                                                    $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                    $mrf_result = $link->query($mrf_query);
                                                                    while ($mrf_row = $mrf_result->fetch_assoc()) {
                                                                    ?>
                                                                        <input type="text" name="basic_salary" id="basic_salary" class="form-control" value="<?php echo $mrf_row['basic_salary'] ?>" required>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label for="" class="form-label">Ecola</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input type="text" name="ecola" id="ecola" class="form-control" value="0">
                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label for="" class="form-label">Communication Allowance</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <?php
                                                                    $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                    $mrf_result = $link->query($mrf_query);
                                                                    while ($mrf_row = $mrf_result->fetch_assoc()) {
                                                                    ?>
                                                                        <input type="text" name="communication_allowance" id="communication_allowance" class="form-control" value="<?php echo $mrf_row['comm'] ?>">
                                                                    <?php } ?>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label for="" class="form-label">Transportation</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <?php
                                                                    $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                    $mrf_result = $link->query($mrf_query);
                                                                    while ($mrf_row = $mrf_result->fetch_assoc()) {
                                                                    ?>
                                                                        <input type="text" name="transportation_allowance" id="transportation_allowance" class="form-control" value="<?php echo $mrf_row['transpo'] ?>">
                                                                    <?php } ?>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label for="" class="form-label">Internet Allowance</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input type="text" name="internet_allowance" id="internet_allowance" class="form-control" value="0">
                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label for="" class="form-label">Meal Allowance</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <?php
                                                                    $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                    $mrf_result = $link->query($mrf_query);
                                                                    while ($mrf_row = $mrf_result->fetch_assoc()) {
                                                                    ?>
                                                                        <input type="text" name="meal_allowance" id="meal_allowance" class="form-control" value="<?php echo $mrf_row['meal'] ?>">
                                                                    <?php } ?>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label for="" class="form-label">Outbase Meal</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input type="text" name="outbase_meal" id="outbase_meal" class="form-control" value="0">
                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label for="" class="form-label">Special Allowance</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input type="text" name="special_allowance" id="special_allowance" class="form-control" value="0">
                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label for="" class="form-label">Position Allowance</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input type="text" name="position_allowance" id="position_allowance" class="form-control" value="0">
                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label for="" class="form-label">No. of Days work</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <?php
                                                                    $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                    $mrf_result = $link->query($mrf_query);
                                                                    while ($mrf_row = $mrf_result->fetch_assoc()) {
                                                                    ?>
                                                                        <input type="text" name="no_of_days" id="no_of_days" class="form-control" value="<?php echo $mrf_row['work_days'] ?>">
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label for="" class="form-label">Outlet</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <?php
                                                                    $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                    $mrf_result = $link->query($mrf_query);
                                                                    while ($mrf_row = $mrf_result->fetch_assoc()) {

                                                                        $outlet = $mrf_row['outlet'];
                                                                        $html = '';
                                                                        if (!empty($outlet)) {
                                                                            $data = json_decode($outlet, true);
                                                                            if (!empty($data['ops'])) {
                                                                                $html = '<ul>';
                                                                                foreach ($data['ops'] as $op) {
                                                                                    if (!empty($op['insert'])) {
                                                                                        $text = trim($op['insert']);
                                                                                        $attributes = isset($op['attributes']) ? $op['attributes'] : []; // Check if 'attributes' key exists
                                                                                        if (!empty($attributes) && isset($attributes['list']) && $attributes['list'] == 'bullet' && !empty($text)) {
                                                                                            $html .= '<li>' . $text . '</li>';
                                                                                        } elseif (!empty($text)) {
                                                                                            $html .= '<li>' . $text . '</li>';
                                                                                        }
                                                                                    }
                                                                                }
                                                                                $html .= '</ul>';
                                                                            }
                                                                        }

                                                                    ?>
                                                                        <div id="editor"><?php echo $html ?></div>
                                                                        <textarea name="outlet" id="outlet" style="position: absolute; left: -9999px;"></textarea>
                                                                <?php }
                                                                } ?>
                                                                </div>
                                                            </div>


                                                            <div class="row mt-3">
                                                                <div class="col-md-9">
                                                                    <?php
                                                                    $mrf_query1 = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                    $mrf_result1 = $link->query($mrf_query1);
                                                                    while ($mrf_row1 = $mrf_result1->fetch_assoc()) {
                                                                    ?>
                                                                        <input type="hidden" name="division" id="division" class="form-control" value="<?php echo $mrf_row1['division'] ?>" readonly>
                                                                    <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <div class="row mt-3">
                                                                <div class="col-md-9">
                                                                    <?php
                                                                    $locator = '';
                                                                    $querys_locator = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                    $result_locator = $link->query($querys_locator);
                                                                    while ($row_locator = $result_locator->fetch_assoc()) {
                                                                        $division = $row_locator['division'];
                                                                        $year = date("Y");
                                                                        $locator = $year . "_" . $division . "_" . $appno;
                                                                    }

                                                                    ?>
                                                                    <input type="hidden" name="locator" id="locator" class="form-control" value="<?php echo $locator; ?>" style="display: none !important;">
                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-9">
                                                                    <?php
                                                                    $querys_emp_stat = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                    $result_emp_stat = $link->query($querys_emp_stat);
                                                                    while ($row_emp_stat = $result_emp_stat->fetch_assoc()) {
                                                                        $employment_status = $row_emp_stat['client'];
                                                                    }

                                                                    ?>
                                                                    <input type="hidden" name="client_name" id="client_name" class="form-control" value="<?php echo $employment_status; ?>" style="display: none !important;">
                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-9">
                                                                    <?php
                                                                    $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                    $mrf_result = $link->query($mrf_query);
                                                                    while ($mrf_row = $mrf_result->fetch_assoc()) {
                                                                    ?>
                                                                        <input type="hidden" name="place_assigned" id="place_assigned" value="<?php echo $mrf_row['project_title'] ?>" class="form-control" style="display: none !important;">
                                                                    <?php } ?>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-9">
                                                                    <?php
                                                                    $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                    $mrf_result = $link->query($mrf_query);
                                                                    while ($mrf_row = $mrf_result->fetch_assoc()) {
                                                                    ?>
                                                                        <input type="hidden" name="address_assigned" id="address_assigned" value="<?php echo $mrf_row['client_address'] ?>" class="form-control" style="display: none !important;">
                                                                    <?php } ?>
                                                                </div>
                                                            </div>



                                                            <div class="row mt-3">
                                                                <div class="col-md-9">
                                                                    <select name="department" id="department" class="form-select" style="display: none !important;">
                                                                        <?php
                                                                        $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                        $mrf_result = $link->query($mrf_query);
                                                                        while ($mrf_row = $mrf_result->fetch_assoc()) {
                                                                            $status = ucwords(strtolower($mrf_row['employment_stat']));
                                                                        ?>
                                                                            <option value="<?php echo $mrf_row['department'] ?>"><?php echo $mrf_row['department'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>


                                                    </div>
                                                    <?php ?>
                                                    <div class="modal-footer mt-5">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="add_request_loa_btn" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add this script block after your HTML content -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const selectAll = document.getElementById('select-all');
                const userCheckboxes = document.querySelectorAll('input[name="applicants[]"]');
                const someElement = document.getElementById('form_request_loa'); // Replace 'your-form-id' with the actual ID of your form

                // Check if 'selectAll' exists before adding an event listener
                if (selectAll) {
                    selectAll.addEventListener('change', function() {
                        userCheckboxes.forEach((checkbox) => {
                            checkbox.checked = selectAll.checked;
                        });
                    });
                }

                // Add event listeners to user checkboxes to track selections
                userCheckboxes.forEach((checkbox) => {
                    checkbox.addEventListener('change', function() {
                        // Check if at least one user checkbox is checked
                        const atLeastOneChecked = Array.from(userCheckboxes).some((cb) => cb.checked);

                        // Update "Select All" accordingly
                        if (selectAll) {
                            selectAll.checked = atLeastOneChecked && [...userCheckboxes].every((cb) => cb.checked);
                        }
                    });
                });

                // Add event listener for form submission
                if (someElement) {
                    someElement.addEventListener('submit', function(event) {
                        const atLeastOneChecked = Array.from(userCheckboxes).some((cb) => cb.checked);

                        if (!atLeastOneChecked) {
                            alert('Please select at least one recipient');
                            event.preventDefault(); // Prevent the default action (e.g., form submission)
                        }
                    });
                }
            });

            // For QUILL
            var quill = new Quill('#editor', {
                placeholder: 'Type outlet here...',
                theme: 'snow',
                debug: 'info',
            });

            $('form').submit(function(event) {
                $('#outlet').val(JSON.stringify(quill.getContents()));
                return true;
            });
        </script>

        <?php include '../components/footer.php'; ?>
    </body>

    </html>
<?php
} else {
    header('Location: ../../index.php');
    session_destroy();
    exit();
}
?>