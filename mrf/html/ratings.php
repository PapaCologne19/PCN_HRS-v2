<?php
include 'connect.php';
session_start();
?>
<style>
    .sweet-alert-above-modal {
        z-index: 1051;
        /* Set a higher Z-index value than your modal */
    }
</style>
<div class="container">
    <table class="table table-sm" id="example">
        <thead>
            <tr>
                <th>Applicant Name</th>
                <th>gender</th>
                <th>Age</th>
                <th>Contact Number</th>
                <th>Date Applied</th>
                <th>Resume</th>
                <th>Recruitment Status</th>
                <th>Project Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $id = $_POST['id'];
            $query = "SELECT applicant.*, project.*, resume.*, DATE_FORMAT(resume.date_applied, '%M %d, %Y') as date_applied
                                                                    FROM applicant applicant, projects project, applicant_resume resume
                                                                    WHERE applicant.id = resume.applicant_id 
                                                                    AND project.id = resume.project_id 
                                                                    AND project.id = '$id'";
            $result = $link->query($query);
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row['lastname'] . ", " . $row['firstname'] . " " . $row['middlename'] ?></td>
                    <td><?php echo $row['gender'] ?></td>
                    <td><?php echo $row['age'] ?></td>
                    <td><?php echo $row['mobile_number'] ?></td>
                    <td><?php echo $row['date_applied'] ?></td>
                    <td>
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#viewResume-<?php echo $row['id']; ?>" title="View Resume" style="text-decoration: underline; box-shadow: none !important; outline: none !important;"><?php echo $row['resume_file'] ?></button>
                    </td>

                    <!-- Modal -->
                    <div class="modal fade" id="viewResume-<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">RESUME ATTACHED</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe <?php echo 'src="../../../pcn_OLA/resumeStorage/' . $row['resume_file'] . '"'; ?> height="1000" width="100%"></iframe>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <td><?php echo $row['status'] ?></td>
                    <td><?php echo $row['project_status'] ?></td>

                    <td>
                        <div class="contain">
                            <?php
                            if ($row['status'] === 'QUALIFIED' && $row['project_status'] === 'PENDING') {
                            ?>
                                <div class="columns">
                                    <input type="hidden" class="approve_applicants_ID" value="<?php echo $row['id'] ?>">
                                    <button type="button" class="btn btn-primary btn-sm btnApprove btntooltips" id="btnApprove" title="Search">Deploy</button>
                                </div>
                                <div class="columns">
                                    <input type="hidden" class="editID" value="<?php echo $row['id'] ?>">
                                    <button type="button" class="btn btn-danger btn-sm btnReject btntooltips" id="btnReject" title="Search">Reject</button>
                                </div>

                            <?php
                            } else {
                            ?>

                            <?php } ?>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


</div>
<script>
    // For approving applicants
    $(document).ready(function() {
        $('.btnApprove').click(function(e) {
            e.preventDefault();

            var approve_applicants_ID = $(this).closest("tr").find('.approve_applicants_ID').val();

            $('#projectModal').modal('hide'); // Replace 'yourModalID' with the actual ID of your modal

            // Wait for the modal to close, then show SweetAlert
            setTimeout(function() {
                Swal.fire({
                    title: "Are you sure you want to approve?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                }).then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "action.php",
                            data: {
                                "approve_applicants_button_click": 1,
                                "approve_applicants_id": approve_applicants_ID,
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: "Successfully Undo!",
                                    icon: "success"
                                }).then((result) => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
            }, 100);
        });
    });


    // For Rejecting Applicants
    $(document).ready(function() {
        $('.btnReject').click(function(e) {
            e.preventDefault();

            var editID = $(this).closest("tr").find('.editID').val();

            // Close the modal
            $('#projectModal').modal('hide'); // Replace 'yourModalID' with the actual ID of your modal

            // Wait for the modal to close, then show SweetAlert
            setTimeout(function() {
                Swal.fire({
                    title: "Are you sure you want to reject this person?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "Cancel",
                    showCloseButton: true,
                    html: '<input type="text" id="blacklistReason" placeholder="Enter reason for rejecting" class="swal2-input">',
                    inputAttributes: {
                        allowEnterKey: false
                    },
                    customClass: {
                        container: 'sweet-alert-above-modal'
                    },
                    preConfirm: () => {
                        var reason = document.getElementById("blacklistReason").value;
                        if (!reason) {
                            Swal.showValidationMessage("Reason is required");
                        }
                        return {
                            reason: reason
                        };
                    },
                    willClose: function() {
                        location.reload(); // Refresh the page
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        var reason = result.value.reason;
                        if (reason) {
                            $.ajax({
                                type: "POST",
                                url: "action.php",
                                data: {
                                    "reject_button": 1,
                                    "editID": editID,
                                    "reason": reason,
                                },
                                success: function(response) {
                                    Swal.fire({
                                        title: "Successfully Rejected!",
                                        icon: "success",
                                    });
                                },
                                error: function(xhr, status, error) {
                                    console.log("AJAX Error: " + error);
                                }
                            });
                        }
                    }
                });
            }, 100); // Adjust the timeout duration if needed
        });
    });
</script>