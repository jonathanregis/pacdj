


<div class="row">
   <div class="col-md-8">
      <!-- Advanced legend -->
      <form action="include/op_visitors.php" enctype="multipart/form-data" method="post">
         <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title">Add new visitor</h5>
               <div class="heading-elements">
                  <ul class="icons-list">
                 
                     <li><a data-action="reload"></a></li>
                     
                  </ul>
               </div>
            </div>
            <div class="panel-body">
               <div class="col-md-12">
                  <fieldset>
                     <div class="col-md-12">
                        <legend class="text-semibold">
                           <i class="icon-file-text2 position-left"></i>
                           Enter your information
                           <a class="control-arrow" data-toggle="collapse" data-target="#demo1">
                           <i class="icon-circle-down2"></i>
                           </a>
                        </legend>
                        <div class="collapse in" id="demo1">
                           <div class="form-group">
                              <label>Enter name:</label>
                              <input type="text" name="name" class="form-control" placeholder="Name">
                           </div>
                           <div class="form-group">
                              <label>Enter date of birth:</label>
                              <input type="date" name="dob" class="form-control" placeholder="Date of birth">
                           </div>
                           <div class="form-group">
                              <label class="display-block">Select gender:</label>
                              <label class="radio-inline">
                              <input type="radio" name="gender" value="Male" class="styled" checked="checked">
                              Male
                              </label>
                              <label class="radio-inline">
                              <input type="radio" name="gender"  value="Female" class="styled">
                              Female
                              </label>
                           </div>

                           <div class="form-group">
                              <label> Enter phone:</label>
                              <input type="number" name="phone" class="form-control" placeholder="233-00-000-00-000">
                           </div>

                           <div class="form-group">
                              <label> Enter email:</label>
                              <input type="email" name="email" class="form-control" placeholder="Email">
                           </div>
                        </div>
                     </div>
                  
                  </fieldset>




                   <fieldset>
                     <div class="col-md-12">
                        <legend class="text-semibold">
                           <i class="icon-reading position-left"></i>
                           Add address details
                           <a class="control-arrow" data-toggle="collapse" data-target="#demo2">
                           <i class="icon-circle-down2"></i>
                           </a>
                        </legend>
                        <div class="collapse in" id="demo2">
                           <div class="form-group">
                              <label>Select your Area:</label>
                              <select data-placeholder="Select your Area" class="select">
                              <?php
//DATABASE CONNECTION
require('include/engine.php');



    $view = new Visitor;
    $data = $view->get_all();
    foreach ($data as $visitor) {
      $area=$visitor['area'];
      

      # code...
    ?>
                                 <option name="area" value="<?php echo ucwords("$area") ;?>"><?php echo ucwords("$area") ;?></option>

                                 <?php };?>
                                 
                              </select>
                           </div>
                           <div class="row">
                              <div class="col-md-8">
                                 <div class="form-group">
                                    <label>Enter location:</label>
                                    <input type="text" name="location" placeholder="Any prominent feature to help us locate your house…" class="form-control">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>P.O.BOX:</label>
                                    <input type="text" name="postal_address" placeholder="" class="form-control">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label>workplace / School:</label>
                              <input type="text" name="workplace" placeholder="" class="form-control">
                           </div>


                       
                  





                        </div>
                     </div>
              
               </fieldset>
               <fieldset>
               	<div class="col-md-12">
               	 <legend class="text-semibold">
                           <i class="icon-file-text2 position-left"></i>
                           Enter your personal information
                           <a class="control-arrow" data-toggle="collapse" data-target="#demo3">
                           <i class="icon-circle-down2"></i>
                           </a>
                        </legend>
                        <div class="collapse in" id="demo3">
                           <div class="form-group">
                              <label class="display-block">Do you belongs to a church:</label>
                              <label class="radio-inline">
                              <input type="radio" name="belong_church" value="Yes" class="styled" checked="checked">
                              Yes
                              </label>
                              <label class="radio-inline">
                              <input type="radio" name="belong_church" value="No" class="styled">
                              No
                              </label>
                           </div>
                           <div class="form-group">
                              <label>If yes Name of the Church</label>
                              <input type="text" name="belong_yes" class="form-control" placeholder="Name of the church">
                           </div>
                           <div class="form-group">
                              <label> Which department are you interested in?:</label>
                              <input type="text" name="department" class="form-control" placeholder="Repeat password">
                           </div>
                           <div class="form-group">
                              <label>Any important issues you want church to pray on?:</label>
                              <textarea  name="issue" rows="5" cols="5" placeholder="Prayer request..." class="form-control"></textarea>
                           </div>
                        </div>
               	</div>
               </fieldset>
               <div class="col-md-12">
               	<legend class="text-semibold"><i class="icon-reading position-left"></i> Your decision</legend>
              
                         <div class="row">
                        <div class="col-md-6">


                           <div class="form-group">
                              <label class="radio-inline">
                              <input type="checkbox" name="decision" value="Just accepted christ" class="styled" >
                             <i>  Just accepted christ</i>
                              </label>
                           </div>
                           <div class="form-group">
                              <label class="radio-inline">
                              <input type="checkbox" name="decision" value="Rededication" class="styled" >
                               <i> Rededication</i>
                              </label>
                           </div></div>
                           <div class="col-md-6">
                       
                           <div class="form-group">
                              <label class="radio-inline">
                              <input type="checkbox" name="decision" value="Want to  be a member" class="styled" >
                               <i> Want to  be a member</i>
                              </label>
                           </div>
                           <div class="form-group">
                              <label class="radio-inline">
                              <input type="checkbox" name="decision" value="just came to visit" class="styled">
                               <i> just came to visit</i>
                              </label>
                           </div>
                        </div> </div>
                        <div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label> <i> Who invited you?</i></label>
														<input type="text" name="invited_by" placeholder="" class="form-control">
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label><i>Phone #:</i></label>
														<input type="number" name="invited_by_phone" placeholder="233-00-000-00-000" class="form-control">
													</div>
												</div>
											</div>
               </div>


                   


               
                 
               <div class="text-right">
                  <button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
                  <input type="hidden" value="add" name="op" />
               </div>
            </div>
         </div>
   </div>
   </form>
   <!-- /a legend -->
</div>


<div class="col-md-4">
<div class="panel panel-flat">
	<div class="table-responsive">
									<table class="table text-nowrap">




										<thead>
											<tr>
												<th>News Feed</th>
												<th>Time  </th>

												

												
											</tr>

										</thead>
										
										<tbody>

                                 <?php
//DATABASE CONNECTION




    $view = new Visitor;
    $data = $view->get_all();
    foreach ($data as $visitor) {

      $fullname=$visitor['name'];
      $phone = $visitor['phone'];
      $email=$visitor['email'];
      $status = $visitor['status'];
      $decision=$visitor['decision'];
      

      # code...
    ?>
											<tr>
												<td>
													<div class="media-left media-middle">
														<a href="#" class="btn bg-primary-400 btn-rounded btn-icon btn-xs">
															<span class="letter-icon">S</span>
														</a>
													</div>

													<div class="media-body">
														<div class="media-heading">
															<a href="#" class="letter-icon-title"><?php echo ucwords("$fullname");?> </a>
														</div>

														<div class="text-muted text-size-small"><i class="icon-checkmark3 text-size-mini position-left"></i><i><?php echo ucwords("$decision");?></i></div>
													</div>
												</td>
												<td>
													<span class="text-muted text-size-small">06:28 pm</span>
												</td>
												
											</tr><?php };?>

											
												
											

									
											
											

										
										</tbody>
									</table>
								</div>
</div></div>
</div>