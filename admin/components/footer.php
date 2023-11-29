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
      $('#example').on('click', '.make_default', function(e) {
         e.preventDefault();

         var make_defaultID = $(this).closest("tr").find('.template_id').val();

         Swal.fire({
            title: "Are you sure you want to set this as default?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "make_default_button_click": 1,
                     "make_default_id": make_defaultID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


      // Make LOA Inactive
      $('#example').on('click', '.make_inactive', function(e) {
         e.preventDefault();

         var make_inactiveID = $(this).closest("tr").find('.template_inactive_id').val();

         Swal.fire({
            title: "Are you sure you want to set this as inactive?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "make_inactive_button_click": 1,
                     "make_inactive_id": make_inactiveID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


      // Deleting Category
      $('#example').on('click', '.deleteCategoryBtn', function(e) {
         e.preventDefault();

         var deleteCategoryID = $(this).closest("tr").find('.deleteCategoryID').val();

         Swal.fire({
            title: "Are you sure you want to delete?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "delete_category_button": 1,
                     "delete_category_id": deleteCategoryID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


      // Undo Category
      $('#example').on('click', '.undoDeletedCategoryBtn', function(e) {
         e.preventDefault();

         var undoDeletedCategoryID = $(this).closest("tr").find('.undoDeletedCategoryID').val();

         Swal.fire({
            title: "Are you sure you want to undo?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "undo_delete_category_button": 1,
                     "undo_delete_category_id": undoDeletedCategoryID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


      // Deleting Channels
      $('#example').on('click', '.deleteChannelBtn', function(e) {
         e.preventDefault();

         var deleteChannelID = $(this).closest("tr").find('.deleteChannelID').val();

         Swal.fire({
            title: "Are you sure you want to delete?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "delete_channel_button": 1,
                     "delete_channel_id": deleteChannelID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


      // Undo Category
      $('#example').on('click', '.undoDeletedChannelBtn', function(e) {
         e.preventDefault();

         var undoDeletedChannelID = $(this).closest("tr").find('.undoDeletedChannelID').val();

         Swal.fire({
            title: "Are you sure you want to undo?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "undo_delete_channel_button": 1,
                     "undo_delete_channel_id": undoDeletedChannelID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


      // Deleting Classifications
      $('#example').on('click', '.deleteClassificationBtn', function(e) {
         e.preventDefault();

         var deleteClassificationID = $(this).closest("tr").find('.deleteClassificationID').val();

         Swal.fire({
            title: "Are you sure you want to delete?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "delete_classification_button": 1,
                     "delete_classification_id": deleteClassificationID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


      // Undo Classifications
      $('#example').on('click', '.undoDeletedClassificationBtn', function(e) {
         e.preventDefault();

         var undoDeletedClassificationID = $(this).closest("tr").find('.undoDeletedClassificationID').val();

         Swal.fire({
            title: "Are you sure you want to undo?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "undo_delete_classification_button": 1,
                     "undo_delete_classification_id": undoDeletedClassificationID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


      // Deleting Client Company
      $('#example').on('click', '.deleteClientCompanyBtn', function(e) {
         e.preventDefault();

         var deleteClientCompanyID = $(this).closest("tr").find('.deleteClientCompanyID').val();

         Swal.fire({
            title: "Are you sure you want to delete?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "delete_client_company_button": 1,
                     "delete_client_company_id": deleteClientCompanyID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


      // Undo Client Company
      $('#example').on('click', '.undoDeletedClientCompanyBtn', function(e) {
         e.preventDefault();

         var undoDeletedClientCompanyID = $(this).closest("tr").find('.undoDeletedClientCompanyID').val();

         Swal.fire({
            title: "Are you sure you want to undo?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "undo_delete_client_company_button": 1,
                     "undo_delete_client_company_id": undoDeletedClientCompanyID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


      // Deleting Divisions
      $('#example').on('click', '.deleteDivisionBtn', function(e) {
         e.preventDefault();

         var deleteDivisionID = $(this).closest("tr").find('.deleteDivisionID').val();

         Swal.fire({
            title: "Are you sure you want to delete?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "delete_division_button": 1,
                     "delete_division_id": deleteDivisionID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


      // Undo Division
      $('#example').on('click', '.undoDeletedDivisionBtn', function(e) {
         e.preventDefault();

         var undoDeletedDivisionID = $(this).closest("tr").find('.undoDeletedDivisionID').val();

         Swal.fire({
            title: "Are you sure you want to undo?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "undo_delete_division_button": 1,
                     "undo_delete_division_id": undoDeletedDivisionID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


      // Deleting Identification Marks
      $('#example').on('click', '.deleteIdentificationMarkBtn', function(e) {
         e.preventDefault();

         var deleteIdentificationMarkID = $(this).closest("tr").find('.deleteIdentificationMarkID').val();

         Swal.fire({
            title: "Are you sure you want to delete?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "delete_identification_mark_button": 1,
                     "delete_identification_mark_id": deleteIdentificationMarkID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


      // Undo Identification Mark
      $('#example').on('click', '.undoDeletedIdentificationMarkBtn', function(e) {
         e.preventDefault();

         var undoDeletedIdentificationMarkID = $(this).closest("tr").find('.undoDeletedIdentificationMarkID').val();

         Swal.fire({
            title: "Are you sure you want to undo?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "undo_delete_identification_mark_button": 1,
                     "undo_delete_identification_mark_id": undoDeletedIdentificationMarkID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


      // Deleting Source
      $('#example').on('click', '.deleteSourceBtn', function(e) {
         e.preventDefault();

         var deleteSourceID = $(this).closest("tr").find('.deleteSourceID').val();

         Swal.fire({
            title: "Are you sure you want to delete?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "delete_source_button": 1,
                     "delete_source_id": deleteSourceID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


      // Undo Source
      $('#example').on('click', '.undoDeletedSourceBtn', function(e) {
         e.preventDefault();

         var undoDeletedSourceID = $(this).closest("tr").find('.undoDeletedSourceID').val();

         Swal.fire({
            title: "Are you sure you want to undo?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "undo_delete_source_button": 1,
                     "undo_delete_source_id": undoDeletedSourceID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });



      // Deleting Project
      $('#example').on('click', '.deleteProjectBtn', function(e) {
         e.preventDefault();

         var deleteProjectID = $(this).closest("tr").find('.deleteProjectID').val();

         Swal.fire({
            title: "Are you sure you want to delete?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "delete_project_button": 1,
                     "delete_project_id": deleteProjectID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


      // Undo Deleted Project
      $('#example').on('click', '.undoDeletedProjectBtn', function(e) {
         e.preventDefault();

         var undoDeletedProjectID = $(this).closest("tr").find('.undoDeletedProjectID').val();

         Swal.fire({
            title: "Are you sure you want to undo?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "undo_delete_project_button": 1,
                     "undo_delete_project_id": undoDeletedProjectID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


      // Change the status of project - Active
      $('#example').on('click', '.changeProjectStatusActiveBtn', function(e) {
         e.preventDefault();

         var changeProjectStatusActiveID = $(this).closest("tr").find('.changeProjectStatusActiveID').val();

         Swal.fire({
            title: "Are you sure you want to change the status to active?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "change_project_status_active_button": 1,
                     "change_project_status_active_id": changeProjectStatusActiveID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Successful Changes",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


      // Change the status of project - Inactive
      $('#example').on('click', '.changeProjectStatusInactiveBtn', function(e) {
         e.preventDefault();

         var changeProjectStatusInactiveID = $(this).closest("tr").find('.changeProjectStatusInactiveID').val();

         Swal.fire({
            title: "Are you sure you want to change the status to Inactive?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "change_project_status_inactive_button": 1,
                     "change_project_status_inactive_id": changeProjectStatusInactiveID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Successful Changes",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


      // Deleting History
      $('#example').on('click', '.deletedHistoryBtn', function(e) {
         e.preventDefault();

         var deletedHistoryID = $(this).closest("tr").find('.deletedHistoryID').val();

         Swal.fire({
            title: "Are you sure you want to delete?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "delete_history_button": 1,
                     "delete_history_id": deletedHistoryID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });



      // Undo Deleted History
      $('#example').on('click', '.undoDeletedHistoryBtn', function(e) {
         e.preventDefault();

         var undoDeletedHistoryID = $(this).closest("tr").find('.undoDeletedHistoryID').val();

         Swal.fire({
            title: "Are you sure you want to undo?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No",
         }).then((willUndo) => {
            if (willUndo.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "undo_delete_history_button": 1,
                     "undo_delete_history_id": undoDeletedHistoryID,
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


      // Deleting LOA History 
      $('#example').on('click', '.deleteLOA_Btn', function(e) {
         e.preventDefault();

         var deleteLOA_ID = $(this).closest("tr").find('.deleteLOA_ID').val();

         Swal.fire({
            title: "Are you sure you want to delete?",
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
                     "delete_loa_history_button": 1,
                     "delete_loa_history_id": deleteLOA_ID,
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


      // Undo Deleted LOA History
      $('#example').on('click', '.undoDeleteLOA_Btn', function(e) {
         e.preventDefault();

         var undoDeleteLOA_ID = $(this).closest("tr").find('.undoDeleteLOA_ID').val();

         Swal.fire({
            title: "Are you sure you want to undo?",
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
                     "undo_delete_loa_history_button": 1,
                     "undo_delete_loa_history_id": undoDeleteLOA_ID,
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });


       // Deleting User
       $('#example').on('click', '.delete_user_btn', function(e) {
         e.preventDefault();

         var delete_id = $(this).closest("tr").find('.delete_id').val();

         Swal.fire({
            title: "Are you sure you want to delete?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "delete_user_button": 1,
                     "delete_user_id": delete_id
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });

      // Undo Deleted User
      $('#example').on('click', '.undo_deleted_user_btn', function(e) {
         e.preventDefault();

         var undo_deleted_id = $(this).closest("tr").find('.undo_deleted_id').val();

         Swal.fire({
            title: "Are you sure you want to Undo?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "undo_delete_user_button": 1,
                     "undo_delete_user_id": undo_deleted_id
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });

      // Deleting Applicant
      $('#example').on('click', '.delete_applicant_account_btn', function(e) {
         e.preventDefault();

         var delete_applicant_id = $(this).closest("tr").find('.delete_applicant_id').val();

         Swal.fire({
            title: "Are you sure you want to delete?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "delete_applicant_account_btn": 1,
                     "delete_applicant_id": delete_applicant_id
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });

      // Undo Deleted Applicant
      $('#example').on('click', '.undo_type_of_separation_Btn', function(e) {
         e.preventDefault();

         var undo_type_of_separation_ID = $(this).closest("tr").find('.undo_type_of_separation_ID').val();

         Swal.fire({
            title: "Are you sure you want to Undo?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "undo_delete_type_of_separation_button": 1,
                     "undo_type_of_separation_ID": undo_type_of_separation_ID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });

      // Deleting Types of Separation
      $('#example').on('click', '.delete_type_of_separation_Btn', function(e) {
         e.preventDefault();

         var delete_type_of_separation_ID = $(this).closest("tr").find('.delete_type_of_separation_ID').val();

         Swal.fire({
            title: "Are you sure you want to delete?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "delete_type_of_separation_Btn": 1,
                     "delete_type_of_separation_ID": delete_type_of_separation_ID
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });

      // Undo Deleted Types of Separation
      $('#example').on('click', '.undo_delete_applicant_account_btn', function(e) {
         e.preventDefault();

         var undo_delete_applicant_id = $(this).closest("tr").find('.undo_delete_applicant_id').val();

         Swal.fire({
            title: "Are you sure you want to Undo?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "undo_delete_applicant_button": 1,
                     "undo_delete_applicant_id": undo_delete_applicant_id
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });

      // Deleting Applicant Resume (Not Permanent)
      $('#example').on('click', '.delete_resume_btn', function(e) {
         e.preventDefault();

         var delete_resume_id = $(this).closest("tr").find('.delete_resume_id').val();

         Swal.fire({
            title: "Are you sure you want to delete?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "delete_resume_Btn": 1,
                     "delete_resume_id": delete_resume_id
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });

      // Undo Deleted Types of Separation
      $('#example').on('click', '.undo_delete_resume_btn', function(e) {
         e.preventDefault();

         var undo_delete_resume_id = $(this).closest("tr").find('.undo_delete_resume_id').val();

         Swal.fire({
            title: "Are you sure you want to Undo?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                     "undo_delete_resume_button": 1,
                     "undo_delete_resume_id": undo_delete_resume_id
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
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