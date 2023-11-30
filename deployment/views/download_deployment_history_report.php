
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
$names = mysqli_real_escape_string($link, $_GET['names']);
$project_title = mysqli_real_escape_string($link, $_GET['project_title']);

$query = "SELECT *, DATE_FORMAT(date_created, '%M %d, %Y') AS date_created 
FROM deployment_history 
WHERE is_deleted = '0'
AND ('$status' = '' OR clearance = '$status') 
    AND ('$names' = '' OR employee_name = '$names') 
    AND ('$project_title' = '' OR shortlist_title = '$project_title') 
    AND(
        (date_created BETWEEN '$from' AND '$to')
        OR ('$from' <> '' AND '$to' = '' AND date_created >= '$from')
        OR ('$from' = '' AND '$to' <> '' AND date_created <= '$to')
        OR ('$from' = '' AND '$to' = '')
    )";

$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) > 0) {
    $output .= '
   <table class="table" bordered="1">  
                    
    <tr>  Employee Database</tr>
    <tr>as of : ' . $dtnow . ' </tr>   
    <tr>
                <th> Date Created </th>
                <th> Type </th>
                <th> Category </th>
                <th> Employee Name </th>
                <th> Project Title</th>
                <th> Start Date </th>
                <th> End Date </th>
                <th> Employment Status </th>
                <th> Rate </th>
                <th> Communication Allowance </th>
                <th> Transportation Allowance </th>
                <th> Internet Allowance </th>
                <th> Meal Allowance </th>
                <th> Outbase Allowance </th>
                <th> Special Allowance </th>
                <th> Position Allowance </th>
                <th> Deployment Remarks </th>
                <th> Status </th>
            </tr>';
    while ($row = mysqli_fetch_assoc($result)) {

        $output .= '
   
    <tr> 
        <td>  ' . $row['date_created'] . '   </td> 
        <td> ' . $row['type'] . '   </td>        
        <td> ' . $row['category'] . '   </td>        
        <td>  ' . $row['employee_name'] . '   </td> 
        <td> ' . $row['shortlist_title'] . '   </td>        
        <td> ' . $row['loa_start_date'] . '   </td>        
        <td> ' . $row['loa_end_date'] . '   </td>        
        <td> ' . $row['employment_status'] . '   </td>        
        <td> ' . $row['basic_salary'] . '   </td>        
        <td> ' . $row['communication_allowance'] . '   </td>        
        <td> ' . $row['transportation_allowance'] . '   </td>        
        <td> ' . $row['internet_allowance'] . '   </td>        
        <td> ' . $row['meal_allowance'] . '   </td>       
        <td> ' . $row['outbase_meal'] . '   </td>       
        <td> ' . $row['special_allowance'] . '   </td>   
        <td> ' . $row['position_allowance'] . '   </td>   
        <td> ' . $row['deployment_remarks'] . '   </td>   
        <td> ' . $row['clearance'] . '   </td>   
    </tr>';
    }
    $output .= '</table>';
    header('Content-Type: application/xls');

    $fname = "HRdatabase_" . $dtnow . ".xls";
    header("Content-Disposition: attachment; filename=$fname");
    echo $output;
}
?>
