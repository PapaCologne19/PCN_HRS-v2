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