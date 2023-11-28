<?php
session_start();
include '../../connect.php';
if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>
        <title>Manpower Request Forms</title>
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
                                            SUMMARY REPORT
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
                                                <option value="1">APPROVED</option>
                                                <option value="0">REJECTED</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="hidden">
                                        </div>
                                        <div class="col-md-12 mt-3 mb-5">
                                            <button type="submit" name="search_btn" class="btn btn-primary">Search</button>
                                        </div>
                                    </form>


                                    <?php
                                    if (isset($_GET['search_btn'])) {
                                        $from = $_GET['from_date'];
                                        $to = $_GET['to_date'];
                                        $status = $_GET['status'];
                                    ?>
                                    <a href="download_mrf_reports.php?status=<?php echo $status?>&from=<?php echo $from?>&to=<?php echo $to?>" class="btn btn-dark mb-4"><i class="bi bi-cloud-download"></i> Export</a>
                                        <table id="example" class="table" style="width:100%; font-size: 14px !important;">
                                            <thead>
                                                <tr>
                                                    <th> DATE ADDED </th>
                                                    <th> MRF ID </th>
                                                    <th> FILLED BY </th>
                                                    <th> LOCATION </th>
                                                    <th> PROJECT TITLE </th>
                                                    <th> POSITION </th>
                                                    <th> NEEDED </thh>
                                                    <th> PROVIDED </th>
                                                    <th> FOR SCREENING </th>
                                                    <th> STATUS </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $search = "SELECT * FROM mrf 
                                            WHERE ('$status' = '' OR is_approve = '$status') 
                                            AND (
                                                (DATE(date_added) BETWEEN '$from' AND '$to')
                                                OR ('$from' <> '' AND '$to' = '' AND DATE(date_added) >= '$from')
                                                OR ('$from' = '' AND '$to' <> '' AND DATE(date_added) <= '$to')
                                                OR ('$from' = '' AND '$to' = '')
                                            )";

                                                $search_result = $link->query($search);
                                                if ($search_result->num_rows > 0) {
                                                    while ($search_row = $search_result->fetch_assoc()) {
                                                        $mrf_id = $search_row['id'];

                                                        $query = "SELECT *,  DATE_FORMAT(mrf.date_added, '%M %d %Y') AS date_added FROM mrf WHERE is_deleted = '0' AND id = '$mrf_id' ORDER BY id DESC";
                                                        $result = mysqli_query($link, $query);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $uid1 = $row['uid'];
                                                            $fullname = $row['prepared_by'];

                                                            $project_title = $row['project_title'];
                                                            $needed = $row['np_male'] + $row['np_female'];

                                                            $selected = "SELECT mrf.*, project.*, resumes.* 
                                                            FROM mrf mrf, projects project, applicant_resume resumes 
                                                            WHERE mrf.tracking = project.mrf_tracking 
                                                            AND resumes.project_id = project.id 
                                                            AND project.project_title = '$project_title'
                                                            AND resumes.status = 'QUALIFIED'";

                                                            $selected_result = $link->query($selected);

                                                            $selected_screening = "SELECT mrf.*, project.*, resumes.*
                                                            FROM mrf mrf, projects project, applicant_resume resumes 
                                                            WHERE mrf.tracking = project.mrf_tracking 
                                                            AND resumes.project_id = project.id 
                                                            AND project.project_title = '$project_title'
                                                            AND resumes.status = 'FOR SCREENING'";

                                                            $selected_screening_result = $link->query($selected_screening);
                                                            $for_screening = $selected_screening_result->num_rows;
                                                            $selected_screening_row = $selected_screening_result->fetch_assoc();

                                                            $provided = $selected_result->num_rows;
                                                            $selected_row = $selected_result->fetch_assoc();

                                                ?>
                                                            <tr>
                                                                <td style=" text-align: center;"> <?php echo $row['date_added']; ?> </td>
                                                                <td> <?php echo $row['id'] ?> </td>
                                                                <td> <?php echo $row['prepared_by'] ?> </td>
                                                                <td> <?php echo $row['location'] ?> </td>
                                                                <td> <?php echo $row['project_title'] ?> </td>
                                                                <?php
                                                                if ($row['position'] === "OTHER") { ?>
                                                                    <td> <?php echo $row['position_detail'] ?> </td>
                                                                <?php  } else { ?>
                                                                    <td> <?php echo $row['position'] ?> </td>
                                                                <?php } ?>
                                                                <td style=" text-align: center;"> <?php echo $needed ?> </td>
                                                                <td style=" text-align: center;"> <?php echo $provided ?> </td>
                                                                <td style=" text-align: center;"> <?php echo $for_screening ?> </td>
                                                                <td style=" text-align: center;"> 
                                                                    <?php 
                                                                        if($row['is_approve'] === "1"){
                                                                            echo "<span class='badge rounded bg-success'>Approved</span>";
                                                                        }
                                                                        elseif($row['is_approve'] === "0"){
                                                                            echo "<span class='badge rounded bg-pending'>Pending</span>";
                                                                        }
                                                                        else{
                                                                            echo "<span class='badge rounded bg-danger'>Rejected</span>";
                                                                        }
                                                                    ?>
                                                                </td>

                                                            </tr>
                                                <?php }
                                                    }
                                                } else {
                                                    echo "No record found";
                                                } ?>

                                            </tbody>
                                        </table>
                                    <?php } ?>
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
    session_destroy();
    exit(0);
}
?>