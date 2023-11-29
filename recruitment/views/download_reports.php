
<?php
include "../../connect.php";
session_start();

date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y');

$dtnow = date("m/d/Y");
$output = '';

$status = mysqli_real_escape_string($link, $_GET['status']);
$from = mysqli_real_escape_string($link, $_GET['from']);
$to = mysqli_real_escape_string($link, $_GET['to']);
 

$query = "SELECT applicant.*, resumes.*, project.*, applicant.id AS applicant_number, resumes.status AS resume_status, DATE_FORMAT(birthday, '%M %d %Y') AS birthday
FROM applicant applicant, applicant_resume resumes, projects project
WHERE applicant.id = resumes.applicant_id
AND project.id = resumes.project_id
AND ('$status' = '' OR resumes.status = '$status') 
AND ((recruitment_action_date BETWEEN '$from' AND '$to')
OR ('$from' <> '' AND '$to' = '' AND recruitment_action_date >= '$from')
OR ('$from' = '' AND '$to' <> '' AND recruitment_action_date <= '$to')
OR ('$from' = '' AND '$to' = ''))";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) > 0) {
    $output .= '
   <table class="table" bordered="1">  
                    
<tr>  Applicant Database</tr>
<tr>as of : ' . $dtnow . ' </tr>   
        <tr>
            <th> Applicant No </th>
            <th> Lastname </th>
            <th> Firstname </th>
            <th> Middlename </th>
            <th> Extension Name </th>
            <th> Contact Number </th>
            <th> Gender</th>
            <th> Civil Status</th>
            <th> Age </th>
            <th> Email Address </th>
            <th> Birthday </th>
            <th> Address </th>
            <th> Status </th>
            <th> Date Applied </th>
            <th> Project Title </th>
            <th> Recruitment Action Date </th>
            <th> Approved By </th>
        </tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        $birthday = $row['birthday'];
        $timestamp_birthday = strtotime($birthday);
        $formattedDate_birthday = date("F d, Y", $timestamp_birthday);

        $output .= '
   
<tr> 
  <td>  ' . $row['applicant_number'] . '   </td> 
  <td>  ' . $row['lastname'] . '   </td> 
  <td> ' . $row['firstname'] . '   </td>        
  <td> ' . $row['middlename'] . '   </td>        
  <td> ' . $row['extension_name'] . '   </td>        
  <td> ' . $row['mobile_number'] . '   </td>        
  <td> ' . $row['gender'] . '   </td>        
  <td> ' . $row['civil_status'] . '   </td>        
  <td> ' . $row['age'] . '   </td>        
  <td> ' . $row['email_address'] . '   </td>        
  <td> ' . $formattedDate_birthday . '   </td>        
  <td> ' . $row['present_address'] . '   </td>        
  <td> ' . $row['resume_status'] . '   </td>        
  <td> ' . $row['date_applied'] . '   </td>        
  <td> ' . $row['project_title'] . '   </td>        
  <td> ' . $row['recruitment_action_date'] . '   </td>       
  <td> ' . $row['recruitment_approved_by'] . '   </td>   
</tr>
   ';
    }
    $output .= '</table>';
    header('Content-Type: application/xls');

    $fname = "HRdatabase_" . $dtnow . ".xls";
    header("Content-Disposition: attachment; filename=$fname");
    echo $output;
}
?>
