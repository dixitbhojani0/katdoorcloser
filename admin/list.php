<style type="text/css"> 
  .table1 td
  {
  overflow-wrap: break-word;
  }
</style>
<div class="col-md-12 col-sm-12" style="height: auto;">
  <div class="portlet light ">
    <div class="portlet-title">
      <div class="caption ">
        <span class="caption-subject bold uppercase font-dark">Latest Top 5 Contact Message </span>
      </div>
    </div>
    <div class="portlet-body">
      <div>
        <div class="portlet-body">
          <table class="table table-striped table-bordered table-hover table1" style="table-layout: fixed;">
            <thead>
              <tr>
                <th width="10px">ID</th>
                <th width="30px">Name</th>
                <th width="30px">Email</th>
                <th width="30px">Message</th>
                <th width="30px">Date</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $Transactions=$db->rp_getData("contact_us","*","isDelete=0 AND isActive=1","id DESC LIMIT 5",0);
                if($Transactions)
                {
                	$count=1;
                while($Transactions_d=mysqli_fetch_assoc($Transactions))
                {
                	
                	?>
              <tr>
                <td><?php echo $count++; ?></td>
                <td><?= $Transactions_d['name'];?></td>
                <td><?= $Transactions_d['email'];?></td>
                <td><?= $Transactions_d['message'];?></td>
                <td><?= date("d-m-Y H:i:s A",strtotime($Transactions_d['created_date']));?></td>
              </tr>
              <?php
                }
                }
                else
                {
                ?>
              <tr>
                <td colspan="5" class="text-center">No Record Found</td>
              </tr>
              <?php
                }
                ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- <div style="padding-bottom: 10px;">
        <a href="#" style="float: right">Click Here to View More Transactions</a>
        </div> -->
    </div>
  </div>
</div>
<!-- <?php 
  $count_approved_payment=$db->rp_getTotalRecord("dealer_payment","status=1 AND isDelete=0 AND isActive=1");
  $count_rejected_payment=$db->rp_getTotalRecord("dealer_payment","status=2 AND isDelete=0 AND isActive=1");
  ?> -->
<!-- <script src="assets/global/plugins/amcharts/amcharts/amcharts.js"></script> -->
<!-- <script src="assets/global/plugins/amcharts/amcharts/serial.js"></script> -->
<!-- <script>
  var count_approved_payment="<?php echo $count_approved_payment;?>";
  var count_rejected_payment="<?php echo $count_rejected_payment;?>";
  //bar chart
  var chart = AmCharts.makeChart("chart_4", {
      "theme": "light",
      "type": "serial",
      "startDuration": 2,
      "dataProvider": [{
          "country": "Approved",
          "visits": count_approved_payment,
          "color": "#26a69a"
      },  {
          "country": "Rejected",
          "visits": count_rejected_payment,
          "color": "#FF0F00"
      }],
      "valueAxes": [{
          "position": "left",
          "axisAlpha":0,
          "gridAlpha":0
      }],
      "graphs": [{
          "balloonText": "[[category]]: <b>[[value]]</b>",
          "colorField": "color",
          "fillAlphas": 0.85,
          "lineAlpha": 0.1,
          "type": "column",
          "topRadius":1,
          "valueField": "visits"
      }],
      "depth3D": 40,
  	"angle": 30,
      "chartCursor": {
          "categoryBalloonEnabled": false,
          "cursorAlpha": 0,
          "zoomable": false
      },
      "categoryField": "country",
      "categoryAxis": {
          "gridPosition": "start",
          "axisAlpha":0,
          "gridAlpha":0
  
      },
      "export": {
      	"enabled": true
       }
  
  }, 0);
  </script> -->
<!-- datatable start nency-->
<!-- <script>
  function loadDataTable(){
      $('#datatable_1').dataTable({
          "bPaginate": false,
          "bFilter": false,
          "bInfo": false,
          "bAutoWidth": false,
          "aoColumns": [
                { "sWidth": "5%" },
                { "sWidth": "30%" },
                { "sWidth": "10%" },
                { "sWidth": "10%"},
                { "sWidth": "10%"},
                { "sWidth": "10%"},
                { "sWidth": "10%"},
                { "sWidth": "25%","bSortable": false }
              ]
      });
  }
  </script> -->
<!-- HTML -->