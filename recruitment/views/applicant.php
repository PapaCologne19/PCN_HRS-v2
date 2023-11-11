<?php
session_start();
include '../../connect.php';
if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>
        <title>List of Applicants</title>
<link rel="stylesheet" href="../../../pcn_OLA/resumeStorage/">
        <style>
            .contain {
                display: grid;
                grid-template-columns: 0fr 0fr;
                grid-template-rows: 0fr 0fr;
                gap: 5px;
                margin: 0 auto;
            }

            .columns {
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
        <div class="body5010p" id="my_camera" style="z-index: 1;"></div>

        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <?php include '../components/sidebar.php'; ?>

                <!-- Main page -->
                <div class="layout-page">
                    <?php include '../components/navbar.php'; ?>

                    <!-- Content -->
                    <div class="content-wrapper mt-1">
                        <div class="container">
                            <div class="card">
                                <div class="container">
                                    <hr>
                                    <div class="title justify-content-center align-items-center mx-auto text-center">
                                        <h4 class="fs-4">
                                            List of Applicants
                                        </h4>
                                    </div>
                                    <hr>
                                    <table class="table" id="example">
                                        <thead>
                                            <tr>
                                                <th>Project Title</th>
                                                <th>Needed</th>
                                                <th>Provided</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $select = "SELECT * FROM projects WHERE is_deleted = '0'";
                                                $results = $link->query($select);
                                                while($rows = $results->fetch_assoc()){
                                            ?>
                                            <tr>
                                                <td><?php echo $rows['project_title']?></td>
                                                <td><?php echo $rows['ewb_count']?></td>
                                                <td><?php echo $rows['project_title']?></td>
                                                <td>
                                                    <a href="shortlisted_applicants.php?id=<?php echo $rows['id']?>" class="btn btn-primary">Go</a>
                                                </td>
                                            </tr>
                                            <?php }?>
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
} else {
    header("Location: ../../index.php");
    session_destroy();
    exit(0);
}
?>