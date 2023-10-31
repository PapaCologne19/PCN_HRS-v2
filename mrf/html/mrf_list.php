<?php
include 'connect.php';
session_start();

date_default_timezone_set('Asia/Hong_Kong');
$datenow = date("m/d/Y");

if(isset($_SESSION['username'], $_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    <title>MRF List</title>

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        .form-check-label,
        .form-control {
            font-size: 13px;
        }

        .indent {
            text-decoration: underline;
            color: #3876BF;
            font-weight: bold;
        }

        .icon:hover {
            color: red;
        }

        .form-check-input {
            pointer-events: none;
            /* Prevent user interaction with the checkbox */
        }

        .contain {
            display: grid;
            grid-template-columns: 0fr 0fr;
            grid-template-rows: 0fr 0fr;
            gap: 5px;
            margin: 0 auto;
        }

        .columns .btn {
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
        }
    </style>
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

            <div class="layout-page">
                <?php include '../components/navbar.php'; ?>

                <!-- Content -->
                <div class="content-wrapper mt-3">
                    <div class="container">
                        <div class="card">
                            <hr>
                            <div class="title justify-content-center align-items-center mx-auto">
                                <h4 class="fs-4">
                                    LISTS OF MRF
                                </h4>
                            </div>
                            <hr>
                            <table class="table" id="example" style="width: 100%; font-size: 15px !important; ">
                                <thead>
                                    <tr>
                                        <th class="text-center">Date Created</th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Tracking Number</th>
                                        <th class="text-center">Project Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM mrf WHERE uid = '" . $_SESSION['id'] . "' AND is_deleted = '0'";
                                    $result = $link->query($query);
                                    while ($row = $result->fetch_assoc()) {
                                        $inputDate = $row['dt_now'];
                                        $timestamp = strtotime($inputDate);
                                        $formattedDate = date("F d, Y", $timestamp);
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $formattedDate ?></td>
                                            <td class="text-center"><?php echo $row['id'] ?></td>
                                            <td class="text-center"><?php echo $row['tracking'] ?></td>
                                            <td class="text-center"><?php echo $row['project_title'] ?></td>
                                            <td class="text-center">
                                                <div class="contain">
                                                    <div class="columns">
                                                        <input type="hidden" name="ids" class="ids" id="ids" value="<?php echo $row['id']; ?>">
                                                        <button type="button" class="btn btnview" data-bs-toggle="modal" data-bs-target="#viewmrf"><i class="bi bi-eye icon" style="color: black !important;"></i></button>
                                                    </div>
                                                    <div class="columns">
                                                        <button type="button" class="btn btnprint" id="btnprint" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Print MRF" onclick="location.href = 'print_mrf.php?id=<?php echo $row['id'] ?>'"><i class="bi bi-printer icon" style="color: black !important;"></i></button>
                                                    </div>
                                                    <div class="columns">
                                                        <a href="edit_mrf.php?id=<?php echo $row['id'] ?>" method="post" style="width: 0% !important;">
                                                            <input type="hidden" name="edit_id" class="edit_id" id="edit_id" value="<?php echo $row['id']; ?>">
                                                            <button type="button" class="btn btnedit" name="btnedit" id="btnedit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit MRF"><i class="bi bi-gear icon" style="color: black !important;"></i></button>
                                                        </a>
                                                    </div>
                                                    <div class="columns">
                                                        <input type="hidden" name="delete_id" class="delete_id" id="delete_id" value="<?php echo $row['id']; ?>">
                                                        <button type="button" class="btn btndelete" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete MRF"><i class="bi bi-trash3 icon" style="color: black !important;"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>


                            <!-- Modal for View MRF -->
                            <div class="modal fade" id="viewmrf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Viewing of MRF
        $(document).ready(function() {
            $('tbody').on('click', '.btnview', function() {
                var Id = $(this).prev('.ids').val();
                $('#viewmrf').modal('show');

                // load the corresponding question(s) for the clicked row
                $.ajax({
                    url: 'view_mrf.php',
                    type: 'post',
                    data: {
                        id: Id
                    },
                    success: function(response) {
                        $('#viewmrf .modal-body').html(response);
                    },
                    error: function() {
                        alert('Error.');
                    }
                });
            });
        });


        // Deleting MRF
        $(document).ready(function() {
            $('.btndelete').click(function(e) {
                e.preventDefault();

                var deleteID = $(this).closest("tr").find('.delete_id').val();
                Swal.fire({
                    title: "Are you sure you want to delete this MRF?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel",
                }).then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "action.php",
                            data: {
                                "delete_button_click": 1,
                                "deleteIDs": deleteID,
                            },
                            success: function(response) {

                                Swal.fire({
                                    title: "Successfully Deleted!",
                                    icon: "success"
                                }).then((result) => {
                                    location.reload();
                                });

                            }
                        });
                    }
                });
            });
        });
    </script>

    <?php include '../components/footer.php'; ?>
</body>

</html>
<?php 
}
else{
    $_SESSION['errorMessage'] = "Hacker ka ba?!";
    header('Location: ../../index.php');
    session_destroy();
    exit();
}
?>