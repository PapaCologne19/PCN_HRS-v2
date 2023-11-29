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


$query = "SELECT *,   
DATE_FORMAT(mrf.date_added, '%M %d %Y') AS date_added 
FROM mrf 
WHERE is_deleted = '0' 
AND ('$status' = '' OR is_approve = '$status') 
AND (
(DATE(date_added) BETWEEN '$from' AND '$to')
OR ('$from' <> '' AND '$to' = '' AND DATE(date_added) >= '$from')
OR ('$from' = '' AND '$to' <> '' AND DATE(date_added) <= '$to')
OR ('$from' = '' AND '$to' = '')
) 
ORDER BY id DESC";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) > 0) {
    $output .= '
   <table class="table" bordered="1">  
                    
<tr>  MRF Database</tr>
<tr>as of : ' . $dtnow . ' </tr>   
        <tr>
            <th> Date Added </th>
            <th> Tracking No. </th>
            <th> Filled By </th>
            <th> Location </th>
            <th> Project Title </th>
            <th> Position </th>
            <th> Needed </th>
            <th> Provided</th>
            <th> For Screening</th>
            <th> Status </th>
        </tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        $needed = $row['np_male'] + $row['np_female'];

        $project_title = $row['project_title'];
        $needed = $row['np_male'] + $row['np_female'];

        $selected = "SELECT mrf.*, project.*, resumes.* 
         FROM mrf mrf, projects project, applicant_resume resumes 
         WHERE mrf.tracking = project.mrf_tracking 
         AND resumes.project_id = project.id 
         AND project.project_title = '$project_title'
         AND resumes.status = 'QUALIFIED'";

        $selected_result = $link->query($selected);

        $selected_screening = "SELECT mrf.*, project.*, resumes.*
         FROM mrf mrf, projects project, applicant_resume resumes 
         WHERE mrf.tracking = project.mrf_tracking 
         AND resumes.project_id = project.id 
         AND project.project_title = '$project_title'
         AND resumes.status = 'FOR SCREENING'";

        $selected_screening_result = $link->query($selected_screening);
        $for_screening = $selected_screening_result->num_rows;
        $selected_screening_row = $selected_screening_result->fetch_assoc();

        $provided = $selected_result->num_rows;
        $selected_row = $selected_result->fetch_assoc();


        $output .= '
    <tr> 
        <td> ' . $row['date_added'] . ' </td> 
        <td> ' . $row['tracking'] . ' </td> 
        <td> ' . $row['prepared_by'] . ' </td>        
        <td> ' . $row['location'] . ' </td>        
        <td> ' . $row['project_title'] . ' </td>        
        <td>';
    
if ($row['position'] === "OTHER") {
    $output .= $row['position_detail'];
} else {
    $output .= $row['position'];
}

$output .= '</td>        
        <td> ' . $needed . ' </td>        
        <td> ' . $provided . ' </td>        
        <td> ' . $for_screening . ' </td>        
        <td>'; 
if ($row['is_approve'] === "1") {
    $output .= "<span class='badge rounded bg-success'>Approved</span>";
} elseif ($row['is_approve'] === "0") {
    $output .= "<span class='badge rounded bg-pending'>Pending</span>";
} else {
    $output .= "<span class='badge rounded bg-danger'>Rejected</span>";
}
$output .= ' </td>        
    </tr>';

    }
    $output .= '</table>';
    header('Content-Type: application/xls');

    $fname = "HRdatabase_" . $dtnow . ".xls";
    header("Content-Disposition: attachment; filename=$fname");
    echo $output;
}
?>