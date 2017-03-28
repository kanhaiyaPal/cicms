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
					<div class="panel-title">Registered Users</div>
					<div class="panel-options">
					</div>
				</div>
				<div class="panel-body">
				<?php if($this->session->flashdata('user_delete_success')): ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $this->session->flashdata('user_delete_success');  ?>
				</div>
				<?php endif; ?>
				<?php if($this->session->flashdata('user_update_success')): ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $this->session->flashdata('user_update_success');  ?>
				</div>
				<?php endif; ?>
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="pages_table">
						<thead>
							<tr>
								<th>User id/Mobile</th>
								<th>Email</th>
								<th>Name</th>
								<th>Last Login</th>
								<th>Options</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$counter = 1;
								foreach($page_data as $user){
									if($user['id'] == '1'){ continue; }
									$od_ev = ($counter%2==0)?'even':'odd';
									
									$ed_url = base_url('/manage/users/update_user/'.$user['id']);
									$dl_url = base_url('/manage/users/delete_user/'.$user['id']);
									
									echo "<tr class='".$od_ev." gradeX'>";
									echo "<td>".$user['username']."</td>";
									echo "<td>".$user['email']."</td>";
									echo "<td>".$user['firstname'].' '.$user['lastname']."</td>";
									echo "<td>".$user['last_login']."</td>";
									echo "<td><a href='$ed_url' class='option_ico glyphicon glyphicon-edit'/>&nbsp;<a href='$dl_url' class='glyphicon glyphicon-trash'/></td>";
									
									echo "</tr>";
									$counter++;
								}
							?>
						</tbody>
					</table>
  				</div>
  			</div> 
		</div>
	</div>
</div>