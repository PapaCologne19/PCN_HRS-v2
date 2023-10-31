<?php
session_start();
include '../../connect.php';
if(isset($_SESSION['username'], $_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    <title>Summary Reports</title>
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
                <div class="content-wrapper mt-2">
                    <div class="container">
                        <div class="card">
                            <div class="container">
                                <hr>
                                <div class="title justify-content-center align-items-center mx-auto text-center">
                                    <h4 class="fs-4">
                                        EWB SUMMARY REPORTS
                                    </h4>
                                </div>
                                <hr>
                                <table id="example" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center"> EWB Date </th>
                                            <th class="text-center"> Manpower Count </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $resultdis = mysqli_query($link, "SELECT ewbdate, count(*) FROM employees WHERE actionpoint = 'EWB' AND ewbdeploy!='0' GROUP BY ewbdate ASC");
                                        while ($rowdis = mysqli_fetch_assoc($resultdis)) { ?>
                                            <tr>
                                                <td class="text-center"><?php echo $rowdis['ewbdate'] ?></td>
                                                <td class="text-center"><?php echo $rowdis['count(*)'] ?></td>
                                            <?php } ?>
                                            </tr>
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
    exit();
}
?>