<?php require_once "header.php"; 


$dropsp = $crud->View('*',' specialities ','','');

$drop = $crud->View('*',' city ','','');



if(isset($_GET['List'])){
?>

                         
 <!-- Static Table Start -->
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
					<?php $error->Find('Doctor Added Successfully','Docter Not added Something wrong','Doctor Delete Successfully','Doctor Not deleted Something wrong ','Doctor Update Successfully',' Doctor Not Updated somthing wrong');  ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1>Docters Lists <span class="table-project-n"></span> </h1>
                                        <div class="sparkline13-outline-icon">
                                            <span class="sparkline13-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline13-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                        <div id="toolbar">
                                            <select class="form-control">
                                                <option value="">Export Basic</option>
                                                <option value="all">Export All</option>
                                                <option value="selected">Export Selected</option>
                                            </select>
                                        </div>
                                        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                    <th data-field="state" data-checkbox="true"></th>
                                                    <th data-field="id">ID</th>
                                                    <th data-field="name" data-editable="true">Full Name</th>
                                                    <th data-field="email" data-editable="true">Email</th>
                                                    <th data-field="phone" data-editable="true">Phone</th>
                                                    <th data-field="company" data-editable="true">City</th>
                                                    <th  >State</th>
                                                    <th data-field="task" data-editable="true">Zip</th>
													<th data-field="address" data-editable="true">Address</th>
													<th data-field="specialist" data-editable="true">Specialist</th>
													 <th data-field="price" data-editable="true">Experience</th>
                                                    <!--<th data-field="complete">Completed</th>
                                                    <th data-field="task" data-editable="true">Task</th>-->
                                                    <th data-field="date" data-editable="true">Register Date</th>
                                                    <th data-field="modify_date" data-editable="true">Modify Date</th>
                                                    <th data-field="image" >Image</th>
                                                   
                                                    <th data-field="action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
												<?php $fun->Doctor_list(); $fun->Doctor_Delete();?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Static Table End -->





<?php }else if(isset($_GET['Edit'])){  

	$get_id = $_GET['Edit'];
	
	$data = $crud->Update_get_by_id('*','users'," where id='$get_id'");

	$fun->Update_doctor();

?>



<div class="basic-form-area mg-b-15">
	
                <div class="container-fluid">
					<?php $error->Find('Doctor Added Successfully','Docter Not added Something wrong','Doctor Delete Successfully','Doctor Not deleted Something wrong ','Doctor Update Successfully',' Doctor Not Updated somthing wrong');  ?>
					
                    <div class="row">

 <div class="col-lg-12">
                            <div class="sparkline8-list basic-res-b-30 shadow-reset">
                                <div class="sparkline8-hd">
                                    <div class="main-sparkline8-hd">
                                        <h1>Update Doctor</h1>
                                        <div class="sparkline8-outline-icon">
                                            <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline8-graph">
                                    <div class="basic-login-form-ad">
                                       
                                        <div class="row">
											<form method="post" enctype="multipart/form-data">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="basic-login-inner">
                                                   
                                                    
                                                        <div class="form-group-inner">
                                                            <label>First Name</label>
                                                            <input type="text" name="fname" value="<?php echo $data['firstname']; ?>" class="form-control" placeholder="Firt Name" />
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <label>Email</label>
                                                            <input type="text" value="<?php echo $data['email']; ?>" name="email" class="form-control" placeholder="Email" />
                                                        </div>
														<div class="form-group-inner">
                                                            <label>Address</label>
                                                            <input type="text" name="address" value="<?php echo $data['address']; ?>" class="form-control" placeholder="Address" />
                                                        </div>
													<div class="form-group-inner">
                                                            <label>State</label>
                                                            <input type="text" name="state" value="<?php echo $data['state']; ?>" class="form-control" placeholder="State" />
                                                        </div>
													
													<div class="chosen-select-single mg-b-20">
                                                    <label>City</label>
                                                    <select name="sp" class="select2_demo_3 form-control">
                                                         <option alue="<?php echo $data['specialistname']; ?>" selected><?php echo $data['specialistname']; ?></option>
														<?php foreach($dropsp as $downsp){ ?>
														<option value="<?php echo $downsp['specialitie_name']; ?>"><?php echo $downsp['specialitie_name']; } ?></option>
  
                                                    </select>
                                                </div>
														<div class="form-group-inner">
                                                            <label>Bio</label>
															<textarea class="form-control" name="bio"><?php echo $data['bio']; ?></textarea>
                                                            
                                                        </div>
												</div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
												<div class="basic-login-inner">
                                                <div class="form-group-inner">
                                                            <label>Last Name</label>
                                                            <input type="text" name="lname" value="<?php echo $data['lastname']; ?>" class="form-control" placeholder="Last Name" />
                                                        </div>
												<div class="form-group-inner">
                                                            <label>Phone</label>
                                                            <input type="text" name="phone" value="<?php echo $data['phone']; ?>" class="form-control" placeholder="Phone" />
                                                        </div>
													 <div class="chosen-select-single mg-b-20">
                                                    <label>City</label>
                                                    <select name="city" class="select2_demo_3 form-control">
                                                         <option value="<?php echo $data['cityname']; ?>"  selected><?php echo $data['cityname']; ?></option>
											
														<?php foreach($drop as $down){ ?>
														<option value="<?php echo $down['city']; ?>"><?php echo $down['city']; } ?></option>
  
                                                    </select>
                                                </div>
													
													<div class="form-group-inner">
                                                            <label>Zip</label>
                                                            <input type="text" name="zip" value="<?php echo $data['zip']; ?>" class="form-control" placeholder="Zip code" />
                                                        </div>
													<div class="form-group-inner">
                                                            <label>Experience</label>
                                                            <input type="text" name="exp" value="<?php echo $data['experience']; ?>" class="form-control" placeholder="Experience" />
                                                        </div>
													<div class="form-group-inner">
                                                            <label>Password</label>
                                                            <input type="text" name="pass" value="<?php echo $data['password']; ?>" class="form-control" placeholder="Password" />
														
                                                        </div>
													
                                                        </div>
												
												
                                                </div>
												 <div class="row">
                                                                <div class="form-group-inner">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="file-upload-inner ts-forms">
                                                                        <div class="input prepend-big-btn">
                                                                            <label class="icon-right" for="prepend-big-btn">
                                                                                <i class="fa fa-download"></i>
                                                                            </label>
                                                                            <div class="file-button">
                                                                                Browse
                                                                                <input type="file"  name="pic" onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                                                            </div>
                                                                            <input type="text" name="pic" readonly id="prepend-big-btn" placeholder="no file selected">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
											<label></label>
											<label></label>
											<div class="login-btn-inner">
												 <div class="col-lg-1  col-md-4 col-sm-2 col-xs-4 ">
                                                            <div class="form-group-inner">
                                                                <button class="btn btn-lg btn-primary  login-submit-cs" type="submit" name="updatedoctor">Update Doctor</button>
                                                                
                                                            </div>
                                                            </div>
                                                        </div>
												   </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                      





<?php }else {  $fun->Add_doctor(); 

			 


?>

<div class="basic-form-area mg-b-15">
	
                <div class="container-fluid">
					<?php $error->Find('Doctor Added Successfully','Docter Not added Something wrong','Doctor Delete Successfully','Doctor Not deleted Something wrong ','Doctor Update Successfully',' Doctor Not Updated somthing wrong');  ?>
					
                    <div class="row">

 <div class="col-lg-12">
                            <div class="sparkline8-list basic-res-b-30 shadow-reset">
                                <div class="sparkline8-hd">
                                    <div class="main-sparkline8-hd">
                                        <h1>Add Doctor</h1>
                                        <div class="sparkline8-outline-icon">
                                            <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline8-graph">
                                    <div class="basic-login-form-ad">
                                       
                                        <div class="row">
											<form method="post" enctype="multipart/form-data">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="basic-login-inner">
                                                   
                                                    
                                                        <div class="form-group-inner">
                                                            <label>First Name</label>
                                                            <input type="text" name="fname" required class="form-control" placeholder="Firt Name" />
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <label>Email</label>
                                                            <input type="text" name="email" class="form-control" placeholder="Email" />
                                                        </div>
														<div class="form-group-inner">
                                                            <label>Address</label>
                                                            <input type="text" name="address" class="form-control" placeholder="Address" />
                                                        </div>
													<div class="form-group-inner">
                                                            <label>State</label>
                                                            <input type="text" name="state" class="form-control" placeholder="State" />
                                                        </div>
													
													 <div class="chosen-select-single mg-b-20">
                                                    <label>Specialities In</label>
                                                    <select name="sp" class="select2_demo_3 form-control">
                                                         <option value="Select The Specialities" disabled selected>Select The Specialities</option>
														<?php foreach($dropsp as $downsp){ ?>
														<option value="<?php echo $downsp['specialitie_name']; ?>"><?php echo $downsp['specialitie_name']; } ?></option>
  
                                                    </select>
                                                </div>
														<div class="form-group-inner">
                                                            <label>Bio</label>
															<textarea name="bio" class="form-control" placeholder="Bio"></textarea>
                                                            
                                                        </div>
												</div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
												<div class="basic-login-inner">
                                                <div class="form-group-inner">
                                                            <label>Last Name</label>
                                                            <input type="text" name="lname" required class="form-control" placeholder="Last Name" />
                                                        </div>
												<div class="form-group-inner">
                                                            <label>Phone</label>
                                                            <input type="text" name="phone" class="form-control" placeholder="Phone" />
                                                        </div>
													 <div class="chosen-select-single mg-b-20">
                                                    <label>City</label>
                                                    <select name="city" class="select2_demo_3 form-control">
                                                         <option value="" disabled selected>Select The City</option>
														<?php foreach($drop as $down){ ?>
														<option value="<?php echo $down['city']; ?>"><?php echo $down['city']; } ?></option>
  
                                                    </select>
                                                </div>
													
													<div class="form-group-inner">
                                                            <label>Zip</label>
                                                            <input type="text" name="zip" class="form-control" placeholder="Zip code" />
                                                        </div>
													<div class="form-group-inner">
                                                            <label>Experience</label>
                                                            <input type="text" name="exp" class="form-control" placeholder="Experience" />
                                                        </div>
													<div class="form-group-inner">
                                                            <label>Password</label>
                                                            <input type="text" name="pass" class="form-control" placeholder="Password" />
                                                        </div>
													
                                                        </div>
												
                                                </div>
											 <div class="row">
                                                                <div class="form-group-inner">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="file-upload-inner ts-forms">
                                                                        <div class="input prepend-big-btn">
                                                                            <label class="icon-right" for="prepend-big-btn">
                                                                                <i class="fa fa-download"></i>
                                                                            </label>
                                                                            <div class="file-button">
                                                                                Browse
                                                                                <input type="file" name="pic" onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                                                            </div>
                                                                            <input type="text" name="pic" readonly id="prepend-big-btn" placeholder="no file selected">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
											<label></label>
											<div class="login-btn-inner">
												 <div class="col-lg-1  col-md-4 col-sm-2 col-xs-4 ">
                                                            <div class="form-group-inner">
                                                                <button class="btn btn-lg btn-primary  login-submit-cs" type="submit" name="doctorbtn">Add Doctor</button>
                                                                
                                                            </div>
                                                            </div>
                                                        </div>
												   </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                      









<?php }
	require_once "footer.php"; ?>