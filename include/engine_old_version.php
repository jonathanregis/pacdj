<?php
require_once("connection.php");
class Visitor
{
	public function _add($a){
		$conn = conn();
		$query = "INSERT INTO visitors( name, dob, gender, phone, email, area, location, postal_address, workplace, belong_church, department, issue, decision, invited_by, invited_by_phone, status, date_reg) VALUES ('".$a['name']."','".$a['dob']."','".$a['gender']."','".$a['phone']."','".$a['email']."','".$a['area']."','".$a['location']."','".$a['postal_address']."','".$a['workplace']."','".$a['belong_church']."','".$a['department']."','".$a['issue']."','".$a['decision']."','".$a['invited_by']."','".$a['invited_by_phone']."','".$a['status']."','".$a['date_reg']."')";
		$execute_query = mysqli_query($conn,$query);
		return $execute_query ? "Success" : "An error occured: \n".mysqli_error($conn)."\n".$query;
	}
	public function _edit($a,$id){
		$conn = conn();
		$query = " UPDATE visitors SET name='".$a['name']."', dob='".$a['dob']."', gender='".$a['gender']."', phone='".$a['phone']."', email='".$a['email']."', area='".$a['area']."', location='".$a['location']."', postal_address='".$a['postal_address']."', workplace='".$a['workplace']."', belong_church='".$a['belong_church']."', department='".$a['department']."', issue='".$a['issue']."', decision='".$a['decision']."', invited_by='".$a['invited_by']."', invited_by_phone='".$a['invited_by_phone']."', status='".$a['status']."', date_reg='".$a['date_reg']." WHERE id=$id ";
		$execute_query = mysqli_query($conn,$query);
		return $execute_query ? "Success" : "An error occured: \n".mysqli_error($conn)."\n".$query;
	}

	public function _delete($id){
		$conn = conn();
		$query = "DELETE FROM visitors WHERE visitor=$id";
		$execute_query = mysqli_query($conn,$query);
		return $execute_query ? "Success" : "An error occured: \n".mysqli_error($conn)."\n".$query;
	}

	public function get_all(){
		$conn = conn();
		$query = mysqli_query($conn,"SELECT * FROM visitors WHERE status != 'deleted'");
		$data = array();
            while($result = mysqli_fetch_array($query)){
            	array_push($data, $result);
            }
            return $data;
	}

	public function _get($id){
		$conn = conn();
		$query = "SELECT * FROM visitors WHERE visitorId=$id AND status != 'deleted'";
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
		$query = "INSERT INTO users( cellid, username, firstname, lastname, password, photo, email, address, phone, role, status, date_reg) VALUES ('".$a['cellid']."','".$a['username']."','".$a['firstname']."','".$a['lastname']."','".$a['password']."','".$a['photo']."','".$a['email']."','".$a['address']."','".$a['phone']."','".$a['role']."','".$a['status']."','".$a['date_reg']."')";
		$execute_query = mysqli_query($conn,$query);	
			return $execute_query ? "Success" : "An error occured: \n".mysqli_error($conn)."\n".$query;
	}
	public function _edit($a,$id){
		$conn = conn();
		$query = " UPDATE visitors SET username='".$a['username']."', cellid='".$a['cellid']."', firstname='".$a['firstname']."', lastname='".$a['lastname']."', password='".$a['password']."', photo='".$a['photo']."', email='".$a['email']."', address='".$a['address']."', phone='".$a['phone']."', role='".$a['role']."', status='".$a['status']."', date_reg='".$a['date_reg']."' WHERE userid=$id ";
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
		$query = "SELECT * FROM users WHERE UserId=$id AND status != 'deleted'";
		$data = array();
            while($result = mysqli_fetch_array($query)){
            	array_push($data, $result);
            }
            return $data;
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
                $notification ="This area name is already inside your table arggggg...";
            }   

            else {
            	 //ON DOIT SPECIFIER NOTRE PROPRE DATE DU SYSTEM PARCEKE LES BASE DE DONNEES ONT DES TIMEZONES DIFFERENTS [ NO DEFAULT TIMESTAMP ]
            $date_reg = date('Y-m-d H:i:s',time());

            //INSERTION 
            $result = mysqli_query($conn,"INSERT INTO cell_areas (area_name,area_city,area_desc,date_reg) values (\"$area_name\",\"$area_city\",\"$area_desc\",\"$date_reg\")");
          
                $notification = "Data was successfully Inserted Nigga\nNow go grab some coffee and Rest small";
            }

           return $notification;
	}

	public function get_all(){
		$query = mysqli_query("SELECT * FROM cell_areas WHERE status !='deleted'");
		$data = array();
            while($result = mysqli_fetch_array($query)){
            	array_push($data, $result);
            }
            return $data;
	}

	public function _get($id){
		$conn = conn();
		$query = "SELECT * FROM areas WHERE areaId=$id AND status != 'deleted'";
		$data = array();
            while($result = mysqli_fetch_array($query)){
            	array_push($data, $result);
            }
            return $data;
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
          
                $notification= " Data was successfully Inserted Nigga !\n 
                Now go grab some coffee and Rest small";
            }

           
            }

            return $notification;
	}

	public function get_all(){
		$query = mysqli_query("SELECT * FROM cells WHERE status !='deleted'");
		$data = array();
            while($result = mysqli_fetch_array($query)){
            	array_push($data, $result);
            }
            return $data;
	}

	public function _get($id){
		$conn = conn();
		$query = "SELECT * FROM cells WHERE cellId=$id AND status != 'deleted'";
		$data = array();
            while($result = mysqli_fetch_array($query)){
            	array_push($data, $result);
            }
            return $data;
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

	public function get_all(){
		$query = mysqli_query("SELECT * FROM assign WHERE status != 'deleted'");
		$data = array();
            while($result = mysqli_fetch_array($query)){
            	array_push($data, $result);
            }
            return $data;
	}

	public function _get($id){
		$conn = conn();
		$query = "SELECT * FROM assign WHERE visitorId=$id AND status != 'deleted'";
		$data = array();
            while($result = mysqli_fetch_array($query)){
            	array_push($data, $result);
            }
            return $data;
	}
}
