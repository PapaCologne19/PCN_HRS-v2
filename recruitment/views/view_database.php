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
                                        RECRUITMENT DATABASE
                                    </h4>
                                </div>
                                <hr>
                                <table id="example" class="table" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th> ID </th>
                                            <th> Applicant No. </th>
                                            <th> Applicant Name </th>
                                            <th> Email </th>
                                            <th> Contact No. </th>
                                            <th> Birthday </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $resultx = mysqli_query($link, "SELECT * FROM employees ");
                                        while ($rowx = mysqli_fetch_assoc($resultx)) {
                                            $police = $rowx['policed'];
                                            $barangay = $rowx['brgyd'];
                                            $nbi = $rowx['nbid'];
                                            $birthday = $rowx['birthday'];
                                            $timestamp_police = strtotime($police);
                                            $timestamp_barangay = strtotime($barangay);
                                            $timestamp_nbi = strtotime($nbi);
                                            $timestamp_birthday = strtotime($birthday);
                                            $formattedDate_police = date("F d, Y", $timestamp_police);
                                            $formattedDate_barangay = date("F d, Y", $timestamp_barangay);
                                            $formattedDate_nbi = date("F d, Y", $timestamp_nbi);
                                            $formattedDate_birthday = date("F d, Y", $timestamp_birthday);
                                        ?>
                                            <tr>
                                                <td> <?php echo $rowx['id'] ?> </td>
                                                <td> <?php echo $rowx['appno'] ?> </td>
                                                <td> <?php echo $rowx['lastnameko'] . ", " . $rowx['firstnameko'] . " " . $rowx['mnko'] ?> </td>
                                                <td> <?php echo $rowx['emailadd'] ?> </td>
                                                <td> <?php echo $rowx['cpnum'] ?> </td>
                                                <td> <?php echo $formattedDate_birthday ?> </td>
                                                <td> <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Print MRF"><i class="bi bi-pencil-square"></i></button></td> 
                                            </tr>
                                        <?php
                                        } ?>

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
}
else{
    header("Location: ../../index.php");
    session_destroy();
    exit(0);
}
?>