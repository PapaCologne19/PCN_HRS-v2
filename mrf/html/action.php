<?php
include 'connect.php';
include 'smtp.php';
session_start();
date_default_timezone_set('Asia/Manila');
$date_now = date('Y-m-d H:i:s');

$user_id = $_SESSION['user_id'];
$user_division = $_SESSION['division'];
$personnel = $_SESSION['firstname'] . " " . $_SESSION['lastname'];
$user_type = $_SESSION['user_type'];

// For Adding MRF
if (isset($_POST['process'])) {
    $tracking_number = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['tracking_number'])))));
    $category = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['mrf_category'])))));
    $category_name = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['category_name'])))));
    $mrf_type = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['mrf_type'])))));
    $client = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['client'])))));
    $client_address = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['client_address'])))));
    $location = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['location'])))));
    $project_title = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['projectTitle'])))));
    $selected_value = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['division'])))));
    list($division, $description) = explode('|', $selected_value);

    $ce_number = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['ce_number'])))));
    $po_number = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['po_number'])))));
    $position_inhouse = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['position'])))));
    $position_field = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['radio'])))));
    $other_position_inhouse = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['other_position'])))));
    $other_position_field = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['other_position1'])))));
    $selected_position = ($_POST['mrf_type'] === 'INHOUSE') ? $position_inhouse : $position_field;
    $selected_other_position = ($_POST['mrf_type'] === 'INHOUSE') ? $other_position_inhouse : $other_position_field;
    $no_of_people_male = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['number_male'])))));
    $no_of_people_female = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['number_female'])))));
    $height_male = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['height_male'])))));
    $height_female = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['height_female'])))));
    $educational_background = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['educational_background'])))));
    $pleasing_personality = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['pleasing_personality'])))));
    $good_moral = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['good_moral'])))));
    $work_experience = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['work_experience'])))));
    $good_communication = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['good_communication'])))));
    $physically_fit = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['physically_fit'])))));
    $articulate = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['articulate'])))));
    $other_personality = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['other_personality'])))));
    $basic_salary = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['basic_salary'])))));
    $transportation_allowance = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['transportation_allowance'])))));
    $meal_allowance = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['meal_allowance'])))));
    $communication_allowance = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['communication_allowance'])))));
    $other_salary_package = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['other_salary_package'])))));
    $employment_status = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['employment_status'])))));
    $salary_schedule = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['salary_schedule'])))));
    $work_duration_start = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['work_duration_start'])))));
    $work_duration_end = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['work_duration_end'])))));
    $work_days = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['work_days'])))));
    $time_schedule = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['time_schedule'])))));
    $day_off = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['day_off'])))));
    $outlet = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', ($_POST['outlet']))));
    $date_requested = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['date_requested'])))));
    $date_needed = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['date_needed'])))));
    $direct_report = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['direct_report'])))));
    $job_position = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['job_position'])))));
    $special_requirements = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['special_requirements'])))));
    $prepared_by = chop(preg_replace('/\s+/', ' ', (strtoupper($_SESSION['lastname'] . ", " . $_SESSION['firstname']))));
    $id = $_SESSION['id'];


    // Insert Query
    $query = "INSERT INTO mrf(tracking, mrf_category, mrf_category_name, type, client, client_address, location, project_title, division, department, ce_number, po_number, position, position_detail, np_male, 
        np_female, height_r, height_female, edu, pleasing_personality, moral, work_experience, comm_skills, physically, 
        articulate, others, basic_salary, transpo, meal, comm, other_allow, employment_stat, 
        salary_sched, work_duration_start, work_duration_end, work_days, time_sched, day_off, outlet, dt_now, date_needed, drt, rp, special_requirements_others, uid, prepared_by)
        
                VALUES('$tracking_number', '$category', '$category_name', '$mrf_type','$client', '$client_address', '$location', '$project_title', '$division', '$description', '$ce_number', '$po_number', '$selected_position', '$selected_other_position', '$no_of_people_male', 
        '$no_of_people_female', '$height_male', '$height_female', '$educational_background', '$pleasing_personality', '$good_moral', '$work_experience', '$good_communication', '$physically_fit', 
        '$articulate', '$other_personality', '$basic_salary', '$transportation_allowance', '$meal_allowance', '$communication_allowance', '$other_salary_package', '$employment_status',
        '$salary_schedule', '$work_duration_start', '$work_duration_end', '$work_days', '$time_schedule', '$day_off', '$outlet', '$date_requested', '$date_needed', '$direct_report', '$job_position', '$special_requirements', '$id' , '$prepared_by')";

    $result = $link->query($query);
    $id = mysqli_insert_id($link);
    if ($result) {

        $transaction = "CREATE MRF";
        $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
            VALUES (?, ?, ?, ?, ?)";
        $transaction_log_result = $link->prepare($transaction_log);
        $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
        $transaction_log_result->execute();


        $_SESSION['successMessage'] = "Success";
        header("Location: mrf_list.php?id=$id");
    } else {
        $_SESSION['errorMessage'] = "Process Error";
        header("Location: mrf_form.php");
    }
}

// For Updating MRF 
if (isset($_POST['updatemrf'])) {
    $updateID = $_POST['updateID'];
    $category = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['mrf_category'])))));
    $category_name = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['category_name'])))));
    $mrf_type = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['mrf_type'])))));
    $client = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['client'])))));
    $client_address = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['client_address'])))));
    $location = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['location'])))));
    $project_title = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['projectTitle'])))));
    $selected_value = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['division'])))));
    list($division, $description) = explode('|', $selected_value);
    $ce_number = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['ce_number'])))));
    $po_number = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['po_number'])))));


    $position_inhouse = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['position'])))));
    $position_field = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['radio'])))));
    $other_position_inhouse = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['other_position'])))));
    $other_position_field = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['other_position1'])))));
    $selected_position = ($_POST['mrf_type'] === 'INHOUSE') ? $position_inhouse : $position_field;
    $selected_other_position = ($_POST['mrf_type'] === 'INHOUSE') ? $other_position_inhouse : $other_position_field;


    $no_of_people_male = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['number_male'])))));
    $no_of_people_female = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['number_female'])))));
    $height_male = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['height_male'])))));
    $height_female = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['height_female'])))));
    $educational_background = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['educational_background'])))));
    $pleasing_personality = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['pleasing_personality'])))));
    $good_moral = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['good_moral'])))));
    $work_experience = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['work_experience'])))));
    $good_communication = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['good_communication'])))));
    $physically_fit = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['physically_fit'])))));
    $articulate = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['articulate'])))));
    $other_personality = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['other_personality'])))));

    $basic_salary = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['basic_salary'])))));
    $transportation_allowance = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['transportation_allowance'])))));
    $meal_allowance = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['meal_allowance'])))));
    $communication_allowance = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['communication_allowance'])))));
    $other_salary_package = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['other_salary_package'])))));

    $employment_status = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['employment_status'])))));

    $salary_schedule = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['salary_schedule'])))));
    $work_duration_start = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['work_duration_start'])))));
    $work_duration_end = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['work_duration_end'])))));
    $work_days = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['work_days'])))));
    $time_schedule = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['time_schedule'])))));
    $day_off = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['day_off'])))));
    $outlet = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', ($_POST['outlet']))));

    $date_requested = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['date_requested'])))));
    $date_needed = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['date_needed'])))));
    $direct_report = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['direct_report'])))));
    $job_position = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['job_position'])))));
    $special_requirements = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['special_requirements'])))));


    $update_query = " UPDATE mrf 
        SET 
        mrf_category = '$category', 
        mrf_category_name = '$category_name', 
        type = '$mrf_type', 
        client = '$client', 
        client_address = '$client_address', 
        location = '$location', 
        project_title = '$project_title', 
        division = '$division', 
        department = '$description', 
        ce_number = '$ce_number', 
        po_number = '$po_number', 
        
        position = '$selected_position', 
        position_detail = '$selected_other_position', 
        np_male = '$no_of_people_male', 
        np_female = '$no_of_people_female', 
        height_r = '$height_male', 
        height_female = '$height_female', 
        edu = '$educational_background', 
        pleasing_personality = '$pleasing_personality', 
        moral = '$good_moral', 
        work_experience = '$work_experience', 
        comm_skills = '$good_communication', 
        physically = '$physically_fit', 
        articulate = '$articulate', 
        others = '$other_personality', 
        basic_salary = '$basic_salary', 
        transpo = '$transportation_allowance', 
        meal = '$meal_allowance', 
        comm = '$communication_allowance', 
        other_allow = '$other_salary_package', 
        employment_stat = '$employment_status', 
        salary_sched = '$salary_schedule', 
        work_duration_start = '$work_duration_start', 
        work_duration_end = '$work_duration_end', 
        work_days = '$work_days', 
        time_sched = '$time_schedule', 
        day_off = '$day_off', 
        outlet = '$outlet', 
        date_needed = '$date_needed', 
        drt = '$direct_report', 
        rp = '$job_position', 
        special_requirements_others = '$special_requirements' 
        WHERE id = '$updateID'";

    $update_result = $link->query($update_query);

    if ($update_result) {

        $transaction = "UPDATE MRF";
        $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
            VALUES (?, ?, ?, ?, ?)";
        $transaction_log_result = $link->prepare($transaction_log);
        $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
        $transaction_log_result->execute();

        $_SESSION['successMessage'] = "Success";
        header("Location: mrf_list.php");
    } else {
        $_SESSION['errorMessage'] = "Update Error";
        header("Location: mrf_list.php");
    }
}

// Delete MRF
if (isset($_POST['delete_button_click'])) {
    $delete_id = $_POST['deleteIDs'];
    $delete_status = "1";

    $delete_query = "UPDATE mrf SET is_deleted = '$delete_status' WHERE id = '$delete_id'";
    $delete_result = $link->query($delete_query);

    if ($delete_result) {

        $transaction = "DELETE MRF";
        $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
            VALUES (?, ?, ?, ?, ?)";
        $transaction_log_result = $link->prepare($transaction_log);
        $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
        $transaction_log_result->execute();

        $_SESSION['successMessage'] = "Success";
        header("Location: mrf_list.php");
    } else {
        $_SESSION['errorMessage'] = "Delete Error";
        header("Location: mrf_list.php");
    }
}

// For REJECTION OF APPLICANTS
if (isset($_POST['reject_button'])) {
    $id = $link->real_escape_string($_POST['editID']);
    $reason = $link->real_escape_string($_POST['reason']);
    $approved_by = $_SESSION['firstname'] . " " . $_SESSION['lastname'];
    $project_status = 'REJECTED';

    $query = "UPDATE ratings SET interview_details = '$reason', project_status = '$project_status', project_approved_by = '$approved_by' WHERE resume_id = '$id'";
    $result = $link->query($query);
    if ($result) {
        $update = "UPDATE applicant_resume SET project_status = '$project_status' WHERE id = '$id'";
        $update_result = $link->query($update);
        if ($update_result) {

            $transaction = "REJECT APPLICANT";
            $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
            VALUES (?, ?, ?, ?, ?)";
            $transaction_log_result = $link->prepare($transaction_log);
            $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
            $transaction_log_result->execute();


            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error in Rejection: ";
        }
    } else {
        $_SESSION['errorMessage'] = "Error in updating ratings: ";
    }
    header("Location: mrf_list.php");
    exit(0);
}


// For approving applicants
if (isset($_POST['approve_applicants_button_click'])) {
    $id = $_POST['approve_applicants_id'];
    $approved_by = $_SESSION['firstname'] . " " . $_SESSION['lastname'];
    $project_status = "FOR DEPLOYMENT";

    $query = "UPDATE ratings SET project_status = '$project_status', project_approved_by = '$approved_by', date_project_status = '$date_now' WHERE resume_id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $update = "UPDATE applicant_resume SET project_status = '$project_status' WHERE id = '$id'";
        $update_result = $link->query($update);

        if ($update_result) {
            $fetching = "SELECT applicant.*, project.*, resumes.* 
            FROM applicant applicant, projects project, applicant_resume resumes 
            WHERE applicant.id = resumes.applicant_id
            AND project.id = resumes.project_id 
            AND resumes.id = '$id'";
            $fetch_result = $link->query($fetching);
            $fetch_row = $fetch_result->fetch_assoc();

            $project_title = chop(chop(preg_replace('/\s+/', ' ', (strtoupper($fetch_row['project_title'])))));
            $mrf_tracking = chop(chop(preg_replace('/\s+/', ' ', (strtoupper($fetch_row['mrf_tracking'])))));
            $client_company_id = chop(chop(preg_replace('/\s+/', ' ', (strtoupper($fetch_row['client_company_id'])))));
            $project_id = chop(chop(preg_replace('/\s+/', ' ', (strtoupper($fetch_row['project_id'])))));

            $applicant_id = $fetch_row['applicant_id'];
            $project_id = $fetch_row['project_id'];
            $source = chop(chop(preg_replace('/\s+/', ' ', (strtoupper($fetch_row['source'])))));
            $firstname = chop(chop(preg_replace('/\s+/', ' ', (strtoupper($fetch_row['firstname'])))));
            $middlename = chop(chop(preg_replace('/\s+/', ' ', (strtoupper($fetch_row['middlename'])))));
            $lastname = chop(chop(preg_replace('/\s+/', ' ', (strtoupper($fetch_row['lastname'])))));
            $extension_name = chop(chop(preg_replace('/\s+/', ' ', (strtoupper($fetch_row['extension_name'])))));
            $fullname = $firstname . " " . $middlename . " " . $lastname . " " . $extension_name;
            $gender = chop(chop(preg_replace('/\s+/', ' ', (strtoupper($fetch_row['gender'])))));
            $civil_status = chop(chop(preg_replace('/\s+/', ' ', (strtoupper($fetch_row['civil_status'])))));
            $age = chop(chop(preg_replace('/\s+/', ' ', (strtoupper($fetch_row['age'])))));
            $mobile_number = chop(chop(preg_replace('/\s+/', ' ', (strtoupper($fetch_row['mobile_number'])))));
            $email_address = chop(chop(preg_replace('/\s+/', ' ', (strtoupper($fetch_row['email_address'])))));
            $birthday = chop(chop(preg_replace('/\s+/', ' ', (strtoupper($fetch_row['birthday'])))));
            $present_address = chop(chop(preg_replace('/\s+/', ' ', (strtoupper($fetch_row['present_address'])))));
            $city = chop(chop(preg_replace('/\s+/', ' ', (strtoupper($fetch_row['city'])))));
            $region = chop(chop(preg_replace('/\s+/', ' ', (strtoupper($fetch_row['region'])))));
            $photoko = '../../upload/default.png';

            $query_tracking = "SELECT * FROM track WHERE id = '1'";
            $resulttracking = mysqli_query($link, $query_tracking);
            while ($rowtr = mysqli_fetch_assoc($resulttracking)) {
                $notification = "Congratulations! You have passed. Please submit the mandatory documents (SSS, PhilHealth, Pag-IBIG, TIN).";
                $insert_notif = "INSERT INTO applicant_notifications(applicant_id, project_id, notification) VALUES('$applicant_id', '$project_id', '$notification')";
                $insert_notif_result = $link->query($insert_notif);

                if ($insert_notif_result) {

                    $update_status_resume_hide = "UPDATE applicant_resume SET project_status = 'ALREADY PASSED', is_deleted = '1' WHERE applicant_id = '$applicant_id' AND project_status = 'PENDING'";
                    $update_status_resume_hide_result = $link->query($update_status_resume_hide);

                    if ($update_status_resume_hide_result) {
                        $newtracking = $rowtr['appno'] + 1;

                        $insert_applicant = "INSERT INTO employees (appno, app_id, tracking, photopath, dapplied, source, despo, firstnameko, mnko, lastnameko, extnname, gendern, civiln, age, cpnum, emailadd, birthday, paddress, regionn, cityn) 
                    VALUES ('$newtracking', '$applicant_id', '$newtracking', '$photoko', '$date_now', '$source', '$project_title', '$firstname', '$middlename', '$lastname', '$extension_name', '$gender', '$civil_status', '$age', '$mobile_number', '$email_address', '$birthday', '$present_address', '$region', '$city')";
                        $insert_result = $link->query($insert_applicant);

                        if ($insert_result) {
                            $last_id = mysqli_insert_id($link);
                            $select_applicant = "SELECT * FROM employees WHERE id = '$last_id'";
                            $select_applicant_result = $link->query($select_applicant);

                            while ($select_applicant_row = $select_applicant_result->fetch_assoc()) {
                                $employee_id = $select_applicant_row['id'];
                                $appno = $select_applicant_row['appno'];
                                $check = "SELECT project FROM shortlist_details WHERE project = '$project_title'";
                                $check_result = $link->query($check);
                                $datecreated = date('m/d/Y');
                                if ($check_result->num_rows === 0) {
                                    $shortlist_status = 'ACTIVE';

                                    $insert_shortlist_details = "INSERT INTO shortlist_details (shortlistname, project, mrf_tracking, client, datecreated, activity, project_id) 
                            VALUES ('$project_title', '$project_title', '$mrf_tracking', '$client_company_id', '$datecreated', '$shortlist_status', '$project_id')";
                                    $insert_shortlist_details_result = $link->query($insert_shortlist_details);

                                    if ($insert_shortlist_details_result) {
                                        $insert_shortlist_master = "INSERT INTO shortlist_master(employee_id, shortlistnameto, appnumto, dateto)
                                VALUES('$employee_id', '$project_title', '$appno', '$datecreated')";
                                        $insert_shortlist_master_result = $link->query($insert_shortlist_master);

                                        if ($insert_shortlist_master_result) {

                                            $update_tracking = "UPDATE track SET appno = '$newtracking' WHERE id = '1'";
                                            $result_tracking = mysqli_query($link, $update_tracking);
                                            if ($result_tracking) {

                                                $transaction = "APPROVED APPLICANT " . $applicant_id;
                                                $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                                    VALUES (?, ?, ?, ?, ?)";
                                                $transaction_log_result = $link->prepare($transaction_log);
                                                $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                                                $transaction_log_result->execute();
                                                sendApproveEmail($email_address, $fullname);
                                                $_SESSION['successMessage'] = "Success";
                                            } else {
                                                $_SESSION['errorMessage'] = "Error in updating tracking number";
                                            }
                                        } else {
                                            $_SESSION[] = "Error in inserting to shortlist master";
                                        }
                                    } else {
                                        $_SESSION['errorMessage'] = "Error in inserting shortlist details";
                                    }
                                } else {
                                    $_SESSION['errorMessage'] = "Project is already in shortlist details";
                                    $insert_shortlist_master = "INSERT INTO shortlist_master(employee_id, shortlistnameto, appnumto, dateto)
                                VALUES('$employee_id', '$project_title', '$appno', '$datecreated')";
                                    $insert_shortlist_master_result = $link->query($insert_shortlist_master);

                                    if ($insert_shortlist_master_result) {
                                        $update_tracking = "UPDATE track SET appno = '$newtracking' WHERE id = '1'";
                                        $result_tracking = mysqli_query($link, $update_tracking);
                                        if ($result_tracking) {
                                            sendApproveEmail($email_address, $fullname);
                                            $_SESSION['successMessage'] = "Success";
                                        } else {
                                            $_SESSION['errorMessage'] = "Error in updating tracking number";
                                        }
                                    } else {
                                        $_SESSION['errorMessage'] = "Error in inserting to shortlist master";
                                    }
                                }
                            }
                        } else {
                            $_SESSION['errorMessage'] = "Error in inserting applicant to employee table";
                        }
                    } else {
                        $_SESSION['errorMessage'] = "Error in inserting";
                    }
                    // 
                } else {
                    $_SESSION['errorMessage'] = "Error in inserting";
                }
            }
        } else {
            $_SESSION['errorMessage'] = "Error in inserting to applicant resume";
        }
    } else {
        $_SESSION['errorMessage'] = "Error in approving applicant";
    }
    header("Location: mrf_list.php");
    exit(0);
}


// For adding requests of LOA
if (isset($_POST['add_request_loa_btn'])) {
    $selected_applicants = isset($_POST['applicants']) ? $_POST['applicants'] : array();


    $project_id = $link->real_escape_string($_POST['project_id']);
    $start_date = $link->real_escape_string($_POST['start_date']);
    $end_date = $link->real_escape_string($_POST['end_date']);
    $category = $link->real_escape_string($_POST['category']);
    $division = $link->real_escape_string($_POST['division']);
    $locator = $link->real_escape_string($_POST['locator']);
    $client_name = $link->real_escape_string($_POST['client_name']);
    $place_assigned = $link->real_escape_string($_POST['place_assigned']);
    $address_assigned = $link->real_escape_string($_POST['address_assigned']);
    $channel = $link->real_escape_string($_POST['channel']);
    $department = $link->real_escape_string($_POST['department']);
    $employment_status = $link->real_escape_string($_POST['employment_status']);
    $job_title = $link->real_escape_string($_POST['job_title']);
    $basic_salary = $link->real_escape_string($_POST['basic_salary']);
    $ecola = $link->real_escape_string($_POST['ecola']);
    $communication_allowance = $link->real_escape_string($_POST['communication_allowance']);
    $transportation_allowance = $link->real_escape_string($_POST['transportation_allowance']);
    $internet_allowance = $link->real_escape_string($_POST['internet_allowance']);
    $meal_allowance = $link->real_escape_string($_POST['meal_allowance']);
    $outbase_meal = $link->real_escape_string($_POST['outbase_meal']);
    $special_allowance = $link->real_escape_string($_POST['special_allowance']);
    $position_allowance = $link->real_escape_string($_POST['position_allowance']);
    $no_of_days = $link->real_escape_string($_POST['no_of_days']);
    $outlet = $link->real_escape_string($_POST['outlet']);
    $requested_by = $_SESSION['firstname'] . " " . $_SESSION['lastname'];

    $response = array();

    if (!empty($selected_applicants)) {
        foreach ($selected_applicants as $selected_value) {
            $parts = explode(" | ", $selected_value);

            $employee_id = $parts[0];
            $shortlist_id = $parts[1];

            $query = "INSERT INTO loa_requests (employee_id, project_id, shortlist_id, start_date, end_date,
            category, division, locator, client_name, 
            place_assigned, client_address, channel, department, employment_status, 
            job_title, basic_salary, ecola, communication_allowance, 
            transportation_allowance, internet_allowance, meal_allowance, outbase_meal,
            special_allowance, position_allowance, no_days_of_work, outlet, requested_by) 
            VALUES ('$employee_id', '$project_id', '$shortlist_id', '$start_date', '$end_date',
            '$category', '$division', '$locator', '$client_name',
            '$place_assigned', '$address_assigned', '$channel', '$department', '$employment_status',
            '$job_title', '$basic_salary', '$ecola', '$communication_allowance',
            '$transportation_allowance' ,'$internet_allowance', '$meal_allowance', '$outbase_meal', 
            '$special_allowance', '$position_allowance', '$no_of_days', '$outlet', '$requested_by')";

            $result = $link->query($query);

            if ($result) {
                $project_status = "FOR LOA";
                $update = "UPDATE shortlist_master 
                SET project_status = '$project_status' 
                WHERE employee_id = '$employee_id' AND id = '$shortlist_id'";
                $stmt = $link->query($update);

                if ($stmt) {
                    $transaction = "ADD LOA REQUEST";
                    $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
            VALUES (?, ?, ?, ?, ?)";
                    $transaction_log_result = $link->prepare($transaction_log);
                    $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                    $transaction_log_result->execute();

                    $response[] = array('message' => 'Success!');
                    $_SESSION['successMessage'] = 'Success!';
                } else {
                    $_SESSION[] = "Error in updating project status";
                }
            } else {
                $response[] = array('message' => 'Error!' . mysqli_error($link));
                $_SESSION['errorMessage'] = 'Error!' . mysqli_error($link);
            }
        }
    } else {
        $_SESSION['errorMessage'] = "Please select at least one applicant";
    }

    echo json_encode($response);
    mysqli_close($link);
    header("Location: request_loa.php?id=$project_id");
    exit;
}
