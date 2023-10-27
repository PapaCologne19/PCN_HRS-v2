<?php
session_start();
include '../../connect.php';

if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php';?>
        <title>Create LOA</title>
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
                                    <form action="action.php" method="POST" class="form-group row mt-2" enctype="multipart/form-data">
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
                                                <select name="division" id="division" class="form-select" required>
                                                    <option value="">Select Division</option>
                                                    <?php 
                                                        $query = "SELECT * FROM divisions WHERE is_deleted = '0'";
                                                        $result = $link->query($query); 
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <option value="<?php echo $row['description']?>"><?php echo $row['description']?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Upload File</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="file" name="template" id="template" class="form-control" accept=".pdf, .doc, .docx" required>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Applicant Name *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="applicant_name" id="applicant_name" class="form-control" value="Value1" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Applicant Address *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="applicant_address" id="applicant_address" class="form-control" value="Value2" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Client Name *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="client_name" id="client_name" class="form-control" value="Value3" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Place Assigned *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="place_assigned" id="place_assigned" class="form-control" value="Value4" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Address Assigned *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="address_assigned" id="address_assigned" class="form-control" value="Value5" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Job Title *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="job_title" id="job_title" class="form-control" value="Value6" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Employment Status *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="employment_status" id="employment_status" class="form-control" value="Value7" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Start Date *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="start_date" id="start_date" class="form-control" value="Value8" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">End Date *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="end_date" id="end_date" class="form-control" value="Deo9" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Rate *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="rate" id="rate" class="form-control" value="Value10" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Communication Allowance *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="communication_allowance" id="communication_allowance" class="form-control" value="Value10a"  readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Transportation Allowance</label>
                                            </div>
                                            <div class="col-md-5"> 
                                                <input type="text" name="transportation_allowance" id="transportation_allowance" class="form-control" value="Value10b" readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Total Sum *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="total_sum" id="total_sum" class="form-control" value="TotalValue" readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">E-cola *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="ecola" id="ecola" class="form-control" value="Value10c" readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Internet Allowance *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="internet_allowance" id="internet_allowance" class="form-control" value="Value10d" readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Meal Allowance *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="meal_allowance" id="meal_allowance" class="form-control" value="Value10e" readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Outbase Allowance *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="outbase_allowance" id="outbase_allowance" class="form-control" value="Value10f" readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Special Allowance *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="special_allowance" id="special_allowance" class="form-control" value="Value10g" readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Position Allowance *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="position_allowance" id="position_allowance" class="form-control" value="Value10h" readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Outlet *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="outlet" id="Outlet" class="form-control" value="Value11a" readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">No. of Days Work *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="no_of_work_days" id="no_of_work_days" class="form-control" value="Value12" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Issued Day *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="issued_day" id="issued_day" class="form-control" value="Value13" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Issued Month *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="issued_month" id="issued_month" class="form-control" value="Value14" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Issued Year *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="issued_year" id="issued_year" class="form-control" value="Value15" required readonly>
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
                                                <input type="text" name="deployment_personnel" id="deployment_personnel" class="form-control" value="Value16" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Designation *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="deployment_personnel_designation" id="deployment_personnel_designation" class="form-control" value="Value17" required readonly>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Supervisor *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="deployment_supervisor" id="deployment_supervisor" class="form-control" value="Value18" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Designation *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="deployment_supervisor_designation" id="deployment_supervisor_designation" class="form-control" value="Value19" required readonly>
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
                                                <input type="text" name="project_supervisor_endorsed" id="project_supervisor_endorsed" class="form-control" value="Value20" readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Designation *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="project_supervisor_endorsed_designation" id="project_supervisor_endorsed_designation" class="form-control" value="Value21" readonly>
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
                                                <input type="text" name="head" id="head" class="form-control" value="Value22" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Designation *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="head_designation" id="head_designation" class="form-control" value="Value23" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Project Supervisor *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="project_supervisor_approved" id="project_supervisor_approved" class="form-control" value="Value24" readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Designation *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="project_supervisor_approved_designation" id="project_supervisor_approved_designation" class="form-control" value="Value25" readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">SSS *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="sss" id="sss" class="form-control" value="Value26" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">PhilHealth *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="philhealth" id="philhealth" class="form-control" value="Value27" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Pag-IBIG *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="pagibig" id="pagibig" class="form-control" value="Value28" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">TIN *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="tin" id="tin" class="form-control" value="Value29" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Applicant ID *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="applicant_id" id="applicant_id" class="form-control" value="Value30" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Applicant Contact Number *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="applicant_contact" id="applicant_contact" class="form-control" value="Value31" readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">ID# *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="id" id="id" class="form-control" value="Value32" readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">LOA Tracker *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="loa_tracker" id="loa_tracker" class="form-control" value="Value33" readonly>
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
} else {
    header("Location: ../../index.php");
    exit(0);
}
?>