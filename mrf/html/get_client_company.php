<?php 
    include 'connect.php';

    if (isset($_POST['division'])) {
        $selected_value = $link->real_escape_string($_POST['division']);
        list($selectedDivisionClient, $description) = explode('|', $selected_value);

    
        // Prepare a SQL query to retrieve employee data for the selected division
        $query = "SELECT company_name, address
                    FROM client_company WHERE division = '$selectedDivisionClient' AND is_deleted = '0'";
    
        // Create a prepared statement
        $stmt = $link->query($query);
    
        if ($stmt) {
           
            // Fetch the data and store it in an array
            $clientData = array();
            while ($row = $stmt->fetch_assoc()) {
                $clientData[] = $row;
            }
    
            // Close the statement
            $stmt->close();
    
            // Close the database connection
            $link->close();
    
            // Return the employee data as JSON
            header('Content-Type: application/json');
            echo json_encode($clientData);
        } else {
            echo "Error in preparing the SQL statement.";
        }
    } else {
        echo "Invalid POST request.";
    }
?>