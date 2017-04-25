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
					<div class="panel-title">Application Payments</div>
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
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="pages_table">
						<thead>
							<tr>
								<th>Tracking Number</th>
								<th>Payment Date</th>
								<th>Reference Number</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$counter = 1;
								foreach($page_data as $page){
									$od_ev = ($counter%2==0)?'even':'odd';
																	
									echo "<tr class='".$od_ev." gradeX'>";
									echo "<td>".$app_dt[$page['application_id']]['tracking']."</td>";
									echo "<td>".$app_dt[$page['application_id']]['date']."</td>";
									echo "<td>".$page['reference_number']."</td>";
									echo "<td>".$page['status']."</td>";
									
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