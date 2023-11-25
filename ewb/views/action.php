<?php
session_start();
include '../../connect.php';

$user_id = $_SESSION['user_id'];
$user_division = $_SESSION['division'];
$personnel = $_SESSION['firstname'] . " " . $_SESSION['lastname'];
$user_type = $_SESSION['user_type'];

// For Verification of Applicants
if (isset($_POST['verify_button_click'])) {
    date_default_timezone_set('Asia/Manila');
    $dtnow = date('Y-m-d H:i:s');
    $ewbid1 = $_POST['verify_id'];
    $ewb_verified_by = $_SESSION['lastname'] . ", " . $_SESSION['firstname'];

    $verify_query = "UPDATE employees SET ewbdeploy = 'FOR DEPLOYMENT', ewbdate = '$dtnow', ewb_status = 'VERIFIED', ewb_verified_by = '$ewb_verified_by' WHERE appno = '$ewbid1'";
    $verify_result = mysqli_query($link, $verify_query);

    if ($verify_result) {
        $select_emp_query = "SELECT * FROM employees WHERE appno = '$ewbid1'";
        $select_emp_result = $link->query($select_emp_query);

        if ($select_emp_result) {
            while ($row = $select_emp_result->fetch_assoc()) {
                $firstname = $row['firstnameko'];
                $lastname = $row['lastnameko'];
                $middlename = $row['mnko'];
                $extension_name = $row['extnname'];

                if (!empty($extension_name)) {
                    $fullname = $lastname . " " . $extension_name . ", " . $firstname . " " . $middlename;
                } else {
                    $fullname = $lastname . ", " . $firstname . " " . $middlename;
                }
                $app_num = $row['appno'];
                $sssnum = $row['sssnum'];
                $phnum = $row['phnum'];
                $pagibignum = $row['pagibignum'];
                $tinnum = $row['tinnum'];
                $birthday = $row['birthday'];
                $address = $row['peraddress'];
                $remarks = $row['ewb_status'];
                $verified_by = $_SESSION['lastname'] . ", " . $_SESSION['firstname'];

                $insert_emp = "INSERT INTO ewb_verification_history(name, app_num, sss, philhealth, pagibig, tin, birthday, address, remarks, verified_by) 
                VALUES ('$fullname', '$app_num', '$sssnum', '$phnum', '$pagibignum', '$tinnum', '$birthday', '$address', '$remarks', '$verified_by')";
                $results_emp = $link->query($insert_emp);

                if ($results_emp) {

                    $transaction = chop(strtoupper("VERIFIED " . $ewbid1));
                    $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                VALUES (?, ?, ?, ?, ?)";
                    $transaction_log_result = $link->prepare($transaction_log);
                    $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                    $transaction_log_result->execute();

                    $_SESSION['successMessage'] = "Success";
                } else {
                    $_SESSION["errorMessage"] = "Error!!!";
                }
            }
        } else {
            $_SESSION['errorMessage'] = "Error in verifying applicants!";
        }
    } else {
        $_SESSION['errorMessage'] = "Error in verifying applicants!";
    }
    header("Location: for_verification.php");
    exit();
}

// For Declining EWB
if (isset($_POST['declined_button'])) {
    $id = $_POST['declinedID'];
    $ewb_reason = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['reason']))));
    date_default_timezone_set('Asia/Manila');
    $datenow = date('Y-m-d H:i:s');
    $ewb_status = "DECLINED";

    $declined_query = "UPDATE employees SET ewb_status = '$ewb_status', ewb_reason = '$ewb_reason', ewb_date_declined = '$datenow' WHERE appno = '$id'";
    $declined_result = mysqli_query($link, $declined_query);

    if ($declined_result) {
        $queryem = "SELECT * FROM employees WHERE appno = '$id'";
        $resultem = mysqli_query($link, $queryem);
        $rowem = mysqli_fetch_assoc($resultem);

        $tracking = $rowem['tracking'];
        $photopath = $rowem['photopath'];
        $dapplied = $rowem['dapplied'];
        $appno = $rowem['appno'];
        $source = $rowem['source'];
        $lastnameko = $rowem['lastnameko'];
        $firstnameko = $rowem['firstnameko'];
        $mnko = $rowem['mnko'];
        $extname = $rowem['extnname'];
        $paddress = $rowem['paddress'];
        $cityn = $rowem['cityn'];
        $regionn = $rowem['regionn'];
        $peraddress = $rowem['peraddress'];
        $birthday = $rowem['birthday'];
        $age = $rowem['age'];
        $gendern = $rowem['gendern'];
        $civiln = $rowem['civiln'];
        $cpnum = $rowem['cpnum'];
        $landline = $rowem['landline'];
        $emailadd = $rowem['emailadd'];
        $despo = $rowem['despo'];
        $classn = $rowem['classn'];
        $idenn = $rowem['idenn'];
        $sssnum = $rowem['sssnum'];
        $pagibignum = $rowem['pagibignum'];
        $phnum = $rowem['phnum'];
        $tinnum = $rowem['tinnum'];
        $policed = $rowem['policed'];
        $brgyd = $rowem['brgyd'];
        $nbid = $rowem['nbid'];
        $psa = $rowem['psa'];
        $remarks = $rowem['remarks'];
        $declined_by = $_SESSION['lastname'] . ", " . $_SESSION['firstname'];


        $declined_history_query = "INSERT INTO ewb_declined_history(tracking ,photopath, dapplied, appno, source,
            lastnameko, firstnameko, mnko, extnname, paddress, cityn, regionn, peraddress, birthday, age, gendern, civiln,
            cpnum, landline, emailadd, despo, classn, idenn, sssnum, pagibignum, phnum, tinnum, policed, brgyd, nbid, psa, remarks,
            ewb_reason, ewb_declined_by, ewb_date_declined)
        VALUES ('$tracking','$photopath','$dapplied','$appno','$source','$lastnameko','$firstnameko','$mnko','$extname',
                '$paddress','$cityn','$regionn','$peraddress','$birthday','$age','$gendern','$civiln','$cpnum','$landline','$emailadd',
                '$despo','$classn','$idenn','$sssnum','$pagibignum','$phnum','$tinnum','$policed','$brgyd','$nbid','$psa','$remarks',
                '$ewb_reason', '$declined_by', '$datenow')";

        $declined_history_result = mysqli_query($link, $declined_history_query);

        if ($declined_history_result) {

            $transaction = chop(strtoupper("DECLINED " . $id . " Reason: " . $ewb_reason));
            $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                VALUES (?, ?, ?, ?, ?)";
            $transaction_log_result = $link->prepare($transaction_log);
            $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
            $transaction_log_result->execute();


            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Declined error!";
        }
    }
    header("Location: for_verification.php");
    exit();
}

// For Multiple process of verification
if (isset($_POST['processmultiple'])) {
    $dtnow = date("m/d/Y");
    $ewbc1m = $_POST['ewbchoiceto1'];
    echo '<input type = "hidden" name = ""  value = "' . $ewbc1m . '">';

    if (!empty($_POST['check_list'])) {
        // Loop to store and display values of individual checked checkbox.
        foreach ($_POST['check_list'] as $selected) {
            $query = "UPDATE employees SET ewbdeploy = '$ewbc1m', ewbdate = '$dtnow' WHERE appno = '$selected'";
            $result = mysqli_query($link, $query);
            if ($result) {

                $transaction = chop(strtoupper("PROCESS"));
                $transaction_log  = "INSERT INTO transaction_log (user_id, transaction, personnel, user_type, division) 
                                VALUES (?, ?, ?, ?, ?)";
                $transaction_log_result = $link->prepare($transaction_log);
                $transaction_log_result->bind_param("issss", $user_id, $transaction, $personnel, $user_type, $user_division);
                $transaction_log_result->execute();


                $_SESSION['successMessage'] = "Success";
            } else {
                $_SESSION['errorMessage'] = "Multiple Entry to Database Error";
            }
        }
    } else {
        $_SESSION['errorMessage'] = "Selection Empty Nothing to Process";
    }
    header("Location: ewb_transaction.php");
    exit();
}
