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
			 $values = "";
			
			//if pic not select
			if($_FILES['pic']['name'] == '')
			{
				
				 $values .= "'".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["address"]."',Null,'".$_POST["city"]."','".$_POST["state"]."','".$_POST["zip"]."','".$_POST["sp"]."','".$_POST["exp"]."','".$_POST["bio"]."','".$_POST["pass"]."','Doctor',NOW(),Null";
				
			//if pic selected
			}else {
			
			
		
		 $values .= "'".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["address"]."','".$_FILES["pic"]["name"]."','".$_POST["city"]."','".$_POST["state"]."','".$_POST["zip"]."','".$_POST["sp"]."','".$_POST["exp"]."','".$_POST["bio"]."','".$_POST["pass"]."','Doctor',NOW(),Null";
			
			}
			
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
			
			$values = "";
			
			
			
			//if pic not select 
			if($_FILES['pic']['name'] == '')
			{
				
			//for update in table
		 $values .= "firstname='".$_POST["fname"]."',lastname='".$_POST["lname"]."',email='".$_POST["email"]."',phone='".$_POST["phone"]."',address='".$_POST["address"]."',cityname='".$_POST["city"]."',state='".$_POST["state"]."',zip='".$_POST["zip"]."',specialistname='".$_POST["sp"]."',experience='	".$_POST["exp"]."',bio='".$_POST["bio"]."',password='".$_POST["pass"]."',modify_date=NOW()";
				
			// if pic selected	
			}else {
				
				 $values .= "firstname='".$_POST["fname"]."',lastname='".$_POST["lname"]."',email='".$_POST["email"]."',phone='".$_POST["phone"]."',address='".$_POST["address"]."',image='".$_FILES["pic"]['name']."',cityname='".$_POST["city"]."',state='".$_POST["state"]."',zip='".$_POST["zip"]."',specialistname='".$_POST["sp"]."',experience='	".$_POST["exp"]."',bio='".$_POST["bio"]."',password='".$_POST["pass"]."',modify_date=NOW()";
				
				
				
			}
			
			
			
			
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
			
				
		   
				 //get image name
			$img = $_FILES['pic']['name'];
			//get old path from pc
			$old_location = $_FILES['pic']['tmp_name'];
			// create new path for moveing image in folder
			$new_location = $path.$img;
			
			//move image into folder
			move_uploaded_file($old_location,$new_location);
			
		     // for update doctor into table
			$this->Update('users',$values," where id='$get_id' ",'Add-doctor?List&m');
			
		} //ifsset close
		
	} // Doctor-update Function close
	
	
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
			<td>".$value['modify_date']."</td>
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
	
	
	
	
  //------------Specialities CRUD Start---------//
	
	
	
	function Add_Specialities(){
		
		if(isset($_POST['spadd'])){
			
			$values = "'".$_POST['sp']."'";
			
			$this->Add('specialities',$values,'Specialities?m');
			
			
			
			
		}
	}
	
	
	// View Specialities
	function Specialities_list(){
		
		//fetch all Specialities from table
		$data = $this->View('*','Specialities','','ORDER BY id DESC');
		
		//if Specialities 
		if($data){
			
		// for serial number	
		$sno=1;
			
		//view all Specialities from table
		foreach($data as $value){
			
			echo "  <tr>
                                                    <td>".$sno++."</td>
                                                    <td>".$value['specialitie_name']."</td>
                                                    <td><a href='Specialities?Edit=".$value['id']."' class='btn btn-custon-two btn-primary btn-sm' >Edit</a></td>
                                                    <td><a href='Specialities?Delete=".$value['id']."' class='btn btn-custon-two btn-danger btn-sm' >Delete</a></td>
                                                </tr>";
		} // foreach close
		} // if close
	} // city_list close
	
	
	
	// Delete Specialities
	function Specialities_Delete(){
		
		//when get id from url
		if(isset($_GET['Delete'])){
			
			// get id move to variable
			$get_id = $_GET['Delete'];
			
			//delete Specialities from table
			$this->Delete('specialities',$get_id,'Specialities?m');
		} // ifisset close
	} // Specialities_Delete close
	
	// Update Specialities
	function Specialities_Update(){
		
		//when click on button
		if(isset($_POST['updatesp'])){
			
				// get id move to variable
			$get_id = $_GET['Edit'];
			
			//values for Specialities table
			$values = "specialitie_name='".$_POST['sp']."'";
			
		  // update Specialities from table
		  $this->Update('specialities',$values,"where id='$get_id'",'Specialities?m');
		} // ifisset close
	} // Specialities_update close
	
	
	
	
  //------------Specialities CRUD End---------//
	
	
	
	
//------------spasific Doctor View in website with his Specialisty Start for Doctors page ---------//	
	
	
	
	function View_Doctors_Specialities(){
		
		if(isset($_GET['Specialist'])){
		
		$get_Specialisty_name = $_GET['Specialist'];
		
		$dataa = $this->View('users.firstname,users.lastname,users.email,users.phone,users.cityname,users.address,users.image,users.specialistname,links.facebook,links.twitter,links.instagram,links.linkedin,links.company','users'," LEFT JOIN links ON users.id = links.user_id where users.specialistname = '$get_Specialisty_name' ",' ORDER BY users.id DESC '); 
	
		if($dataa){
		
		foreach($dataa as $specialist){
			
			
			echo  "<div class='col-xl-3 col-lg-4 col-md-6 mb-4'>
            <div class='team'>
              <div class='team-image'>
                <img class='img-fluid b-radius-bottom-none' src='Doctor/".$specialist['firstname']." ".$specialist['lastname']."/".$specialist['image']."' alt='' style='height: 280px;' >
                <div class='team-social'>
                  <ul>
                    <li><a href='https://web.facebook.com/".$specialist['facebook']."/'><i class='fab fa-facebook-f'></i></a></li>
                    <li><a href='https://twitter.com/".$specialist['twitter']."/'><i class='fab fa-twitter'></i></a></li>
                    <li><a href='https://www.linkedin.com/in/".$specialist['linkedin']."/'><i class='fab fa-linkedin-in'></i></a></li>
                    <li><a href='https://www.instagram.com/".$specialist['instagram']."/'><i class='fab fa-instagram'></i></a></li>
                  </ul>
                </div>
              </div>
              <div class='team-detail b-radius-top-none'>
                <span class='team-label'>".$specialist['specialistname']."</span>
                <h4 class='team-title'><a href='team-single.html'>Dr.".$specialist['firstname']." ".$specialist['lastname']."</a></h4>
                <span class='team-phone'>".$specialist['phone']."</span>
                <span class='team-email'>".$specialist['email']."</span>
              </div>
              <a class='icon-btn' href='Doctors?Profile=".$specialist['firstname']."'><i class='fas fa-plus'></i></a>
            </div>
          </div>";
			
		}
		}
		}
		
		
	} //fun close
	
	
	
	function Appointment(){
		
		
		$get_name =  $_GET['Profile'];
		
		if(isset($_POST['addopp'])){
		
		 $values = "'".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["address"]."','".$_POST["city"]."','".$_POST["state"]."','".$_POST["zip"]."','".$_POST["apdate"]."','".$_POST["aptime"]."','".$_POST["doctor_id"]."','".$_POST["user_id"]."',NOW()";
		
		
			
		$this->Add('appointment',$values,"Doctors?Profile=$get_name&m");
		}
		
	}
	
	public $fv = '';
	public $lv = '';
	public $ev = '';
	public $pv = '';
	public $adv = '';
	public $cv = '';
	public $sv = '';
	public $zv = '';
	public $pasv = '';

	
	function Register(){
		
		
		
		if(isset($_POST['adduser'])){
			
			
			$firstname = mysqli_real_escape_string($this->connect,$_POST['fname']);
			$lastname = mysqli_real_escape_string($this->connect,$_POST['lname']);
			$email = mysqli_real_escape_string($this->connect,$_POST['email']);
			$phone = mysqli_real_escape_string($this->connect,$_POST['phone']);
			$address = mysqli_real_escape_string($this->connect,$_POST['address']);
			$city = mysqli_real_escape_string($this->connect,$_POST['city']);
			$state = mysqli_real_escape_string($this->connect,$_POST['state']);
			$zip = mysqli_real_escape_string($this->connect,$_POST['zip']);
			$pass = mysqli_real_escape_string($this->connect,$_POST['pass']);
			
			
			
			//for required fileds
			if(empty($firstname)){
			    $this->fv = "First Name Is required";
			}else if(empty($lastname)){
				$this->lv = "Last Name Is required";
			}else if(empty($email)){
				$this->ev = "Email Is Required";
			}else if(empty($phone)){
				$this->pv = "Phone Is Reduired";
			}else if(empty($address)){
				$this->adv = "Address Is Required";
			}else if(empty($city)){
				$this->cv = "City Is Required";
			}else if(empty($state)){
				$this->sv = "State Is Required";
			}else if(empty($zip)){
				$this->zv = "Zip Is Required";
			}else if(empty($pass)){
				$this->pasv = "Password Is Required";
			}else 
			
			// for number fields only Numaric value allow	
			if(!preg_match("/^[0-9]*$/",$phone)){
				$this->pv .= "Enter the Valid Phone Number";
				
			// for Email fields only email format value allow		
			}else if(filter_var($email,FILTER_VALIDATE_EMAIL)){
				$this->ev .= "Enter Valid Email Format";
			}
			else{
			
			$values = "'$firstname','$lastname','$email','$phone','$address','Null','$city','$state','$zip','Null','Null','Null','$pass','User',NOW(),Null";
			
			
			$this->Add('users',$values,'Sign-Up?m');
			}
				
		} // ifisset close
		
		
	} // function close
	
	
	
	function login(){
		
		if(isset($_POST['login'])){
			error_reporting(0);
			session_start();

			$email = mysqli_real_escape_string($this->connect,$_POST['email']);
			$pass = mysqli_real_escape_string($this->connect,$_POST['pass']);
			
			
			if(empty($email)){
				$this->ev = "Email Is Required";
			}else if(empty($pass)){
				$this->pv = "Password Is Required";
			}
			
			else{
			
			
			$pemail = $this->Update_get_by_id('*','users'," where email='$email' ");
			
            if($pemail == ''){
				echo "<script>location.href='Sign-In?m=Incorect-Email';</script>";
			}

			$ppassword = $this->Update_get_by_id('*','users'," where  password='$pass' ");
			
				if($ppassword == ''){
					echo "<script>location.href='Sign-In?m=Incorect-Password';</script>";
				}
				
				if($pemail != "" AND $ppassword != ""){

				

				$roler = $ppassword['roller'];
			
			if($roler == "Admin"){
				$_SESSION['EmailDoctor'] = $email; 
				echo "<script>location.href='Panel/';</script>";
			}else if($roler == "Doctor"){
				$_SESSION['EmailDoctor'] = $email;
				echo "<script>location.href='Panel/';</script>";
				
			}else if($roler == "User"){
				$_SESSION['EmailUser'] = $email;
				echo "<script>location.href='".$previons = "javascript:history.go(-2)"."';</script>";
			}
		}
			}
			
			
		}
	} // login function close
	
	
	function Logout($link){

       if(isset($_POST['logout'])){

             session_start();

			 session_destroy();

			 echo "<script>location.href='$link';</script>";

	   }

	}


	function News($limit){
		
		$n = $this->View('users.firstname,users.lastname,blog.id,blog.title,blog.bio,blog.image,blog.date',' users ',' INNER JOIN blog ON users.id = blog.user_id '," ORDER BY blog.id DESC $limit ");
		
		
			
			foreach($n as $value){
				
				$date = substr($value['date'],0,10);
				$bio = substr($value['bio'],0,97);
				$title_r = substr($value['title'],0,30);

				$title = str_replace(" ","-",$value['title']);
				
			echo	"<div class='col-lg-4 col-md-6'>
            <div class='blog-post blog-post-01'>
              <div class='blog-post-image mb-4'>
                <img class='img-fluid'9 src='News/".$value['image']."' alt='' style='height: 270px; width: 100%;' >
              </div>
              <div class='blog-post-content py-0'>
                <div class='blog-post-details'>
                  <h6 class='blog-post-title'><a href='Latest-News?News=$title'>$title_r..</a></h6>
                  <div class='blog-post-meta'>
                    <div class='blog-post-author'>
                      <span> By <a href='#'>&nbsp;<b>".$value['firstname']." ".$value['lastname']."</b></a></span>
                    </div>
                    <div class='blog-post-time'>
                      <a href='#'><i class='far fa-clock text-primary'></i>$date</a>
                    </div>
                  </div>
                  <div class='blog-post-description'>
                    <p>$bio..</p>
                    <a href='Latest-News?News=$title' class='btn btn-link mb-2'>Read More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>";
				
			}
			
		
		
	} //news function close
	
	
	function Feedback(){
		
		if(isset($_POST['addfeed'])){
			
			$get_name = $_GET['Profile'];
			
			
			
			$feedback = mysqli_real_escape_string($this->connect,$_POST['feedback']);
			$doctor_id = mysqli_real_escape_string($this->connect,$_POST['doctor_id']);
			$user_id = mysqli_real_escape_string($this->connect,$_POST['user_id']);
			
			if(empty($feedback)){
				
				echo "Feedback is Required";
			}else{
			
			$values = "'$feedback','$doctor_id','$user_id',Now()";
			
			$this->Add('doctor_feedback',$values,"Doctors?Profile=$get_name&f");
				
			}
			
		}
		
	} //feedback close
	
	
	function Feedback_View(){
		
		$get_name = $_GET['Profile'];
		
		$get_id = $this->Update_get_by_id('*','users'," where firstname='$get_name' ");
		
		$data = $this->View(' users.firstname,users.lastname,doctor_feedback.feedback ',' users '," INNER JOIN doctor_feedback ON users.id = doctor_feedback.user_id where doctor_feedback.doctor_id='".$get_id['id']."' "," ORDER BY doctor_feedback.id DESC ");
		
		if($data){
		
		foreach($data as $feed){
			
		
		
		
		echo "<div class='item'>
                <div class='testimonial-item'>
                  <!---<div class='testimonial-avatar'>
                    <img class='img-fluid rounded-circle' src='images/avatar/09.jpg' alt=''>
                  </div> -->
                  <div class='testimonial-content'>
				  ".$feed['feedback']."
                  </div>
                  <div class='testimonial-author'>
                    <div class='testimonial-name'>
                      <div class='testimonial-quote'>
                        <i class='flaticon-left-quote'></i>
                      </div>
                      <h6 class='mb-1'>".$feed['firstname']." ".$feed['lastname']."</h6>
                      <span>- Peteint.</span>
                    </div>
                  </div>
                </div>
              </div>";
		}
		}else{
			
			echo "<div class='item'>
                <div class='testimonial-item'>
                  
                  <div class='testimonial-content text-center'>
				  No Feedback About This Doctor!
                  </div>
                 
                </div>
              </div>";
			
		}
		
	}
	
	
	
//------------spasific Doctor View in website with his Specialisty End  Doctors page ---------//
	
	
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
	
	
	
	
	
	function Front_Find($Add,$add_error,$delete,$delete_error,$update,$update_error){
		
		//when get Added-Successfully from url
		if(isset($_GET['m']) AND $_GET['m'] == "Added-Successfully"){
			
			echo "<blockquote class='blockquote bg-light mb-5'>
                      <div class='blockquote-content'>
                        <div class='blockquote-quote'></div>
                        <div class='blockquote-author'>
                          <div class='blockquote-name'>
                            <h6 class='text-center' style='color: #006838 !important;'> $Add </h6>
                         
                          </div>
                        </div>
                      </div>
                    </blockquote>";
			
			//when get Added-Error from url
		}else if(isset($_GET['m']) AND $_GET['m'] == "Added-Error"){
			
		echo "<blockquote class='blockquote bg-light mb-5'>
                      <div class='blockquote-content'>
                        <div class='blockquote-quote'></div>
                        <div class='blockquote-author'>
                          <div class='blockquote-name'>
                            <h6 class='text-center' style='color: #e00940 !important;'> $add_error </h6>
                         
                          </div>
                        </div>
                      </div>
                    </blockquote>";
				
			//when get Delete-Error from url
		}else if(isset($_GET['m']) AND $_GET['m'] == "Delete-Error"){
			
			echo "<blockquote class='blockquote bg-light mb-5'>
                      <div class='blockquote-content'>
                        <div class='blockquote-quote'></div>
                        <div class='blockquote-author'>
                          <div class='blockquote-name'>
                            <h6 class='text-center' style='color: #e00940 !important;'> $delete_error </h6>
                         
                          </div>
                        </div>
                      </div>
                    </blockquote>";
			
			
			//when get Delete-Successfully from url
		}else if(isset($_GET['m']) AND $_GET['m'] == "Delete-Successfully"){
			
			echo "<blockquote class='blockquote bg-light mb-5'>
                      <div class='blockquote-content'>
                        <div class='blockquote-quote'></div>
                        <div class='blockquote-author'>
                          <div class='blockquote-name'>
                            <h6 class='text-center' style='color: #006838 !important;'> $delete </h6>
                         
                          </div>
                        </div>
                      </div>
                    </blockquote>";
			
			
			//when get Update-Error from url
		}else if(isset($_GET['m']) AND $_GET['m'] == "Update-Error"){
			
			echo "<blockquote class='blockquote bg-light mb-5'>
                      <div class='blockquote-content'>
                        <div class='blockquote-quote'></div>
                        <div class='blockquote-author'>
                          <div class='blockquote-name'>
                            <h6 class='text-center' style='color: #e00940 !important;'> $update_error </h6>
                         
                          </div>
                        </div>
                      </div>
                    </blockquote>";
			
			
			//when get Update-Successfully from url
		}else if(isset($_GET['m']) AND $_GET['m'] == "Update-Successfully"){
			
			echo "<blockquote class='blockquote bg-light mb-5'>
                      <div class='blockquote-content'>
                        <div class='blockquote-quote'></div>
                        <div class='blockquote-author'>
                          <div class='blockquote-name'>
                            <h6 class='text-center' style='color: #006838 !important;'> $update </h6>
                         
                          </div>
                        </div>
                      </div>
                    </blockquote>";
			
		}
		
		
		
		
	} // Find function close
	
	
	function feed($Add,$Add_error,$Update,$Update_error,$Delete,$Delete_error){
		
		if(isset($_GET['f']) AND $_GET['f'] == "Added-Successfully"){
			
			echo "<blockquote class='blockquote bg-light mb-5'>
                      <div class='blockquote-content'>
                        <div class='blockquote-quote'></div>
                        <div class='blockquote-author'>
                          <div class='blockquote-name'>
                            <h6 class='text-center' style='color: #006838 !important;'> $Add </h6>
                         
                          </div>
                        </div>
                      </div>
                    </blockquote>";
			
		}else if(isset($_GET['f']) AND $_GET['f'] == "Added-Error"){
			
			echo "<blockquote class='blockquote bg-light mb-5'>
                      <div class='blockquote-content'>
                        <div class='blockquote-quote'></div>
                        <div class='blockquote-author'>
                          <div class='blockquote-name'>
                            <h6 class='text-center' style='color: #e00940 !important;'> $Add_error </h6>
                         
                          </div>
                        </div>
                      </div>
                    </blockquote>";
			
			
			//when get Update-Successfully from url
		}
		
	}
	
	
} // Errors class close



?>