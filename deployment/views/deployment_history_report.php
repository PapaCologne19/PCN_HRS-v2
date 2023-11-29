<?php
session_start();
include '../../connect.php';
if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>
        <title>LOA History</title>
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
                                            DEPLOYMENT LOA DATABASE
                                        </h4>
                                    </div>
                                    <hr>
                                    <div class="container mt-5 mb-5">
                                        <form action="" method="get" class="form-group row">
                                            <div class="col-md-4 mt-3 mb-3">
                                                <label for="" class="form-label">Employees' Name</label>
                                                <input list="names" name="names" class="form-control" id="name">
                                                <datalist id="names">
                                                    <?php
                                                        $select = "SELECT DISTINCT employee_name
                                                        FROM deployment_history 
                                                        WHERE is_deleted = '0'";
                                                        $select_result = $link->query($select);
                                                        while ($select_row = $select_result->fetch_assoc()) {
                                                    ?>
                                                        <option value="<?php echo $select_row['employee_name']; ?>"><?php echo $select_row['employee_name']; ?></option>
                                                    <?php } ?>
                                                </datalist>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="hidden">
                                            </div>
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
                                                    <option value="">Select</option>
                                                    <?php
                                                    $select = "SELECT * FROM types_of_separation WHERE is_deleted = '0'";
                                                    $select_result = $link->query($select);
                                                    while ($select_row = $select_result->fetch_assoc()) {
                                                    ?>
                                                        <option value="<?php echo $select_row['type']; ?>"><?php echo $select_row['type']; ?></option>
                                                    <?php } ?>
                                                </select>
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
                                        $status = $_GET['status'];
                                        $from = $_GET['from_date'];
                                        $to = $_GET['to_date'];
                                        $project_title = $_GET['project_title'];
                                    ?>
                                        <a href="download_deployment_history_report.php?status=<?php echo $status ?>&from=<?php echo $from ?>&to=<?php echo $to ?>" class="btn btn-dark mb-4"><i class="bi bi-cloud-download"></i> Export</a>
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
                                                FROM deployment_history
                                                WHERE ('$status' = '' OR clearance = '$status') 
                                                AND ('$project_title' = '' OR shortlist_title = '$project_title') 
                                                AND(
                                                    (date_created BETWEEN '$from' AND '$to')
                                                    OR ('$from' <> '' AND '$to' = '' AND date_created >= '$from')
                                                    OR ('$from' = '' AND '$to' <> '' AND date_created <= '$to')
                                                    OR ('$from' = '' AND '$to' = '')
                                                )";
                                                $search_result = $link->query($search);
                                                if ($search_result->num_rows > 0) {
                                                    while ($search_row = $search_result->fetch_assoc()) {
                                                        $deployment_id = $search_row['id'];

                                                        $query = "SELECT *, DATE_FORMAT(date_created, '%M %d, %Y') AS date_created 
                                            FROM deployment_history 
                                            WHERE is_deleted = '0'
                                            AND id = '$deployment_id'";
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
                                                                <td><?php echo $row['employee_name'] ?></td>
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