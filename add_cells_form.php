

<div class="row">
   <div class="col-md-8">
      <!-- Advanced legend -->
      <form action="php/add_cell.php"  method="post">
         <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title"><?php include('include/page_name.php');?></h5>
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
                           Enter your cell name
                           <a class="control-arrow" data-toggle="collapse" data-target="#demo1">
                           <i class="icon-circle-down2"></i>
                           </a>
                        </legend>
                        <div class="collapse in" id="demo1">
                           <div class="form-group">
                              <label>Enter cell name:</label>
                              <input type="text" name="cell_name" class="form-control" placeholder="Name">
                           </div>
                         <div class="form-group">
                              <label>Select cell Area:</label>
                              <select name="areaId" data-placeholder="Select your Area" class="select">
                               
 <?php
//DATABASE CONNECTION
require('include/engine.php');



    $view = new cell;
    $data = $view->get_all();
    foreach ($data as $row) {
      $cell=$row['cell_name'];
      

      # code...
    ?>


 
                                <option value="<?php echo ucwords("$cell");?>">
                                <?php echo ucwords("$cell");?>
                                </option> 
                                <?php };?>
                                 
                              </select>
                           </div>

                             <div class="form-group">
                              <label>Cells description:</label>
                              <textarea  name="cell_desc" rows="5" cols="5" placeholder="Cells description.." class="form-control"></textarea>
                           </div>
                        
              
                           
                       
                          </div></div></fieldset>

                 
               <div class="text-right">
                  <button type="submit" name="add_cell" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
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
										$view = new cell;
    $data = $view->get_all();
    foreach ($data as $row) {
      $cell=$row['cell_name'];
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
															<a href="#" class="letter-icon-title"><?php echo $cell;?></a>
														</div>

														<div class="text-muted text-size-small"><i class="icon-checkmark3 text-size-mini position-left"></i><i><?php echo $cell;?></i></div>
													</div>
												</td>
												<td>
													<span class="text-muted text-size-small">01:26 pm</span>
												</td>
												
												
											</tr>
											<?php };?>
											
										
										

											
											

										
										</tbody>
									</table>
								</div>
</div></div>
</div>