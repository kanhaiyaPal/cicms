<div class="page-content">
  <div class="row">
	<?php if(isset($sidebar)): ?>
	<div class="col-md-2">
	<?php echo $sidebar; ?>
	</div>
	<?php endif; ?>
		<div class="col-md-10">
		  <div class="content-box-large">
		   <div class="row">
		  	<div class="col-md-12">
		  		<form action="" method="post">
					<label>Change Application Status</label>
					<select name="new_status" class="form-control">
						<option value="submitted" <?php if($status_data['status'] == 'submitted'){ echo "selected"; } ?>>Submitted</option>
						<option value="pending" <?php if($status_data['status'] == 'pending'){ echo "selected"; } ?>>Pending Assesment</option>
						<option value="processing" <?php if($status_data['status'] == 'processing'){ echo "selected"; } ?>>Processing</option>
						<option value="objection" <?php if($status_data['status'] == 'objection'){ echo "selected"; } ?>>Objection Raised</option>
						<option value="requirement" <?php if($status_data['status'] == 'requirement'){ echo "selected"; } ?>>Requirement</option>
						<option value="approved" <?php if($status_data['status'] == 'approved'){ echo "selected"; } ?>>Approved</option>
					</select>
					<br/>
					<label>Comments</label>
					<textarea class="form-control" name="status_comment" cols="2" rows="5"><?=$status_data['comments']?></textarea>
					<br/>
					<input type="hidden" name="applicantion_id" value="<?=$status_data['application_id']?>" />
					<input type="submit" name="changetracking" class="btn btn-primary" value="Change" />
					<a href="#" class="btn btn-default">Back</a>
				</form>
		  	</div>
		   </div>
		  </div>
		</div>
	</div>
</div>