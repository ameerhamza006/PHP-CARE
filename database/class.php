<?php

// create conection class.
class db{
	public $dbservername= "localhost";
	public $dbusername= "root";
	public $dbpassword= "";
	public $dbname= "care";
	public $connect;
	
	//create constructer this will be auto call in start
	function __construct(){
		
		//
		$this->connect = new mysqli($this->dbservername,$this->dbusername,$this->dbpassword,$this->dbname);
		
		//if connection error
		if($this->connect->connect_error){
			echo "connection error";
			
		//when connection will be ok	
		}else {
			return $this->connect;
			
		} //else close
		
	} //construct function close
	
} // db connection class close




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
	
	
	//Single value select
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
	
	
	// delete all table in this function
	function Delete($table,$id,$rediract){
		
		$delete = "DELETE FROM $table where id='$id'";
		$run = $this->connect->query($delete);
		
		if($run){
			echo "<script>location.href='$rediract=Delete-Successfully';</script>";
		}else{
			echo "<script>location.href='$rediract=Delete-Error';</script>";
		} //else close
	} // delete funtion close
	
} // Crud class close



class functionality extends CRUD{
	
	
	//------------Doctor CRUD Start---------//
	
	
	// Add Doctor
	function Add_doctor(){
		
		// when click on button
		if(isset($_POST['doctorbtn']))
		{
			 
			//for values to insert in table
		 $values = "'".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["address"]."','".$_FILES["pic"]["name"]."','".$_POST["city"]."','".$_POST["state"]."','".$_POST["zip"]."','".$_POST["sp"]."','".$_POST["exp"]."','".$_POST["bio"]."','".$_POST["pass"]."','Doctor',NOW()";
			
			
			
			//$v = mysqli_real_escape_string($this->connect,$values);
			
			// for folder by Docter name 
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			
			// create new path by doctor name
			$path = "../Doctor/$fname $lname/";
			
			//exicute path
			mkdir($path,0,true);
			
			// for image name
			$img = $_FILES['pic']['name'];
			// for old path from pc
			$old_location = $_FILES['pic']['tmp_name'];
			// new path for move to folder
			$new_location = $path.$img;
			
			// move image to folder
			move_uploaded_file($old_location,$new_location);
			
			// for Add Doctor into table
			$this->Add('users',$values,'Add-doctor?m');
			
		} //ifsset close
		
	} // Doctor-Add Function close
	
	// Update Doctor
	function Update_doctor(){
		
		// when click on button
		if(isset($_POST['updatedoctor']))
		{
			// get id from url
			 $get_id = $_GET['Edit'];
			
			
			//for update in table
		 $values = "firstname='".$_POST["fname"]."',lastname='".$_POST["lname"]."',email='".$_POST["email"]."',phone='".$_POST["phone"]."',address='".$_POST["address"]."',cityname='".$_POST["city"]."',state='".$_POST["state"]."',zip='".$_POST["zip"]."',specialistname='".$_POST["sp"]."',experience='	".$_POST["exp"]."',bio='".$_POST["bio"]."',password='".$_POST["pass"]."'";
			
			// for new folder name
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			
			
			//select old name for folder rename
			$dataa = $this->Update_get_by_id('*','users'," where id='$get_id' ");
			
			$oldfname = $dataa['firstname'];
			$oldlname = $dataa['lastname'];
			
			//folder old path/name
			$path = "../Doctor/$oldfname $oldlname/";
			//folder new path/name
			$pathnew = "../Doctor/$fname $lname/";
			
			//remane path old to new
			rename($path,$pathnew);
			
		     // for update doctor into table
			$this->Update('users',$values," where id='$get_id' ",'Add-doctor?List&m');
			
		} //ifsset close
		
	} // Doctor-update Function close
	
	// Update Doctor image
	function Update_doctor_img(){
		
		// when click on button
		if(isset($_POST['updatedoctorimg']))
		{
		    // for get id from url	 
			$get_id = $_GET['Edit-Img'];
			
			
			//for insert values in table
		 $values = "firstname='".$_POST["fname"]."',lastname='".$_POST["lname"]."',image='".$_FILES["pic"]['name']."'";
			
			
			
			//$v = mysqli_real_escape_string($this->connect,$values);
			
			// for create folder by Doctor name
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			
			//for fetch old name Doctor
			$data = $this->Update_get_by_id('*','users',"where id='$get_id'");
			
			//get doctor name from table
			$oldfname = $data['firstname'];
			$oldlname = $data['lastname'];
			
			//old path doctor
			$path = "../Doctor/$oldfname $oldlname/";
			
			// create new path by doctor name
			$pathnew = "../Doctor/$fname $lname/";
			
			//exicute path
			rename($path,$pathnew);
			
			//get image name
			$img = $_FILES['pic']['name'];
			//get old path from pc
			$old_location = $_FILES['pic']['tmp_name'];
			// create new path for moveing image in folder
			$new_location = $path.$img;
			
			//move image into folder
			move_uploaded_file($old_location,$new_location);
			
			// update Doctor
			$this->Update('users',$values," where id='$get_id' ",'Add-doctor?List&m');
			
		} //ifsset close
		
	} // Doctor-update-image Function close
	
	 // View Doctor
	 function Doctor_list(){
	   
		 //for fetch all doctor from table
	   $data = $this->View('*','users'," where roller='Doctor' ",'ORDER BY id DESC');
		 
		 //if doctor is in table
		 if($data){
			
		 // for serial no	 
		 $sno =1;
		 
		 // view all Doctors from table
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
	
	// Delete Doctor
	function Doctor_Delete(){
		
		//when get id from url
		if(isset($_GET['List']) AND $_GET['List'] != ''){
			
			//move get id into variable
			$get_id = $_GET['List'];
			
			//delete doctor from table
			$this->Delete('users',$get_id,'Add-doctor?List&m');
		} // ifsset close
	} // Docter_Delete close
	
	
	//------------Doctor CRUD End---------//
	
	
	
	
	//------------City CRUD Start---------//
	
	
	// Add City
	function Add_City(){
		
		//when click on button
		if(isset($_POST['citybtn'])){
			
			//for insert values into table
			$values = "'".$_POST["city"]."'";
			
			//add city into table
			$this->Add('city',$values,'Add-City?m');
			
		} // ifisset close
	}  // Add-city close
	
	// View City
	function City_list(){
		
		//fetch all cities from table
		$data = $this->View('*','city','','ORDER BY id DESC');
		
		//if city 
		if($data){
			
		// for serial number	
		$sno=1;
			
		//view all cities from table
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
	
	// Delete city
	function City_Delete(){
		
		//when get id from url
		if(isset($_GET['Delete'])){
			
			// get id move to variable
			$get_id = $_GET['Delete'];
			
			//delete city from table
			$this->Delete('city',$get_id,'Add-City?m');
		} // ifisset close
	} // city_Delete close
	
	// Update City
	function City_Update(){
		
		//when click on button
		if(isset($_POST['updatecity'])){
			
				// get id move to variable
			$get_id = $_GET['Edit'];
			
			//values for city table
			$values = "city='".$_POST['city']."'";
			
		  // update city from table
		  $this->Update('city',$values,"where id='$get_id'",'Add-City?m');
		} // ifisset close
	} // city_update close
	
	
	//----------------City CRUD End-----------------//
	
	
	
	
	//------------Avialiblility CRUD Start---------//

	
	// Add Avialiblitity
	function Avi_Add(){
		
		//when click on button
		if(isset($_POST['avibtn'])){
			
			// for table insert values
			$values = "'".$_POST['monstart']." - ".$_POST['monend']."','".$_POST['tustart']." - ".$_POST['tuend']."','".$_POST['wedstart']." - ".$_POST['wedend']."','".$_POST['thustart']." - ".$_POST['thuend']."','".$_POST['fristart']." - ".$_POST['friend']."','".$_POST['satstart']." - ".$_POST['satend']."','".$_POST['sunstart']." - ".$_POST['sunend']."','".$_POST['doctor']."',NOW()";
			
			//Add Avialibalility into table
			$this->Add('availability',$values,'Availability?m');
			
	
		} // ifisset close
		
	}  // Avi Add function close

	//View Avialibalility
	function Avi_list(){
		
		//Doctor INNER JOIN with availability for doctor name and his Avialibalility
		$data = $this->View('users.firstname,users.lastname,availability.id,availability.monday,availability.tuesday,availability.wednesday,availability.thursday,availability.friday,availability.saturday,availability.sunday,availability.date','users'," LEFT JOIN availability ON users.id = availability.user_id ",'');
		
		//if availability is in table
		 if($data){
			
		 // for serial no	 
		 $sno =1;
		 
		 // view all availability from table
		 foreach($data as $value){
			 
		echo 	"<tr>
			<td></td>
			<td>".$sno++."</td>
            <td>".$value['firstname']." ".$value['lastname']."</td>
            
     
			<td>".$value['monday']."</td>
			<td>".$value['tuesday']."</td>
			<td>".$value['wednesday']."</td>
			<td>".$value['thursday']."</td>
			<td>".$value['friday']."</td>
			<td>".$value['saturday']."</td>
			<td>".$value['sunday']."</td>
			<td>".$value['date']."</td>
			
			
            <td class='datatable-ct'>
			<a title='Edit' href='Availability?Edit=".$value['id']."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
			<a title='Edit Picture' href='Availability?Edit-Img=".$value['id']."'><i class='fa fa-picture-o' aria-hidden='true'></i></a>
			<a href='Availability?List=".$value['id']."' title='Delete'><i class='fa fa-trash' aria-hidden='true'></i></a>
			</td>
            </tr>";
			 
			
		 } // Foreach close
	  
		 } // if close
		
	} // Avialibalility List Function close
  
	// Update Avialibalility
	function Avi_Update(){
		
		
		//when click on button
		if(isset($_POST['avibtnupdate'])){
			
			//move id into variable
			$get_id = $_GET['Edit'];
			
			//values for table 
			$values = "monday='".$_POST['monstart']." - ".$_POST['monend']."',tuesday='".$_POST['tustart']." - ".$_POST['tuend']."',wednesday='".$_POST['wedstart']." - ".$_POST['wedend']."',thursday='".$_POST['thustart']." - ".$_POST['thuend']."',friday='".$_POST['fristart']." - ".$_POST['friend']."',saturday='".$_POST['satstart']." - ".$_POST['satend']."',sunday='".$_POST['sunstart']." - ".$_POST['sunend']."',user_id='".$_POST['doctor']."',date=NOW()";
			
			//Update From Avialibalility table
			$this->Update('availability',$values," where id='$get_id' ",'Availability?List&m');
			
			
	
		} // ifisset close
		
	} // Avialibalility Update function close
	
	// Delete Avialibalility
	function Avi_Delete(){
		
		// if get id from url
		if(isset($_GET['List']) AND $_GET['List'] != ''){
			
			// get id move to variable
			$get_id = $_GET['List'];
			
			//delete Avialibalility from table
			$this->Delete('availability',$get_id,'Availability?List&m');
			
		} // ifisset close
		
	} // Avialibalility Delete function close
	
   
   //------------Avialibalility CRUD End---------//

	
   
   //------------Links CRUD Start---------//
	
	
	
	function Links_Add(){
		
		
		if(isset($_POST['linkadd'])){
			
		
		
		$values = "'".$_POST['fb']."','".$_POST['tw']."','".$_POST['lk']."','".$_POST['insta']."','".$_POST['com']."','".$_POST['doctor']."'";
			
			$this->Add('links',$values,'Social-Links?List&m');
			
			
		}
	}
	
	
	function Links_list(){
		
		
		$data = $this->View('users.firstname,users.lastname,links.id,links.facebook,links.twitter,links.linkedin,links.instagram,links.company','users'," LEFT JOIN links ON users.id = links.user_id ",'ORDER BY id DESC');
		
		
		//if links is in table
		 if($data){
			
		 // for serial no	 
		 $sno =1;
		 
		 // view all links from table
		 foreach($data as $value){
			 
		echo 	"<tr>
			<td></td>
			<td>".$sno++."</td>
            <td>".$value['firstname']." ".$value['lastname']."</td>
            
     
			<td>".$value['facebook']."</td>
			<td>".$value['twitter']."</td>
			<td>".$value['linkedin']."</td>
			<td>".$value['instagram']."</td>
			<td>".$value['company']."</td>
			
            <td class='datatable-ct'>
			<a title='Edit' href='Social-Links?Edit=".$value['id']."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
			<a title='Edit Picture' href='Social-Links?Edit-Img=".$value['id']."'><i class='fa fa-picture-o' aria-hidden='true'></i></a>
			<a href='Social-Links?List=".$value['id']."' title='Delete'><i class='fa fa-trash' aria-hidden='true'></i></a>
			</td>
            </tr>";
			 
			
		 } // Foreach close
	  
		 } // if close
		
	}
	
	
	function Links_Update(){
		
		if(isset($_POST['linkupdate'])){
			
		$get_id = $_GET['Edit'];
		
		$values = "facebook='".$_POST['fb']."',twitter='".$_POST['tw']."',linkedin='".$_POST['lk']."',instagram='".$_POST['insta']."',company='".$_POST['com']."',user_id='".$_POST['doctor']."'";
			
			$this->Update('links',$values," where id='$get_id' ",'Social-Links?List&m');
			
			
			
		}
		
	}
	
	
	function Links_Delete(){
		
		if(isset($_GET['List']) AND $_GET['List'] != ''){
			
			$get_id = $_GET['List'];
			
			$this->Delete('links',$get_id,'Social-Links?List&m');
		}
	}
	
  //------------Links CRUD End---------//


	
	
	 //------------News CRUD Start---------//
	
	
	
	function News_Add(){
		
		
		if(isset($_POST['newsadd'])){
			
		
			$path = "../News/";
			
			// for image name
			$img = $_FILES['pic']['name'];
			// for old path from pc
			$old_location = $_FILES['pic']['tmp_name'];
			// new path for move to folder
			$new_location = $path.$img;
			
			// move image to folder
			move_uploaded_file($old_location,$new_location);
			
			$values = "'".$_POST['title']."','".$_POST['bio']."','".$_FILES['pic']['name']."','1',NOW()";
			
			//print_r($values);
			
			$this->Add('blog',$values,'News?List&m');
			
			
		}
	}
	
	
	function News_list(){
		
		
		$data = $this->View('users.firstname,users.lastname,blog.id,blog.title,blog.bio,blog.image','users'," INNER JOIN blog ON users.id = blog.user_id ",'ORDER BY id DESC');
		
		
		//if blog is in table
		 if($data){
			
		 // for serial no	 
		 $sno =1;
		 
		 // view all blog from table
		 // view all blog from table
		 foreach($data as $value){
			 
		echo 	"<tr>
			<td></td>
			<td>".$sno++."</td>
            <td>".$value['firstname']." " .$value['lastname']."</td>
			<td>".$value['title']."</td>
			<td>".$value['bio']."</td>
			
			<td><a href='#'><img  src='../News/".$value['image']."' alt='' class='mCS_img_loaded' style='height: 70px;width: 100px;' > </a></td>
			
            <td class='datatable-ct'>
			<a title='Edit' href='News?Edit=".$value['id']."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
			<a title='Edit Picture' href='News?Edit-Img=".$value['id']."'><i class='fa fa-picture-o' aria-hidden='true'></i></a>
			<a href='News?List=".$value['id']."' title='Delete'><i class='fa fa-trash' aria-hidden='true'></i></a>
			</td>
            </tr>";
			 
			
		 } // Foreach close
		 } // if close
		
	}
	
	
	// Update News
	function News_Update(){
		
		// when click on button
		if(isset($_POST['newsupdate']))
		{
			// get id from url
			 $get_id = $_GET['Edit'];
			
			if($_FILES['pic']['name'] == ''){
			
			//for update in table
		     $values = "title='".$_POST["title"]."',bio='".$_POST["bio"]."',user_id='8'";
			
		
			
		     // for update news into table
			$this->Update('blog',$values," where id='$get_id' ",'News?List&m');
				
			}else {
				
				
				//for update in table
		 $values = "title='".$_POST["title"]."',bio='".$_POST["bio"]."',image='".$_FILES['pic']['name']."',user_id='8'";
			
			$path = "../News/";
			
			// for image name
			$img = $_FILES['pic']['name'];
			// for old path from pc
			$old_location = $_FILES['pic']['tmp_name'];
			// new path for move to folder
			$new_location = $path.$img;
			
			// move image to folder
			move_uploaded_file($old_location,$new_location);
			
			
			
		     // for update doctor into table
			$this->Update('blog',$values," where id='$get_id' ",'News?List&m');
				
				
				
			}
		} //ifsset close
		
	} // Doctor-update Function close
	
	
	
	
	function News_Delete(){
		
		if(isset($_GET['List']) AND $_GET['List'] != ''){
			
			$get_id = $_GET['List'];
			
			$this->Delete('blog',$get_id,'News?List&m');
		}
	}
	
	
	
  //------------News CRUD End---------//

	
	
} // functionality class close





// All messages from this class
class errors{
	
	function Find($Add,$add_error,$delete,$delete_error,$update,$update_error){
		
		//when get Added-Successfully from url
		if(isset($_GET['m']) AND $_GET['m'] == "Added-Successfully"){
			
			echo "<div class='alert alert-success alert-success-style1'>
                                    <button type='button' class='close sucess-op' data-dismiss='alert' aria-label='Close'>
                                        <span class='icon-sc-cl' aria-hidden='true'>×</span>
                                    </button>
                                   
                                    <p class='message-alert-none'> $Add</p>
                                </div>";
			
			//when get Added-Error from url
		}else if(isset($_GET['m']) AND $_GET['m'] == "Added-Error"){
			echo "<div class='alert alert-danger alert-mg-b alert-success-style4 alert-success-stylenone'>
                                    <button type='button' class='close sucess-op' data-dismiss='alert' aria-label='Close'>
                                        <span class='icon-sc-cl' aria-hidden='true'>×</span>
                                    </button>
                                   
                                    <p class='message-alert-none'> $add_error</p>
                                </div>";
			
			//when get Delete-Error from url
		}else if(isset($_GET['m']) AND $_GET['m'] == "Delete-Error"){
			echo "<div class='alert alert-danger alert-mg-b alert-success-style4 alert-success-stylenone'>
                                    <button type='button' class='close sucess-op' data-dismiss='alert' aria-label='Close'>
                                        <span class='icon-sc-cl' aria-hidden='true'>×</span>
                                    </button>
                                   
                                    <p class='message-alert-none'> $delete_error</p>
                                </div>";
			
			//when get Delete-Successfully from url
		}else if(isset($_GET['m']) AND $_GET['m'] == "Delete-Successfully"){
			
			echo "<div class='alert alert-success alert-success-style1'>
                                    <button type='button' class='close sucess-op' data-dismiss='alert' aria-label='Close'>
                                        <span class='icon-sc-cl' aria-hidden='true'>×</span>
                                    </button>
                                   
                                    <p class='message-alert-none'> $delete</p>
                                </div>";
			
			//when get Update-Error from url
		}else if(isset($_GET['m']) AND $_GET['m'] == "Update-Error"){
			echo "<div class='alert alert-danger alert-mg-b alert-success-style4 alert-success-stylenone'>
                                    <button type='button' class='close sucess-op' data-dismiss='alert' aria-label='Close'>
                                        <span class='icon-sc-cl' aria-hidden='true'>×</span>
                                    </button>
                                   
                                    <p class='message-alert-none'> $update_error</p>
                                </div>";
			
			//when get Update-Successfully from url
		}else if(isset($_GET['m']) AND $_GET['m'] == "Update-Successfully"){
			
			echo "<div class='alert alert-success alert-success-style1'>
                                    <button type='button' class='close sucess-op' data-dismiss='alert' aria-label='Close'>
                                        <span class='icon-sc-cl' aria-hidden='true'>×</span>
                                    </button>
                                   
                                    <p class='message-alert-none'> $update</p>
                                </div>";
			
		}
		
		
		
		
	} // Find function close
	
} // Errors class close



?>