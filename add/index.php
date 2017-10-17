<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add visitor</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="calendar.js"></script>
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Add visitor</a></h1>
		<form id="form_50827" class="appnitro"  method="post" action="../php/op_visitors.php">
					<div class="form_description">
			<h2>Add visitor</h2>
			<p>Please fill the form below carefully</p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Name </label>
		<div>
			<input id="element_1" name="name" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_1"><small>Enter name of visitor</small></p> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Date of birth </label>
		<span>
			<input id="element_2_1" name="dob" class="element text" value="" type="text"> /
			<label for="element_2_1">MM/DD/YYYY</label>
		</span>
		<p class="guidelines" id="guide_2"><small>Enter date of birth</small></p> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Gender </label>
		<div>
			<input id="element_3" name="gender" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_3"><small>Gender</small></p> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Phone number </label>
		<div>
			<input id="element_4" name="phone" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_4"><small>Phone number</small></p> 
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Email </label>
		<div>
			<input id="element_5" name="email" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="element_5"><small>Email</small></p> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Area </label>
		<div>
			<input id="element_6" name="area" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_6"><small>Area</small></p> 
		</li>		<li id="li_7" >
		<label class="description" for="element_7">Location </label>
		<div>
			<input id="element_7" name="location" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_7"><small>Location</small></p> 
		</li>		<li id="li_8" >
		<label class="description" for="element_8">Postal Address </label>
		<div>
			<textarea id="element_8" name="postal_address" class="element textarea medium"></textarea> 
		</div><p class="guidelines" id="guide_8"><small>Postal Address</small></p> 
		</li>		<li id="li_9" >
		<label class="description" for="element_9">Workplace </label>
		<div>
			<input id="element_9" name="workplace" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_9"><small>Workplace</small></p> 
		</li>		<li id="li_10" >
		<label class="description" for="element_10">Belongs to a church </label>
		<div>
			<input id="element_10" name="belong_church" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_10"><small>Please leave blank if not applicable</small></p> 
		</li>		<li id="li_11" >
		<label class="description" for="element_11">Department </label>
		<div>
			<input id="element_11" name="department" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_11"><small>department</small></p> 
		</li>		<li id="li_12" >
		<label class="description" for="element_12">Issue </label>
		<div>
			<textarea id="element_12" name="issue" class="element textarea medium"></textarea> 
		</div><p class="guidelines" id="guide_12"><small>Request from visitor</small></p> 
		</li>		<li id="li_13" >
		<label class="description" for="element_13">Decision </label>
		<div>
			<input id="element_13" name="decision" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_13"><small>Decision</small></p> 
		</li>		<li id="li_14" >
		<label class="description" for="element_14">Invited by </label>
		<div>
			<input id="element_14" name="invited_by" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_14"><small>Invited by</small></p> 
		</li>		<li id="li_15" >
		<label class="description" for="element_15">Invited by phone number </label>
		<div>
			<input id="element_15" name="invited_by_phone" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_15"><small>Phone number of person who invited this visitor</small></p> 
		</li>		<li id="li_16" >
		<label class="description" for="element_16">Status </label>
		<div>
			<input id="element_16" name="status" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_16"><small>Assigned or unassigned</small></p> 
		</li>		<li id="li_17" >
		<label class="description" for="element_17">Date </label>
		<span>
			<input id="element_17_1" name="date_reg" class="element text" value="" type="text"> /
			<label for="element_17_1">MM/DD/YYYY</label>
		</span>
		<p class="guidelines" id="guide_17"><small>Date of visit</small></p> 
		</li>
			
					<li class="buttons">
			    
				<button id="saveForm" class="button_text" type="submit"></button>
		</li>
			</ul>
			<input type="hidden" value="add" name="op" />
		</form>	
		<div id="footer">
			Generated by <a href="http://www.phpform.org">pForm</a>
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>