
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
$from_formatted = date_format(new DateTime($from), 'm/d/Y');
$to_formatted = date_format(new DateTime($to), 'm/d/Y');

$query = "SELECT employee.*, shortlist.* 
FROM employees employee, shortlist_master shortlist 
WHERE employee.id = shortlist.employee_id 
AND shortlist.is_deleted = '0'
AND ('$status' = '' OR ewb_status = '$status') 
AND (
    (dateto BETWEEN '$from_formatted' AND '$to_formatted')
    OR ('$from_formatted' <> '' AND '$to_formatted' = '' AND dateto >= '$from_formatted')
    OR ('$from_formatted' = '' AND '$to_formatted' <> '' AND dateto <= '$to_formatted')
    OR ('$from_formatted' = '' AND '$to_formatted' = '')
)";

$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) > 0) {
    $output .= '
   <table class="table" bordered="1">  
                    
    <tr>  Employee Database</tr>
    <tr>as of : ' . $dtnow . ' </tr>   
    <tr>
                <th> Date App </th>
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
                <th> SSS </th>
                <th> Philhealth </th>
                <th> Pagibig </th>
                <th> TIN </th>
                <th> Status </th>
            </tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        $birthday = $row['birthday'];
        $timestamp_birthday = strtotime($birthday);
        $formattedDate_birthday = date("F d, Y", $timestamp_birthday);

        $output .= '
   
    <tr> 
        <td>  ' . $row['dateto'] . '   </td> 
        <td>  ' . $row['lastnameko'] . '   </td> 
        <td> ' . $row['firstnameko'] . '   </td>        
        <td> ' . $row['mnko'] . '   </td>        
        <td> ' . $row['extnname'] . '   </td>        
        <td> ' . $row['cpnum'] . '   </td>        
        <td> ' . $row['gendern'] . '   </td>        
        <td> ' . $row['civiln'] . '   </td>        
        <td> ' . $row['age'] . '   </td>        
        <td> ' . $row['emailadd'] . '   </td>        
        <td> ' . $formattedDate_birthday . '   </td>        
        <td> ' . $row['paddress'] . '   </td>        
        <td> ' . $row['sssnum'] . '   </td>        
        <td> ' . $row['phnum'] . '   </td>        
        <td> ' . $row['pagibignum'] . '   </td>        
        <td> ' . $row['tinnum'] . '   </td>       
        <td> ' . $row['ewb_status'] . '   </td>   
    </tr>';
    }
    $output .= '</table>';
    header('Content-Type: application/xls');

    $fname = "HRdatabase_" . $dtnow . ".xls";
    header("Content-Disposition: attachment; filename=$fname");
    echo $output;
}
?>
