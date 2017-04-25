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
					<div class="panel-title">Testimonials</div>
					<div class="panel-options">
					<button class="btn btn-primary" onclick="window.location.href='<?php echo base_url('/manage/testimonials/add_new');?>'"><span class="glyphicon glyphicon-plus-sign"></span> Add New Testimonial</button>
					</div>
				</div>
				<div class="panel-body">
				<?php if($this->session->flashdata('testimonial_created')): ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $this->session->flashdata('testimonial_created');  ?>
				</div>
				<?php endif; ?>
				<?php if($this->session->flashdata('testimonial_delete_success')): ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $this->session->flashdata('testimonial_delete_success');  ?>
				</div>
				<?php endif; ?>
				<?php if($this->session->flashdata('testimonial_update_success')): ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $this->session->flashdata('testimonial_update_success');  ?>
				</div>
				<?php endif; ?>
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="pages_table">
						<thead>
							<tr>
								<th>Title</th>
								<th>Comapny</th>
								<th>Designation</th>
								<th>Order</th>
								<th>Options</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$counter = 1;
								foreach($testimonial_data as $testimonial){
									$od_ev = ($counter%2==0)?'even':'odd';
									
									$ed_url = base_url('/manage/testimonials/update/'.$testimonial['id']);
									$dl_url = base_url('/manage/testimonials/delete/'.$testimonial['id']);
									
									echo "<tr class='".$od_ev." gradeX'>";
									echo "<td>".$testimonial['title']."</td>";
									echo "<td>".$testimonial['company']."</td>";
									echo "<td>".$testimonial['designation']."</td>";
									echo "<td>".$testimonial['order_s']."</td>";
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