<?php

// create conection class.
class db{
	public $dbservername= "localhost";
	public $dbusername= "root";
	public $dbpassword= "";
	public $dbname= "care";
	public $connect;
	
	function __construct(){
		$this->connect = new mysqli($this->dbservername,$this->dbusername,$this->dbpassword,$this->dbname);
		
		if($this->connect->connect_error){
			echo "connection error";
		}else {
			return $this->connect;
		} //else close
	} //construct close
} // db class close



// create crud class and inherit with connection class.
class CRUD extends db{
	
	// Add all table on this funtion
	function Add($table,$values,$rediract){
		$insert = "insert into $table values(Null,$values)";
		$run = $this->connect->query($insert);
		
		
		if($run){
			echo "<script>location.href='$rediract=Added-Successfully';</script>";
		}else {
			echo "<script>location.href='$rediract=Added-Error';</script>";
		} // else close
		
	} // Add funtion close
	
	
	// View all table on this funtion.
	function View($condition,$table,$where_condition,$orderby){
		$select = "select $condition from $table $where_condition $orderby";
		$run = $this->connect->query($select);
		
		if($run->num_rows >= 1){
			
			while($fetch = $run->fetch_assoc())
			{
				$data[] = $fetch;
			} //while loop close
			return $data;
		} // if num_rows close
	} // View funtion close
	
	
	// get all values in felids for update on this funtion (for all table).
	function Update_get_by_id($condition,$table,$where_condition){
		
		$select = "select $condition from $table  $where_condition";
		$run = $this->connect->query($select);
		
		if($run->num_rows == 1){
			
			$fetch = $run->fetch_assoc();
			
			return $fetch;
		} // if num_rows close
	} // Update_get_by_id function close
	
	
	// Update all table on this function
	function Update($table,$values,$condition,$rediract){
		$update = "UPDATE $table SET $values  $condition";
		$run = $this->connect->query($update);
		
		if($run){
			echo "<script>location.href='$rediract=Update-Successfully';</script>";
		}else{
			echo "<script>location.href='$rediract=Update-Error';</script>";
		} //else close
	} // Update function close
	
	
	function Delete($table,$id,$rediract){
		
		$delete = "DELETE FROM $table where id='$id'";
		$run = $this->connect->query($delete);
		
		if($run){
			echo "<script>location.href='$rediract=Delete-Successfully';</script>";
		}else{
			echo "<script>location.href='$rediract=Delete-Error';</script>";
		} //else close
	}
	
} // Crud class close


class functionality extends CRUD{
	
	// Add doctor
	function Add_doctor(){
		
		if(isset($_POST['doctorbtn']))
		{
			 
			
			// for diractery
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			
			//for insert in table
		 $values = "'".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["address"]."','".$_FILES["pic"]["name"]."','".$_POST["city"]."','".$_POST["state"]."','".$_POST["zip"]."','".$_POST["sp"]."','".$_POST["exp"]."','".$_POST["bio"]."','".$_POST["pass"]."','Doctor',NOW()";
			
			
			
			//$v = mysqli_real_escape_string($this->connect,$values);
			
			$path = "../Doctor/$fname $lname/";
			
			mkdir($path,0,true);
			
			$img = $_FILES['pic']['name'];
			$old_location = $_FILES['pic']['tmp_name'];
			$new_location = $path.$img;
			
			move_uploaded_file($old_location,$new_location);
			
			
			$this->Add('users',$values,'Add-doctor?m');
			
		} //ifsset close
		
	} // Doctor-Add Function close
	
	 function Doctor_list(){
	   
	   $data = $this->View('*','users'," where roller='Doctor' ",'ORDER BY id DESC');
		 if($data){
		 $sno =1;
		 
		 foreach($data as $value){
			 
		echo 	"<tr>
			<td></td>
			<td>".$sno++."</td>
            <td>".$value['firstname']." " .$value['lastname']."</td>
			<td>".$value['email']."</td>
			<td>".$value['phone']."</td>
			<td>".$value['cityname']."</td>
			<td>".$value['state']."</td>
			<td>".$value['zip']."</td>
			<td>".$value['address']."</td>
			<td>".$value['specialistname']."</td>
			<td>".$value['experience']."</td>
			<td>".$value['date']."</td>
			<td><a href='#'><img src='../Doctor/".$value['firstname']." " .$value['lastname']."/".$value['image']."' alt='' class='mCS_img_loaded'> </a></td>
            <td class='datatable-ct'>
			<a title='Edit' href='Add-Doctor?Edit=".$value['id']."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
			<a title='Edit Picture' href='Add-Doctor?Edit-Img=".$value['id']."'><i class='fa fa-picture-o' aria-hidden='true'></i></a>
			<a href='Add-Doctor?List=".$value['id']."' title='Delete'><i class='fa fa-trash' aria-hidden='true'></i></a>
			</td>
            </tr>";
			 
			
		 } // Foreach close
	  
		 } // if close
   } // Doctor List Function Close
	
	
	//For Doctor Delete
	function Doctor_Delete(){
		
		if(isset($_GET['List']) AND $_GET['List'] != ''){
			
			$get_id = $_GET['List'];
			
			$this->Delete('users',$get_id,'Add-doctor?List&m');
		} // ifsset close
	} // Docter_Delete close
	
	
	
	function Add_City(){
		
		if(isset($_POST['citybtn'])){
			$values = "'".$_POST["city"]."'";
			
			$this->Add('city',$values,'Add-City?m');
		} // ifisset close
	}  // Add-city close
	
	
	function City_list(){
		
		$data = $this->View('*','city','','ORDER BY id DESC');
		if($data){
		$sno=1;
		foreach($data as $value){
			
			echo "  <tr>
                                                    <td>".$sno++."</td>
                                                    <td>".$value['city']."</td>
                                                    <td><a href='Add-City?Edit=".$value['id']."' class='btn btn-custon-two btn-primary btn-sm' >Edit</a></td>
                                                    <td><a href='Add-City?Delete=".$value['id']."' class='btn btn-custon-two btn-danger btn-sm' >Delete</a></td>
                                                </tr>";
		} // foreach close
		} // if close
	} // city_list close
	
	
	
	function City_Delete(){
		
		if(isset($_GET['Delete'])){
			$get_id = $_GET['Delete'];
			$this->Delete('city',$get_id,'Add-City?m');
		} // ifisset close
	} // city_Delete close
	
	
	
	function City_Update(){
		
		if(isset($_POST['updatecity'])){
			
			$get_id = $_GET['Edit'];
			
			$values = "city='".$_POST['city']."'";
			
		  $this->Update('city',$values,"where id='$get_id'",'Add-City?m');
		}
	}
	
		
	} // functionality class close

  
   
   















class errors{
	
	function Find($Add,$add_error,$delete,$delete_error,$update,$update_error){
		
		
		if(isset($_GET['m']) AND $_GET['m'] == "Added-Successfully"){
			
			echo "<div class='alert alert-success alert-success-style1'>
                                    <button type='button' class='close sucess-op' data-dismiss='alert' aria-label='Close'>
                                        <span class='icon-sc-cl' aria-hidden='true'>×</span>
                                    </button>
                                   
                                    <p class='message-alert-none'> $Add</p>
                                </div>";
			
		}else if(isset($_GET['m']) AND $_GET['m'] == "Added-Error"){
			echo "<div class='alert alert-danger alert-mg-b alert-success-style4 alert-success-stylenone'>
                                    <button type='button' class='close sucess-op' data-dismiss='alert' aria-label='Close'>
                                        <span class='icon-sc-cl' aria-hidden='true'>×</span>
                                    </button>
                                   
                                    <p class='message-alert-none'> $add_error</p>
                                </div>";
			
		}else if(isset($_GET['m']) AND $_GET['m'] == "Delete-Error"){
			echo "<div class='alert alert-danger alert-mg-b alert-success-style4 alert-success-stylenone'>
                                    <button type='button' class='close sucess-op' data-dismiss='alert' aria-label='Close'>
                                        <span class='icon-sc-cl' aria-hidden='true'>×</span>
                                    </button>
                                   
                                    <p class='message-alert-none'> $delete_error</p>
                                </div>";
			
		}else if(isset($_GET['m']) AND $_GET['m'] == "Delete-Successfully"){
			
			echo "<div class='alert alert-success alert-success-style1'>
                                    <button type='button' class='close sucess-op' data-dismiss='alert' aria-label='Close'>
                                        <span class='icon-sc-cl' aria-hidden='true'>×</span>
                                    </button>
                                   
                                    <p class='message-alert-none'> $delete</p>
                                </div>";
			
		}else if(isset($_GET['m']) AND $_GET['m'] == "Update-Error"){
			echo "<div class='alert alert-danger alert-mg-b alert-success-style4 alert-success-stylenone'>
                                    <button type='button' class='close sucess-op' data-dismiss='alert' aria-label='Close'>
                                        <span class='icon-sc-cl' aria-hidden='true'>×</span>
                                    </button>
                                   
                                    <p class='message-alert-none'> $update_error</p>
                                </div>";
			
		}else if(isset($_GET['m']) AND $_GET['m'] == "Update-Successfully"){
			
			echo "<div class='alert alert-success alert-success-style1'>
                                    <button type='button' class='close sucess-op' data-dismiss='alert' aria-label='Close'>
                                        <span class='icon-sc-cl' aria-hidden='true'>×</span>
                                    </button>
                                   
                                    <p class='message-alert-none'> $update</p>
                                </div>";
			
		}
		
		
		
		
	}
}



?>