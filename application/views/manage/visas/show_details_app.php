<div class="page-content">
    	<div class="row">
		<?php if(isset($sidebar)): ?>
		  <div class="col-md-2">
		  	<?php echo $sidebar; ?>
		  </div>
		  <?php endif; ?>
		  <div class="col-md-10">
		  	<div class="row">
		  		<div class="col-md-12">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Details of Submitted Visa Application</div>
								
								<div class="panel-options">
									<a href="<?=$back_url?>" data-rel="collapse"><i class="glyphicon glyphicon-circle-arrow-left"></i></a>
								</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
				  				<table class="table table-bordered">
									<tr><td><h4>Applicant details</h4></td></tr>
									<tr>
										<td>
										<table class="table table-bordered">
											<tr>
												<td><strong>Firstname</strong></td>
												<td><?=$page_data['applicant_firstname']?></td>
												<td><strong>Lastname</strong></td>
												<td><?=$page_data['applicant_lastname']?></td>
												<td><strong>DOB</strong></td>
												<td><?=$page_data['applicant_dob']?></td>
											</tr>
											<tr>
												<td><strong>Gender</strong></td>
												<td><?=ucfirst($page_data['applicant_gender'])?></td>
												<td><strong>Lastname</strong></td>
												<td><?=$page_data['applicant_lastname']?></td>
												<td><strong>DOB</strong></td>
												<td><?=$page_data['applicant_dob']?></td>
											</tr>
										</table>
										</td>
									</tr>
								</table>
								<br /><br />
							</div>
		  				</div>
		  			</div>
		  		</div>
		  	</div>
		  </div>
		</div>
    </div>