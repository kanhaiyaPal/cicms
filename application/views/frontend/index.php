<div class="h-slider">
  <div class="hs-content">
    <h2>Travel visa requirements</h2>
    <h3>We Provide the Best</h3>
  </div>
  <div class="search-panel">
    <div class="container">
      <?=$visa_form?>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-3 col-xs-6">
      <div class="h-thumb">
        <div class="hti"><img src="<?=base_url('assets/images/icon-form.png')?>" alt="Application Form" /></div>
        <h3>Fill Application Form</h3>
      </div>
    </div>
    <div class="col-sm-3 col-xs-6">
      <div class="h-thumb">
        <div class="hti" style="background-color:#0a2846"><img src="<?=base_url('assets/images/icon-docs.png')?>" alt="Upload Documents" /></div>
        <h3>Upload Documents</h3>
      </div>
    </div>
    <div class="col-sm-3 col-xs-6">
      <div class="h-thumb">
        <div class="hti" style="background-color:#ecb802"><img src="<?=base_url('assets/images/icon-pay.png')?>" alt="Pay Online" /></div>
        <h3>Pay Online</h3>
      </div>
    </div>
    <div class="col-sm-3 col-xs-6">
      <div class="h-thumb">
        <div class="hti" style="background-color:#45a71e"><img src="<?=base_url('assets/images/icon-visa.png')?>" alt="Visa Processign!!" /></div>
        <h3>Visa Processing!!</h3>
      </div>
    </div>
  </div>
</div>
<div class="container2">
  <div class="container">
    <?=$top_dec?>
    <a href="<?=$aboutus_url?>" class="btn1">Read more</a> </div>
</div>
<div class="testimonials">
  <div class="testi-left">
    <?=$fet_dec?>
  </div>
  <div class="testi-right">
    <h2>Happy Customers<span></span></h2>
    <div class="slider" style="border:0;">
      <ul id="slider2">
		<?php foreach($testimonial_data as $testimonial): ?>
		<li>
          <div class="slide-cont">
            <div class="quote"><img src="<?=base_url('assets/images/quote.png')?>" width="54" height="50" alt="quote"></div>
            <?=$testimonial['content']?>
            <h4><a href="#"><?=$testimonial['title']?></a> </h4>
          </div>
        </li>
		<?php endforeach; ?>
      </ul>
    </div>
  </div>
  <div class="clear"></div>
</div>
<div class="container">
  <?=$bot_dec?>
</div>
