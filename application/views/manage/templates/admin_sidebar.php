<div class="sidebar content-box" style="display: block;">
<ul class="nav">
	<!-- Main menu -->
	<li class="current"><a href="<?php echo base_url('manage/pages/view/home'); ?>"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
	<li><a href="<?php echo base_url('manage/pages/show'); ?>"><i class="glyphicon glyphicon-list"></i> Static Pages</a></li>
	<li class="submenu <?php $ur = uri_string(); if((strpos($ur,'visas/dashboard'))||(strpos($ur,'visas/types'))||(strpos($ur,'visas/service'))){ echo "open"; } ?>">
		 <a href="#">
			<i class="glyphicon glyphicon-list"></i> Visa Setup
			<span class="caret pull-right"></span>
		 </a>
		 <!-- Sub menu -->
		 <ul>
			<li><a href="<?php echo base_url('manage/visas/dashboard'); ?>">Dashboard</a></li>
			<li><a href="<?php echo base_url('manage/visas/types'); ?>">Types of Visas</a></li>
			<li><a href="<?php echo base_url('manage/visas/service'); ?>">Visa Service Setup</a></li>
		</ul>
	</li>
	<li class="submenu">
		 <a href="#">
			<i class="glyphicon glyphicon-list"></i> Visa Applications
			<span class="caret pull-right"></span>
		 </a>
		 <!-- Sub menu -->
		 <ul>
			<li><a href="<?php echo base_url('manage/visaapplications/view'); ?>">Application Submitted</a></li>
			<li><a href="<?php echo base_url('manage/visaapplications/view'); ?>">Documents Upload Section</a></li>
			<li><a href="<?php echo base_url('manage/visaapplications/view'); ?>">Application Tracking</a></li>
		</ul>
	</li>
	<li class="submenu <?php $ur = uri_string(); if((strpos($ur,'cms/page_settings'))||(strpos($ur,'cms/seo_management'))||(strpos($ur,'cms/parts_management'))){ echo "open"; } ?>">
		 <a href="#">
			<i class="glyphicon glyphicon-tasks"></i> Custom Settings
			<span class="caret pull-right"></span>
		 </a>
		 <!-- Sub menu -->
		 <ul>
			<li><a href="<?php echo base_url('manage/cms/page_settings'); ?>">Page Settings</a></li>
			<li><a href="<?php echo base_url('manage/cms/seo_management'); ?>">Seo Management</a></li>
			<li><a href="<?php echo base_url('manage/cms/parts_management'); ?>">Header/Footer Management</a></li>
		</ul>
	</li>
	<li><a href="<?php echo base_url('manage/testimonials/showall'); ?>"><i class="glyphicon glyphicon-pencil"></i> Testimonials</a></li>
	<li><a href="<?php echo base_url('manage/users/showall'); ?>"><i class="glyphicon glyphicon-user"></i> Users</a></li>
	<li><a href="<?php echo base_url('manage/enquiry/contact'); ?>"><i class="glyphicon glyphicon-stats"></i> Enquiries </a></li>
</ul>
</div>