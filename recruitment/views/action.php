<?php
session_start();
include '../../connect.php';
header('Content-Type: text/html; charset=utf-8');

// For Inserting Applicant in database
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
            $_SESSION['successMessage'] = "Successful!";
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


        $insert_history = "INSERT INTO `employee_update_history`(`tracking_no`, `photo`, `date_applied`, 
        `app_number`, `source`, `fullname`, `present_address`,
         `city`, `region`, `birthday`, `age`, 
         `gender`, `civil_status`, `contact_number`, 
         `landline`, `email`, `desired_position`, `classification`, 
         `indentification`, `sss`, `philhealth`, `pagibig`,
          `tin`, `police`, `barangay`, `nbi`, `psa`, 
          `e_person`, `e_address`, `e_number`, `remarks`,
           `created_by`, `updated_by`) 
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
            $_SESSION['successMessage'] = "Update Successful!";
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
                $_SESSION['successMessage'] = "Blacklist successfully!";
                header("Location: recruitment.php");
            } else {
                $_SESSION['errorMessage'] = "Blacklist error!";
                header("Location: recruitment.php");
            }
        }
    }
}

// For Deleting Applicants. Change status to canceled but not totally deleted in database for records purposes
if (isset($_POST['delete_applicant_button'])) {
    $id = $_POST['delete_applicant_ID'];
    $delete_applicant_reason = mysqli_real_escape_string($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['reason'])))));
    $datenow = date("m/d/Y");
    $actionpoint = "CANCELED";

    $delete_applicant_query = "UPDATE employees SET actionpoint = '$actionpoint', reasonofaction = '$delete_applicant_reason', dateofaction = '$datenow' WHERE id = '$id'";
    $delete_applicant_result = mysqli_query($link, $delete_applicant_query);

    if ($delete_applicant_result) {
        $_SESSION['successMessage'] = "Successfully Deleted!";
        header("Location: recruitment.php");
    } else {
        $_SESSION['errorMessage'] = "Delete error!";
        header("Location: recruitment.php");
    }
}

// For Undo Blacklisted Applicants
if (isset($_POST['undo_button_click'])) {
    $undo_blacklisted_id = $_POST['undoblacklist_id'];
    $undo_blacklist = "UPDATE employees SET actionpoint = 'ACTIVE', reasonofaction = '', dateofaction = '' WHERE id = '$undo_blacklisted_id'";

    $result_editblacklist = mysqli_query($link, $undo_blacklist);

    if ($result_editblacklist) {
        $_SESSION['successMessage'] = "Blacklist reverted";
        header("Location: recruitment.php");
    } else {
        $_SESSION['errorMessage'] = "Error";
        header("Location: recruitment.php");
    }
}

// For Undo Canceled Applicants
if (isset($_POST['undo_canceled_button_click'])) {
    $undo_canceled_id = $_POST['undocanceled_id'];
    $undo_cancel = "UPDATE employees SET actionpoint = 'ACTIVE', reasonofaction = '', dateofaction = '' WHERE id = '$undo_canceled_id'";

    $result_editcancel = mysqli_query($link, $undo_cancel);

    if ($result_editcancel) {
        $_SESSION['successMessage'] = "Successful";
        header("Location: recruitment.php");
    } else {
        $_SESSION['errorMessage'] = "Error";
        header("Location: recruitment.php");
    }
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
                $_SESSION['successMessage'] = "Shortlist Created";
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

        // if ($rowac['actionpoint'] === "ACTIVE") {
        //     $query1 = "UPDATE employees SET actionpoint = 'SHORTLISTED' WHERE appno = '$id1'";
        //     $results1 = mysqli_query($link, $query1);

        //     if ($results1) {
        //         $dtnow = date("m/d/Y");

        //         $querychk = "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data' AND appnumto = '$id1' ";
        //         $resultchk = mysqli_query($link, $querychk);
        //         if (mysqli_num_rows($resultchk) === 0) {
        //             // kapag wala pang user name na kaparehas
        //             $query2 = "INSERT INTO shortlist_master(employee_id, shortlistnameto, appnumto, dateto) VALUES('$app_id','$data', '$id1', '$dtnow')";
        //             $results2 = mysqli_query($link, $query2);
        //             if ($results2) {
        //                 $response = array('message' => 'Successfully added to the shortlist');
        //                 echo json_encode($response);
        //                 exit;
        //             } else {
        //                 $response = array('message' => 'Not Added due to Duplication!');
        //                 echo json_encode($response);
        //                 exit;
        //             }
        //         } else {
        //             $response = array('message' => 'Not Added due to Duplication!');
        //             echo json_encode($response);
        //             exit;
        //         }
        //     } else {
        //         $_SESSION['errorMessage'] = "Not Added due to duplication!";
        //         error_log("Query 1 failed: " . mysqli_error($link));
        //         // You can also include more detailed error information in your JSON response.
        //         $response = array('message' => 'Error: Query 1 failed');
        //         echo json_encode($response);
        //         exit;
        //     }
        // } else {
        $dtnow = date("m/d/Y");
        $querychk = "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data' AND appnumto='$id1' ";
        $resultchk = mysqli_query($link, $querychk);
        if (mysqli_num_rows($resultchk) == 0) {
            // kapag wala pang user name na kaparehas
            $query3 = "INSERT INTO shortlist_master(employee_id, shortlistnameto, appnumto, dateto) VALUES('$app_id', '$data', '$id1', '$dtnow')";
            $results3 = mysqli_query($link, $query3);

            if ($results3) {
                $response = array('message' => 'Successfully added to the shortlist');
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
    // }
}

// For untermination of applicants
if (isset($_POST['unterminate_applicant_button'])) {

    $emp_number1 = $_POST['unterminate_applicant_ID'];
    $unter_reason1 = mysqli_real_escape_String($link, chop(preg_replace('/\s+/', ' ', (strtoupper($_POST['reason'])))));

    $unterminate_query = "UPDATE employees SET actionpoint = 'EWB', unter_reason = '$unter_reason1', reasonofaction = '$unter_reason1' WHERE appno = '$emp_number1'";
    $resultemp = mysqli_query($link, $unterminate_query);

    if ($resultemp) {
        $_SESSION['succesMessage'] = "Untermination successful";
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
                $response = array('message' => 'Successfully removed from the shortlist');
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
                    $response = array('message' => 'Successfully removed from the shortlist');
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
                $_SESSION['successMessage'] = "Applicant transferred for EWB Checking!";
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

                // if ($rowac['actionpoint'] === "ACTIVE") {
                //     // Update the action point for this user
                //     $query1 = "UPDATE employees SET actionpoint = 'SHORTLISTED' WHERE appno = '$id1'";
                //     $results1 = mysqli_query($link, $query1);

                //     if ($results1) {
                //         $dtnow = date("m/d/Y");

                //         // Check if this user is not already in the shortlist
                //         $querychk = "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data' AND appnumto = '$id1'";
                //         $resultchk = mysqli_query($link, $querychk);

                //         if (mysqli_num_rows($resultchk) === 0) {
                //             // Insert this user into the shortlist
                //             $query2 = "INSERT INTO shortlist_master(employee_id, shortlistnameto, appnumto, dateto) 
                //             VALUES('$emp_id', '$data', '$id1', '$dtnow')";
                //             $results2 = mysqli_query($link, $query2);

                //             if ($results2) {
                //                 // User successfully added to the shortlist
                //                 $response[] = array('message' => 'Successfully added to the shortlist');
                //                 $_SESSION['successMessage'] = 'Successfully added to the shortlist';
                //             } else {
                //                 // Insertion failed
                //                 $response[] = array('message' => 'Not Added due to Duplication!');
                //                 $_SESSION['errorMessage'] = 'Not Added due to Duplication!';
                //             }
                //         } else {
                //             // User already exists in the shortlist
                //             $response[] = array('message' => 'Not Added due to Duplication!');
                //             $_SESSION['errorMessage'] = 'Not Added due to Duplication!';
                //         }
                //     } else {
                //         // Error updating the action point
                //         $response[] = array('message' => 'Error: Query failed during update');
                //         $_SESSION['errorMessage'] = 'Error: Query failed during update';
                //     }
                // } else {
                // User action point is not ACTIVE
                $dtnow = date("m/d/Y");
                $querychk = "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data' AND appnumto='$id1' ";
                $resultchk = mysqli_query($link, $querychk);

                if (mysqli_num_rows($resultchk) == 0) {
                    $query3 = "INSERT INTO shortlist_master(employee_id,shortlistnameto,appnumto,dateto) VALUES('$emp_id','$data','$id1','$dtnow')";
                    $results3 = mysqli_query($link, $query3);

                    if ($results3) {
                        // User successfully added to the shortlist
                        $response[] = array('message' => 'Successfully added to the shortlist');
                        $_SESSION['successMessage'] = 'Successfully added to the shortlist';
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
                    $_SESSION['successMessage'] = "Successful";
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
        $_SESSION['successMessage'] = "Successfully Provided";
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

            $insert_db = "INSERT INTO projects (mrf_tracking, project_title, client_company_id, ewb_count, start_date, end_date, status) 
            VALUES ('$tracking_no', '$project_title', '$client', '$total', '$work_duration_start', '$work_duration_end', '$status')";
            $result_insert = $link->query($insert_db);
            if ($result_insert) {
                $_SESSION['successMessage'] = "Successfully Accepted";
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
                        $_SESSION['successMessage'] = "Successfully Updated";
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
