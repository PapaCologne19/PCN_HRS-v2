<?php
session_start();
include '../../connect.php';
if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>
        <title>Expired LOA Report</title>
    </head>

    <body>
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <?php include '../components/sidebar.php'; ?>

                <!-- Main page -->
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
                                            EXPIRED LOA DATABASE
                                        </h4>
                                    </div>
                                    <hr>
                                    <div class="container mt-5 mb-5">
                                        <form action="" method="get" class="form-group row">
                                            <div class="col-md-4 mt-2 mb-3">
                                                <label for="" class="form-label">Project</label>
                                                <select name="project_title" id="project_title" class="form-select">
                                                    <option value="">Select</option>
                                                    <?php
                                                    $select = "SELECT * FROM projects WHERE is_deleted = '0'";
                                                    $select_result = $link->query($select);
                                                    while ($select_row = $select_result->fetch_assoc()) {
                                                    ?>
                                                        <option value="<?php echo $select_row['project_title']; ?>"><?php echo $select_row['project_title']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="hidden">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Expired Date</label>
                                                <input type="date" name="expired_date" id="expired_date" class="form-control" value="<?php echo date('Y-m-d') ?>" required>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="hidden">
                                            </div>
                                            <div class="col-md-8">
                                                <input type="hidden">
                                            </div>
                                            <div class="col-md-12 mt-3 mb-5">
                                                <button type="submit" name="search_btn" class="btn btn-primary">Search</button>
                                            </div>
                                        </form>
                                    </div>

                                    <?php
                                    if (isset($_GET['search_btn'])) {
                                        $from = $_GET['expired_date'];
                                        $project_title = $_GET['project_title'];
                                    ?>
                                        <a href="download_expired_loa_report.php?project_title=<?php echo $project_title ?>&expired_date=<?php echo $from ?>" class="btn btn-dark mb-4"><i class="bi bi-cloud-download"></i> Export</a>
                                        <table class="table" id="example">
                                            <thead>
                                                <tr>
                                                    <th>Date Created</th>
                                                    <th>LOA ID</th>
                                                    <th>Type</th>
                                                    <th>Category</th>
                                                    <th>Name</th>
                                                    <th>Project</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Employment Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $id = 0;

                                                $search = "SELECT *
                                                FROM deployment
                                                WHERE ('ACTIVE' = '' OR clearance = 'ACTIVE') 
                                                AND ('$project_title' = '' OR shortlist_title = '$project_title') 
                                                AND ('$from' <> '' AND loa_end_date <= '$from')";
                                                $search_result = $link->query($search);
                                                if ($search_result->num_rows > 0) {
                                                    while ($search_row = $search_result->fetch_assoc()) {
                                                        $deployment_id = $search_row['id'];

                                                        $query = "SELECT deployment.*, employee.*,
                                                        DATE_FORMAT(deployment.date_created, '%M %d, %Y') AS date_created 
                                                        FROM deployment deployment, employees employee
                                                        WHERE employee.id = deployment.employee_id 
                                                        AND deployment.is_deleted = '0'
                                                        AND deployment.id = '$deployment_id'";
                                                        $result = $link->query($query);
                                                        while ($row = $result->fetch_assoc()) {
                                                            $id++;
                                                            $start_date = $row['loa_start_date'];
                                                            $end_date = $row['loa_end_date'];
                                                            $dateObj = date_create_from_format('Y-m-d', $start_date);
                                                            $dateObj2 = date_create_from_format('Y-m-d', $end_date);
                                                            $formattedDate_start = date_format($dateObj, 'F j, Y');
                                                            $formattedDate_end = date_format($dateObj2, 'F j, Y');
                                                ?>
                                                            <tr>
                                                                <td><?php echo $row['date_created'] ?></td>

                                                                <td>
                                                                    <?php

                                                                    echo $id;
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $row['type'] ?></td>
                                                                <td><?php echo $row['category'] ?></td>
                                                                <td><?php echo $row['lastnameko'] . ", " . $row['firstnameko'] . " " . $row['mnko'] . " " . $row['extnname'] ?></td>
                                                                <td><?php echo $row['place_assigned'] ?></td>
                                                                <td><?php echo $formattedDate_start ?></td>
                                                                <td><?php echo $formattedDate_end ?></td>
                                                                <td><?php echo $row['employment_status'] ?></td>
                                                            </tr>
                                                <?php }
                                                    }
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
    $_SESSION['errorMessage'] = "Hacker ka 'no?";
    header("Location: ../../index.php");
    exit(0);
}
?>