<div class="inner-banner">
  <div class="container">
    <h2>
      <?=$title?>
    </h2>
  </div>
</div>
<div class="container">
  <h1><?=$title?><span></span></h1>
  <form name="edit_appl_form" action="<?=base_url('frontend/visas_front/edit_applicant')?>" enctype="multipart/form-data" method="post" class="form-inline">
	<div class="row">
		<div class="col-md-12">
			  <fieldset>
			  <legend>Travel information</legend>
			 <div class="form-group col-md-6">
				<div class="input-group">
					<input style="margin:0" type="text" class="form-control datepicker_ar" id="arrival_date_uae" placeholder="Arrival Date to UAE" value="<?=$applicant_data['arrival_date']?>">
					<label class="input-group-addon btn" for="arrival_date_uae">
				     <i class="fa fa-calendar"></i>
				    </label>
				</div>
			  </div>
			  <div class="form-group col-md-6">
				<div class="input-group">
					<input style="margin:0" type="text" class="form-control datepicker_dep" id="departure_date_uae" placeholder="Departure Date from UAE" value="<?=$applicant_data['departure_date']?>">
				    <label class="input-group-addon btn" for="departure_date_uae">
				     <i class="fa fa-calendar"></i>
				    </label>
				</div>
			  </div>
			 </fieldset>
			 <br/>
			 <fieldset>
			  <legend>Contact Details</legend>
			 <div class="form-group col-md-6">
				  <label>Present Address</label>
                  <textarea class="form-control" name="text-current-address" placeholder="Present Address" rows="3"><?=$applicant_data['present_address']?></textarea>
				  <div class="row">
				  <div class="col-md-6">
					<select class="form-control">
					 <option value="0" >Country</option>
					  <?php if(!empty($country_list)): foreach($country_list as $country): ?>
					  <option value="<?=$country['id']?>" <?php if($applicant_data['applicant_living_in'] == $country['id']){ echo "selected"; }?>><?=$country['country_name']?></option>
					  <?php endforeach; endif; ?>
					</select>
				  </div>
				  <div class="col-md-6"></div>
				  <div class="col-md-6"></div>
				  <div class="col-md-6"></div>
				  </div>
			 </div>
			 <div class="form-group col-md-6">
				<label>Address in UAE</label>
                  <textarea class="form-control" name="text-current-address" placeholder="Present Address" rows="3"><?=$applicant_data['uae_hotel_address']?></textarea>
				  <div class="col-md-6"></div>
				  <div class="col-md-6"></div>
			 </div>
			 </fieldset>
		</div>
	</div>
  </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0-RC1/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0-RC1/css/bootstrap-datepicker.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/js/edit_front_app.js"></script>