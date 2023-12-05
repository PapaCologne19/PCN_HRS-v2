<?php 
    include 'connect.php';

    if (isset($_POST['division'])) {
        $selected_value = $link->real_escape_string($_POST['division']); 
        list($selectedDivisionForClient, $description) = explode('|', $selected_value);
        // Prepare a SQL query to retrieve employee data for the selected division
        $query = "SELECT fullname, position FROM pcn_emp WHERE division = '$selectedDivisionForClient' AND employment_status = 'REGULAR'";
    
        // Create a prepared statement
        $stmt = $link->query($query);
    
        if ($stmt) {
            // Fetch the data and store it in an array
            $employeeData = array();
            while ($row = $stmt->fetch_assoc()) {
                $employeeData[] = $row;
            }
    
            // Close the statement
            $stmt->close();
    
            // Close the database connection
            $link->close();
    
            // Return the employee data as JSON
            header('Content-Type: application/json');
            echo json_encode($employeeData);
        } else {
            echo "Error in preparing the SQL statement.";
        }
    } else {
        echo "Invalid POST request.";
    }
?>