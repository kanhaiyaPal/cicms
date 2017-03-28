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
			  					<div class="panel-title">Contact Enquiry Details</div>
								
								<div class="panel-options">
									<a href="<?=$back_url?>" data-rel="collapse"><i class="glyphicon glyphicon-circle-arrow-left"></i></a>
								</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
				  				<strong>Name : </strong><?=$contact_data['name']?> <br/>
								<strong>Email : </strong><?=$contact_data['name']?> <br/>
								<strong>Mobile : </strong><?=$contact_data['name']?> <br/>
								<strong>Message : </strong><?=$contact_data['message']?> <br/>
							</div>
		  				</div>
		  			</div>
		  		</div>
		  	</div>
		  </div>
		</div>
    </div>