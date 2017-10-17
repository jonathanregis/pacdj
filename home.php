<?php
require_once("include/engine.php");
if(isset($_SESSION['user_id'])){
	$user = new User;
	$current_user = $user->_get($_SESSION['user_id']);
	$visitor = new Visitor;
	$assign = new Assign;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/dashboard.js"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			
			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-git-compare"></i>
						<span class="visible-xs-inline-block position-right">Git updates</span>
						<span class="badge bg-warning-400">9</span>
					</a>
					
					<div class="dropdown-menu dropdown-content">
						<div class="dropdown-content-heading">
							Git updates
							<ul class="icons-list">
								<li><a href="#"><i class="icon-sync"></i></a></li>
							</ul>
						</div>

						<ul class="media-list dropdown-content-body width-350">
							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
								</div>

								<div class="media-body">
									Drop the IE <a href="#">specific hacks</a> for temporal inputs
									<div class="media-annotation">4 minutes ago</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-warning text-warning btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-commit"></i></a>
								</div>
								
								<div class="media-body">
									Add full font overrides for popovers and tooltips
									<div class="media-annotation">36 minutes ago</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-branch"></i></a>
								</div>
								
								<div class="media-body">
									<a href="#">Chris Arney</a> created a new <span class="text-semibold">Design</span> branch
									<div class="media-annotation">2 hours ago</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-success text-success btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-merge"></i></a>
								</div>
								
								<div class="media-body">
									<a href="#">Eugene Kopyov</a> merged <span class="text-semibold">Master</span> and <span class="text-semibold">Dev</span> branches
									<div class="media-annotation">Dec 18, 18:36</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
								</div>
								
								<div class="media-body">
									Have Carousel ignore keyboard events
									<div class="media-annotation">Dec 12, 05:46</div>
								</div>
							</li>
						</ul>

						<div class="dropdown-content-footer">
							<a href="#" data-popup="tooltip" title="All activity"><i class="icon-menu display-block"></i></a>
						</div>
					</div>
				</li>
			</ul>

			<p class="navbar-text"><span class="label bg-success">Online</span></p>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown language-switch">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="assets/images/flags/gb.png" class="position-left" alt="">
						English
						<span class="caret"></span>
					</a>

					<ul class="dropdown-menu">
						<li><a class="deutsch"><img src="assets/images/flags/de.png" alt=""> Deutsch</a></li>
						<li><a class="ukrainian"><img src="assets/images/flags/ua.png" alt=""> Українська</a></li>
						<li><a class="english"><img src="assets/images/flags/gb.png" alt=""> English</a></li>
						<li><a class="espana"><img src="assets/images/flags/es.png" alt=""> España</a></li>
						<li><a class="russian"><img src="assets/images/flags/ru.png" alt=""> Русский</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-bubbles4"></i>
						<span class="visible-xs-inline-block position-right">Messages</span>
						<span class="badge bg-warning-400">2</span>
					</a>
					
					<div class="dropdown-menu dropdown-content width-350">
						<div class="dropdown-content-heading">
							Messages
							<ul class="icons-list">
								<li><a href="#"><i class="icon-compose"></i></a></li>
							</ul>
						</div>

						<ul class="media-list dropdown-content-body">
							<li class="media">
								<div class="media-left">
									<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
									<span class="badge bg-danger-400 media-badge">5</span>
								</div>

								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">James Alexander</span>
										<span class="media-annotation pull-right">04:58</span>
									</a>

									<span class="text-muted">who knows, maybe that would be the best thing for me...</span>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
									<span class="badge bg-danger-400 media-badge">4</span>
								</div>

								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">Margo Baker</span>
										<span class="media-annotation pull-right">12:16</span>
									</a>

									<span class="text-muted">That was something he was unable to do because...</span>
								</div>
							</li>

							<li class="media">
								<div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">Jeremy Victorino</span>
										<span class="media-annotation pull-right">22:48</span>
									</a>

									<span class="text-muted">But that would be extremely strained and suspicious...</span>
								</div>
							</li>

							<li class="media">
								<div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">Beatrix Diaz</span>
										<span class="media-annotation pull-right">Tue</span>
									</a>

									<span class="text-muted">What a strenuous career it is that I've chosen...</span>
								</div>
							</li>

							<li class="media">
								<div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">Richard Vango</span>
										<span class="media-annotation pull-right">Mon</span>
									</a>
									
									<span class="text-muted">Other travelling salesmen live a life of luxury...</span>
								</div>
							</li>
						</ul>

						<div class="dropdown-content-footer">
							<a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
						</div>
					</div>
				</li>

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="assets/images/placeholder.jpg" alt="">
						<span><?= $current_user['username'];?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="#"><i class="icon-coins"></i> My balance</a></li>
						<li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
						<li><a href="#"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?= $current_user['firstname'];?> <?= $current_user['lastname']; ?></span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<?php include('include/main_navigation.php');?>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<?php include('include/page_header.php');?>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Main charts -->
					<div class="row">
					

						<div class="col-lg-12">

							<!-- Sales stats -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<div class="heading-elements">
										
				                	</div>
								</div>

								<div class="container-fluid">
									<div class="row text-center">
										<div class="col-md-4">
											<div class="content-group">
												<h5 class="text-semibold no-margin"><i class="icon-people position-left text-slate"></i> <?php
												$user = new User;
												$users = $user->get_all();
												echo count($users);
												?></h5>
												<span class="text-muted text-size-small">Total Leaders recorded</span>
											</div>
										</div>

										<div class="col-md-4">
											<div class="content-group">
												<h5 class="text-semibold no-margin"><i class="icon-calendar52 position-left text-slate"></i> <?php
												$pending = $assign->get_all('pending');
												echo count($pending);
												?></h5>
												<span class="text-muted text-size-small">Total Pending approval</span>
											</div>
										</div>

										<div class="col-md-4">
											<div class="content-group">
												<h5 class="text-semibold no-margin"><i class="icon-cash3 position-left text-slate"></i> <?php
												$approved = $assign->get_all('approved');
												echo count($approved);
												?></h5>
												<span class="text-muted text-size-small">Total approved</span>
											</div>
										</div>
									</div>
								</div>

								<div class="content-group-sm" id="app_sales"></div>
								<div id="monthly-sales-stats"></div>
							</div>
							<!-- /sales stats -->

						</div>
					</div>
					<!-- /main charts -->


					<!-- Dashboard content -->
					<div class="row">
						<div class="col-lg-8">

							<!-- Marketing campaigns -->
							
							<!-- /marketing campaigns -->


							<!-- Quick stats boxes -->
							<div class="row">
								<div class="col-lg-4">

									<!-- Members online -->
									
									<!-- /members online -->

								</div>

								<div class="col-lg-4">

									<!-- Current server load -->
									
									<!-- /current server load -->

								</div>

								<div class="col-lg-4">

									<!-- Today's revenue -->
									

								</div>
							</div>
							<!-- /quick stats boxes -->


							<!-- Support tickets -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">News Feed</h6>
									<div class="heading-elements">
										<button type="button" class="btn btn-link daterange-ranges heading-btn text-semibold">
											<i class="icon-calendar3 position-left"></i> <span></span> <b class="caret"></b>
										</button>
				                	</div>
								</div>

								<div class="table-responsive">
									<table class="table table-xlg text-nowrap">
										<tbody>
											<tr>
													<td class="col-md-4">
													<div class="media-left media-middle">
														<a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-people"></i></a>
													</div>

													<div class="media-left">
														<h5 class="text-semibold no-margin">
															<?php
															$visitors = $visitor->get_all();
															$visitors_unassigned = $visitor->get_all(false,'unassigned');
															echo count($visitors);
															?> <small class="display-block no-margin">Total Visitors</small>
														</h5>
													</div>
												</td>

												<td class="col-md-3">
													<div class="media-left media-middle">
														<a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-user-check"></i></a>
													</div>

													<div class="media-left">
														<h5 class="text-semibold no-margin">
															<?php
															$assigned = $assign->get_all();
															echo count($assigned);
															?> <small class="display-block no-margin">visitors assigned</small>
														</h5>
													</div>
												</td>

												<td class="col-md-3">
													<div class="media-left media-middle">
														<a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-user-minus"></i></a>
													</div>

													<div class="media-left">
														<h5 class="text-semibold no-margin">
															<?php
															$unassigned = $visitors_unassigned;
															echo count($unassigned);
															?> <small class="display-block no-margin">Visitors non assigned</small>
														</h5>
													</div>
												</td>

												<td class="text-right col-md-2">
													<a href="#" class="btn bg-teal-400"><i class="icon-statistics position-left"></i> Report</a>
												</td>
											</tr>
										</tbody>
									</table>	
								</div>

								<div class="table-responsive">
									<table class="table text-nowrap">
										<thead>
											<tr>
												<th style="width: 50px">Due</th>
												<th style="width: 300px;">Visitor</th>
												<th>Description</th>
												<th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
											</tr>
										</thead>
										<tbody>
											<tr class="active border-double">
												<td colspan="3">Non Assigned Visitors</td>
												<td class="text-right">
													<span class="badge bg-blue">24</span>
												</td>
											</tr>

											<?php
											foreach($visitors_unassigned as $visitor){
												$visitor_letter = substr($visitor['name'], 0,1);
											?>
											<tr>
												<td class="text-center">
													<h6 class="no-margin">12 <small class="display-block text-size-small no-margin">hours</small></h6>
												</td>
												<td>
													<div class="media-left media-middle">
														<a href="#" class="btn bg-teal-400 btn-rounded btn-icon btn-xs">
															<span class="letter-icon"><?=$visitor_letter;?></span>
														</a>
													</div>

													<div class="media-body">
														<a href="#" class="display-inline-block text-default text-semibold letter-icon-title"><?=$visitor['name'];?></a>
														<div class="text-muted text-size-small"><span class="status-mark border-blue position-left"></span>Non-assigned</div>
													</div>
												</td>
												<td>
													<a href="#" class="text-default display-inline-block">
														<span class="text-semibold">[#1183] Workaround for OS X selects printing bug</span>
														<span class="display-block text-muted">Chrome fixed the bug several versions ago, thus rendering this...</span>
													</a>
												</td>
												<td class="text-center">
													<ul class="icons-list">
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
															<ul class="dropdown-menu dropdown-menu-right">
																<li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
																<li><a href="#"><i class="icon-history"></i> Full history</a></li>
																<li class="divider"></li>
																<li><a href="#"><i class="icon-checkmark3 text-success"></i> Resolve issue</a></li>
																<li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
															</ul>
														</li>
													</ul>
												</td>
											</tr>
											<?php } ?>

											
											<tr class="active border-double">
												<td colspan="3">Assigned Visitors</td>
												<td class="text-right">
													<span class="badge bg-success">42</span>
												</td>
											</tr>
<?php
											foreach($assigned as $visitor){
												$visitor_letter = substr($visitor['name'], 0,1);
											?>
											<tr>
												<td class="text-center">
													<h6 class="no-margin">12 <small class="display-block text-size-small no-margin">hours</small></h6>
												</td>
												<td>
													<div class="media-left media-middle">
														<a href="#" class="btn bg-teal-400 btn-rounded btn-icon btn-xs">
															<span class="letter-icon"><?=$visitor_letter;?></span>
														</a>
													</div>

													<div class="media-body">
														<a href="#" class="display-inline-block text-default text-semibold letter-icon-title"><?=$visitor['name'];?></a>
														<div class="text-muted text-size-small"><span class="status-mark border-blue position-left"></span>Non-assigned</div>
													</div>
												</td>
												<td>
													<a href="#" class="text-default display-inline-block">
														<span class="text-semibold">[#1183] Workaround for OS X selects printing bug</span>
														<span class="display-block text-muted">Chrome fixed the bug several versions ago, thus rendering this...</span>
													</a>
												</td>
												<td class="text-center">
													<ul class="icons-list">
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
															<ul class="dropdown-menu dropdown-menu-right">
																<li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
																<li><a href="#"><i class="icon-history"></i> Full history</a></li>
																<li class="divider"></li>
																<li><a href="#"><i class="icon-checkmark3 text-success"></i> Resolve issue</a></li>
																<li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
															</ul>
														</li>
													</ul>
												</td>
											</tr>
											<?php } ?>

											


										</tbody>
									</table>
								</div>
							</div>
							<!-- /support tickets -->


							<!-- Latest posts -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Latest posts</h6>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
			                	</div>

								<div class="panel-body">
									<div class="row">
										<div class="col-lg-6">
											<ul class="media-list content-group">
												<li class="media stack-media-on-mobile">
				                					<div class="media-left">
														<div class="thumb">
															<a href="#">
																<img src="assets/images/placeholder.jpg" class="img-responsive img-rounded media-preview" alt="">
																<span class="zoom-image"><i class="icon-play3"></i></span>
															</a>
														</div>
													</div>

				                					<div class="media-body">
														<h6 class="media-heading"><a href="#">Up unpacked friendly</a></h6>
							                    		<ul class="list-inline list-inline-separate text-muted mb-5">
							                    			<li><i class="icon-book-play position-left"></i> Video tutorials</li>
							                    			<li>14 minutes ago</li>
							                    		</ul>
														The him father parish looked has sooner. Attachment frequently gay terminated son...
													</div>
												</li>

												<li class="media stack-media-on-mobile">
				                					<div class="media-left">
														<div class="thumb">
															<a href="#">
																<img src="assets/images/placeholder.jpg" class="img-responsive img-rounded media-preview" alt="">
																<span class="zoom-image"><i class="icon-play3"></i></span>
															</a>
														</div>
													</div>

				                					<div class="media-body">
														<h6 class="media-heading"><a href="#">It allowance prevailed</a></h6>
							                    		<ul class="list-inline list-inline-separate text-muted mb-5">
							                    			<li><i class="icon-book-play position-left"></i> Video tutorials</li>
							                    			<li>12 days ago</li>
							                    		</ul>
														Alteration literature to or an sympathize mr imprudence. Of is ferrars subject as enjoyed...
													</div>
												</li>
											</ul>
										</div>

										<div class="col-lg-6">
											<ul class="media-list content-group">
												<li class="media stack-media-on-mobile">
				                					<div class="media-left">
														<div class="thumb">
															<a href="#">
																<img src="assets/images/placeholder.jpg" class="img-responsive img-rounded media-preview" alt="">
																<span class="zoom-image"><i class="icon-play3"></i></span>
															</a>
														</div>
													</div>

				                					<div class="media-body">
														<h6 class="media-heading"><a href="#">Case read they must</a></h6>
							                    		<ul class="list-inline list-inline-separate text-muted mb-5">
							                    			<li><i class="icon-book-play position-left"></i> Video tutorials</li>
							                    			<li>20 hours ago</li>
							                    		</ul>
														On it differed repeated wandered required in. Then girl neat why yet knew rose spot...
													</div>
												</li>

												<li class="media stack-media-on-mobile">
				                					<div class="media-left">
														<div class="thumb">
															<a href="#">
																<img src="assets/images/placeholder.jpg" class="img-responsive img-rounded media-preview" alt="">
																<span class="zoom-image"><i class="icon-play3"></i></span>
															</a>
														</div>
													</div>

				                					<div class="media-body">
														<h6 class="media-heading"><a href="#">Too carriage attended</a></h6>
							                    		<ul class="list-inline list-inline-separate text-muted mb-5">
							                    			<li><i class="icon-book-play position-left"></i> FAQ section</li>
							                    			<li>2 days ago</li>
							                    		</ul>
														Marianne or husbands if at stronger ye. Considered is as middletons uncommonly...
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- /latest posts -->

						</div>

						<div class="col-lg-4">

							<!-- Progress counters -->
							<div class="row">
								<div class="col-md-6">

									<!-- Available hours -->
								
									<!-- /available hours -->

								</div>

								<div class="col-md-6">

									<!-- Productivity goal -->
									
									<!-- /productivity goal -->

								</div>
							</div>
							<!-- /progress counters -->


							<!-- Daily sales -->
							
							<!-- /daily sales -->


							<!-- My messages -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Reports</h6>
									<div class="heading-elements">
										<span class="heading-text"><i class="icon-history text-warning position-left"></i> Jul 7, 10:30</span>
										<span class="label bg-success heading-text">Online</span>
									</div>
								</div>

								<!-- Numbers -->
								<div class="container-fluid">
									<div class="row text-center">
										<div class="col-md-4">
											<div class="content-group">
												<h6 class="text-semibold no-margin"><i class="icon-clipboard3 position-left text-slate"></i> 2,345</h6>
												<span class="text-muted text-size-small">this week</span>
											</div>
										</div>

										<div class="col-md-4">
											<div class="content-group">
												<h6 class="text-semibold no-margin"><i class="icon-calendar3 position-left text-slate"></i> 3,568</h6>
												<span class="text-muted text-size-small">this month</span>
											</div>
										</div>

										<div class="col-md-4">
											<div class="content-group">
												<h6 class="text-semibold no-margin"><i class="icon-comments position-left text-slate"></i> 32,693</h6>
												<span class="text-muted text-size-small">all messages</span>
											</div>
										</div>
									</div>
								</div>
								<!-- /numbers -->


								<!-- Area chart -->
								<div id="messages-stats"></div>
								<!-- /area chart -->


								<!-- Tabs -->
			                	<ul class="nav nav-lg nav-tabs nav-justified no-margin no-border-radius bg-indigo-400 border-top border-top-indigo-300">
									<li class="active">
										<a href="#messages-tue" class="text-size-small text-uppercase" data-toggle="tab">
											This Week
										</a>
									</li>

									<li>
										<a href="#messages-mon" class="text-size-small text-uppercase" data-toggle="tab">
											This Month
										</a>
									</li>

									<li>
										<a href="#messages-fri" class="text-size-small text-uppercase" data-toggle="tab">
											Friday
										</a>
									</li>
								</ul>
								<!-- /tabs -->


								<!-- Tabs content -->
								<div class="tab-content">
									<div class="tab-pane active fade in has-padding" id="messages-tue">
										<ul class="media-list">
											<li class="media">
												<div class="media-left">
													<img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
													<span class="badge bg-danger-400 media-badge">8</span>
												</div>

												<div class="media-body">
													<a href="#">
														James Alexander
														<span class="media-annotation pull-right">14:58</span>
													</a>

													<span class="display-block text-muted">The constitutionally inventoried precariously...</span>
												</div>
											</li>

											<li class="media">
												<div class="media-left">
													<img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
													<span class="badge bg-danger-400 media-badge">6</span>
												</div>

												<div class="media-body">
													<a href="#">
														Margo Baker
														<span class="media-annotation pull-right">12:16</span>
													</a>

													<span class="display-block text-muted">Pinched a well more moral chose goodness...</span>
												</div>
											</li>

											<li class="media">
												<div class="media-left">
													<img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
												</div>

												<div class="media-body">
													<a href="#">
														Jeremy Victorino
														<span class="media-annotation pull-right">09:48</span>
													</a>

													<span class="display-block text-muted">Pert thickly mischievous clung frowned well...</span>
												</div>
											</li>

											<li class="media">
												<div class="media-left">
													<img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
												</div>

												<div class="media-body">
													<a href="#">
														Beatrix Diaz
														<span class="media-annotation pull-right">05:54</span>
													</a>

													<span class="display-block text-muted">Nightingale taped hello bucolic fussily cardinal...</span>
												</div>
											</li>

											<li class="media">
												<div class="media-left">
													<img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
												</div>

												<div class="media-body">
													<a href="#">
														Richard Vango
														<span class="media-annotation pull-right">01:43</span>
													</a>
													
													<span class="display-block text-muted">Amidst roadrunner distantly pompously where...</span>
												</div>
											</li>
										</ul>
									</div>

									<div class="tab-pane fade has-padding" id="messages-mon">
										<ul class="media-list">
											<li class="media">
												<div class="media-left">
													<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
												</div>

												<div class="media-body">
													<a href="#">
														Isak Temes
														<span class="media-annotation pull-right">Tue, 19:58</span>
													</a>

													<span class="display-block text-muted">Reasonable palpably rankly expressly grimy...</span>
												</div>
											</li>

											<li class="media">
												<div class="media-left">
													<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
												</div>

												<div class="media-body">
													<a href="#">
														Vittorio Cosgrove
														<span class="media-annotation pull-right">Tue, 16:35</span>
													</a>

													<span class="display-block text-muted">Arguably therefore more unexplainable fumed...</span>
												</div>
											</li>

											<li class="media">
												<div class="media-left">
													<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
												</div>

												<div class="media-body">
													<a href="#">
														Hilary Talaugon
														<span class="media-annotation pull-right">Tue, 12:16</span>
													</a>

													<span class="display-block text-muted">Nicely unlike porpoise a kookaburra past more...</span>
												</div>
											</li>

											<li class="media">
												<div class="media-left">
													<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
												</div>

												<div class="media-body">
													<a href="#">
														Bobbie Seber
														<span class="media-annotation pull-right">Tue, 09:20</span>
													</a>

													<span class="display-block text-muted">Before visual vigilantly fortuitous tortoise...</span>
												</div>
											</li>

											<li class="media">
												<div class="media-left">
													<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
												</div>

												<div class="media-body">
													<a href="#">
														Walther Laws
														<span class="media-annotation pull-right">Tue, 03:29</span>
													</a>
													
													<span class="display-block text-muted">Far affecting more leered unerringly dishonest...</span>
												</div>
											</li>
										</ul>
									</div>

									<div class="tab-pane fade has-padding" id="messages-fri">
										<ul class="media-list">
											<li class="media">
												<div class="media-left">
													<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
												</div>

												<div class="media-body">
													<a href="#">
														Owen Stretch
														<span class="media-annotation pull-right">Mon, 18:12</span>
													</a>

													<span class="display-block text-muted">Tardy rattlesnake seal raptly earthworm...</span>
												</div>
											</li>

											<li class="media">
												<div class="media-left">
													<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
												</div>

												<div class="media-body">
													<a href="#">
														Jenilee Mcnair
														<span class="media-annotation pull-right">Mon, 14:03</span>
													</a>

													<span class="display-block text-muted">Since hello dear pushed amid darn trite...</span>
												</div>
											</li>

											<li class="media">
												<div class="media-left">
													<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
												</div>

												<div class="media-body">
													<a href="#">
														Alaster Jain
														<span class="media-annotation pull-right">Mon, 13:59</span>
													</a>

													<span class="display-block text-muted">Dachshund cardinal dear next jeepers well...</span>
												</div>
											</li>

											<li class="media">
												<div class="media-left">
													<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
												</div>

												<div class="media-body">
													<a href="#">
														Sigfrid Thisted
														<span class="media-annotation pull-right">Mon, 09:26</span>
													</a>

													<span class="display-block text-muted">Lighted wolf yikes less lemur crud grunted...</span>
												</div>
											</li>

											<li class="media">
												<div class="media-left">
													<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
												</div>

												<div class="media-body">
													<a href="#">
														Sherilyn Mckee
														<span class="media-annotation pull-right">Mon, 06:38</span>
													</a>
													
													<span class="display-block text-muted">Less unicorn a however careless husky...</span>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<!-- /tabs content -->

							</div>
							<!-- /my messages -->


							<!-- Daily financials -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Daily financials</h6>
									<div class="heading-elements">
										<form class="heading-form" action="#">
											<div class="form-group">
												<label class="checkbox checkbox-inline checkbox-switchery checkbox-right switchery-xs">
													<input type="checkbox" class="switcher" id="realtime" checked="checked">
													Realtime
												</label>
											</div>
										</form>
										<span class="badge bg-danger-400 heading-text">+86</span>
									</div>
								</div>

								<div class="panel-body">
									<div class="content-group-xs" id="bullets"></div>

									<ul class="media-list">
										<li class="media">
											<div class="media-left">
												<a href="#" class="btn border-pink text-pink btn-flat btn-rounded btn-icon btn-xs"><i class="icon-statistics"></i></a>
											</div>
											
											<div class="media-body">
												Stats for July, 6: 1938 orders, $4220 revenue
												<div class="media-annotation">2 hours ago</div>
											</div>

											<div class="media-right media-middle">
												<ul class="icons-list">
													<li>
								                    	<a href="#"><i class="icon-arrow-right13"></i></a>
							                    	</li>
						                    	</ul>
											</div>
										</li>

										<li class="media">
											<div class="media-left">
												<a href="#" class="btn border-success text-success btn-flat btn-rounded btn-icon btn-xs"><i class="icon-checkmark3"></i></a>
											</div>
											
											<div class="media-body">
												Invoices <a href="#">#4732</a> and <a href="#">#4734</a> have been paid
												<div class="media-annotation">Dec 18, 18:36</div>
											</div>

											<div class="media-right media-middle">
												<ul class="icons-list">
													<li>
								                    	<a href="#"><i class="icon-arrow-right13"></i></a>
							                    	</li>
						                    	</ul>
											</div>
										</li>

										<li class="media">
											<div class="media-left">
												<a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-xs"><i class="icon-alignment-unalign"></i></a>
											</div>
											
											<div class="media-body">
												Affiliate commission for June has been paid
												<div class="media-annotation">36 minutes ago</div>
											</div>

											<div class="media-right media-middle">
												<ul class="icons-list">
													<li>
								                    	<a href="#"><i class="icon-arrow-right13"></i></a>
							                    	</li>
						                    	</ul>
											</div>
										</li>

										<li class="media">
											<div class="media-left">
												<a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs"><i class="icon-spinner11"></i></a>
											</div>

											<div class="media-body">
												Order <a href="#">#37745</a> from July, 1st has been refunded
												<div class="media-annotation">4 minutes ago</div>
											</div>

											<div class="media-right media-middle">
												<ul class="icons-list">
													<li>
								                    	<a href="#"><i class="icon-arrow-right13"></i></a>
							                    	</li>
						                    	</ul>
											</div>
										</li>

										<li class="media">
											<div class="media-left">
												<a href="#" class="btn border-teal-400 text-teal btn-flat btn-rounded btn-icon btn-xs"><i class="icon-redo2"></i></a>
											</div>
											
											<div class="media-body">
												Invoice <a href="#">#4769</a> has been sent to <a href="#">Robert Smith</a>
												<div class="media-annotation">Dec 12, 05:46</div>
											</div>

											<div class="media-right media-middle">
												<ul class="icons-list">
													<li>
								                    	<a href="#"><i class="icon-arrow-right13"></i></a>
							                    	</li>
						                    	</ul>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<!-- /daily financials -->

						</div>
					</div>
					<!-- /dashboard content -->


					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>

<?php }

else header("Location: index.php");
 ?>
