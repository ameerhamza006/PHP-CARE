<?php require_once "header.php"; 

$drop = $crud->View('*','users'," where roller='Doctor' ",' ORDER BY id DESC ');

$error->Find(' News Added Successfully','News Not added Something wrong','News Delete Successfully','News Not deleted Something wrong ','News Update Successfully',' News Not Updated somthing wrong');

if(isset($_GET['List'])){
	


?>

<?php   ?>
<!-- Static Table Start -->
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
				
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1>News Lists <span class="table-project-n"></span> </h1>
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
                                                    <th data-field="name" data-editable="true">Post By</th>
                                                    <th data-field="email" data-editable="true">Title</th>
                                                    <th data-field="phone" data-editable="true">Bio</th>
                                                   
                                                    <th data-field="image" >Image</th>
                                                   
                                                    <th data-field="action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
												<?php $fun->News_list(); $fun->News_Delete(); ?>
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
	
	$data = $crud->Update_get_by_id('*','blog'," where id='$get_id' ");	
	
	$fun->News_Update();
?>

<div class="password-meter-area mg-b-40">
                <div class="container-fluid">

<div class="col-lg-6">
                            <div class="sparkline12-list shadow-reset mg-t-30">
                                <div class="sparkline10-hd">
                                    <div class="main-sparkline10-hd">
                                        <h1>Update <span class="password-mt-none">News</span></h1>
                                        <div class="sparkline10-outline-icon">
                                            <span class="sparkline10-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline10-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline10-graph">
									<form method="post" enctype="multipart/form-data">
                                    <div id="pwd-container3">
										 
                                        <div class="form-group">
                                            <label for="username">Title</label>
                                            <input type="text" class="form-control" value="<?php echo $data['title']; ?>" name="title" id="username" placeholder="Username">
                                        </div>
										<div class="form-group">
                                            <label for="username">Description</label>
											<textarea class="form-control" name="bio" placeholder="Description"><?php echo $data['bio']; ?></textarea>
                                           
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
										<label></label>
                                        <div class="form-group">
                                            <button type="submit" name="newsupdate" class="btn btn-primary">Add News</button>
                                        </div>
										
                                    </div>
										</form>
                                </div>
                            </div>
                        </div>

	</div>
	</div>


<?php }else{ 

	$fun->News_Add();
	
?>


<div class="password-meter-area mg-b-40">
                <div class="container-fluid">

<div class="col-lg-6">
                            <div class="sparkline12-list shadow-reset mg-t-30">
                                <div class="sparkline10-hd">
                                    <div class="main-sparkline10-hd">
                                        <h1>Add <span class="password-mt-none">News</span></h1>
                                        <div class="sparkline10-outline-icon">
                                            <span class="sparkline10-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline10-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline10-graph">
									<form method="post" enctype="multipart/form-data">
                                    <div id="pwd-container3">
										 
                                        <div class="form-group">
                                            <label for="username">Title</label>
                                            <input type="text" class="form-control" name="title" id="username" placeholder="Username">
                                        </div>
										<div class="form-group">
                                            <label for="username">Description</label>
											<textarea class="form-control" name="bio" placeholder="Description"></textarea>
                                           
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
                                                                                <input type="file" required name="pic" onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                                                            </div>
                                                                            <input type="text" name="pic" readonly id="prepend-big-btn" placeholder="no file selected">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
										<label></label>
										<label></label>
                                        <div class="form-group">
                                            <button type="submit" name="newsadd" class="btn btn-primary">Add News</button>
                                        </div>
										
                                    </div>
										</form>
                                </div>
                            </div>
                        </div>

	</div>
	</div>
					
<?php } require_once "footer.php"; ?>