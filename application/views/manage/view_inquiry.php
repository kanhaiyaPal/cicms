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
					<div class="panel-title">Contact Form  Inquiry</div>
					<div class="panel-options">
					
					</div>
				</div>
				<div class="panel-body">
				<?php if($this->session->flashdata('delete_contact_success')): ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $this->session->flashdata('delete_contact_success');  ?>
				</div>
				<?php endif; ?>
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="pages_table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Source</th>
								<th>Options</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$counter = 1;
								foreach($contact_data as $contact){
									$od_ev = ($counter%2==0)?'even':'odd';
									
									$ed_url = base_url('/manage/pages/view_details_inquiry/'.$contact['id']);
									$dl_url = base_url('/manage/pages/delete_inquiry/'.$contact['id']);
									
									echo "<tr class='".$od_ev." gradeX'>";
									echo "<td>".$contact['name']."</td>";
									echo "<td>".$contact['email']."</td>";
									echo "<td>".$contact['mobile']."</td>";
									echo "<td>".$contact['source']."</td>";
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