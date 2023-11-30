<?php
session_start();
include '../../connect.php';
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d H:i:s');

$user_id = $_SESSION['user_id'];
$user_division = $_SESSION['division'];
$personnel = $_SESSION['firstname'] . " " . $_SESSION['lastname'];
$user_type = $_SESSION['user_type'];

// For creating LOA of Applicants
if (isset($_POST['create_loa'])) {
    $id = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['id'])));
    $project_id = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['project_id'])));
    $shortlist_title = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['shortlist_title'])));
    $appno = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['appno'])));
    $date_shortlisted = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['date_shortlisted'])));
    $status = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['status'])));
    $type = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['type'])));
    $project_start_date = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['start_loa'])));
    $start_loa = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['start_loa'])));
    $start_loa_date = new DateTime($start_loa);
    $start_loa_formatted = $start_loa_date->format('F j, Y');
    $end_loa = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['end_loa'])));
    $end_loa_date = new DateTime($end_loa);
    $end_loa_formatted = $end_loa_date->format('F j, Y');
    $division = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['division'])));
    $category = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['category'])));
    $locator = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['locator'])));
    $client_name = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['client_name'])));
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

    $check_id = "SELECT * FROM deployment WHERE emp_id = '$loa_id'";
    $check_id_result = $link->query($check_id);
    $check_id_row = $check_id_result->fetch_assoc();

    if ($loa_id !== $check_id_row['emp_id']) {
        $get_data = "SELECT * FROM employees WHERE id = '$id'";
        $get_result = $link->query($get_data);
        $get_row = $get_result->fetch_assoc();
        if (!empty($get_row['mnko']) || $get_row['mnko'] != "NA" || $get_row['mnko'] != "N/A") {
            $fullname = chop($get_row['firstnameko'] . ", " . $get_row['mnko'] . " " . $get_row['lastnameko'] . " " . $get_row['extnname']);
        } else {
            $fullname = chop($get_row['firstnameko'] . ", " . $get_row['lastnameko']);
        }
        $sss = $get_row['sssnum'];
        $pagibig = $get_row['pagibignum'];
        $philhealth = $get_row['phnum'];
        $tin = $get_row['tinnum'];
        $address = $get_row['paddress'];
        $contact_number = $get_row['cpnum'];

        $select = "SELECT * FROM employees WHERE id = '$id'";
        $select_result = $link->query($select);
        $select_row = $select_result->fetch_assoc();
        $applicant_id = $select_row['app_id'];

        $applicant_name = chop($select_row['firstnameko'] . " " . $select_row['mnko'] . " " . $select_row['lastnameko'] . " " . $select_row['extnname']);
        $folder_name = $applicant_name;
        $applicant_name_subfolder = $applicant_name . "- From " . $start_loa_formatted . " To " . $end_loa_formatted;
        $folder_name_subfolder = $applicant_name_subfolder;
        $destination_subfolder = "../../../pcn_OLA/201 Files/" . $folder_name . "/" . $folder_name_subfolder;
        $folder_path = "201 Files/" . $applicant_name . "/" . $applicant_name_subfolder;

        mkdir("{$destination_subfolder}", 0777);


        $query = "INSERT INTO `deployment`(`shortlist_title`, `appno`, `date_shortlisted`, `employee_id`, 
            `sss`, `philhealth`, `pagibig`, `tin`, `address`, 
            `contact_number`, `loa_status`, `type`, `project_start_date`, `loa_start_date`, 
            `loa_end_date`, `division`, `category`, `locator`, `client_name`,
            `place_assigned`, `address_assigned`, `channel`, `department`, 
            `employment_status`, `job_title`, `loa_template`, 
            `basic_salary`, `ecola`, `communication_allowance`, `transportation_allowance`, 
            `internet_allowance`, `meal_allowance`, `outbase_meal`, `special_allowance`, 
            `position_allowance`, `deployment_remarks`, `no_of_days`, `outlet`, 
            `supervisor`, `field_supervisor`, `field_designation`, `deployment_personnel`, 
            `deployment_designation`, `project_supervisor`, `projectSupervisor_deployment`, 
            `head`, `head_designation`, `loa_folder_path`, `emp_id`) 
            VALUES ('$shortlist_title', '$appno', '$date_shortlisted', '$id', 
            '$sss', '$philhealth', '$pagibig', '$tin','$address', 
            '$contact_number','$status', '$type', '$project_start_date', '$start_loa', 
            '$end_loa', '$division', '$category', '$locator', '$client_name',
            '$place_assigned', '$address_assigned', '$channel', '$department', 
            '$employment_status', '$job_title', '$loa_template', 
            '$basic_salary', '$ecola', '$communication_allowance', '$transportation_allowance', 
            '$internet_allowance', '$meal_allowance', '$outbase_meal', '$special_allowance', 
            '$position_allowance', '$deployment_remarks', '$no_of_days', '$outlet', 
            '$supervisor', '$field_supervisor', '$field_supervisor_designation', '$deployment_personnel', 
            '$deployment_personnel_designation', '$project_supervisor', '$project_supervisor_designation', 
            '$head', '$head_designation', '$destination_subfolder', '$loa_id')";

        $result = $link->query($query);

        if ($result) {

            $deployment_id = $link->insert_id;
            $insert_folder = "INSERT INTO folder (applicant_id, employee_id, deployment_id, folder_name, folder_path) 
            VALUES('$applicant_id', '$id', '$deployment_id', '$folder_name_subfolder', '$folder_path')";
            $insert_folder_result = $link->query($insert_folder);
            if ($insert_folder_result) {



                $query_history = "INSERT INTO `deployment_history`(`deployment_id`, `shortlist_title`, `appno`, `employee_name`, `date_shortlisted`, `employee_id`, 
            `sss`, `philhealth`, `pagibig`, `tin`, `address`, 
            `contact_number`, `loa_status`, `type`, `loa_start_date`, 
            `loa_end_date`, `division`, `category`, `locator`, `client_name`,
            `place_assigned`, `address_assigned`, `channel`, `department`, 
            `employment_status`, `job_title`, `loa_template`, 
            `basic_salary`, `ecola`, `communication_allowance`, `transportation_allowance`, 
            `internet_allowance`, `meal_allowance`, `outbase_meal`, `special_allowance`, 
            `position_allowance`, `deployment_remarks`, `no_of_days`, `outlet`, 
            `supervisor`, `field_supervisor`, `field_designation`, `deployment_personnel`, 
            `deployment_designation`, `project_supervisor`, `projectSupervisor_deployment`, 
            `head`, `head_designation`, `emp_id`) 
            VALUES ('$deployment_id' ,'$shortlist_title', '$appno', '$fullname', '$date_shortlisted', '$id', 
            '$sss', '$philhealth', '$pagibig', '$tin','$address', 
            '$contact_number','$status', '$type', '$start_loa', 
            '$end_loa', '$division', '$category', '$locator', '$client_name',
            '$place_assigned', '$address_assigned', '$channel', '$department', 
            '$employment_status', '$job_title', '$loa_template', 
            '$basic_salary', '$ecola', '$communication_allowance', '$transportation_allowance', 
            '$internet_allowance', '$meal_allowance', '$outbase_meal', '$special_allowance', 
            '$position_allowance', '$deployment_remarks', '$no_of_days', '$outlet', 
            '$supervisor', '$field_supervisor', '$field_supervisor_designation', '$deployment_personnel', 
            '$deployment_personnel_designation', '$project_supervisor', '$project_supervisor_designation', 
            '$head', '$head_designation', '$loa_id')";

                $result_history = $link->query($query_history);

                if ($result_history) {
                    $update_shortlist_query = "UPDATE shortlist_master SET deployment_status = 'DEPLOYED' WHERE employee_id = '$id' AND shortlistnameto = '$shortlist_title'";
                    $update_shortlist_result = $link->query($update_shortlist_query);
                    if ($update_shortlist_result) {
                        $update = "UPDATE shortlist_master SET is_deleted = '1' WHERE employee_id = '$id' AND shortlistnameto != '$shortlist_title'";
                        $update_result = $link->query($update);
                        if ($update_result) {

                            $transaction = chop(strtoupper("DEPLOYED EMPLOYEE AND CREATE LOA FOR - " . $fullname));
                            $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                VALUES (?, ?, ?, ?, ?)";
                            $transaction_log_result = $link->prepare($transaction_log);
                            $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                            $transaction_log_result->execute();

                            $_SESSION['successMessage'] = "Success";
                        } else {
                            $_SESSION['errorMessage'] = "SQL Errorsss: " . $link->error;
                        }
                    } else {
                        $_SESSION['errorMessage'] = "SQL Errorss: " . $link->error;
                    }
                } else {
                    $_SESSION['errorMessage'] = "SQL Errors: " . $link->error;
                }
            } else {
                $_SESSION['errorMessage'] = "SQL Error: " . $link->error;
            }
        } else {
            $_SESSION['errorMessage'] = "SQL Error: " . $link->error;
        }
    } else {
        $_SESSION['errorMessage'] = "ID number is already exist";
    }


    header("Location: deploy_applicants.php?shortlist_title=$shortlist_title");
    exit(0);
}

// For Updating LOA
if (isset($_POST['update_loa'])) {
    $id = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['id'])));
    $emp_id = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['emp_id'])));
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
    $client_name = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['client_name'])));
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
    $outlet =  mysqli_real_escape_string($link, $_POST['outlet']);
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

    $get_data = "SELECT * FROM employees WHERE id = '$emp_id'";
    $get_result = $link->query($get_data);
    $get_row = $get_result->fetch_assoc();
    if (!empty($get_row['mnko']) || $get_row['mnko'] != "NA" || $get_row['mnko'] != "N/A") {
        $fullname = $get_row['lastnameko'] . ", " . $get_row['firstnameko'] . " " . $get_row['mnko'];
    } else {
        $fullname = $get_row['lastnameko'] . ", " . $get_row['firstnameko'];
    }
    $sss = $get_row['sssnum'];
    $pagibig = $get_row['pagibignum'];
    $philhealth = $get_row['phnum'];
    $tin = $get_row['tinnum'];
    $address = $get_row['paddress'];
    $contact_number = $get_row['cpnum'];

    $query = "UPDATE `deployment` 
          SET `shortlist_title` = '$shortlist_title',
              `appno` = '$appno',
              `date_shortlisted` = '$date_shortlisted',
              `sss` = '$sss',
              `philhealth` = '$philhealth',
              `pagibig` = '$pagibig',
              `tin` = '$tin',
              `address` = '$address',
              `contact_number` = '$contact_number',
              `loa_status` = '$status',
              `type` = '$type',
              `loa_start_date` = '$start_loa',
              `loa_end_date` = '$end_loa',
              `division` = '$division',
              `category` = '$category',
              `locator` = '$locator',
              `client_name` = '$client_name',
              `place_assigned` = '$place_assigned',
              `address_assigned` = '$address_assigned',
              `channel` = '$channel',
              `department` = '$department',
              `employment_status` = '$employment_status',
              `job_title` = '$job_title',
              `loa_template` = '$loa_template',
              `basic_salary` = '$basic_salary',
              `ecola` = '$ecola',
              `communication_allowance` = '$communication_allowance',
              `transportation_allowance` = '$transportation_allowance',
              `internet_allowance` = '$internet_allowance',
              `meal_allowance` = '$meal_allowance',
              `outbase_meal` = '$outbase_meal',
              `special_allowance` = '$special_allowance',
              `position_allowance` = '$position_allowance',
              `deployment_remarks` = '$deployment_remarks',
              `no_of_days` = '$no_of_days',
              `outlet` = '$outlet',
              `supervisor` = '$supervisor',
              `field_supervisor` = '$field_supervisor',
              `field_designation` = '$field_supervisor_designation',
              `deployment_personnel` = '$deployment_personnel',
              `deployment_designation` = '$deployment_personnel_designation',
              `project_supervisor` = '$project_supervisor',
              `projectSupervisor_deployment` = '$project_supervisor_designation',
              `head` = '$head',
              `head_designation` = '$head_designation'
          WHERE `id` = '$id'";
    $result = $link->query($query);

    if ($result) {
        $query_history = "INSERT INTO `deployment_history`(`shortlist_title`, `appno`, `employee_name`, `date_shortlisted`, `employee_id`, `deployment_id`,
            `sss`, `philhealth`, `pagibig`, `tin`, `address`, 
            `contact_number`, `loa_status`, `type`, `loa_start_date`, 
            `loa_end_date`, `division`, `category`, `locator`, `client_name`,
            `place_assigned`, `address_assigned`, `channel`, `department`, 
            `employment_status`, `job_title`, `loa_template`, 
            `basic_salary`, `ecola`, `communication_allowance`, `transportation_allowance`, 
            `internet_allowance`, `meal_allowance`, `outbase_meal`, `special_allowance`, 
            `position_allowance`, `deployment_remarks`, `no_of_days`, `outlet`, 
            `supervisor`, `field_supervisor`, `field_designation`, `deployment_personnel`, 
            `deployment_designation`, `project_supervisor`, `projectSupervisor_deployment`, 
            `head`, `head_designation`, `emp_id`, `date_updated`) 
            VALUES ('$shortlist_title', '$appno', '$fullname', '$date_shortlisted', '$emp_id', '$id',
            '$sss', '$philhealth', '$pagibig', '$tin','$address', 
            '$contact_number','$status', '$type', '$start_loa', 
            '$end_loa', '$division', '$category', '$locator', '$client_name',
            '$place_assigned', '$address_assigned', '$channel', '$department', 
            '$employment_status', '$job_title', '$loa_template', 
            '$basic_salary', '$ecola', '$communication_allowance', '$transportation_allowance', 
            '$internet_allowance', '$meal_allowance', '$outbase_meal', '$special_allowance', 
            '$position_allowance', '$deployment_remarks', '$no_of_days', '$outlet', 
            '$supervisor', '$field_supervisor', '$field_supervisor_designation', '$deployment_personnel', 
            '$deployment_personnel_designation', '$project_supervisor', '$project_supervisor_designation', 
            '$head', '$head_designation', '$loa_id', '$date')";

        $result_history = $link->query($query_history);

        if ($result_history) {

            $transaction = chop(strtoupper("UPDATE LOA OF - " . $fullname));
            $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                VALUES (?, ?, ?, ?, ?)";
            $transaction_log_result = $link->prepare($transaction_log);
            $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
            $transaction_log_result->execute();

            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error in inserting LOA to history";
        }
    } else {
        $_SESSION['errorMessage'] = "Updating LOA error";
    }
    header("Location: deploy_applicants.php?shortlist_title=$shortlist_title");
    exit(0);
}

// TYPE OF SEPARATION
if (isset($_POST['insert_typeBtn'])) {
    $deployment_id = $link->real_escape_string($_POST['deployment_id']);
    $employee_id = $link->real_escape_string($_POST['employee_id']);
    $category = $link->real_escape_string($_POST['category']);
    $position = $link->real_escape_string($_POST['position']);
    $project_title = $link->real_escape_string($_POST['project_title']);
    $employee_status = $link->real_escape_string($_POST['employee_status']);
    $start_date = $link->real_escape_string($_POST['start_date']);
    $outlet = $link->real_escape_string($_POST['outlet']);
    $reason_of_separation = $link->real_escape_string($_POST['reason_of_separation']);
    $date_created = $link->real_escape_string($_POST['date_created']);
    $name = $link->real_escape_string($_POST['name']);
    $type_of_separations = $link->real_escape_string($_POST['type_of_separations']);
    $effectivity_date = $link->real_escape_string($_POST['effectivity_date']);
    $process_by = $link->real_escape_string($_POST['process_by']);

    if (!empty($_FILES['files']['name'][0])) {
        $fileCount = count($_FILES['files']['name']);
        $fileNames = [];
        $files = $_FILES['files'];

        // Selecting Employees table so we can fetch the Applicant ID
        $select = "SELECT * FROM employees WHERE id = ?";
        $select_result = $link->prepare($select);
        $select_result->bind_param("i", $employee_id);
        if ($select_result->execute()) {

            $get_result = $select_result->get_result();
            $select_row = $get_result->fetch_assoc();
            $applicant_id = $select_row['app_id'];

            $select_deployment = "SELECT * FROM deployment WHERE id = ? AND employee_id = ?";
            $select_deployment_result = $link->prepare($select_deployment);
            $select_deployment_result->bind_param("ii", $deployment_id, $employee_id);
            $select_deployment_result->execute();
            $select_deployment_get_result = $select_deployment_result->get_result();
            $selected_deployment_row = $select_deployment_get_result->fetch_assoc();
            $start_loa = $selected_deployment_row['loa_start_date'];
            $end_loa = $selected_deployment_row['loa_end_date'];
            $start_loa_date = new DateTime($start_loa);
            $start_loa_formatted = $start_loa_date->format('F j, Y');
            $end_loa_date = new DateTime($end_loa);
            $end_loa_formatted = $end_loa_date->format('F j, Y');

            $applicant_name = chop($select_row['firstnameko'] . " " . $select_row['mnko'] . " " . $select_row['lastnameko'] . " " . $select_row['extnname']);
            $folder_name = $applicant_name;
            $applicant_name_subfolder = $applicant_name . "- From " . $start_loa_formatted . " To " . $end_loa_formatted;
            $folder_name_subfolder = $applicant_name_subfolder;
            $destination_subfolder = "../../../pcn_OLA/201 Files/" . $folder_name . "/" . $folder_name_subfolder;
            $folder_path = "201 Files/" . $applicant_name . "/" . $applicant_name_subfolder;

            // Selecting Folder table so we can fetch the datas in that table
            $select_folder = "SELECT * FROM folder WHERE applicant_id = ? AND employee_id = ? AND folder_name = ?";
            $stmt2 = $link->prepare($select_folder);
            $stmt2->bind_param("iis", $applicant_id, $employee_id, $folder_name_subfolder);
            if ($stmt2->execute()) {
                $get_stmt = $stmt2->get_result();
                while ($rows = $get_stmt->fetch_assoc()) {

                    for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
                        $filename = $_FILES['files']['name'][$i];
                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                        $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg', 'gif'];
                
                        // Check if file type is valid
                        if (in_array($ext, $allowed)) {
                            $newFilename = $filename;
                            move_uploaded_file($_FILES['files']['tmp_name'][$i], $path . $filename);
                
                            $fileNames[] = $newFilename;
                        } else {
                            $_SESSION['errorMessage'] = "Error";
                        }
                    }

                    $fileNamesStr = implode(',', $fileNames);
                    $get_loa_requestedBy = "SELECT deployment.*, loa_requested.*, employee.*
                        FROM deployment deployment, loa_requests loa_requested, employees employee
                        WHERE employee.id = loa_requested.employee_id
                        AND employee.id = deployment.employee_id 
                        AND deployment.employee_id = loa_requested.employee_id
                        AND deployment.shortlist_title = loa_requested.place_assigned 
                        AND loa_requested.employee_id = '$employee_id'";
                    $get_loa_requested_by_result = $link->query($get_loa_requestedBy);
                    $get_loa_requested_by_row = $get_loa_requested_by_result->fetch_assoc();

                    $loa_requested_by = $get_loa_requested_by_row['requested_by'];
                    $shortlist_title = $get_loa_requested_by_row['place_assigned'];


                    $update_clearance = "UPDATE deployment SET clearance = ? WHERE id = ?";
                    $update_clearance_result = $link->prepare($update_clearance);
                    $update_clearance_result->bind_param('si', $type_of_separations, $deployment_id);
                    if ($update_clearance_result->execute()) {

                        $path = "../../../pcn_OLA/" . $rows['folder_path'] . "/";
                        $folder_id = $rows['id'];

                        $targetFile = $path . basename($files['name'][$key]);
                        $filename = basename($files['name'][$key]);

                        $inserts = "INSERT INTO 201files(applicant_id, employee_id, folder_id, requirements_files) 
                                VALUES (?, ?, ?, ?)";
                        $insert_result = $link->prepare($inserts);
                        $insert_result->bind_param("ssss", $applicant_id, $employee_id, $folder_id, $filename);


                        if ($insert_result->execute()) {
                            $insert_type = "INSERT INTO separation (deployment_id, employee_id, employee_name, category, position, project_title, employment_status, date_start, outlet, type_of_separation, reason, files, effectivity_date, process_by, loa_request_by) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                            $stmt = $link->prepare($insert_type);
                            $stmt->bind_param("iisssssssssssss", $deployment_id, $employee_id, $name, $category, $position, $project_title, $employee_status, $start_date, $outlet, $type_of_separations, $reason_of_separation, $fileNamesStr, $effectivity_date, $process_by, $loa_requested_by);

                            if ($stmt->execute()) {
                                $update_clearance = "UPDATE deployment_history SET clearance = ?, date_separation = ?, prepared_by_separation = ? WHERE deployment_id = ? AND employee_id = ?";
                                $update_clearance_result = $link->prepare($update_clearance);
                                $update_clearance_result->bind_param("sii", $type_of_separations, $datenow, $process_by, $deployment_id, $employee_id);
                                $update_clearance_result->execute();


                                $transaction = chop(strtoupper("SET TYPE OF SEPARATION - " . $employee_id . " (" . $type_of_separations . ")"));
                                $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                VALUES (?, ?, ?, ?, ?)";
                                $transaction_log_result = $link->prepare($transaction_log);
                                $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                                $transaction_log_result->execute();


                                move_uploaded_file($tmp_name, $targetFile);
                                $_SESSION['successMessage'] = "Success";
                            } else {
                                $_SESSION['errorMessage'] = "Error" . $link->error;
                            }
                        } else {
                            $_SESSION['errorMessage'] = "Error" . $link->error;
                        }
                    } else {
                        $_SESSION['errorMessage'] = "Error" . $link->error;
                    }
                }
            } else {
                $_SESSION['errorMessage'] = "Error" . $link->error;
            }
        } else {
            $_SESSION['errorMessage'] = "Error" . $link->error;
        }
    } else {
        $_SESSION['errorMessage'] = "Error";
    }

    header("Location: deploy_applicants.php?shortlist_title=$shortlist_title");
}


// For Backout Employee
if (isset($_POST['backout_employee_deployment_button_click'])) {
    $deployment_id = $_POST['backout_id'];
    $project_title = $_POST['project_title'];
    $backout = "BACKOUT";
    $is_deleted = "1";

    $query = "UPDATE deployment SET clearance = ?, is_deleted = ? WHERE id = ?";
    $stmt = $link->prepare($query);
    $stmt->bind_param("ssi", $backout, $is_deleted, $deployment_id);
    if ($stmt->execute()) {
        $sql = "UPDATE deployment_history SET clearance = ? WHERE deployment_id = ?";
        $sql_result = $link->prepare($sql);
        $sql_result->bind_param("si", $backout, $deployment_id);
        if ($sql_result->execute()) {

            $transaction = chop(strtoupper("SET TYPE OF SEPARATION - " . "(" . $backout . ")"));
            $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                VALUES (?, ?, ?, ?, ?)";
            $transaction_log_result = $link->prepare($transaction_log);
            $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
            $transaction_log_result->execute();

            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error";
        }
    } else {
        $_SESSION['errorMessage'] = "Error";
    }
    header("Location: deploy_applicants.php?shortlist_title=$project_title");
    exit(0);
}
