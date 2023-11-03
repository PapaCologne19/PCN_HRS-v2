<?php
session_start();
include '../../connect.php';
if(isset($_SESSION['username'], $_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    <title>For Requirements</title>
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
                                        FOR REQUIREMENTS
                                    </h4>
                                </div>
                                <hr>
                                <table class="table" style="width: 100%; font-size: 13px !important;" id="example">
                                    <thead>
                                        <tr>
                                            <th>Applicant ID</th>
                                            <th>Name</th>
                                            <th>SSS</th>
                                            <th>Pag-IBIG</th>
                                            <th>Philhealth</th>
                                            <th>TIN</th>
                                            <th>Birthday</th>
                                            <th>Comment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM employees WHERE ewb_status = 'DECLINED'";
                                        $result = $link->query($query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['id'] ?></td>
                                                <td><?php echo $row['lastnameko'] . ", " . $row['firstnameko'] . " " . $row['mnko'] ?></td>
                                                <td><?php echo $row['sssnum'] ?></td>
                                                <td><?php echo $row['pagibignum'] ?></td>
                                                <td><?php echo $row['phnum'] ?></td>
                                                <td><?php echo $row['tinnum'] ?></td>
                                                <td><?php echo $row['birthday'] ?></td>
                                                <td><?php echo $row['ewb_reason'] ?></td>
                                                <td>
                                                    <input type="hidden" name="for_reverification_id" class="for_reverification_id" id="for_reverification_id" value="<?php echo $row['id'] ?>" class="form-control">
                                                    <button type="button" name="for_reverification_btn" class="btn btn-primary for_reverification_btn" id="for_reverification_btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="For verification"><i class="bi bi-send-check"></i></button>
                                                </td>
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
}
else{
    header("Location: ../../index.php");
    session_destroy();
    exit(0);
}
?>