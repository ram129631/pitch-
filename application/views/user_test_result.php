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
		</head>
	<body>
		
		<!-- Admin Dashboard Starts here -->
			<!-- Header goes here -->
			<?php $this->load->view('admin/navigation'); ?>
			<!-- Header ends here -->
			<!-- Body Content goes here -->
				<section class="adminDashboardView">
					<div>
						<a id="btnExport" class="btn btn-primary pull-right col-md-1 col-sm-1" target="_blank" href="<?=base_url();?>usertestresult/export" style="width:150px; min-width:inherit; margin-right:15px;"> Export </a>
					</div>
					<div class="UserListView">
							<table width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
								<thead>
								<tr>
									<th width="3%">Age</th>
									<th width="3%">Sex</th>
									<th width="10%">File Number</th>
									<th width="87%">Type of Data</th>
									<th width="10%">Certile</th>
								</tr>
								</thead>
								<tbody>
								<?php
									foreach ($TestResults as $key => $value) {
								?>
								<tr>
									<!--td valign="middle"><?=$value['firstname'];?></td-->
									<td valign="middle"><?=$value['age'];?></td>
									<td><?=$value['gender'];?></td>
									
									<td valign="middle"><?=$value['filenumber'];?></td>
									<td>
										<table width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
											<tr>
												<td width="10%">Correct Answer</td>
												<?php
													for($intCtr = 0; $intCtr < count($value['test_result']); $intCtr++){
												?>
												<td width="2.3%"><?=$value['test_result'][$intCtr]['answer'];?>
												</td>
												<?php } ?>
											</tr>
										</table>
										<table width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
											<tr>
												<td width="10%">Responses</td>
												<?php
													for($intCtr = 0; $intCtr< sizeof($value['test_result']); $intCtr++){
												?>
												<td width="2.3%"><?=$value['test_result'][$intCtr]['optionid'];?>
												</td>
												<?php } ?>
											</tr>
										</table>
										<table width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
											<tr>
												<td width="10%">Points</td>
												<?php
													$intCorrectAnswer = 0;
													for($intCtr = 0; $intCtr< sizeof($value['test_result']); $intCtr++){
												?>
												<td width="2.3%">
													<?php
														if($value['test_result'][$intCtr]['answer'] == $value['test_result'][$intCtr]['optionid'] && $value['test_result'][$intCtr]['includeinscoring'])
														{
															$intCorrectAnswer = $intCorrectAnswer+1;
															echo 1;
														}else
														{
															echo 0;
														}
													?>
												</td>
												<?php } ?>
											</tr>
										</table>
										<table width="100%" cellpadding="0" cellspacing="0">
											<tr>
												<td align="right" style="padding:10px;">Item Score : <strong><?=$intCorrectAnswer;?> (<?=sizeof($value['test_result']);?> questions)</strong></td>
											</tr>
										</table>
									</td>
									<td>
										<?php 
											foreach($Certiles as $c)
											{
												if($intCorrectAnswer == $c['score'])
												{
													echo $c['certile'];
													break;
												}
											}
										?>
									</td>
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
		
	</body>
</html>