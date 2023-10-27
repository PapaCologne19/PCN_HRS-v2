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
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <?php include '../components/sidebar.php'; ?>

                <!-- Main page -->
                <div class="layout-page">
                    <?php include '../components/navbar.php'; ?>

                    <!-- Content -->
                    <div class="content-wrapper mt-5">
                        <div class="containers">
                            <div class="card">
                                <?php
                                if (isset($_POST['view-shortlists'])) {
                                    $shortlist_id = $_POST['shortlist_id'];
                                    $_SESSION['shortlist_title'] = $_POST['shortlist_id'];
                                ?>
                                    <hr>
                                    <div class="title justify-content-center align-items-center mx-auto">
                                        <h4 class="fs-4">
                                            Deploy (<?php echo $shortlist_id ?>)
                                        </h4>
                                    </div>
                                    <table class="table" id="example" style="font-size: 13px !important;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>App No.</th>
                                                <th>Name</th>
                                                <th>SSS</th>
                                                <th>Pag-IBIG</th>
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
                                            $queries = "SELECT shortlist.*, employee.* 
                                                    FROM shortlist_master shortlist, employees employee
                                                    WHERE shortlist.employee_id = employee.id 
                                                    AND shortlistnameto = '$shortlist_id'";
                                            $results = $link->query($queries);

                                            while ($rows = $results->fetch_assoc()) {
                                                $birthday = $rows['birthday'];
                                                $timestamp_birthday = strtotime($birthday);
                                                $formattedDate_birthday = date("F d, Y", $timestamp_birthday);
                                                $id = $rows['id']; 
                                                
                                                if ($rows['deployment_status'] === 'DEPLOYED') {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $rows['id'] ?></td>
                                                        <td><?php echo $rows['appno'] ?></td>
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
                                                                while ($deployment_row = $deployment_result->fetch_assoc()){
                                                                    $loa_start_date = $deployment_row['loa_start_date'];
                                                                    $loa_end_date = $deployment_row['loa_end_date'];
                                                                    $dateObj = date_create_from_format('m-d-Y', $loa_start_date);
                                                                    $dateObj2 = date_create_from_format('m-d-Y', $loa_end_date);
                                                                    $formattedDate_start = date_format($dateObj, 'F j, Y');
                                                                    $formattedDate_end = date_format($dateObj2, 'F j, Y');
                                                            ?>
                                                        <td><?php echo $formattedDate_start;?></td>
                                                        <td><?php echo $formattedDate_end;?></td>
                                                        <td><?php echo $deployment_row['employment_status'];?></td>
                                                        <?php }?>
                                                        <td>DEPLOYED</td>
                                                        <td><?php echo $rows['remarks'] ?></td>
                                                        <td>
                                                            <?php if (!empty($rows['ewb_status'])) { ?>
                                                                <button type="button" name="deploy" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deployModal-<?php echo $rows['id'] ?>"><i class="bi bi-gear"></i></button> &nbsp;
                                                                <a href="download_loa.php?id=<?php echo $rows['id']?>" name="download_deploy" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Download LOA"><i class="bi bi-cloud-download"></i></a>
                                                                
                                                            <?php } else { ?>
                                                                <button type="button" name="deploy" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deployModal-<?php echo $rows['id'] ?>" style="visibility: hidden !important;"></button>
                                                            <?php } ?>
                                                        </td>

                                                        <!-- Modal for Deployment form -->
                                                        <div class="modal fade" id="deployModal-<?php echo $rows['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-2" id="exampleModalLabel">LOA</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <form action="action.php" method="POST">
                                                                                <?php
                                                                                $id =  $rows['id'];
                                                                                $data = $_SESSION['shortlist_title'];

                                                                                $query_show = "SELECT shortlist.*, employee.* 
                                                                            FROM shortlist_master shortlist, employees employee
                                                                            WHERE shortlist.employee_id = employee.id 
                                                                            AND shortlistnameto = '$data' AND employee.id = '$id'";
                                                                                $query_result = $link->query($query_show);
                                                                                while ($query_row = $query_result->fetch_assoc()) {
                                                                                    $appno = $query_row['appno'];
                                                                                ?>

                                                                                    <input type="hidden" name="id" value="<?php echo $query_row["id"] ?>" />
                                                                                    <input type="hidden" name="appno" value="<?php echo $query_row["appno"] ?>" />
                                                                                    <input type="hidden" name="shortlist_title" value="<?php echo $data ?>" />
                                                                                    <input type="hidden" name="date_shortlisted" value="<?php echo $query_row["dateto"] ?>" />
                                                                                    <input type="hidden" name="status" id="status" class="form-control" value="DEPLOYED">

                                                                                    <div class="row mt-3 form-group">
                                                                                        <div class="col-md-3">
                                                                                            <label for="" class="form-label">Type</label>
                                                                                        </div>
                                                                                        <div class="col-md-9">
                                                                                            <select name="type" id="type" class="form-select">
                                                                                                <option value=""> Select</option>
                                                                                                <option value="NEW">NEW</option>
                                                                                                <option value="RENEWAL">RENEWAL</option>
                                                                                                <option value="REHIRED">REHIRED (new)</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3 form-group">
                                                                                        <div class="col-md-3">
                                                                                            <label for="" class="form-label">LOA Start Date</label>
                                                                                        </div>
                                                                                        <div class="col-md-9">
                                                                                            <input type="date" name="start_loa" id="myDate" placeholder="Select start date" class="form-control" required>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-3">
                                                                                            <label for="" class="form-label">LOA End Date</label>
                                                                                        </div>
                                                                                        <div class="col-md-9">
                                                                                            <input type="date" name="end_loa" id="myDate" placeholder="Select end date" class="form-control" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php
                                                                                    $shortlist_title = $query_row['shortlistnameto'];
                                                                                    $queries = "SELECT * FROM shortlist_details WHERE shortlistname = '$shortlist_title'";
                                                                                    $result_queries = $link->query($queries);
                                                                                    while ($fetch_row = $result_queries->fetch_assoc()) {
                                                                                        $project_title = $fetch_row['project'];
                                                                                        $mrf_tracking = $fetch_row['mrf_tracking'];
                                                                                    ?>
                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Division</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <?php
                                                                                                $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                                                $mrf_result = $link->query($mrf_query);
                                                                                                while ($mrf_row = $mrf_result->fetch_assoc()) {
                                                                                                ?>
                                                                                                    <input type="text" name="division" id="division" class="form-control" value="<?php echo $mrf_row['division'] ?>" readonly>
                                                                                                <?php } ?>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

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
                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Locator</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <?php
                                                                                                $querys_locator = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                                                $result_locator = $link->query($querys_locator);
                                                                                                while ($row_locator = $result_locator->fetch_assoc()) {
                                                                                                    $division = $row_locator['division'];
                                                                                                    $year = date("Y");
                                                                                                    $locator = $year . "_" . $division . "_" . $appno;
                                                                                                }

                                                                                                ?>
                                                                                                <input type="text" name="locator" id="locator" class="form-control" value="<?php echo $locator; ?>" readonly>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Employment Status</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <?php
                                                                                                $querys_emp_stat = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                                                $result_emp_stat = $link->query($querys_emp_stat);
                                                                                                while ($row_emp_stat = $result_emp_stat->fetch_assoc()) {
                                                                                                    $employment_status = $row_emp_stat['employment_stat'];
                                                                                                }

                                                                                                ?>
                                                                                                <input type="text" name="employment_status" id="employment_status" class="form-control" value="<?php echo $locator; ?>" readonly>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Place Assigned</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <?php
                                                                                                $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                                                $mrf_result = $link->query($mrf_query);
                                                                                                while ($mrf_row = $mrf_result->fetch_assoc()) {
                                                                                                ?>
                                                                                                    <input type="text" name="place_assigned" id="place_assigned" value="<?php echo $mrf_row['project_title'] ?>" class="form-control" readonly>
                                                                                                <?php } ?>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Address Assigned</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <?php
                                                                                                $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                                                $mrf_result = $link->query($mrf_query);
                                                                                                while ($mrf_row = $mrf_result->fetch_assoc()) {
                                                                                                ?>
                                                                                                    <input type="text" name="address_assigned" id="address_assigned" value="<?php echo $mrf_row['client_address'] ?>" class="form-control" readonly>
                                                                                                <?php } ?>
                                                                                            </div>
                                                                                        </div>

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
                                                                                                <label for="" class="form-label">Department</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <select name="department" id="department" class="form-select" required>
                                                                                                    <option value="">Select</option>
                                                                                                    <?php
                                                                                                    $mrf_query = "SELECT * FROM department";
                                                                                                    $mrf_result = $link->query($mrf_query);
                                                                                                    while ($mrf_row = $mrf_result->fetch_assoc()) {
                                                                                                    ?>
                                                                                                        <option value="<?php echo $mrf_row['description'] ?>"><?php echo $mrf_row['description'] ?></option>
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
                                                                                                        <option value="<?php echo ucfirst($mrf_row['employment_stat']); ?>"><?php echo $status; ?></option>
                                                                                                    <?php } ?>
                                                                                                    <?php
                                                                                                    $emp_query = "SELECT * FROM employment_status";
                                                                                                    $emp_result = $link->query($emp_query);
                                                                                                    while ($emp_row = $emp_result->fetch_assoc()) {
                                                                                                    ?>
                                                                                                        <option value="<?php echo $emp_row['name'] ?>"><?php echo $emp_row['name'] ?></option>
                                                                                                    <?php } ?>
                                                                                                </select>

                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Job Title</label>
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
                                                                                                <label for="" class="form-label">LOA Template</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <select name="loa_template" id="loa_template" class="form-select" required>
                                                                                                    <option value="">Select</option>
                                                                                                    <?php
                                                                                                    $select_loa = "SELECT loa_main.*, loa_files.*
                                                                                                FROM loa_maintenance_word loa_main, loa_files loa_files
                                                                                                WHERE loa_files.loa_main_id = loa_main.id AND status = '1'";
                                                                                                    $seleted_loa_result = $link->query($select_loa);
                                                                                                    while ($selected_loa_row = $seleted_loa_result->fetch_assoc()) {
                                                                                                    ?>
                                                                                                        <option value="<?php echo $selected_loa_row['file_name'] ?>"><?php echo $selected_loa_row['loa_name'] ?></option>
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
                                                                                                <input type="text" name="ecola" id="ecola" class="form-control">
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
                                                                                                <input type="text" name="internet_allowance" id="internet_allowance" class="form-control">
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
                                                                                                <input type="text" name="outbase_meal" id="outbase_meal" class="form-control">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Special Allowance</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="special_allowance" id="special_allowance" class="form-control">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Position Allowance</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="position_allowance" id="position_allowance" class="form-control">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Deployment Remarks</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="deployment_remarks" id="deplyment_remarks" class="form-control">
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
                                                                                                ?>
                                                                                                    <input type="text" name="outlet" id="outlet" class="form-control" value="<?php echo $mrf_row['outlet'] ?>">
                                                                                                <?php } ?>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Supervisor</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="supervisor" id="supervisor" class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Field Supervisor</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="field_supervisor" id="field_supervisor" class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Designation</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="field_supervisor_designation" id="field_supervisor_designation" class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Deployment Personnel</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="deployment_personnel" id="deployment_personnel" class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Designation</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="deployment_personnel_designation" id="deployment_personnel_designation" class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Project Supervisor</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="project_supervisor" id="project_supervisor" class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Designation</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="project_supervisor_designation" id="project_supervisor_designation" class="form-control">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Head</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="head" id="head" class="form-control">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Designation</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="head_designation" id="head_designation" class="form-control">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">ID#</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="loa_id" id="loa_id" class="form-control">
                                                                                            </div>
                                                                                        </div>

                                                                                <?php }
                                                                                } ?>

                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary" name="create_loa">Save changes</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </tr>
                                                <?php
                                                } else { ?>
                                                    <tr>
                                                        <td><?php echo $rows['id'] ?></td>
                                                        <td><?php echo $rows['appno'] ?></td>
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
                                                            <?php if (!empty($rows['ewb_status'])) { ?>
                                                                <button type="button" name="deploy" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deployModal-<?php echo $rows['id'] ?>">Not empty</button>
                                                            <?php } else { ?>
                                                                <button type="button" name="deploy" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deployModal-<?php echo $rows['id'] ?>" style="visibility: hidden !important;">Not empty</button>
                                                            <?php } ?>
                                                        </td>

                                                        <!-- Modal for Deployment form -->
                                                        <div class="modal fade" id="deployModal-<?php echo $rows['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-2" id="exampleModalLabel">LOA</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <form action="action.php" method="POST">
                                                                                <?php
                                                                                $id =  $rows['id'];
                                                                                $data = $_SESSION['shortlist_title'];

                                                                                $query_show = "SELECT shortlist.*, employee.* 
                                                                            FROM shortlist_master shortlist, employees employee
                                                                            WHERE shortlist.employee_id = employee.id 
                                                                            AND shortlistnameto = '$data' AND employee.id = '$id'";
                                                                                $query_result = $link->query($query_show);
                                                                                while ($query_row = $query_result->fetch_assoc()) {
                                                                                    $appno = $query_row['appno'];
                                                                                ?>

                                                                                    <input type="hidden" name="id" value="<?php echo $query_row["id"] ?>" />
                                                                                    <input type="hidden" name="appno" value="<?php echo $query_row["appno"] ?>" />
                                                                                    <input type="hidden" name="shortlist_title" value="<?php echo $data ?>" />
                                                                                    <input type="hidden" name="date_shortlisted" value="<?php echo $query_row["dateto"] ?>" />
                                                                                    <input type="hidden" name="status" id="status" class="form-control" value="DEPLOYED">

                                                                                    <div class="row mt-3 form-group">
                                                                                        <div class="col-md-3">
                                                                                            <label for="" class="form-label">Type</label>
                                                                                        </div>
                                                                                        <div class="col-md-9">
                                                                                            <select name="type" id="type" class="form-select">
                                                                                                <option value=""> Select</option>
                                                                                                <option value="NEW">NEW</option>
                                                                                                <option value="RENEWAL">RENEWAL</option>
                                                                                                <option value="REHIRED">REHIRED (new)</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3 form-group">
                                                                                        <div class="col-md-3">
                                                                                            <label for="" class="form-label">LOA Start Date</label>
                                                                                        </div>
                                                                                        <div class="col-md-9">
                                                                                            <input type="date" name="start_loa" id="myDate" placeholder="Select start date" class="form-control" required>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-3">
                                                                                            <label for="" class="form-label">LOA End Date</label>
                                                                                        </div>
                                                                                        <div class="col-md-9">
                                                                                            <input type="date" name="end_loa" id="myDate" placeholder="Select end date" class="form-control" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php
                                                                                    $shortlist_title = $query_row['shortlistnameto'];
                                                                                    $queries = "SELECT * FROM shortlist_details WHERE shortlistname = '$shortlist_title'";
                                                                                    $result_queries = $link->query($queries);
                                                                                    while ($fetch_row = $result_queries->fetch_assoc()) {
                                                                                        $project_title = $fetch_row['project'];
                                                                                        $mrf_tracking = $fetch_row['mrf_tracking'];
                                                                                    ?>
                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Division</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <?php
                                                                                                $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                                                $mrf_result = $link->query($mrf_query);
                                                                                                while ($mrf_row = $mrf_result->fetch_assoc()) {
                                                                                                ?>
                                                                                                    <input type="text" name="division" id="division" class="form-control" value="<?php echo $mrf_row['division'] ?>" readonly>
                                                                                                <?php } ?>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

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
                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Locator</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <?php
                                                                                                $querys_locator = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                                                $result_locator = $link->query($querys_locator);
                                                                                                while ($row_locator = $result_locator->fetch_assoc()) {
                                                                                                    $division = $row_locator['division'];
                                                                                                    $year = date("Y");
                                                                                                    $locator = $year . "_" . $division . "_" . $appno;
                                                                                                }

                                                                                                ?>
                                                                                                <input type="text" name="locator" id="locator" class="form-control" value="<?php echo $locator; ?>" readonly>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <?php
                                                                                                $querys_emp_stat = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                                                $result_emp_stat = $link->query($querys_emp_stat);
                                                                                                while ($row_emp_stat = $result_emp_stat->fetch_assoc()) {
                                                                                                    $employment_status = $row_emp_stat['client'];
                                                                                                }

                                                                                                ?>
                                                                                                <input type="hidden" name="client_name" id="client_name" class="form-control" value="<?php echo $employment_status; ?>" readonly>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Place Assigned</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <?php
                                                                                                $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                                                $mrf_result = $link->query($mrf_query);
                                                                                                while ($mrf_row = $mrf_result->fetch_assoc()) {
                                                                                                ?>
                                                                                                    <input type="text" name="place_assigned" id="place_assigned" value="<?php echo $mrf_row['project_title'] ?>" class="form-control" readonly>
                                                                                                <?php } ?>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Address Assigned</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <?php
                                                                                                $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                                                                                $mrf_result = $link->query($mrf_query);
                                                                                                while ($mrf_row = $mrf_result->fetch_assoc()) {
                                                                                                ?>
                                                                                                    <input type="text" name="address_assigned" id="address_assigned" value="<?php echo $mrf_row['client_address'] ?>" class="form-control" readonly>
                                                                                                <?php } ?>
                                                                                            </div>
                                                                                        </div>

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
                                                                                                <label for="" class="form-label">Department</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <select name="department" id="department" class="form-select" required>
                                                                                                    <option value="">Select</option>
                                                                                                    <?php
                                                                                                    $mrf_query = "SELECT * FROM department";
                                                                                                    $mrf_result = $link->query($mrf_query);
                                                                                                    while ($mrf_row = $mrf_result->fetch_assoc()) {
                                                                                                    ?>
                                                                                                        <option value="<?php echo $mrf_row['description'] ?>"><?php echo $mrf_row['description'] ?></option>
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
                                                                                                        <option value="<?php echo ucfirst($mrf_row['employment_stat']); ?>"><?php echo $status; ?></option>
                                                                                                    <?php } ?>
                                                                                                    <?php
                                                                                                    $emp_query = "SELECT * FROM employment_status";
                                                                                                    $emp_result = $link->query($emp_query);
                                                                                                    while ($emp_row = $emp_result->fetch_assoc()) {
                                                                                                    ?>
                                                                                                        <option value="<?php echo $emp_row['name'] ?>"><?php echo $emp_row['name'] ?></option>
                                                                                                    <?php } ?>
                                                                                                </select>

                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Job Title</label>
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
                                                                                                <label for="" class="form-label">LOA Template</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <select name="loa_template" id="loa_template" class="form-select" required>
                                                                                                    <option value="">Select</option>
                                                                                                    <?php
                                                                                                    $select_loa = "SELECT loa_main.*, loa_files.*
                                                                                                FROM loa_maintenance_word loa_main, loa_files loa_files
                                                                                                WHERE loa_files.loa_main_id = loa_main.id AND status = '1'";
                                                                                                    $seleted_loa_result = $link->query($select_loa);
                                                                                                    while ($selected_loa_row = $seleted_loa_result->fetch_assoc()) {
                                                                                                    ?>
                                                                                                        <option value="<?php echo $selected_loa_row['id'] ?>"><?php echo $selected_loa_row['loa_name'] ?></option>
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
                                                                                                <input type="text" name="ecola" id="ecola" class="form-control">
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
                                                                                                <input type="text" name="internet_allowance" id="internet_allowance" class="form-control">
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
                                                                                                <input type="text" name="outbase_meal" id="outbase_meal" class="form-control">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Special Allowance</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="special_allowance" id="special_allowance" class="form-control">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Position Allowance</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="position_allowance" id="position_allowance" class="form-control">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Deployment Remarks</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="deployment_remarks" id="deplyment_remarks" class="form-control">
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
                                                                                                ?>
                                                                                                    <input type="text" name="outlet" id="outlet" class="form-control" value="<?php echo $mrf_row['outlet'] ?>">
                                                                                                <?php } ?>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Supervisor</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="supervisor" id="supervisor" class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Field Supervisor</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="field_supervisor" id="field_supervisor" class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Designation</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="field_supervisor_designation" id="field_supervisor_designation" class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Deployment Personnel</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="deployment_personnel" id="deployment_personnel" class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Designation</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="deployment_personnel_designation" id="deployment_personnel_designation" class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Project Supervisor</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="project_supervisor" id="project_supervisor" class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Designation</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="project_supervisor_designation" id="project_supervisor_designation" class="form-control">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Head</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="head" id="head" class="form-control">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">Designation</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="head_designation" id="head_designation" class="form-control">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mt-3">
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="form-label">ID#</label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <input type="text" name="loa_id" id="loa_id" class="form-control">
                                                                                            </div>
                                                                                        </div>

                                                                                <?php }
                                                                                } ?>

                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary" name="create_loa">Save changes</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </tr>
                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>


                                    <hr>

                            </div>
                        <?php } ?>
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
    $_SESSION['errorMessage'] = "Hacker ka 'no?";
    header("Location: ../../index.php");
    exit(0);
}
?>