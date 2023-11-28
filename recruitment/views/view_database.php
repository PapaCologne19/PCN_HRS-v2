<?php
session_start();
include '../../connect.php';

if(isset($_SESSION['username'], $_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    <title>View Database</title>
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
                <div class="content-wrapper mt-2">
                    <div class="container">
                        <div class="card">
                            <div class="container">
                                <hr>
                                <div class="title justify-content-center align-items-center mx-auto text-center">
                                    <h4 class="fs-4">
                                        APPLICANT DATABASE
                                    </h4>
                                </div>
                                <hr>

                                <form action="" method="get" class="form-group row">
                                    <div class="col-md-2">
                                        <label for="" class="form-label">From</label>
                                        <input type="date" name="from_date" id="from_date" class="form-control" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="form-label">To</label>
                                        <input type="date" name="to_date" id="to_date" class="form-control">
                                    </div>
                                    <div class="col-md-8">
                                        <input type="hidden">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <select name="status" id="status" class="form-select">
                                            <option value="">Select Status</option>
                                            <option value="QUALIFIED">PASSED</option>
                                            <option value="NOT QUALIFIED">REJECTED</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="hidden">
                                    </div>
                                    <div class="col-md-12 mt-3 mb-5">
                                        <button type="submit" name="search_applicant" class="btn btn-primary">Search</button>
                                    </div>
                                </form>


                                <!-- Table for Showing Results -->
                                <?php 
                                    if(isset($_GET['search_applicant'])){
                                        $from = $_GET['from_date'];
                                        $to = $_GET['to_date'];
                                        $status = $_GET['status'];
                                ?>
                                <a href="download_reports.php?status=<?php echo $status?>&from=<?php echo $from?>&to=<?php echo $to?>" class="btn btn-dark mb-4"><i class="bi bi-cloud-download"></i> Export</a>
                                <table id="example" class="table" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th> Applicant No. </th>
                                            <th> Applicant Name </th>
                                            <th> Email </th>
                                            <th> Contact No. </th>
                                            <th> Birthday </th>
                                            <th> Project </th>
                                            <th> Status </th>
                                            <th> Date Approved </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        $search = "SELECT * FROM applicant_resume 
                                        WHERE ('$status' = '' OR status = '$status') 
                                        AND (
                                             (recruitment_action_date BETWEEN '$from' AND '$to')
                                             OR ('$from' <> '' AND '$to' = '' AND recruitment_action_date >= '$from')
                                             OR ('$from' = '' AND '$to' <> '' AND recruitment_action_date <= '$to')
                                             OR ('$from' = '' AND '$to' = '')
                                        )";
                             
                             
                             
                                        $search_result = $link->query($search);
                                        if($search_result->num_rows > 0){
                                            while($search_row = $search_result->fetch_assoc()){
                                            $applicant_id = $search_row['applicant_id'];

                                        $applicant = "SELECT applicant.*, resumes.*, project.*, applicant.id AS applicant_number, resumes.status AS resume_status
                                        FROM applicant applicant, applicant_resume resumes, projects project
                                        WHERE applicant.id = resumes.applicant_id
                                        AND project.id = resumes.project_id
                                        AND applicant.id = '$applicant_id'";
                                        $resultx = mysqli_query($link, $applicant);
                                        while ($rowx = mysqli_fetch_assoc($resultx)) {
                                        ?>
                                            <tr>
                                                <td> <?php echo $rowx['applicant_number'] ?> </td>
                                                <td> <?php echo $rowx['lastname'] . ", " . $rowx['firstname'] . " " . $rowx['middlename'] . " " . $rowx['extension_name'] ?> </td>
                                                <td> <?php echo $rowx['email_address'] ?> </td>
                                                <td> <?php echo $rowx['mobile_number'] ?> </td>
                                                <td> <?php echo $rowx['birthday']; ?> </td>
                                                <td> <?php echo $rowx['project_title']; ?> </td>
                                                <td> <?php echo $rowx['resume_status']; ?> </td>
                                                <td> <?php echo $rowx['recruitment_action_date']; ?> </td>
                                            </tr>
                                        <?php
                                        } } }
                                        else{
                                            echo "No record found";
                                        }?>

                                    </tbody>
                                </table>
                                <?php }?>
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
}
else{
    header("Location: ../../index.php");
    session_destroy();
    exit(0);
}
?>