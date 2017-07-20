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
                                            
                                            <form action="<?php echo site_url('add-update-certile-score'); ?>">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">Ages</label>
                                                  <input type="text" name="ages" class="form-control" id="exampleInputEmail1">
                                                </div>
                                                <div class="form-group">
                                                  <label for="exampleInputPassword1">Gender</label>
                                                  <select name="gender" class="form-control">
                                                      <option value="male">Male</option>
                                                      <option value="female">Female</option>
                                                  </select>
                                                </div>
                                                <div class="form-group">
                                                  <label for="exampleInputPassword1">Score</label>
                                                  <input type="text" name="score" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                  <label for="exampleInputPassword1">Certile</label>
                                                  <input type="text" name="certile" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                </div>  
                                                <button type="submit" class="btn btn-default">Submit</button>
                                            </form>
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