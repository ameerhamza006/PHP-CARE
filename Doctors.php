<?php require_once "header.php"; ?>


<section class="banner banner-02">
<label></label>


<!--=================================
    banner -->
    <section class="inner-banner bg-light ">
      <div class="container">
        <div class="row align-items-center intro-title">
          <div class="col-12">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="index.html"> <i class="fas fa-home"></i> </a></li>
              <li class="breadcrumb-item"> <i class="fas fa-chevron-right"></i> <a href="javascript:void(0)">Pages</a></li>
              <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Team </span></li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <!--=================================
    banner -->
</section>
<br>

<?php if(isset($_GET['Profile'])){ 

$gett = $_GET['Profile'];

$get_name = str_replace('-',' ',$gett);
	
	$view = $crud->Update_get_by_id('users.id,users.firstname,users.lastname,users.email,users.phone,users.cityname,users.address,users.image,users.specialistname,users.experience,users.zip,users.state,users.bio,links.facebook,links.twitter,links.instagram,links.linkedin,links.company,availability.monday,availability.tuesday,availability.wednesday,availability.thursday,availability.friday,availability.saturday,availability.sunday,availability.date','users', " LEFT JOIN links ON users.id = links.user_id LEFT JOIN availability ON users.id = availability.user_id where users.firstname = '$get_name' ");
    
	$fun->Appointment();
	
	$error->Front_Find('Your Appointment Successfully Added Please Come Be On Time.','Your Appointment Not Added Please Check Somthing Wrong.','','','','');
	$error->feed(' Your Feedback Added Successfully ',' Your Feedback Not Added Somthing Wrong ','','','','');

?>
     


    <!--=================================
    Service-->
    <section class="space-ptb">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-5">
            <div class="team-single">
              <div class="team-single-detail">
                <div class="team-single-img">
                  <img class="img-fluid" src="Doctor/<?php echo $view['firstname']." ".$view['lastname']."/".$view['image'] ; ?>" alt="" style="height: 330px; width: 100%;">
                </div>
                <ul class="list-unstyled pb-4">
                <li class="media">
                  <span>Profession:</span>
                  <label><?php echo $view['specialistname']; ?></label>
                </li>
                <li class="media">
                  <span>Experience:</span>
                  <label><?php echo $view['experience']; ?></label>
                </li>
                <li class="media">
                  <span>Phone:</span>
                  <label><?php echo $view['phone']; ?></label>
                </li>
                <li class="media">
                  <span>Email:</span>
                  <label><?php echo $view['email']; ?></label>
                </li>
					<li class="media">
                  <span>City:</span>
                  <label><?php echo $view['cityname']; ?></label>
                </li>
                <li class="media">
                  <span>Address:</span>
                  <label><?php echo $view['address']; ?></label>
                </li>
                <li class="media mb-0">
                  <span>Follow on:</span>
                  <label class="social">
                    <a href="https://web.facebook.com/<?php echo $view['facebook']; ?>/"> <i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/<?php echo $view['twitter']; ?>/"> <i class="fab fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/in/<?php echo $view['linkedin']; ?>/"> <i class="fab fa-linkedin-in"></i></a>
                    <a href="#"> <i class="fab fa-pinterest"></i></a>
                    <a href="https://www.instagram.com/<?php echo $view['instagram']; ?>/"> <i class="fab fa-instagram"></i></a>
                  </label>
                </li>
              </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-8 col-lg-7 mt-lg-0 mt-5">
            <div class="section-title mb-5">
              <h2 class="text-dark"><?php echo $view['firstname']." ".$view['lastname']; ?> </h2>
              <h6 class="mb-4">Give yourself the power of responsibility. Remind yourself the only thing stopping you is yourself.</h6>
              <p><?php echo $view['bio']; ?></p>
            </div>
            <div class="row mb-5">
              <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                  <li class="mb-2 d-flex"><i class="far fa-plus-square pr-2 text-primary mt-1"></i>Success isn’t really that difficult. </li>
                  <li class="mb-2 d-flex"><i class="far fa-plus-square pr-2 text-primary mt-1"></i>success is achievable understanding.</li>
                  <li class="mb-2 d-flex"><i class="far fa-plus-square pr-2 text-primary mt-1"></i>The first thing to remember about success.</li>
                  <li class="mb-2 d-flex"><i class="far fa-plus-square pr-2 text-primary mt-1"></i>There are basically six key areas. </li>
                </ul>
              </div>
              <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                  <li class="mb-2 d-flex"><i class="far fa-plus-square pr-2 text-primary mt-1"></i>Some people will tell you there are. </li>
                  <li class="mb-2 d-flex"><i class="far fa-plus-square pr-2 text-primary mt-1"></i>they all originate from the same roots.</li>
                  <li class="mb-2 d-flex"><i class="far fa-plus-square pr-2 text-primary mt-1"></i>Making a decision to do something.</li>
                  <li class="mb-2 d-flex"><i class="far fa-plus-square pr-2 text-primary mt-1"></i>The first action is always in making the. </li>
                </ul>
              </div>
            </div>

            <div class="mt-4 mt-md-5 pr-lg-5">
              <h3 class="mb-4">My Skills</h3>
              <!-- Skill-bar START -->
              <div class="overflow-hidden">
                <!-- Skill-01 START -->
                <div class="skill">
                  <div class="skill-bar" data-percent="50" data-delay="0" data-type="%">
                    <div class="skill-title">Design</div>
                  </div>
                </div>
                <!-- Skill-01 END -->

                <!-- Skill-02 START -->
                <div class="skill">
                  <div class="skill-bar" data-percent="73" data-delay="0" data-type="%">
                    <div class="skill-title">Development</div>
                  </div>
                </div>
                <!-- Skill-02 END -->

                <!-- Skill-03 START -->
                <div class="skill">
                  <div class="skill-bar" data-percent="85" data-delay="0" data-type="%">
                    <div class="skill-title">Support</div>
                  </div>
                </div>
                <!-- Skill-03 END -->

                <!-- Skill-04 START -->
                <div class="skill">
                  <div class="skill-bar" data-percent="95" data-delay="0" data-type="%">
                    <div class="skill-title">Graphics</div>
                  </div>
                </div>
                <!-- Skill-04 END -->
              </div>
              <!-- Skill-bar END -->
            </div>

          </div>
        </div>
      </div>
    </section> 
<!--=================================
    Service end -->
    

    

    <!--=================================
    Schedule -->
    <section class="mb-lg-n6 mb-md-n5 pb-0 pb-sm-4 pb-lg-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="schedule shadow">
              <div class="row no-gutters">
                <div class="col-lg-4">
                  <div class="schedule-morden bg-white">
                    <div class="icon">
                      <i class="flaticon-emergency-call"></i>
                    </div>
                    <div class="schedule-morden-content">
                      <h6>Emergency Case</h6>
                      <span class="phone-number h4">+(704) 279-1249 </span>
                      <p class="mb-0">Commitment is something that comes from understanding that everything has its price and then having the willingness to pay that price.</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="schedule-morden bg-white">
                    <div class="icon">
                      <i class="flaticon-clock"></i>
                    </div>
                    <div class="schedule-morden-content">
                      <h6>Opening Hours</h6>
                      <div class="opening-hourse">
                        <ul class="list-unstyled">
                          <li>
                            <span>Monday</span>
                            <div class="time"> <?php echo $view['monday']; ?> </div>
                          </li>
                          <li>
                            <span>Tuesday</span>
                            <div class="time"> <?php echo $view['tuesday']; ?> </div>
                          </li>
							<li>
                            <span>Wednesday</span>
                            <div class="time"> <?php echo $view['wednesday']; ?> </div>
                          </li>
                          <li>
                            <span>Thursday</span>
                            <div class="time"> <?php echo $view['thursday']; ?> </div>
                          </li>
							<li>
                            <span>Friday</span>
                            <div class="time"> <?php echo $view['friday']; ?> </div>
                          </li>
							<li>
                            <span>Saturday</span>
                            <div class="time"> <?php echo $view['saturday']; ?> </div>
                          </li>
							<li>
                            <span>Sunday</span>
                            <div class="time"> <?php echo $view['sunday']; ?> </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="schedule-morden last bg-white">
                    <div class="icon">
                      <i class="flaticon-calendar"></i>
                    </div>
                    <div class="schedule-morden-content">
                      <h6>Doctors Timetable</h6>
                      <p class="mb-4">This is important because nobody wants to put significant effort into something, only to find out after the fact that the price was too high.</p>
                      <a class="btn btn-outline-primary" href="timetable.html"><i class="fa fa-address-book"></i>View Timetable</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=================================
    Schedule -->

<!--=================================
    Quick contact -->
    <section class="space-pt mb-lg-7 pb-lg-0">
      <div class="container">
        <div class="row align-items-center">
           <div class="col-lg-7">
            <div class="appointment-form">
              <h4 class="text-primary">Make An Appointment Now!</h4>
              <form class="mt-5" method="post">
                <div class="row align-items-center">
					<?php if(isset($_SESSION['EmailUser'])){ ?>
					
					 <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="fname" id="first-name" value="<?php echo $se_firstname ?>" placeholder="First Name">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="lname" id="last-name" value="<?php echo $se_lastname ?>" placeholder="Last Name">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $se_email ?>" placeholder="Email">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $se_phone ?>" placeholder="Phone Number">
                  </div>
                  <div class="form-group col-lg-12">
                    <input type="text" class="form-control" name="address" id="address" value="<?php echo $se_address ?>" placeholder="Address">
                  </div>
                  <div class="form-group select-border col-md-4 ">
                    <select class="form-control basic-select" name="city" id="city">
                      <option value="<?php echo $se_city ?>" selected><?php echo $se_city ?></option>
    <option value="Islamabad">Islamabad</option>
    <option value="" disabled>Punjab Cities</option>
    <option value="Ahmed Nager Chatha">Ahmed Nager Chatha</option>
    <option value="Ahmadpur East">Ahmadpur East</option>
    <option value="Ali Khan Abad">Ali Khan Abad</option>
    <option value="Alipur">Alipur</option>
    <option value="Arifwala">Arifwala</option>
    <option value="Attock">Attock</option>
    <option value="Bhera">Bhera</option>
    <option value="Bhalwal">Bhalwal</option>
    <option value="Bahawalnagar">Bahawalnagar</option>
    <option value="Bahawalpur">Bahawalpur</option>
    <option value="Bhakkar">Bhakkar</option>
    <option value="Burewala">Burewala</option>
    <option value="Chillianwala">Chillianwala</option>
    <option value="Chakwal">Chakwal</option>
    <option value="Chichawatni">Chichawatni</option>
    <option value="Chiniot">Chiniot</option>
    <option value="Chishtian">Chishtian</option>
    <option value="Daska">Daska</option>
    <option value="Darya Khan">Darya Khan</option>
    <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
    <option value="Dhaular">Dhaular</option>
    <option value="Dina">Dina</option>
    <option value="Dinga">Dinga</option>
    <option value="Dipalpur">Dipalpur</option>
    <option value="Faisalabad">Faisalabad</option>
    <option value="Ferozewala">Ferozewala</option>
    <option value="Fateh Jhang">Fateh Jang</option>
    <option value="Ghakhar Mandi">Ghakhar Mandi</option>
    <option value="Gojra">Gojra</option>
    <option value="Gujranwala">Gujranwala</option>
    <option value="Gujrat">Gujrat</option>
    <option value="Gujar Khan">Gujar Khan</option>
    <option value="Hafizabad">Hafizabad</option>
    <option value="Haroonabad">Haroonabad</option>
    <option value="Hasilpur">Hasilpur</option>
    <option value="Haveli Lakha">Haveli Lakha</option>
    <option value="Jatoi">Jatoi</option>
    <option value="Jalalpur">Jalalpur</option>
    <option value="Jattan">Jattan</option>
    <option value="Jampur">Jampur</option>
    <option value="Jaranwala">Jaranwala</option>
    <option value="Jhang">Jhang</option>
    <option value="Jhelum">Jhelum</option>
    <option value="Kalabagh">Kalabagh</option>
    <option value="Karor Lal Esan">Karor Lal Esan</option>
    <option value="Kasur">Kasur</option>
    <option value="Kamalia">Kamalia</option>
    <option value="Kamoke">Kamoke</option>
    <option value="Khanewal">Khanewal</option>
    <option value="Khanpur">Khanpur</option>
    <option value="Kharian">Kharian</option>
    <option value="Khushab">Khushab</option>
    <option value="Kot Addu">Kot Addu</option>
    <option value="Jauharabad">Jauharabad</option>
    <option value="Lahore">Lahore</option>
    <option value="Lalamusa">Lalamusa</option>
    <option value="Layyah">Layyah</option>
    <option value="Liaquat Pur">Liaquat Pur</option>
    <option value="Lodhran">Lodhran</option>
    <option value="Malakwal">Malakwal</option>
    <option value="Mamoori">Mamoori</option>
    <option value="Mailsi">Mailsi</option>
    <option value="Mandi Bahauddin">Mandi Bahauddin</option>
    <option value="Mian Channu">Mian Channu</option>
    <option value="Mianwali">Mianwali</option>
    <option value="Multan">Multan</option>
    <option value="Murree">Murree</option>
    <option value="Muridke">Muridke</option>
    <option value="Mianwali Bangla">Mianwali Bangla</option>
    <option value="Muzaffargarh">Muzaffargarh</option>
    <option value="Narowal">Narowal</option>
    <option value="Nankana Sahib">Nankana Sahib</option>
    <option value="Okara">Okara</option>
    <option value="Renala Khurd">Renala Khurd</option>
    <option value="Pakpattan">Pakpattan</option>
    <option value="Pattoki">Pattoki</option>
    <option value="Pir Mahal">Pir Mahal</option>
    <option value="Qaimpur">Qaimpur</option>
    <option value="Qila Didar Singh">Qila Didar Singh</option>
    <option value="Rabwah">Rabwah</option>
    <option value="Raiwind">Raiwind</option>
    <option value="Rajanpur">Rajanpur</option>
    <option value="Rahim Yar Khan">Rahim Yar Khan</option>
    <option value="Rawalpindi">Rawalpindi</option>
    <option value="Sadiqabad">Sadiqabad</option>
    <option value="Safdarabad">Safdarabad</option>
    <option value="Sahiwal">Sahiwal</option>
    <option value="Sangla Hill">Sangla Hill</option>
    <option value="Sarai Alamgir">Sarai Alamgir</option>
    <option value="Sargodha">Sargodha</option>
    <option value="Shakargarh">Shakargarh</option>
    <option value="Sheikhupura">Sheikhupura</option>
    <option value="Sialkot">Sialkot</option>
    <option value="Sohawa">Sohawa</option>
    <option value="Soianwala">Soianwala</option>
    <option value="Siranwali">Siranwali</option>
    <option value="Talagang">Talagang</option>
    <option value="Taxila">Taxila</option>
    <option value="Toba Tek Singh">Toba Tek Singh</option>
    <option value="Vehari">Vehari</option>
    <option value="Wah Cantonment">Wah Cantonment</option>
    <option value="Wazirabad">Wazirabad</option>
    <option value="" disabled>Sindh Cities</option>
    <option value="Badin">Badin</option>
    <option value="Bhirkan">Bhirkan</option>
    <option value="Rajo Khanani">Rajo Khanani</option>
    <option value="Chak">Chak</option>
    <option value="Dadu">Dadu</option>
    <option value="Digri">Digri</option>
    <option value="Diplo">Diplo</option>
    <option value="Dokri">Dokri</option>
    <option value="Ghotki">Ghotki</option>
    <option value="Haala">Haala</option>
    <option value="Hyderabad">Hyderabad</option>
    <option value="Islamkot">Islamkot</option>
    <option value="Jacobabad">Jacobabad</option>
    <option value="Jamshoro">Jamshoro</option>
    <option value="Jungshahi">Jungshahi</option>
    <option value="Kandhkot">Kandhkot</option>
    <option value="Kandiaro">Kandiaro</option>
    <option value="Karachi">Karachi</option>
    <option value="Kashmore">Kashmore</option>
    <option value="Keti Bandar">Keti Bandar</option>
    <option value="Khairpur">Khairpur</option>
    <option value="Kotri">Kotri</option>
    <option value="Larkana">Larkana</option>
    <option value="Matiari">Matiari</option>
    <option value="Mehar">Mehar</option>
    <option value="Mirpur Khas">Mirpur Khas</option>
    <option value="Mithani">Mithani</option>
    <option value="Mithi">Mithi</option>
    <option value="Mehrabpur">Mehrabpur</option>
    <option value="Moro">Moro</option>
    <option value="Nagarparkar">Nagarparkar</option>
    <option value="Naudero">Naudero</option>
    <option value="Naushahro Feroze">Naushahro Feroze</option>
    <option value="Naushara">Naushara</option>
    <option value="Nawabshah">Nawabshah</option>
    <option value="Nazimabad">Nazimabad</option>
    <option value="Qambar">Qambar</option>
    <option value="Qasimabad">Qasimabad</option>
    <option value="Ranipur">Ranipur</option>
    <option value="Ratodero">Ratodero</option>
    <option value="Rohri">Rohri</option>
    <option value="Sakrand">Sakrand</option>
    <option value="Sanghar">Sanghar</option>
    <option value="Shahbandar">Shahbandar</option>
    <option value="Shahdadkot">Shahdadkot</option>
    <option value="Shahdadpur">Shahdadpur</option>
    <option value="Shahpur Chakar">Shahpur Chakar</option>
    <option value="Shikarpaur">Shikarpaur</option>
    <option value="Sukkur">Sukkur</option>
    <option value="Tangwani">Tangwani</option>
    <option value="Tando Adam Khan">Tando Adam Khan</option>
    <option value="Tando Allahyar">Tando Allahyar</option>
    <option value="Tando Muhammad Khan">Tando Muhammad Khan</option>
    <option value="Thatta">Thatta</option>
    <option value="Umerkot">Umerkot</option>
    <option value="Warah">Warah</option>
    <option value="" disabled>Khyber Cities</option>
    <option value="Abbottabad">Abbottabad</option>
    <option value="Adezai">Adezai</option>
    <option value="Alpuri">Alpuri</option>
    <option value="Akora Khattak">Akora Khattak</option>
    <option value="Ayubia">Ayubia</option>
    <option value="Banda Daud Shah">Banda Daud Shah</option>
    <option value="Bannu">Bannu</option>
    <option value="Batkhela">Batkhela</option>
    <option value="Battagram">Battagram</option>
    <option value="Birote">Birote</option>
    <option value="Chakdara">Chakdara</option>
    <option value="Charsadda">Charsadda</option>
    <option value="Chitral">Chitral</option>
    <option value="Daggar">Daggar</option>
    <option value="Dargai">Dargai</option>
    <option value="Darya Khan">Darya Khan</option>
    <option value="Dera Ismail Khan">Dera Ismail Khan</option>
    <option value="Doaba">Doaba</option>
    <option value="Dir">Dir</option>
    <option value="Drosh">Drosh</option>
    <option value="Hangu">Hangu</option>
    <option value="Haripur">Haripur</option>
    <option value="Karak">Karak</option>
    <option value="Kohat">Kohat</option>
    <option value="Kulachi">Kulachi</option>
    <option value="Lakki Marwat">Lakki Marwat</option>
    <option value="Latamber">Latamber</option>
    <option value="Madyan">Madyan</option>
    <option value="Mansehra">Mansehra</option>
    <option value="Mardan">Mardan</option>
    <option value="Mastuj">Mastuj</option>
    <option value="Mingora">Mingora</option>
    <option value="Nowshera">Nowshera</option>
    <option value="Paharpur">Paharpur</option>
    <option value="Pabbi">Pabbi</option>
    <option value="Peshawar">Peshawar</option>
    <option value="Saidu Sharif">Saidu Sharif</option>
    <option value="Shorkot">Shorkot</option>
    <option value="Shewa Adda">Shewa Adda</option>
    <option value="Swabi">Swabi</option>
    <option value="Swat">Swat</option>
    <option value="Tangi">Tangi</option>
    <option value="Tank">Tank</option>
    <option value="Thall">Thall</option>
    <option value="Timergara">Timergara</option>
    <option value="Tordher">Tordher</option>
    <option value="" disabled>Balochistan Cities</option>
    <option value="Awaran">Awaran</option>
    <option value="Barkhan">Barkhan</option>
    <option value="Chagai">Chagai</option>
    <option value="Dera Bugti">Dera Bugti</option>
    <option value="Gwadar">Gwadar</option>
    <option value="Harnai">Harnai</option>
    <option value="Jafarabad">Jafarabad</option>
    <option value="Jhal Magsi">Jhal Magsi</option>
    <option value="Kacchi">Kacchi</option>
    <option value="Kalat">Kalat</option>
    <option value="Kech">Kech</option>
    <option value="Kharan">Kharan</option>
    <option value="Khuzdar">Khuzdar</option>
    <option value="Killa Abdullah">Killa Abdullah</option>
    <option value="Killa Saifullah">Killa Saifullah</option>
    <option value="Kohlu">Kohlu</option>
    <option value="Lasbela">Lasbela</option>
    <option value="Lehri">Lehri</option>
    <option value="Loralai">Loralai</option>
    <option value="Mastung">Mastung</option>
    <option value="Musakhel">Musakhel</option>
    <option value="Nasirabad">Nasirabad</option>
    <option value="Nushki">Nushki</option>
    <option value="Panjgur">Panjgur</option>
    <option value="Pishin Valley">Pishin Valley</option>
    <option value="Quetta">Quetta</option>
    <option value="Sherani">Sherani</option>
    <option value="Sibi">Sibi</option>
    <option value="Sohbatpur">Sohbatpur</option>
    <option value="Washuk">Washuk</option>
    <option value="Zhob">Zhob</option>
    <option value="Ziarat">Ziarat</option>
                    </select>
                  </div>
                  <div class="form-group select-border col-md-4">
                    <select class="form-control basic-select"  name="state" id="state">
                      <option selected value="<?php echo $se_state ?>"><?php echo $se_state ?></option>
                      <option value="AL">New york</option>
                      <option value="AK">California</option>
                      <option value="AZ">Illinois</option>
                      <option value="AR">Maharashtra</option>
                      <option value="AR">Delhi</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="zip" id="zip" value="<?php echo $se_zip ?>" placeholder="Zip">
                  </div>

					
					
					<?php }else{ ?>
					
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="fname" id="first-name" placeholder="First Name">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="lname" id="last-name" placeholder="Last Name">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number">
                  </div>
                  <div class="form-group col-lg-12">
                    <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                  </div>
                  <div class="form-group select-border col-md-4 ">
                    <select class="form-control basic-select" name="city" id="city">
                      <option value="" disabled selected>Select The City</option>
    <option value="Islamabad">Islamabad</option>
    <option value="" disabled>Punjab Cities</option>
    <option value="Ahmed Nager Chatha">Ahmed Nager Chatha</option>
    <option value="Ahmadpur East">Ahmadpur East</option>
    <option value="Ali Khan Abad">Ali Khan Abad</option>
    <option value="Alipur">Alipur</option>
    <option value="Arifwala">Arifwala</option>
    <option value="Attock">Attock</option>
    <option value="Bhera">Bhera</option>
    <option value="Bhalwal">Bhalwal</option>
    <option value="Bahawalnagar">Bahawalnagar</option>
    <option value="Bahawalpur">Bahawalpur</option>
    <option value="Bhakkar">Bhakkar</option>
    <option value="Burewala">Burewala</option>
    <option value="Chillianwala">Chillianwala</option>
    <option value="Chakwal">Chakwal</option>
    <option value="Chichawatni">Chichawatni</option>
    <option value="Chiniot">Chiniot</option>
    <option value="Chishtian">Chishtian</option>
    <option value="Daska">Daska</option>
    <option value="Darya Khan">Darya Khan</option>
    <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
    <option value="Dhaular">Dhaular</option>
    <option value="Dina">Dina</option>
    <option value="Dinga">Dinga</option>
    <option value="Dipalpur">Dipalpur</option>
    <option value="Faisalabad">Faisalabad</option>
    <option value="Ferozewala">Ferozewala</option>
    <option value="Fateh Jhang">Fateh Jang</option>
    <option value="Ghakhar Mandi">Ghakhar Mandi</option>
    <option value="Gojra">Gojra</option>
    <option value="Gujranwala">Gujranwala</option>
    <option value="Gujrat">Gujrat</option>
    <option value="Gujar Khan">Gujar Khan</option>
    <option value="Hafizabad">Hafizabad</option>
    <option value="Haroonabad">Haroonabad</option>
    <option value="Hasilpur">Hasilpur</option>
    <option value="Haveli Lakha">Haveli Lakha</option>
    <option value="Jatoi">Jatoi</option>
    <option value="Jalalpur">Jalalpur</option>
    <option value="Jattan">Jattan</option>
    <option value="Jampur">Jampur</option>
    <option value="Jaranwala">Jaranwala</option>
    <option value="Jhang">Jhang</option>
    <option value="Jhelum">Jhelum</option>
    <option value="Kalabagh">Kalabagh</option>
    <option value="Karor Lal Esan">Karor Lal Esan</option>
    <option value="Kasur">Kasur</option>
    <option value="Kamalia">Kamalia</option>
    <option value="Kamoke">Kamoke</option>
    <option value="Khanewal">Khanewal</option>
    <option value="Khanpur">Khanpur</option>
    <option value="Kharian">Kharian</option>
    <option value="Khushab">Khushab</option>
    <option value="Kot Addu">Kot Addu</option>
    <option value="Jauharabad">Jauharabad</option>
    <option value="Lahore">Lahore</option>
    <option value="Lalamusa">Lalamusa</option>
    <option value="Layyah">Layyah</option>
    <option value="Liaquat Pur">Liaquat Pur</option>
    <option value="Lodhran">Lodhran</option>
    <option value="Malakwal">Malakwal</option>
    <option value="Mamoori">Mamoori</option>
    <option value="Mailsi">Mailsi</option>
    <option value="Mandi Bahauddin">Mandi Bahauddin</option>
    <option value="Mian Channu">Mian Channu</option>
    <option value="Mianwali">Mianwali</option>
    <option value="Multan">Multan</option>
    <option value="Murree">Murree</option>
    <option value="Muridke">Muridke</option>
    <option value="Mianwali Bangla">Mianwali Bangla</option>
    <option value="Muzaffargarh">Muzaffargarh</option>
    <option value="Narowal">Narowal</option>
    <option value="Nankana Sahib">Nankana Sahib</option>
    <option value="Okara">Okara</option>
    <option value="Renala Khurd">Renala Khurd</option>
    <option value="Pakpattan">Pakpattan</option>
    <option value="Pattoki">Pattoki</option>
    <option value="Pir Mahal">Pir Mahal</option>
    <option value="Qaimpur">Qaimpur</option>
    <option value="Qila Didar Singh">Qila Didar Singh</option>
    <option value="Rabwah">Rabwah</option>
    <option value="Raiwind">Raiwind</option>
    <option value="Rajanpur">Rajanpur</option>
    <option value="Rahim Yar Khan">Rahim Yar Khan</option>
    <option value="Rawalpindi">Rawalpindi</option>
    <option value="Sadiqabad">Sadiqabad</option>
    <option value="Safdarabad">Safdarabad</option>
    <option value="Sahiwal">Sahiwal</option>
    <option value="Sangla Hill">Sangla Hill</option>
    <option value="Sarai Alamgir">Sarai Alamgir</option>
    <option value="Sargodha">Sargodha</option>
    <option value="Shakargarh">Shakargarh</option>
    <option value="Sheikhupura">Sheikhupura</option>
    <option value="Sialkot">Sialkot</option>
    <option value="Sohawa">Sohawa</option>
    <option value="Soianwala">Soianwala</option>
    <option value="Siranwali">Siranwali</option>
    <option value="Talagang">Talagang</option>
    <option value="Taxila">Taxila</option>
    <option value="Toba Tek Singh">Toba Tek Singh</option>
    <option value="Vehari">Vehari</option>
    <option value="Wah Cantonment">Wah Cantonment</option>
    <option value="Wazirabad">Wazirabad</option>
    <option value="" disabled>Sindh Cities</option>
    <option value="Badin">Badin</option>
    <option value="Bhirkan">Bhirkan</option>
    <option value="Rajo Khanani">Rajo Khanani</option>
    <option value="Chak">Chak</option>
    <option value="Dadu">Dadu</option>
    <option value="Digri">Digri</option>
    <option value="Diplo">Diplo</option>
    <option value="Dokri">Dokri</option>
    <option value="Ghotki">Ghotki</option>
    <option value="Haala">Haala</option>
    <option value="Hyderabad">Hyderabad</option>
    <option value="Islamkot">Islamkot</option>
    <option value="Jacobabad">Jacobabad</option>
    <option value="Jamshoro">Jamshoro</option>
    <option value="Jungshahi">Jungshahi</option>
    <option value="Kandhkot">Kandhkot</option>
    <option value="Kandiaro">Kandiaro</option>
    <option value="Karachi">Karachi</option>
    <option value="Kashmore">Kashmore</option>
    <option value="Keti Bandar">Keti Bandar</option>
    <option value="Khairpur">Khairpur</option>
    <option value="Kotri">Kotri</option>
    <option value="Larkana">Larkana</option>
    <option value="Matiari">Matiari</option>
    <option value="Mehar">Mehar</option>
    <option value="Mirpur Khas">Mirpur Khas</option>
    <option value="Mithani">Mithani</option>
    <option value="Mithi">Mithi</option>
    <option value="Mehrabpur">Mehrabpur</option>
    <option value="Moro">Moro</option>
    <option value="Nagarparkar">Nagarparkar</option>
    <option value="Naudero">Naudero</option>
    <option value="Naushahro Feroze">Naushahro Feroze</option>
    <option value="Naushara">Naushara</option>
    <option value="Nawabshah">Nawabshah</option>
    <option value="Nazimabad">Nazimabad</option>
    <option value="Qambar">Qambar</option>
    <option value="Qasimabad">Qasimabad</option>
    <option value="Ranipur">Ranipur</option>
    <option value="Ratodero">Ratodero</option>
    <option value="Rohri">Rohri</option>
    <option value="Sakrand">Sakrand</option>
    <option value="Sanghar">Sanghar</option>
    <option value="Shahbandar">Shahbandar</option>
    <option value="Shahdadkot">Shahdadkot</option>
    <option value="Shahdadpur">Shahdadpur</option>
    <option value="Shahpur Chakar">Shahpur Chakar</option>
    <option value="Shikarpaur">Shikarpaur</option>
    <option value="Sukkur">Sukkur</option>
    <option value="Tangwani">Tangwani</option>
    <option value="Tando Adam Khan">Tando Adam Khan</option>
    <option value="Tando Allahyar">Tando Allahyar</option>
    <option value="Tando Muhammad Khan">Tando Muhammad Khan</option>
    <option value="Thatta">Thatta</option>
    <option value="Umerkot">Umerkot</option>
    <option value="Warah">Warah</option>
    <option value="" disabled>Khyber Cities</option>
    <option value="Abbottabad">Abbottabad</option>
    <option value="Adezai">Adezai</option>
    <option value="Alpuri">Alpuri</option>
    <option value="Akora Khattak">Akora Khattak</option>
    <option value="Ayubia">Ayubia</option>
    <option value="Banda Daud Shah">Banda Daud Shah</option>
    <option value="Bannu">Bannu</option>
    <option value="Batkhela">Batkhela</option>
    <option value="Battagram">Battagram</option>
    <option value="Birote">Birote</option>
    <option value="Chakdara">Chakdara</option>
    <option value="Charsadda">Charsadda</option>
    <option value="Chitral">Chitral</option>
    <option value="Daggar">Daggar</option>
    <option value="Dargai">Dargai</option>
    <option value="Darya Khan">Darya Khan</option>
    <option value="Dera Ismail Khan">Dera Ismail Khan</option>
    <option value="Doaba">Doaba</option>
    <option value="Dir">Dir</option>
    <option value="Drosh">Drosh</option>
    <option value="Hangu">Hangu</option>
    <option value="Haripur">Haripur</option>
    <option value="Karak">Karak</option>
    <option value="Kohat">Kohat</option>
    <option value="Kulachi">Kulachi</option>
    <option value="Lakki Marwat">Lakki Marwat</option>
    <option value="Latamber">Latamber</option>
    <option value="Madyan">Madyan</option>
    <option value="Mansehra">Mansehra</option>
    <option value="Mardan">Mardan</option>
    <option value="Mastuj">Mastuj</option>
    <option value="Mingora">Mingora</option>
    <option value="Nowshera">Nowshera</option>
    <option value="Paharpur">Paharpur</option>
    <option value="Pabbi">Pabbi</option>
    <option value="Peshawar">Peshawar</option>
    <option value="Saidu Sharif">Saidu Sharif</option>
    <option value="Shorkot">Shorkot</option>
    <option value="Shewa Adda">Shewa Adda</option>
    <option value="Swabi">Swabi</option>
    <option value="Swat">Swat</option>
    <option value="Tangi">Tangi</option>
    <option value="Tank">Tank</option>
    <option value="Thall">Thall</option>
    <option value="Timergara">Timergara</option>
    <option value="Tordher">Tordher</option>
    <option value="" disabled>Balochistan Cities</option>
    <option value="Awaran">Awaran</option>
    <option value="Barkhan">Barkhan</option>
    <option value="Chagai">Chagai</option>
    <option value="Dera Bugti">Dera Bugti</option>
    <option value="Gwadar">Gwadar</option>
    <option value="Harnai">Harnai</option>
    <option value="Jafarabad">Jafarabad</option>
    <option value="Jhal Magsi">Jhal Magsi</option>
    <option value="Kacchi">Kacchi</option>
    <option value="Kalat">Kalat</option>
    <option value="Kech">Kech</option>
    <option value="Kharan">Kharan</option>
    <option value="Khuzdar">Khuzdar</option>
    <option value="Killa Abdullah">Killa Abdullah</option>
    <option value="Killa Saifullah">Killa Saifullah</option>
    <option value="Kohlu">Kohlu</option>
    <option value="Lasbela">Lasbela</option>
    <option value="Lehri">Lehri</option>
    <option value="Loralai">Loralai</option>
    <option value="Mastung">Mastung</option>
    <option value="Musakhel">Musakhel</option>
    <option value="Nasirabad">Nasirabad</option>
    <option value="Nushki">Nushki</option>
    <option value="Panjgur">Panjgur</option>
    <option value="Pishin Valley">Pishin Valley</option>
    <option value="Quetta">Quetta</option>
    <option value="Sherani">Sherani</option>
    <option value="Sibi">Sibi</option>
    <option value="Sohbatpur">Sohbatpur</option>
    <option value="Washuk">Washuk</option>
    <option value="Zhob">Zhob</option>
    <option value="Ziarat">Ziarat</option>
                    </select>
                  </div>
                  <div class="form-group select-border col-md-4">
                    <select class="form-control basic-select" name="state" id="state">
                      <option value="State">State</option>
                      <option value="AL">New york</option>
                      <option value="AK">California</option>
                      <option value="AZ">Illinois</option>
                      <option value="AR">Maharashtra</option>
                      <option value="AR">Delhi</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="zip" id="zip" placeholder="Zip">
					</div>
					<?php } ?>
                  <div class="form-group col-md-6 datetimepickers">
                    <label class="text-dark">Required Date</label>
                    <div class="input-group date" id="datetimepicker-01" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" name="apdate" placeholder="Date" data-target="#datetimepicker-01">
                      <div class="input-group-append" data-target="#datetimepicker-01" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group select-border col-md-6">
                    <label class="text-dark">Select Time</label>
                    <div class="input-group date" id="datetimepicker-03" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" name="aptime" placeholder="Time" data-target="#datetimepicker-03"/>
                      <div class="input-group-append" data-target="#datetimepicker-03" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-clock"></i></div>
						 
                      </div>
                    </div>
                  </div>
					 <input type="hidden" name="doctor_id" value="<?php echo $view['id']; ?>" />
					<?php if(isset($_SESSION['EmailUser'])){ ?>
					
						  <input type="hidden" name="user_id" value="<?php echo $se_id ?>" />
					<?php }else{ ?>
					
					
						  <input type="hidden" name="user_id" value="No User" />
					
					
					<?php } ?>
                  <div class="form-group col-sm-12">
                    <button type="submit" name="addopp" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-5 col-md-6 text-md-left text-center mt-md-0 mt-5">
            <img class="img-fluid" src="images/about/04.png" alt="">
          </div>
        </div>
      </div>
    </section>
    <!--=================================
    Quick contact -->

   <!--=================================
    Testimonial -->
    <section class="mb-lg-7 pb-lg-0">
      <div class="container" style="background-image: url(images/pattern.png);">
        <div class="row align-items-center">
          <div class="col-lg-12">
            <!-- Owl-carousel -->
            <div class="owl-carousel testimonial" data-nav-arrow="false" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0" data-autoheight="true" style="background-image: url(images/pattern.png);">
              <!-- Testimonial-01 START -->
				<?php $fun->Feedback_View(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=================================
    Testimonial -->



    
<!--=================================
    Quick contact -->
    <section class="space-pt mb-lg-7 pb-lg-0">
      <div class="container">
        <div class="row align-items-center">
           <div class="col-lg-12">
            <div class="appointment-form">
				
              <h4 class="text-primary">Post Your Feedback About This Doctor!</h4>
				<?php if(!isset($_SESSION['EmailUser'])){ ?>
				<p class="text-danger ">Please For Posting Feedback <b><a href="Sign-In"><i class="fa fa-arrow-alt-circle-right"></i>Login Here</a></b></p>
					<?php } ?>
              <form class="mt-5" method="post">
                <div class="row align-items-center">
					<?php if(isset($_SESSION['EmailUser'])){ ?>
					<div class="form-group col-lg-12">
					  
					  <input type="text" readonly required class="form-control" name="name" id="feedback"  placeholder="<?php echo $se_firstname." ".$se_lastname ?>" />
                   
                  </div>
					<?php } ?>
					
                  <div class="form-group col-lg-12">
					  <p class="text-danger"><?php $fun->Feedback(); ?></p>
					  <textarea type="text" style="height: 200px;" required class="form-control" name="feedback" id="feedback" placeholder="Enter Your feedback here" ></textarea>
                   
                  </div>
                  
			         <div class="form-group col-sm-12">
					  	<?php if(!isset($_SESSION['EmailUser'])){ ?>
					  <a href="Sign-In" class="btn btn-primary">
                    Please Login First
						  </a>
					  <?php }else { ?>
						  <input type="hidden" name="doctor_id" value="<?php echo $view['id']; ?>" />
						  <input type="hidden" name="user_id" value="<?php echo $se_id ?>" />

                    <button type="submit" name="addfeed"  class="btn btn-primary">Submit</button>
					  <?php } ?>
                  </div>
                </div>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </section>
    <!--=================================
    Quick contact -->






<?php }else { ?>

    <!--=================================
    Doctors -->
    <section class="space-ptb">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-8 col-md-10 text-center">
            <div class="section-title center-divider mb-5">
              <span class="text-primary">Why choose people like Medleaf</span>
              <h2 class="text-dark">Our Equipped Team Is Able To Support You!</h2>
            </div>
          </div>
        </div>
        <div class="row">
			
          <!-- Doctor START -->
          <?php $fun->View_Doctors_Specialities(); ?>
          <!-- Doctor END -->

        </div>
      </div>
    </section>
    <!--=================================
    Team -->





<?php } require_once "footer.php"; ?>