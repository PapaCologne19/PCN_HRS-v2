<?php
session_start();
include '../../connect.php';

// For creating LOA of Applicants
if (isset($_POST['create_loa'])) {
    $id = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['id'])));
    $shortlist_title = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['shortlist_title'])));
    $appno = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['appno'])));
    $date_shortlisted = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['date_shortlisted'])));
    $status = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['status'])));
    $type = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['type'])));
    $start_loa = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['start_loa'])));
    $end_loa = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['end_loa'])));
    $division = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['division'])));
    $category = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['category'])));
    $locator = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['locator'])));
    $place_assigned = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['place_assigned'])));
    $address_assigned = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['address_assigned'])));
    $channel = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['channel'])));
    $department = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['department'])));
    $employment_status = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['employment_status'])));
    $job_title = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['job_title'])));
    $loa_template = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['loa_template'])));
    $basic_salary = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['basic_salary'])));
    $ecola = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['ecola'])));
    $communication_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['communication_allowance'])));
    $transportation_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['transportation_allowance'])));
    $internet_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['internet_allowance'])));
    $meal_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['meal_allowance'])));
    $outbase_meal = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['outbase_meal'])));
    $special_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['special_allowance'])));
    $position_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['position_allowance'])));
    $deployment_remarks = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['deployment_remarks'])));
    $no_of_days = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['no_of_days'])));
    $outlet = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['outlet'])));
    $supervisor = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['supervisor'])));
    $field_supervisor = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['field_supervisor'])));
    $field_supervisor_designation = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['field_supervisor_designation'])));
    $deployment_personnel = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['deployment_personnel'])));
    $deployment_personnel_designation = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['deployment_personnel_designation'])));
    $project_supervisor = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['project_supervisor'])));
    $project_supervisor_designation = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['project_supervisor_designation'])));
    $head = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['head'])));
    $head_designation = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['head_designation'])));
    $loa_id = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['loa_id'])));

    $get_data = "SELECT * FROM employees WHERE id = '$id'";
    $get_result = $link->query($get_data);
    $get_row = $get_result->fetch_assoc();
    $sss = $get_row['sssnum'];
    $pagibig = $get_row['pagibignum'];
    $philhealth = $get_row['phnum'];
    $tin = $get_row['tinnum'];
    $address = $get_row['paddress'];
    $contact_number = $get_row['cpnum'];

    $query = "INSERT INTO `deployment`(`shortlist_title`, `appno`, `date_shortlisted`, `employee_id`, 
        `sss`, `philhealth`, `pagibig`, `tin`, `address`, 
        `contact_number`, `loa_status`, `type`, `loa_start_date`, 
        `loa_end_date`, `division`, `category`, `locator`, 
        `place_assigned`, `address_assigned`, `channel`, `department`, 
        `employment_status`, `job_title`, `loa_template`, 
        `basic_salary`, `ecola`, `communication_allowance`, `transportation_allowance`, 
        `internet_allowance`, `meal_allowance`, `outbase_meal`, `special_allowance`, 
        `position_allowance`, `deployment_remarks`, `no_of_days`, `outlet`, 
        `supervisor`, `field_supervisor`, `field_designation`, `deployment_personnel`, 
        `deployment_designation`, `project_supervisor`, `projectSupervisor_deployment`, 
        `head`, `head_designation`, `emp_id`) 
        VALUES ('$shortlist_title', '$appno', '$date_shortlisted', '$id', 
        '$sss', '$philhealth', '$pagibig', '$tin','$address ', 
        '$contact_number','$status', '$type', '$start_loa', 
        '$end_loa', '$division', '$category', '$locator', 
        '$place_assigned', '$address_assigned', '$channel', '$department', 
        '$employment_status', '$job_title', '$loa_template', 
        '$basic_salary', '$ecola', '$communication_allowance', '$transportation_allowance', 
        '$internet_allowance', '$meal_allowance', '$outbase_meal', '$special_allowance', 
        '$position_allowance', '$deployment_remarks', '$no_of_days', '$outlet', 
        '$supervisor', '$field_supervisor', '$field_supervisor_designation', '$deployment_personnel', 
        '$deployment_personnel_designation', '$project_supervisor', '$project_supervisor_designation', 
        '$head', '$head_designation', '$loa_id')";

    $result = $link->query($query);

    if ($result) {
        $update_shortlist_query = "UPDATE shortlist_master SET is_deleted = '1' WHERE employee_id = '$id' AND shortlistnameto != '$shortlist_title'";
        $update_shortlist_result = $link->query($update_shortlist_query);
        if ($update_shortlist_result) {
            $_SESSION['successMessage'] = "Create LOA Success";
        } else {
            $_SESSION['errorMessage'] = "SQL Error: " . $link->error;
        }
    } else {
        $_SESSION['errorMessage'] = "SQL Error: " . $link->error;
    }
    header("Location: shortlist.php");
    exit(0);
}
