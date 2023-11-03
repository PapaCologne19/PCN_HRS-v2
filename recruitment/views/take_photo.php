<?php
session_start();
include '../../connect.php';
if(isset($_SESSION['username'], $_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    <title>Take Photo</title>

    <style>
        .body5010p {
            position: absolute;
            top: 10%;
            left: 23%;
            border: 0px solid black;
        }
        @media screen  and (max-width: 1280px){
            .body5010p{
                left: 38% !important;
            }
            .buttons{
                margin-top: 20rem !important;
            }
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
                <div class="content-wrapper mt-2">
                    <div class="container">
                        <div class="card">
                            <div class="container justify-content-center align-items-center mx-auto text-center mt-5 buttons">
                                <button class="btn btn-success btnsall" onclick="myFunctioncam()">Display Camera</button><br><br>
                                <form method="POST" action="storeImage.php">
                                    <input type="button" class="btn btn-success btnsall" value="Take Photo" onclick="take_snapshot()">
                                    <input type="submit" class="btn btn-success btnsall" Value="Submit">
                                    <hr>
                                    <h2 class="a">
                                        <div class="container">
                                            <label class="fs-2">
                                                <h3 class="fs-3">Image Capture
                                            </label>
                                            <input type="hidden" name="image" class="image-tag">
                                            <div id="results">
                                                Your captured image will appear here...
                                            </div>
                                        </div>
                                    </h2>
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
    exit(0);
}
?>