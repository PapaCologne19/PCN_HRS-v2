
<?php
//export.php  

include "../../connect.php";
session_start();
date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y');


$dtnow = date("m/d/Y");
$data = $_SESSION["dataexport1"];


$output = '';
if (isset($_POST["export"])) {

  echo 'Recruitment Database<br>
Shorlist Name : ' . $data . ' <br>

      as of : ' . $dtnow . '   <br><br> 
';
  $output .= '
   <table class="table" bordered="1">  
                    

                         <tr>  
                              <th> Applicant Number</th>  
                              <th> Lastname </th>
                              <th> Firstname </th>
                              <th> Middlename </th>
                              <th> SSS </th>
                              <th> Pag-ibig </th>
                              <th> Philhealth </th>
                              <th> TIN </th>
                              <th> Police </th>
                              <th> Brgy </th>
                              <th> NBI </th>
                              <th> PSA </th>
                            
                              <th>Birthday </th>
                              <th> Address </th>
                                <th> Desired Position </th>
                              <th> Date Applied </th>
                              <th> Status </th>

                          </tr>




  ';

  $resultx1 = mysqli_query($link, "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data'");
  while ($rowx1 = mysqli_fetch_assoc($resultx1)) {
    // echo $rowx1[2]; 

    $resultx = mysqli_query($link, "SELECT * FROM employees WHERE appno = '" . $rowx1['appnumto'] . "'");
    while ($rowx = mysqli_fetch_assoc($resultx)) {
      $inputDate = $rowx['dapplied'];
      $police = $rowx['policed'];
      $barangay = $rowx['brgyd'];
      $nbi = $rowx['nbid'];
      $birthday = $rowx['birthday'];
      $timestamp = strtotime($inputDate);
      $timestamppolice = strtotime($police);
      $timestampbarangay = strtotime($barangay);
      $timestampnbi = strtotime($nbi);
      $timestampbirthday = strtotime($birthday);
      $formattedDate = date("F d, Y", $timestamp); 
      $formattedDatepolice = date("F d, Y", $timestamppolice); 
      $formattedDatebarangay = date("F d, Y", $timestampbarangay); 
      $formattedDatenbi = date("F d, Y", $timestampnbi); 
      $formattedDatebirthday = date("F d, Y", $timestampbirthday); 
      if (mysqli_num_rows($resultx) > 0) {


        $output .= '
    <tr>
                          <td>' . $rowx["appno"] . '</td>
                          <td>' . $rowx["lastnameko"] . '</td>  
                         <td>' . $rowx["firstnameko"] . '</td>  
                         <td>' . $rowx["mnko"] . '</td>
                         <td>' . $rowx["sssnum"] . '</td>
                         <td>' . $rowx["pagibignum"] . '</td>
                         <td>' . $rowx["phnum"] . '</td>
                         <td>' . $rowx["tinnum"] . '</td>
                         <td>' . $formattedDatepolice . '</td>
                         <td>' . $formattedDatebarangay . '</td>
                         <td>' . $formattedDatenbi . '</td>
                         <td>' . $rowx["psa"] . '</td>

                         <td>' . $formattedDatebirthday . '</td>
                         <td>' . $rowx["paddress"] . '</td>
                                 <td>' . $rowx["despo"] . '</td>
                      
                         <td>' . $formattedDate . '</td>  
                         <td> ___ Deploy  ___ Reject</td>  
                         
                    </tr>



   ';
      }
    }
  }




  $output .= '</table>';
  header('Content-Type: application/xls');

  $fname = "HRS_Shortlist_" . $data . "_" . $dtnow . ".xls";
  header("Content-Disposition: attachment; filename=$fname");
  echo $output;
}
?>
