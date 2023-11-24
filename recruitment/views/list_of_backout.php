<?php
session_start();
include '../../connect.php';
if(isset($_SESSION['username'], $_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    <title>Lists Of Backout</title>
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
                                        LIST OF BACKOUT
                                    </h4>
                                </div>
                                <hr>
                                <table id="example" class="table" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th> ID</th>
                                            <th> Applicant No </th>
                                            <th> Lastname </th>
                                            <th> Firstname </th>
                                            <th> Middlename </th>
                                            <th> Birthday </th>
                                            <th> Reason </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $resultx = mysqli_query($link, "SELECT * FROM employees where actionpoint = 'BACKOUT'");
                                        while ($rowx = mysqli_fetch_assoc($resultx)) {
                                            $inputDate = $rowx['birthday'];
                                            $timestamp = strtotime($inputDate);
                                            $formattedDate = date("F d, Y", $timestamp);
                                        ?>
                                            <tr>
                                                <td> <?php echo $rowx['id'] ?> </td>
                                                <td> <?php echo $rowx['appno'] ?> </td>
                                                <td> <?php echo $rowx['lastnameko'] ?> </td>
                                                <td><?php echo $rowx['firstnameko'] ?> </td>
                                                <td><?php echo $rowx['mnko'] ?> </td>
                                                <td><?php echo $formattedDate ?> </td>
                                                <td><?php echo $rowx['reasonofaction'] ?> </td>
                                                <td>
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="undobackoutID" class="undobackoutID" id="undobackoutID" value="<?php echo $rowx['id'] ?>">
                                                        <button type="submit" name="undobackoutbtn" class="btn btn-secondary undobackoutbtn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Undo Backout">
                                                            <i class="bi bi-arrow-counterclockwise"></i>
                                                        </button>
                                                    </form>
                                                </td>
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