<?php
session_start();
include '../../connect.php';
if(isset($_SESSION['username'], $_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    <title>Manpower Request Forms</title>
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
                                <table id="example" class="table" style="width:100%; font-size: 14px !important;">
                                    <thead>
                                        <tr>
                                            <th> FILLED BY </th>
                                            <th> LOCATION </th>
                                            <th> PROJECT TITLE </th>
                                            <th> POSITION </th>
                                            <th> NEEDED </thh>
                                            <th> PROVIDED </th>
                                            <th> RECEIVED BY: </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $query = "SELECT * FROM mrf WHERE is_deleted = '0'";
                                        $result = mysqli_query($link, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $uid1 = $row['uid'];
                                            $totalneed = $row['np_male'] + $row['np_female'];
                                            $totalprovided = $row['s_male'] + $row['s_female'];
                                            $fullname = $row['prepared_by'];

                                            if ($row['hr_personnel'] == "YES") { ?>
                                                <tr>
                                                    <td> <?php echo $row['prepared_by'] ?> </td>
                                                    <td> <?php echo $row['location'] ?> </td>
                                                    <td> <?php echo $row['project_title'] ?> </td>
                                                    <?php
                                                    if ($row['position'] === "OTHER") { ?>
                                                        <td> <?php echo $row['position_detail'] ?> </td>
                                                    <?php  } else { ?>
                                                        <td> <?php echo $row['position'] ?> </td>
                                                    <?php } ?>
                                                    <td style=" text-align: center;"> <?php echo $totalneed ?> </td>
                                                    <td style=" text-align: center;"> <?php echo $totalprovided ?> </td>

                                                    <td>
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="mrf_id" value="<?php echo  $row['id'] ?>">
                                                            <button type="button" name="r_mrf" class="btn btn-default r_mrf" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Provide Shortlist"><i class="bi bi-ui-checks"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } else { ?>
                                                <tr>
                                                    <td> <?php echo $fullname ?> </td>
                                                    <td> <?php echo $row['location'] ?> </td>
                                                    <td> <?php echo $row['project_title'] ?> </td>
                                                    <?php if ($row['position'] === "OTHER") { ?>
                                                        <td> <?php echo $row['position_detail'] ?> </td>
                                                    <?php } else { ?>
                                                        <td> <?php echo $row['position'] ?> </td>
                                                    <?php } ?>
                                                    <td style=" text-align: center;"> <?php echo $totalneed ?> </td>
                                                    <td style=" text-align: center;"> <?php echo $totalprovided ?> </td>

                                                    <td>
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="mrf_ids" class="mrf_ids" value="<?php echo $row['id'] ?>">
                                                            <button type="button" name="r_mrfs" class="btn btn-primary r_mrfs" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Accept MRF"><i class="bi bi-send-check"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
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