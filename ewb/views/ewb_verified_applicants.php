<?php
session_start();
include '../../connect.php';
if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>
        <title>Verified Applicants</title>
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
        } ?>
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
                                            VERIFIED APPLICANTS
                                        </h4>
                                    </div>
                                    <hr>
                                    <table class="table" id="example">
                                        <thead>
                                            <tr>
                                                <th>DATE CREATED</th>
                                                <th>App No</th>
                                                <th>Name</th>
                                                <th>SSS</th>
                                                <th>PAGIBIG</th>
                                                <th>PHILHEALTH</th>
                                                <th>TIN</th>
                                                <th>BIRTHDAY</th>
                                                <th>ADDRESS</th>
                                                <th>DATE VERIFIED</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT *, 
                                                DATE_FORMAT(birthday, '%M %d %Y') AS birthday 
                                                FROM employees WHERE ewb_status = 'VERIFIED'";
                                            $result = $link->query($query);
                                            while ($row = $result->fetch_assoc()) {
                                                $dapplied = $row['dapplied'];
                                                $formattedDatedapplied = date('m/d/Y H:i:s', strtotime($dapplied));
                                                $ewbdate = $row['ewbdate'];
                                                $formattedDate = date('m/d/Y H:i:s', strtotime($ewbdate));

                                            ?>
                                                <tr>
                                                    <td><?php echo $formattedDatedapplied ?></td>
                                                    <td><?php echo $row['appno'] ?></td>
                                                    <td><?php echo $row['lastnameko'] . ", " . $row['firstnameko'] . " " . $row['mnko'] ?></td>
                                                    <td><?php echo $row['sssnum'] ?></td>
                                                    <td><?php echo $row['pagibignum'] ?></td>
                                                    <td><?php echo $row['phnum'] ?></td>
                                                    <td><?php echo $row['tinnum'] ?></td>
                                                    <td><?php echo $row['birthday'] ?></td>
                                                    <td><?php echo $row['paddress'] ?></td>
                                                    <td><?php echo $formattedDate ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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
    exit();
}
?>