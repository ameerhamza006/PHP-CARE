<?php require_once "header.php"; ?>




<div class="user-profile-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="user-profile-wrap shadow-reset">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="user-profile-img">
                                                    <img src="../Doctor/<?php echo $sesion['firstname']." ".$sesion['lastname']."/".$sesion['image']; ?>" alt=""  style="height: 104px;width: 100%;"/>
													<input type="file" class="form-control" style="margin-left: -15px;width: 129px;" >
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="user-profile-content">
													<div class="row">
														<div class="col-lg-6">
													<label style="color: white;">First Name</label>
													<input type="text" class="form-control" value="<?php echo $sesion['firstname']; ?>">
															</div>
														<div class="col-lg-6">
													<label style="color: white;">Last Name</label>
													<input type="text" class="form-control" value="<?php echo $sesion['lastname']; ?>">
															</div>
                                                    </div>
                                                    <p class="profile-founder">Specialities in 
														<strong><input type="text" class="form-control" value="<?php echo $sesion['specialistname']; ?>"></strong>
                                                    </p>
                                                    <p class="profile-des">
														Description
														<textarea rows="10" class="form-control"><?php echo $sesion['bio']; ?></textarea>
														</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="user-profile-social-list">
                                            <table class="table small m-b-xs">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <strong> Email</strong>
															<input type="text" class="form-control" value="<?php echo $sesion['email']; ?>">
                                                        </td>
                                                        <td>
                                                            <strong>Phone</strong> <input type="text" class="form-control" value="<?php echo $sesion['phone']; ?>">
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                         <td>
                                                            <strong>Experience</strong> <input type="text" class="form-control" value="<?php echo  $sesion['experience']; ?>">
                                                        </td>

                                                         <td>
                                                            <strong>City</strong> <input type="text" class="form-control" value="<?php echo $sesion['cityname']; ?>">
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                         <td>
                                                            <strong>State</strong> <input type="text" class="form-control" value="<?php echo $sesion['state']; ?>">
                                                        </td>

                                                         <td>
                                                            <strong>Zip</strong> <input type="text" class="form-control" value="<?php echo $sesion['zip']; ?>">
                                                        </td>
														

                                                    </tr>
													 <tr>
                                                         <td>
                                                            <strong>Address</strong>
															 <textarea rows="3" class="form-control"><?php echo $sesion['address']; ?></textarea>
                                                        </td>

                                                         <td>
                                                        </td>
														

                                                    </tr>
													
													
													

												</tbody>
                                            </table>
											
                                        </div>
                                    </div>
									
                                </div>
								
									
                            </div>
							
                        </div>
                    </div>
					
                </div>
	
            </div>
            <div class="user-prfile-activity-area mg-b-40 mg-t-30">
                <div class="container-fluid">
                    <div class="row">
                       
<div class="col-lg-3">
                            <div class="sparkline12-list shadow-reset mg-t-30">
                                <div class="sparkline10-hd">
                                    <div class="main-sparkline10-hd">
                                        <h1> Social Links</h1>
                                        <div class="sparkline10-outline-icon">
                                            <span class="sparkline10-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline10-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline10-graph">
								
                                    <div id="pwd-container3">
									
									
                                        <div class="form-group">
                                            <label for="username">Facebook</label>
                                            <input type="text" class="form-control" name="fb" id="username" placeholder="Username" value="<?php echo $sesion['facebook']; ?>">
                                        </div>
										<div class="form-group">
                                            <label for="username">Twitter</label>
                                            <input type="text" class="form-control" name="tw" id="username" placeholder="Username" value="<?php echo $sesion['twitter']; ?>">
                                        </div>
										<div class="form-group">
                                            <label for="username">Linkedin</label>
                                            <input type="text" class="form-control" name="lk" id="username" placeholder="Username" value="<?php echo $sesion['linkedin']; ?>">
                                        </div>
										<div class="form-group">
                                            <label for="username">Instagram</label>
                                            <input type="text" class="form-control" name="insta" id="username" placeholder="Username" value="<?php echo $sesion['instagram']; ?>">
                                        </div>
										<div class="form-group">
                                            <label for="username">Company</label>
                                            <input type="text" class="form-control" name="com" id="username" placeholder="" value="<?php echo $sesion['company']; ?>">
                                        </div>
                                       
                                        
                                    </div>
							    <label></label>
							    <label></label>
							    <label></label>
							    <label></label>
							    <label></label>
							    <label></label>
							    <label></label>
							    <label></label>
							    <label></label>
									<br>
									<br>
									<br>
                                </div>
                            </div>
                        </div>
						
                         <div class="col-lg-9">
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
									
                                    <div class="date-picker-inner">
										<div class="form-group data-custon-pick data-custom-mg " id="data_5">
                                            <label>Monday</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="time" class="form-control" name="monstart" value="<?php echo substr( $sesion['monday'],0,5); ?>" />
                                                <span class="input-group-addon">to</span>
                                                <input type="time" class="form-control" name="monend" value="<?php echo substr( $sesion['monday'],8,5); ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>Tuesday</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="time" class="form-control" name="tustart" value="<?php echo substr( $sesion['tuesday'],0,5); ?>" />
                                                <span class="input-group-addon">to</span>
                                                <input type="time" class="form-control" name="tuend" value="<?php echo substr( $sesion['tuesday'],8,5); ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>Wednesday</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="time" class="form-control" name="wedstart" value="<?php echo substr( $sesion['wednesday'],0,5); ?>"  />
                                                <span class="input-group-addon">to</span>
                                                <input type="time" class="form-control" name="wedend" value="<?php echo substr( $sesion['wednesday'],8,5); ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>Thursday</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="time" class="form-control" name="thustart" value="<?php echo substr( $sesion['thursday'],0,5); ?>" />
                                                <span class="input-group-addon">to</span>
                                                <input type="time" class="form-control" name="thuend" value="<?php echo substr( $sesion['thursday'],8,5); ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>Friday</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="time" class="form-control" name="fristart" value="<?php echo substr( $sesion['friday'],0,5); ?>" />
                                                <span class="input-group-addon">to</span>
                                                <input type="time" class="form-control" name="friend" value="<?php echo substr( $sesion['friday'],8,5); ?>" />
                                            </div>
                                        </div>
										<div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>	Saturday</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="time" class="form-control" name="satstart" value="<?php echo substr( $sesion['saturday'],0,5); ?>" />
                                                <span class="input-group-addon">to</span>
                                                <input type="time" class="form-control" name="satend" value="<?php echo substr( $sesion['saturday'],8,5); ?>" />
                                            </div>
                                        </div>
										<div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>Sunday</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="time" class="form-control" name="sunstart" value="<?php echo substr( $sesion['sunday'],0,5); ?>" />
                                                <span class="input-group-addon">to</span>
                                                <input type="time" class="form-control" name="sunend" value="<?php echo substr( $sesion['sunday'],8,5); ?>" />
                                            </div>
                                        </div>
										<label></label>
										<label></label>
										
                                    </div>
										
                                </div>
                            </div>
                        </div>
						<div class="col-lg-12">
                            <div class="sparkline16-list shadow-reset mg-t-30">
                                <div class="sparkline16-hd">
                                    <div class="main-sparkline16-hd" align="right">
                                      <button class="btn btn-primary" type="submit">Edit Profile</button>  
                                    </div>
                                </div>
                                </div>
                                </div>
                    </div>
                </div>
            </div>










<?php require_once "footer.php"; ?>