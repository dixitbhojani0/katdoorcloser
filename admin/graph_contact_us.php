<div class="col-md-12 col-sm-6">
  <div class="portlet light ">
    <div class="portlet-title">
      <div class="caption ">
        <span class="caption-subject bold uppercase font-dark">Contact Us</span>
        <span class="caption-helper">Monthly Contact Us stats...</span>
      </div>
      <div class="actions">
        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
      </div>
    </div>
    <div class="portlet-body">
      <div class="row">
        <div class="col-sm-12 pull-right">
          <div class="col-sm-4">
            <select onChange="" class="form-control" name="year_order" id="year_order">
              <option value="">Select Year </option>
              <?php 
                $reg_year=date("Y","2017");
                $curr_year=date("Y");
                $current_date=date('Y-m-d');
                $adate1 = date('Y', strtotime($current_date));
                	//echo $adate1;
                for ($i=$curr_year-$reg_year; $i>=0;$i--) {
                	
                	?>
              <option <?php echo ($i==$curr_year-$reg_year)?"selected":"" ; ?> value="<?php echo $reg_year+$i; ?>"><?php echo $reg_year+$i; ?></option>
              <?php
                }
                ?>
            </select>
          </div>
          <div class="col-sm-4">
            <select class="form-control" name="month_order" id="month_order">
              <option value="">Select Month</option>
              <?php 
                $months = array("January", "February", "March", "April", "May", "June","julay","August","September","October","November","December");
                foreach ($months as $month) {
                	
                	?>
              <option <?php echo ($month==date("F"))?"selected":"" ; ?> value="<?php echo date("m", strtotime($month));?>"><?php echo $month;?></option>
              <?php
                }
                ?>
            </select>
          </div>
          <div class="col-xs-1">
            <a href="javascript:;"  onClick="return ContactGraph.contactinit();" class="btn btn-circle red-sunglo ">
            <i class="fa fa-refresh"></i> Refresh </a>
          </div>
        </div>
      </div>
      <div id="dashboard_amchart_3" class="CSSAnimationChart"></div>
    </div>
  </div>
</div>
<!-- <script src="js/graph_contact_us.js" type="text/javascript"></script> -->