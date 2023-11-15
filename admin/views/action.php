<?php
session_start();
include '../../connect.php';

// For Creating LOA Template
if (isset($_POST['create_loa'])) {
    $loa_title = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['loa_title'])));
    $division = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['division'])));
    $applicant_name = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['applicant_name'])));
    $applicant_address = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['applicant_address'])));
    $client_name = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['client_name'])));
    $place_assigned = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['place_assigned'])));
    $address_assigned = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['address_assigned'])));
    $job_title = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['job_title'])));
    $employment_status = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['employment_status'])));
    $start_date = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['start_date'])));
    $end_date = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['end_date'])));
    $rate = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['rate'])));
    $communication_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['communication_allowance'])));
    $transportation_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['transportation_allowance'])));
    $total_sum = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['total_sum'])));
    $ecola = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['ecola'])));
    $internet_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['internet_allowance'])));
    $meal_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['meal_allowance'])));
    $outbase_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['outbase_allowance'])));
    $special_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['special_allowance'])));
    $position_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['position_allowance'])));
    $outlet = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['outlet'])));
    $no_of_work_days = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['no_of_work_days'])));
    $issued_day = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['issued_day'])));
    $issued_month = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['issued_month'])));
    $issued_year = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['issued_year'])));
    $deployment_personnel = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['deployment_personnel'])));
    $deployment_personnel_designation = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['deployment_personnel_designation'])));
    $deployment_supervisor = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['deployment_supervisor'])));
    $deployment_supervisor_designation = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['deployment_supervisor_designation'])));
    $project_supervisor_endorsed = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['project_supervisor_endorsed'])));
    $project_supervisor_endorsed_designation = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['project_supervisor_endorsed_designation'])));
    $head = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['head'])));
    $head_designation = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['head_designation'])));
    $project_supervisor_approved = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['project_supervisor_approved'])));
    $project_supervisor_approved_designation = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['project_supervisor_approved_designation'])));
    $sss = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['sss'])));
    $philhealth = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['philhealth'])));
    $pagibig = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['pagibig'])));
    $tin = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['tin'])));
    $applicant_id = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['applicant_id'])));
    $applicant_contact = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['applicant_contact'])));
    $id = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['id'])));
    $loa_tracker = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['loa_tracker'])));

    $loa_upload_directory = "../loa_template_directory/";
    $loa_filename = $_FILES["template"]["name"];
    $loa_template_file = $loa_upload_directory . basename($_FILES["template"]["name"]);
    $upload_file = 1;

    if ($_FILES["template"]["size"] <= 5242880) {
        $allowedExtensions = ["pdf", "doc", "docx"];
        $fileExtension = strtolower(pathinfo($loa_template_file, PATHINFO_EXTENSION));
        if (in_array($fileExtension, $allowedExtensions)) {
            $query = "INSERT INTO `loa_maintenance_word`(`loa_name`, `division`, `applicant_name`, `applicant_address`, 
                `client_name`, `place_assigned`, `address_assigned`, `job_title`, 
                `employment_status`, `start_date`, `end_date`, `basic_pay`, `outlet`, 
                `no_work_days`, `issued_day`, `issued_month`, `issued_year`, `pb_deployment_personel`, 
                `pb_dpdesignation`, `pb_supervisor`, `pb_sdesignation`, `eb_project_supervisor`, `eb_psdesignation`,`ab_head`, `ab_hdesignation`, `ab_project_supervisor`, `ab_psdesignation`, 
                `sss_no`, `philhealth_no`, `pagibig_no`, `tin_no`, `applicant_id`, 
                `applicant_contact`, `communication_allowance`, `transpo_meal_allowance`, 
                `ecola`, `internet_allowance`, `meal_allowance`, `outbase_meal`, `special_allowance`, `position_allowance`,
                `total_sum`, `shortlist_id`,`loa_tracker`) 
                VALUES ('$loa_title', '$division', '$applicant_name', '$applicant_address', 
                '$client_name', '$place_assigned', '$address_assigned', '$job_title', 
                '$employment_status', '$start_date', '$end_date', '$rate', '$outlet', 
                '$no_of_work_days', '$issued_day', '$issued_month', '$issued_year', '$deployment_personnel', 
                '$deployment_personnel_designation', '$deployment_supervisor', '$deployment_supervisor_designation', '$project_supervisor_endorsed', '$project_supervisor_endorsed_designation', 
                '$head', '$head_designation', '$project_supervisor_approved', '$project_supervisor_approved_designation', 
                '$sss', '$philhealth', '$pagibig', '$tin', '$applicant_id', 
                '$applicant_contact', '$communication_allowance', '$transportation_allowance', 
                '$ecola', '$internet_allowance', '$meal_allowance', '$outbase_allowance', '$special_allowance', '$position_allowance',
                '$total_sum', '$id', '$loa_tracker')";

            $result = $link->query($query);

            if ($result) {
                $id = $link->insert_id;

                $query2 = "INSERT INTO `loa_files`(`loa_main_id`, `file_name`, `file_location`) 
                    VALUES ('$id','$loa_filename','$loa_upload_directory')";
                $result2 = $link->query($query2);

                if ($result2) {
                    if ($upload_file === 1) {
                        if (move_uploaded_file($_FILES["template"]["tmp_name"], $loa_template_file)) {
                            $_SESSION["successMessage"] = "Success";
                        } else {
                            ini_set('display_errors', 1);
                            ini_set('display_startup_errors', 1);
                            error_reporting(E_ALL);
                            $_SESSION["errorMessage"] = "Error in inserting files.";
                        }
                    } else {
                        $_SESSION["errorMessage"] = "Your file was not uploaded.";
                    }
                }
            } else {
                $_SESSION["errorMessage"] = "Error in inserting data.";
                $upload_file = 0;
            }
        } else {
            $_SESSION["errorMessage"] = "Sorry, only PDF, DOC, and DOCX files are allowed.";
            $upload_file = 0;
        }
    } else {
        $_SESSION["errorMessage"] = "Sorry, your file is too large. Max file is 5MB";
        $upload_file = 0;
    }
    header("Location: create_loa.php");
    exit(0);
}

// Updating LOA Template File
if (isset($_POST['change_file_btn'])) {
    $id = $link->real_escape_string($_POST['loatemplate_id']);
    $loa_upload_directory = "../loa_template_directory/";
    $loa_filename = $_FILES["loatemplate_file"]["name"];
    $loa_template_file = $loa_upload_directory . basename($_FILES["loatemplate_file"]["name"]);
    $upload_file = 1;

    if ($_FILES["loatemplate_file"]["size"] <= 5242880) {
        $allowedExtensions = ["pdf", "doc", "docx"];
        $fileExtension = strtolower(pathinfo($loa_template_file, PATHINFO_EXTENSION));
        if (in_array($fileExtension, $allowedExtensions)) {
            $query = "UPDATE loa_files SET file_name = '$loa_filename', file_location = '$loa_upload_directory' WHERE id = '$id'";
            $result = $link->query($query);

            if ($result) {
                if ($upload_file === 1) {
                    if (move_uploaded_file($_FILES["loatemplate_file"]["tmp_name"], $loa_template_file)) {
                        $_SESSION["successMessage"] = "Success";
                    } else {
                        $_SESSION["errorMessage"] = "Error in Updating files.";
                    }
                } else {
                    $_SESSION["errorMessage"] = "Your file was not uploaded.";
                }
            } else {
                $_SESSION["errorMessage"] = "Your file was not uploaded.";
            }
        } else {
            $_SESSION["errorMessage"] = "Sorry, only PDF, DOC, and DOCX files are allowed.";
            $upload_file = 0;
        }
    } else {
        $_SESSION["errorMessage"] = "Sorry, your file is too large. Max file is 5MB";
        $upload_file = 0;
    }
    header("Location: loa.php");
    exit(0);
}

// For Setting as default
if (isset($_POST['make_default_button_click'])) {
    $set_default_id = $_POST['make_default_id'];

    $query_id = "UPDATE loa_files SET status = '1' WHERE id = '$set_default_id'";
    $result_id = $link->query($query_id);

    if ($result_id) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Set as default error";
    }
    header("Location: loa.php");
    exit(0);
}

// For Setting as inactive
if (isset($_POST['make_inactive_button_click'])) {
    $set_inactive_id = $_POST['make_inactive_id'];

    $query_inactive_id = "UPDATE loa_files SET status = '0' WHERE id = '$set_inactive_id'";
    $result_inactive_id = $link->query($query_inactive_id);

    if ($result_inactive_id) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Set as inactive error";
    }
    header("Location: loa.php");
    exit(0);
}

// Adding Category
if (isset($_POST['addCategoryBtn'])) {
    $category_name = $link->real_escape_string($_POST['category_name']);

    if (!empty($category_name)) {
        $query = "INSERT INTO categories(description) VALUES('$category_name')";
        $result = $link->query($query);

        if ($result) {
            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error in Adding";
        }
    }
    header("Location: category.php");
    exit(0);
}

// Updating Category
if (isset($_POST['updateCategoryBtn'])) {
    $id = $link->real_escape_string($_POST['id']);
    $category_name = $link->real_escape_string($_POST['category_name']);

    if (!empty($category_name)) {
        $query = "UPDATE categories SET description = '$category_name' WHERE id = '$id'";
        $result = $link->query($query);

        if ($result) {
            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error in Updating";
        }
    }
    header("Location: category.php");
    exit(0);
}

// Deleting Category
if (isset($_POST['delete_category_button'])) {
    $id = $link->real_escape_string($_POST['delete_category_id']);

    $query = "UPDATE categories SET is_deleted = '1' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Updating";
    }
    header("Location: category.php");
    exit(0);
}

// Undo Deleting Category
if (isset($_POST['undo_delete_category_button'])) {
    $id = $link->real_escape_string($_POST['undo_delete_category_id']);

    $query = "UPDATE categories SET is_deleted = '0' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Undo";
    }
    header("Location: category.php");
    exit(0);
}

// Adding Channel
if (isset($_POST['addChannelBtn'])) {
    $channel_name = $link->real_escape_string($_POST['channel_name']);

    if (!empty($channel_name)) {
        $query = "INSERT INTO channels(description) VALUES('$channel_name')";
        $result = $link->query($query);

        if ($result) {
            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error in Adding";
        }
    }
    header("Location: channel.php");
    exit(0);
}

// Updating Channel
if (isset($_POST['updateChannelBtn'])) {
    $id = $link->real_escape_string($_POST['id']);
    $channel_name = $link->real_escape_string($_POST['channel_name']);

    if (!empty($channel_name)) {
        $query = "UPDATE channels SET description = '$channel_name' WHERE id = '$id'";
        $result = $link->query($query);

        if ($result) {
            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error in Updating";
        }
    }
    header("Location: channel.php");
    exit(0);
}

// Deleting Channel
if (isset($_POST['delete_channel_button'])) {
    $id = $link->real_escape_string($_POST['delete_channel_id']);

    $query = "UPDATE channels SET is_deleted = '1' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Updating";
    }
    header("Location: channel.php");
    exit(0);
}

// Undo Deleting Category
if (isset($_POST['undo_delete_channel_button'])) {
    $id = $link->real_escape_string($_POST['undo_delete_channel_id']);

    $query = "UPDATE channels SET is_deleted = '0' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Undo";
    }
    header("Location: channel.php");
    exit(0);
}

// Adding Classification
if (isset($_POST['addClassificationBtn'])) {
    $classification_name = $link->real_escape_string($_POST['classification_name']);

    if (!empty($classification_name)) {
        $query = "INSERT INTO classifications(description) VALUES('$classification_name')";
        $result = $link->query($query);

        if ($result) {
            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error in Adding";
        }
    }
    header("Location: classification.php");
    exit(0);
}

// Updating Classification
if (isset($_POST['updateClassificationBtn'])) {
    $id = $link->real_escape_string($_POST['id']);
    $classification_name = $link->real_escape_string($_POST['classification_name']);

    if (!empty($classification_name)) {
        $query = "UPDATE classifications SET description = '$classification_name' WHERE id = '$id'";
        $result = $link->query($query);

        if ($result) {
            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error in Updating";
        }
    }
    header("Location: classification.php");
    exit(0);
}

// Deleting Classification
if (isset($_POST['delete_classification_button'])) {
    $id = $link->real_escape_string($_POST['delete_classification_id']);

    $query = "UPDATE classifications SET is_deleted = '1' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Updating";
    }
    header("Location: classification.php");
    exit(0);
}

// Undo Deleting classifications
if (isset($_POST['undo_delete_classification_button'])) {
    $id = $link->real_escape_string($_POST['undo_delete_classification_id']);

    $query = "UPDATE classifications SET is_deleted = '0' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Undo";
    }
    header("Location: classification.php");
    exit(0);
}

// Adding Client Company
if (isset($_POST['addClientCompanyBtn'])) {
    $client_company_name = $link->real_escape_string($_POST['client_company_name']);
    $area = $link->real_escape_string($_POST['area']);
    $region = $link->real_escape_string($_POST['region']);
    $branch = $link->real_escape_string($_POST['branch']);
    $address = $link->real_escape_string($_POST['address']);

    $query = "INSERT INTO client_company(company_name, area, region, branch, address) 
        VALUES('$client_company_name', '$area', '$region', '$branch', '$address')";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Adding";
    }
    header("Location: client_companies.php");
    exit(0);
}

// Updating Client Company
if (isset($_POST['updateClientCompanyBtn'])) {
    $id = $link->real_escape_string($_POST['id']);
    $client_company_name = $link->real_escape_string($_POST['client_company_name']);
    $area = $link->real_escape_string($_POST['area']);
    $region = $link->real_escape_string($_POST['region']);
    $branch = $link->real_escape_string($_POST['branch']);
    $address = $link->real_escape_string($_POST['address']);

    $query = "UPDATE client_company SET company_name = '$client_company_name', area = '$area', region = '$region', branch = '$branch', address = '$address' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Updating";
    }
    header("Location: client_companies.php");
    exit(0);
}

// Deleting Client Company
if (isset($_POST['delete_client_company_button'])) {
    $id = $link->real_escape_string($_POST['delete_client_company_id']);

    $query = "UPDATE client_company SET is_deleted = '1' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Updating";
    }
    header("Location: client_companies.php");
    exit(0);
}

// Undo Deleting Client Company
if (isset($_POST['undo_delete_client_company_button'])) {
    $id = $link->real_escape_string($_POST['undo_delete_client_company_id']);

    $query = "UPDATE client_company SET is_deleted = '0' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Undo";
    }
    header("Location: client_companies.php");
    exit(0);
}

// Adding Division
if (isset($_POST['addDivisionBtn'])) {
    $division_name = $link->real_escape_string($_POST['division_name']);

    if (!empty($division_name)) {
        $query = "INSERT INTO divisions(description) VALUES('$division_name')";
        $result = $link->query($query);

        if ($result) {
            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error in Adding";
        }
    }
    header("Location: division.php");
    exit(0);
}

// Updating Division
if (isset($_POST['updateDivisionBtn'])) {
    $id = $link->real_escape_string($_POST['id']);
    $division_name = $link->real_escape_string($_POST['division_name']);

    if (!empty($division_name)) {
        $query = "UPDATE divisions SET description = '$division_name' WHERE id = '$id'";
        $result = $link->query($query);

        if ($result) {
            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error in Updating";
        }
    }
    header("Location: division.php");
    exit(0);
}

// Deleting Division
if (isset($_POST['delete_division_button'])) {
    $id = $link->real_escape_string($_POST['delete_division_id']);

    $query = "UPDATE divisions SET is_deleted = '1' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Updating";
    }
    header("Location: division.php");
    exit(0);
}

// Undo Deleting Division
if (isset($_POST['undo_delete_division_button'])) {
    $id = $link->real_escape_string($_POST['undo_delete_division_id']);

    $query = "UPDATE divisions SET is_deleted = '0' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Undo";
    }
    header("Location: division.php");
    exit(0);
}

// Adding Identification Mark
if (isset($_POST['addIdentificationMarkBtn'])) {
    $identification_mark = $link->real_escape_string($_POST['identification_mark']);

    if (!empty($identification_mark)) {
        $query = "INSERT INTO distinguishing_qualification_marks(description) VALUES('$identification_mark')";
        $result = $link->query($query);

        if ($result) {
            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error in Adding";
        }
    }
    header("Location: identification_mark.php");
    exit(0);
}

// Updating Identification Mark
if (isset($_POST['updateIdentificationMarkBtn'])) {
    $id = $link->real_escape_string($_POST['id']);
    $identification_mark = $link->real_escape_string($_POST['identification_mark']);

    if (!empty($identification_mark)) {
        $query = "UPDATE distinguishing_qualification_marks SET description = '$identification_mark' WHERE id = '$id'";
        $result = $link->query($query);

        if ($result) {
            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error in Updating";
        }
    }
    header("Location: identification_mark.php");
    exit(0);
}

// Deleting Identification Mark
if (isset($_POST['delete_identification_mark_button'])) {
    $id = $link->real_escape_string($_POST['delete_identification_mark_id']);

    $query = "UPDATE distinguishing_qualification_marks SET is_deleted = '1' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Updating";
    }
    header("Location: identification_mark.php");
    exit(0);
}

// Undo Deleting Identification Mark
if (isset($_POST['undo_delete_identification_mark_button'])) {
    $id = $link->real_escape_string($_POST['undo_delete_identification_mark_id']);

    $query = "UPDATE distinguishing_qualification_marks SET is_deleted = '0' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Undo";
    }
    header("Location: identification_mark.php");
    exit(0);
}

// Adding Source Mark
if (isset($_POST['addSourceBtn'])) {
    $source_name = $link->real_escape_string($_POST['source_name']);

    if (!empty($source_name)) {
        $query = "INSERT INTO sources(description) VALUES('$source_name')";
        $result = $link->query($query);

        if ($result) {
            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error in Adding";
        }
    }
    header("Location: source.php");
    exit(0);
}

// Updating Sourcee
if (isset($_POST['updateSourceBtn'])) {
    $id = $link->real_escape_string($_POST['id']);
    $source_name = $link->real_escape_string($_POST['source_name']);

    if (!empty($source_name)) {
        $query = "UPDATE sources SET description = '$source_name' WHERE id = '$id'";
        $result = $link->query($query);

        if ($result) {
            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error in Updating";
        }
    }
    header("Location: source.php");
    exit(0);
}

// Deleting Sourcee
if (isset($_POST['delete_source_button'])) {
    $id = $link->real_escape_string($_POST['delete_source_id']);

    $query = "UPDATE sources SET is_deleted = '1' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Updating";
    }
    header("Location: source.php");
    exit(0);
}

// Undo Deleting Sourcee
if (isset($_POST['undo_delete_source_button'])) {
    $id = $link->real_escape_string($_POST['undo_delete_source_id']);

    $query = "UPDATE sources SET is_deleted = '0' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Undo";
    }
    header("Location: source.php");
    exit(0);
}

// Adding Project
if (isset($_POST['addProjectBtn'])) {
    $project_title = $link->real_escape_string($_POST['project_title']);
    $client_company_name = $link->real_escape_string($_POST['client_company_name']);
    $ewb_count = $link->real_escape_string($_POST['ewb_count']);
    $start_date = $link->real_escape_string($_POST['start_date']);
    $end_date = $link->real_escape_string($_POST['end_date']);

    $query = "INSERT INTO client_project(project_title, client_company_name, ewb_count, start_date, end_date) 
        VALUES('$project_title', '$client_company_name', '$ewb_count', '$start_date', '$end_date')";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Adding";
    }
    header("Location: project.php");
    exit(0);
}

// Updating Project
if (isset($_POST['updateProjectBtn'])) {
    $id = $link->real_escape_string($_POST['id']);
    $project_title = $link->real_escape_string($_POST['project_title']);
    $client_company_name = $link->real_escape_string($_POST['client_company_name']);
    $ewb_count = $link->real_escape_string($_POST['ewb_count']);
    $start_date = $link->real_escape_string($_POST['start_date']);
    $end_date = $link->real_escape_string($_POST['end_date']);

    if (!empty($project_title) || !empty($client_company_name) || !empty($ewb_count) || !empty($start_date) || !empty($end_date)) {
        $query = "UPDATE client_project SET project_title = '$project_title', client_company_name = '$client_company_name', ewb_count = '$ewb_count', start_date = '$start_date', end_date = '$end_date' WHERE id = '$id'";
        $result = $link->query($query);

        if ($result) {
            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error in Updating";
        }
    } else {
        $_SESSION['errorMessage'] = "Please complete all the fields";
    }
    header("Location: project.php");
    exit(0);
}

// Deleting Project
if (isset($_POST['delete_project_button'])) {
    $id = $link->real_escape_string($_POST['delete_project_id']);

    $query = "UPDATE client_project SET is_deleted = '1', status = '2' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Updating";
    }
    header("Location: project.php");
    exit(0);
}

// Undo Deleted Project
if (isset($_POST['undo_delete_project_button'])) {
    $id = $link->real_escape_string($_POST['undo_delete_project_id']);

    $query = "UPDATE client_project SET is_deleted = '0', status = '1' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Undo";
    }
    header("Location: project.php");
    exit(0);
}

// Change Project Status - Active
if (isset($_POST['change_project_status_active_button'])) {
    $id = $link->real_escape_string($_POST['change_project_status_active_id']);

    $query = "UPDATE client_project SET status = '0' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Undo";
    }
    header("Location: project.php");
    exit(0);
}

// Change Project Status - Inactive
if (isset($_POST['change_project_status_inactive_button'])) {
    $id = $link->real_escape_string($_POST['change_project_status_inactive_id']);

    $query = "UPDATE client_project SET status = '1' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Undo";
    }
    header("Location: project.php");
    exit(0);
}

// Deleting History
if (isset($_POST['delete_history_button'])) {
    $id = $link->real_escape_string($_POST['delete_history_id']);

    $query = "UPDATE employee_update_history SET is_deleted = '1' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Deleting";
    }
    header("Location: employee_history.php?");
    exit(0);
}

// Undo Deleted History
if (isset($_POST['undo_delete_history_button'])) {
    $id = $link->real_escape_string($_POST['undo_delete_history_id']);

    $query = "UPDATE employee_update_history SET is_deleted = '0' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Undo";
    }
    header("Location: employee_history.php");
    exit(0);
}

// Deleting LOA History
if (isset($_POST['delete_loa_history_button'])) {
    $id = $link->real_escape_string($_POST['delete_loa_history_id']);

    $query = "UPDATE deployment_history SET is_deleted = '1' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Updating";
    }
    header("Location: loa_history.php?");
    exit(0);
}

// Undo Deleted LOA History
if (isset($_POST['undo_delete_loa_history_button'])) {
    $id = $link->real_escape_string($_POST['undo_delete_loa_history_id']);

    $query = "UPDATE deployment_history SET is_deleted = '0' WHERE id = '$id'";
    $result = $link->query($query);

    if ($result) {
        $_SESSION['successMessage'] = "Success";
    } else {
        $_SESSION['errorMessage'] = "Error in Undo";
    }
    header("Location: loa_history.php");
    exit(0);
}
