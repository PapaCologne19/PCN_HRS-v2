   <!-- Core JS -->
   <!-- build:js assets/vendor/js/core.js -->
   <script src="../assets/vendor/libs/jquery/jquery.js"></script>
   <script src="../assets/vendor/libs/popper/popper.js"></script>
   <script src="../assets/vendor/js/bootstrap.js"></script>
   <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

   <script src="../assets/vendor/js/menu.js"></script>
   <!-- endbuild -->

   <!-- For recruitment JS -->
   <script src="../../assets/js/util.js"></script>
   <script src="../../assets/js/menu-aim.js"></script>
   <script src="../../assets/js/main.js"></script>
   <script>
      // Configure a few settings and attach camera
      function take_snapshot() {
         Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
         });
      }

      // For birthday and age 
      function calculateAge() {
         // Get the date of birth from the input field
         const birthdate = document.getElementById("birthdate").value;

         // Calculate the age
         const birthTimestamp = new Date(birthdate).getTime();
         const currentTimestamp = new Date().getTime();
         const age = new Date(currentTimestamp - birthTimestamp).getUTCFullYear() - 1970;

         // Update the age input field with the calculated age
         document.getElementById("age").value = age;
      }

      // For Search Box
      function myFunction() {
         // Declare variables
         var input, filter, table, tr, td, i, j, txtValue;
         input = document.getElementById("myInput");
         filter = input.value.toUpperCase();
         table = document.getElementById("myTable");
         tr = table.getElementsByTagName("tr");

         // Loop through all table rows, and hide those that don't match the search query
         for (i = 1; i < tr.length; i++) { // Start from 1 to skip the header row
            td = tr[i].getElementsByTagName("td");
            let match = false; // Assume there is no match
            for (j = 0; j < td.length; j++) {
               txtValue = td[j].textContent || td[j].innerText;
               if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  match = true;
                  break; // If a match is found in this row, no need to check other columns
               }
            }
            tr[i].style.display = match ? "" : "none";
         }
      }

      // Date Format
    flatpickr("#birthdate", {
      dateFormat: "m/d/Y", // Set the desired date format (MM-DD-YYYY)
      altInput: true, // Enable the alternate input field
      altFormat: "F j, Y", // Set the format for the alternate input field (placeholder)
      placeholder: "Select a date", // Set the text for the placeholder
    });

      // For camera
      function myFunctioncam() {
         Webcam.set({
            width: 250,
            height: 200,
            image_format: 'png',
         });

         Webcam.attach('#my_camera');

         document.getElementById("my_camera").style.visibility = "hidden";
         var x = document.getElementById("my_camera");
         if (x.style.visibility === "hidden") {
            x.style.visibility = "visible";
         } else {
            x.style.visibility = "hidden";
         }
      }


      // For Regions
      $("#regionn").on("change", function() {
   var x_values = $("#regionn").find(":selected").val();

   $.ajax({
      url: 'ajaxregion.php',
      type: 'POST',
      data: {
         city_code: x_values
      },
      success: function(result) {
         result = JSON.parse(result);

         // Empty the options of the specific dropdown with ID 'cityn'
         $("#cityn").empty();

         // Append new options
         result.forEach(function(item, index) {
            var option = $("<option>").text(item['city_name']).val(item['city_name']);
            $("#cityn").append(option);
         });
      },
      error: function(result) {
         console.log(result)
      }
   });
});



      // For Blacklisting
      $(document).ready(function() {
         $('.blackbtn').click(function(e) {
            e.preventDefault();

            var blacklistingID = $(this).closest("tr").find('.blackbtnID').val();

            Swal.fire({
               title: "Are you sure you want to blacklist this person?",
               icon: "warning",
               showCancelButton: true,
               confirmButtonText: "Yes, blacklist it!",
               cancelButtonText: "No, cancel",
               showCloseButton: true, // Add a close button

               // Customize the content of the modal
               html: '<input type="text" id="blacklistReason" placeholder="Enter reason for blacklisting" class="swal2-input">',

               preConfirm: () => {
                  // Retrieve the entered reason from the input field
                  var reason = document.getElementById("blacklistReason").value;

                  if (!reason) {
                     Swal.showValidationMessage("Reason is required");
                  }

                  // Log the reason to the console for debugging
                  console.log("Reason for blacklisting: " + reason);

                  // Send the reason along with the AJAX request
                  return {
                     reason: reason
                  };
               }
            }).then((result) => {
               if (result.isConfirmed) {
                  var reason = result.value.reason; // Get the reason entered by the user
                  if (reason) {
                     // Send the reason along with the AJAX request
                     $.ajax({
                        type: "POST",
                        url: "action.php",
                        data: {
                           "blacklist_button": 1,
                           "blacklistID": blacklistingID,
                           "reason": reason, // Include the reason
                        },
                        success: function(response) {
                           Swal.fire({
                              title: "Successfully Blacklisted!",
                              icon: "success",
                           }).then((result) => {
                              location.reload();
                           });
                        },
                        error: function(xhr, status, error) {
                           console.log("AJAX Error: " + error);
                        }
                     });
                  }
               }
            });
         });
      });


      // For deleting Applicants
      $(document).ready(function() {
         $('.deletebtn').click(function(e) {
            e.preventDefault();

            var deleteApplicantID = $(this).closest("tr").find('.deleteID').val();

            Swal.fire({
               title: "Are you sure you want to delete this person?",
               icon: "warning",
               showCancelButton: true,
               confirmButtonText: "Yes, delete it!",
               cancelButtonText: "No, cancel",
               showCloseButton: true, // Add a close button

               // Customize the content of the modal
               html: '<input type="text" id="deleteReason" placeholder="Enter reason for delete" class="swal2-input">',

               preConfirm: () => {
                  // Retrieve the entered reason from the input field
                  var reason = document.getElementById("deleteReason").value;

                  if (!reason) {
                     Swal.showValidationMessage("Reason is required");
                  }
                  // Send the reason along with the AJAX request
                  return {
                     reason: reason
                  };
               }
            }).then((result) => {
               if (result.isConfirmed) {
                  var reason = result.value.reason; // Get the reason entered by the user
                  if (reason) {
                     // Send the reason along with the AJAX request
                     $.ajax({
                        type: "POST",
                        url: "action.php",
                        data: {
                           "delete_applicant_button": 1,
                           "delete_applicant_ID": deleteApplicantID,
                           "reason": reason, // Include the reason
                        },
                        success: function(response) {
                           Swal.fire({
                              title: "Successfully Deleted!",
                              icon: "success",
                           }).then((result) => {
                              location.reload();
                           });
                        },
                        error: function(xhr, status, error) {
                           console.log("AJAX Error: " + error);
                        }
                     });
                  }
               }
            });
         });
      });

      // For Undo Blacklisted Applicants
      $(document).ready(function() {
         $('.undoblacklistbtn').click(function(e) {
            e.preventDefault();

            var undoblacklistID = $(this).closest("tr").find('.undoblacklistID').val();
            Swal.fire({
               title: "Are you sure you want to undo this blacklisted applicant?",
               icon: "warning",
               showCancelButton: true,
               confirmButtonText: "Yes, undo this!",
               cancelButtonText: "No, cancel",
            }).then((willDelete) => {
               if (willDelete.isConfirmed) {
                  $.ajax({
                     type: "POST",
                     url: "action.php",
                     data: {
                        "undo_button_click": 1,
                        "undoblacklist_id": undoblacklistID,
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
         });
      });

      // For Undo Canceled Applicants
      $(document).ready(function() {
         $('.undocanceledbtn').click(function(e) {
            e.preventDefault();

            var undocanceledID = $(this).closest("tr").find('.undocanceledID').val();
            Swal.fire({
               title: "Are you sure you want to undo this canceled applicant?",
               icon: "warning",
               showCancelButton: true,
               confirmButtonText: "Yes, undo this!",
               cancelButtonText: "No, cancel",
            }).then((willDelete) => {
               if (willDelete.isConfirmed) {
                  $.ajax({
                     type: "POST",
                     url: "action.php",
                     data: {
                        "undo_canceled_button_click": 1,
                        "undocanceled_id": undocanceledID,
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
         });
      });

      // For Adding Applicants to shortlist
      $(document).ready(function() {
         $('.add_shortlist_btn').click(function(e) {
            e.preventDefault();

            var appno_ids = $(this).closest("tr").find('.appno_id').val();
            var app_number = $(this).closest("tr").find('.app_number').val();
            Swal.fire({
               title: "Are you sure you want to add this?",
               icon: "warning",
               showCancelButton: true,
               confirmButtonText: "Yes, add it!",
               cancelButtonText: "No, cancel",
            }).then((willDelete) => {
               if (willDelete.isConfirmed) {
                  $.ajax({
                     type: "POST",
                     url: "action.php",
                     data: {
                        "add_shortlist_click": 1,
                        "appno_id_click": appno_ids,
                        "appno_number_click": app_number,
                     },
                     success: function(response) {
                        // Parse the response as JSON
                        var jsonResponse = JSON.parse(response);
                        if (jsonResponse.message === "Successfully added to the shortlist") {
                           Swal.fire({
                              title: "Successfully Added!",
                              icon: "success"
                           }).then((result) => {
                              location.reload();
                           });
                        } else {
                           Swal.fire({
                              title: "Already Shortlisted",
                              icon: "error"
                           });
                        }
                     },
                     error: function() {
                        Swal.fire({
                           title: "Already Shortlisted",
                           icon: "error"
                        });
                     }
                  });
               }
            });
         });
      });


      // For Undo termination of Applicants
      $(document).ready(function() {
         $('.unterminate_me').click(function(e) {
            e.preventDefault();

            var unterminateID = $(this).closest("tr").find('.emp_number').val();

            Swal.fire({
               title: "Are you sure you want to unterminate this person?",
               icon: "warning",
               showCancelButton: true,
               confirmButtonText: "Yes, unterminate it!",
               cancelButtonText: "No, cancel",
               showCloseButton: true, // Add a close button

               // Customize the content of the modal
               html: '<input type="text" id="unterminateReason" placeholder="Enter reason for untermination" class="swal2-input">',

               preConfirm: () => {
                  // Retrieve the entered reason from the input field
                  var reason = document.getElementById("unterminateReason").value;

                  if (!reason) {
                     Swal.showValidationMessage("Reason is required");
                  }
                  // Send the reason along with the AJAX request
                  return {
                     reason: reason
                  };
               }
            }).then((result) => {
               if (result.isConfirmed) {
                  var reason = result.value.reason; // Get the reason entered by the user
                  if (reason) {
                     // Send the reason along with the AJAX request
                     $.ajax({
                        type: "POST",
                        url: "action.php",
                        data: {
                           "unterminate_applicant_button": 1,
                           "unterminate_applicant_ID": unterminateID,
                           "reason": reason, // Include the reason
                        },
                        success: function(response) {
                           Swal.fire({
                              title: "Successfully Unterminated!",
                              icon: "success",
                           }).then((result) => {
                              location.reload();
                           });
                        },
                        error: function(xhr, status, error) {
                           console.log("AJAX Error: " + error);
                        }
                     });
                  }
               }
            });
         });
      });

      // For Viewing details
      $(document).ready(function() {
         $('tbody').on('click', '.displaymo', function() {
            var Id = $(this).prev('.shadowd1').val();
            $('#viewdetails').modal('show');

            // load the corresponding question(s) for the clicked row
            $.ajax({
               url: 'view_details.php',
               type: 'post',
               data: {
                  view_button: 1,
                  id: Id
               },
               success: function(response) {
                  $('#viewdetails .modal-body').html(response);
               },
               error: function() {
                  alert('Error.');
               }
            });
         });
      });


      // For removing the applicants from the shortlist table
      $(document).ready(function() {
         $('.remove').click(function(e) {
            e.preventDefault();

            var app_num = $(this).closest("tr").find('.shadowE1').val();
            var shad = $(this).closest("tr").find('.shad').val();

            Swal.fire({
               title: "Are you sure you want to remove this from the shortlist?",
               icon: "warning",
               showCancelButton: true,
               confirmButtonText: "Yes, remove it!",
               cancelButtonText: "No, cancel",
            }).then((willDelete) => {
               if (willDelete.isConfirmed) {
                  $.ajax({
                     type: "POST",
                     url: "action.php",
                     data: {
                        "remove_button_click": 1,
                        "app_num": app_num,
                        "shad": shad,
                     },
                     success: function(response) {
                        // Parse the response as JSON
                        var jsonResponse = JSON.parse(response);
                        if (jsonResponse.message === "Successfully removed from the shortlist") {
                           Swal.fire({
                              title: "Successfully Removed!",
                              icon: "success"
                           }).then((result) => {
                              location.reload();
                           });
                        } else {
                           Swal.fire({
                              title: jsonResponse.message, // Display the error message from the server
                              icon: "error"
                           });
                        }
                     },
                     error: function(xhr, status, error) {
                        Swal.fire({
                           title: "Error: " + error, // Display a generic error message
                           icon: "error"
                        });
                     }
                  });
               }
            });
         });
      });

      // For deployment of applicants (Not Verify)
      $(document).ready(function() {
         $('.addtoewb').click(function(e) {
            e.preventDefault();

            var appnum_ID = $(this).closest("tr").find('.appno_deploy').val();
            Swal.fire({
               title: "Are you sure you want to deploy this applicant?",
               icon: "warning",
               showCancelButton: true,
               confirmButtonText: "Yes, deploy this!",
               cancelButtonText: "No, cancel",
            }).then((willDelete) => {
               if (willDelete.isConfirmed) {
                  $.ajax({
                     type: "POST",
                     url: "action.php",
                     data: {
                        "deploy_button_click": 1,
                        "deploy_id": appnum_ID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Successfully Deployed!",
                           icon: "success"
                        }).then((result) => {
                           location.reload();
                        });

                     }
                  });
               }
            });
         });
      });

      // For reverification of applicant that is declined by EWB
      $(document).ready(function() {
         $('.for_reverification_btn').click(function(e) {
            e.preventDefault();

            var for_reverification_id = $(this).closest("tr").find('.for_reverification_id').val();

            Swal.fire({
               title: "Input Remarks",
               icon: "warning",
               showCancelButton: true,
               confirmButtonText: "Send",
               cancelButtonText: "Cancel",
               showCloseButton: true, // Add a close button

               // Customize the content of the modal
               html: '<input type="text" id="reverificationReason" placeholder="Enter remarks" class="swal2-input">',

               preConfirm: () => {
                  // Retrieve the entered reason from the input field
                  var reason = document.getElementById("reverificationReason").value;

                  if (!reason) {
                     Swal.showValidationMessage("Reason is required");
                  }

                  // Log the reason to the console for debugging
                  console.log("Reason for blacklisting: " + reason);

                  // Send the reason along with the AJAX request
                  return {
                     reason: reason
                  };
               }
            }).then((result) => {
               if (result.isConfirmed) {
                  var reason = result.value.reason; // Get the reason entered by the user
                  if (reason) {
                     // Send the reason along with the AJAX request
                     $.ajax({
                        type: "POST",
                        url: "action.php",
                        data: {
                           "reverification_button": 1,
                           "reverificationID": for_reverification_id,
                           "reason": reason, // Include the reason
                        },
                        success: function(response) {
                           Swal.fire({
                              title: "Successful!",
                              icon: "success",
                           }).then((result) => {
                              location.reload();
                           });
                        },
                        error: function(xhr, status, error) {
                           console.log("AJAX Error: " + error);
                        }
                     });
                  }
               }
            });
         });
      });

      // For MRF providing shortlist
      $(document).ready(function() {
         $('.r_mrf').click(function(e) {
            e.preventDefault();

            var provideID = $(this).closest("tr").find('.mrf_id').val();
            Swal.fire({
               title: "Are you sure you want to provide to this MRF?",
               icon: "warning",
               showCancelButton: true,
               confirmButtonText: "Yes",
               cancelButtonText: "No, cancel",
            }).then((willDelete) => {
               if (willDelete.isConfirmed) {
                  $.ajax({
                     type: "POST",
                     url: "action.php",
                     data: {
                        "provideMRF_button_click": 1,
                        "provideID": provideID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Successfully Provided!",
                           icon: "success"
                        }).then((result) => {
                           location.reload();
                        });

                     }
                  });
               }
            });
         });
      });

      // For accepting MRF
      $(document).ready(function() {
         $('.r_mrfs').click(function(e) {
            e.preventDefault();

            var acceptID = $(this).closest("tr").find('.mrf_ids').val();
            Swal.fire({
               title: "Are you sure you want to accept this MRF?",
               icon: "warning",
               showCancelButton: true,
               confirmButtonText: "Yes, accept it!",
               cancelButtonText: "No, cancel",
            }).then((willDelete) => {
               if (willDelete.isConfirmed) {
                  $.ajax({
                     type: "POST",
                     url: "action.php",
                     data: {
                        "acceptMRF_button_click": 1,
                        "acceptID": acceptID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Successfully Accepted!",
                           icon: "success"
                        }).then((result) => {
                           location.reload();
                        });

                     }
                  });
               }
            });
         });
      });


      // Viewing of MRF
      $(document).ready(function() {
         $('tbody').on('click', '.btnview', function() {
            var Id = $(this).prev('.ids').val();
            $('#viewmrf').modal('show');

            // load the corresponding question(s) for the clicked row
            $.ajax({
               url: 'view_mrf.php',
               type: 'post',
               data: {
                  id: Id
               },
               success: function(response) {
                  $('#viewmrf .modal-body').html(response);
               },
               error: function() {
                  alert('Error.');
               }
            });
         });
      });

      // For Screening
      $(document).ready(function() {
         $('tbody').on('click', '.exampleModal', function() {
            var Id = $(this).prev('.exampleModalID').val();
            $('#exampleModal').modal('show');

            // load the corresponding question(s) for the clicked row
            $.ajax({
               url: 'ratings.php',
               type: 'post',
               data: {
                  id: Id
               },
               success: function(response) {
                  $('#exampleModal .modal-body').html(response);
               },
               error: function() {
                  alert('Error.');
               }
            });
         });
      });

      // For Update Screening
      $(document).ready(function() {
         $('tbody').on('click', '.editBtn', function() {
            var Id = $(this).prev('.editID').val();
            $('#editBtn').modal('show');

            // load the corresponding question(s) for the clicked row
            $.ajax({
               url: 'update_ratings.php',
               type: 'post',
               data: {
                  id: Id
               },
               success: function(response) {
                  $('#editBtn .modal-body').html(response);
               },
               error: function() {
                  alert('Error.');
               }
            });
         });
      });

      


      // For checkboxes of selecting applicants for shortlist
      const selectAll = document.getElementById('select-all');
      const userCheckboxes = document.querySelectorAll('input[name="user[]"]');

      // Check if 'selectAll' exists before adding an event listener
      if (selectAll) {
         selectAll.addEventListener('change', function() {
            userCheckboxes.forEach((checkbox) => {
               checkbox.checked = selectAll.checked;
            });
         });
      }

      // Add event listeners to user checkboxes to track selections
      userCheckboxes.forEach((checkbox) => {
         checkbox.addEventListener('change', function() {
            // Check if all user checkboxes are selected and update "Select All" accordingly
            if (selectAll) {
               selectAll.checked = [...userCheckboxes].every((cb) => cb.checked);
            }
         });
      });

      
   </script>
   <!-- Data Table -->
   <script>
      new DataTable('#example');
   </script>

   <!-- Tooltips Enabler -->
   <script>
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
      const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
   </script>

   <!-- Vendors JS -->
   <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

   <!-- Main JS -->
   <script src="../assets/js/main.js"></script>

   <!-- Page JS -->
   <script src="../assets/js/dashboards-analytics.js"></script>

   <!-- Place this tag in your head or just before your close body tag. -->
   <script async defer src="https://buttons.github.io/buttons.js"></script>