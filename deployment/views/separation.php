<?php
session_start();
include '../../connect.php';
if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>
        <title>Shortlisting</title>
    </head>

    <body>
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <?php include '../components/sidebar.php'; ?>

                <!-- Main page -->
                <div class="layout-page">
                    <?php include '../components/navbar.php'; ?>

                    <!-- Content -->
                    <div class="content-wrapper">
                        <div class="container">
                            <div class="card">
                                <div class="container">
                                    <hr>
                                    <div class="title justify-content-center align-items-center mx-auto text-center">
                                        <h4 class="fs-4">
                                            Separation
                                        </h4>
                                    </div>
                                    <hr>
                                    <table class="table table-sm" id="example">
                                        <thead>
                                            <tr>
                                                <th>Date Start</th>
                                                <th>Employee Name</th>
                                                <th>Project Title</th>
                                                <th>Category</th>
                                                <th>Position</th>
                                                <th>Employment Status</th>
                                                <th>Outlet</th>
                                                <th>Type</th>
                                                <th>Reason</th>
                                                <th>Effectivity Date</th>
                                                <th>Process By</th>
                                                <th>File</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM separation";
                                            $result = $link->query($query);
                                            while ($row = mysqli_fetch_assoc($result)) {

                                                $outlet = $row['outlet'];
                                                $html = '';
                                                if (!empty($outlet)) {
                                                    $data = json_decode($outlet, true);
                                                    if (!empty($data['ops'])) {
                                                        $html = '<ul>';
                                                        foreach ($data['ops'] as $op) {
                                                            if (!empty($op['insert'])) {
                                                                $text = trim($op['insert']);
                                                                $attributes = isset($op['attributes']) ? $op['attributes'] : []; // Check if 'attributes' key exists
                                                                if (!empty($attributes) && isset($attributes['list']) && $attributes['list'] == 'bullet' && !empty($text)) {
                                                                    $html .= '<li>' . $text . '</li>';
                                                                } elseif (!empty($text)) {
                                                                    $html .= '<li>' . $text . '</li>';
                                                                }
                                                            }
                                                        }
                                                        $html .= '</ul>';
                                                    }
                                                }


                                            ?>
                                                <tr>
                                                    <td><?php echo $row['date_start'] ?></td>
                                                    <td><?php echo $row['employee_name']; ?></td>
                                                    <td><?php echo $row['project_title']; ?></td>
                                                    <td><?php echo $row['category']; ?></td>
                                                    <td><?php echo $row['position']; ?></td>
                                                    <td><?php echo $row['employment_status'] ?></td>
                                                    <td><?php echo $html; ?>
                                                    </td>
                                                    <td><?php echo $row['type_of_separation'] ?></td>
                                                    <td><?php echo $row['reason'] ?></td>
                                                    <td><?php echo $row['effectivity_date'] ?></td>
                                                    <td><?php echo $row['process_by'] ?></td>
                                                    <td>
                                                        <?php
                                                        $employee_id = $row['employee_id'];
                                                        $deployment_id = $row['deployment_id'];
                                                        $select_folder = "SELECT * FROM folder WHERE employee_id = ? AND deployment_id = ?";
                                                        $select_folder_result = $link->prepare($select_folder);
                                                        $select_folder_result->bind_param("ii", $employee_id, $deployment_id);
                                                        $select_folder_result->execute();
                                                        $get_selected_folder = $select_folder_result->get_result();
                                                        $get_selected_row = $get_selected_folder->fetch_assoc();


                                                        $fileNames = explode(',', $row['files']);
                                                        $path = "../../../pcn_OLA/" . $get_selected_row['folder_path'] . "/" . $row['files'];
                                                        ?>
                                                       
                                                        <?php
                                                        foreach ($fileNames as $fileName) {
                                                            echo '<a href="../../../pcn_OLA/' . $get_selected_row['folder_path'] . '/' . $fileName . '" download>' . $fileName . '</a><br>';
                                                        }
                                                        ?>
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
} else {
    header("Location: ../../logout.php");
    session_destroy();
    exit(0);
}
?>