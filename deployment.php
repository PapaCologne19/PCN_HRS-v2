<?php
require_once './PHPWord.php';
include("connect.php");
session_start();








date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y');
$datenow = date("m/d/Y h:i:s A");
$datenow1 = date("Y-m-d");




//check synchorizatioin
$resultap = mysqli_query($link, "SELECT * FROM synch where id ='1'");
while ($rowap = mysqli_fetch_array($resultap)) {
  if ($rowap[2] != $datenow1) {
    //echo "synch it";

    $day1 = date("d") - 1;
    $month1 = date("m");
    $year1 = date("Y");


    $date_old = $year1 . "-" . $month1 . "-" . $day1;
    //echo $date_old;


    // this is for end of contract date if deployed
    //change employee status to EWB



    $resultemp1 = mysqli_query($link, "SELECT * FROM employees WHERE actionpoint = 'DEPLOYED'");
    while ($rowem1 = mysqli_fetch_array($resultemp1)) {


      if ($rowem1[45] <= $datenow1) {

        $resultemp = mysqli_query($link, "UPDATE employees 
                                  set
                                  actionpoint='EWB',
                                  reasonofaction=''  
                                WHERE
                                 appno = '$rowem1[4]'");


        //eval deployment table
        $resultdep = mysqli_query($link, "DELETE from deployment 
                                    where
                                    emp_end_date <='$datenow1'");




        $resultdep = mysqli_query($link, "UPDATE deployment_history 

                                    set
                                    active='INACTIVE',
                                    is_deleted='1'

                                    where
                                    emp_end_date <='$datenow1'");
      }
    }


    mysqli_query($link, "UPDATE synch

													   SET

													datenow1='$datenow1',
													katsing='1'

															          
													WHERE
													id = '1'
													");




    // termination synchronization


    $resultp1 = mysqli_query($link, "SELECT * FROM employees where ter_date!='' ");
    while ($rowp1 = mysqli_fetch_array($resultp1)) {


      if ($rowp1[41] <= $datenow1) {

        echo '<div class="body5010p2">';
        echo $rowp1[4];
        echo $date_old;
        echo '</div>';

        mysqli_query($link, "UPDATE employees

                                                                                              SET

                                                                                            actionpoint='TERMINATED'
                                                                                                                                                                                    

                                                                                                          
                                                                                            WHERE
                                                                                            appno = '$rowp1[4]'  
                                                                                            ");

        $result_att = mysqli_query($link, "SELECT * FROM deployment where appno_d='$rowp1[4]' and active='ACTIVE'");
        while ($row_att = mysqli_fetch_array($result_att)) {


          mysqli_query($link, "INSERT INTO attrition
                                                                            (emp_no,start_dateto,end_dateto,project,positionto,e_date,by_hr,actionto,reasonto)
                                                                          VALUES
                                                                       ('$rowp1[4]','$row_att[8]','$row_att[9]','$row_att[3]','$row_att[16]','$rowp1[41]','$rowp1[42]','$rowp1[33]','$rowp1[46]')
                                               ");
        }

        mysqli_query($link, "DELETE from Deployment
                                                                                            WHERE
                                                                                            appno_d = '$rowp1[4]'  
                                                                                            ");

        mysqli_query($link, "UPDATE deployment_history

                                                                                               SET

                                                                                            is_deleted='1',
                                                                                            active='INACTIVE'
                                                                                            

                                                                                                          
                                                                                           WHERE
                                                                                                    appno_d = '$rowp1[4]'  
                                                                                            ");

        // SHORTLIST SYNCH
        mysqli_query($link, "DELETE from shortlist_master
                                                                          WHERE
                                                                          appnumto = '$rowp1[4]'
                                                                          ");
      }
    }



    // resignation synchronization


    $resultr1 = mysqli_query($link, "SELECT * FROM employees where res_date!='' ");
    while ($rowr1 = mysqli_fetch_array($resultr1)) {


      if ($rowr1[43] <= $datenow1) {

        echo '<div class="body5010p2">';
        echo $rowr1[4];
        echo $date_old;
        mysqli_query($link, "UPDATE employees

                                                                                              SET

                                                                                            actionpoint='RESIGNED'
                                                                                                                                                                                    

                                                                                                          
                                                                                            WHERE
                                                                                            appno = '$rowr1[4]'  
                                                                                            ");


        $result_att = mysqli_query($link, "SELECT * FROM deployment where appno_d='$rowr1[4]' and active='ACTIVE'");
        while ($row_att = mysqli_fetch_array($result_att)) {


          mysqli_query($link, "INSERT INTO attrition
                                                                            (emp_no,start_dateto,end_dateto,project,positionto,e_date,by_hr,actionto,reasonto)
                                                                            VALUES
                                                                            ('$rowr1[4]','$row_att[8]','$row_att[9]','$row_att[3]','$row_att[16]','$rowr1[43]','$rowr1[44]','$rowr1[33]','$rowr1[48]')
                                                                            ");
        }



        mysqli_query($link, "DELETE from Deployment

                                                                                                                                                                                              
                                                                                            WHERE
                                                                                            appno_d = '$rowr1[4]'  
                                                                                            ");

        mysqli_query($link, "UPDATE deployment_history

                                                                                               SET

                                                                                            is_deleted='1',
                                                                                            active='INACTIVE'
                                                                                            

                                                                                                          
                                                                                           WHERE
                                                                                                    appno_d = '$rowr1[4]'  
                                                                                            ");
        echo '</div>';



        // SHORTLIST SYNCH
        mysqli_query($link, "DELETE from shortlist_master
                                                                          WHERE
                                                                          appnumto = '$rowr1[4]'
                                                                          ");
      }
    }




    //retrench
    // synchronization


    $resultr1 = mysqli_query($link, "SELECT * FROM employees where retrench_date!='' ");
    while ($rowr1 = mysqli_fetch_array($resultr1)) {


      if ($rowr1[49] <= $datenow1) {

        echo '<div class="body5010p2">';
        echo $rowr1[4];
        echo $date_old;
        mysqli_query($link, "UPDATE employees

                                                                                              SET

                                                                                            actionpoint='RETRENCH'
                                                                                                                                                                                    

                                                                                                          
                                                                                            WHERE
                                                                                            appno = '$rowr1[4]'  
                                                                                            ");


        $result_att = mysqli_query($link, "SELECT * FROM deployment where appno_d='$rowr1[4]' and active='ACTIVE'");
        while ($row_att = mysqli_fetch_array($result_att)) {


          mysqli_query($link, "INSERT INTO attrition
                                                                            (emp_no,start_dateto,end_dateto,project,positionto,e_date,by_hr,actionto,reasonto)
                                                                            VALUES
                                                                            ('$rowr1[4]','$row_att[8]','$row_att[9]','$row_att[3]','$row_att[16]','$rowr1[43]','$rowr1[44]','$rowr1[33]','$rowr1[48]')
                                                                            ");
        }



        mysqli_query($link, "DELETE from Deployment

                                                                                                                                                                                              
                                                                                            WHERE
                                                                                            appno_d = '$rowr1[4]'  
                                                                                            ");

        mysqli_query($link, "UPDATE deployment_history
                                                                                     ");
        echo '</div>';
      }
    }
    $_SESSION['successMessage'] = "Database Synch Complete";
  } else {
    //echo "synch na do nothing";

  }
}


if (isset($_POST['to_index'])) {
  session_unset();

  // destroy the session 
  session_destroy();

  header("location:index.php");
}



if (isset($_POST['xletter'])) {
  echo $_POST['applicant_no'];
  $appno = $_POST['applicant_no'];



  $resultem = mysqli_query($link, "SELECT * FROM employees where appno='$appno' ");
  while ($rowem = mysqli_fetch_row($resultem)) {

    $lname = $rowem[6];
    $fname = $rowem[7];
    $mname = $rowem[8];
    $fullname = $lname . ", " . $fname . " " . $mname;

    $paddress = $rowem[10];

    $sss_1 = $rowem[24];
    $Pagibig_1 = $rowem[25];
    $ph_1 = $rowem[26];
    $tin_1 = $rowem[27];

    $contk_num =  $rowem[18];
  }

  $resultloa = mysqli_query($link, "SELECT * FROM deployment where appno_d='$appno' ");
  while ($rowloa = mysqli_fetch_array($resultloa)) {

    $stemplate =  $rowloa[17];
    $ptitle =  $rowloa[3];
    $caddress =  $rowloa[2];
    $jposition = $rowloa[16];
    $estatus = $rowloa[15];


    // $datefrom = $rowloa[8];
    $datefromx = date_create($rowloa[8]);
    $datefrom = date_format($datefromx, "m/d/Y");



    //$dateto = $rowloa[9];
    $datetox = date_create($rowloa[9]);
    $dateto = date_format($datetox, "m/d/Y");



    $rate_day = $rowloa[18];
    $daily_rate = $rowloa[18];
    $ecola = $rowloa[19];
    $comm_al = $rowloa[23];
    $transpo = $rowloa[24];
    $meal_al = $rowloa[21];
    $inet_al = $rowloa[20];
    $outbase = $rowloa[22];
    $outlet = $rowloa[27];
    $nodays = $rowloa[26];

    $dep_by = $rowloa[31];
    $dep_desi = $rowloa[32];

    $hr_rep = $rowloa[28];
    $hr_desi = $rowloa[29];

    $ps = $rowloa[33];
    $ps_desi = $rowloa[34];

    $head =  $rowloa[35];
    $head_desi = $rowloa[36];

    $id_1 = $rowloa[35];

    $emp_no = $rowloa[6];
  }







  $LOAtemp = "loa_templates/" . $stemplate;
  $filenamenya = "loa_files/" . $stemplate;

  $Rowvaladd = "27 CRESTA STREET, BARANGAY MALAMIG, MANDALUYONG CITY and 30 ARAYAT STREET, BARANGAY MALAMIG, MANDALUYONG CITY";
  $Rowval1 = $fullname;


  $Rowval2 = $paddress;
  $Rowval3 = $ptitle;
  $Rowval5 = $caddress;
  $Rowval6 = $jposition;
  $Rowval7 = $estatus;
  $Rowval8 = $datefrom;
  $Rowval9 = $dateto;
  $Rowval10 =  $rate_day;
  $Rowval10p = $daily_rate;
  $Rowval10c = $ecola;
  $Rowval10a = $comm_al;
  $Rowval10b = $transpo;

  $Rowval = $meal_al;
  $Rowval = $inet_al;
  $Rowval = $outbase;


  $Rowval11a = $outlet;
  $Rowval12 = $nodays;

  $Rowval16 = $dep_by;
  $Rowval17 = $dep_desi;

  $Rowval18 = $hr_rep;
  $Rowval19 = $hr_desi;

  $Rowval20 = $ps;
  $Rowval21 = $ps_desi;

  $Rowval22 = $head;
  $Rowval23 = $head_desi;

  $Rowval27 = "$fullname";




  $Rowval13 = date("d");
  $Rowval14x = date("n");

  switch ($Rowval14x) {
    case '1':
      # code...
      $Rowval14 = "January";
      break;
    case '2':
      # code...
      $Rowval14 = "February";
      break;
    case '3':
      # code...
      $Rowval14 = "March";
      break;
    case '4':
      # code...
      $Rowval14 = "April";
      break;
    case '5':
      # code...
      $Rowval14 = "May";
      break;
    case '6':
      # code...
      $Rowval14 = "June";
      break;
    case '7':
      # code...
      $Rowval14 = "July";
      break;
    case '8':
      # code...
      $Rowval14 = "August";
      break;
    case '9':
      # code...
      $Rowval14 = "September";
      break;
    case '10':
      # code...
      $Rowval14 = "October";
      break;
    case '11':
      # code...
      $Rowval14 = "November";
      break;
    case '12':
      # code...
      $Rowval14 = "December";
      break;
    default:
      # code...
      break;
  }



  $Rowval15 = date("Y");




  $Rowval26 = $sss_1;
  $Rowval27 = $ph_1;
  $Rowval28 = $Pagibig_1;
  $Rowval29 = $tin_1;

  $Rowval31 = $id_1;
  $Rowval32 = $contk_num;
  $Rowval33 = $emp_no;



  //$Rowval35="rodeo villavicencio";
  //$Rowval36="rodeo villavicencio";
  //$Rowval37="Date - Division - Emp no  ";




  $PHPWord = new PHPWord();

  $document = $PHPWord->loadTemplate($LOAtemp);


  $document->setValue('VAddress', $Rowvaladd);
  $document->setValue('Value1', $Rowval1);
  $document->setValue('Value2', $Rowval2);
  $document->setValue('Value3', $Rowval3);

  $document->setValue('Value4', $Rowval4);
  $document->setValue('Value5', $Rowval5);


  $document->setValue('Value6', $Rowval6);
  $document->setValue('Value7', $Rowval7);
  $document->setValue('Value8', $Rowval8);
  $document->setValue('Deo9', $Rowval9);
  $document->setValue('Value10', $Rowval10);
  $document->setValue('Value10c', $Rowval10c);
  $document->setValue('Value10a', $Rowval10a);
  $document->setValue('Value10b', $Rowval10b);




  $document->setValue('Value11a', $Rowval11a);
  $document->setValue('Value12', $Rowval12);



  $document->setValue('Value13', $Rowval13);
  $document->setValue('Value14', $Rowval14);
  $document->setValue('Value15', $Rowval15);

  $document->setValue('Value16', $Rowval16);
  $document->setValue('Value17', $Rowval17);

  $document->setValue('Value18', $Rowval18);
  $document->setValue('Value19', $Rowval19);

  $document->setValue('Value20', $Rowval20);
  $document->setValue('Value21', $Rowval21);

  $document->setValue('Value22', $Rowval22);
  $document->setValue('Value23', $Rowval23);

  $document->setValue('Value24', $Rowval24);
  $document->setValue('Value25', $Rowval25);



  $document->setValue('Value26', $Rowval26);
  $document->setValue('Value27', $Rowval27);
  $document->setValue('Value28', $Rowval28);
  $document->setValue('Value29', $Rowval29);

  $document->setValue('Value30', $Rowval30);

  $document->setValue('Value31', $Rowval31);
  $document->setValue('Value32', $Rowval32);

  $document->setValue('Value33', $Rowval33);
  $document->setValue('Value34', $Rowval34);
  // $document->setValue('Value35', $Rowval35);
  // $document->setValue('Value36', $Rowval36);
  //$document->setValue('Value37', $Rowval37);




  $document->save($filenamenya);

  //autodownload the file 
  // this includes the download.php
  header("location:download.php?download_file=" . $filenamenya);
}



if (isset($_POST['xletter1'])) {
  $appno = $_POST['applicant_no'];
  $reason_x1 = $_POST['reason_x'];

  $resultemp = mysqli_query($link, "UPDATE deployment SET letter_remarks_d = '$reason_x1', WHERE appno_d = '$appno'");
  $resultemp = mysqli_query($link, "UPDATE deployment_history SET letter_remarks_d = '$reason_x1', WHERE appno_d = '$appno'");
  $resultem = mysqli_query($link, "SELECT * FROM employees WHERE appno = '$appno' ");
    while ($rowem = mysqli_fetch_row($resultem)) {
      $lname = $rowem[6];
      $fname = $rowem[7];
      $mname = $rowem[8];
      $fullname = $lname . ", " . $fname . " " . $mname;

      $paddress = $rowem[10];

      $sss_1 = $rowem[24];
      $Pagibig_1 = $rowem[25];
      $ph_1 = $rowem[26];
      $tin_1 = $rowem[27];

      $contk_num =  $rowem[18];
    }

  $resultloa = mysqli_query($link, "SELECT * FROM deployment where appno_d='$appno' ");
  while ($rowloa = mysqli_fetch_array($resultloa)) {

    $stemplate =  'excuse.docx';
    $ptitle =  $rowloa[3];
    $client1 =  $rowloa[1];
    $caddress =  $rowloa[2];
    $jposition = $rowloa[16];
    $estatus = $rowloa[15];


    // $datefrom = $rowloa[8];
    $datefromx = date_create($rowloa[8]);
    $datefrom = date_format($datefromx, "m/d/Y");



    //$dateto = $rowloa[9];
    $datetox = date_create($rowloa[9]);
    $dateto = date_format($datetox, "m/d/Y");



    $rate_day = $rowloa[18];
    $daily_rate = $rowloa[18];
    $ecola = $rowloa[19];
    $comm_al = $rowloa[23];
    $transpo = $rowloa[24];
    $meal_al = $rowloa[21];
    $inet_al = $rowloa[20];
    $outbase = $rowloa[22];
    $outlet = $rowloa[27];
    $nodays = $rowloa[26];

    $dep_by = $rowloa[31];
    $dep_desi = $rowloa[32];

    $hr_rep = $rowloa[28];
    $hr_desi = $rowloa[29];

    $ps = $rowloa[33];
    $ps_desi = $rowloa[34];

    $head =  $rowloa[35];
    $head_desi = $rowloa[36];

    $id_1 = $rowloa[35];

    $emp_no = $rowloa[6];
  }







  $LOAtemp = "loa_templates/" . $stemplate;
  $filenamenya = "loa_files/" . $stemplate;

  $Rowvaladd = "27 CRESTA STREET, BARANGAY MALAMIG, MANDALUYONG CITY and 30 ARAYAT STREET, BARANGAY MALAMIG, MANDALUYONG CITY";
  $Rowval1 = $fullname;


  $Rowval2 = $paddress;
  $Rowval3 = $ptitle;
  $Rowval5 = $caddress;
  $Rowval6 = $jposition;
  $Rowval7 = $estatus;
  $Rowval8 = $datefrom;
  $Rowval9 = $dateto;
  $Rowval10 =  $rate_day;
  $Rowval10p = $daily_rate;
  $Rowval10c = $ecola;
  $Rowval10a = $comm_al;
  $Rowval10b = $transpo;

  $Rowval = $meal_al;
  $Rowval = $inet_al;
  $Rowval = $outbase;


  $Rowval11a = $outlet;
  $Rowval12 = $nodays;

  $Rowval16 = $dep_by;
  $Rowval17 = $dep_desi;

  $Rowval18 = $hr_rep;
  $Rowval19 = $hr_desi;

  $Rowval20 = $ps;
  $Rowval21 = $ps_desi;

  $Rowval22 = $head;
  $Rowval23 = $head_desi;

  $Rowval27 = "$fullname";




  $Rowval13 = date("d");
  $Rowval14x = date("n");

  switch ($Rowval14x) {
    case '1':
      # code...
      $Rowval14 = "January";
      break;
    case '2':
      # code...
      $Rowval14 = "February";
      break;
    case '3':
      # code...
      $Rowval14 = "March";
      break;
    case '4':
      # code...
      $Rowval14 = "April";
      break;
    case '5':
      # code...
      $Rowval14 = "May";
      break;
    case '6':
      # code...
      $Rowval14 = "June";
      break;
    case '7':
      # code...
      $Rowval14 = "July";
      break;
    case '8':
      # code...
      $Rowval14 = "August";
      break;
    case '9':
      # code...
      $Rowval14 = "September";
      break;
    case '10':
      # code...
      $Rowval14 = "October";
      break;
    case '11':
      # code...
      $Rowval14 = "November";
      break;
    case '12':
      # code...
      $Rowval14 = "December";
      break;
    default:
      # code...
      break;
  }



  $Rowval15 = date("Y");




  $Rowval26 = $sss_1;
  $Rowval27 = $ph_1;
  $Rowval28 = $Pagibig_1;
  $Rowval29 = $tin_1;

  $Rowval31 = $id_1;
  $Rowval32 = $contk_num;
  $Rowval33 = $emp_no;

  $Rowval35 = $client1;
  $Rowval36 = $reason_x1;
  //$Rowval35="rodeo villavicencio";
  //$Rowval36="rodeo villavicencio";
  //$Rowval37="Date - Division - Emp no  ";




  $PHPWord = new PHPWord();

  $document = $PHPWord->loadTemplate($LOAtemp);


  $document->setValue('VAddress', $Rowvaladd);
  $document->setValue('Value1', $Rowval1);
  $document->setValue('Value2', $Rowval2);
  $document->setValue('Value3', $Rowval3);

  $document->setValue('Value4', $Rowval4);
  $document->setValue('Value5', $Rowval5);


  $document->setValue('Value6', $Rowval6);
  $document->setValue('Value7', $Rowval7);
  $document->setValue('Value8', $Rowval8);
  $document->setValue('Deo9', $Rowval9);
  $document->setValue('Value10', $Rowval10);
  $document->setValue('Value10c', $Rowval10c);
  $document->setValue('Value10a', $Rowval10a);
  $document->setValue('Value10b', $Rowval10b);




  $document->setValue('Value11a', $Rowval11a);
  $document->setValue('Value12', $Rowval12);



  $document->setValue('Value13', $Rowval13);
  $document->setValue('Value14', $Rowval14);
  $document->setValue('Value15', $Rowval15);

  $document->setValue('Value16', $Rowval16);
  $document->setValue('Value17', $Rowval17);

  $document->setValue('Value18', $Rowval18);
  $document->setValue('Value19', $Rowval19);

  $document->setValue('Value20', $Rowval20);
  $document->setValue('Value21', $Rowval21);

  $document->setValue('Value22', $Rowval22);
  $document->setValue('Value23', $Rowval23);

  $document->setValue('Value24', $Rowval24);
  $document->setValue('Value25', $Rowval25);



  $document->setValue('Value26', $Rowval26);
  $document->setValue('Value27', $Rowval27);
  $document->setValue('Value28', $Rowval28);
  $document->setValue('Value29', $Rowval29);

  $document->setValue('Value30', $Rowval30);

  $document->setValue('Value31', $Rowval31);
  $document->setValue('Value32', $Rowval32);

  $document->setValue('Value33', $Rowval33);
  $document->setValue('Value34', $Rowval34);
  $document->setValue('Value35', $Rowval35);
  $document->setValue('Value36', $Rowval36);
  //$document->setValue('Value37', $Rowval37);




  $document->save($filenamenya);

  //autodownload the file 
  // this includes the download.php
  header("location:download.php?download_file=" . $filenamenya);
}

















if (isset($_POST['id1'])) {

  $appno22 = $_POST['applicant_no'];
  $_SESSION["appid"] = $appno22;
  header("location:id1.php");
}




if (isset($_POST['printemp'])) {
  $appnoto1 = $_POST['applicant_no'];

  $_SESSION["appnoto1"] = $appnoto1;

  header("location:printemp.php");
}










if (isset($_POST['retrench_emp'])) {
  $appnoto1 = $_POST['Xretrench'];
  $res_date1 = $_POST['retrench_date'];
  $res_reason1 = $_POST['retrench_reason'];
  //$ter_person=$_POST['ter_person'];      


  $resultp1 = mysqli_query($link, "SELECT * FROM deployment where appno_d= '$appnoto1' and active='ACTIVE' ");
  while ($rowp1 = mysqli_fetch_array($resultp1)) {
    $emp_end_date1a = $rowp1[9];
  }

  $datefins = date_create($res_date1);

  $res_datefin = date_format($datefins, "Y-m-d");



  if ($appnoto1 != "Select Employee:" or strlen($res_reason1) != 0 or strlen($res_date1) != 0) {

    if ($emp_end_date1a <= $res_datefin) {
      echo $emp_end_date1a;
      //$kekelpogi="Resignation date is over or equal to the Employees end date, or simply employee have end contract on the date you set. <BR> RESIGNATION NOT PROCESSED.";
    } else {
      $resultterp1 = mysqli_query($link, "SELECT * FROM deployment where appno_d= '$appnoto1' and active='ACTIVE' ");


      if (mysqli_num_rows($resultterp1) == 0) {
        echo "di nakita employee, plus date problem";
      } else {
        //echo "nakita";
        //actionpoint='TERMINATED',

        mysqli_query($link, "UPDATE employees

                                           SET

                                         actionpoint='RETRENCH',
                                        retrench_date='$res_datefin',
                                        retrench_reason='$res_reason1',
                                        retrench_person='HR PERSONNEL'

                                                      
                                        WHERE
                                        appno = '$appnoto1'
                                        ");
      }

      $kekelpogi = "Employee's Retrenchment Set";
    }
  } else {
    $kekelpogi = "None selected for retrenchment! ";
  }
}








if (isset($_POST['teremp'])) {
  $appnoto1 = $_POST['X'];
  $ter_date1 = $_POST['ter_date'];
  $ter_reason1 = strtoupper($_POST['ter_reason']);

  //$ter_person=$_POST['ter_person'];      


  $resultp1 = mysqli_query($link, "SELECT * FROM deployment where appno_d= '$appnoto1' and active='ACTIVE' ");
  while ($rowp1 = mysqli_fetch_array($resultp1)) {
    $emp_end_date1 = $rowp1[9];
  }


  //$day1=date("d");
  //$month1=date("m");
  //$year1=date("Y");


  //$date_old=$year1."-".$month1."-".$day1 ;
  $datefin = date_create($ter_date1);

  $ter_datefin = date_format($datefin, "Y-m-d");

  //echo $ter_datefin;

  //echo $date_old;

  if ($appnoto1 != "Select Employee:" or strlen($ter_reason1) != 0 or strlen($ter_date1) != 0) {

    if ($emp_end_date1 <= $ter_datefin) {
      $kekelpogi = "Termination date is over than or equal to Employee end date, or simply employee have end contract on the date you set. <BR> TERMINATION NOT PROCESSED.";
    } else {
      $resultterp = mysqli_query($link, "SELECT * FROM deployment where appno_d= '$appnoto1' and active='ACTIVE' ");


      if (mysqli_num_rows($resultterp) == 0) {
        echo "di nakita employee, plus date problem";
      } else {
        //echo "nakita";
        //actionpoint='TERMINATED',

        mysqli_query($link, "UPDATE employees

                                           SET

                                        
                                        ter_date='$ter_datefin',
                                        ter_reason='$ter_reason1',
                                        ter_person='HR PERSONNEL'

                                                      
                                        WHERE
                                        appno = '$appnoto1'
                                        ");
      }

      $kekelpogi = "Employee Termination Set";
    }
  } else {
    $kekelpogi = "No One to Terminate! ";
  }
}


if (isset($_POST['res_emp'])) {
  $appnoto1 = $_POST['Xres'];
  $res_date1 = $_POST['res_date'];
  $res_reason1 = $_POST['res_reason'];
  //$ter_person=$_POST['ter_person'];      


  $resultp1 = mysqli_query($link, "SELECT * FROM deployment where appno_d= '$appnoto1' and active='ACTIVE' ");
  while ($rowp1 = mysqli_fetch_array($resultp1)) {
    $emp_end_date1a = $rowp1[9];
  }

  $datefins = date_create($res_date1);

  $res_datefin = date_format($datefins, "Y-m-d");



  if ($appnoto1 != "Select Employee:" or strlen($res_reason1) != 0 or strlen($res_date1) != 0) {

    if ($emp_end_date1a <= $res_datefin) {
      echo $emp_end_date1a;
      //$kekelpogi="Resignation date is over or equal to the Employees end date, or simply employee have end contract on the date you set. <BR> RESIGNATION NOT PROCESSED.";
    } else {
      $resultterp1 = mysqli_query($link, "SELECT * FROM deployment where appno_d= '$appnoto1' and active='ACTIVE' ");


      if (mysqli_num_rows($resultterp1) == 0) {
        echo "di nakita employee, plus date problem";
      } else {
        //echo "nakita";
        //actionpoint='TERMINATED',

        mysqli_query($link, "UPDATE employees

                                           SET

                                         actionpoint='RESIGNED',
                                        res_date='$res_datefin',
                                        res_reason='$res_reason1',
                                        res_person='HR PERSONNEL'

                                                      
                                        WHERE
                                        appno = '$appnoto1'
                                        ");
      }

      $kekelpogi = "Employee's Resignation Set";
    }
  } else {
    $kekelpogi = "None selected for resignation! ";
  }
}




if (isset($_POST['viewdatabase'])) {
  echo '
                <div class="cd-content-wrapper">
                  <div class="text-component text-center">
<div class = "how2">
            <!--- laman -->
  
   <form method="post" action="exportemp.php">
     <input type="submit" name="exportemp" class="btn btn-success btnsall" value="Export" style="float:right;" />
    </form>
             <form action = "" method = "POST" style="align=left">
             <button class="btn btn-success btnsall" Name ="Back" style="float:right;"><span>Close Report</span></button>
  <br><br><br>
</form>
                    <h2 class="fs-2">DEPLOYMENT DATABASE</h2>
         

<table id="example" class="table table-sm align-middle mb-0 bg-white p-3 bg-opacity-10 border border-secondary border-start-0 border-end-0 rounded-end" style="width:100%">
            <thead >
            <tr>
            <th class="text-white"> Client</th>
            <th class="text-white"> Project </th>
            <th class="text-white"> Emp No.</th>
            <th class="text-white"> Name </th>
            <th class="text-white"> Start Date </th>
            <th class="text-white"> End Date </th>
            <th class="text-white"> Action </th>

            
             </tr>   
            </thead>

            <tbody> 

';
  //$resultx = mysqli_query($link, "SELECT * FROM employees where actionpoint='DEPLOYED'");
  //while($rowx=mysqli_fetch_row($resultx))
  //{  

  $resultx = mysqli_query($link, "SELECT * FROM deployment where is_deleted!='1' order by client_d and project_d asc");
  while ($rowx = mysqli_fetch_row($resultx)) {


    echo ' <tr> ';


    echo '  <td>  ' . $rowx[1] . '   </td> ';
    echo '  <td>  ' . $rowx[3] . '   </td> ';
    echo '  <td> ' . $rowx[6] . '   </td> ';

    $resulteml = mysqli_query($link, "SELECT * FROM employees where appno='$rowx[5]'");
    while ($roweml = mysqli_fetch_row($resulteml)) {

      echo '  <td> ' . $roweml[6] . ", " . $roweml[7] . " " . $roweml[8];
      '   </td> ';
    }

    echo '  <td> ' . $rowx[8] . '   </td> ';
    echo '  <td> ' . $rowx[9] . '   </td> ';
    echo '  <td> ' . $rowx[9] . '   </td> ';


    echo ' </tr> ';
  }
  echo '


     </tbody>
        </table> 

  

   


                  </div>
            <!--- laman -->
                  </div>
                </div> <!-- .content-wrapper -->
  
  ';
}


if (isset($_POST['viewhistory'])) {

  $empno1 = $_POST['empno'];
  $_SESSION["empno1"] = $empno1;
  echo '
                <div class="cd-content-wrapper">
                  <div class="text-component text-center">
<div class = "how2">
            <!--- laman -->
  
   <form method="post" action="exportemphistory.php">
     <input type="submit" name="exportemphistory" class="btn btn-success btnsall" value="Export" style="float:right;" />
    </form>

             <form action = "" method = "POST" style="align=left">
             <button class="btn btn-success btnsall" Name ="Back" style="float:right;"><span>Close Report</span></button>
<br><br><br>
</form>
                    <h2 class="fs-2">Deployment History Database</h2>
         

<table id="example" class="table table-sm align-middle mb-0 bg-white p-3 bg-opacity-10 border border-secondary border-start-0 border-end-0 rounded-end" style="width:100%">
            <thead>
            <tr>
            <th class="text-white"> Client</th>
            <th class="text-white"> Project </th>
            <th class="text-white"> Emp No.</th>
            <th class="text-white"> Name </th>
            <th class="text-white"> Start Date </th>
            <th class="text-white"> End Date </th>
			      <th class="text-white"> LOA Number </th>
			      <th class="text-white"> Action Point </th>

            
             </tr>   
            </thead>

            <tbody> 

';
  //$resultx = mysqli_query($link, "SELECT * FROM employees where actionpoint='DEPLOYED'");
  //while($rowx=mysqli_fetch_row($resultx))
  //{  

  $resultx = mysqli_query($link, "SELECT * FROM deployment_history where appno_d='$empno1' order by emp_startdate_d DESC");
  while ($rowx = mysqli_fetch_row($resultx)) {

    $resulteml = mysqli_query($link, "SELECT * FROM employees where appno=$rowx[5]");
    while ($roweml = mysqli_fetch_row($resulteml)) {



      echo ' <tr> ';

      echo '  <td>  ' . $rowx[1] . '   </td> ';
      echo '  <td>  ' . $rowx[3] . '   </td> ';
      echo '  <td> ' . $rowx[6] . '   </td> ';



      echo '  <td> ' . $roweml[6] . ", " . $roweml[7] . " " . $roweml[8] . '   </td> ';


      echo '  <td> ' . $rowx[8] . '   </td> ';
      echo '  <td> ' . $rowx[9] . '   </td> ';
      echo '  <td> ' . $rowx[42] . '   </td> ';
      echo '  <td> ' . $roweml[33] . '   </td> ';


      echo ' </tr> ';
    }
  }
  echo '


     </tbody>
        </table> 

  

   


                  </div>
            <!--- laman -->
                  </div>
                </div> <!-- .content-wrapper -->
  
  ';
}



if (isset($_POST['viewhistoryproject'])) {

  $project1 = $_POST['project_name'];
  $_SESSION["project1"] = $project1;
  echo '
                <div class="cd-content-wrapper">
                  <div class="text-component text-center">
<div class = "how2">
            <!--- laman -->
  
   <form method="post" action="exportprojecthistory.php">
     <input type="submit" name="exportemphistory" class="btn btn-success btnsall" value="Export" style="float:right;" />
    </form>
             <form action = "" method = "POST" style="align=left">
             <button class="btn btn-success btnsall" Name ="Back" style="float:right;"><span>Close Report</span></button>
<br><br><br>
</form>
                    <h2 class="fs-2">Deployment History Database Per Project</h2>
         

<table id="example" class="table table-sm align-middle mb-0 bg-white p-3 bg-opacity-10 border border-secondary border-start-0 border-end-0 rounded-end" style="width:100%">
            <thead>
            <tr>
            <th class="text-white"> Client</th>
            <th class="text-white"> Project </th>
            <th class="text-white"> Emp No.</th>
            <th class="text-white"> Name </th>
            <th class="text-white"> Start Date </th>
            <th class="text-white"> End Date </th>
			<th class="text-white"> LOA Number </th>

            
             </tr>   
            </thead>

            <tbody> 

';
  //$resultx = mysqli_query($link, "SELECT * FROM employees where actionpoint='DEPLOYED'");
  //while($rowx=mysqli_fetch_row($resultx))
  //{  

  $resultx = mysqli_query($link, "SELECT * FROM deployment_history where project_d='$project1' order by emp_startdate_d and appno_d DESC");
  while ($rowx = mysqli_fetch_row($resultx)) {

    $resulteml = mysqli_query($link, "SELECT * FROM employees where appno=$rowx[5]");
    while ($roweml = mysqli_fetch_row($resulteml)) {



      echo ' <tr> ';

      echo '  <td>  ' . $rowx[1] . '   </td> ';
      echo '  <td>  ' . $rowx[3] . '   </td> ';
      echo '  <td> ' . $rowx[6] . '   </td> ';



      echo '  <td> ' . $roweml[6] . ", " . $roweml[7] . " " . $roweml[8] . '   </td> ';


      echo '  <td> ' . $rowx[8] . '   </td> ';
      echo '  <td> ' . $rowx[9] . '   </td> ';
      echo '  <td> ' . $rowx[42] . '   </td> ';



      echo ' </tr> ';
    }
  }
  echo '


     </tbody>
        </table> 

  

   


                  </div>
            <!--- laman -->
                  </div>
                </div> <!-- .content-wrapper -->
  
  ';
}



if (isset($_POST['summarygender'])) {
  echo '
<div class="body5025p">
<table id="example" class="table" style="width:100%">
            <thead>
            <tr>
            <th> Gender </th>
            
            

             </tr>   
            </thead>

            <tbody> 


';

  $resultdis1 = mysqli_query($link, "SELECT distinct appno_d FROM deployment_history");
  while ($rowdis1 = mysqli_fetch_array($resultdis1)) {


    //$resultdis = mysqli_query($link, "SELECT gendern, count(*) FROM employees where appno='$rowdis1[1]' group by appno ");
    //  while($rowdis = mysqli_fetch_array($resultdis))
    //{
    echo ' <tr> ';
    echo '  <td>  ' . $rowdis1[0] . '   </td> ';
    //echo '  <td>  '.$rowdis1[10].'   </td> ';
    //    }
    echo ' </tr> ';
  }
  '


     </tbody>
        </table> 






</div>
';
}





if (isset($_POST['addappdel1'])) {
  $short1 = $_POST['shortlisttitle1del'];

  $_SESSION["data"] = $short1;
  $_SESSION["account"] = "deployment";

  header("location:toewb.php");
}





if (isset($_POST['filter_project'])) {

  $projchoiceto1 = $_POST['projchoiceto'];


  echo '



     
     <div class="how2">

           
   <form action = "" method = "POST" style="align=left">
             <button class="submit" class="btn btn-default btnsall" Name ="Back" style="float:right;"><span>Close Table</span></button>

</form>
<center>
   
   
<br><br><br>
                  <h2 class="fs-2">Applicant for Deployment</h2>
</center>     
         <br> 
<table id="example" class="display" style="width:100%">
            
                  <thead>
                <tr>
                   
                                <th class="text-white">App.No</th>
                                <th class="text-white">Lastname</th>
                                <th class="text-white">Firstname</th>
                                <th class="text-white">Middlename</th>
                                <th class="text-white">SSS</th>
                                <th class="text-white">Pag-ibig</th>
                                <th class="text-white">Philhealth</th>
                                <th class="text-white">TIN</th>
                                <th class="text-white">Police</th>
                                <th class="text-white">Brgy</th>
                                <th class="text-white">NBI</th>
                                <th class="text-white">PSA</th>
                                <th class="text-white">Bday</th>
                                <th class="text-white">EWB</th>
                                <th class="text-white">Shortlist</th>
                                <th class="text-white">Project</th>
                                <th class="text-white">Action</th>

                                 </tr> 
            </thead>

            <tbody> 

';
  $resultx = mysqli_query($link, "SELECT * FROM employees where ewbdeploy='FOR DEPLOYMENT' or ewbdeploy='FOR DEPLOYMENT WITH FEW REQUIREMENTS' ");
  while ($rowx = mysqli_fetch_row($resultx)) {
    $resultz = mysqli_query($link, "SELECT * FROM shortlist_details where  project='$projchoiceto1'");
    while ($rowz = mysqli_fetch_row($resultz)) {

      $resulty = mysqli_query($link, "SELECT * FROM shortlist_master where  shortlistnameto='$rowz[1]' and appnumto=$rowx[4]");
      while ($rowy = mysqli_fetch_row($resulty)) {


        if ($rowx[33] == "DEPLOYED") {

          echo ' <tr> ';


          echo '  <td>  ' . $rowx[4] . '   </td> ';
          echo '  <td>  ' . $rowx[6] . '   </td> ';
          echo '  <td> ' . $rowx[7] . '   </td> ';
          echo '  <td> ' . $rowx[8] . '   </td> ';
          echo '  <td> ' . $rowx[24] . '   </td> ';
          echo '  <td> ' . $rowx[25] . '   </td> ';
          echo '  <td> ' . $rowx[26] . '   </td> ';
          echo '  <td> ' . $rowx[27] . '   </td> ';
          echo '  <td> ' . $rowx[28] . '   </td> ';
          echo '  <td> ' . $rowx[29] . '   </td> ';
          echo '  <td> ' . $rowx[30] . '   </td> ';
          echo '  <td> ' . $rowx[31] . '   </td> ';
          echo '  <td> ' . $rowx[14] . '   </td> ';
          echo '  <td> ' . $rowx[37] . '   </td> ';
          echo '  <td> ' . $rowy[1] . '   </td> ';
          echo '  <td> ' . $rowz[2] . '   </td> ';


          echo '<td> <form action = "" method = "POST">

                    <input type = "hidden" name = "shadowdep" id = "shadowdep" value = "' . $rowx[4] . '">
                    <input type = "hidden" name = "shashort"  value = "' . $rowy[1] . '">
                    <input type = "hidden" name = "shaproject"  value = "' . $rowz[2] . '">
                    <input type = "hidden" name = "shaclient"  value = "' . $rowz[3] . '">

                     <button type="button" name = "okna1"  class="button btn-success" style = "font-size:12;width:100px;height:60px">
                                                          <span class="glyphicon glyphicon-edit" >Deployed to ' . $rowx[34];
          '</span>
                                                        </button>


                         ';
          echo '</form></td>';

          echo ' </tr> 

 ';
        } elseif ($rowx[33] == "TERMINATED") {

          echo ' <tr> ';


          echo '  <td>  ' . $rowx[4] . '   </td> ';
          echo '  <td>  ' . $rowx[6] . '   </td> ';
          echo '  <td> ' . $rowx[7] . '   </td> ';
          echo '  <td> ' . $rowx[8] . '   </td> ';
          echo '  <td> ' . $rowx[24] . '   </td> ';
          echo '  <td> ' . $rowx[25] . '   </td> ';
          echo '  <td> ' . $rowx[26] . '   </td> ';
          echo '  <td> ' . $rowx[27] . '   </td> ';
          echo '  <td> ' . $rowx[28] . '   </td> ';
          echo '  <td> ' . $rowx[29] . '   </td> ';
          echo '  <td> ' . $rowx[30] . '   </td> ';
          echo '  <td> ' . $rowx[31] . '   </td> ';
          echo '  <td> ' . $rowx[14] . '   </td> ';
          echo '  <td> ' . $rowx[37] . '   </td> ';
          echo '  <td> ' . $rowy[1] . '   </td> ';
          echo '  <td> ' . $rowz[2] . '   </td> ';


          echo '<td> <form action = "" method = "POST">

                    <input type = "hidden" name = "shadowdep" id = "shadowdep" value = "' . $rowx[4] . '">
                    <input type = "hidden" name = "shashort"  value = "' . $rowy[1] . '">
                    <input type = "hidden" name = "shaproject"  value = "' . $rowz[2] . '">
                    <input type = "hidden" name = "shaclient"  value = "' . $rowz[3] . '">

                     <button type="button" name = "okna1"  class="button btn-success" style = "font-size:12;width:100px;height:60px">
                                                          <span class="glyphicon glyphicon-edit" >TERMNATED ' . $rowx[34];
          '</span>
                                                        </button>


                           ';
          echo '</form></td>';

          echo ' </tr> 

 ';
        } else {
          echo ' <tr> ';


          echo '  <td>  ' . $rowx[4] . '   </td> ';
          echo '  <td>  ' . $rowx[6] . '   </td> ';
          echo '  <td> ' . $rowx[7] . '   </td> ';
          echo '  <td> ' . $rowx[8] . '   </td> ';
          echo '  <td> ' . $rowx[24] . '   </td> ';
          echo '  <td> ' . $rowx[25] . '   </td> ';
          echo '  <td> ' . $rowx[26] . '   </td> ';
          echo '  <td> ' . $rowx[27] . '   </td> ';
          echo '  <td> ' . $rowx[28] . '   </td> ';
          echo '  <td> ' . $rowx[29] . '   </td> ';
          echo '  <td> ' . $rowx[30] . '   </td> ';
          echo '  <td> ' . $rowx[31] . '   </td> ';
          echo '  <td> ' . $rowx[14] . '   </td> ';
          echo '  <td> ' . $rowx[37] . '   </td> ';




          echo '  <td> ' . $rowy[1] . '   </td> ';
          echo '  <td> ' . $rowz[2] . '   </td> ';


          echo '<td> <form action = "" method = "POST">

                                        <input type = "hidden" name = "shadowdep" id = "shadowdep" value = "' . $rowx[4] . '">
                                        <input type = "hidden" name = "shashort"  value = "' . $rowy[1] . '">
                                        <input type = "hidden" name = "shaproject"  value = "' . $rowz[2] . '">
                                        <input type = "hidden" name = "shaclient"  value = "' . $rowz[3] . '">


                                          <button type="submit" name = "deploy"  class="button btn-info" style = "font-size:15;width:100px;height:60px">
                                                                              <span class="glyphicon glyphicon-edit" >Deploy</span>
                                                                            </button>

                                             ';
          echo '</form></td>';
          echo ' </tr> 


                                         ';
        }
      }
    }
  }
  echo '


     </tbody>
        </table> 

  

     




     
            
                 </div>
  
  ';
}







if (isset($_POST['deploy'])) {

  $id1e = $_POST['shadowdep'];
  $shashort1e = $_POST['shashort'];
  $shaproject1e = $_POST['shaproject'];
  $shaclient1e = $_POST['shaclient'];

  $_SESSION["dark"] = $id1e;
  $_SESSION["shashort"] = $shashort1e;
  $_SESSION["shaproject"] = $shaproject1e;
  $_SESSION["shaclient"] = $shaclient1e;



  header("location:deployit.php");
}

if (isset($_POST['Back'])) {
  header("location:deployment.php");
}















if (isset($_POST['filter_shortlist'])) {

  $shortchoiceto1 = $_POST['shortchoiceto'];


  echo '


   
     <div class="how2">

           
   <form action = "" method = "POST" style="align=left">
             <button type="submit" class="btn btn-success btnsall" Name ="Back" style="float:right;"><span>Close Table</span></button>
<br><br><br>
</form>
<center>
   
   

                  <h2 class="fs-2">Applicant for Deployment</h2>
</center>     
         <br> 
<table id="example" class="table table-sm align-middle mb-0 bg-white p-3 bg-opacity-10 border border-secondary border-start-0 border-end-0 rounded-end" >
            <thead>
                <tr>
                   
                                <th class="text-white">App.No</th>
                                <th class="text-white">Lastname</th>
                                <th class="text-white">Firstname</th>
                                <th class="text-white">Middlename</th>
                                <th class="text-white">SSS</th>
                                <th class="text-white">Pag-ibig</th>
                                <th class="text-white">Philhealth</th>
                                <th class="text-white">TIN</th>
                                <th class="text-white">Police</th>
                                <th class="text-white">Brgy</th>
                                <th class="text-white">NBI</th>
                                <th class="text-white">PSA</th>
                                <th class="text-white">Bday</th>
                                <th class="text-white">EWB</th>
                                <th class="text-white">Shortlist</th>
                                <th class="text-white">Project</th>
                                <th class="text-white">Action</th>

                                 </tr> 
            </thead>

            <tbody> 

';
  $resultx = mysqli_query($link, "SELECT * FROM employees where ewbdeploy='FOR DEPLOYMENT' or ewbdeploy='FOR DEPLOYMENT WITH FEW REQUIREMENTS' ");
  while ($rowx = mysqli_fetch_row($resultx)) {
    $resultz = mysqli_query($link, "SELECT * FROM shortlist_details where  shortlistname='$shortchoiceto1'");
    while ($rowz = mysqli_fetch_row($resultz)) {

      $resulty = mysqli_query($link, "SELECT * FROM shortlist_master where  shortlistnameto='$rowz[1]' and appnumto=$rowx[4]");
      while ($rowy = mysqli_fetch_row($resulty)) {


        if ($rowx[33] == "DEPLOYED") {


          echo ' <tr> ';


          echo '  <td>  ' . $rowx[4] . '   </td> ';
          echo '  <td>  ' . $rowx[6] . '   </td> ';
          echo '  <td> ' . $rowx[7] . '   </td> ';
          echo '  <td> ' . $rowx[8] . '   </td> ';
          echo '  <td> ' . $rowx[24] . '   </td> ';
          echo '  <td> ' . $rowx[25] . '   </td> ';
          echo '  <td> ' . $rowx[26] . '   </td> ';
          echo '  <td> ' . $rowx[27] . '   </td> ';
          echo '  <td> ' . $rowx[28] . '   </td> ';
          echo '  <td> ' . $rowx[29] . '   </td> ';
          echo '  <td> ' . $rowx[30] . '   </td> ';
          echo '  <td> ' . $rowx[31] . '   </td> ';
          echo '  <td> ' . $rowx[14] . '   </td> ';
          echo '  <td> ' . $rowx[37] . '   </td> ';




          echo '  <td> ' . $rowy[1] . '   </td> ';
          echo '  <td> ' . $rowz[2] . '   </td> ';


          echo '<td> <form action = "" method = "POST">

                        <input type = "hidden" class="btn" name = "shadowdep" id = "shadowdep" value = "' . $rowx[4] . '">
                        <input type = "hidden" class="btn" name = "shashort"  value = "' . $rowy[1] . '">
                        <input type = "hidden" class="btn" name = "shaproject"  value = "' . $rowz[2] . '">
                        <input type = "hidden" class="btn" name = "shaclient"  value = "' . $rowz[3] . '">

                        <button type="button" name = "okna1"  class="button btn btn-success" style = "font-size:12;width:100px;height:60px">
                          <span class="glyphicon glyphicon-edit" >Deployed to ' . $rowx[34];
          '</span>
                        </button>


                             ';
          echo '</form></td>';
          echo ' </tr> 


 ';
        } elseif ($rowx[33] == "TERMINATED") {

          echo ' <tr> ';


          echo '  <td>  ' . $rowx[4] . '   </td> ';
          echo '  <td>  ' . $rowx[6] . '   </td> ';
          echo '  <td> ' . $rowx[7] . '   </td> ';
          echo '  <td> ' . $rowx[8] . '   </td> ';
          echo '  <td> ' . $rowx[24] . '   </td> ';
          echo '  <td> ' . $rowx[25] . '   </td> ';
          echo '  <td> ' . $rowx[26] . '   </td> ';
          echo '  <td> ' . $rowx[27] . '   </td> ';
          echo '  <td> ' . $rowx[28] . '   </td> ';
          echo '  <td> ' . $rowx[29] . '   </td> ';
          echo '  <td> ' . $rowx[30] . '   </td> ';
          echo '  <td> ' . $rowx[31] . '   </td> ';
          echo '  <td> ' . $rowx[14] . '   </td> ';
          echo '  <td> ' . $rowx[37] . '   </td> ';
          echo '  <td> ' . $rowy[1] . '   </td> ';
          echo '  <td> ' . $rowz[2] . '   </td> ';


          echo '<td> <form action = "" method = "POST">

                          <input type = "hidden" name = "shadowdep" id = "shadowdep" value = "' . $rowx[4] . '">
                          <input type = "hidden" name = "shashort"  value = "' . $rowy[1] . '">
                          <input type = "hidden" name = "shaproject"  value = "' . $rowz[2] . '">
                          <input type = "hidden" name = "shaclient"  value = "' . $rowz[3] . '">

                           <button type="button" name = "okna1"  class="button btn-success" style = "font-size:12;width:100px;height:60px">
                                                                <span class="glyphicon glyphicon-edit" >TERMNATED ' . $rowx[34];
          '</span>
                                                              </button>


                               ';
          echo '</form></td>';

          echo ' </tr> 

 ';
        } else {
          echo ' <tr> ';


          echo '  <td>  ' . $rowx[4] . '   </td> ';
          echo '  <td>  ' . $rowx[6] . '   </td> ';
          echo '  <td> ' . $rowx[7] . '   </td> ';
          echo '  <td> ' . $rowx[8] . '   </td> ';
          echo '  <td> ' . $rowx[24] . '   </td> ';
          echo '  <td> ' . $rowx[25] . '   </td> ';
          echo '  <td> ' . $rowx[26] . '   </td> ';
          echo '  <td> ' . $rowx[27] . '   </td> ';
          echo '  <td> ' . $rowx[28] . '   </td> ';
          echo '  <td> ' . $rowx[29] . '   </td> ';
          echo '  <td> ' . $rowx[30] . '   </td> ';
          echo '  <td> ' . $rowx[31] . '   </td> ';
          echo '  <td> ' . $rowx[14] . '   </td> ';
          echo '  <td> ' . $rowx[37] . '   </td> ';




          echo '  <td> ' . $rowy[1] . '   </td> ';
          echo '  <td> ' . $rowz[2] . '   </td> ';


          echo '<td> <form action = "" method = "POST">

                                        <input type = "hidden" name = "shadowdep" id = "shadowdep" value = "' . $rowx[4] . '">
                                        <input type = "hidden" name = "shashort"  value = "' . $rowy[1] . '">
                                        <input type = "hidden" name = "shaproject"  value = "' . $rowz[2] . '">
                                        <input type = "hidden" name = "shaclient"  value = "' . $rowz[3] . '">


                                          <button type="submit" name = "deploy"  class="button btn btn-info" style = "font-size:15;width:100px;height:30px">
                                            <span class="glyphicon glyphicon-edit" >Deploy</span>
                                          </button>

                                             ';
          echo '</form></td>';
          echo ' </tr> 


                                         ';
        }
      }
    }
  }
  echo '


     </tbody>
        </table> 

  

     




                  </div>
            <!--- laman -->
            
                </div> <!-- .content-wrapper -->
  
  ';
}


?>




<html lang="en">

<head>
  <meta charset="UTF-8">


  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
  <link rel="stylesheet" type="text/css" href="deo1.css">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Julius+Sans+One&family=Poppins&family=Quicksand&family=Roboto&family=Thasadith&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/style.css">

  <!--for data table-->
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <!-- Include Flatpickr JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style type="text/css">
    * {
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 0;
    }

    body {
      width: 100% !important;
    }

    #results {
      padding: 10px;
      border: 1px solid;
      background: #ccc;
    }

    .bs-example {
      margin: 20px;
    }

    img {
      border-radius: 8px;
    }

    .body50 {
      position: absolute;
      top: 0;
      left: 0%;
      border: 0px solid black;
      height: 100%;
      width: 50%;
    }

    .body5010p {
      position: absolute;
      top: 10%;
      left: 20%;
      border: 0px solid black;
      height: 90%;
      width: 60%;
    }

    .body5010p1 {
      position: absolute;
      top: 20%;
      left: 12%;
      border: 1px solid black;
      height: 80%;
      width: 60%;
    }

    .body5010p2 {
      position: absolute;
      top: 10%;
      left: 15%;
      border: 0px solid black;
      height: 10%;
      width: 80%;
    }

    .body5025p {
      position: absolute;
      top: 9%;
      left: 25%;
      border: 1px solid green;
      height: 30%;
      width: 50%;
    }

    .body5025p1 {
      position: absolute;
      top: 9%;
      left: 25%;
      border: 1px solid green;
      height: 30%;
      width: 80%;
    }

    .body60 {
      position: absolute;
      top: 0;
      left: 50%;
      border: 5px solid black;
      height: 100%;
      width: 50%;
    }

    .body6010p {
      position: absolute;
      top: 10%;
      left: 20%;
      border: 5px solid black;
      height: 90%;
      width: 60%;
    }

    th {
      text-align: center;
    }

    table {
      border: 1px solid black !important;
      font-size: 12px;
    }

    .table td,
    .table th {
      padding: 0 .3rem;
    }

    table tr td {
      padding-top: .1rem !important;
      padding-bottom: 0rem !important;

    }

    table thead tr th {
      background: whitesmoke !important;
    }
  </style>
  <title>HRS DEPLOYMENT</title>
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
  } ?>
  <?php
  if (isset($_SESSION['warningMessage'])) { ?>
    <script>
      Swal.fire({
        icon: 'warning',
        title: "<?php echo $_SESSION['warningMessage']; ?>",
      })
    </script>
  <?php unset($_SESSION['warningMessage']);
  } ?>
  
   <?php echo '
                                          <header class="cd-main-header js-cd-main-header">
                                                            <div class="cd-logo-wrapper">
                                                              <a href="#0" class="cd-logo"><img src="assets/img/pcnlogo1.png" alt="Logo"></a>
                                                            </div>
                                                            
                                                                      <div class=" js-cd-search">
                                                                        <form>

                                                                         <!-- <input class="reset" type="search" placeholder="Search...">-->
                                                                        </form>
                                                                      </div>
                                         
                                                     <button class="reset cd-nav-trigger js-cd-nav-trigger" aria-label="Toggle menu"><span></span></button>
                                          
                                                                <ul class="cd-nav__list js-cd-nav__list">

                                                                                      <!--<li class="cd-nav__item"><a href="#0">Tour</a></li>
                                                                                      <li class="cd-nav__item"><a href="#0">Support</a></li>
                                                                                      -->
                                                                                      <li class="cd-nav__item cd-nav__item--has-children cd-nav__item--account js-cd-item--has-children">

                                                                                                        <a href="">
                                                                                                          <img src="assets/img/cd-avatar.svg" alt="avatar">
                                                                                                          <span>Account</span>
                                                                                                        </a>
                                                                                                        <form action = "" method = "POST">
                                                                                                                        <ul class="cd-nav__sub-list">
                                                                                                                         <!-- <li class="cd-nav__sub-item"><a href="#0">My Account</a></li>
                                                                                                                          <li class="cd-nav__sub-item"><a href="#0">Edit Account</a></li>-->
                                                                                                                          <li class="cd-nav__sub-item"><BUTTON class="button2" name = "to_index" style="font-size:14; width:98%;height:50px">Log out</button></li>
                                                                                                                           </ul>
                                                                                                                        </form>
                                                                                                                      </li>
                                                                </ul>

                                          </header> <!-- .cd-main-header -->
                                          
                                          <main class="cd-main-content" style="width: 100%;">
                                            <nav class="cd-side-nav js-cd-side-nav">
                                                    <ul class="cd-side__list js-cd-side__list">
                                                      <!--<li class="cd-side__label"><span>DEPLOYEMNT</span></li>-->
                                                              <li class="cd-side__item cd-side__item--has-children cd-side__item--overview js-cd-item--has-children">
                                                                <!--<a href="#0">Overview</a>-->
                                                                
                                                                        <ul class="cd-side__sub-list">
                                                                       <!--   <li class="cd-side__sub-item"><a href="#0">All Data</a></li>
                                                                          <li class="cd-side__sub-item"><a href="#0">Category 1</a></li>
                                                                          <li class="cd-side__sub-item"><a href="#0">Category 2</a></li>
                                                                        -->
                                                                        </ul>
                                                              </li>

                                                              <li class="cd-side__item cd-side__item--has-children cd-side__item--notifications cd-side__item--selected js-cd-item--has-children">
                                                                    <!--          <a href="#0">Notifications<span class="cd-count">3</span></a>-->
                                                                              
                                                                              <ul class="cd-side__sub-list">
                                                                                <!--<li class="cd-side__sub-item"><a aria-current="page" href="">All Notifications</a></li>-->
                                                                                <!--<li class="cd-side__sub-item"><a href="">Recruitment Request</a></li>-->
                                                                                <!--<li class="cd-side__sub-item"><a href="">Shortlist Request</a></li>-->
                                                                              </ul>
                                                              </li>
                                                  
                                                                      <li class="cd-side__item cd-side__item--has-children cd-side__item--comments js-cd-item--has-children">
                                                                              <!--<a href="#0">Comments</a>-->
                                                                              
                                                                              <ul class="cd-side__sub-list">
                                                                             <!--   <li class="cd-side__sub-item"><a href="#0">All Comments</a></li>
                                                                                <li class="cd-side__sub-item"><a href="#0">Edit Comment</a></li>
                                                                                <li class="cd-side__sub-item"><a href="#0">Delete Comment</a></li>
                                                                              -->
                                                                              </ul>
                                                                      </li>
                                                    </ul>
                                            
                                              <ul class="cd-side__list js-cd-side__list">
                                                      <li class="cd-side__label" style="font-size:26"><span>DEPLOYMENT MENU</span></li>
                                                      <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children">
                                                              <a href="">REPORTS</a>
                                                              
                                                              <ul class="cd-side__sub-list">
                                                            
                                                               <form action = "" method = "POST">
                                                                <li class="cd-side__btn"><BUTTON class="btn" name = "viewdatabase" style="font-size:14; width:150px;height:50px">Presently Deployed</button></li>    
                                                                </form>

                                                               <li class="cd-side__btn"><button class="btn" data-bs-toggle="modal" data-bs-target="#myModaldephistory" style="font-size:14; width:150px;height:50px">Employee History</button></li>  
                                        						<li class="cd-side__btn"><button class="btn" data-bs-toggle="modal" data-bs-target="#myModalprojecthistory" style="font-size:14; width:150px;height:50px">Project History</button></li>  


                                                              </ul>


                                                      </li>

                                         <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children">
                                                              <!--<a href="">DOLE REPORTS</a>-->
                                                              
                                                              <ul class="cd-side__sub-list">
                                                            
                                                               <form action = "" method = "POST">
                                                                <li class="cd-side__btn"><BUTTON class="btn" name = "summarygender" style="font-size:14; width:150px;height:50px">Gender</button></li>    
                                                                </form>
                                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModalgender" >+ Gender</button></li>

                                                               <li class="cd-side__btn"><button class="btn" data-bs-toggle="modal" data-bs-target="#myModaldephistory" style="font-size:14; width:150px;height:50px">Employee History</button></li>  
                                        						<li class="cd-side__btn"><button class="btn" data-bs-toggle="modal" data-bs-target="#myModalprojecthistory" style="font-size:14; width:150px;height:50px">Project History</button></li>  


                                                              </ul>


                                                      </li>

                                                  
                                              </ul>
                                                      
                                                        <ul class="cd-side__list js-cd-side__list">
                                                    
                                                          <form action = "" method = "POST">
                                                          <li class="cd-side__label"><span>DEPLOYMENT ACTION</span></li>

                                             <ul class="cd-side__list js-cd-side__list">
                                                      <!--<li class="cd-side__label" style="font-size:26"><span>SHORTLISTING MENU</span></li>-->
                                                      <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children">
                                                           <!--   <a href="">REPORTS</a>-->
                                                              
                                                              <ul class="cd-side__sub-list">
                                                                <form action = "" method = "POST">
                                                                <!--<li class="cd-side__sub-item"><a><BUTTON class="btn" name = "blacklistr">List of Blacklisted</button></a></li>-->
                                                               <!--<li class="cd-side__sub-item"><a><BUTTON class="btn" name = "viewdatabaseshort">View Database</button></a></li>-->
                                                               <!--<li class="cd-side__btn"><a><button type="button" class="btn" style="font-size:14; width:150px;height:50px" data-toggle="modal" data-target="#myModaladdshortview" >+ Shortlist Download</button></a></li>-->
                                                                <!--<li class="cd-side__sub-item"><a><BUTTON class="btn" name = "additionalr">Additional Repots</button></a></li>-->
                                                                <!--<li class="cd-side__btn"><a><BUTTON class="btn" name = "summary" style="font-size:14; width:150px;height:50px">+ Summary</button></a></li>     -->
                                                                </form>
                                                              </ul>
                                                      </li>

                                                              <li class="cd-side__item cd-side__item--has-children cd-side__item--images js-cd-item--has-children">
                                                                <!--<a href="#0">Images</a>-->
                                                                
                                                                <ul class="cd-side__sub-list">
                                                                  <!--<li class="cd-side__sub-item"><a href="#0">All Images</a></li>
                                                                  <li class="cd-side__sub-item"><a href="#0">Edit Image</a></li>

                                                                --> 
                                                                </ul>
                                                              </li>
                                                        
                                                            <li class="cd-side__item cd-side__item--has-children cd-side__item--users js-cd-item--has-children">
                                                            <!--  <a href="#0">Users</a>-->
                                                              
                                                              <ul class="cd-side__sub-list">
                                                                <!--
                                                                <li class="cd-side__sub-item"><a href="#0">All Users</a></li>
                                                                <li class="cd-side__sub-item"><a><BUTTON class="btn" name = "next1">Edit User</button></a></li>
                                                                <li class="cd-side__sub-item"><a><BUTTON class="btn" name = "next">Add User</button></a></li>
                                                                -->
                                                              </ul>
                                                            </li>
                                                  
                                              </ul>

                                                         </form>
                                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModalapp_print" ><i class="bi bi-printer" style="margin-right: .5rem !important"></i> Print an Entry</button></li>
                                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal_id" ><i class="bi bi-file-plus" style="margin-right: .5rem !important"></i> Create ID</button></li>
                                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal_LOA" ><i class="bi bi-person-lines-fill" style="margin-right: .5rem !important"></i> LOA</button></li>

                                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal_xletter" ><i class="bi bi-envelope" style="margin-right: .5rem !important"></i> Excuse Letter</button></li>
                                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModalter" ><i class="bi bi-terminal-x" style="margin-right: .5rem !important"></i> Terminate</button></li>
                                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModalres" ><i class="bi bi-person-x" style="margin-right: .5rem !important"></i> Resign</button></li>
                                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal_retrench" ><i class="bi bi-person-dash" style="margin-right: .5rem !important"></i> Retrench</button></li>
                                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal_float" ><i class="bi bi-person-up" style="margin-right: .5rem !important"></i> Float</button></li>

                                                         <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModalewb" ><i class="bi bi-layer-forward" style="margin-right: .5rem !important"></i> Forward to EWB</button></li>
                                                        <form action="" method="POST">
                                                          <li class="cd-side__btn"><button type="submit" name="deploymentbutton" class="btn" ><i class="bi bi-person" style="margin-right: 1rem;"></i> Deployment </button></li>
                                                        </form>
                                                        </ul>
                                                   
                                          


                                            </nav>

'; ?>
  
  



  <!--  <div class="body5010p2">

    <center>
      <form action="" method="POST" class="ro">
        <div class="form-groups">



          <div class="col-md-8">
            <select class="form-select" name="projchoiceto" style="height:45px;" required autofocus> ';

              <option>Select Project Title:</option>

              <?php
              $resultpro = mysqli_query($link, "SELECT * FROM projects order by project_title ASC");
              while ($rowpro = mysqli_fetch_array($resultpro)) {

                echo '<option  value="' . $rowpro[1] . '">' . $rowpro[1] . ' </option> 
                                               
                                                                   ';
              }
              ?>

            </select>
          </div>



          <div class="col-md-8 col-sm-12 mt-3">
            <select class="form-select" name="shortchoiceto" data-placeholder="" style="height:45px;" autofocus required> ';
              <option>Select Shortlist:</option>
              <?php
              $resultpro = mysqli_query($link, "SELECT * FROM shortlist_details WHERE activity ='ACTIVE' order by shortlistname ASC ");
              while ($rowpro = mysqli_fetch_array($resultpro)) {

                echo '<option  value="' . $rowpro[1] . '">' . $rowpro[1] . '  -- (' . $rowpro[2] . ') </option>';
              }
              ?>
            </select>
          </div>

          <div class="col-md-2 mt-3">
            <input type="submit" name="filter_shortlist" value="Filter" class="button btn btn-success" style="font-size:15;width:80px;height: 50px; float: left;">
          </div>

        </div>
      </form>
    </center>
  </div> -->

  <?php
  if (isset($_POST['deploymentbutton'])) {
  ?>
    <div class="cd-content-wrapper">
      <div class="text-component text-center">
        <div class="container-fluid">
          <h2 class="fs-2">Shortlisted Applicants</h2>
          <br><br>
          <table id="example1" class="table table-striped table-sm align-middle mb-2 bg-white p-4 bg-opacity-10 border border-secondary border-start-0 border-end-0 rounded-end" style="width:100%; font-size: 14px;">
            <thead>
              <tr>
                <th>ID</th>
                <th>Project Name</th>
                <th>Shortlist Title</th>
                <th>Quantity</th>
                <th>Date Start</th>
                <th>Date End</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php


              $query = "SELECT project.*, shortlist.* 
                FROM projects project, shortlist_details shortlist 
                WHERE shortlist.project_id = project.id 
                AND status = '1' AND is_deleted = '0'";
              $result = $link->query($query);
              while ($row = mysqli_fetch_assoc($result)) {
                $project_name = $row['project_title'];
                $start_date = $row['start_date'];
                $end_date = $row['end_date'];
                $timestamp_start_date = strtotime($start_date);
                $timestamp_end_date = strtotime($end_date);
                $formattedDate_start_date = date("F d, Y", $timestamp_start_date);
                $formattedDate_end_date = date("F d, Y", $timestamp_end_date);
              ?>
                <tr>
                  <td><?php echo $row['id'] ?></td>
                  <td><?php echo $row['project_title'] ?></td>
                  <td><?php echo $row['shortlistname']; ?></td>
                  <td><?php echo $row['ewb_count'] ?></td>
                  <td>
                    <?php
                    if ($row['start_date'] !== NULL) {
                      echo $formattedDate_start_date;
                    } else {
                      echo "";
                    }
                    ?>
                  </td>
                  <td><?php
                      if ($row['end_date'] !== NULL) {
                        echo $formattedDate_end_date;
                      } else {
                        echo "";
                      }
                      ?></td>
                  <td>
                    <form action="" method="POST">
                      <input type="hidden" name="shortlist_id" value="<?php echo $row['shortlistname'] ?>">
                      <button type="submit" name="view-shortlists" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View Details"><i class="bi bi-search"></i></button>
                    </form>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  <?php
  }
  ?>

  <?php
  if (isset($_POST['view-shortlists'])) {
    $shortlist_id = $_POST['shortlist_id'];
    $_SESSION['shortlist_title'] = $_POST['shortlist_id'];
  ?>
    <div class="cd-content-wrapper">
      <div class="text-component text-center">
        <h2 class="fs-2">Deploy (<?php echo $shortlist_id ?>)</h2>
        <div class="container-fluid">
          <br><br>
          <table class="table table-striped table-sm align-middle mb-0 bg-white bg-opacity-10 border border-secondary border-start-0 border-end-0 rounded-end" style="width:100%; font-size: 13px !important;" id="example1">
            <thead>
              <tr>
                <th>ID</th>
                <th>Applicant Number</th>
                <th>Name</th>
                <th>SSS</th>
                <th>Pag-IBIG</th>
                <th>PhilHealth</th>
                <th>TIN</th>
                <th>Birthday</th>
                <th>Contact Number</th>
                <th>Start of Contract</th>
                <th>End of Contract</th>
                <th>Employment status</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $queries = "SELECT shortlist.*, employee.* 
              FROM shortlist_master shortlist, employees employee
              WHERE shortlist.employee_id = employee.id 
              AND shortlistnameto = '$shortlist_id'";
              $results = $link->query($queries);

              while ($rows = $results->fetch_assoc()) {
                $birthday = $rows['birthday'];
                $timestamp_birthday = strtotime($birthday);
                $formattedDate_birthday = date("F d, Y", $timestamp_birthday);
              ?>
                <tr>
                  <td><?php echo $rows['id'] ?></td>
                  <td><?php echo $rows['appno'] ?></td>
                  <td><?php echo $rows['lastnameko'], ", " . $rows['firstnameko'] . " " . $rows['mnko'] ?></td>
                  <td><?php echo $rows['sssnum'] ?></td>
                  <td><?php echo $rows['pagibignum'] ?></td>
                  <td><?php echo $rows['phnum'] ?></td>
                  <td><?php echo $rows['tinnum'] ?></td>
                  <td><?php echo $formattedDate_birthday ?></td>
                  <td><?php echo $rows['cpnum'] ?></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><?php echo $rows['ewbdeploy'] ?></td>
                  <td><?php echo $rows['remarks'] ?></td>
                  <td>
                    <?php if (!empty($rows['ewb_status'])) { ?>
                      <button type="button" name="deploy" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deployModal-<?php echo $rows['id'] ?>">Not empty</button>
                    <?php } else { ?>
                      <button type="button" name="deploy" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deployModal-<?php echo $rows['id'] ?>" style="visibility: hidden !important;">Not empty</button>
                    <?php } ?>
                  </td>


                  <!-- Modal for Deployment form -->
                  <div class="modal fade" id="deployModal-<?php echo $rows['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-2" id="exampleModalLabel">LOA</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="container-fluid">
                            <form action="action.php" method="POST">
                              <?php
                              $id =  $rows['id'];
                              $data = $_SESSION['shortlist_title'];

                              $query_show = "SELECT shortlist.*, employee.* 
                              FROM shortlist_master shortlist, employees employee
                              WHERE shortlist.employee_id = employee.id 
                              AND shortlistnameto = '$data' AND employee.id = '$id'";
                              $query_result = $link->query($query_show);
                              while ($query_row = $query_result->fetch_assoc()) {
                              ?>

                              <input type="hidden" name="id" value="<?php echo $query_row["id"]?>"/>
                              <input type="hidden" name="shortlist_title" value="<?php echo $data?>"/>
                             
                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Status</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" name="status" id="status" class="form-control" value="DEPLOYED" disabled>
                                  </div>
                                </div>

                                <div class="row mt-3 form-group">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">LOA Start Date</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="date" name="start_loa" id="myDate" placeholder="Select a date" class="form-control" required>
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">LOA End Date</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="date" name="end_loa" id="myDate" placeholder="Select a date" class="form-control" required>
                                  </div>
                                </div>
                                <?php 
                                  $shortlist_title = $query_row['shortlistnameto'];
                                  $queries = "SELECT * FROM shortlist_details WHERE shortlistname = '$shortlist_title'";
                                  $result_queries = $link->query($queries);
                                  while($fetch_row = $result_queries->fetch_assoc()){
                                    $project_title = $fetch_row['project'];
                                    $mrf_tracking = $fetch_row['mrf_tracking'];
                                ?>
                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Division</label>
                                  </div>
                                  <div class="col-md-9">
                                      <?php 
                                        $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                        $mrf_result = $link->query($mrf_query);
                                        while($mrf_row = $mrf_result->fetch_assoc()){
                                      ?>
                                      <input type="text" name="division" id="division" class="form-control" value="<?php echo $mrf_row['division']?>" disabled>
                                      <?php }?>
                                    </select>
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Category</label>
                                  </div>
                                  <div class="col-md-9">
                                    <select name="category" id="category" class="form-select" required>
                                      <option value="">Select</option>
                                      <?php
                                        $querys = "SELECT * FROM categories";
                                        $results = $link->query($querys);
                                        while($rowsss = $results->fetch_assoc()){ 
                                      ?>
                                      <option value="<?php echo $rowsss['description']?>"><?php echo $rowsss['description']?></option>
                                      <?php }?>
                                    </select>
                                  </div>
                                </div>
                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Locator</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" name="locator" id="locator" class="form-control" disabled>
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Place Assigned</label>
                                  </div>
                                  <div class="col-md-9">
                                    <?php 
                                      $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                      $mrf_result = $link->query($mrf_query);
                                        while($mrf_row = $mrf_result->fetch_assoc()){
                                    ?>
                                    <input type="text" name="place_assigned" id="place_assigned" value="<?php echo $mrf_row['project_title']?>" class="form-control" disabled>
                                    <?php }?>
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Address Assigned</label>
                                  </div>
                                  <div class="col-md-9">
                                    <?php 
                                      $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                      $mrf_result = $link->query($mrf_query);
                                        while($mrf_row = $mrf_result->fetch_assoc()){
                                    ?>
                                    <input type="text" name="address_assigned" id="address_assigned" value="<?php echo $mrf_row['client_address']?>" class="form-control" disabled>
                                    <?php }?>
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Channel</label>
                                  </div>
                                  <div class="col-md-9">
                                    <select name="channel" id="channel" class="form-select" required>
                                      <option value="">Select</option>
                                      <?php 
                                        $channel_query = "SELECT * FROM channels";
                                        $channel_result = $link->query($channel_query);
                                        while($channel_rows = $channel_result->fetch_assoc()) {
                                      ?>
                                      <option value="<?php echo $channel_rows['description']?>"><?php echo $channel_rows['description']?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Department</label>
                                  </div>
                                  <div class="col-md-9">
                                    <select name="department" id="department" class="form-select" required>
                                      <option value="">Select</option>
                                      <?php 
                                        $mrf_query = "SELECT * FROM department";
                                        $mrf_result = $link->query($mrf_query);
                                        while($mrf_row = $mrf_result->fetch_assoc()){
                                      ?>
                                      <option value="<?php echo $mrf_row['description']?>"><?php echo $mrf_row['description']?></option>
                                      <?php }?>
                                    </select>
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Employment Status</label>
                                  </div>
                                  <div class="col-md-9">
                                    <select name="employment_status" id="employment_status" class="form-select" required>
                                    <?php 
                                      $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                      $mrf_result = $link->query($mrf_query);
                                        while($mrf_row = $mrf_result->fetch_assoc()){
                                          $status = ucwords(strtolower($mrf_row['employment_stat']));
                                    ?>
                                      <option value="<?php echo ucfirst($mrf_row['employment_stat']); ?>"><?php echo $status; ?></option>
                                    <?php }?>
                                    <?php 
                                      $emp_query = "SELECT * FROM employment_status";
                                      $emp_result = $link->query($emp_query);
                                        while($emp_row = $emp_result->fetch_assoc()){
                                    ?>
                                      <option value="<?php echo $emp_row['name']?>"><?php echo $emp_row['name']?></option>
                                      <?php }?>
                                    </select>
                                    
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Job Title</label>
                                  </div>
                                  <div class="col-md-9">
                                    <select name="job_title" id="job_title" class="form-select" required>
                                    <?php 
                                      $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                      $mrf_result = $link->query($mrf_query);
                                        while($mrf_row = $mrf_result->fetch_assoc()){
                                    ?>
                                      <option value="<?php echo $mrf_row['position']?>"><?php echo $mrf_row['position']?></option>
                                    <?php }?>
                                    <?php 
                                      $job_title_query = "SELECT * FROM job_title";
                                      $job_title_result = $link->query($job_title_query);
                                        while($job_title_row = $job_title_result->fetch_assoc()){
                                    ?>
                                      <option value="<?php echo $job_title_row['description']?>"><?php echo $job_title_row['description']?></option>
                                    <?php }?>
                                    </select>
                                 
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">LOA Template</label>
                                  </div>
                                  <div class="col-md-9">
                                    <select name="loa_template" id="loa_template" class="form-select" required>
                                      <option value="">Select</option>
                                      <?php 
                                        $select_loa = "SELECT loa_main.*, loa_files.*
                                        FROM loa_maintenance_word loa_main, loa_files loa_files
                                        WHERE loa_files.loa_main_id = loa_main.id AND status = '1'";
                                        $seleted_loa_result = $link->query($select_loa);
                                        while($selected_loa_row = $seleted_loa_result->fetch_assoc()){
                                      ?>
                                      <option value="<?php echo $selected_loa_row['file_name']?>"><?php echo $selected_loa_row['loa_name']?></option>
                                      <?php }?>
                                    </select>
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Basic Salary</label>
                                  </div>
                                  <div class="col-md-9">
                                    <?php 
                                      $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                      $mrf_result = $link->query($mrf_query);
                                        while($mrf_row = $mrf_result->fetch_assoc()){
                                    ?>
                                    <input type="text" name="basic_salary" id="basic_salary" class="form-control" value="<?php echo $mrf_row['basic_salary']?>" required>
                                    <?php }?>
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Ecola</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" name="ecola" id="ecola" class="form-control">
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Communication Allowance</label>
                                  </div>
                                  <div class="col-md-9">
                                    <?php 
                                      $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                      $mrf_result = $link->query($mrf_query);
                                        while($mrf_row = $mrf_result->fetch_assoc()){
                                    ?>
                                    <input type="text" name="communication_allowance" id="communication_allowance" class="form-control" value="<?php echo $mrf_row['comm']?>">
                                    <?php }?>
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Transportation</label>
                                  </div>
                                  <div class="col-md-9">
                                    <?php 
                                      $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                      $mrf_result = $link->query($mrf_query);
                                        while($mrf_row = $mrf_result->fetch_assoc()){
                                    ?>
                                    <input type="text" name="transportation_allowance" id="transportation_allowance" class="form-control" value="<?php echo $mrf_row['transpo']?>">
                                    <?php }?>
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Internet Allowance</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" name="internet_allowance" id="internet_allowance" class="form-control">
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Meal Allowance</label>
                                  </div>
                                  <div class="col-md-9">
                                  <?php 
                                      $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                      $mrf_result = $link->query($mrf_query);
                                        while($mrf_row = $mrf_result->fetch_assoc()){
                                    ?>
                                    <input type="text" name="meal_allowance" id="meal_allowance" class="form-control" value="<?php echo $mrf_row['meal']?>">
                                    <?php }?>
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Outbase Meal</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" name="outbase_meal" id="outbase_meal" class="form-control">
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Special Allowance</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" name="special_allowance" id="special_allowance" class="form-control">
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Position Allowance</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" name="position_allowance" id="position_allowance" class="form-control">
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Deployment Remarks</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" name="deployment_remarks" id="deplyment_remarks" class="form-control">
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">No. of Days work</label>
                                  </div>
                                  <div class="col-md-9">
                                    <?php 
                                      $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                      $mrf_result = $link->query($mrf_query);
                                        while($mrf_row = $mrf_result->fetch_assoc()){
                                    ?>
                                    <input type="text" name="no_of_days" id="no_of_days" class="form-control" value="<?php echo $mrf_row['work_days']?>">
                                    <?php }?>
                                  </div>
                                </div>
                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Outlet</label>
                                  </div>
                                  <div class="col-md-9">
                                    <?php 
                                      $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                                      $mrf_result = $link->query($mrf_query);
                                        while($mrf_row = $mrf_result->fetch_assoc()){
                                    ?>
                                    <input type="text" name="outlet" id="outlet" class="form-control" value="<?php echo $mrf_row['outlet']?>">
                                    <?php }?>
                                  </div>
                                </div>
                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Supervisor</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" name="supervisor" id="supervisor" class="form-control">
                                  </div>
                                </div>
                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Field Supervisor</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" name="field_supervisor" id="field_supervisor" class="form-control">
                                  </div>
                                </div>
                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Designation</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" name="field_supervisor_designation" id="field_supervisor_designation" class="form-control">
                                  </div>
                                </div>
                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Deployment Personnel</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" name="deployment_personnel" id="deployment_personnel" class="form-control">
                                  </div>
                                </div>
                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Designation</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" name="deployment_personnel_designation" id="deployment_personnel_designation" class="form-control">
                                  </div>
                                </div>
                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Project Supervisor</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" name="project_supervisor" id="project_supervisor" class="form-control">
                                  </div>
                                </div>
                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Designation</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" name="project_supervisor_designation" id="project_supervisor_designation" class="form-control">
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Head</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" name="head" id="head" class="form-control">
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">Designation</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" name="head_designation" id="head_designation" class="form-control">
                                  </div>
                                </div>

                                <div class="row mt-3">
                                  <div class="col-md-3">
                                    <label for="" class="form-label">ID#</label>
                                  </div>
                                  <div class="col-md-9">
                                    <input type="text" name="id" id="id" class="form-control">
                                  </div>
                                </div>

                              <?php } }?>

                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="create_loa">Save changes</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>

                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <?php  }
  ?>

  <!-- Modal -->
  <div class="modal fade" id="myModalewb" role="dialog">
    <div class="modal-dialog"> <!--//sm,med, lg , xl-->
      <div class="modal-content">
        <div class="modal-header">
          <label for="text">
            <font color="Black">
              <font color="red">*</font>Select Shortlist Title:
            </font>
          </label>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          <br>
        </div>
        <div class="modal-body">
          <form action="" method="POST"><br>
            <div class="form-group">
              <center>
                <select class="form-select" name="shortlisttitle1del" data-placeholder=""> ;
                  <option>Select shortlist Name:</option>
                  <?php
                    $resultpro = mysqli_query($link, "SELECT * FROM shortlist_details WHERE activity ='ACTIVE' order by shortlistname ASC ");
                    while ($rowpro = mysqli_fetch_array($resultpro)) {
                      echo '<option  value="' . $rowpro[1] . '">' . $rowpro[1] . '(' . $rowpro[2] . ') </option>';
                    }
                  ?>
                </select>
              </center>
            </div>
            <div class="modal-footer">
              <input type="submit" name="addappdel1" value="Okay" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
              <input type="button" name="Cancelko" value="Close" data-bs-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
          </form>
        </div>
      </div><!--div for body-->
    </div>
  </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="myModaldephistory" role="dialog">
    <div class="modal-dialog"> <!--//sm,med, lg , xl-->
      <div class="modal-content">
        <div class="modal-header">
          <label for="text">
            <font color="Black">
              <font color="red">*</font>Select Employee name:
            </font>
          </label>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          <br>
        </div>
        <div class="modal-body">
          <form action="" method="POST"><br>
            <div class="form-group">
              <!--<label> Project  Title : </label>-->
              <center>
                <select class="form-select" name="empno" data-placeholder=""> ;
                  <option>Select Employee Name:</option>
                  <?php
                    $resultpro1 = mysqli_query($link, "SELECT * FROM deployment_history group by appno_d order by appno_d ASC ");
                    while ($rowpro1 = mysqli_fetch_array($resultpro1)) {
                      $resultpro2 = mysqli_query($link, "SELECT * FROM employees where appno='$rowpro1[5]' ");
                      while ($rowpro2 = mysqli_fetch_array($resultpro2)) {
                        echo '<option  value="' . $rowpro1[5] . '">' . $rowpro2[6] . ", " . $rowpro2[7] . " " . $rowpro2[8] . ' </option>';
                      }
                    }
                  ?>
                </select>
              </center>
            </div>
            <div class="modal-footer">
              <input type="submit" name="viewhistory" value="Search" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
              <input type="button" name="Cancelko" value="Close" data-bs-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
          </form>
        </div>
      </div><!--div for body-->
    </div>
  </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModalprojecthistory" role="dialog">
    <div class="modal-dialog"> <!--//sm,med, lg , xl-->
      <div class="modal-content">
        <div class="modal-header">
          <label for="text">
            <font color="Black">
              <font color="red">*</font>Select Project name:
            </font>
          </label>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          <br>
        </div>
        <div class="modal-body">
          <form action="" method="POST"><br>
            <div class="form-group">
              <center>
                <select class="form-select" name="project_name" data-placeholder=""> ;
                  <option>Select Project Name:</option>
                  <?php
                  $resultpro1 = mysqli_query($link, "SELECT * FROM deployment_history group by project_d order by project_d ASC ");
                  while ($rowpro1 = mysqli_fetch_array($resultpro1)) {
                    $resultpro2 = mysqli_query($link, "SELECT * FROM employees where appno='$rowpro1[5]' ");
                    while ($rowpro2 = mysqli_fetch_array($resultpro2)) {
                      echo '<option  value="' . $rowpro1[3] . '">' . $rowpro1[3] . ' </option>';
                    }
                  }
                  ?>
                </select>
              </center>
            </div>
            <div class="modal-footer">
              <input type="submit" name="viewhistoryproject" value="Search" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
              <input type="button" name="Cancelko" value="Close" data-bs-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="myModalapp_print" role="dialog">
    <div class="modal-dialog"> <!--//sm,med, lg , xl-->
      <div class="modal-content">
        <div class="modal-header">
          <label for="text">
            <font color="Black">
              <font color="red">*</font>Select Active Employee:
            </font>
          </label>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          <br>
        </div>
        <div class="modal-body">
          <form action="" method="POST"><br>
            <div class="form-group">
              <center>
                <select class="form-select" name="applicant_no">
                  <option>Select Employee Name:</option>
                  <?php
                  $resultpro = mysqli_query($link, "SELECT * FROM deployment WHERE is_deleted !='1'");
                  while ($rowpro = mysqli_fetch_array($resultpro)) {
                    $resultpro1 = mysqli_query($link, "SELECT * FROM employees WHERE appno ='$rowpro[5]'");
                    while ($rowpro1 = mysqli_fetch_array($resultpro1)) {
                      echo '<option  value="' . $rowpro1[4] . '">' . $rowpro1[6] . ", " . $rowpro1[7] . " " . $rowpro1[8] . ') </option> ';
                    }
                  }
                  ?>
                </select>
              </center>
            </div>
            <div class="modal-footer">
              <input type="submit" name="printemp" value="Okay" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
              <input type="button" name="Cancelko" value="Close" data-bs-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal_id" role="dialog">
    <div class="modal-dialog"> 
      <div class="modal-content">
        <div class="modal-header">
          <label for="text">
            <font color="Black">
              <font color="red">*</font>Select Active Employee:
            </font>
          </label>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          <br>
        </div>
        <div class="modal-body">
          <form action="" method="POST"><br>
            <div class="form-group">
              <center>
                <select class="form-select" name="applicant_no" data-placeholder=""> ;
                  <option>Select Employee Name:</option>
                  <?php
                  $resultpro = mysqli_query($link, "SELECT * FROM deployment WHERE is_deleted !='1'");
                  while ($rowpro = mysqli_fetch_array($resultpro)) {
                    $resultpro1 = mysqli_query($link, "SELECT * FROM employees WHERE appno ='$rowpro[5]'");
                    while ($rowpro1 = mysqli_fetch_array($resultpro1)) {
                      echo '<option  value="' . $rowpro1[4] . '">' . $rowpro1[6] . ", " . $rowpro1[7] . " " . $rowpro1[8] . ') </option>';
                    }
                  }
                  ?>
                </select>
              </center>
            </div>
            <div class="modal-footer">
              <input type="submit" name="id1" value="Okay" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
              <input type="button" name="Cancelko" value="Close" data-bs-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="myModal_LOA" role="dialog">
    <div class="modal-dialog"> <!--//sm,med, lg , xl-->
      <div class="modal-content">
        <div class="modal-header">
          <label for="text">
            <font color="Black">
              <font color="red">*</font>Select Active Employee:
            </font>
          </label>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          <br>
        </div>
        <div class="modal-body">
          <form action="" method="POST"><br>
            <div class="form-group">
              <center>
                <select class="form-select" name="applicant_no" data-placeholder=""> ;
                  <option>Select Employee Name:</option>
                  <?php
                    $resultpro = mysqli_query($link, "SELECT * FROM deployment WHERE is_deleted != '1'");
                    while ($rowpro = mysqli_fetch_assoc($resultpro)) {
                      $appno = $rowpro["appno"];
                      $resultpro1 = mysqli_query($link, "SELECT * FROM employees WHERE appno ='$appno'");
                      while ($rowpro1 = mysqli_fetch_assoc($resultpro1)) {

                        echo '<option  value="' . $rowpro1['appno'] . '">' . $rowpro1['lastnameko'] . ", " . $rowpro1['firstnameko'] . " " . $rowpro1['mnko'] . ') </option> 
                                                                        ';
                      }
                    }
                  ?>
                </select>
              </center>
            </div>
            <div class="modal-footer">

              <input type="submit" name="xletter" value="Okay" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
              <input type="button" name="Cancelko" value="Close" data-bs-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
          </form>

        </div>

      </div><!--div for body-->

    </div>
  </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal_xletter" role="dialog">
    <div class="modal-dialog"> <!--//sm,med, lg , xl-->
      <div class="modal-content">

        <div class="modal-header">
          <label for="text">
            <font color="Black">
              <font color="red">*</font>Select Active Employee:
            </font>
          </label>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          <br>
        </div>

        <div class="modal-body">


          <form action="" method="POST"><br>

            <center>
              <div class="form-group">
                <!--<label> Project  Title : </label>-->

                <select class="form-select" name="applicant_no" data-placeholder=""> ;
                  <option>Select Employee Name:</option>
                  <?php

                  $resultpro = mysqli_query($link, "SELECT * FROM deployment WHERE is_deleted !='1'");
                  while ($rowpro = mysqli_fetch_array($resultpro)) {
                    $resultpro1 = mysqli_query($link, "SELECT * FROM employees WHERE appno ='$rowpro[5]'");
                    while ($rowpro1 = mysqli_fetch_array($resultpro1)) {



                      echo '<option  value="' . $rowpro1[4] . '">' . $rowpro1[6] . ", " . $rowpro1[7] . " " . $rowpro1[8] . ') </option> 
                                                   
                                                                       ';
                    }
                  }
                  ?>


                </select>
                <br>
              </div>
              <div class="form-group">
                <label class="form-label" style="float: left;">Reason of excuse:</label>
                <input type="text" name="reason_x" class="form-control" placeholder="">
              </div>


            </center>






            <div class="modal-footer">

              <input type="submit" name="xletter1" value="Okay" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
              <input type="button" name="Cancelko" value="Close" data-bs-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
          </form>

        </div>

      </div><!--div for body-->

    </div>
  </div>
  </div>





  <!-- Modal -->
  <div class="modal fade" id="myModalgender" role="dialog">
    <div class="modal-dialog"> <!--//sm,med, lg , xl-->
      <div class="modal-content">

        <div class="modal-header">
          <label for="text">
            <font color="Black">
              <font color="red">*</font>Database Gender Breakdown:
            </font>
          </label>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          <br>
        </div>

        <div class="modal-body">


          <form action="" method="POST"><br>



            <table id="example" class="table" style="width:100%">
              <thead>
                <tr>
                  <th> Gender </th>

                  <th> Manpower Count </th>

                </tr>
              </thead>

              <tbody>


                <?php



                $resultdis = mysqli_query($link, "SELECT count(distinct deployment_history.appno_d, employees.gendern) FROM deployment_history INNER JOIN employees ON deployment_history.appno_d = employees.appno  where gendern='MALE'");
                while ($rowdis = mysqli_fetch_array($resultdis)) {


                  echo ' <tr> ';

                  echo ' <td> MALE </td>';
                  echo '  <td>  ' . $rowdis[0] . '   </td> ';
                }
                echo ' </tr> ';




                $resultdis = mysqli_query($link, "SELECT count(distinct deployment_history.appno_d, employees.gendern) FROM deployment_history INNER JOIN employees ON deployment_history.appno_d = employees.appno  where gendern='FEMALE'");
                while ($rowdis = mysqli_fetch_array($resultdis)) {


                  echo ' <tr> ';

                  echo ' <td> FEMALE </td>';
                  echo '  <td>  ' . $rowdis[0] . '   </td> ';
                }
                echo ' </tr> ';




                ?>



              </tbody>
            </table>






        </div>
        ';



        <div class="modal-footer">

          <!--<input type = "submit" name = "printemp" value = "Okay" class="btn btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px">-->
          <input type="button" name="Cancelko" value="Close" data-bs-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
          </form>

        </div>

      </div><!--div for body-->

    </div>
  </div>
  </div>






  <!-- Modal -->
  <div class="modal fade" id="myModalter" role="dialog">
    <div class="modal-dialog"> <!--//sm,med, lg , xl-->
      <div class="modal-content">

        <div class="modal-header">
          <label for="text">
            <font color="Black">
              <font color="red">*</font>Terminate Active Employee:
            </font>
          </label>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

        </div>

        <div class="modal-body">


          <form action="" method="POST">

            <div class="form-group">
              <label class="form-label">Select Employees</label>
              <select class="form-select" name="X" id="X" data-placeholder=""> ';
                <?php
                echo '<option>Select Employee</option> ';
                $resultpro = mysqli_query($link, "SELECT * FROM deployment WHERE is_deleted !='1'");
                while ($rowpro = mysqli_fetch_array($resultpro)) {
                  $resultpro1 = mysqli_query($link, "SELECT * FROM employees WHERE appno ='$rowpro[5]'  and ter_date='' and res_date='' ");
                  while ($rowpro1 = mysqli_fetch_array($resultpro1)) {
                    echo '<option  value="' . $rowpro1[4] . '">' . $rowpro1[6] . ", " . $rowpro1[7] . " " . $rowpro1[8] . ') </option>';
                  }
                }
                ?>
              </select>
            </div>

            <div class="form-group mt-3">
              <label class="form-label">Reason of Termination:</font></label>
              <input type="text" name="ter_reason" value="" class="form-control" placeholder="">
            </div>


            <div class="form-group mt-3">
              <label class="form-label">Effectivity Date:</font></label>
              <input type="date" name="ter_date" value="" class="form-control" placeholder="">
            </div>
            <br>



            <label class="form-label mt-4">=====================</font></label><br>
            <label class="form-label">Employee Info:</font></label><br>
            <label class="form-label">=====================</font></label>

            <div class="form-group mt-3">
              <label class="form-label"> Employment Coverage : </label>
              <select class="form-control" name="Y1" id="Y1" data-placeholder="" disabled> ;

              </select>

            </div>
            <div class="form-group mt-3">
              <label class="form-label"> Project Deployed : </label>
              <select class="form-control" name="Y2" id="Y2" data-placeholder="" disabled> ;

              </select>
            </div>



            <div class="modal-footer">


              <input type="submit" name="teremp" value="Terminate" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
              <input type="button" name="Cancelko" value="Close" data-bs-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
          </form>

        </div>

      </div><!--div for body-->

    </div>
  </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="myModalres" role="dialog">
    <div class="modal-dialog"> <!--//sm,med, lg , xl-->
      <div class="modal-content">

        <div class="modal-header">
          <label for="text">
            <font color="Black">
              <font color="red">*</font>Resign Active Employee:
            </font>
          </label>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

        </div>

        <div class="modal-body">
          <form action="" method="POST">
            <div class="form-group mt-3">
              <label class="form-label">Select Employee:</label>
              <select class="form-select" name="Xres" id="Xres" data-placeholder=""> ';
                <?php
                echo '<option>Select Employee:</option> ';
                $resultpro = mysqli_query($link, "SELECT * FROM deployment WHERE is_deleted !='1'");
                while ($rowpro = mysqli_fetch_array($resultpro)) {
                  $resultpro1 = mysqli_query($link, "SELECT * FROM employees WHERE appno ='$rowpro[5]' and ter_date='' and res_date='' ");
                  while ($rowpro1 = mysqli_fetch_array($resultpro1)) {
                    echo '<option  value="' . $rowpro1[4] . '">' . $rowpro1[6] . ", " . $rowpro1[7] . " " . $rowpro1[8] . ') </option>';
                  }
                }
                ?>
              </select>
            </div>

            <div class="form-group mt-3">
              <label class="form-label">Reason for Resigning:</font></label>
              <input type="text" name="res_reason" value="" class="form-control" placeholder="">
            </div>

            <div class="form-group mt-3">
              <label class="form-label">Effectivity Date:</font></label>
              <input type="date" name="res_date" value="" class="form-control" placeholder="">
            </div>
            <br>

            <label class="form-label mt-4">=====================</font></label><br>
            <label class="form-label">Employee Info:</font></label><br>
            <label class="form-label">=====================</font></label>

            <div class="form-group mt-3">
              <label class="form-label"> Employment Coverage : </label>
              <select class="form-control" name="Y1res" id="Y1res" data-placeholder="" disabled> ;
              </select>
            </div>
            <div class="form-group mt-3">
              <label class="form-label"> Project Deployed : </label>
              <select class="form-control" name="Y2res" id="Y2res" data-placeholder="" disabled> ;

              </select>
            </div>



            <div class="modal-footer">


              <input type="submit" name="res_emp" value="Submit" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
              <input type="button" name="Cancelko" value="Close" data-bs-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
          </form>

        </div>

      </div><!--div for body-->

    </div>
  </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="myModal_retrench" role="dialog">
    <div class="modal-dialog"> <!--//sm,med, lg , xl-->
      <div class="modal-content">

        <div class="modal-header">
          <label for="text">
            <font color="Black">
              <font color="red">*</font>Retrench Active Employee:
            </font>
          </label>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

        </div>

        <div class="modal-body">


          <form action="" method="POST">

            <div class="form-group">
              <label class="form-label">Select Employee:</label>

              <select class="form-control" name="Xretrench" id="Xretrench" data-placeholder=""> ';
                <?php
                echo '<option>Select Employee:</option> ';

                $resultpro = mysqli_query($link, "SELECT * FROM deployment WHERE is_deleted !='1'");
                while ($rowpro = mysqli_fetch_array($resultpro)) {
                  $resultpro1 = mysqli_query($link, "SELECT * FROM employees WHERE appno ='$rowpro[5]' and ter_date='' and res_date='' and retrench_date='' ");
                  while ($rowpro1 = mysqli_fetch_array($resultpro1)) {



                    echo '<option  value="' . $rowpro1[4] . '">' . $rowpro1[6] . ", " . $rowpro1[7] . " " . $rowpro1[8] . ') </option> 
                                                   
                                                                      ';
                  }
                }
                ?>


              </select>
            </div>




            <div class="form-group">
              <label class="form-label">Reason for Retrenchment:</font></label>
              <input type="text" name="retrench_reason" value="" class="form-control" placeholder="">
            </div>


            <div class="form-group">
              <label class="form-label">Effectivity Date:</font></label>
              <input type="date" name="retrench_date" value="" class="form-control" placeholder="">
            </div>
            <br>



            <label class="form-label">=====================</font></label><br>
            <label class="form-label">Employee Info:</font></label><br>
            <label class="form-label">=====================</font></label>
            <div class="form-group">
              <label class="form-label"> Employment Coverage : </label>
              <select class="form-control" name="Y1retrench" id="Y1retrench" data-placeholder="" disabled> ;
              </select>
            </div>
            <div class="form-group">
              <label class="form-label"> Project Deployed : </label>
              <select class="form-control" name="Y2retrench" id="Y2retrench" data-placeholder="" disabled> ;

              </select>
            </div>



            <div class="modal-footer">


              <input type="submit" name="retrench_emp" value="Submit" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
              <input type="button" name="Cancelko" value="Close" data-bs-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
          </form>

        </div>

      </div><!--div for body-->
    </div>
  </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="myModal_float" role="dialog">
    <div class="modal-dialog"> <!--//sm,med, lg , xl-->
      <div class="modal-content">

        <div class="modal-header">
          <label for="text">
            <font color="Black">
              <font color="red">*</font>Float an Active Employee:
            </font>
          </label>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <form action="" method="POST">
            <div class="form-group">
              <label class="form-label">Select Employee:</label>
              <select class="form-control" name="Xfloat" id="Xfloat" data-placeholder="">
                <?php
                echo '<option>Select Employee:</option> ';
                $resultpro = mysqli_query($link, "SELECT * FROM deployment WHERE is_deleted !='1'");
                while ($rowpro = mysqli_fetch_array($resultpro)) {
                  $resultpro1 = mysqli_query($link, "SELECT * FROM employees WHERE appno ='$rowpro[5]' and ter_date='' and res_date='' and retrench_date='' and float_date='' ");
                  while ($rowpro1 = mysqli_fetch_array($resultpro1)) {
                    echo '<option  value="' . $rowpro1[4] . '">' . $rowpro1[6] . ", " . $rowpro1[7] . " " . $rowpro1[8] . ') </option>';
                  }
                }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label class="form-label">Reason for Floating:</font></label>
              <input type="text" name="float_reason" value="" class="form-control" placeholder="">
            </div>

            <div class="form-group">
              <label class="form-label">Effectivity Date:</font></label>
              <input type="date" name="float_date" value="" class="form-control" placeholder="">
            </div>
            <br>

            <label class="form-label">=====================</font></label><br>
            <label class="form-label">Employee Info:</font></label><br>
            <label class="form-label">=====================</font></label>

            <div class="form-group">
              <label class="form-label"> Employment Coverage : </label>
              <select class="form-control" name="Y1float" id="Y1float" data-placeholder="" disabled> ;
              </select>
            </div>

            <div class="form-group">
              <label class="form-label"> Project Deployed : </label>
              <select class="form-control" name="Y2float" id="Y2float" data-placeholder="" disabled> ;</select>
            </div>

            <div class="modal-footer">
              <input type="submit" name="float_emp" value="Submit" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
              <input type="button" name="Cancelko" value="Close" data-bs-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>



  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- Configure a few settings and attach camera -->
  <script language="JavaScript">
    $(document).ready(function() {
      $('#example').DataTable();
    });

    // Date Format
    flatpickr("#myDate", {
      dateFormat: "m-d-Y", // Set the desired date format (MM-DD-YYYY)
      altInput: true, // Enable the alternate input field
      altFormat: "F j, Y", // Set the format for the alternate input field (placeholder)
      placeholder: "Select a date", // Set the text for the placeholder
    });


    $("#X").on("change", function() {

      var x_values = $("#X").find(":selected").val();

      $.ajax({
        url: 'ajaxter.php',
        type: 'POST',
        //dataType:'JSON',
        data: {
          city_code: x_values
        },
        success: function(result) {

          result = JSON.parse(result);

          //Empty option on change
          var select = document.getElementById("Y1");

          var length = select.options.length;

          for (i = length - 1; i >= 0; i--) {
            select.options[i] = null;
          }
          //end

          result.forEach(function(item, index) {

            //console.log(item[2]);

            var option = document.createElement("option");
            option.text = item['city_name'];
            option.value = item['city_name'];
            var select = document.getElementById("Y1");

            select.appendChild(option);
          });
        },

        error: function(result) {
          console.log(result)
        }
      });

    });


    $("#X").on("change", function() {

      var x_values = $("#X").find(":selected").val();

      $.ajax({
        url: 'ajaxter1.php',
        type: 'POST',
        //dataType:'JSON',
        data: {
          city_code: x_values
        },
        success: function(result) {

          result = JSON.parse(result);

          //Empty option on change
          var select = document.getElementById("Y2");
          var length = select.options.length;

          for (i = length - 1; i >= 0; i--) {
            select.options[i] = null;
          }
          //end

          result.forEach(function(item, index) {

            //console.log(item[2]);

            var option = document.createElement("option");
            option.text = item['city_name1'];
            option.value = item['city_name1'];
            var select = document.getElementById("Y2");

            select.appendChild(option);
          });
        },
        error: function(result) {
          console.log(result)
        }
      });
    });


    $("#Xres").on("change", function() {

      var x_values = $("#Xres").find(":selected").val();

      $.ajax({
        url: 'ajaxter.php',
        type: 'POST',
        //dataType:'JSON',
        data: {
          city_code: x_values
        },
        success: function(result) {

          result = JSON.parse(result);

          //Empty option on change
          var select = document.getElementById("Y1res");
          var length = select.options.length;

          for (i = length - 1; i >= 0; i--) {
            select.options[i] = null;
          }
          //end

          result.forEach(function(item, index) {

            //console.log(item[2]);

            var option = document.createElement("option");
            option.text = item['city_name'];
            option.value = item['city_name'];
            var select = document.getElementById("Y1res");
            select.appendChild(option);

          });
        },

        error: function(result) {
          console.log(result)
        }
      });

    });


    $("#Xres").on("change", function() {

      var x_values = $("#Xres").find(":selected").val();

      $.ajax({
        url: 'ajaxter1.php',
        type: 'POST',
        //dataType:'JSON',
        data: {
          city_code: x_values
        },
        success: function(result) {

          result = JSON.parse(result);

          //Empty option on change
          var select = document.getElementById("Y2res");
          var length = select.options.length;

          for (i = length - 1; i >= 0; i--) {
            select.options[i] = null;
          }
          //end

          result.forEach(function(item, index) {

            //console.log(item[2]);

            var option = document.createElement("option");
            option.text = item['city_name1'];
            option.value = item['city_name1'];
            var select = document.getElementById("Y2res");
            select.appendChild(option);
          });
        },

        error: function(result) {
          console.log(result)
        }
      });

    });

    //retrenchment

    $("#Xretrench").on("change", function() {

      var x_values = $("#Xretrench").find(":selected").val();

      $.ajax({
        url: 'ajax_retrench.php',
        type: 'POST',
        //dataType:'JSON',
        data: {
          city_code: x_values
        },
        success: function(result) {

          result = JSON.parse(result);

          //Empty option on change
          var select = document.getElementById("Y1retrench");
          var length = select.options.length;

          for (i = length - 1; i >= 0; i--) {
            select.options[i] = null;
          }
          //end

          result.forEach(function(item, index) {

            //console.log(item[2]);

            var option = document.createElement("option");
            option.text = item['city_name'];
            option.value = item['city_name'];
            var select = document.getElementById("Y1retrench");
            select.appendChild(option);






          });
        },

        error: function(result) {
          console.log(result)
        }
      });

    });


    $("#Xretrench").on("change", function() {

      var x_values = $("#Xretrench").find(":selected").val();

      $.ajax({
        url: 'ajax_retrench1.php',
        type: 'POST',
        //dataType:'JSON',
        data: {
          city_code: x_values
        },
        success: function(result) {

          result = JSON.parse(result);

          //Empty option on change
          var select = document.getElementById("Y2retrench");
          var length = select.options.length;

          for (i = length - 1; i >= 0; i--) {
            select.options[i] = null;
          }
          //end

          result.forEach(function(item, index) {

            //console.log(item[2]);

            var option = document.createElement("option");
            option.text = item['city_name1'];
            option.value = item['city_name1'];
            var select = document.getElementById("Y2retrench");
            select.appendChild(option);
          });
        },

        error: function(result) {
          console.log(result)
        }
      });

    });





    //float

    $("#Xfloat").on("change", function() {

      var x_values = $("#Xfloat").find(":selected").val();

      $.ajax({
        url: 'ajax_float.php',
        type: 'POST',
        //dataType:'JSON',
        data: {
          city_code: x_values
        },
        success: function(result) {

          result = JSON.parse(result);

          //Empty option on change
          var select = document.getElementById("Y1float");
          var length = select.options.length;

          for (i = length - 1; i >= 0; i--) {
            select.options[i] = null;
          }
          //end

          result.forEach(function(item, index) {

            //console.log(item[2]);

            var option = document.createElement("option");
            option.text = item['city_name'];
            option.value = item['city_name'];
            var select = document.getElementById("Y1float");
            select.appendChild(option);






          });
        },

        error: function(result) {
          console.log(result)
        }
      });

    });


    $("#Xfloat").on("change", function() {

      var x_values = $("#Xfloat").find(":selected").val();

      $.ajax({
        url: 'ajax_float1.php',
        type: 'POST',
        //dataType:'JSON',
        data: {
          city_code: x_values
        },
        success: function(result) {

          result = JSON.parse(result);

          //Empty option on change
          var select = document.getElementById("Y2float");
          var length = select.options.length;

          for (i = length - 1; i >= 0; i--) {
            select.options[i] = null;
          }
          //end

          result.forEach(function(item, index) {

            //console.log(item[2]);

            var option = document.createElement("option");
            option.text = item['city_name1'];
            option.value = item['city_name1'];
            var select = document.getElementById("Y2float");
            select.appendChild(option);
          });
        },

        error: function(result) {
          console.log(result)
        }
      });

    });

    // Enabling Tooltips
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
  </script>
  <!-- For DataTables -->
  <script>
    $(document).ready(function() {
      $('#example1').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
    });
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>

  </main>
</body>

</html>