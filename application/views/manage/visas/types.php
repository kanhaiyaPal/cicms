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
					<div class="panel-title">Types of Visa Services Offered</div>
					<div class="panel-options">
					<button class="btn btn-primary" onclick="window.location.href='<?php echo base_url('/manage/visas/newvisa');?>'"><span class="glyphicon glyphicon-plus-sign"></span> Add New Visa Service</button>
					</div>
				</div>
				<div class="panel-body">
				<?php if($this->session->flashdata('visa_created')): ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $this->session->flashdata('visa_created');  ?>
				</div>
				<?php endif; ?>
				<?php if($this->session->flashdata('delete_visa_success')): ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $this->session->flashdata('delete_visa_success');  ?>
				</div>
				<?php endif; ?>
				<?php if($this->session->flashdata('update_visa_success')): ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $this->session->flashdata('update_visa_success');  ?>
				</div>
				<?php endif; ?>
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="pages_table">
						<thead>
							<tr>
								<th>Title</th>
								<th>Options</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$counter = 1;
								foreach($visa_data as $page){
									$od_ev = ($counter%2==0)?'even':'odd';
									
									$ed_url = base_url('/manage/visas/updatevisa/'.$page['id']);
									$dl_url = base_url('/manage/visas/deletevisa/'.$page['id']);
									
									echo "<tr class='".$od_ev." gradeX'>";
									echo "<td>".$page['title']."</td>";
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