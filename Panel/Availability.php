<?php require_once "header.php"; 
$drop = $crud->View('*','users'," where roller='Doctor' ",' ORDER BY id DESC ');

if(isset($_GET['List'])){
	



?>


 <!-- Static Table Start -->
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
					<?php $fun->Avi_Delete(); $error->Find('Your Availability Added Successfully','Your Availability Not added Something wrong','Your Availability Delete Successfully','Your Availability Not deleted Something wrong ','Your Availability Update Successfully',' Your Availability Not Updated somthing wrong');  ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1>Availability Lists <span class="table-project-n"></span> </h1>
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
                                                    <th data-field="email" data-editable="true">Monday</th>
                                                    <th data-field="phone" data-editable="true">Tuesday</th>
                                                    <th data-field="company" data-editable="true">Wednesday</th>
                                                    
                                                    <th data-field="task" data-editable="true">Thursday</th>
													<th data-field="address" data-editable="true">Friday</th>
													<th data-field="specialist" data-editable="true">Saturday</th>
													 <th data-field="price" data-editable="true">Sunday</th>
                                                    <!--<th data-field="complete">Completed</th>
                                                    <th data-field="task" data-editable="true">Task</th>-->
                                                    <th data-field="date" data-editable="true">Date</th>
                                                    
                                                   
                                                    <th data-field="action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
												<?php $fun->Avi_list(); //$fun->Avi_Delete(); ?>
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

	$data = $crud->Update_get_by_id('*','availability'," where id='$get_id' ");
	
	$id = $data['user_id'];
	
	$select = $crud->Update_get_by_id('*','users'," where id='$id' ");

    
?>


<?php $fun->Avi_Update();  $error->Find('Your Availability Added Successfully','Your Availability Not added Something wrong','Your Availability Delete Successfully','Your Availability Not deleted Something wrong ','Your Availability Update Successfully',' Your Availability Not Updated somthing wrong'); ?>
<div class="advanced-form-area mg-b-15">
                <div class="container-fluid">

   <div class="row">
										
										 <div class="col-lg-6">
                            <div class="sparkline16-list shadow-reset mg-t-30">
                                <div class="sparkline16-hd">
                                    <div class="main-sparkline16-hd">
                                        <h1>Update Your Availability in <b>24 Hours</b></h1>
                                        <div class="sparkline16-outline-icon">
                                            <span class="sparkline16-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline16-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline16-graph">
									<form method="post">
                                    <div class="date-picker-inner">
									
										 <div class="chosen-select-single mg-b-20">
                                                    <label></label>
                                                    <select name="doctor" class="select2_demo_3 form-control">
														
														<option value="<?php echo $select['id']; ?>" selected><?php echo $select['firstname']." ".$select['lastname']; ?></option>
														
														<?php foreach($drop as $down){ ?>
														<
														<option value="<?php echo $down['id']; ?>"><?php echo $down['firstname']." ".$down['lastname']; ?></option>
														
														<?php } ?>
											 </select>
														</div>
										
                                        <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>Monday <?php echo $data['monday']; ?></label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="time" class="form-control" value="<?php echo substr( $data['monday'],0,5); ?>" name="monstart"  />
                                                <span class="input-group-addon">to</span>
                                                <input type="time" value="<?php echo substr( $data['monday'],8,5); ?>" class="form-control" name="monend"  />
                                            </div>
                                        </div>
                                        <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>Tuesday</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="time" class="form-control" value="<?php echo substr( $data['tuesday'],0,5); ?>" name="tustart"  />
                                                <span class="input-group-addon">to</span>
                                                <input type="time" class="form-control" value="<?php echo substr( $data['tuesday'],8,5); ?>" name="tuend"  />
                                            </div>
                                        </div>
                                        <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>Wednesday</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="time" class="form-control" value="<?php echo substr( $data['wednesday'],0,5); ?>" name="wedstart"  />
                                                <span class="input-group-addon">to</span>
                                                <input type="time" class="form-control" value="<?php echo substr( $data['wednesday'],8,5); ?>" name="wedend"  />
                                            </div>
                                        </div>
                                        <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>Thursday</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="time" class="form-control" value="<?php echo substr( $data['thursday'],0,5); ?>" name="thustart"  />
                                                <span class="input-group-addon">to</span>
                                                <input type="time" class="form-control" value="<?php echo substr( $data['thursday'],8,5); ?>" name="thuend"  />
                                            </div>
                                        </div>
                                        <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>Friday</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="time" class="form-control" value="<?php echo substr( $data['friday'],0,5); ?>" name="fristart"  />
                                                <span class="input-group-addon">to</span>
                                                <input type="time" class="form-control" value="<?php echo substr( $data['friday'],8,5); ?>" name="friend"  />
                                            </div>
                                        </div>
										<div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>	Saturday</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="time" class="form-control" value="<?php echo substr( $data['saturday'],0,5); ?>" name="satstart"  />
                                                <span class="input-group-addon">to</span>
                                                <input type="time" class="form-control" value="<?php echo substr( $data['saturday'],8,5); ?>" name="satend"  />
                                            </div>
                                        </div>
										<div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>Sunday</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="time" class="form-control" value="<?php echo substr( $data['sunday'],0,5); ?>" name="sunstart"  />
                                                <span class="input-group-addon">to</span>
                                                <input type="time" class="form-control" value="<?php echo substr( $data['sunday'],8,5); ?>" name="sunend"  />
                                            </div>
                                        </div>
										<label></label>
										<label></label>
										<div class="row ">
										<button type="submit" name="avibtnupdate" class="btn btn-primary">Update Availability</button>
											</div>
                                    </div>
										</form>
                                </div>
                            </div>
                        </div>
										
										</div>
	</div>
	</div>


<?php }else { 





?>





<?php $fun->Avi_Add(); $error->Find('Your Availability Added Successfully','Your Availability Not added Something wrong','Your Availability Delete Successfully','Your Availability Not deleted Something wrong ','Your Availability Update Successfully',' Your Availability Not Updated somthing wrong'); ?>
<div class="advanced-form-area mg-b-15">
                <div class="container-fluid">

   <div class="row">
										
										 <div class="col-lg-6">
                            <div class="sparkline16-list shadow-reset mg-t-30">
                                <div class="sparkline16-hd">
                                    <div class="main-sparkline16-hd">
                                        <h1>Add Your Availability in <b>24 Hours</b></h1>
                                        <div class="sparkline16-outline-icon">
                                            <span class="sparkline16-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline16-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline16-graph">
									<form method="post">
                                    <div class="date-picker-inner">
											<?php if($sesion['roller'] != "Doctor"){ ?>
										
										 <div class="chosen-select-single mg-b-20">
                                                    <label></label>
                                                    <select name="doctor" class="select2_demo_3 form-control">
														<option selected disabled>Select Doctor</option>
														<?php foreach($drop as $down){ ?>
														<option value="<?php echo $down['id']; ?>"><?php echo $down['firstname']." ".$down['lastname']; ?></option>
														
														<?php } ?>
											 </select>
														</div>
										<?php }else{ echo "<input type='hidden'  value='".$sesion['id']."' name='doctor'  />"; }?>
										
										
                                        <div class="form-group data-custon-pick data-custom-mg " id="data_5">
                                            <label>Monday</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="time" class="form-control" value="AM" name="monstart"  />
                                                <span class="input-group-addon">to</span>
                                                <input type="time" class="form-control" name="monend"  />
                                            </div>
                                        </div>
                                        <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>Tuesday</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="time" class="form-control" name="tustart"  />
                                                <span class="input-group-addon">to</span>
                                                <input type="time" class="form-control" name="tuend"  />
                                            </div>
                                        </div>
                                        <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>Wednesday</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="time" class="form-control" name="wedstart"  />
                                                <span class="input-group-addon">to</span>
                                                <input type="time" class="form-control" name="wedend"  />
                                            </div>
                                        </div>
                                        <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>Thursday</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="time" class="form-control" name="thustart"  />
                                                <span class="input-group-addon">to</span>
                                                <input type="time" class="form-control" name="thuend"  />
                                            </div>
                                        </div>
                                        <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>Friday</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="time" class="form-control" name="fristart"  />
                                                <span class="input-group-addon">to</span>
                                                <input type="time" class="form-control" name="friend"  />
                                            </div>
                                        </div>
										<div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>	Saturday</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="time" class="form-control" name="satstart"  />
                                                <span class="input-group-addon">to</span>
                                                <input type="time" class="form-control" name="satend"  />
                                            </div>
                                        </div>
										<div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>Sunday</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="time" class="form-control" name="sunstart"  />
                                                <span class="input-group-addon">to</span>
                                                <input type="time" class="form-control" name="sunend"  />
                                            </div>
                                        </div>
										<label></label>
										<label></label>
										<div class="row ">
										<button type="submit" name="avibtn" class="btn btn-primary">Add Availability</button>
											</div>
                                    </div>
										</form>
                                </div>
                            </div>
                        </div>
										
										</div>
	</div>
	</div>

<?php } require_once "footer.php"; ?>