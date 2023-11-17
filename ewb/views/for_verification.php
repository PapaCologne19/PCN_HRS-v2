<?php
session_start();
include '../../connect.php';
if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>
        <title>For Verification</title>
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
                                            For Verifications
                                        </h4>
                                    </div>
                                    <hr>
                                    <table id="example" class="table table-sm align-middle mb-0 bg-white p-3 bg-opacity-10 border border-secondary border-start-0 border-end-0 rounded-end mdc-data-table" style="width:100%; font-size: 14px !important;">
                                        <thead>
                                            <tr>
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
                                                <th> Comment </th>
                                                <th> Date Deployed </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $resultx = mysqli_query($link, "SELECT * FROM employees WHERE ewb_status = 'NOT VERIFY' AND is_deleted = '0'");
                                            while ($rowx = mysqli_fetch_assoc($resultx)) {
                                                $police = $rowx['policed'];
                                                $barangay = $rowx['brgyd'];
                                                $nbi = $rowx['nbid'];
                                                $birthday = $rowx['birthday'];
                                                $date_deployed = $rowx['ewbdate'];
                                                $timestamp_police = strtotime($police);
                                                $timestamp_barangay = strtotime($barangay);
                                                $timestamp_nbi = strtotime($nbi);
                                                $timestamp_birthday = strtotime($birthday);
                                                $timestamp_date_deployed = strtotime($date_deployed);
                                                $formattedDate_police = date("F d, Y", $timestamp_police);
                                                $formattedDate_barangay = date("F d, Y", $timestamp_barangay);
                                                $formattedDate_nbi = date("F d, Y", $timestamp_nbi);
                                                $formattedDate_birthday = date("F d, Y", $timestamp_birthday);
                                                $formattedDate_date_deployed = date("F d, Y", $timestamp_date_deployed);
                                            ?>
                                                <tr>
                                                    <td><?php echo $rowx['appno'] ?></td>
                                                    <td><?php echo $rowx['lastnameko'] . ", " . $rowx['firstnameko'] . " " . $rowx['mnko'] ?></td>
                                                    <td><?php echo $rowx['sssnum'] ?></td>
                                                    <td><?php echo $rowx['pagibignum'] ?></td>
                                                    <td><?php echo $rowx['phnum'] ?></td>
                                                    <td><?php echo $rowx['tinnum'] ?></td>
                                                    <td><?php echo $formattedDate_police ?></td>
                                                    <td><?php echo $formattedDate_barangay ?></td>
                                                    <td><?php echo $formattedDate_nbi ?></td>
                                                    <td><?php echo $rowx['psa'] ?></td>
                                                    <td><?php echo $formattedDate_birthday ?></td>
                                                    <td><?php echo $rowx['ewb_reason'] ?></td>
                                                    <td><?php echo $formattedDate_date_deployed ?></td>
                                                    <td>
                                                        <form action="" method="POST" class="row">
                                                            <div class="col-md-12">
                                                                <input type="hidden" name="verified_id" class="verified_id" id="verified_id" value="<?php echo $rowx['appno'] ?>">
                                                                <button type="button" name="verify1s" class="btn btn-info verify1s" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Verify">
                                                                    <i class="bi bi-box-arrow-right"></i>
                                                                </button>
                                                            </div>
                                                            <div class="col-md-12 mt-1">
                                                                <input type="hidden" name="decline_ewbID" class="decline_ewbID" id="decline_ewbID" value="<?php echo $rowx['appno'] ?>">
                                                                <button type="submit" name="decline_ewb" class="btn btn-danger decline_ewb" id="decline_ewb" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Decline">
                                                                    <i class="bi bi-x-circle"></i>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // For Verification 
            $('#example').on('click', '.verify1s', function(e) {
                e.preventDefault();

                var verified_id = $(this).closest("tr").find('.verified_id').val();

                Swal.fire({
                    title: "Are you sure you want to verify?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes!",
                    cancelButtonText: "No",
                }).then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "action.php",
                            data: {
                                "verify_button_click": 1,
                                "verify_id": verified_id,
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: "Success",
                                    icon: "success"
                                }).then((result) => {
                                    location.reload();
                                });
                            },
                            error: function(xhr, status, error) {
                                console.log("AJAX Error: " + error);
                            }
                        });
                    }
                });
            });


            // For Declining of ewb
            $('#example').on('click', '.decline_ewb', function(e) {
                e.preventDefault();

                var decline_ewbID = $(this).closest("tr").find('.decline_ewbID').val();

                Swal.fire({
                    title: "Are you sure you want to decline?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes!",
                    cancelButtonText: "No",
                    showCloseButton: true,
                    html: '<input type="text" id="declineReason" placeholder="Enter reason for declining" class="swal2-input">',
                    preConfirm: () => {
                        var reason = document.getElementById("declineReason").value;

                        if (!reason) {
                            Swal.showValidationMessage("Reason is required");
                        }

                        return {
                            reason: reason
                        };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        var reason = result.value.reason;
                        if (reason) {
                            $.ajax({
                                type: "POST",
                                url: "action.php",
                                data: {
                                    "declined_button": 1,
                                    "declinedID": decline_ewbID,
                                    "reason": reason
                                },
                                success: function(response) {
                                    Swal.fire({
                                        title: "Success",
                                        icon: "success"
                                    }).then((result) => {
                                        location.reload();
                                    });
                                },
                                error: function(xhr, status, error) {
                                    console.log("AJAX Error: " + error);
                                }
                            });
                        }
                    }
                });
            });
        </script>
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