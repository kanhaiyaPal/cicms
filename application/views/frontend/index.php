<div class="h-slider">
  <div class="container">
  <div class="hs-content">
    <h2>Start Your UAE Travel Visa Search<span></span></h2>    
  </div>

  
  <div class="search-panel">
    <div>
      <?=$visa_form?>
    </div>
  </div>
  
  
  </div>
  
</div>


<div class="dis">
<div class="container">
<?=$site_disc?>
</div>
</div>





<div class="container">
  <div id="TabbedPanels1" class="TabbedPanels">
	 <ul class="TabbedPanelsTabGroup">
			<?php $cont=1; foreach($feature_visa_service as $service): ?>
			<li class="TabbedPanelsTab" tabindex="0"><?=$service['service_title']?> Days Visa <?php if($service['visa_type']== '4'){?>Single Entry<?php }else{?>Multiple Entry<?php } ?></li>
			<?php $cont++; endforeach; ?>
		</ul>
		<div class="TabbedPanelsContentGroup">
			<?php foreach($feature_visa_service as $service): ?>
			<div class="TabbedPanelsContent">
			  <h3><?=$service['service_title']?></span> Days Visa <?php if($service['visa_type']== '4'){ ?>Single Entry<?php }else{ ?>Multiple Entry<?php } ?></h3>
			  <?php $content_part = explode('|-|',$service['intro_content']); ?>
			  <?=$content_part[2]?>              

              <!--<a href="<?=base_url('frontend/pages/pre_step?visa_service_type='.$service['id'])?>" class="btn2">Apply Now</a>-->
			</div>
			<?php endforeach; ?> 
		</div>   

  </div>
</div>

<div class="h-thumbs text-center">
<div class="container">
<h1>How to apply for UAE Visa Online?<span></span></h1>
<h5>Easy & faster processing without errors : 5 easy steps for UAE visa application</h5>

  <ul>
    <li>
        <div class="hti">
        <span>1</span>
        <img src="<?=base_url('uploads/admin/').$step_1_image?>" alt="Visa Type" /></div>
        <h3><?=$step_1_title?></h3>
        <p><?=$step_1_content?></p>
    </li>
	<li>
        <div class="hti">
        <span>2</span>
        <img src="<?=base_url('uploads/admin/').$step_2_image?>" alt="Visa Type" /></div>
        <h3><?=$step_2_title?></h3>
        <p><?=$step_2_content?></p>
    </li>
	<li>
        <div class="hti">
        <span>3</span>
        <img src="<?=base_url('uploads/admin/').$step_3_image?>" alt="Visa Type" /></div>
        <h3><?=$step_3_title?></h3>
        <p><?=$step_3_content?></p>
    </li>
	<li>
        <div class="hti">
        <span>4</span>
        <img src="<?=base_url('uploads/admin/').$step_4_image?>" alt="Visa Type" /></div>
        <h3><?=$step_4_title?></h3>
        <p><?=$step_4_content?></p>
    </li>
	<li>
        <div class="hti">
        <span>5</span>
        <img src="<?=base_url('uploads/admin/').$step_5_image?>" alt="Visa Type" /></div>
        <h3><?=$step_5_title?></h3>
        <p><?=$step_5_content?></p>
    </li>
    <!--
      <li>
        <div class="hti">
        <span>2</span>
        <img src="<?=base_url('assets/images/icon-form2.png')?>" alt="Application form" /></div>
        <h3>Fill in Application Form</h3>
        <p>Now that you know your visa type. You need to fill in the application form to provide your travel informnation, contact details and personal information</p>
      </li>
      
      
      <li>
        <div class="hti">
        <span>3</span>
        <img src="<?=base_url('assets/images/icon-docs.png')?>" alt="Upload Documents" /></div>
        <h3>Upload Documents</h3>
        <p>Once you have filled  up the application form, you need to upload your coloured scanned documents. Passport / Photograph & itenary details</p>
      </li>
    
      <li>
        <div class="hti">
        <span>4</span>
        <img src="<?=base_url('assets/images/icon-pay.png')?>" alt="Pay Online" /></div>
        <h3>Pay Online</h3>
        <p>Once you upload the documents make online payment using our secured payment gateway</p>
      </li>
    
      <li>
        <div class="hti">
        <span>5</span>
        <img src="<?=base_url('assets/images/icon-visa.png')?>" alt="Visa Processign!!" /></div>
        <h3>Application Submit!!</h3>
        <p>Now that you have applied for your visa to UAE, your application will be processed immediately. You can track the status of your application online by simply </p>
      </li>-->
      
      
      

  </ul>
<div class="clear"></div>
</div>
</div>


  

<div class="home-1">
  <div class="container">
  <div class="row">
  <div class="col-md-6"></div>
  <div class="col-md-6">
  <h2>Why use UAE visa online:<span></span></h2>
  <h5>It's easier & faster to get UAE online</h5>
    <?=$fet_dec?>
    </div>
    </div>
  </div>
</div>



<div class="container dynamic">
<div class="row">
<div class="col-md-6">
<h2>Our Services:<span></span></h2>
<?=$top_dec?>
</div>

<div class="col-md-6">
<h2>Our Salient Features:<span></span></h2>
<?=$bot_dec?>
</div>

</div>
</div>
    



<div class="testimonials">
<div class="text-center">
<h2>Client Testimonial</h2>
</div>

<div class="container">
<div class="slider" style="border:0;">
      <ul id="slider2">
		<?php foreach($testimonial_data as $testimonial): ?>
		<li>
          <div class="slide-cont">            
            <div class="testimonial">
            <div class="t-con">
            <div class="t-arrow">&nbsp;</div>
            <?php 
			$s = $testimonial['content'];
			$max_length = 100;
			if (strlen($s) > $max_length)
			{
				$offset = ($max_length - 3) - strlen($s);
				$s = substr($s, 0, $max_length ) . '...';
				echo $s;
			}?>
            </div>
            
            <img src="<?php if($testimonial['image'] != ''){ echo base_url('uploads/testimonials/'.$testimonial['image']); }else{ echo base_url('assets/images/no-user.jpg'); }?>" alt="<?=$testimonial['title']?>" />
            <h4><a href="<?=base_url('testimonials')?>"><?=$testimonial['title']?></a></h4>
            <h6><?=$testimonial['designation']?><br /><?=$testimonial['company']?></h6>
            
            <div class="clear"></div>
            </div>
            
          </div>
        </li>
		<?php endforeach; ?>
      </ul>
    </div>

</div>
</div>





<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>