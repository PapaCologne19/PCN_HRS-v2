<!-- Modal HTML -->
<div id="myModalmrf" class="modal fade">
    <!--<div class="howx">-->
    <div class="modal-dialog  modal-xl">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Report</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>


        <div class="modal-body">
          
        </div>

        <div class="modal-footer">
          <form action="" method="POST">
            <button class="btn btn-primary" Name="cancel"><span>OK</span></button>

          </form>
          </form>
        </div>

      </div>
    </div>
    <!-- </div> -->
  </div>


  <!-- For select -->
<?php 
"SELECT DISTINCT appnumto
FROM shortlist_master
WHERE shortlistnameto != '$data'
AND appnumto NOT IN (
    SELECT appnumto
    FROM shortlist_master
    WHERE shortlistnameto = '$data');"
?>