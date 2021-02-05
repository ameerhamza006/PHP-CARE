<?php require_once "header.php"; 

$drop = $crud->View('*','users'," where roller='Doctor' ",' ORDER BY id DESC ');

if(isset($_GET['List'])){
	


?>

<?php  $error->Find(' Doctor Links Added Successfully','Doctor Links Not added Something wrong','Doctor Links Delete Successfully','Doctor Links Not deleted Something wrong ','Doctor Links Update Successfully',' Doctor Links Not Updated somthing wrong'); ?>
<!-- Static Table Start -->
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
				
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1>Doctors Social Links Lists <span class="table-project-n"></span> </h1>
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
                                                    <th data-field="name" data-editable="true">Doctor</th>
                                                    <th data-field="email" data-editable="true">Facebook</th>
                                                    <th data-field="phone" data-editable="true">Twitter</th>
                                                    <th data-field="company" data-editable="true">Linkedin</th>
                                                    <th data-field="task" data-editable="true">Instagram</th>
													<th data-field="address" data-editable="true">Company</th>
                                                    <th data-field="action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
												<?php $fun->Links_list(); $fun->Links_Delete(); ?>
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



<?php } else if(isset($_GET['Edit'])){ 

	$get_id = $_GET['Edit'];
	
	$data = $crud->Update_get_by_id('*','links'," where id='$get_id' ");	
	
	$id = $data['user_id'];
	
	$select = $crud->Update_get_by_id('*','users'," where id='$id' ");

?>

<?php $fun->Links_Update(); $error->Find(' Doctor Links Added Successfully','Doctor Links Not added Something wrong','Doctor Links Delete Successfully','Doctor Links Not deleted Something wrong ','Doctor Links Update Successfully',' Doctor Links Not Updated somthing wrong'); ?>
<div class="advanced-form-area mg-b-15">

<div class="password-meter-area mg-b-40">
                <div class="container-fluid">

<div class="col-lg-6">
                            <div class="sparkline12-list shadow-reset mg-t-30">
                                <div class="sparkline10-hd">
                                    <div class="main-sparkline10-hd">
                                        <h1>Update <span class="password-mt-none">Doctors</span> Social Links</h1>
                                        <div class="sparkline10-outline-icon">
                                            <span class="sparkline10-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline10-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline10-graph">
									<form method="post">
                                    <div id="pwd-container3">
										 <div class="chosen-select-single mg-b-20">
                                                    <label></label>
                                                    <select name="doctor" class="select2_demo_3 form-control">
														<option selected value="<?php echo $select['id']; ?>" ><?php echo $select['firstname']." ".$select['lastname']; ?></option>
														<?php foreach($drop as $down){ ?>
														<option value="<?php echo $down['id']; ?>"><?php echo $down['firstname']." ".$down['lastname']; ?></option>
														
														<?php } ?>
											 </select>
														</div>
                                        <div class="form-group">
                                            <label for="username">Facebook</label>
                                            <input type="text" class="form-control" value="<?php echo $data['facebook']; ?>" name="fb" id="username" placeholder="Username">
                                        </div>
										<div class="form-group">
                                            <label for="username">Twitter</label>
                                            <input type="text" class="form-control" value="<?php echo $data['twitter']; ?>" name="tw" id="username" placeholder="Username">
                                        </div>
										<div class="form-group">
                                            <label for="username">Linkedin</label>
                                            <input type="text" class="form-control" value="<?php echo $data['linkedin']; ?>" name="lk" id="username" placeholder="Username">
                                        </div>
										<div class="form-group">
                                            <label for="username">Instagram</label>
                                            <input type="text" class="form-control" value="<?php echo $data['instagram']; ?>" name="insta" id="username" placeholder="Username">
                                        </div>
										<div class="form-group">
                                            <label for="username">Company</label>
                                            <input type="text" class="form-control" value="<?php echo $data['company']; ?>" name="com" id="username" placeholder="">
                                        </div>
                                       
                                        <div class="form-group">
                                            <button type="submit" name="linkupdate" class="btn btn-primary">Update Links</button>
                                        </div>
										
                                    </div>
										</form>
                                </div>
                            </div>
                        </div>

	</div>
	</div>



<?php }else{ ?>

<?php $fun->Links_Add(); $error->Find(' Doctor Links Added Successfully','Doctor Links Not added Something wrong','Doctor Links Delete Successfully','Doctor Links Not deleted Something wrong ','Doctor Links Update Successfully',' Doctor Links Not Updated somthing wrong'); ?>
<div class="advanced-form-area mg-b-15">

<div class="password-meter-area mg-b-40">
                <div class="container-fluid">

<div class="col-lg-6">
                            <div class="sparkline12-list shadow-reset mg-t-30">
                                <div class="sparkline10-hd">
                                    <div class="main-sparkline10-hd">
                                        <h1>Add <span class="password-mt-none">Doctors</span> Social Links</h1>
                                        <div class="sparkline10-outline-icon">
                                            <span class="sparkline10-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline10-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline10-graph">
									<form method="post">
                                    <div id="pwd-container3">
										 <div class="chosen-select-single mg-b-20">
                                                    <label></label>
                                                    <select name="doctor" class="select2_demo_3 form-control">
														<option selected disabled>Select Doctor</option>
														<?php foreach($drop as $down){ ?>
														<option value="<?php echo $down['id']; ?>"><?php echo $down['firstname']." ".$down['lastname']; ?></option>
														
														<?php } ?>
											 </select>
														</div>
                                        <div class="form-group">
                                            <label for="username">Facebook</label>
                                            <input type="text" class="form-control" name="fb" id="username" placeholder="Username">
                                        </div>
										<div class="form-group">
                                            <label for="username">Twitter</label>
                                            <input type="text" class="form-control" name="tw" id="username" placeholder="Username">
                                        </div>
										<div class="form-group">
                                            <label for="username">Linkedin</label>
                                            <input type="text" class="form-control" name="lk" id="username" placeholder="Username">
                                        </div>
										<div class="form-group">
                                            <label for="username">Instagram</label>
                                            <input type="text" class="form-control" name="insta" id="username" placeholder="Username">
                                        </div>
										<div class="form-group">
                                            <label for="username">Company</label>
                                            <input type="text" class="form-control" name="com" id="username" placeholder="">
                                        </div>
                                       
                                        <div class="form-group">
                                            <button type="submit" name="linkadd" class="btn btn-primary">Add Links</button>
                                        </div>
										
                                    </div>
										</form>
                                </div>
                            </div>
                        </div>

	</div>
	</div>
					
<?php } require_once "footer.php"; ?>