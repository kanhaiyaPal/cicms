<div class="inner-banner">
  <div class="container">
    <h2>
      <?=$title?>
    </h2>
  </div>
</div>
<div class="container">
  <h1><?=$title?><span></span></h1>
	<?php if($this->session->flashdata('app_delete_success')): ?>
	<p class="alert alert-success" role="alert"><?=$this->session->flashdata('app_delete_success')?><p>
	<?php endif; ?>
	<?php if($this->session->flashdata('app_update_success')): ?>
	<p class="alert alert-success" role="alert"><?=$this->session->flashdata('app_update_success')?><p>
	<?php endif; ?>
	<table class="table table-hover">
	 <thead>
	  <tr>
		<th>S.no</th>
		<th>Applicant Name</th>
		<th>Visa Type</th>
		<th>Date of Application</th>
		<th>Co-applicants</th>
		<th>Application Status</th>
		<th>Tracking Id</th>
		<th>Actions</th>
	  </tr>
	 </thead>
	 <tbody>
		<?php if(count($applications)>0): ?>
		<?php $counter =1; foreach($applications as $application): ?>
		<tr>
			<td><?=$counter?></td>
			<td><?=$application['applicant_firstname']?> <?=$application['applicant_lastname']?></td>
			<td><?=$application['applicant_passport_number']?></td>
			<td><?=$application['application_date']?></td>
			<td><?=$application['co-applicants']?></td>
			<td><?=$application['application_st']?></td>
			<td><?=$application['tracking_no']?></td>
			<td>
				<?php if($application['payment_st'] != 'paid'): ?>
				<a href="#" title="Make Payment for this application"><i class="fa fa-credit-card" aria-hidden="true"></i></a>
				<?php endif; ?>
				<a href="<?=base_url('frontend/pages/edit_main_applicant/'.$application['id'])?>" title="Edit this application"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
				<a href="<?=base_url('frontend/visas_front/delete_user_application_front/'.$application['id'])?>" title="Delete this application"><i class="fa fa-trash-o" aria-hidden="true"></i></a> 
			</td>
		</tr>
		<?php $counter++; endforeach; ?>
		<?php else: ?>
		<tr><td colspan="8" align="center"> <strong>No applications to display</strong> </td></tr>
		<?php endif; ?>
	 </tbody>
	</table>
</div>
