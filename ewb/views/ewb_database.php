<?php
session_start();
include '../../connect.php';
if(isset($_SESSION['username'], $_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    <title>EWB Database</title>
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
                    <div class="container-fluid">
                        <div class="card">
                            <div class="container-fluid">
                                <hr>
                                <div class="title justify-content-center align-items-center mx-auto text-center">
                                    <h4 class="fs-4">
                                        EWB REPORTS
                                    </h4>
                                </div>
                                <hr>
                                <table id="example" class="table" style="width:100%; font-size: 13px !important;">
                                    <thead>
                                        <tr>
                                            <th> APP No </th>
                                            <th> Name </th>
                                            <th> SSS </th>
                                            <th> Pag-ibig </th>
                                            <th> Philhealth </th>
                                            <th> TIN </th>
                                            <th> Police </th>
                                            <th> Brgy </th>
                                            <th> NBI </th>
                                            <th> PSA </th>
                                            <th> Birthday </th>
                                            <th> EWB Date </th>
                                            <th> Shortlist </th>
                                            <th> Project </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $resultx = mysqli_query($link, "SELECT *, 
                                        DATE_FORMAT(policed, '%M %d %Y') AS policed, 
                                        DATE_FORMAT(brgyd, '%M %d %Y') AS brgyd, 
                                        DATE_FORMAT(nbid, '%M %d %Y') AS nbid, 
                                        DATE_FORMAT(birthday, '%M %d %Y') AS birthday
                                        FROM employees WHERE actionpoint = 'EWB' AND ewbdeploy != '0'");
                                        while ($rowx = mysqli_fetch_assoc($resultx)) {
                                            $appno = $rowx['appno'];
                                            $resulty = mysqli_query($link, "SELECT * FROM shortlist_master WHERE appnumto = '$appno'");
                                            while ($rowy = mysqli_fetch_assoc($resulty)) {

                                                $resultz = mysqli_query($link, "SELECT * FROM shortlist_details WHERE shortlistname = '" . $rowy['shortlistnameto'] . "'");
                                                while ($rowz = mysqli_fetch_assoc($resultz)) {
                                        ?>
                                                    <tr>
                                                        <td><?php echo $rowx['appno'] ?></td>
                                                        <td><?php echo $rowx['lastnameko'] . ", " . $rowx['firstnameko'] . " " . $rowx['mnko'] ?></td>
                                                        <td><?php echo $rowx['sssnum'] ?></td>
                                                        <td><?php echo $rowx['pagibignum'] ?></td>
                                                        <td><?php echo $rowx['phnum'] ?></td>
                                                        <td><?php echo $rowx['tinnum'] ?></td>
                                                        <td><?php echo $rowx['policed'] ?></td>
                                                        <td><?php echo $rowx['brgyd'] ?></td>
                                                        <td><?php echo $rowx['nbid'] ?></td>
                                                        <td><?php echo $rowx['psa'] ?></td>
                                                        <td><?php echo $rowx['birthday'] ?></td>

                                                        <td><?php echo $rowx['ewbdate'] ?></td>
                                                        <td><?php echo $rowy['shortlistnameto'] ?></td>
                                                        <td><?php echo $rowz['project'] ?></td>
                                                    </tr>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
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
    exit();
}
?>