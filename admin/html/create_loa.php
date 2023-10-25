<?php
    session_start();
    include '../../connect.php';

if(isset($_SESSION['username'], $_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Other bootstrap links -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="../assets/js/config.js"></script>
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
                    <center>
                        <div class="card">
                            <div class="container">
                                <hr>
                                <div class="title">
                                    <h4 class="fs-4">
                                        LOA Maintenance - Word
                                    </h4>
                                </div>
                                <hr>
                                <form action="" method="POST" class="form-group row mt-2">
                                    <div class="row mt-5">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">LOA Format Name *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="loa_title" id="loa_title" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Division *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="division" id="division" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Upload File</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="file" name="template" id="template" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Applicant Name *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="applicant_name" id="applicant_name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Applicant Address *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="applicant_address" id="applicant_address" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Client Name *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="client_name" id="client_name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Place Assigned *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="place_assigned" id="place_assigned" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Address Assigned *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="address_assigned" id="address_assigned" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Job Title *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="job_title" id="job_title" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Employment Status *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="employment_status" id="employment_status" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Start Date *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="start_date" id="start_date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">End Date *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="end_date" id="end_date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Rate *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="rate" id="rate" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Communication Allowance *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="communication_allowance" id="communication_allowance" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Transportation Allowance</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="transportation_allowance" id="transportation_allowance" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Total Sum *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="total_sum" id="total_sum" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">E-cola *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="ecola" id="ecola" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Internet Allowance *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="internet_allowance" id="internet_allowance" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Meal Allowance *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="meal_allowance" id="meal_allowance" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Outbase Allowance *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="outbase_allowance" id="outbase_allowance" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Outlet *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="outbase" id="Outlet" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">No. of Days Work *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="no_of_work_days" id="no_of_work_days" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Issued Day *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="issued_date" id="issued_date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Issued Month *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="issued_month" id="issued_month" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Issued Year *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="issued_year" id="issued_year" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Prepared By: </label>
                                        </div>
                                        <div class="col-md-5">

                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Deployment Personnel *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="deployment_personnel" id="deployment_personnel" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Designation *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="designation" id="designation" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Endorsed By: </label>
                                        </div>
                                        <div class="col-md-5">

                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Project Supervisor *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="project_supervisor_endorsed" id="project_supervisor_endorsed" class="form-control"> 
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Designation *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="project_supervisor_endorsed_designation" id="project_supervisor_endorsed_designation" class="form-control">   
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Approved By:</label>
                                        </div>
                                        <div class="col-md-5">
                                            
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Head *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="head" id="head" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Designation *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="head_designation" id="head_designation" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Project Supervisor *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="project_supervisor_approved" id="project_supervisor_approved" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Designation *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="project_supervisor_approved_designation" id="project_supervisor_approved_designation" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">SSS *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="sss" id="sss" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">PhilHealth *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="philhealth" id="philhealth" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Pag-IBIG *</label>
                                        </div>
                                        <div class="col-md-5">
                                        <input type="text" name="pagibig" id="pagibig" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">TIN *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="tin" id="tin" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Applicant ID *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="applicant_id" id="applicant_id" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Applicant Contact Number *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="applicant_contact" id="applicant_contact" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">ID# *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="id" id="id" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">LOA Tracker *</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="loa_tracker" id="loa_tracker" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3 mb-3">
                                        <button type="submit" class="btn btn-primary" name="create_loa">Save</button>
                                    </div>  
                                </form>
                            </div>
                        </div>
                    </center>
                </div>


            </div>
            <!-- End of Main page -->
        </div>
    </div>

    <?php include '../components/footer.php'; ?>
</body>

</html>
<?php 
}
else{
    header("Location: ../../index.php");
    exit(0);
}
?>