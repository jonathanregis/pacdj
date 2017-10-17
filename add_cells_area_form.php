
<div class="row">
   <div class="col-md-8">
      <!-- Advanced legend -->
      <form action="include/add_area.php" enctype="multipart/form-data" method="post">
         <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title"> <?php include('include/page_name.php');?></h5>
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
                              <label>Area name:</label>
                              <input type="text" name="area_name" class="form-control" placeholder="Area Name">
                           </div>
                            <div class="form-group">
                              <label>Area City:</label>
                              <input type="text" name="area_city" class="form-control" placeholder="Area City">
                           </div>
                        
                         

                  
                           <div class="form-group">
                              <label>Area description:</label>
                              <textarea  name="area_desc" rows="5" cols="5" placeholder="Area description.." class="form-control"></textarea>
                           </div>
                        </div>
               	</div>
               </fieldset>
        

                   


               
                 
               <div class="text-right">
                  <button type="submit" name="add_area" value="Submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
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
			$con= mysqli_connect("localhost","root","","perez_cells_db");

		$select = mysqli_query($con,"SELECT * from cell_areas where status != 'deleted' ORDER BY areaId DESC LIMIT 7  ");
		
		if (!$select) {
			die ('Your database is crappy SQL Error: ' . mysqli_error($conn));
		}

		
		while ($row = mysqli_fetch_array($select))
		{

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
															<a href="#" class="letter-icon-title"><?php echo $row['area_name']; ?></a>
														</div>

														<div class="text-muted text-size-small"><i class="icon-checkmark3 text-size-mini position-left"></i><i> Just accepted christ</i></div>
													</div>
												</td>
												<td>
													<span class="text-muted text-size-small">06:28 pm</span>
												</td>
												
											</tr>
<?php };?>
											
											
											


											
											

										
										</tbody>
									</table>
								</div>
</div></div>
</div>