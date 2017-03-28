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
					<div class="panel-title">Visa Services</div>
					<div class="panel-options">
					<button class="btn btn-primary" onclick="window.location.href='<?php echo base_url('/manage/visas/newservice');?>'"><span class="glyphicon glyphicon-plus-sign"></span> Add New Service </button>
					</div>
				</div>
				<div class="panel-body">
				<?php if($this->session->flashdata('service_created')): ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $this->session->flashdata('service_created');  ?>
				</div>
				<?php endif; ?>
				<?php if($this->session->flashdata('service_delete_success')): ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $this->session->flashdata('service_delete_success');  ?>
				</div>
				<?php endif; ?>
				<?php if($this->session->flashdata('service_update_success')): ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $this->session->flashdata('service_update_success');  ?>
				</div>
				<?php endif; ?>
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="pages_table">
						<thead>
							<tr>
								<th>Title</th>
								<th>For Citizen</th>
								<th>Travelling To</th>
								<th>Visa Type</th>
								<th>Status</th>
								<th>Options</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$counter = 1;
								foreach($service_data as $page){
									$od_ev = ($counter%2==0)?'even':'odd';
									$pb_st = ($page['is_active']=='1')?'glyphicon glyphicon-eye-open':'glyphicon glyphicon-eye-close';
									$ed_url = base_url('/manage/visas/update_service/'.$page['id']);
									$dl_url = base_url('/manage/visas/delete_service/'.$page['id']);
									
									echo "<tr class='".$od_ev." gradeX'>";
									echo "<td>".$page['service_title']."</td>";
									echo "<td>";
									foreach($country_list as $country){ if($country['id']==$page['for_citizen']){ echo $country['country_name']; break; } }
									echo "</td>";
									echo "<td>";
									foreach($country_list as $country){ if($country['id']==$page['travelling_to']){ echo $country['country_name']; break; } }
									echo "</td>";
									echo "<td>";
									foreach($visa_types as $visa){ if($visa['id']==$page['visa_type']){ echo $visa['title']; break; } }
									echo "</td>";
									echo "<td><span class='".$pb_st."'></span></td>";
									echo "<td><a href='$ed_url' class='option_ico glyphicon glyphicon-edit'/>&nbsp;<a href='$dl_url' class='glyphicon glyphicon-trash'/></td>";
									
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