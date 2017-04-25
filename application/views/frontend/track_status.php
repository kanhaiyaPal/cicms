<div class="h-slider">
  <div class="container">
  <div class="hs-content">  
    <h3>Track Applicatiin Status</h3>
    <h2> Enter your Reference and Passport Number</h2>
  </div>
  
  <div class="search-panel">
  <?php if(isset($sr_err)): ?>
  <div class="alert alert-danger">Sorry! No Details found for data entered. Please Try again.</div>
  <?php endif; ?>
  <?php if(validation_errors()): ?>
  <div class="alert alert-danger" role="alert">
  <?php echo validation_errors();  ?>
	</div>
	<?php endif; ?>
   <form action="" method="post" >
	<div class="row">	  
	  <div class="col-sm-5 col-xs-6"> 
		<input type="text" placeholder="Enter Reference Number" name="tracking_sr" value="<?php echo set_value('tracking_sr')?>" />
	  </div>

	  <div class="col-sm-5 col-xs-6"> 
		<input type="text" placeholder="Enter Passport Number" name="passport_sr" value="<?php echo set_value('passport_sr')?>" />
	  </div>
	  
	  <div class="col-sm-2 col-xs-12"> 		
		<input type="submit" name="track_st_sr" value="Track" />
	  </div>
      
	</div>
    </form>
   </div>
  </div>  
</div>


<div class="container">
	<?php if(isset($status)): ?>
	<table class="table">
		<tr><td>Status</td><td><?=$status?></td><tr>
		<tr><td>Comments</td><td><?=$comments?></td><tr>
	</table>
	<?php else: ?>
	<h1>Status Details<span></span></h1>
	<h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget pharetra lorem. Quisque nec erat felis. Nulla nunc nisl, pretium quis imperdiet quis, scelerisque et felis. Sed fermentum, tellus quis pulvinar tincidunt, mauris turpis porttitor tortor, ac cursus nibh ipsum quis metus. Aliquam erat volutpat. Aliquam eu sagittis nisi, sed finibus odio. Proin placerat, odio nec scelerisque tincidunt, mauris risus efficitur augue, nec efficitur metus nunc non sapien. Mauris accumsan lobortis nisl. Vestibulum fermentum facilisis urna, sed sollicitudin est rhoncus ac.</h6>
	<?php endif; ?>
  
</div>
