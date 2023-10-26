<?php
session_start();
include '../../connect.php';

// For Creating LOA Template
if (isset($_POST['create_loa'])) {
    $loa_title = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['loa_title'])));
    $division = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['division'])));
    $applicant_name = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['applicant_name'])));
    $applicant_address = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['applicant_address'])));
    $client_name = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['client_name'])));
    $place_assigned = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['place_assigned'])));
    $address_assigned = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['address_assigned'])));
    $job_title = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['job_title'])));
    $employment_status = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['employment_status'])));
    $start_date = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['start_date'])));
    $end_date = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['end_date'])));
    $rate = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['rate'])));
    $communication_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['communication_allowance'])));
    $transportation_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['transportation_allowance'])));
    $total_sum = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['total_sum'])));
    $ecola = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['ecola'])));
    $internet_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['internet_allowance'])));
    $meal_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['meal_allowance'])));
    $outbase_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['outbase_allowance'])));
    $outlet = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['outlet'])));
    $no_of_work_days = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['no_of_work_days'])));
    $issued_day = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['issued_day'])));
    $issued_month = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['issued_month'])));
    $issued_year = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['issued_year'])));
    $deployment_personnel = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['deployment_personnel'])));
    $deployment_personnel_designation = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['deployment_personnel_designation'])));
    $project_supervisor_endorsed = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['project_supervisor_endorsed'])));
    $project_supervisor_endorsed_designation = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['project_supervisor_endorsed_designation'])));
    $head = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['head'])));
    $head_designation = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['head_designation'])));
    $project_supervisor_approved = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['project_supervisor_approved'])));
    $project_supervisor_approved_designation = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['project_supervisor_approved_designation'])));
    $sss = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['sss'])));
    $philhealth = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['philhealth'])));
    $pagibig = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['pagibig'])));
    $tin = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['tin'])));
    $applicant_id = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['applicant_id'])));
    $applicant_contact = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['applicant_contact'])));
    $id = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['id'])));
    $loa_tracker = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['loa_tracker'])));

    $loa_upload_directory = "../loa_template_directory/";
    $loa_filename = $_FILES["template"]["name"];
    $loa_template_file = $loa_upload_directory . basename($_FILES["template"]["name"]);
    $upload_file = 1;

    if ($_FILES["template"]["size"] <= 5242880) {
        $allowedExtensions = ["pdf", "doc", "docx"];
        $fileExtension = strtolower(pathinfo($loa_template_file, PATHINFO_EXTENSION));
        if (in_array($fileExtension, $allowedExtensions)) {
            $query = "INSERT INTO `loa_maintenance_word`(`loa_name`, `division`, `applicant_name`, `applicant_address`, 
                `client_name`, `place_assigned`, `address_assigned`, `job_title`, 
                `employment_status`, `start_date`, `end_date`, `basic_pay`, `outlet`, 
                `no_work_days`, `issued_day`, `issued_month`, `issued_year`, `pb_deployment_personel`, 
                `pb_dpdesignation`, `eb_project_supervisor`, `eb_psdesignation`,`ab_head`, `ab_hdesignation`, `ab_project_supervisor`, `ab_psdesignation`, 
                `sss_no`, `philhealth_no`, `pagibig_no`, `tin_no`, `applicant_id`, 
                `applicant_contact`, `communication_allowance`, `transpo_meal_allowance`, 
                `ecola`, `internet_allowance`, `meal_allowance`, `outbase_meal`,
                `total_sum`, `shortlist_id`,`loa_tracker`) 
                VALUES ('$loa_title', '$division', '$applicant_name', '$applicant_address', 
                '$client_name', '$place_assigned', '$address_assigned', '$job_title', 
                '$employment_status', '$start_date', '$end_date', '$rate', '$outlet', 
                '$no_of_work_days', '$issued_day', '$issued_month', '$issued_year', '$deployment_personnel', 
                '$deployment_personnel_designation', '$project_supervisor_endorsed', '$project_supervisor_endorsed_designation', 
                '$head', '$head_designation', '$project_supervisor_approved', '$project_supervisor_approved_designation', 
                '$sss', '$philhealth', '$pagibig', '$tin', '$applicant_id', 
                '$applicant_contact', '$communication_allowance', '$transportation_allowance', 
                '$ecola', '$internet_allowance', '$meal_allowance', '$outbase_allowance', 
                '$total_sum', '$id', '$loa_tracker')";

            $result = $link->query($query);

            if ($result) {
                $id = $link->insert_id;

                $query2 = "INSERT INTO `loa_files`(`loa_main_id`, `file_name`, `file_location`) 
                    VALUES ('$id','$loa_filename','$loa_upload_directory')";
                $result2 = $link->query($query2);

                if ($result2) {
                    if ($upload_file === 1) {
                        if (move_uploaded_file($_FILES["template"]["tmp_name"], $loa_template_file)) {
                            $_SESSION["successMessage"] = "LOA Successfully Created";
                        } else {
                            ini_set('display_errors', 1); 
                            ini_set('display_startup_errors', 1);
                            error_reporting(E_ALL);
                            $_SESSION["errorMessage"] = "Error in inserting files.";
                        }
                    } else {
                        $_SESSION["errorMessage"] = "Your file was not uploaded.";
                    }
                }
            } else {
                $_SESSION["errorMessage"] = "Error in inserting data.";
                $upload_file = 0;
            }
        } else {
            $_SESSION["errorMessage"] = "Sorry, only PDF, DOC, and DOCX files are allowed.";
            $upload_file = 0;
        }
    } else {
        $_SESSION["errorMessage"] = "Sorry, your file is too large. Max file is 5MB";
        $upload_file = 0;
    }
    header("Location: create_loa.php");
    exit(0);
}

// For Setting as default
if(isset($_POST['make_default_button_click'])){
    $set_default_id = $_POST['make_default_id'];

    $query_id = "UPDATE loa_files SET status = '1' WHERE id = '$set_default_id'";
    $result_id = $link->query($query_id);

    if($result_id){
        $_SESSION['successMessage'] = "Set as default Successful";
    }
    else{
        $_SESSION['errorMessage'] = "Set as default error";
    }
    header("Location: loa.php");
    exit(0);
}

// For Setting as inactive
if(isset($_POST['make_inactive_button_click'])){
    $set_inactive_id = $_POST['make_inactive_id'];

    $query_inactive_id = "UPDATE loa_files SET status = '0' WHERE id = '$set_inactive_id'";
    $result_inactive_id = $link->query($query_inactive_id);

    if($result_inactive_id){
        $_SESSION['successMessage'] = "Set as inactive Successful";
    }
    else{
        $_SESSION['errorMessage'] = "Set as inactive error";
    }
    header("Location: loa.php");
    exit(0);
}