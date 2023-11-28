<?php
session_start();
include '../../connect.php';
date_default_timezone_set('Asia/Manila');
$date_now = date('Y-m-d H:i:s');
header('Content-Type: text/html; charset=utf-8');

$user_id = $_SESSION['user_id'];
$user_division = $_SESSION['division'];
$personnel = $_SESSION['firstname'] . " " . $_SESSION['lastname'];
$user_type = $_SESSION['user_type'];

// For Inserting Employee in database
if (isset($_POST['next'])) {
    $photoko2 = $_SESSION["photoko"];
    $dapplied1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['dapplied'])))));
    $appno1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['appnoko'])))));
    $source1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['source'])))));
    $lastnameko1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['lastnameko'])))));
    $firstnameko1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['firstnameko'])))));
    $mnko1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['mnko'])))));
    $extnname1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['extnname'])))));
    $paddress1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['paddress'])))));
    $cityn1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['cityn'])))));
    $regionn1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['regionn'])))));
    $peraddress1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['peraddress'])))));
    $birthday1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['birthday'])))));
    $dateOfBirth = $birthday1;
    date_default_timezone_set('Asia/Manila');
    $today = date('Y-m-d H:i:s');
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    $age1 = $diff->format("%y");
    $datebirth = date_create($birthday1);
    $birthday1a = date_format($datebirth, "m/d/Y");
    $gendern = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['gendern'])))));
    $civiln1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['civiln'])))));
    $cpnum1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['cpnum'])))));
    $landline1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['landline'])))));
    $emailadd1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['emailadd'])))));
    $despo1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['despo'])))));
    $classn1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['classn'])))));
    $idenn1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['idenn'])))));
    $sssnum1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['sssnum'])))));
    $pagibignum1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['pagibignum'])))));
    $phnum1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['phnum'])))));
    $tinnum1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['tinnum'])))));
    $e_person1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['e_person'])))));
    $e_address1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['e_address'])))));
    $e_contact1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['e_contact'])))));
    $policed1x = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['policed'])))));
    $datepol = date_create($policed1x);
    $policed1 = date_format($datepol, "m/d/Y");
    $brgyd1x = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['brgyd'])))));
    $datebrgy = date_create($brgyd1x);
    $brgyd1 = date_format($datebrgy, "m/d/Y");
    $nbid1x = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['nbid'])))));
    $datenbi = date_create($nbid1x);
    $nbid1 = date_format($datenbi, "m/d/Y");
    $psa1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['psa'])))));
    $remarks1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['remarks'])))));
    $lastname = $_SESSION['lastname'];
    $firstname = $_SESSION['firstname'];
    $fullname = $firstname . ' ' . $lastname;
    $resultempl = mysqli_query($link, "SELECT * FROM employees WHERE lastnameko = '$lastnameko1' AND firstnameko = '$firstnameko1' AND mnko='$mnko1' AND birthday = '$birthday1'");
    $row = $resultempl->fetch_assoc();

    if (mysqli_num_rows($resultempl) === 0) {
        $InsertApplicantQuery = "INSERT INTO employees
      (tracking,photopath,dapplied,appno,source,lastnameko,firstnameko,mnko,extnname,paddress,cityn,regionn,peraddress,birthday,age,gendern,civiln,cpnum,landline,emailadd,despo,classn,idenn,sssnum,pagibignum,phnum,tinnum,policed,brgyd,nbid,psa,remarks,e_person,e_address,e_number, created_by)
      VALUES
      ('$appno1','$photoko2','$dapplied1','$appno1','$source1','$lastnameko1','$firstnameko1','$mnko1','$extnname1','$paddress1','$cityn1','$regionn1','$peraddress1','$birthday1','$age1','$gendern','$civiln1','$cpnum1','$landline1','$emailadd1','$despo1','$classn1','$idenn1','$sssnum1','$pagibignum1','$phnum1','$tinnum1','$policed1x','$brgyd1x','$nbid1x','$psa1','$remarks1','$e_person1','$e_address1','$e_contact1', '$fullname')
      ";
        $InsertApplicantResult = mysqli_query($link, $InsertApplicantQuery);

        if ($InsertApplicantResult) {
            $transaction = "ADD EMPLOYEE - " . $firstnameko1 . " " . $mnko1 . " " . $lastnameko1 . " " . $extnname1;
            $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
            VALUES (?, ?, ?, ?, ?)";
            $transaction_log_result = $link->prepare($transaction_log);
            $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
            $transaction_log_result->execute();
            $_SESSION['successMessage'] = "Success!";
            unset($_SESSION["photoko"]);
        } else {
            $_SESSION['errorMessage'] = "Error in inserting applicant";
        }
    } else {
        $_SESSION['errorMessage'] = "Applicant is already in Database! In: " . $row['actionpoint'];
    }
    header("Location: employees.php");
    exit();
}


// For Updating Applicant in database
if (isset($_POST['updateit'])) {
    $id1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['shadowEdit'])))));
    $source1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['source'])))));
    $lastnameko1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['lastnameko'])))));
    $firstnameko1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['firstnameko'])))));
    $mnko1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['mnko'])))));
    $extnname1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['extnname'])))));
    $paddress1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['paddress'])))));
    $cityn1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['cityn'])))));
    $regionn1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['regionn'])))));
    $peraddress1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['peraddress'])))));
    $birthday1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['birthday'])))));
    $dateOfBirth = $birthday1;
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    $age1 = $diff->format("%y");
    $datebirth = date_create($birthday1);
    $birthday1a = date_format($datebirth, "m/d/Y");
    $gendern = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['gendern'])))));
    $civiln1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['civiln'])))));
    $cpnum1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['cpnum'])))));
    $landline1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['landline'])))));
    $emailadd1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['emailadd'])))));
    $despo1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['despo'])))));
    $classn1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['classn'])))));
    $idenn1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['idenn'])))));
    $sssnum1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['sssnum'])))));
    $pagibignum1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['pagibignum'])))));
    $phnum1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['phnum'])))));
    $tinnum1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['tinnum'])))));
    $e_person1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['e_person'])))));
    $e_address1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['e_address'])))));
    $e_contact1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['e_contact'])))));
    $policed1x = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['policed'])))));
    $datepol = date_create($policed1x);
    $policed1 = date_format($datepol, "m/d/Y");
    $brgyd1x = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['brgyd'])))));
    $datebrgy = date_create($brgyd1x);
    $brgyd1 = date_format($datebrgy, "m/d/Y");
    $nbid1x = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['nbid'])))));
    $datenbi = date_create($nbid1x);
    $nbid1 = date_format($datenbi, "m/d/Y");
    $psa1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['psa'])))));
    $remarks1 = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['remarks'])))));

    $updateQuery = "UPDATE employees
    SET
    source='$source1',
    lastnameko='$lastnameko1',
    firstnameko='$firstnameko1',
    mnko='$mnko1',
    extnname='$extnname1',
    paddress='$paddress1',
    cityn='$cityn1',
    regionn='$regionn1',
    peraddress='$peraddress1',
    birthday='$birthday1',
    age='$age1',
    gendern='$gendern',
    civiln='$civiln1',
    cpnum='$cpnum1',
    landline='$landline1',
    emailadd='$emailadd1',
    despo='$despo1',
    classn='$classn1',
    idenn='$idenn1',
    sssnum='$sssnum1',
    pagibignum='$pagibignum1',
    phnum='$phnum1',
    tinnum='$tinnum1',
    policed='$policed1x',
    brgyd='$brgyd1x',
    nbid='$nbid1x',
    psa='$psa1',
    e_person='$e_person1',
    e_address='$e_address1',
    e_number='$e_contact1',
    remarks='$remarks1'
    WHERE id = '$id1'";
    $updateQueryResult = mysqli_query($link, $updateQuery);

    if ($updateQueryResult) {


        $get = "SELECT * FROM employees WHERE id = '$id1'";
        $output = $link->query($get);
        $fetched = $output->fetch_assoc();

        $tracking_no = $link->real_escape_string($fetched['tracking']);
        $photo = $link->real_escape_string($fetched['photopath']);
        $date_applied = $link->real_escape_string($fetched['dapplied']);
        $app_number = $link->real_escape_string($fetched['appno']);
        $source = $link->real_escape_string($fetched['source']);

        if (!empty($fetched['mnko'])) {
            $fullname = $link->real_escape_string($fetched['lastnameko']) . ", " . $link->real_escape_string($fetched['firstnameko']) . " " . $link->real_escape_string($fetched['mnko']);
        } else {
            $fullname = $link->real_escape_string($fetched['lastnameko']) . ", " . $link->real_escape_string($fetched['firstnameko']);
        }
        $present_address = $fetched['paddress'];
        $city = $fetched['cityn'];
        $region = $fetched['regionn'];
        $birthday = $fetched['birthday'];
        $age = $fetched['age'];
        $gender = $fetched['gendern'];
        $civil_status = $fetched['civiln'];
        $contact_number = $fetched['cpnum'];
        $landline = $fetched['landline'];
        $email = $fetched['emailadd'];
        $desired_position = $fetched['despo'];
        $classification = $fetched['classn'];
        $indentification = $fetched['idenn'];
        $sss = $fetched['sssnum'];
        $philhealth = $fetched['phnum'];
        $pagibig = $fetched['pagibignum'];
        $tin = $fetched['tinnum'];
        $police = $fetched['policed'];
        $barangay = $fetched['brgyd'];
        $nbi = $fetched['nbid'];
        $psa = $fetched['psa'];
        $e_person = $fetched['e_person'];
        $e_address = $fetched['e_address'];
        $e_number = $fetched['e_number'];
        $remarks = $fetched['remarks'];
        $created_by = $fetched['created_by'];
        $updated_by = $_SESSION['firstname'] . " " . $_SESSION['lastname'];


        $insert_history = "INSERT INTO employee_update_history(tracking_no, photo, date_applied, 
        app_number, source, fullname, present_address,
         city, region, birthday, age, 
         gender, civil_status, contact_number, 
         landline, email, desired_position, classification, 
         indentification, sss, philhealth, pagibig,
          tin, police, barangay, nbi, psa, 
          e_person, e_address, e_number, remarks,
           created_by, updated_by) 
        VALUES ('$tracking_no', '$photo', '$date_applied', '$app_number', 
        '$source', '$fullname', '$present_address', '$city', '$region',
        '$birthday', '$age', '$gender', '$civil_status', '$contact_number',
        '$landline', '$email', '$desired_position', '$classification',
        '$indentification', '$sss', '$philhealth', '$pagibig',
        '$tin', '$police', '$barangay', '$nbi', 
        '$psa', '$e_person', '$e_address', '$e_number',
        '$remarks', '$created_by', '$updated_by')";
        $insert_result = $link->query($insert_history);

        if ($insert_result) {

            $transaction = "UPDATE EMPLOYEE - " . $firstnameko1 . " " . $mnko1 . " " . $lastnameko1 . " " . $extnname1;
            $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
            VALUES (?, ?, ?, ?, ?)";
            $transaction_log_result = $link->prepare($transaction_log);
            $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
            $transaction_log_result->execute();

            $_SESSION['successMessage'] = "Success!";
        } else {
            $_SESSION['errorMessage'] = "Error in inserting to history!";
        }
    } else {
        $_SESSION['errorMessage'] = "Update Error!";
    }
    header("Location: employees.php");
    exit(0);
}


//   For Blacklisting
if (isset($_POST['blacklist_button'])) {
    $id = $_POST['blacklistID'];
    $blacklistreason = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['reason'])))));
    $datenow = date("m/d/Y");
    $actionpoint = "BLACKLISTED";

    $blacklist_query = "UPDATE employees SET actionpoint = '$actionpoint', reasonofaction = '$blacklistreason', dateofaction = '$datenow' WHERE id = '$id'";
    $blacklist_result = mysqli_query($link, $blacklist_query);

    if ($blacklist_result) {
        $queryem = "SELECT * FROM employees WHERE id = '$id'";
        $resultem = mysqli_query($link, $queryem);
        while ($rowem = mysqli_fetch_array($resultem)) {

            $blacklist_history_query = "INSERT INTO blacklist_history(tracking,photopath,dapplied,appno,source,lastnameko,firstnameko,mnko,extnname,paddress,cityn,regionn,peraddress,birthday,age,gendern,civiln,cpnum,landline,emailadd,despo,classn,idenn,sssnum,pagibignum,phnum,tinnum,policed,brgyd,nbid,psa,remarks,actionpoint,reasonofaction,dateofaction)
                VALUES ('$rowem[1]','$rowem[2]','$rowem[3]','$rowem[4]','$rowem[5]','$rowem[6]','$rowem[7]','$rowem[8]','$rowem[9]','$rowem[10]','$rowem[11]','$rowem[12]','$rowem[13]','$rowem[14]','$rowem[15]','$rowem[16]','$rowem[17]','$rowem[18]','$rowem[19]','$rowem[20]','$rowem[21]','$rowem[22]','$rowem[23]','$rowem[24]','$rowem[25]','$rowem[26]','$rowem[27]','$rowem[28]','$rowem[29]','$rowem[30]','$rowem[31]','$rowem[32]','$actionpoint1','$blacklistreason1','$datenow')";
            $blacklist_history_result = mysqli_query($link, $blacklist_history_query);

            if ($blacklist_history_result) {

                $transaction = "BLACKLIST EMPLOYEE - " . $id;
                $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                VALUES (?, ?, ?, ?, ?)";
                $transaction_log_result = $link->prepare($transaction_log);
                $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                $transaction_log_result->execute();

                $_SESSION['successMessage'] = "Success!";
            } else {
                $_SESSION['errorMessage'] = "Blacklist error!";
            }
        }
    }
    header("Location: employees.php");
    exit(0);
}

// For Deleting Applicants. Change status to canceled but not totally deleted in database for records purposes
if (isset($_POST['delete_applicant_button'])) {
    $id = $_POST['delete_applicant_ID'];
    $delete_applicant_reason = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['reason'])))));
    $datenow = date("m/d/Y");

    $delete_applicant_query = "UPDATE employees SET is_deleted = '1', reasonofaction = '$delete_applicant_reason', dateofaction = '$datenow' WHERE id = '$id'";
    $delete_applicant_result = mysqli_query($link, $delete_applicant_query);

    if ($delete_applicant_result) {

        $transaction = "DELETE EMPLOYEE - " . $id;
        $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
            VALUES (?, ?, ?, ?, ?)";
        $transaction_log_result = $link->prepare($transaction_log);
        $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
        $transaction_log_result->execute();

        $_SESSION['successMessage'] = "Success!";
    } else {
        $_SESSION['errorMessage'] = "Delete error!";
    }
    header("Location: employees.php");
    exit(0);
}

// For Undo Blacklisted Applicants
if (isset($_POST['undo_button_click'])) {
    $undo_blacklisted_id = $_POST['undoblacklist_id'];
    $undo_blacklist = "UPDATE employees SET actionpoint = 'ACTIVE', reasonofaction = '', dateofaction = '' WHERE id = '$undo_blacklisted_id'";

    $result_editblacklist = mysqli_query($link, $undo_blacklist);

    if ($result_editblacklist) {

        $transaction = "UNBLACKLIST EMPLOYEE - " . $undo_blacklisted_id;
        $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
            VALUES (?, ?, ?, ?, ?)";
        $transaction_log_result = $link->prepare($transaction_log);
        $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
        $transaction_log_result->execute();


        $_SESSION['successMessage'] = "Success!";
    } else {
        $_SESSION['errorMessage'] = "Error";
    }
    header("Location: list_of_blacklisted.php");
    exit(0);
}

// For Undo Backout Applicants
if (isset($_POST['undo_backout_button_click'])) {
    $undo_backout_id = $_POST['undobackout_id'];
    $undo_backout = "UPDATE employees SET actionpoint = 'ACTIVE', reasonofaction = '', dateofaction = '' WHERE id = '$undo_backout_id'";

    $result_editbackout = mysqli_query($link, $undo_backout);

    if ($result_editbackout) {

        $transaction = "UNBACKOUT EMPLOYEE - " . $undo_backout_id;
        $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
            VALUES (?, ?, ?, ?, ?)";
        $transaction_log_result = $link->prepare($transaction_log);
        $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
        $transaction_log_result->execute();

        $_SESSION['successMessage'] = "Success!";
    } else {
        $_SESSION['errorMessage'] = "Error";
    }
    header("Location: list_of_backout.php");
    exit(0);
}

// For Undo Canceled Applicants
if (isset($_POST['undo_canceled_button_click'])) {
    $undo_canceled_id = $_POST['undocanceled_id'];
    $undo_cancel = "UPDATE employees SET is_deleted = '0', reasonofaction = '', dateofaction = '' WHERE id = '$undo_canceled_id'";

    $result_editcancel = mysqli_query($link, $undo_cancel);

    if ($result_editcancel) {

        $transaction = "UNBACKOUT EMPLOYEE - " . $undo_canceled_id;
        $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
            VALUES (?, ?, ?, ?, ?)";
        $transaction_log_result = $link->prepare($transaction_log);
        $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
        $transaction_log_result->execute();

        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error";
    }
    header("Location: list_of_canceled.php");
    exit(0);
}

// For creating shortlist title
if (isset($_POST['createshortlist'])) {
    $dtnow = date("m/d/Y");

    $projecttitle1 = $_POST['projecttitle'];
    $newshortlist1 = $_POST['newshortlist'];

    if (!empty($projecttitle1) || !empty($newshortlist1)) {
        $querymo = "SELECT * FROM projects where id = '$projecttitle1'";
        $resultmo = mysqli_query($link, $querymo);
        while ($rowmo = mysqli_fetch_assoc($resultmo)) {
            $project_t = $rowmo['project_title'];
            $client_t = $rowmo['client_company_id'];
            $mrf_tracking = $rowmo['mrf_tracking'];
        }

        $queryns = "select * from shortlist_details WHERE shortlistname = '$newshortlist1'";
        $resultns = mysqli_query($link, $queryns);

        if (mysqli_num_rows($resultns) == 0) {
            // kapag wala pang user name na kaparehas

            $query = "INSERT INTO shortlist_details(project_id, shortlistname,project, mrf_tracking, client,datecreated,activity) VALUES('$projecttitle1','$newshortlist1','$project_t', '$mrf_tracking', '$client_t','$dtnow','ACTIVE')";
            $result = mysqli_query($link, $query);

            if ($result) {

                $transaction = "CREATE SHORTLIST TITLE - " . $newshortlist1;
                $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                    VALUES (?, ?, ?, ?, ?)";
                $transaction_log_result = $link->prepare($transaction_log);
                $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                $transaction_log_result->execute();


                $_SESSION['successMessage'] = "Success!";
            } else {
                $_SESSION['errorMessage'] = "Error in creating shortlist title";
            }
        } else {
            $_SESSION['errorMessage'] = "unable to create shortlist, name not unique !";
        }
    } else {
        $_SESSION['errorMessage'] = "Fields must be Filled";
    }
    header("Location: add_shortlist.php");
    exit();
}


// For adding applicants to shortlist
if (isset($_POST['add_shortlist_click'])) {
    $id1 = $_POST['appno_number_click'];
    $app_id = $_POST['appno_id_click'];
    $data = $_SESSION["data"];

    $querytac = "SELECT * FROM employees WHERE appno = '$id1'";
    $resultac = mysqli_query($link, $querytac);
    while ($rowac = mysqli_fetch_assoc($resultac)) {
        $dtnow = date("m/d/Y");
        $querychk = "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data' AND appnumto='$id1' ";
        $resultchk = mysqli_query($link, $querychk);
        if (mysqli_num_rows($resultchk) == 0) {
            // kapag wala pang user name na kaparehas
            $query3 = "INSERT INTO shortlist_master(employee_id, shortlistnameto, appnumto, dateto) VALUES('$app_id', '$data', '$id1', '$dtnow')";
            $results3 = mysqli_query($link, $query3);

            if ($results3) {
                $transaction = "ADDED APPLICANT TO SHORTLIST - " . $data;
                $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                    VALUES (?, ?, ?, ?, ?)";
                $transaction_log_result = $link->prepare($transaction_log);
                $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                $transaction_log_result->execute();

                $response = array('message' => 'Success!');
                echo json_encode($response);
                exit;
            } else {
                $response = array('message' => 'Already Shortlisted!');
                echo json_encode($response);
                exit;
            }
        } else {
            $response = array('message' => 'Already Shortlisted!');
            echo json_encode($response);
            exit;
        }
    }
}

// For untermination of applicants
if (isset($_POST['unterminate_applicant_button'])) {

    $emp_number1 = $_POST['unterminate_applicant_ID'];
    $unter_reason1 = mysqli_real_escape_String($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['reason'])))));

    $unterminate_query = "UPDATE employees SET actionpoint = 'EWB', unter_reason = '$unter_reason1', reasonofaction = '$unter_reason1' WHERE appno = '$emp_number1'";
    $resultemp = mysqli_query($link, $unterminate_query);

    if ($resultemp) {
        $transaction = "UNTERMINATE EMPLOYEE - " . $emp_number1;
        $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                    VALUES (?, ?, ?, ?, ?)";
        $transaction_log_result = $link->prepare($transaction_log);
        $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
        $transaction_log_result->execute();

        $_SESSION['succesMessage'] = "Success!";
        header("Location: recruitment.php");
    } else {
        $_SESSION['errorMessage'] = "Untermination error!";
        header("Location: recruitment.php");
    }
}

// For removing applicants to the shortlist table
if (isset($_POST['remove_button_click'])) {
    $id1 = $_POST['app_num'];
    $corow1 = $_POST['shad'];
    $data = $_SESSION["data"];

    if ($corow1 != 1) {
        $dtnow = date("m/d/Y");

        $querychk1 = "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data' AND appnumto = '$id1' ";
        $resultchk1 = mysqli_query($link, $querychk1);
        if (mysqli_num_rows($resultchk1) == 0) {
            $response = array('message' => 'Cannot locate applicant!');
            echo json_encode($response);
            exit;
        } else {
            $query_delete = "UPDATE shortlist_master SET is_deleted = '1' WHERE shortlistnameto = '$data' AND appnumto = '$id1'";
            $result_delete = mysqli_query($link, $query_delete);

            if ($result_delete) {

                $transaction = "REMOVE APPLICANT FROM SHORTLIST - " . $data;
                $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                    VALUES (?, ?, ?, ?, ?)";
                $transaction_log_result = $link->prepare($transaction_log);
                $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                $transaction_log_result->execute();

                $response = array('message' => 'Success!');
                echo json_encode($response);
                exit;
            } else {
                $response = array('message' => 'Delete Error!');
                echo json_encode($response);
                exit;
            }
        }
    } else {
        $query_update = "UPDATE employees SET actionpoint = 'ACTIVE' WHERE appno = '$id1'";
        $result_update = mysqli_query($link, $query_update);

        if ($result_update) {
            $dtnow = date("m/d/Y");
            $querychk1 = "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data' AND appnumto = '$id1'";
            $resultchk1 = mysqli_query($link, $querychk1);
            if (mysqli_num_rows($resultchk1) == 0) {
                $response = array('message' => 'Cannot locate applicant!');
                echo json_encode($response);
                exit;
            } else {
                $query_deleted = "UPDATE shortlist_master SET is_deleted = '1' WHERE shortlistnameto = '$data' AND appnumto = '$id1'";
                $result_deleted = mysqli_query($link, $query_deleted);

                if ($result_deleted) {

                    $transaction = "REMOVE APPLICANT FROM SHORTLIST - " . $data;
                    $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                    VALUES (?, ?, ?, ?, ?)";
                    $transaction_log_result = $link->prepare($transaction_log);
                    $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                    $transaction_log_result->execute();


                    $response = array('message' => 'Success!');
                    echo json_encode($response);
                    exit;
                } else {
                    $response = array('message' => 'Error!');
                    echo json_encode($response);
                    exit;
                }
            }
        } else {
            $response = array('message' => 'Error!');
            echo json_encode($response);
            exit;
        }
    }
}

// For deploying applicants(Not Verified)
if (isset($_POST['deploy_button_click'])) {
    $id1 = $_POST['deploy_id'];
    $dtnow = date("m/d/Y");
    $query_deploy = "UPDATE employees SET ewbdeploy = 'FOR DEPLOYMENT', ewbdate = '$dtnow', ewb_status = 'NOT VERIFY' WHERE appno = '$id1'";
    $result_deploy = mysqli_query($link, $query_deploy);
    $data = $_SESSION["data"];

    if ($result_deploy) {
        $dtnow = date("m/d/Y");
        $querchk1 = "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data' AND appnumto = '$id1'";
        $resultchk = mysqli_query($link, $querchk1);
        if (mysqli_num_rows($resultchk) == 0) {
            $_SESSION['errorMessage'] = "Cannot locate applicant!";
        } else {
            $query_update = "UPDATE shortlist_master SET ewb = 'EWB', ewbdate = '$dtnow' WHERE appnumto = '$id1'";
            $result_update = mysqli_query($link, $query_update);
            if ($result_update) {

                $transaction = "DEPLOY APPLICANT (NOT VERIFIED) - " . $id1;
                $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                    VALUES (?, ?, ?, ?, ?)";
                $transaction_log_result = $link->prepare($transaction_log);
                $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                $transaction_log_result->execute();

                $_SESSION['successMessage'] = "Success!";
            } else {
                $_SESSION['errorMessage'] = "Error";
            }
        }
    } else {
        $_SESSION['errorMessage'] = "Error";
    }
    header("Location: deploy.php");
    exit(0);
}


// For selected applicants in shortlisting
if (isset($_POST['add_to_shortlist'])) {
    $data = $_SESSION["data"];
    $selected_applicants = (array)$_POST['user'];
    $selected_applicants_id = (array)$_POST['userid'];

    // Initialize the $response array
    $response = array();

    if (!empty($selected_applicants)) {
        // Loop through selected applicants
        foreach ($selected_applicants as $index => $id1) {

            // Execute a query to get information about the selected applicant
            $querytac = "SELECT * FROM employees WHERE appno = '$id1'";
            $resultac = mysqli_query($link, $querytac);

            if ($resultac) {
                // Fetch the result row
                $rowac = mysqli_fetch_assoc($resultac);
                $emp_id = $rowac['id'];

                // User action point is not ACTIVE
                $dtnow = date("m/d/Y");
                $querychk = "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data' AND appnumto='$id1' ";
                $resultchk = mysqli_query($link, $querychk);

                if (mysqli_num_rows($resultchk) == 0) {
                    $query3 = "INSERT INTO shortlist_master(employee_id,shortlistnameto,appnumto,dateto) VALUES('$emp_id','$data','$id1','$dtnow')";
                    $results3 = mysqli_query($link, $query3);

                    if ($results3) {

                        $transaction = "ADD EMPLOYEES TO SHORTLIST - " . $data;
                        $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                            VALUES (?, ?, ?, ?, ?)";
                        $transaction_log_result = $link->prepare($transaction_log);
                        $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                        $transaction_log_result->execute();

                        // User successly added to the shortlist
                        $response[] = array('message' => 'Success!');
                        $_SESSION['successMessage'] = 'Success!';
                    } else {
                        // Insertion failed
                        $response[] = array('message' => 'Not Added due to Duplication!');
                        $_SESSION['errorMessage'] = 'Not Added due to Duplication!';
                    }
                } else {
                    // User already exists in the shortlist
                    $response[] = array('message' => 'Not Added due to Duplication!');
                    $_SESSION['errorMessage'] = 'Not Added due to Duplication!';
                }
                // }
            } else {
                // Error in the query to fetch employee data
                $response[] = array('message' => 'Error: Query to fetch employee data failed');
                $_SESSION['errorMessage'] = 'Error: Query to fetch employee data failed';
            }
        }
    } else {
        // No selected applicants
        $response[] = array('message' => 'No selected Applicants');
        $_SESSION['errorMessage'] = 'No selected Applicants';
    }

    // Send JSON response
    echo json_encode($response);

    // Close the database connection
    mysqli_close($link);

    // Redirect back to the recruitment page
    header("Location: deploy.php");
    exit;
}



// For reverification of applicant that is declined by EWB
if (isset($_POST['reverification_button'])) {
    $id = $_POST['reverificationID'];
    $reason = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['reason'])))));

    if (!empty($reason)) {
        $reverification_query = "UPDATE employees SET ewb_status = 'NOT VERIFY' WHERE id = '$id'";
        $reverification_result = $link->query($reverification_query);

        if ($reverification_result) {
            $update_queries = "UPDATE employees SET recruitment_reason = '$reason' WHERE id = '$id'";
            $update_results = $link->query($update_queries);

            if ($update_results) {
                $select_query = "SELECT * FROM employees WHERE id = '$id'";
                $select_result = $link->query($select_query);
                $row = $select_result->fetch_assoc();

                $firstname = $row['firstnameko'];
                $lastname = $row['lastnameko'];
                $middlename = $row['mnko'];

                $extension_name = $row['extnname'];
                if (!empty($extension_name)) {
                    $fullname = $lastname . " " . $extension_name . ", " . $firstname . " " . $middlename;
                } else {
                    $fullname = $lastname . ", " . $firstname . " " . $middlename;
                }
                $approved_by = $_SESSION['lastname'] . ", " . $_SESSION['firstname'];
                $app_num = $row['appno'];
                $sssnum = $row['sssnum'];
                $phnum = $row['phnum'];
                $pagibignum = $row['pagibignum'];
                $tinnum = $row['tinnum'];
                $birthday = $row['birthday'];
                $address = $row['peraddress'];

                $insert = "INSERT INTO recruitment_approve_history(name, app_num, sss, philhealth, pagibig, tin, birthday, address, remarks, approved_by) 
                VALUES ('$fullname', '$app_num', '$sssnum', '$phnum', '$pagibignum', '$tinnum', '$birthday', '$address', '$reason', '$approved_by')";
                $results = $link->query($insert);

                if ($results) {

                    $transaction = "REVERIFY EMPLOYEE - " . $id;
                    $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                            VALUES (?, ?, ?, ?, ?)";
                    $transaction_log_result = $link->prepare($transaction_log);
                    $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                    $transaction_log_result->execute();


                    $_SESSION['successMessage'] = "Success";
                    exit();
                } else {
                    $_SESSION["errorMessage"] = "Error!!!";
                }
            } else {
                $_SESSION['errorMessage'] = "Error in inserting reason";
            }
        } else {
            $_SESSION['errorMessage'] = "Error in Insert";
        }
    } else {
        $_SESSION['errorMessage'] = "Please enter reason";
    }

    // Redirect only once after all the logic
    header("Location: recruitment.php");
}



// For Providing Shortlist in Recruitment>MRF
if (isset($_POST['provideMRF_button_click'])) {
    $mrf_val1 = $_POST['provideID'];

    $query = "UPDATE mrf SET hr_personnel = 'YES' WHERE id = '$mrf_val1'";
    $result = mysqli_query($link, $query);

    if ($result) {

        $transaction = "PROVIDE SHORTLIST TO MRF - " . $mrf_val1;
        $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                            VALUES (?, ?, ?, ?, ?)";
        $transaction_log_result = $link->prepare($transaction_log);
        $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
        $transaction_log_result->execute();


        $_SESSION['successMessage'] = "Success!";
    } else {
        $_SESSION['errorMessage'] = "Error";
    }
    header("Location: accept_mrf.php");
    exit(0);
}

// For accepting MRF
if (isset($_POST['acceptMRF_button_click'])) {
    $mrf_val1 = $_POST['acceptID'];

    $query = "UPDATE mrf SET hr_personnel = 'YES', is_approve = '1' WHERE id = '$mrf_val1'";
    $result = mysqli_query($link, $query);

    if ($result) {
        $query_select = "SELECT * FROM mrf WHERE id = '$mrf_val1'";
        $query_result = $link->query($query_select);
        while ($query_row = $query_result->fetch_assoc()) {
            $tracking_no = $query_row['tracking'];
            $project_title = $query_row['project_title'];
            $client = $query_row['client'];
            $total = $query_row['np_male'] + $query_row['np_female'];
            $work_duration_start = $query_row['work_duration_start'];
            $work_duration_end = $query_row['work_duration_end'];
            $status = "1";

            $insert_db = "INSERT INTO projects (mrf_id,mrf_tracking, project_title, client_company_id, ewb_count, start_date, end_date, status) 
            VALUES ('$mrf_val1', '$tracking_no', '$project_title', '$client', '$total', '$work_duration_start', '$work_duration_end', '$status')";
            $result_insert = $link->query($insert_db);
            if ($result_insert) {

                $transaction = "ACCEPT MRF - " . $mrf_val1;
                $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                    VALUES (?, ?, ?, ?, ?)";
                $transaction_log_result = $link->prepare($transaction_log);
                $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                $transaction_log_result->execute();

                $_SESSION['successMessage'] = "Success!";
            } else {
                $_SESSION['errorMessage'] = "Error";
            }
        }
    } else {
        $_SESSION['errorMessage'] = "Error";
    }

    header("Location: accept_mrf.php");
    exit(0);
}

// For updating the photo of Applicants
if (isset($_POST['updatePhotoBtn'])) {
    $id = $link->real_escape_string($_POST['id']);
    $file = $_FILES['photo'];
    $fileName = $_FILES['photo']['name'];
    $fileTempName = $_FILES["photo"]["tmp_name"];
    $fileSize = $_FILES["photo"]["size"];
    $fileError = $_FILES["photo"]["error"];
    $fileType = $_FILES["photo"]["type"];

    $allowed = array('jpg', 'jpeg', 'png');

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) {
                $fileNameNew = uniqid('', true) . ".png"; // Change the extension to PNG
                $fileDestination = "../../upload/" . $fileNameNew; // Adjust the destination path

                if ($fileActualExt === 'jpeg' || $fileActualExt === 'jpg') {
                    // Convert JPEG/JPG to PNG
                    $sourceImage = imagecreatefromjpeg($fileTempName);
                    imagepng($sourceImage, $fileDestination);
                    imagedestroy($sourceImage);
                } else {
                    move_uploaded_file($fileTempName, $fileDestination);
                }

                if (!empty($file)) {
                    $updateRoomImageQuery = "UPDATE employees SET photopath = '$fileDestination' WHERE id = '$id'";
                    $result = $link->query($updateRoomImageQuery);

                    if ($result) {
                        $transaction = "UPDATE THE PHOTO OF EMPLOYEE - " . $id;
                        $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                    VALUES (?, ?, ?, ?, ?)";
                        $transaction_log_result = $link->prepare($transaction_log);
                        $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                        $transaction_log_result->execute();


                        $_SESSION['successMessage'] = "Success!";
                    } else {
                        $_SESSION['errorMessage'] = "Failed to upload picture";
                    }
                } else {
                    $_SESSION['errorMessage'] = "Failed to upload picture. Please insert an image first!";
                }
            } else {
                $_SESSION['errorMessage'] = "The size of your image is too big!";
            }
        } else {
            $_SESSION['errorMessage'] = "There was an error in uploading your picture!";
        }
    } else {
        $_SESSION['errorMessage'] = "You cannot upload this type of image. Only JPEG, JPG, or PNG are allowed.";
    }

    header("Location: update_applicants.php?id=$id");
    exit(0);
}

// For Ratings - PASSED
if (isset($_POST['passBtn'])) {
    $resumeID = $link->real_escape_string($_POST['resumeID']);
    $projectID = $link->real_escape_string($_POST['projectID']);
    $applicant = $link->real_escape_string($_POST['applicant']);
    $position_applied = $link->real_escape_string($_POST['position_applied']);
    $interviewer = $link->real_escape_string($_POST['interviewer']);
    $date_now = $link->real_escape_string($_POST['date_now']);
    $relevant_educ_background = $link->real_escape_string($_POST['relevant_educ_background']);
    $related_work_experience = $link->real_escape_string($_POST['related_work_experience']);
    $related_computer_skills = $link->real_escape_string($_POST['related_computer_skills']);
    $verbal_communication_skills = $link->real_escape_string($_POST['verbal_communication_skills']);
    $cooperation = $link->real_escape_string($_POST['cooperation']);
    $personality = $link->real_escape_string($_POST['personality']);
    $intelligence = $link->real_escape_string($_POST['intelligence']);
    $diction = $link->real_escape_string($_POST['diction']);
    $others = $link->real_escape_string($_POST['others']);
    $IQ = $link->real_escape_string($_POST['IQ']);
    $english = $link->real_escape_string($_POST['english']);
    $math = $link->real_escape_string($_POST['math']);
    $interview_details = $link->real_escape_string($_POST['interview_details']);
    $status = "QUALIFIED";
    $approved_by = $_SESSION['firstname'] . " " . $_SESSION['lastname'];
    $approved_date = date('Y-m-d');

    if (empty($relevant_educ_background) 
        && empty($related_work_experience) 
        && empty($related_computer_skills)
        && empty($verbal_communication_skills) 
        && empty($cooperation) 
        && empty($personality)
        && empty($intelligence) 
        && empty($diction) 
        && empty($others)
        && empty($IQ) 
        && empty($english) 
        && empty($math) 
        && empty($interview_details)) {

        $query = "INSERT INTO ratings(resume_id, applicant_name, interviewer, position_applied, date_interviewed, result)
        VALUES ('$resumeID', '$applicant', '$interviewer', '$position_applied', '$date_now', '$status')";
        $result = $link->query($query);
        if ($result) {
            $update = "UPDATE applicant_resume SET status = '$status', recruitment_approved_by = '$approved_by', recruitment_action_date = '$approved_date' WHERE id = '$resumeID'";
            $update_result = $link->query($update);

            if ($update_result) {
                $transaction = "RATE APPLICANT (PASSED) - " . $applicant;
                $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                    VALUES (?, ?, ?, ?, ?)";
                $transaction_log_result = $link->prepare($transaction_log);
                $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                $transaction_log_result->execute();


                $_SESSION['successMessage'] = "Success!";
            } else {
                $_SESSION['errorMessage'] = "Error in update";
            }
        } else {
            $_SESSION["errorMessage"] = "Error in inserting data";
        }
    } else {
        $query = "INSERT INTO ratings(resume_id, applicant_name, interviewer, position_applied, date_interviewed, relevant_educ_background, related_work_exp, related_computer_skills, verbal_comm_skills, cooperation, personality, intelligence, diction, others, IQ, english, math, result, interview_details)
        VALUES ('$resumeID', '$applicant', '$interviewer', '$position_applied', '$date_now', '$relevant_educ_background', '$related_work_experience', '$related_computer_skills', '$verbal_communication_skills', '$cooperation', '$personality', '$intelligence', '$diction', '$others', '$IQ', '$english', '$math', '$status', '$interview_details')";
        $result = $link->query($query);

        if ($result) {
            $update = "UPDATE applicant_resume SET status = '$status' WHERE id = '$resumeID'";
            $update_result = $link->query($update);

            if ($update_result) {

                $transaction = "RATE APPLICANT (PASSED) - " . $applicant;
                $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                    VALUES (?, ?, ?, ?, ?)";
                $transaction_log_result = $link->prepare($transaction_log);
                $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                $transaction_log_result->execute();
                if($transaction_log_result){
                    $_SESSION['successMessage'] = "Success!";
                }
                else {
                    $_SESSION['errorMessage'] = "Error in update";
                }

            } else {
                $_SESSION['errorMessage'] = "Error in update";
            }
        } else {
            $_SESSION["errorMessage"] = "Error in inserting data";
        }
    }

    header("Location: shortlisted_applicants.php?id=$projectID");
    exit(0);
}

// FOR Ratings - Failed 1
if (isset($_POST['failedBtn-1'])) {
    $resumeID = $link->real_escape_string($_POST['resumeID']);
    $projectID = $link->real_escape_string($_POST['projectID']);
    $applicant = $link->real_escape_string($_POST['applicant']);
    $position_applied = $link->real_escape_string($_POST['position_applied']);
    $interviewer = $link->real_escape_string($_POST['interviewer']);
    $date_now = $link->real_escape_string($_POST['date_now']);
    $reason_to_reject = $link->real_escape_string($_POST['reason_to_reject']);
    $status = "NOT QUALIFIED";

    $query = "INSERT INTO ratings(resume_id, applicant_name, interviewer, position_applied, date_interviewed, interview_details, result)
        VALUES ('$resumeID', '$applicant', '$interviewer', '$position_applied', '$date_now', '$reason_to_reject', '$status')";
    $result = $link->query($query);
    if ($result) {
        $update = "UPDATE applicant_resume SET status = '$status' WHERE id = '$resumeID'";
        $update_result = $link->query($update);

        if ($update_result) {

            $transaction = "RATE APPLICANT (FAILED) - " . $applicant . "- Reason to reject: " . $reason_to_reject;
            $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                    VALUES (?, ?, ?, ?, ?)";
            $transaction_log_result = $link->prepare($transaction_log);
            $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
            $transaction_log_result->execute();


            $_SESSION['successMessage'] = "Success!";
        } else {
            $_SESSION['errorMessage'] = "Error in update";
        }
    } else {
        $_SESSION["errorMessage"] = "Error in inserting data";
    }
    header("Location: shortlisted_applicants.php?id=$projectID");
    exit(0);
}

// For Ratings - Failed 2
if (isset($_POST['failedBtn2'])) {
    $resumeID = $link->real_escape_string($_POST['resumeID']);
    $projectID = $link->real_escape_string($_POST['projectID']);
    $applicant = $link->real_escape_string($_POST['applicant']);
    $position_applied = $link->real_escape_string($_POST['position_applied']);
    $interviewer = $link->real_escape_string($_POST['interviewer']);
    $date_now = $link->real_escape_string($_POST['date_now']);
    $relevant_educ_background = $link->real_escape_string($_POST['relevant_educ_background']);
    $related_work_experience = $link->real_escape_string($_POST['related_work_experience']);
    $related_computer_skills = $link->real_escape_string($_POST['related_computer_skills']);
    $verbal_communication_skills = $link->real_escape_string($_POST['verbal_communication_skills']);
    $cooperation = $link->real_escape_string($_POST['cooperation']);
    $personality = $link->real_escape_string($_POST['personality']);
    $intelligence = $link->real_escape_string($_POST['intelligence']);
    $diction = $link->real_escape_string($_POST['diction']);
    $others = $link->real_escape_string($_POST['others']);
    $IQ = $link->real_escape_string($_POST['IQ']);
    $english = $link->real_escape_string($_POST['english']);
    $math = $link->real_escape_string($_POST['math']);
    $interview_details = $link->real_escape_string($_POST['interview_details']);
    $status = "NOT QUALIFIED";

    $query = "INSERT INTO ratings(resume_id, applicant_name, interviewer, position_applied, date_interviewed, relevant_educ_background, related_work_exp, related_computer_skills, verbal_comm_skills, cooperation, personality, intelligence, diction, others, IQ, english, math, result, interview_details)
        VALUES ('$resumeID', '$applicant', '$interviewer', '$position_applied', '$date_now', '$relevant_educ_background', '$related_work_experience', '$related_computer_skills', '$verbal_communication_skills', '$cooperation', '$personality', '$intelligence', '$diction', '$others', '$IQ', '$english', '$math', '$status', '$interview_details')";
    $result = $link->query($query);

    if ($result) {
        $update = "UPDATE applicant_resume SET status = '$status' WHERE id = '$resumeID'";
        $update_result = $link->query($update);

        if ($update_result) {
            $transaction = "RATE APPLICANT (FAILED) - " . $applicant . "- Interview Details " . $interview_details;
            $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                    VALUES (?, ?, ?, ?, ?)";
            $transaction_log_result = $link->prepare($transaction_log);
            $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
            $transaction_log_result->execute();

            $_SESSION['successMessage'] = "Success!";
        } else {
            $_SESSION['errorMessage'] = "Error in update";
        }
    } else {
        $_SESSION["errorMessage"] = "Error in inserting data";
    }
    header("Location: shortlisted_applicants.php?id=$projectID");
    exit(0);
}

// For Update Ratings - PASSED
if (isset($_POST['passUpdateBtn'])) {
    $resumeID = $link->real_escape_string($_POST['resumeID']);
    $projectID = $link->real_escape_string($_POST['projectID']);
    $relevant_educ_background = $link->real_escape_string($_POST['relevant_educ_background']);
    $related_work_experience = $link->real_escape_string($_POST['related_work_experience']);
    $related_computer_skills = $link->real_escape_string($_POST['related_computer_skills']);
    $verbal_communication_skills = $link->real_escape_string($_POST['verbal_communication_skills']);
    $cooperation = $link->real_escape_string($_POST['cooperation']);
    $personality = $link->real_escape_string($_POST['personality']);
    $intelligence = $link->real_escape_string($_POST['intelligence']);
    $diction = $link->real_escape_string($_POST['diction']);
    $others = $link->real_escape_string($_POST['others']);
    $IQ = $link->real_escape_string($_POST['IQ']);
    $english = $link->real_escape_string($_POST['english']);
    $math = $link->real_escape_string($_POST['math']);
    $interview_details = $link->real_escape_string($_POST['interview_details']);
    $status = "QUALIFIED";

    $queryss = "SELECT * FROM ratings WHERE resume_id = '$resumeID'";
    $resultss = $link->query($queryss);
    $rowed = $resultss->fetch_assoc();

    if (
        $rowed['relevant_educ_background'] === $_POST['relevant_educ_background'] &&
        $rowed['related_work_exp'] === $_POST['related_work_experience'] &&
        $rowed['related_computer_skills'] === $_POST['related_computer_skills'] &&
        $rowed['verbal_comm_skills'] === $_POST['verbal_communication_skills'] &&
        $rowed['cooperation'] === $_POST['cooperation'] &&
        $rowed['personality'] === $_POST['personality'] &&
        $rowed['diction'] === $_POST['diction'] &&
        $rowed['others'] === $_POST['others'] &&
        $rowed['IQ'] === $_POST['IQ'] &&
        $rowed['english'] === $_POST['english'] &&
        $rowed['math'] === $_POST['math'] &&
        $rowed['interview_details'] === $_POST['interview_details']
    ) {
        $_SESSION['warningMessage'] = "Nothing Changes";
    } else {

        $query = "UPDATE ratings SET relevant_educ_background = '$relevant_educ_background', related_work_exp = '$related_work_experience',
                related_computer_skills = '$related_computer_skills', verbal_comm_skills = '$verbal_communication_skills', cooperation = '$cooperation', 
                personality = '$personality', intelligence = '$intelligence', diction = '$diction', others = '$others', IQ = '$IQ', 
                english = '$english', math = '$math', result = '$status', interview_details = '$interview_details'
                WHERE resume_id = '$resumeID'";
        $result = $link->query($query);

        if ($result) {
            $update = "UPDATE applicant_resume SET status = '$status' WHERE id = '$resumeID'";
            $update_result = $link->query($update);

            if ($update_result) {

                $transaction = "UPDATE RATINGS OF APPLICANT (PASSED) - Interview Details " . $interview_details;
                $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                    VALUES (?, ?, ?, ?, ?)";
                $transaction_log_result = $link->prepare($transaction_log);
                $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                $transaction_log_result->execute();

                $_SESSION['successMessage'] = "Success!";
            } else {
                $_SESSION['errorMessage'] = "Error in update";
            }
        } else {
            $_SESSION["errorMessage"] = "Error in inserting data";
        }
    }

    header("Location: shortlisted_applicants.php?id=$projectID");
    exit(0);
}

// FOR Ratings - Failed 1
if (isset($_POST['updatefailedBtn-1'])) {
    $resumeID = $link->real_escape_string($_POST['resumeID']);
    $projectID = $link->real_escape_string($_POST['projectID']);
    $reason_to_reject = $link->real_escape_string($_POST['reason_to_reject']);
    $status = "NOT QUALIFIED";

    $queryss = "SELECT * FROM ratings WHERE resume_id = '$resumeID'";
    $resultss = $link->query($queryss);
    $rowed = $resultss->fetch_assoc();

    if ($rowed['interview_details'] === $reason_to_reject) {
        $_SESSION['warningMessage'] = "Nothing Changes";
    } else {
        $query = "UPDATE ratings SET interview_details = '$reason_to_reject' WHERE resume_id = '$resumeID'";
        $result = $link->query($query);
        if ($result) {
            $update = "UPDATE applicant_resume SET status = '$status' WHERE id = '$resumeID'";
            $update_result = $link->query($update);


            if ($update_result) {

                $transaction = "UPDATE RATINGS OF APPLICANT (FAILED) - Reason of rejection: " . $reason_to_reject;
                $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                    VALUES (?, ?, ?, ?, ?)";
                $transaction_log_result = $link->prepare($transaction_log);
                $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                $transaction_log_result->execute();


                $_SESSION['successMessage'] = "Success!";
            } else {
                $_SESSION['errorMessage'] = "Error in update";
            }
        } else {
            $_SESSION["errorMessage"] = "Error in inserting data";
        }
    }
    header("Location: shortlisted_applicants.php?id=$projectID");
    exit(0);
}

// For Update Ratings - Failed 2
if (isset($_POST['updatefailedBtn2'])) {
    $resumeID = $link->real_escape_string($_POST['resumeID']);
    $projectID = $link->real_escape_string($_POST['projectID']);
    $relevant_educ_background = $link->real_escape_string($_POST['relevant_educ_background']);
    $related_work_experience = $link->real_escape_string($_POST['related_work_experience']);
    $related_computer_skills = $link->real_escape_string($_POST['related_computer_skills']);
    $verbal_communication_skills = $link->real_escape_string($_POST['verbal_communication_skills']);
    $cooperation = $link->real_escape_string($_POST['cooperation']);
    $personality = $link->real_escape_string($_POST['personality']);
    $intelligence = $link->real_escape_string($_POST['intelligence']);
    $diction = $link->real_escape_string($_POST['diction']);
    $others = $link->real_escape_string($_POST['others']);
    $IQ = $link->real_escape_string($_POST['IQ']);
    $english = $link->real_escape_string($_POST['english']);
    $math = $link->real_escape_string($_POST['math']);
    $interview_details = $link->real_escape_string($_POST['interview_details']);
    $status = "NOT QUALIFIED";

    $queryss = "SELECT * FROM ratings WHERE resume_id = '$resumeID'";
    $resultss = $link->query($queryss);
    $rowed = $resultss->fetch_assoc();

    if (
        $rowed['relevant_educ_background'] === $_POST['relevant_educ_background'] &&
        $rowed['related_work_exp'] === $_POST['related_work_experience'] &&
        $rowed['related_computer_skills'] === $_POST['related_computer_skills'] &&
        $rowed['verbal_comm_skills'] === $_POST['verbal_communication_skills'] &&
        $rowed['cooperation'] === $_POST['cooperation'] &&
        $rowed['personality'] === $_POST['personality'] &&
        $rowed['diction'] === $_POST['diction'] &&
        $rowed['others'] === $_POST['others'] &&
        $rowed['IQ'] === $_POST['IQ'] &&
        $rowed['english'] === $_POST['english'] &&
        $rowed['math'] === $_POST['math'] &&
        $rowed['interview_details'] === $_POST['interview_details']
    ) {
        $_SESSION['warningMessage'] = "Nothing Changes";
    } else {

        $query = "UPDATE ratings SET relevant_educ_background = '$relevant_educ_background', related_work_exp = '$related_work_experience',
                related_computer_skills = '$related_computer_skills', verbal_comm_skills = '$verbal_communication_skills', cooperation = '$cooperation', 
                personality = '$personality', intelligence = '$intelligence', diction = '$diction', others = '$others', IQ = '$IQ', 
                english = '$english', math = '$math', result = '$status', interview_details = '$interview_details'
                WHERE resume_id = '$resumeID'";
        $result = $link->query($query);

        if ($result) {
            $update = "UPDATE applicant_resume SET status = '$status' WHERE id = '$resumeID'";
            $update_result = $link->query($update);

            if ($update_result) {

                $transaction = "UPDATE RATINGS OF APPLICANT (FAILED) - Interview Details: " . $interview_details;
                $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                    VALUES (?, ?, ?, ?, ?)";
                $transaction_log_result = $link->prepare($transaction_log);
                $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                $transaction_log_result->execute();


                $_SESSION['successMessage'] = "Success!";
            } else {
                $_SESSION['errorMessage'] = "Error in update";
            }
        } else {
            $_SESSION["errorMessage"] = "Error in inserting data";
        }
    }

    header("Location: shortlisted_applicants.php?id=$projectID");
    exit(0);
}

// Update Employees' Information (Without Mandatories)
if (isset($_POST['submit_update'])) {
    $update_id = $_POST['update_id'];
    $lastnameko = $link->real_escape_string($_POST['lastnameko']);
    $firstnameko = $link->real_escape_string($_POST['firstnameko']);
    $mnko = $link->real_escape_string($_POST['mnko']);
    $extnname = $link->real_escape_string($_POST['extnname']);
    $paddress = $link->real_escape_string($_POST['paddress']);
    $regionn = $link->real_escape_string($_POST['regionn']);
    $cityn = $link->real_escape_string($_POST['cityn']);
    $peraddress = $link->real_escape_string($_POST['peraddress']);
    $birthday = $link->real_escape_string($_POST['birthday']);
    $agen = $link->real_escape_string($_POST['agen']);
    $gendern = $link->real_escape_string($_POST['gendern']);
    $civiln = $link->real_escape_string($_POST['civiln']);
    $cpnum = $link->real_escape_string($_POST['cpnum']);
    $landline = $link->real_escape_string($_POST['landline']);
    $emailadd = $link->real_escape_string($_POST['emailadd']);
    $despo = $link->real_escape_string($_POST['despo']);
    $classn = $link->real_escape_string($_POST['classn']);
    $idenn = $link->real_escape_string($_POST['idenn']);
    $sssnum = $link->real_escape_string($_POST['sssnum']);
    $pagibignum = $link->real_escape_string($_POST['pagibignum']);
    $phnum = $link->real_escape_string($_POST['phnum']);
    $tinnum = $link->real_escape_string($_POST['tinnum']);
    $policed = $link->real_escape_string($_POST['policed']);
    $brgyd = $link->real_escape_string($_POST['brgyd']);
    $nbid = $link->real_escape_string($_POST['nbid']);
    $psa = $link->real_escape_string($_POST['psa']);
    $e_person = $link->real_escape_string($_POST['e_person']);
    $e_address = $link->real_escape_string($_POST['e_address']);
    $e_contact = $link->real_escape_string($_POST['e_contact']);
    $remarks = $link->real_escape_string($_POST['remarks']);

    $file = $_FILES['waiver'];
    $filename = $_FILES["waiver"]["name"];
    $tempname = $_FILES["waiver"]["tmp_name"];
    $applicant_name = chop($firstnameko . " " . $mnko . " " . $lastnameko . " " . $extnname);
    $folder = "201 Files/" . $applicant_name . "/Requirements/";

    $folderDestination = "../../../pcn_OLA/201 Files/" . $applicant_name . "/Requirements/";

    if (empty($sssnum) || $sssnum === '' || empty($pagibignum) || $pagibignum === '' || empty($phnum) || $phnum === '') {
        // $_SESSION['errorMessage'] = "Please upload waiver";
        echo "Please upload waiver";
    } else {
        $query = "UPDATE `employees` SET `lastnameko`='$lastnameko', `firstnameko`='$firstnameko', `mnko`='$mnko', `extnname`='$extnname', `paddress`='$paddress',
            `peraddress`='$peraddress', `cityn`='$cityn', `regionn`='$regionn', `birthday`='$birthday',
            `age`='$agen', `gendern`='$gendern', `civiln`='$civiln', `cpnum`='$cpnum',
            `landline`='$landline', `emailadd`='$emailadd', `despo`='$despo', `classn`='$classn',
            `idenn`='$idenn', `sssnum`='$sssnum', `pagibignum`='$pagibignum', `phnum`='$phnum',
            `tinnum`='$tinnum', `policed`='$policed', `brgyd`='$brgyd', `nbid`='$nbid',
            `psa`='$psa', `remarks`='$remarks', `e_person`='$e_person',
            `e_address`='$e_address', `e_number`='$e_contact' 
            WHERE id = '$update_id'";

        $result = $link->query($query);

        if ($result) {
            $select_201files = "SELECT * FROM folder WHERE applicant_id = '$applicant_id' AND folder_name = 'Requirements'";
            $select_201files_result = $link->query($select_201files);
            $select_201files_row = $select_201files_result->fetch_assoc();
            $folder_id = $select_201files_row['id'];

            $select_employee = "SELECT * FROM employees WHERE id = '$update_id'";
            $select_employee_result = $link->query($select_employee);
            $select_employee_row = $select_employee_result->fetch_assoc();
            $applicant_id = $select_employee_row['id'];

            $insert_file = "INSERT INTO 201files (applicant_id, employee_id, folder_id, waiver_filename, waiver_date_submitted) 
                            VALUES ('$applicant_id', '$update_id', '$folder_id', '$filename', '$date_now')";
            $insert_file_result = $link->query($insert_file);

            if ($insert_file_result) {
                if (move_uploaded_file($tempname, $folderDestination)) {

                    $transaction = "UPDATE EMPLOYEE'S INFORMATION (WITHOUT MANDATORIES) " . $firstnameko . ", " . $mnko . " " . $lastnameko . " " . $mnko;
                    $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                        VALUES (?, ?, ?, ?, ?)";
                    $transaction_log_result = $link->prepare($transaction_log);
                    $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                    $transaction_log_result->execute();


                    $_SESSION['successMessage'] = "Success";
                } else {
                    $_SESSION['errorMessage'] = "Error in inserting waiver file";
                }
            } else {
                $_SESSION['errorMessage'] = "Error in inserting waiver";
            }
        } else {
            $_SESSION['errorMessage'] = "Error in updating data";
        }
    }
    header("Location: deploy.php");
    exit(0);
}

// For Adding Applicants in Shortlisting
if (isset($_POST['create_shortlist_applicant'])) {
    $source = $link->real_escape_string(chop(strtoupper($_POST['source'])));
    $firstname = $link->real_escape_string(chop(strtoupper($_POST['firstname'])));
    $middlename = $link->real_escape_string(chop(strtoupper($_POST['middlename'])));
    $lastname = $link->real_escape_string(chop(strtoupper($_POST['lastname'])));
    $extension_name = $link->real_escape_string(chop(strtoupper($_POST['extension_name'])));
    $gender = $link->real_escape_string(chop(strtoupper($_POST['gender'])));
    $civil_status = $link->real_escape_string(chop(strtoupper($_POST['civil_status'])));
    $age = $link->real_escape_string(chop(strtoupper($_POST['age'])));
    $mobile_number = $link->real_escape_string(chop(strtoupper($_POST['mobile_number'])));
    $email_address = $link->real_escape_string(chop(strtoupper($_POST['email_address'])));
    $birthday = $link->real_escape_string(chop(strtoupper($_POST['birthday'])));
    $address = $link->real_escape_string(chop(strtoupper($_POST['address'])));
    $region = $link->real_escape_string(chop(strtoupper($_POST['region'])));
    $city = $link->real_escape_string(chop(strtoupper($_POST['city'])));
    $job_id = $_POST['job_id'];

    // Auto Generating of USERNAME and PASSWORD
    $randomNumber = mt_rand(100, 999);
    $username = "applicant" . $randomNumber;
    // In password, we used applicant123456789 as their default password but we hashed it for security purposes.
    $password = "applicant123456789";
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $file = $_FILES['resume_file'];
    $filename = $_FILES["resume_file"]["name"];
    $tempname = $_FILES["resume_file"]["tmp_name"];

    // Get the MIME type of the uploaded file
    $file_type = mime_content_type($tempname);

    // List of allowed MIME types
    $allowed_types = array('application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');

    // Check if the MIME type is in the list of allowed types
    if (!in_array($file_type, $allowed_types)) {
        $_SESSION['errorMessage'] = "Please upload PDF and Docx file only.";
    } else {

        $today = date("Y-m-d");

        if (!empty($filename)) {
            $insert = "INSERT INTO applicant (`username`, `password`, `source`, `firstname`, `middlename`, `lastname`, `extension_name`, `gender`, `civil_status`, `age`, `mobile_number`, `email_address`, `birthday`, `present_address`, `city`, `region`)
            VALUES ('$username', '$hashed_password', '$source', '$firstname', '$middlename', '$lastname', '$extension_name', '$gender', '$civil_status', '$age', '$mobile_number', '$email_address', '$birthday', '$address', '$city', '$region')";
            $insert_result = $link->query($insert);

            if ($insert_result) {
                $applicant_id = $link->insert_id;
                $applicant_name = chop($firstname . " " . $middlename . " " . $lastname . " " . $extension_name);
                $folder_name = $applicant_name;
                $destination = "../../../pcn_OLA/201 Files/" . $folder_name;

                mkdir("{$destination}", 0777);
                $applicant_name_subfolder = "Requirements";
                $folder_name_subfolder = $applicant_name_subfolder;
                $destination_subfolder = "../../../pcn_OLA/201 Files/" . $folder_name . "/" . $folder_name_subfolder;
                $folder_path =  "201 Files/" . $folder_name . "/" . $applicant_name_subfolder;

                mkdir("{$destination_subfolder}", 0777);


                $select_folder = "SELECT * FROM folder WHERE applicant_id = '$applicant_id' AND folder_name = 'Requirements'";
                $select_folder_result = $link->query($select_folder);
                $select_folder_row = $select_folder_result->fetch_assoc();

                if ($select_folder_result->num_rows === 0) {

                    $insert_folder = "INSERT INTO folder (applicant_id, folder_name, folder_path) VALUES(?, ?, ?)";
                    $insert_folder_result = $link->prepare($insert_folder);
                    $insert_folder_result->bind_param("iss", $applicant_id, $applicant_name_subfolder, $folder_path);

                    if ($insert_folder_result->execute()) {
                        $folder_id = $insert_folder_result->insert_id;
                        $insert_201files = "INSERT INTO 201files (applicant_id, folder_id, requirements_files, requirements_files_uploaded) 
                                        VALUES ('$applicant_id', '$folder_id', '$filename', '$date_now')";
                        $insert_201files_result = $link->query($insert_201files);
                        if ($insert_201files_result) {
                            $sql = "INSERT INTO applicant_resume(applicant_id, project_id, folder_id, resume_file, resume_path)
                                    VALUES('$applicant_id', '$job_id', '$folder_id', '$filename', '$destination_subfolder')";
                            $result = mysqli_query($link, $sql);
                            if ($result) {

                                $transaction = strtoupper(chop("ADDING APPLICANT " . $firstname . " " . $middlename . " " . $lastnameko . " " . $extension_name . " TO SHORTLIST"));
                                $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                        VALUES (?, ?, ?, ?, ?)";
                                $transaction_log_result = $link->prepare($transaction_log);
                                $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                                $transaction_log_result->execute();


                                if (move_uploaded_file($tempname, $destination_subfolder . DIRECTORY_SEPARATOR . $filename)) {
                                    $_SESSION['successMessage'] = "Success";
                                } else {
                                    $_SESSION["errorMessage"] = "Error in uploading file.";
                                }
                            }
                        }
                    } else {
                        $_SESSION["errorMessage"] = "Error" . mysqli_error($link);
                    }
                } else {
                    $_SESSION["errorMessage"] = "Error" . mysqli_error($link);
                }
            } else {
                $_SESSION["errorMessage"] = "Error in inserting applicant: " . mysqli_error($link);
            }
        } else {
            $_SESSION['errorMessage'] = "Failed to upload file";
        }
    }
    header("location: shortlisted_applicants.php?id=$job_id");
    exit(0);
}


// For Backout Employee
if (isset($_POST['backout_applicant_button_click'])) {
    $employee_id = $link->real_escape_string($_POST['employee_id']);
    $shortlist_id = $link->real_escape_string($_POST['shortlist_id']);
    $is_deleted = '1';
    $deployment_status = 'BACKOUT';

    $query = "UPDATE shortlist_master SET is_deleted = ?, deployment_status = ?, date_backout = ? WHERE id = ? AND employee_id = ?";
    $stmt = $link->prepare($query);
    $stmt->bind_param('sssss', $is_deleted, $deployment_status, $date_now, $shortlist_id, $employee_id);
    if ($stmt->execute()) {
        $sql = "UPDATE employees SET actionpoint = ? WHERE id = ?";
        $sql_result = $link->prepare($sql);
        $sql_result->bind_param("si", $deployment_status, $employee_id);
        if ($sql_result->execute()) {
            $backout_history = "INSERT INTO backout_history (employee_id, backout_date) VALUES (?, ?)";
            $backout_history_result = $link->prepare($backout_history);
            $backout_history_result->bind_param("is", $employee_id, $date_now);
            if ($backout_history_result->execute()) {

                $transaction = "BACKOUT EMPLOYEE " . $employee_id;
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
    } else {
        $_SESSION['errorMessage'] = "Error";
    }
    header("Location: deploy.php");
    exit(0);
}


// For Adding Folders: update_applicants.php > 201 Files section
if (isset($_POST['create_folder_btn'])) {
    $employee_id = $_POST['employee_id'];
    $folder_name_subfolder = $_POST['folder_name'];

    // Selecting Employees table so we can fetch the Applicant ID
    $select = "SELECT * FROM employees WHERE id = ?";
    $select_result = $link->prepare($select);
    $select_result->bind_param("i", $employee_id);
    $select_result->execute();

    $get_result = $select_result->get_result();
    $select_row = $get_result->fetch_assoc();
    $applicant_id = $select_row['app_id'];
    $firstname = $select_row['firstnameko'];
    $middlename = $select_row['mnko'];
    $lastname = $select_row['lastnameko'];
    $extension_name = $select_row['extnname'];

    $applicant_name = chop($firstname . " " . $middlename . " " . $lastname . " " . $extension_name);
    $folder_name = $applicant_name;
    $destination = "../../../pcn_OLA/201 Files/" . $folder_name;

    $destination_subfolder = "../../../pcn_OLA/201 Files/" . $folder_name . "/" . $folder_name_subfolder;
    $folder_path =  "201 Files/" . $folder_name . "/" . $folder_name_subfolder;

    if (mkdir("{$destination_subfolder}", 0777)) {
        $query = "INSERT INTO folder (applicant_id, employee_id, folder_name, folder_path) VALUES(?, ?, ?, ?)";
        $stmt = $link->prepare($query);
        $stmt->bind_param("iiss", $applicant_id, $employee_id, $folder_name_subfolder, $folder_path);
        if ($stmt->execute()) {

            $transaction = "ADDED FOLDER FOR EMPLOYEE " . $employee_id . " FOLDER NAME: " . $folder_name_subfolder;
            $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                        VALUES (?, ?, ?, ?, ?)";
            $transaction_log_result = $link->prepare($transaction_log);
            $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
            $transaction_log_result->execute();


            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error" . $link->error;
        }
    } else {
        $_SESSION['errorMessage'] = "Folder is already exist";
    }

    header("Location: update_applicants.php?id=$employee_id");
}

// For Adding Multiple Files in Update_applicants.php > 201 Files Section (REQUIREMENTS' FILES)
if (isset($_POST['upload_file_btn'])) {
    $employee_id = $_POST['employee_id'];
    $folder_id = $_POST['folder_id'];
    $files = $_FILES['files'];


    // Selecting Employees table so we can fetch the Applicant ID
    $select = "SELECT * FROM employees WHERE id = ?";
    $select_result = $link->prepare($select);
    $select_result->bind_param("i", $employee_id);
    $select_result->execute();

    $get_result = $select_result->get_result();
    $select_row = $get_result->fetch_assoc();
    $applicant_id = $select_row['app_id'];

    // Selecting Folder table so we can fetch the datas in that table
    $select_folder = "SELECT * FROM folder WHERE id = ? AND applicant_id = ?";
    $stmt = $link->prepare($select_folder);

    if ($stmt === false) {
        die("Error in query preparation: " . $link->error);
    }

    $stmt->bind_param("ii", $folder_id, $applicant_id);
    $stmt->execute();

    $get_stmt = $stmt->get_result();
    while ($rows = $get_stmt->fetch_assoc()) {
        $path = "../../../pcn_OLA/" . $rows['folder_path'] . "/";
        // Let's now insert the data in 201 files table
        foreach ($files['tmp_name'] as $key => $tmp_name) {
            $targetFile = $path . basename($files['name'][$key]);
            $filename = basename($files['name'][$key]);

            $inserts = "INSERT INTO 201files(applicant_id, employee_id, folder_id, requirements_files) 
            VALUES (?, ?, ?, ?)";
            $insert_result = $link->prepare($inserts);
            $insert_result->bind_param("ssss", $applicant_id, $employee_id, $folder_id, $filename);
            if ($insert_result->execute()) {

                $transaction = "ADDED FILES FOR EMPLOYEE " . $employee_id . " FILE NAME: " . $filename;
                $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                        VALUES (?, ?, ?, ?, ?)";
                $transaction_log_result = $link->prepare($transaction_log);
                $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                $transaction_log_result->execute();


                move_uploaded_file($tmp_name, $targetFile);
                $_SESSION['successMessage'] = "Success";
            } else {
                $_SESSION['errorMessage'] = "Error";
            }
        }
    }
    header("Location: files.php?id=$employee_id&folder_id=$folder_id");
    exit(0);
}

// For Rejecting Applicants in Shortlited_applicants.php
if (isset($_POST['reject_applicant_recruitment_button_click'])) {
    $resume_id = $_POST['resume_id'];
    $mrf_id = $_POST['mrf_id'];
    $is_deleted = "1";
    $status = "NOT QUALIFIED";

    $query = "UPDATE applicant_resume SET status = ?, is_deleted = ? WHERE id = ?";
    $stmt = $link->prepare($query);
    $stmt->bind_param("ssi", $status, $is_deleted, $resume_id);

    if ($stmt->execute()) {

        $transaction = "REJECT APPLICANT";
        $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                        VALUES (?, ?, ?, ?, ?)";
        $transaction_log_result = $link->prepare($transaction_log);
        $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
        $transaction_log_result->execute();


        $_SESSION["successMessage"] = "Success";
    } else {
        $_SESSION["errorMessage"] = "Error";
    }
    header("Location: shortlisted_applicants.php?id=$mrf_id");
}
