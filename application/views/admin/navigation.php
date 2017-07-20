<nav class="navbar navbar-inverse navbar-fixed-top">
			  <div class="container">
				<div class="navbar-header">
				  <a class="navbar-brand" href="<?php echo base_url();?>admindashboard">Dashboard</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
				  <ul class="nav navbar-nav" style="float:none;">
					<li><a href="<?php echo base_url();?>userslist">Users List</a></li>
					<li><a href="<?php echo base_url();?>usertestresult">Test Result</a></li>
					<li><a href="<?php echo base_url();?>uploadquestions">Upload Test Item</a></li>
                                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Certile Scores <span class="caret"></span> <?php // href="<?php echo base_url(); certile-scores">Certile Scores</a> ?>
                                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                                    <li><a tabindex="-1" href="<?php echo base_url();?>certile-scores ">Certile Scores</a></li>
                                                    <li><a tabindex="-1" href="<?php echo base_url();?>add-certile-score">Add Certile Scores</a></li>
                                                    
                                                </ul>
                                        </li>
					<li class="pull-right"><a href="<?php echo base_url();?>admindashboard/logout">Log Out</a></li>
				  </ul>
				</div><!--/.nav-collapse -->
			  </div>
			</nav>