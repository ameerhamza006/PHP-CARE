<?php require_once "header.php"; 

$error->Find('Specialities Added Successfully','Specialities Not added Something wrong','Specialities Delete Successfully','Specialities Not deleted Something wrong ','Specialities Update Successfully',' Specialities Not Updated somthing wrong');

if(isset($_GET['Edit'])){
	
$get_id = $_GET['Edit'];

?>


<div class="basic-form-area mg-b-15">
	
                <div class="container-fluid">
					
					<?php $data = $crud->Update_get_by_id('*','specialities'," where id='$get_id'"); $fun->Specialities_Update(); ?>
                    <div class="row">

 <div class="col-lg-6">
                            <div class="sparkline8-list basic-res-b-30 shadow-reset">
                                <div class="sparkline8-hd">
                                    <div class="main-sparkline8-hd">
                                        <h1>Update Specialities</h1>
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
											<form method="post" >
												
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="basic-login-inner">
                                                    	
                                                    
                                                         <div class="chosen-select-single mg-b-20">
                                                    <label>Specialities Name</label>
                                                    <select name="sp" class="select2_demo_3 form-control">
                                                         <option value="<?php echo $data['specialitie_name'];  ?>"  selected><?php echo $data['specialitie_name'];  ?></option>
																											
<option value="Acupuncturist">Acupuncturist</option>
<option value="Addiction">Addiction</option>
<option value="Allergist">Allergist</option>
<option value="Anaesthetist">Anaesthetist</option>
<option value="Androurologist">Androurologist</option>
<option value="Audiologist">Audiologist</option>
<option value="Breast Surgeon">Breast Surgeon</option>
<option value="Cancer">Cancer</option>
<option value="Cardiac Surgeon">Cardiac Surgeon</option>
<option value="Cardiologist">Cardiologist</option>
<option value="Chest Physician">Chest Physician</option>
<option value="Chest">Chest</option>
<option value="Child">Child</option>
<option value="Cosmetic Surgeon">Cosmetic Surgeon</option>
<option value="Dental Surgeon">Dental Surgeon</option>
<option value="Dentist">Dentist</option>
<option value="Dermatologist">Dermatologist</option>
<option value="Diabetist">Diabetist</option>
<option value="Diabetologists">Diabetologists</option>
<option value="Dietitian">Dietitian</option>
<option value="Endocrinologist">Endocrinologist</option>
<option value="ENT">ENT</option>
<option value="ENT Surgeon">ENT Surgeon</option>
<option value="Eye">Eye</option>
<option value="Eye Surgeon">Eye Surgeon</option>
<option value="Family Physician">Family Physician</option>
<option value="Fertility">Fertility</option>
<option value="Gastroenterologist">Gastroenterologist</option>
<option value="General Physician">General Physician</option>
<option value="General Surgeon">General Surgeon</option>
<option value="Geneticist">Geneticist</option>
<option value="Gynecologist">Gynecologist</option>
<option value="Hair Transplant">Hair Transplant</option>
<option value="Heart">Heart</option>
<option value="Hematologist">Hematologist</option>
<option value="Hepatologist">Hepatologist</option>
<option value="Herbalist">Herbalist</option>
<option value="Homeopathic">Homeopathic</option>
<option value="Infectious Disease">Infectious Disease</option>
<option value="Intensivist">Intensivist</option>
<option value="Internal Medicine">Internal Medicine</option>
<option value="Kidney Transplant Surgeon">Kidney Transplant Surgeon</option>
<option value="Laparoscopic Surgeon">Laparoscopic Surgeon</option>
<option value="Liver">Liver</option>
<option value="Maternal Fetal Medicine">Maternal Fetal Medicine</option>
<option value="74">Maxillofacial Surgeon</option>
<option value="31">Medical Specialist</option>
<option value="50">Neonatologist</option>
<option value="51">Nephrologist</option>
<option value="52">Neuro Physician</option>
<option value="14">Neurologist</option>
<option value="26">Neurosurgeon</option>
<option value="93">Nutritionists</option>
<option value="53">Obstetrician</option>
<option value="38">Oncologist</option>
<option value="23">Ophthalmologist</option>
<option value="15">Optician</option>
<option value="65">Optometrist</option>
<option value="54">Orthodontist</option>
<option value="44">Orthopedic Surgeon</option>
<option value="16">Orthopedist</option>
<option value="55">Other</option>
<option value="85">Paediatric Radiologist</option>
<option value="22">Paediatric Surgeon</option>
<option value="64">Pain Management Specialist</option>
<option value="30">Pathologist</option>
<option value="84">Pediatric Orthopedic Surgeon</option>
<option value="42">Pediatrician</option>
<option value="56">Physiatrist</option>
<option value="28">Physical Therapist</option>
<option value="21">Physician</option>
<option value="34">Plastic Surgeon</option>
<option value="40">Psychiatrist</option>
<option value="45">Psychologist</option>
<option value="24">Pulmonologist</option>
<option value="29">Radiologist</option>
<option value="83">Rehabilitation Medicine</option>
<option value="57">Rheumatologist</option>
<option value="78">Sexologist</option>
<option value="18">Skin Specialist</option>
<option value="27">Sonologist</option>
<option value="66">Speech Therapist</option>
<option value="41">Thoracic Surgeon</option>
<option value="58">Traumatologist</option>
<option value="82">Urologic Oncologist</option>
<option value="19">Urologist</option>
<option value="63">Vascular Surgeon</option>
<option value="80">Weight Loss Specialist</option>
   
                                                    </select>
                                                </div>
                                                       
												</div>
                                            </div>
                                          
											<label></label>
											<div class="login-btn-inner">
												 <div class="col-lg-1  col-md-4 col-sm-2 col-xs-4 ">
                                                            <div class="form-group-inner">
                                                                <button class="btn btn-custon-four btn-success" type="submit" name="updatesp">Update</button>
                                                                
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


<?php }else { 

$fun->Add_Specialities();

?>

<div class="basic-form-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                       <div class="col-lg-6">
                            <div class="sparkline8-list basic-res-b-30 shadow-reset">
                                <div class="sparkline8-hd">
                                    <div class="main-sparkline8-hd">
                                        <h1>Add Specialities</h1>
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
											<form method="post" >
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="basic-login-inner">
                                                   
                                                    
                                                         <div class="chosen-select-single mg-b-20">
                                                    <label>Specialities Name</label>
                                                    <select name="sp" class="select2_demo_3 form-control">
                                                         <option value="Select Specialities" disabled selected>Select Specialities</option>
													
<option value="Acupuncturist">Acupuncturist</option>
<option value="Addiction">Addiction</option>
<option value="Allergist">Allergist</option>
<option value="Anaesthetist">Anaesthetist</option>
<option value="Androurologist">Androurologist</option>
<option value="Audiologist">Audiologist</option>
<option value="Breast Surgeon">Breast Surgeon</option>
<option value="Cancer">Cancer</option>
<option value="Cardiac Surgeon">Cardiac Surgeon</option>
<option value="Cardiologist">Cardiologist</option>
<option value="Chest Physician">Chest Physician</option>
<option value="Chest">Chest</option>
<option value="Child">Child</option>
<option value="Cosmetic Surgeon">Cosmetic Surgeon</option>
<option value="Dental Surgeon">Dental Surgeon</option>
<option value="Dentist">Dentist</option>
<option value="Dermatologist">Dermatologist</option>
<option value="Diabetist">Diabetist</option>
<option value="Diabetologists">Diabetologists</option>
<option value="Dietitian">Dietitian</option>
<option value="Endocrinologist">Endocrinologist</option>
<option value="ENT">ENT</option>
<option value="ENT Surgeon">ENT Surgeon</option>
<option value="Eye">Eye</option>
<option value="Eye Surgeon">Eye Surgeon</option>
<option value="Family Physician">Family Physician</option>
<option value="Fertility">Fertility</option>
<option value="Gastroenterologist">Gastroenterologist</option>
<option value="General Physician">General Physician</option>
<option value="General Surgeon">General Surgeon</option>
<option value="Geneticist">Geneticist</option>
<option value="Gynecologist">Gynecologist</option>
<option value="Hair Transplant">Hair Transplant</option>
<option value="Heart">Heart</option>
<option value="Hematologist">Hematologist</option>
<option value="Hepatologist">Hepatologist</option>
<option value="Herbalist">Herbalist</option>
<option value="Homeopathic">Homeopathic</option>
<option value="Infectious Disease">Infectious Disease</option>
<option value="Intensivist">Intensivist</option>
<option value="Internal Medicine">Internal Medicine</option>
<option value="Kidney Transplant Surgeon">Kidney Transplant Surgeon</option>
<option value="Laparoscopic Surgeon">Laparoscopic Surgeon</option>
<option value="Liver">Liver</option>
<option value="Maternal Fetal Medicine">Maternal Fetal Medicine</option>
<option value="74">Maxillofacial Surgeon</option>
<option value="31">Medical Specialist</option>
<option value="50">Neonatologist</option>
<option value="51">Nephrologist</option>
<option value="52">Neuro Physician</option>
<option value="14">Neurologist</option>
<option value="26">Neurosurgeon</option>
<option value="93">Nutritionists</option>
<option value="53">Obstetrician</option>
<option value="38">Oncologist</option>
<option value="23">Ophthalmologist</option>
<option value="15">Optician</option>
<option value="65">Optometrist</option>
<option value="54">Orthodontist</option>
<option value="44">Orthopedic Surgeon</option>
<option value="16">Orthopedist</option>
<option value="55">Other</option>
<option value="85">Paediatric Radiologist</option>
<option value="22">Paediatric Surgeon</option>
<option value="64">Pain Management Specialist</option>
<option value="30">Pathologist</option>
<option value="84">Pediatric Orthopedic Surgeon</option>
<option value="42">Pediatrician</option>
<option value="56">Physiatrist</option>
<option value="28">Physical Therapist</option>
<option value="21">Physician</option>
<option value="34">Plastic Surgeon</option>
<option value="40">Psychiatrist</option>
<option value="45">Psychologist</option>
<option value="24">Pulmonologist</option>
<option value="29">Radiologist</option>
<option value="83">Rehabilitation Medicine</option>
<option value="57">Rheumatologist</option>
<option value="78">Sexologist</option>
<option value="18">Skin Specialist</option>
<option value="27">Sonologist</option>
<option value="66">Speech Therapist</option>
<option value="41">Thoracic Surgeon</option>
<option value="58">Traumatologist</option>
<option value="82">Urologic Oncologist</option>
<option value="19">Urologist</option>
<option value="63">Vascular Surgeon</option>
<option value="80">Weight Loss Specialist</option>
   
                                                    </select>
                                                </div>
                                                       
												</div>
                                            </div>
                                          
											<label></label>
											<div class="login-btn-inner">
												 <div class="col-lg-1  col-md-4 col-sm-2 col-xs-4 ">
                                                            <div class="form-group-inner">
                                                                <button class="btn btn-custon-four btn-success" type="submit" name="spadd">Add Specialities</button>
                                                                
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
                       
<?php } ?>





 <div class="static-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="sparkline8-list shadow-reset">
                                <div class="sparkline8-hd">
                                    <div class="main-sparkline8-hd">
                                        <h1>Specialities Lists</h1>
                                        <div class="sparkline8-outline-icon">
                                            <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline8-graph">
                                    <div class="static-table-list">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Specialities Name</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php $fun->Specialities_list();  $fun->Specialities_Delete(); ?>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>




<?php  require_once "footer.php"; ?>