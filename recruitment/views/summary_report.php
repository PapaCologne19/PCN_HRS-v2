<?php
session_start();
include '../../connect.php';

if(isset($_SESSION['username'], $_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    <title>Summary Report</title>
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
                                <table id="example" class="table" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th> Shortlist Name </th>
                                            <th> Manpower Count </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $resultdis1 = mysqli_query($link, "SELECT distinct shortlistnameto FROM shortlist_master");
                                        while ($rowdis1 = mysqli_fetch_array($resultdis1)) {

                                            $resultdis = mysqli_query($link, "SELECT shortlistnameto, count(*) FROM shortlist_master where shortlistnameto='$rowdis1[0]' group by shortlistnameto ");
                                            while ($rowdis = mysqli_fetch_assoc($resultdis)) { ?>
                                                <tr>
                                                    <td><?php echo $rowdis['shortlistnameto'] ?> </td>
                                                    <td><?php echo $rowdis['count(*)'] ?> </td>
                                                <?php
                                            } ?>
                                                </tr>
                                            <?php
                                        }
                                            ?>
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