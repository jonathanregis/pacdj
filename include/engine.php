<?php
require_once("connection.php");
class Visitor
{
	public function _add($a){
		$conn = conn();
		$query = "INSERT INTO visitors( name, dob, gender, phone, email, area, location, postal_address, workplace, belong_church, department, issue, decision, invited_by, invited_by_phone, status, date_reg) VALUES ('".$a['name']."','".$a['dob']."','".$a['gender']."','".$a['phone']."','".$a['email']."','".$a['area']."','".$a['location']."','".$a['postal_address']."','".$a['workplace']."','".$a['belong_church']."','".$a['department']."','".$a['issue']."','".$a['decision']."','".$a['invited_by']."','".$a['invited_by_phone']."','".$a['status']."','".$a['date_reg']."')";
		//Add visitor action
$date_reg = date('Y-m-d H:i:s',time());
$query_action = mysqli_query($conn,"INSERT INTO actions (action_name,username,role,note,date_reg) VALUES('add visitor','".$_SESSION['username']."','".$_SESSION['role']."','".$_SESSION['username']." added a visitor -> $name','$date_reg') ");
		$execute_query = mysqli_query($conn,$query);
		return $execute_query ? "Success" : "An error occured: \n".mysqli_error($conn)."\n".$query;
	}
	public function _edit($a,$id){
		$conn = conn();
		$query = " UPDATE visitors SET name='".$a['name']."', dob='".$a['dob']."', gender='".$a['gender']."', phone='".$a['phone']."', email='".$a['email']."', area='".$a['area']."', location='".$a['location']."', postal_address='".$a['postal_address']."', workplace='".$a['workplace']."', belong_church='".$a['belong_church']."', department='".$a['department']."', issue='".$a['issue']."', decision='".$a['decision']."', invited_by='".$a['invited_by']."', invited_by_phone='".$a['invited_by_phone']."', status='".$a['status']."', date_reg='".$a['date_reg']." WHERE id=$id ";
		//Edit visitor action
$date_reg = date('Y-m-d H:i:s',time());
$query_action = mysqli_query($conn,"INSERT INTO actions (action_name,username,role,note,date_reg) VALUES('edit visitor','".$_SESSION['username']."','".$_SESSION['role']."','".$_SESSION['username']." edited a visitor -> $name','$date_reg') ");
		$execute_query = mysqli_query($conn,$query);
		return $execute_query ? "Success" : "An error occured: \n".mysqli_error($conn)."\n".$query;
	}

	public function _delete($id){
		$conn = conn();
		$query = "DELETE FROM visitors WHERE visitor=$id";
		$execute_query = mysqli_query($conn,$query);
		//Delete visitor action
$date_reg = date('Y-m-d H:i:s',time());
$query_action = mysqli_query($conn,"INSERT INTO actions (action_name,username,role,note,date_reg) VALUES('delete visitor','".$_SESSION['username']."','".$_SESSION['role']."','".$_SESSION['username']." deleted a visitor -> $name','$date_reg') ");
		return $execute_query ? "Success" : "An error occured: \n".mysqli_error($conn)."\n".$query;
	}

	public function get_all($limit=false,$filter='all'){
		if($limit) $limit = "LIMIT $limit";
		else $limit = "";
		if($filter == 'all'){
			$query_string = "SELECT * FROM visitors WHERE status != 'deleted'";
		}
		if($filter == 'unassigned'){
			$query_string = "SELECT * FROM visitors WHERE visitorId NOT IN (SELECT visitorId FROM assign WHERE status != 'deleted') AND status != 'deleted' ORDER BY visitorId DESC $limit";
		}

		
		$conn = conn();
		$query = mysqli_query($conn,$query_string);
		$data = array();
            while($result = mysqli_fetch_array($query)){
            	array_push($data, $result);
            }
            return $data;
	}

	public function _get($id){
		$conn = conn();
		$query = mysqli_query($conn,"SELECT * FROM visitors WHERE visitorId=$id AND status != 'deleted'");
		$data = array();
            while($result = mysqli_fetch_array($query)){
            	array_push($data, $result);
            }
            return $data;
	}

}

class User
{
	public function _add($a){
		$conn = conn();
		$a['password'] = password_hash($a['password'], PASSWORD_DEFAULT);
		$query = "INSERT INTO users( cellid, username, firstname, lastname, password, photo, email, address, phone, role, status, date_reg) VALUES ('".$a['cellid']."','".$a['username']."','".$a['firstname']."','".$a['lastname']."','".$a['password']."','".$a['photo']."','".$a['email']."','".$a['address']."','".$a['phone']."','".$a['role']."','".$a['status']."','".$a['date_reg']."')";
		$execute_query = mysqli_query($conn,$query);	
			return $execute_query ? "Success" : "An error occured: \n".mysqli_error($conn)."\n".$query;
	}
	public function _edit($a,$id){
		$conn = conn();
		$query = " UPDATE visitors SET username='".$a['username']."', cellId='".$a['cellid']."', firstname='".$a['firstname']."', lastname='".$a['lastname']."', password='".$a['password']."', photo='".$a['photo']."', email='".$a['email']."', address='".$a['address']."', phone='".$a['phone']."', role='".$a['role']."', status='".$a['status']."', date_reg='".$a['date_reg']."' WHERE userid=$id ";
		$execute_query = mysqli_query($conn,$query);
		return $execute_query ? "Success" : "An error occured: \n".mysqli_error($conn)."\n".$query;
	}

	public function _delete($id){

		$conn = conn();
		$query = "UPDATE users SET status='deleted' WHERE userid=$id";
		$execute_query = mysqli_query($conn,$query);
		return $execute_query ? "Success" : "An error occured: \n".mysqli_error($conn)."\n".$query;
	}

	public function get_all(){
		$conn = conn();
		$dquery= "SELECT u.UserId,u.firstname,u.lastname,c.cell_name,a.area_name FROM users u join cells c on c.cellId=u.cellId join cell_areas a on c.areaId=a.areaId where u.status != 'deleted' and u.role='leader'";

            $dresult = mysqli_query($conn,$dquery) or die ("Your crappy DB is bugging again :D ".mysqli_error());
            $data = array();
            while($result = mysqli_fetch_array($dresult)){
            	array_push($data, $result);
            }
            return $data;
	}

	public function _get($id){
		$conn = conn();
		$query = mysqli_query($conn,"SELECT * FROM users WHERE UserId=$id AND status != 'deleted'");
        $result = mysqli_fetch_array($query);
            return $result;
	}

	public function login($username,$password){
		$conn = conn();
		$confirm = false;
		$query = "SELECT * FROM users WHERE username='$username'";
		$result = mysqli_query($conn,$query);
		$data = mysqli_fetch_array($result);
		if(!empty($data)){
			if(password_verify($password,$data['password'])){
				$_SESSION['username'] = $data['username'];
			$_SESSION['user_id'] = $data['UserId'];
			$_SESSION['role'] = $data['role'];
			$confirm = true;
			}
			
		}

		return $confirm;
	}
}

class Area
{
	public function _add($area_name,$area_city,$area_desc){
		$conn = conn();
		//IF AREA_NAME IS ALREADY IN THE DATABASE
             //CHECK IF AREA IS REGISTERED
            $check_query=mysqli_query($conn,"SELECT * FROM cell_areas WHERE area_name=\"$area_name\")");  
            if(mysqli_num_rows($check_query)>0)  
            {  
                $notification ="This area name is already inside your table";
            }   

            else {
            	 //ON DOIT SPECIFIER NOTRE PROPRE DATE DU SYSTEM PARCEKE LES BASE DE DONNEES ONT DES TIMEZONES DIFFERENTS [ NO DEFAULT TIMESTAMP ]
            $date_reg = date('Y-m-d H:i:s',time());

            //INSERTION 
            $result = mysqli_query($conn,"INSERT INTO cell_areas (area_name,area_city,area_desc,date_reg) values (\"$area_name\",\"$area_city\",\"$area_desc\",\"$date_reg\")");
          
                $notification = "Data was successfully Inserted.";
            }

           return $notification;
	}

	public function get_all(){
		$conn = conn();
		$query = mysqli_query($conn,"SELECT * FROM cell_areas WHERE status !='deleted'");
		$data = array();
            while($result = mysqli_fetch_array($query)){
            	array_push($data, $result);
            }
            return $data;
	}

	public function _get($id){
		$conn = conn();
		$query = mysqli_query($conn,"SELECT * FROM areas WHERE areaId=$id AND status != 'deleted'");
		$data = array();
            while($result = mysqli_fetch_array($query)){
            	array_push($data, $result);
            }
            return $data;
	}
        
        public function _edit($a,$id){
		$conn = conn();
                $area_name = $a['area_name'];
                $areaId = $id;
                $area_desc = $a['area_desc'];
                $area_city = $a['area_city'];
                $date_reg = date('Y-m-d H:i:s',time());
		$query = "UPDATE cell_areas SET area_name='$area_name', area_desc='$area_desc', area_city='$area_city', date_reg='$date_reg' WHERE areaId=$areaId";
		$execute_query = mysqli_query($conn,$query);
		return $execute_query ? "Success" : "An error occured.";
	}
        
        public function _delete($id){
		$conn = conn();
		$query = "UPDATE cell_areas SET status='deleted' WHERE areaId=$id";
		$execute_query = mysqli_query($conn,$query);
		return $execute_query ? "Success" : "An error occured";
	}
}

class Cell
{
	public function _add($cell_name,$cell_desc,$areaId){
		$conn = conn();
		//SI LES CHAMPS SONT VIDES
            if($cell_name == "") {
                $notification ="Please look well, Write something in the fields dumb ass*";
            }

            else {
            	//IF AREA_NAME IS ALREADY IN THE DATABASE
            //CHECK IF CLIENT IS REGISTERED
            $check_query=mysqli_query($conn,"SELECT * FROM cells WHERE cell_name='$cell_name'");  
            if(mysqli_num_rows($check_query)>0)  
            {  
                $notification ="This cell is already inside your database arggggg...";
            }   

            else{
            	 //ON DOIT SPECIFIER NOTRE PROPRE DATE DU SYSTEM PARCEKE LES BASE DE DONNEES ONT DES TIMEZONES DIFFERENTS [ NO DEFAULT TIMESTAMP ]
            $date_reg = date('Y-m-d H:i:s',time());

            //INSERTION 
            $result = mysqli_query($conn,"INSERT INTO cells (cell_name,areaId,cell_desc,date_reg) values ('$cell_name','$areaId','$cell_desc','$date_reg')");
          
                $notification= " Data was successfully Inserted";
            }

           
            }

            return $notification;
	}

	public function get_all(){
		$conn = conn();
		$query = mysqli_query($conn,"SELECT c.cellId,a.area_name,c.cell_name,c.cell_desc FROM cells c JOIN cell_areas a on c.areaId=a.areaId WHERE c.status !='deleted'");
		$data = array();
            while($result = mysqli_fetch_array($query)){
            	array_push($data, $result);
            }
            return $data;
	}

	public function _get($id){
		$conn = conn();
		$query = mysqli_query($conn,"SELECT * FROM cells WHERE cellId=$id AND status != 'deleted'");
		$data = array();
            while($result = mysqli_fetch_array($query)){
            	array_push($data, $result);
            }
            return $data;
	}
        
        public function _edit($a,$id){
		$conn = conn();
                $cell_name = $a['cell_name'];
                $areaId = $a['areaId'];
                $cell_desc = $a['cell_desc'];
                $date_reg = date('Y-m-d H:i:s',time());
                $cellId = $a['cellId'];
		$query = "UPDATE cells SET cell_name='$cell_name', areaId='$areaId', cell_desc='$cell_desc',date_reg='$date_reg' WHERE cellId=$cellId";
		$execute_query = mysqli_query($conn,$query);
		return $execute_query ? "Success" : "An error occured: \n".mysqli_error($conn)."\n".$query;
	}
        
        public function _delete($id){

		$conn = conn();
		$query = "UPDATE cells SET status='deleted' WHERE cellId=$id";
		$execute_query = mysqli_query($conn,$query);
		return $execute_query ? "Success" : "An error occured";
	}
}

class Assign
{
	public function _add($visitorId,$userId,$session,$assign_date){
		$conn = conn();
		$status="assigned";

		$check_query=mysqli_query($conn,"SELECT * FROM assign WHERE visitorId='$visitorId' AND userId='$userId' AND status!='deleted'");  
            if(mysqli_num_rows($check_query)>0)  
            {  
                $notification ="This Visitor has already been assigned to a leader.";
            }  

            else{
            	 //ON DOIT SPECIFIER NOTRE PROPRE DATE DU SYSTEM PARCEKE LES BASE DE DONNEES ONT DES TIMEZONES DIFFERENTS [ NO DEFAULT TIMESTAMP ]
            $date_reg = date('Y-m-d H:i:s',time());

            //INSERTION 
            $result = mysqli_query($conn,"INSERT INTO assign (visitorId,userId,assign_date,session,status,date_reg) values (\"$visitorId\",\"$userId\",\"$assign_date\",\"$session\",\"$status\",\"$date_reg\")");
            $notification = $result ? "Success" : "An error occured";
            }
            return $notification;
           
	}

	public function get_all($filter=''){
		if($filter == 'pending'){
			$query_string = "SELECT * FROM assign WHERE status = 'pending'";
		}

		if($filter == 'approved'){
			$query_string = "SELECT * FROM assign WHERE status = 'approved'";
		}

		else {
			$query_string = "SELECT ass.assignId,v.name,v.phone,v.location,v.area,u.firstname,u.lastname,c.cell_name,ass.status,ass.assign_date,ass.session,a.area_name from assign ass join visitors v on v.visitorId=ass.visitorId join users u on u.UserId=ass.userId join cells c on c.cellId=u.cellId join cell_areas a on a.areaId=c.areaId where ass.status='assigned' OR ass.status='pending'";
		}
		$conn = conn();
		$query = mysqli_query($conn,$query_string);
		$data = array();
            while($result = mysqli_fetch_array($query)){
            	array_push($data, $result);
            }
            return $data;
	}

	public function _get($id){
		$conn = conn();
		$query = mysqli_query($conn,"SELECT * FROM assign WHERE visitorId=$id AND status != 'deleted'");
		$data = array();
            while($result = mysqli_fetch_array($query)){
            	array_push($data, $result);
            }
            return $data;
	}
}
