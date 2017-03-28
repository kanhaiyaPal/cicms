<div class="inner-banner">
  <div class="container">
    <h2>Contact us</h2>
  </div>
</div>
<div class="container">
  <h1>Contact us<span></span></h1>
  <div class="row">
    <div class="col-md-12">
      <div class="box1">
        <div class="row">
          <div class="col-md-12"> </div>
          <div class="col-md-4">
            <h3>E Visas Online</h3>
            <?=$address?> </div>
          <div class="col-md-4 text-center"> <i class="fa fa-map-marker fa-3x" aria-hidden="true"></i> </div>
          <div class="col-md-4">
            <div><i class="fa fa-phone" aria-hidden="true"></i> <?=$phone?></div>
            <div><i class="fa fa-envelope-o" aria-hidden="true"></i> <?=$mailid?></div>
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
    <p>&nbsp;</p>
    <div class="col-md-6">
      <div class="box1">
	  <?php if($this->session->flashdata('mail_sent')): ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('mail_sent');  ?>
		</div>
	  <?php endif; ?>
	  <form name="contform" action="" method="post" onSubmit="return contvform()">
          <div class="row">
            <div class="col-sm-6 f-user">
              <input type="text" placeholder="Name *" name="c_name" required>
            </div>
            <div class="col-sm-6 f-mobile">
              <input type="text" placeholder="Mobile *" maxlength="10"  pattern="[0-9]{10}" name="c_mobile" required />
            </div>
            <div class="col-sm-12 f-email">
              <input type="email" placeholder="Email *" name="c_mail" required/>
            </div>
            <div class="col-sm-12">
              <textarea maxlength="200" name="c_message" placeholder="Message /Comment"></textarea>
            </div>
            <div class="col-md-12">
              <input name="button" type="submit" id="button" value="Submit">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-6">
      <div class="box1">
        <?=$g_code?>
      </div>
    </div>
  </div>
</div>
