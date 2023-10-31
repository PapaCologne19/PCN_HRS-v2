<?php
    session_start();
    include '../../connect.php';

    date_default_timezone_set('Asia/Hong_Kong');
    $dtnow = date("m/d/Y");


if(isset($_POST['export_excel'])){
    $data = $_POST['title'];
    $output = '';

        $query = "SELECT * FROM employees";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) > 0) {
            $output .= '
        <table class="table" bordered="1">  
                            
        <tr>  Recruitment Database</tr>
        <tr>  Shortlist Name: '. $data .'</tr>
        <tr>As of : ' . $dtnow . ' </tr>   
                <tr>
                    <th> Applicant No </th>
                    <th> Lastname </th>
                    <th> Firstname </th>
                    <th> Middlename </th>
                    <th> Extension Name </th>
                    <th> Contact Number </th>
                    <th> Gender</th>
                    <th> Civil Status</th>
                    <th> SSS </th>
                    <th> Pag-ibig </th>
                    <th> Philhealth </th>
                    <th> TIN </th>
                    <th> Police </th>
                    <th> Brgy </th>
                    <th> NBI </th>
                    <th> PSA </th>
                    <th> Birthday </th>
                    <th> Address </th>
                    <th> Status </th>
                </tr>';
            while ($row = mysqli_fetch_assoc($result)) {
                $police = $row['policed'];
                $barangay = $row['brgyd'];
                $nbi = $row['nbid'];
                $birthday = $row['birthday'];
                $timestamp_police = strtotime($police);
                $timestamp_barangay = strtotime($barangay);
                $timestamp_nbi = strtotime($nbi);
                $timestamp_birthday = strtotime($birthday);
                $formattedDate_police = date("F d, Y", $timestamp_police);
                $formattedDate_barangay = date("F d, Y", $timestamp_barangay);
                $formattedDate_nbi = date("F d, Y", $timestamp_nbi);
                $formattedDate_birthday = date("F d, Y", $timestamp_birthday);
                $appno = $row['appno'];

                $select_query = "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data' AND appnumto = '$appno'";
                $select_result = $link->query($select_query);
                
                if(mysqli_num_rows($select_result) > 0){
                $output .= '
        
                <tr> 
                    <td> ' . $row['appno'] . '   </td> 
                    <td> ' . $row['lastnameko'] . '   </td> 
                    <td> ' . $row['firstnameko'] . '   </td>        
                    <td> ' . $row['mnko'] . '   </td>        
                    <td> ' . $row['extnname'] . '   </td>        
                    <td> ' . $row['cpnum'] . '   </td>        
                    <td> ' . $row['gendern'] . '   </td>        
                    <td> ' . $row['civiln'] . '   </td>        
                    <td> ' . $row['sssnum'] . '   </td>        
                    <td> ' . $row['pagibignum'] . '   </td>        
                    <td> ' . $row['phnum'] . '   </td>        
                    <td> ' . $row['tinnum'] . '   </td>        
                    <td> ' . $formattedDate_police . '   </td>        
                    <td> ' . $formattedDate_barangay . '   </td>        
                    <td> ' . $formattedDate_nbi . '   </td>        
                    <td> ' . $row['psa'] . '   </td>       
                    <td> ' . $formattedDate_birthday . '   </td>     
                    <td> ' . $row['peraddress'] . '   </td>   
                    <td width="50%" style="text-align: center;"> ____ Deploy ____ Reject </td>  
                </tr>';
                }
            }
            $output .= '</table>';
            header('Content-Type: application/xls');
    
            $fname = "HRdatabase_" . $dtnow . ".xls";
            header("Content-Disposition: attachment; filename=$fname");
            echo $output;
    }
}
