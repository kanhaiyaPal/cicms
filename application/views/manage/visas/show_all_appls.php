<div class="page-content">
	<div class="row">
		<?php if(isset($sidebar)): ?>
		  <div class="col-md-2">
			<?php echo $sidebar; ?>
		  </div>
		  <?php endif; ?>
		  <div class="col-md-10">
		  	<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Visa Applications Submitted</div>
					<div class="panel-options">
					
					</div>
				</div>
				<div class="panel-body">
				<?php if($this->session->flashdata('page_created')): ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $this->session->flashdata('page_created');  ?>
				</div>
				<?php endif; ?>
				<?php if($this->session->flashdata('delete_success')): ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $this->session->flashdata('delete_success');  ?>
				</div>
				<?php endif; ?>
				<?php if($this->session->flashdata('update_success')): ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $this->session->flashdata('update_success');  ?>
				</div>
				<?php endif; ?>
				<div class="row">
					<form class="form-inline" action="" method="post">
						<div class="col-sm-2"></div>
						
						<div class="form-group col-sm-3">
						<input type="text" class="form-control bfh-datepicker_start" data-format="d-m-y" data-date="today" name="from_sr" value="<?php echo set_value('from_sr'); ?>" placeholder="From Date">
						</div>
						<div class="form-group col-sm-3">
						<input type="text" class="form-control bfh-datepicker_end" name="to_sr" value="<?php echo set_value('to_sr'); ?>" placeholder="To Date">
						</div>
						<div class="form-group col-sm-3">
						<input type="submit" name="sbmt_sr_dt" class="btn btn-primary" value="Search" />
						</div>
					</form>
					<div class="col-md-12"><br/></div>
				</div>
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="pages_table">
						<thead>
							<tr>
								<th>Applicant Name</th>
								<th>Arrival Date</th>
								<th>Departure Date</th>
								<th>Tracking Number</th>
								<th>Co-Applicants</th>
								<th>Options</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$counter = 1;
								foreach($page_data as $page){
									$od_ev = ($counter%2==0)?'even':'odd';
									$paymen = '';
									
									$ed_url = base_url('/manage/visaapplications/show_details_app/'.$page['id']);
									$dl_url = base_url('/manage/visaapplications/delete_application/'.$page['id']);
									
									if($page['tracking_no']!=''){
										$paymen = $page['tracking_no'];
									}else{ 
										$paymen = "Payment Pending";
									}
									
									echo "<tr class='".$od_ev." gradeX'>";
									echo "<td>".$page['applicant_firstname'].' '.$page['applicant_lastname']."</td>";
									echo "<td>".$page['arrival_date']."</td>";
									echo "<td>".$page['departure_date']."</td>";
									echo "<td>".$paymen."</td>";
									echo "<td>".$coapplicants[$page['id']]."</td>";
									echo "<td><a href='$ed_url' class='option_ico glyphicon glyphicon-eye-open'/>&nbsp;<a href='$dl_url' class='glyphicon glyphicon-trash'/></td>";
									
									echo "</tr>";
									$counter++;
								}
							?>
						</tbody>
					</table>
  				</div>
  			</div> 
		</div>
	</div>
</div>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">
<script>

$('.bfh-datepicker_start').datepicker({
	 dateFormat: "dd-mm-yy"
});
$('.bfh-datepicker_end').datepicker({
	 dateFormat: "dd-mm-yy"
});
</script>