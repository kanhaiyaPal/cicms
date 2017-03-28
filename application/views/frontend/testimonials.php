<div class="inner-banner">
  <div class="container">
    <h2>
      <?=$title?>
    </h2>
  </div>
</div>
<div class="container">
  <h1><?=$title?><span></span></h1>
  <p>&nbsp;</p>
  <?php foreach($testimonials_data as $testimonial): ?>
	<div class="testimonial">
		<div class="t-con">
			<div class="t-arrow">&nbsp;</div>
			<?=$testimonial['content']?>
	</div>
	<div class="col-md-11 col-sm-10 col-xs-8">
	<h4><?=$testimonial['title']?></h4></div>
	<div class="clear"></div>      
	</div>
  <?php endforeach; ?>
  <p>&nbsp;</p>
</div>
