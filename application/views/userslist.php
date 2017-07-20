<!DOCTYPE html>
<!--[if lt IE 7]>   <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>      <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>      <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>      <html class="no-js ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		 <title>AIMs - Admin Dashboard</title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		<link href="<?=base_url();?>resources/css/cssBundle.css" rel="stylesheet" />
		<link href="<?=base_url();?>resources/css/admin.css" rel="stylesheet" />
		<script src="<?=base_url();?>resources/js/modernizr-2.6.2.min.js"></script>
		<script type="text/javascript">
			var strBaseURL = "<?=base_url();?>";
		</script>
		</head>
	<body>
		
		<!-- Admin Dashboard Starts here -->
			<!-- Header goes here -->
			<?php $this->load->view('admin/navigation'); ?>
			<!-- Header ends here -->
			<!-- Body Content goes here -->
				<section class="adminDashboardView">
					<div class="UserListView container">
							<div class="row text-center" style="margin:10px;padding:5px;" >
								<input type="text" name="search_query" placeholder="Search Query" id="sleSearchQuery" style="padding:5px 10px; float:right;" />
							</div>
							<div>
								<a id="btnExport" class="btn btn-primary pull-right col-md-1 col-sm-1" target="_blank" href="<?=base_url();?>userslist/export" style="width:150px; min-width:inherit; margin-right:15px;"> Export </a>
							</div>
							<table width="100%" id="tblCustomerList" cellspacing="0" cellpadding="0" class="table table-bordered">
								<thead>
								<tr>
									<!--th width="20%">First Name</th>
									<th width="20%">Last Name</th-->
									<th width="15%">Age</th>
									<th width="15%">Gender</th>
									<th width="15%">File Number</th>
									<th width="15%">Joined Date</th>
									<th width="10%">Score</th>
									<th width="10%">Certile</th>
								</tr>
								</thead>
								<tbody>
									<?php
										foreach($Users as $user){
									?>
										<tr>
											<!--td><?=$user['firstname'];?></td>
											<td><?=$user['lastname'];?></td-->
											<td><?=$user['age'];?></td>
											<td><?=$user['gender'];?></td>
											<td><?=$user['filenumber'];?></td>
											<td><?=$user['addeddate'];?></td>
											<td><?=$user['score'];?></td>
											<td><?=$user['certile'];?></td>
										</tr>
									<?php
										}
									?>
								</tbody>
							</table>
					</div>
				</section>
			<!-- Body Content ends here -->
		<!-- Admin Dashboard ends here -->
		
		<!-- JS files will load here -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?=base_url();?>resources/js/userslist.js"></script>
	</body>
</html>