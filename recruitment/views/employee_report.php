<?php
session_start();
include '../../connect.php';
if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php include '../components/header.php'; ?>

        <title>Employee Report</title>
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
        <div class="body5010p" id="my_camera" style="z-index: 1;"></div>

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
                                            EMPLOYEE REPORTS
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
                                                <option value="">Select</option>
                                                <option value="VERIFIED">VERIFIED</option>
                                                <option value="NOT VERIFY">NOT VERIFY</option>
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

                                        $status = $_GET['status'];
                                        $from = $_GET['from_date'];
                                        $from_formatted = date_format(new DateTime($from), 'm/d/Y');
                                        $to = $_GET['to_date'];
                                        $to_formatted = date_format(new DateTime($to), 'm/d/Y');

                                    ?>
                                        <a href="download_employee_reports.php?status=<?php echo $status ?>&from=<?php echo $from ?>&to=<?php echo $to ?>" class="btn btn-dark mb-4"><i class="bi bi-cloud-download"></i> Export</a>
                                        <table id="example" class="table " style="width:100%;font-size:14 !important;">
                                            <thead>
                                                <tr>
                                                    <th> DATE ADDED </th>
                                                    <th> Name </th>
                                                    <th> SSS </th>
                                                    <th> Pag-ibig </th>
                                                    <th> Philhealth </th>
                                                    <th> TIN </th>
                                                    <th> STATUS </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php

                                                $search = "SELECT employee.*, shortlist.*, employee.id AS employee_ids, shortlist.id AS shortlist_id 
                                            FROM employees employee, shortlist_master shortlist 
                                            WHERE shortlist.employee_id = employee.id 
                                            AND ('$status' = '' OR ewb_status = '$status') 
                                            AND (
                                                (dateto BETWEEN '$from_formatted' AND '$to_formatted')
                                                OR ('$from_formatted' <> '' AND '$to_formatted' = '' AND dateto >= '$from_formatted')
                                                OR ('$from_formatted' = '' AND '$to_formatted' <> '' AND dateto <= '$to_formatted')
                                                OR ('$from_formatted' = '' AND '$to_formatted' = '')
                                            )";
                                                $search_result = $link->query($search);
                                                if ($search_result->num_rows > 0) {
                                                    while ($search_row = $search_result->fetch_assoc()) {
                                                        $employee_ids = $search_row['employee_ids'];
                                                        $shortlist_id = $search_row['shortlist_id'];

                                                        $queryx1 = "SELECT employee.*, shortlist.* 
                                                FROM employees employee, shortlist_master shortlist 
                                                WHERE employee.id = shortlist.employee_id 
                                                AND shortlist.is_deleted = '0' 
                                                AND shortlist.employee_id = '$employee_ids'
                                                AND shortlist.id = '$shortlist_id'";
                                                        $resultx = mysqli_query($link, $queryx1);
                                                        while ($rowx = mysqli_fetch_assoc($resultx)) {
                                                            $police = $rowx['policed'];
                                                            $barangay = $rowx['brgyd'];
                                                            $nbi = $rowx['nbid'];
                                                            $timestamp_police = strtotime($police);
                                                            $timestamp_barangay = strtotime($barangay);
                                                            $timestamp_nbi = strtotime($nbi);
                                                            $formattedDate_police = date("F d, Y", $timestamp_police);
                                                            $formattedDate_barangay = date("F d, Y", $timestamp_barangay);
                                                            $formattedDate_nbi = date("F d, Y", $timestamp_nbi);
                                                ?>
                                                            <tr>
                                                                <td> <?php echo $rowx["dateto"] ?> </td>
                                                                <td> <?php echo $rowx['lastnameko'] . ", " . $rowx['firstnameko'] . " " . $rowx['mnko'] ?> </td>
                                                                <td> <?php echo $rowx['sssnum'] ?> </td>
                                                                <td> <?php echo $rowx["pagibignum"] ?> </td>
                                                                <td> <?php echo $rowx["phnum"] ?> </td>
                                                                <td> <?php echo $rowx["tinnum"] ?> </td>
                                                                <td> <?php echo $rowx["ewb_status"] ?> </td>
                                                            </tr>
                                                <?php
                                                        }
                                                    }
                                                } else {
                                                    echo "No record found";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
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