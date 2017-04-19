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
					<div class="panel-title">Manage Tracking of Applications</div>
					<div class="panel-options">
					
					</div>
				</div>
				<div class="panel-body">
				<?php if($this->session->flashdata('update_success')): ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $this->session->flashdata('update_success');  ?>
				</div>
				<?php endif; ?>
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="pages_table">
						<thead>
							<tr>
								<th>Applicant Name</th>
								<th>Tracking Number</th>
								<th>Tracking Status</th>
								<th>Co-Applicants</th>
								<th>Options</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$counter = 1;
								foreach($page_data as $page){
									$od_ev = ($counter%2==0)?'even':'odd';
									$paymen = ''; $t_status= '';
									
									$ed_url = base_url('/manage/visaapplications/applicant_tracking_modify/'.$page['id']);
																		
									if($page['tracking_no']!=''){
										$paymen = $page['tracking_no'];
									}else{ 
										$paymen = "Payment Pending";
									}
									
									echo "<tr class='".$od_ev." gradeX'>";
									echo "<td>".$page['applicant_firstname'].' '.$page['applicant_lastname']."</td>";
									echo "<td>".$paymen."</td>";
									echo "<td>".$app_status[$page['id']]."</td>";
									echo "<td>".$coapplicants[$page['id']]."</td>";
									echo "<td><a title='Change Tracking Status' href='$ed_url' class='option_ico glyphicon glyphicon-edit'/></td>";
									
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