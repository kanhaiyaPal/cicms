<div class="page-content">
	<div class="row">
		<?php if(isset($sidebar)): ?>
		  <div class="col-md-2">
			<?php echo $sidebar; ?>
		  </div>
		  <?php endif; ?>
		  <div class="col-md-10">
		  	<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Visa Application Documents</div>
					<div class="panel-options">
						<a href="<?=$back_url?>" data-rel="collapse"><i class="glyphicon glyphicon-circle-arrow-left"></i></a>
					</div>
				</div>
				<div class="panel-body">
				<?php if(validation_errors()): ?>
				<div class="alert alert-danger" role="alert">
				  <?php echo validation_errors();  ?>
				</div>
				<?php endif; ?>
				<?php if($this->session->flashdata('update_success')): ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $this->session->flashdata('update_success');  ?>
				</div>
				<?php endif; ?>
				<form action="" method="post">
  					<div class="col-md-12">
						<div class="col-md-2"><strong>Coloured Passport</strong></div>
						<div class="col-md-10">
						<?php if($documents['coloured_passport'] != ''): ?>
						
						<a target="_blank" href="<?=base_url('uploads/visas/user_docs/'.$documents['coloured_passport'])?>" ><img class="img-responsive" src="<?=base_url('uploads/visas/user_docs/'.$documents['coloured_passport'])?>" alt="Passport Image" /></a>
						
						<?php if($documents['coloured_passport_reject'] == '0'): ?>
						<input type="radio" class="rad-app" name="passport_approval" value="1" onclick="show_reason_div(event,this.name,'none')" required /> Approve <br/>
						<input type="radio" class="rad-app" name="passport_approval" value="0" onclick="show_reason_div(event,this.name,'block')" /> Reject <br/>
						<input type="text" name="passport_approval_reason" id="passport_approval_reason" placeholder="Reason for rejection"  class="form-control" style="display:none" /> 
						
						<?php elseif($documents['coloured_passport_reject'] == '1'): ?>
						<input type="radio" class="rad-app" name="passport_approval" value="1" checked="checked" onclick="show_reason_div(event,this.name,'none')" required /> Approve <br/>
						<input type="radio" class="rad-app" name="passport_approval" value="0" onclick="show_reason_div(event,this.name,'block')" /> Reject <br/>
						<input type="text" name="passport_approval_reason" id="passport_approval_reason" placeholder="Reason for rejection"  class="form-control" style="display:none" /> 
						
						<?php else: ?>
						<input type="radio" class="rad-app" name="passport_approval" value="1"  onclick="show_reason_div(event,this.name,'none')" required /> Approve <br/>
						<input type="radio" class="rad-app" name="passport_approval" value="0" checked="checked" onclick="show_reason_div(event,this.name,'block')" /> Reject <br/>
						<input type="text" name="passport_approval_reason" id="passport_approval_reason" placeholder="Reason for rejection"  class="form-control" value="<?=$documents['coloured_passport_reject']?>" />
						
						<?php endif; ?>
						<?php else: ?>
						Not Uploaded Yet
						<?php endif; ?>
						</div>
					</div>
					<div class="col-md-12">&nbsp;</div>
					<div class="col-md-12">
						<div class="col-md-2"><strong>Return Ticket</strong></div>
						<div class="col-md-10">
						<?php if($documents['return_ticket'] != ''): ?>
						
						<a target="_blank" href="<?=base_url('uploads/visas/user_docs/'.$documents['return_ticket'])?>" ><img class="img-responsive" src="<?=base_url('uploads/visas/user_docs/'.$documents['return_ticket'])?>" alt="Return Ticket Image" /></a>
						
						<?php if($documents['coloured_passport_reject'] == '0'): ?>
						<input type="radio" class="rad-app" name="return_approval" value="1" onclick="show_reason_div(event,this.name,'none')" required /> Approve <br/>
						<input type="radio" class="rad-app" name="return_approval" value="0" onclick="show_reason_div(event,this.name,'block')" /> Reject <br/>
						<input type="text" name="return_approval_reason" id="return_approval_reason" placeholder="Reason for rejection"  class="form-control" style="display:none" /> 
						
						<?php elseif($documents['coloured_passport_reject'] == '1'): ?>
						<input type="radio" class="rad-app" name="return_approval" value="1" checked="checked" onclick="show_reason_div(event,this.name,'none')" required /> Approve <br/>
						<input type="radio" class="rad-app" name="return_approval" value="0" onclick="show_reason_div(event,this.name,'block')" /> Reject <br/>
						<input type="text" name="return_approval_reason" id="return_approval_reason" placeholder="Reason for rejection"  class="form-control" style="display:none" /> 
						
						<?php else: ?>
						<input type="radio" class="rad-app" name="return_approval" value="1"  onclick="show_reason_div(event,this.name,'none')" required /> Approve <br/>
						<input type="radio" class="rad-app" name="return_approval" value="0" checked="checked" onclick="show_reason_div(event,this.name,'block')" /> Reject <br/>
						<input type="text" name="return_approval_reason" id="return_approval_reason" placeholder="Reason for rejection"  class="form-control" value="<?=$documents['coloured_passport_reject']?>" />
						
						<?php endif; ?>
						<?php else: ?>
						Not Uploaded Yet
						<?php endif; ?>
						</div>
					</div>
					<div class="col-md-12">&nbsp;</div>
					<div class="col-md-12">
						<div class="col-md-2"><strong>Employee Id</strong></div>
						<div class="col-md-10">
						<?php if($documents['employee_id'] != ''): ?>
						
						<a target="_blank" href="<?=base_url('uploads/visas/user_docs/'.$documents['employee_id'])?>" ><img class="img-responsive" src="<?=base_url('uploads/visas/user_docs/'.$documents['employee_id'])?>" alt="Employee Id Image" /></a>
						
						<?php if($documents['employee_id_reject'] == '0'): ?>
						<input type="radio" class="rad-app" name="employee_approval" value="1" onclick="show_reason_div(event,this.name,'none')" required /> Approve <br/>
						<input type="radio" class="rad-app" name="employee_approval" value="0" onclick="show_reason_div(event,this.name,'block')" /> Reject <br/>
						<input type="text" name="employee_approval_reason" id="employee_approval_reason" placeholder="Reason for rejection"  class="form-control" style="display:none" /> 
						
						<?php elseif($documents['employee_id_reject'] == '1'): ?>
						<input type="radio" class="rad-app" name="employee_approval" value="1" checked="checked" onclick="show_reason_div(event,this.name,'none')" required /> Approve <br/>
						<input type="radio" class="rad-app" name="employee_approval" value="0" onclick="show_reason_div(event,this.name,'block')" /> Reject <br/>
						<input type="text" name="employee_approval_reason" id="employee_approval_reason" placeholder="Reason for rejection"  class="form-control" style="display:none" /> 
						
						<?php else: ?>
						<input type="radio" class="rad-app" name="employee_approval" value="1"  onclick="show_reason_div(event,this.name,'none')" required /> Approve <br/>
						<input type="radio" class="rad-app" name="employee_approval" value="0" checked="checked" onclick="show_reason_div(event,this.name,'block')" /> Reject <br/>
						<input type="text" name="employee_approval_reason" id="employee_approval_reason" placeholder="Reason for rejection"  class="form-control" value="<?=$documents['employee_id_reject']?>" />
						
						<?php endif; ?>
						<?php else: ?>
						Not Uploaded Yet
						<?php endif; ?>
						</div>
					</div>
					<div class="col-md-12">&nbsp;</div>
					<div class="col-md-12">
						<div class="col-md-2"><strong>Residence Proof</strong></div>
						<div class="col-md-10">
						<?php if($documents['residence_proof'] != ''): ?>
						
						<a target="_blank" href="<?=base_url('uploads/visas/user_docs/'.$documents['residence_proof'])?>" ><img class="img-responsive" src="<?=base_url('uploads/visas/user_docs/'.$documents['residence_proof'])?>" alt="Residence Proof Image" /></a>
						
						<?php if($documents['residence_proof_reject'] == '0'): ?>
						<input type="radio" class="rad-app" name="residence_approval" value="1" onclick="show_reason_div(event,this.name,'none')" required /> Approve <br/>
						<input type="radio" class="rad-app" name="residence_approval" value="0" onclick="show_reason_div(event,this.name,'block')" /> Reject <br/>
						<input type="text" name="residence_approval_reason" id="residence_approval_reason" placeholder="Reason for rejection"  class="form-control" style="display:none" /> 
						
						<?php elseif($documents['residence_proof_reject'] == '1'): ?>
						<input type="radio" class="rad-app" name="residence_approval" value="1" checked="checked" onclick="show_reason_div(event,this.name,'none')" required /> Approve <br/>
						<input type="radio" class="rad-app" name="residence_approval" value="0" onclick="show_reason_div(event,this.name,'block')" /> Reject <br/>
						<input type="text" name="residence_approval_reason" id="residence_approval_reason" placeholder="Reason for rejection"  class="form-control" style="display:none" /> 
						
						<?php else: ?>
						<input type="radio" class="rad-app" name="residence_approval" value="1"  onclick="show_reason_div(event,this.name,'none')" required /> Approve <br/>
						<input type="radio" class="rad-app" name="residence_approval" value="0" checked="checked" onclick="show_reason_div(event,this.name,'block')" /> Reject <br/>
						<input type="text" name="residence_approval_reason" id="residence_approval_reason" placeholder="Reason for rejection"  class="form-control" value="<?=$documents['residence_proof_reject']?>" />
						
						<?php endif; ?>
						<?php else: ?>
						Not Uploaded Yet
						<?php endif; ?>
						</div>
					</div>
					<div class="col-md-12">&nbsp;</div>
					<div class="col-md-12">
						<div class="col-md-2"><strong>Hotel Reservation Copy</strong></div>
						<div class="col-md-10">
						<?php if($documents['hotel_reservation'] != ''): ?>
						
						<a target="_blank" href="<?=base_url('uploads/visas/user_docs/'.$documents['hotel_reservation'])?>" ><img class="img-responsive" src="<?=base_url('uploads/visas/user_docs/'.$documents['hotel_reservation'])?>" alt="Hotel Reservation Image" /></a>
						
						<?php if($documents['hotel_reservation_reject'] == '0'): ?>
						<input type="radio" class="rad-app" name="hotel_approval" value="1" onclick="show_reason_div(event,this.name,'none')" required /> Approve <br/>
						<input type="radio" class="rad-app" name="hotel_approval" value="0" onclick="show_reason_div(event,this.name,'block')" /> Reject <br/>
						<input type="text" name="hotel_approval_reason" id="hotel_approval_reason" placeholder="Reason for rejection"  class="form-control" style="display:none" /> 
						
						<?php elseif($documents['hotel_reservation_reject'] == '1'): ?>
						<input type="radio" class="rad-app" name="hotel_approval" value="1" checked="checked" onclick="show_reason_div(event,this.name,'none')" required /> Approve <br/>
						<input type="radio" class="rad-app" name="hotel_approval" value="0" onclick="show_reason_div(event,this.name,'block')" /> Reject <br/>
						<input type="text" name="hotel_approval_reason" id="hotel_approval_reason" placeholder="Reason for rejection"  class="form-control" style="display:none" /> 
						
						<?php else: ?>
						<input type="radio" class="rad-app" name="hotel_approval" value="1"  onclick="show_reason_div(event,this.name,'none')" required /> Approve <br/>
						<input type="radio" class="rad-app" name="hotel_approval" value="0" checked="checked" onclick="show_reason_div(event,this.name,'block')" /> Reject <br/>
						<input type="text" name="hotel_approval_reason" id="hotel_approval_reason" placeholder="Reason for rejection"  class="form-control" value="<?=$documents['hotel_reservation_reject']?>" />
						
						<?php endif; ?>
						<?php else: ?>
						Not Uploaded Yet
						<?php endif; ?>
						</div>
					</div>
					<div class="col-md-12">&nbsp;</div>
					<div class="col-md-12">
						<div class="col-md-2"><strong>Misc Documents</strong></div>
						<div class="col-md-10">
						<?php if($documents['misc_documents'] != ''): ?>
						
						<a target="_blank" href="<?=base_url('uploads/visas/user_docs/'.$documents['misc_documents'])?>" ><img class="img-responsive" src="<?=base_url('uploads/visas/user_docs/'.$documents['misc_documents'])?>" alt="Misc Image" /></a>
						
						<?php if($documents['misc_documents_reject'] == '0'): ?>
						<input type="radio" class="rad-app" name="misc_approval" value="1" onclick="show_reason_div(event,this.name,'none')" required /> Approve <br/>
						<input type="radio" class="rad-app" name="misc_approval" value="0" onclick="show_reason_div(event,this.name,'block')" /> Reject <br/>
						<input type="text" name="misc_approval_reason" id="misc_approval_reason" placeholder="Reason for rejection"  class="form-control" style="display:none" /> 
						
						<?php elseif($documents['misc_documents_reject'] == '1'): ?>
						<input type="radio" class="rad-app" name="misc_approval" value="1" checked="checked" onclick="show_reason_div(event,this.name,'none')" required /> Approve <br/>
						<input type="radio" class="rad-app" name="misc_approval" value="0" onclick="show_reason_div(event,this.name,'block')" /> Reject <br/>
						<input type="text" name="misc_approval_reason" id="misc_approval_reason" placeholder="Reason for rejection"  class="form-control" style="display:none" /> 
						
						<?php else: ?>
						<input type="radio" class="rad-app" name="misc_approval" value="1"  onclick="show_reason_div(event,this.name,'none')" required /> Approve <br/>
						<input type="radio" class="rad-app" name="misc_approval" value="0" checked="checked" onclick="show_reason_div(event,this.name,'block')" /> Reject <br/>
						<input type="text" name="misc_approval_reason" id="misc_approval_reason" placeholder="Reason for rejection"  class="form-control" value="<?=$documents['misc_documents_reject']?>" />
						
						<?php endif; ?>
						<?php else: ?>
						Not Uploaded Yet
						<?php endif; ?>
						</div>
					</div>
					<div class="col-md-12">&nbsp;</div>
					<div class="col-md-3">
						<input type="hidden" name="applicant_id" value="<?=$documents['applicant_id']?>" />
						<input type="submit" name="sbmtdocs" class="btn btn-primary" value="Save" />
					</div>
				</form>
  				</div>
  			</div> 
		</div>
	</div>
</div>
<script>
function show_reason_div(event,reject_field,property)
{
	document.getElementById(reject_field+'_reason').style.display = property;
}
</script>