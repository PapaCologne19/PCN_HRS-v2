<?php
session_start();
include '../../connect.php';
if(isset($_SESSION['username'], $_SESSION['password'])){
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    <title>EWB Lists</title>
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
                                        EWB Listings
                                    </h4>
                                </div>
                                <hr>
                                <form action="action.php" method="POST" class="row">
                                    <table id="example" class="table" style="width:100%; font-size: 14px !important;">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th> Applicant No </th>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $resultx = mysqli_query($link, "SELECT *, 
                                            DATE_FORMAT(birthday, '%M %d %Y') as birthday,
                                            DATE_FORMAT(policed, '%M %d %Y') as policed,
                                            DATE_FORMAT(brgyd, '%M %d %Y') as brgyd,
                                            DATE_FORMAT(nbid, '%M %d %Y') as nbid 
                                            FROM employees where actionpoint='EWB' and ewbdeploy='0'");
                                            while ($rowx = mysqli_fetch_assoc($resultx)) {
                                            ?>
                                                <tr>
                                                    <td><input type="checkbox" name="check_list[]" value="<?php echo $rowx["appno"] ?>"></td>
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
                                                </tr>
                                            <?php } ?>
                                            <div class="col-md-4 col-sm-12 mb-2">
                                                <label class="form-label"> Select One </label><br>
                                                <select class="form-select" name="ewbchoiceto1" autofocus required> ';
                                                    <option value="">Select</option>
                                                    <?php
                                                    $resultpro1 = mysqli_query($link, "SELECT * FROM ewb_choices");
                                                    while ($rowpro1 = mysqli_fetch_assoc($resultpro1)) { ?>
                                                        <option value="<?php echo $rowpro1[" description"] ?>"><?php echo $rowpro1["description"] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 mt-2 mb-3">
                                                <button type="submit" class="btn btn-primary btnsall" name="processmultiple"><span>Process</span></button>
                                            </div>
                                            <br><br>
                                        </tbody>
                                    </table>
                                </form>

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