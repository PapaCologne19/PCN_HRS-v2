   <!-- Core JS -->
   <!-- build:js assets/vendor/js/core.js -->
   <script src="../assets/vendor/libs/jquery/jquery.js"></script>
   <script src="../assets/vendor/libs/popper/popper.js"></script>
   <script src="../assets/vendor/js/bootstrap.js"></script>
   <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

   <script src="../assets/vendor/js/menu.js"></script>
   <!-- endbuild -->

   <!-- Confirmations Dialog Boxes -->
   <script>
      // Make LOA template default
      $(document).ready(function() {
         $('.make_default').click(function(e) {
            e.preventDefault();

            var make_defaultID = $(this).closest("tr").find('.template_id').val();
            Swal.fire({
               title: "Are you sure you want to set this as default?",
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
                        "make_default_button_click": 1,
                        "make_default_id": make_defaultID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Set as default Successful!",
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

      // Make LOA Inactive
      $(document).ready(function() {
         $('.make_inactive').click(function(e) {
            e.preventDefault();

            var make_inactiveID = $(this).closest("tr").find('.template_inactive_id').val();
            Swal.fire({
               title: "Are you sure you want to set this as inactive?",
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
                        "make_inactive_button_click": 1,
                        "make_inactive_id": make_inactiveID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Set as inactive Successful!",
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

      // Deleting Category
      $(document).ready(function() {
         $('.deleteCategoryBtn').click(function(e) {
            e.preventDefault();

            var deleteCategoryID = $(this).closest("tr").find('.deleteCategoryID').val();
            Swal.fire({
               title: "Are you sure you want to delete this?",
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
                        "delete_category_button": 1,
                        "delete_category_id": deleteCategoryID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Successful Deleted",
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

      // Undo Category
      $(document).ready(function() {
         $('.undoDeletedCategoryBtn').click(function(e) {
            e.preventDefault();

            var undoDeletedCategoryID = $(this).closest("tr").find('.undoDeletedCategoryID').val();
            Swal.fire({
               title: "Are you sure you want to undo this?",
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
                        "undo_delete_category_button": 1,
                        "undo_delete_category_id": undoDeletedCategoryID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Successful Undo",
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

      // Deleting Channels
      $(document).ready(function() {
         $('.deleteChannelBtn').click(function(e) {
            e.preventDefault();

            var deleteChannelID = $(this).closest("tr").find('.deleteChannelID').val();
            Swal.fire({
               title: "Are you sure you want to delete this?",
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
                        "delete_channel_button": 1,
                        "delete_channel_id": deleteChannelID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Successful Deleted",
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

      // Undo Category
      $(document).ready(function() {
         $('.undoDeletedChannelBtn').click(function(e) {
            e.preventDefault();

            var undoDeletedChannelID = $(this).closest("tr").find('.undoDeletedChannelID').val();
            Swal.fire({
               title: "Are you sure you want to undo this?",
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
                        "undo_delete_channel_button": 1,
                        "undo_delete_channel_id": undoDeletedChannelID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Successful Undo",
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

      // Deleting Classifications
      $(document).ready(function() {
         $('.deleteClassificationBtn').click(function(e) {
            e.preventDefault();

            var deleteClassificationID = $(this).closest("tr").find('.deleteClassificationID').val();
            Swal.fire({
               title: "Are you sure you want to delete this?",
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
                        "delete_classification_button": 1,
                        "delete_classification_id": deleteClassificationID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Successful Deleted",
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

      // Undo Classifications
      $(document).ready(function() {
         $('.undoDeletedClassificationBtn').click(function(e) {
            e.preventDefault();

            var undoDeletedClassificationID = $(this).closest("tr").find('.undoDeletedClassificationID').val();
            Swal.fire({
               title: "Are you sure you want to undo this?",
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
                        "undo_delete_classification_button": 1,
                        "undo_delete_classification_id": undoDeletedClassificationID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Successful Undo",
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

      // Deleting Client Company
      $(document).ready(function() {
         $('.deleteClientCompanyBtn').click(function(e) {
            e.preventDefault();

            var deleteClientCompanyID = $(this).closest("tr").find('.deleteClientCompanyID').val();
            Swal.fire({
               title: "Are you sure you want to delete this?",
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
                        "delete_client_company_button": 1,
                        "delete_client_company_id": deleteClientCompanyID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Successful Deleted",
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

      // Undo Client Company
      $(document).ready(function() {
         $('.undoDeletedClientCompanyBtn').click(function(e) {
            e.preventDefault();

            var undoDeletedClientCompanyID = $(this).closest("tr").find('.undoDeletedClientCompanyID').val();
            Swal.fire({
               title: "Are you sure you want to undo this?",
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
                        "undo_delete_client_company_button": 1,
                        "undo_delete_client_company_id": undoDeletedClientCompanyID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Successful Undo",
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

      // Deleting Divisions
      $(document).ready(function() {
         $('.deleteDivisionBtn').click(function(e) {
            e.preventDefault();

            var deleteDivisionID = $(this).closest("tr").find('.deleteDivisionID').val();
            Swal.fire({
               title: "Are you sure you want to delete this?",
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
                        "delete_division_button": 1,
                        "delete_division_id": deleteDivisionID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Successful Deleted",
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

      // Undo Division
      $(document).ready(function() {
         $('.undoDeletedDivisionBtn').click(function(e) {
            e.preventDefault();

            var undoDeletedDivisionID = $(this).closest("tr").find('.undoDeletedDivisionID').val();
            Swal.fire({
               title: "Are you sure you want to undo this?",
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
                        "undo_delete_division_button": 1,
                        "undo_delete_division_id": undoDeletedDivisionID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Successful Undo",
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

      // Deleting Identification Marks
      $(document).ready(function() {
         $('.deleteIdentificationMarkBtn').click(function(e) {
            e.preventDefault();

            var deleteIdentificationMarkID = $(this).closest("tr").find('.deleteIdentificationMarkID').val();
            Swal.fire({
               title: "Are you sure you want to delete this?",
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
                        "delete_identification_mark_button": 1,
                        "delete_identification_mark_id": deleteIdentificationMarkID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Successful Deleted",
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

      // Undo Identification Mark
      $(document).ready(function() {
         $('.undoDeletedIdentificationMarkBtn').click(function(e) {
            e.preventDefault();

            var undoDeletedIdentificationMarkID = $(this).closest("tr").find('.undoDeletedIdentificationMarkID').val();
            Swal.fire({
               title: "Are you sure you want to undo this?",
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
                        "undo_delete_identification_mark_button": 1,
                        "undo_delete_identification_mark_id": undoDeletedIdentificationMarkID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Successful Undo",
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

      // Deleting Source
      $(document).ready(function() {
         $('.deleteSourceBtn').click(function(e) {
            e.preventDefault();

            var deleteSourceID = $(this).closest("tr").find('.deleteSourceID').val();
            Swal.fire({
               title: "Are you sure you want to delete this?",
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
                        "delete_source_button": 1,
                        "delete_source_id": deleteSourceID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Successful Deleted",
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

      // Undo Source
      $(document).ready(function() {
         $('.undoDeletedSourceBtn').click(function(e) {
            e.preventDefault();

            var undoDeletedSourceID = $(this).closest("tr").find('.undoDeletedSourceID').val();
            Swal.fire({
               title: "Are you sure you want to undo this?",
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
                        "undo_delete_source_button": 1,
                        "undo_delete_source_id": undoDeletedSourceID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Successful Undo",
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


      // Deleting Project
      $(document).ready(function() {
         $('.deleteProjectBtn').click(function(e) {
            e.preventDefault();

            var deleteProjectID = $(this).closest("tr").find('.deleteProjectID').val();
            Swal.fire({
               title: "Are you sure you want to delete this?",
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
                        "delete_project_button": 1,
                        "delete_project_id": deleteProjectID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Successful Deleted",
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

      // Undo Deleted Project
      $(document).ready(function() {
         $('.undoDeletedProjectBtn').click(function(e) {
            e.preventDefault();

            var undoDeletedProjectID = $(this).closest("tr").find('.undoDeletedProjectID').val();
            Swal.fire({
               title: "Are you sure you want to undo this?",
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
                        "undo_delete_project_button": 1,
                        "undo_delete_project_id": undoDeletedProjectID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Successful Undo",
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

      // Change the status of project - Active
      $(document).ready(function() {
         $('.changeProjectStatusActiveBtn').click(function(e) {
            e.preventDefault();

            var changeProjectStatusActiveID = $(this).closest("tr").find('.changeProjectStatusActiveID').val();
            Swal.fire({
               title: "Are you sure you want to change the status to active?",
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
                        "change_project_status_active_button": 1,
                        "change_project_status_active_id": changeProjectStatusActiveID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Successful Changes",
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

      // Change the status of project - Inactive
      $(document).ready(function() {
         $('.changeProjectStatusInactiveBtn').click(function(e) {
            e.preventDefault();

            var changeProjectStatusInactiveID = $(this).closest("tr").find('.changeProjectStatusInactiveID').val();
            Swal.fire({
               title: "Are you sure you want to change the status to Inactive?",
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
                        "change_project_status_inactive_button": 1,
                        "change_project_status_inactive_id": changeProjectStatusInactiveID,
                     },
                     success: function(response) {

                        Swal.fire({
                           title: "Successful Changes",
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