<div class="h-slider">
  <div class="container">
  <div class="hs-content">
    <h2>What is UAE Visa Online<span></span></h2>
    <h3>Its Your one stop destinantion for online UAE visa</h3>
    <ul>
    <li>No need to stand in embassy queue for submitting original passport/documents</li>
    <li>Visa application is applied online from home and visa is sent to applicant via email</li>
    <Li>Applicant just have to print the visa, carry original passport and start travel</li>
    </ul>
  </div>
  
  <div class="heading">  
  <h4>Start your UAE travel visa search</h4>
  </div>

  
  <div class="search-panel">
    <div>
      <?=$visa_form?>
    </div>
  </div>
  
  
  </div>
  
</div>

<div class="h-thumbs text-center">
<div class="container">
<h1>How to apply for UAE Visa Online?<span></span></h1>
<h5>Easy & faster processing without errors : 4 easy steps for UAE visa application</h5>

  <div class="row">
    <div class="col-sm-3 col-xs-6">
      <div class="h-thumb">
        <div class="hti">
        <span>1</span>
        <img src="<?=base_url('assets/images/icon-form.png')?>" alt="Application Form" /></div>
        <h3>Know your Visa Type</h3>
      </div>
    </div>
    <div class="col-sm-3 col-xs-6">
      <div class="h-thumb">
        <div class="hti">
        <span>2</span>
        <img src="<?=base_url('assets/images/icon-docs.png')?>" alt="Upload Documents" /></div>
        <h3>Fill in Application Form</h3>
      </div>
    </div>
    <div class="col-sm-3 col-xs-6">
      <div class="h-thumb">
        <div class="hti">
        <span>3</span>
        <img src="<?=base_url('assets/images/icon-pay.png')?>" alt="Pay Online" /></div>
        <h3>Pay Online</h3>
      </div>
    </div>
    <div class="col-sm-3 col-xs-6">
      <div class="h-thumb">
        <div class="hti">
        <span>4</span>
        <img src="<?=base_url('assets/images/icon-visa.png')?>" alt="Visa Processign!!" /></div>
        <h3>Application Submit!!</h3>
      </div>
    </div>
  </div>
</div>
</div>


  <!--<div class="container">
  <h1>E Visas Online<span></span></h1>
    <?=$top_dec?>
    <a href="<?=$aboutus_url?>" class="btn1">Read more</a> </div>-->



<div class="home-1">
  <div class="container">
  <div class="row">
  <div class="col-md-10">
  <h2>Why use UAE visa online:<span></span></h2>
  <h5>It's easier & faster to get UAE online</h5>
    <?=$fet_dec?>
    </div>
    </div>
  </div>
</div>



<div class="container">
<h2>Online UAE visas on offer<span></span></h2>
  <div id="TabbedPanels1" class="TabbedPanels">
	 <ul class="TabbedPanelsTabGroup">
			<?php $cont=1; foreach($feature_visa_service as $service): ?>
			<li class="TabbedPanelsTab tab<?=$cont?>" tabindex="0"><span><?=$service['service_title']?></span>Days Visa<br><?php if($service['visa_type']== '4'){?>Single Entry<?php }else{?>Multiple Entry<?php } ?></li>
			<?php $cont++; endforeach; ?>
		</ul>
		<div class="TabbedPanelsContentGroup">
			<?php foreach($feature_visa_service as $service): ?>
			<div class="TabbedPanelsContent">
			  <h3><?=$service['service_title']?></span> Days Visa <?php if($service['visa_type']== '4'){ ?>Single Entry<?php }else{ ?>Multiple Entry<?php } ?></h3>
			  <?=$service['intro_content']?>              

              <a href="<?=base_url('frontend/pages/pre_step?visa_service_type='.$service['id'])?>" class="btn2">Apply Now</a>
			</div>
			<?php endforeach; ?> 
		</div>   

  </div>
</div>





<!--<div class="testimonials">
<div class="container">
<h2>Happy Customers<span></span></h2>

<div class="row">
<div class="col-md-7">
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
</div>

</div>
</div>

<div class="container">
<h2>E Visas Online<span></span></h2>
  <?=$bot_dec?>
</div>

-->



<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>