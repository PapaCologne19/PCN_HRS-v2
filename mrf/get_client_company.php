<?php 
    include '../connect.php';

    if (isset($_POST['division'])) {
        $selectedDivisionClient = $_POST['division'];
    
        // Prepare a SQL query to retrieve employee data for the selected division
        $query = "SELECT company_name FROM client_company WHERE division = ? AND is_deleted = '0'";
    
        // Create a prepared statement
        $stmt = $link->prepare($query);
    
        if ($stmt) {
            // Bind the parameter
            $stmt->bind_param("s", $selectedDivisionClient);
    
            // Execute the statement
            $stmt->execute();
    
            // Get the result
            $result = $stmt->get_result();
    
            // Fetch the data and store it in an array
            $clientData = array();
            while ($row = $result->fetch_assoc()) {
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