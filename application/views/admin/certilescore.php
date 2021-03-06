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
		 <title>Pitch Discrimination - Admin Panel</title>
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
                                            <?php echo $this->session->flashdata('certile_info'); ?>
							<table width="100%" id="tblCustomerList" cellspacing="0" cellpadding="0" class="table table-bordered">
								<thead>
								<tr>
									<!--th width="20%">First Name</th>
									<th width="20%">Last Name</th-->
									<th width="15%">Age</th>
									<th width="15%">Gender</th>
									<th width="10%">Score</th>
									<th width="10%">Certile</th>
                                                                        <th width="10%">Edit</th>
                                                                        <th width="10%">Delete</th>
								</tr>
								</thead>
								<tbody>
									<?php
                                                                        
                                                                        $Users = $this->db->query("select * from pitch_certilescore");
                                                                        
										foreach($Users->result() as $user){
									?>
										<tr>
											<td><?=$user->ages;?></td>
											<td><?=$user->gender;?></td>
											<td><?=$user->score;?></td>
											<td><?=$user->certile;?></td>
                                                                                        <td><a href="<?php echo site_url('edit-certile-score/'.$user->id); ?>">Edit</a></td>
                                                                                        <td><a href="<?php echo site_url('delete-certile-score/'.$user->id); ?>">Delete</a></td>
										</tr>
									<?php
										}
									?>
								</tbody>
							</table>
					</div>
				</section>
                        <div class="container">
                        <div class="row">
                        <hr>
                          <div class="col-lg-12">
                            <div class="col-md-8">
                              <a href="#">Terms of Service</a> | <a href="#">Privacy</a>    
                            </div>
                            <div class="col-md-4">
                              <p class="muted pull-right">© <?php echo date('Y'); ?> Pitch Descrimination. All rights reserved</p>
                            </div>
                          </div>
                        </div>
                      </div>
             			<!-- Body Content ends here -->
		<!-- Admin Dashboard ends here -->
		
		<!-- JS files will load here -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?=base_url();?>resources/js/userslist.js"></script>
	</body>
</html>