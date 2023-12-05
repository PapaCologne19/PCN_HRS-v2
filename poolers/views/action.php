<?php
session_start();
require_once '../../connect.php';

if (isset($_POST['submit_btn'])) {
    $lastname = chop(strtoupper($_POST['lastname']));
    $firstname = chop(strtoupper($_POST['firstname']));
    if (
        !empty($_POST['middlename']) && !ctype_space($_POST['middlename'])
        && strtoupper($_POST['middlename']) != 'NA'
        && strtoupper($_POST['middlename']) != 'N/A'
    ) {
        $middlename = strtoupper($_POST['middlename']);
    } else {
        $middlename = "N/A";
    }

    if (!empty($_POST['extension_name'])) {
        $extension_name = strtoupper($_POST['extension_name']);
    } else {
        $extension_name = "N/A";
    }

    $fullname = chop($firstname . " " . $middlename . " " . $lastname);
    $desired_position = chop(strtoupper($_POST['desired_position']));
    $area = chop(strtoupper($_POST['area']));
    $preferred_outlet = chop(strtoupper($_POST['preferred_outlet']));
    $contact_number = chop(strtoupper($_POST['contact_number']));
    $referred_by_id = chop(strtoupper($_SESSION['user_id']));
    $referred_by = chop(strtoupper($_SESSION['firstname'] . " " . $_SESSION['lastname']));
    $referred_by_division = chop(strtoupper($_SESSION['division']));


    $check = "SELECT fullname
    FROM applicant_referral 
    WHERE fullname = '$fullname'";
    $check_result = $link->query($check);

    if ($check_result->num_rows === 0) {

        if (!empty($_FILES['files']['name'][0])) {
            $fileCount = count($_FILES['files']['name']);
            $fileNames = [];
            $files = $_FILES['files'];

            for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
                $filename = $_FILES['files']['name'][$i];
                $destination_folder = "../resume_upload/";
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg', 'gif'];

                // Check if file type is valid
                if (in_array($ext, $allowed)) {
                    $newFilename = $filename;
                    move_uploaded_file($_FILES['files']['tmp_name'][$i], $destination_folder . $filename);

                    $fileNames[] = $newFilename;
                } else {
                    $_SESSION['errorMessage'] = "Error";
                }
            }
            $fileNamesStr = implode(',', $fileNames);

            $query = "INSERT INTO applicant_referral (lastname, firstname, middlename, extension_name, fullname, desired_position, area, preferred_outlet, contact_number, resume_file, resume_location, referred_by_id, referred_by, referred_by_division) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $result = $link->prepare($query);
            $result->bind_param("ssssssssssssss", $lastname, $firstname, $middlename, $extension_name, $fullname, $desired_position, $area, $preferred_outlet, $contact_number, $fileNamesStr, $destination_folder, $referred_by_id, $referred_by, $referred_by_division);
            if ($result->execute()) {

                $history = "INSERT INTO applicant_referral_history (lastname, firstname, middlename, extension_name, desired_position, area, preferred_outlet, contact_number, resume_file, resume_location, referred_by_id, referred_by, referred_by_division, status) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $history_result = $link->prepare($history);
                $history_result->bind_param("ssssssssssssss", $lastname, $firstname, $middlename, $extension_name, $desired_position, $area, $preferred_outlet, $contact_number, $fileNamesStr, $destination_folder, $referred_by_id, $referred_by, $referred_by_division, $status);
                if ($history_result->execute()) {
                    $_SESSION['successMessage'] = "Success";
                } else {
                    $_SESSION['errorMessage'] = "Error" . $link->error;
                }
            } else {
                $_SESSION['errorMessage'] = "Error" . $link->error;
            }
        } else {
            $_SESSION['errorMessage'] = "Empty";
        }
    } else {
        $_SESSION['errorMessage'] = "Already Pooled";
    }
    header("Location: submit_resume.php");
    exit(0);
}
