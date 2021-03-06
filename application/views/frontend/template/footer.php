<div class="footer2">
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <h4>E Visas Online</h4>
        <ul>
          <li><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="<?=base_url('about-us')?>"><i class="fa fa-info-circle"></i> About us</a></li>
          <li><a href="<?=base_url('frontend/pages/visa_processing_steps')?>"><i class="fa fa-list-ul"></i> Visa Processing Steps</a></li>
          <li><a href="<?=base_url('contact-us')?>"><i class="fa fa-envelope-o"></i> Contact us</a></li>
        </ul>
      </div>
      
      <div class="col-sm-3">
        <h4>Contact us</h4>
        <ul>
        <li><a href="<?=base_url('testimonials')?>"><i class="fa fa-comments-o"></i> Testimonials</a></li>
		  <li><a href="<?=base_url('privacy-policy')?>"><i class="fa fa-file-text" aria-hidden="true"></i> Privacy Policy</a></li>
		  <li><a href="<?=base_url('terms-of-use')?>"><i class="fa fa-file-text-o" aria-hidden="true"></i> Terms of Use</a></li>
		  <li><a href="<?=base_url('security-policy')?>"><i class="fa fa-file" aria-hidden="true"></i> Security Policy</a></li>
          </ul>
        </div>
      
      <div class="col-sm-3">
        <h4>Contact us</h4>
        <ul>
          <li><i class="fa fa-clock-o"></i> Timing <?=$timings?></li>
          <li><i class="fa fa-volume-control-phone"></i> Call: <?=$phone?></li>
          <li><i class="fa fa-envelope-o"></i> Email: <?=$mailid?></li>
        </ul>
        <div class="social">
          <ul>
			<?php if($fb_url != ''){ ?><li><a href="<?=$fb_url?>" target="_blank"><i class="fa fa-facebook fb"></i></a></li><?php } ?>
            <?php if($tw_url != ''){ ?><li><a href="<?=$tw_url?>" target="_blank"><i class="fa fa-twitter ttr"></i></a></li><?php } ?>
			<?php if($ln_url != ''){ ?><li><a href="<?=$ln_url?>" target="_blank"><i class="fa fa-linkedin li"></i></a></li><?php } ?>
			<?php if($pn_url != ''){ ?><li><a href="<?=$pn_url?>" target="_blank"><i class="fa fa-pinterest pin"></i></a></li><?php } ?>
			<?php if($in_url != ''){ ?><li><a href="<?=$in_url?>" target="_blank"><i class="fa fa-instagram ins"></i></a></li><?php } ?>
			<?php if($gp_url != ''){ ?><li><a href="<?=$gp_url?>" target="_blank"><i class="fa fa-google-plus gl"></i></a></li><?php } ?>
          </ul>
        </div>
      </div>
      
      
      <div class="col-sm-3">
        <h4>Disclaimer</h4>
        <div><?=$site_disc?></div>
      </div>
      
      <!--<div class="col-sm-3 text-right">
      <img src="<?=base_url('assets/images/')?>footer-logo.png" alt="E Visas Online" />
      </div>-->
    </div>
  </div>
</div>
<footer>
  <div class="container">
    <div>Content &copy; E Visas Online | All rights reserved</div>
  </div>
</footer>
</body>
</html>