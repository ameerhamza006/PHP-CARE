<?php require_once "header.php"; ?>


<section class="banner banner-02 ">
<label></label>
</section>

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

<?php if(isset($_GET['News'])){ 
	
	$get = $_GET['News'];
	
	// echo stripslashes("hello\ameer");

  $get_name = str_replace("-"," ",$get);

   

 $news = $crud->Update_get_by_id('users.firstname,users.lastname,blog.id,blog.title,blog.bio,blog.image,blog.date','users'," INNER JOIN blog ON users.id = blog.user_id where blog.title = '$get_name' ");
	
	//for Recent post
	$post = $crud->View('*','blog','',' ORDER BY id DESC LIMIT 4')

	
?>

    <!--=================================
    Blog detail-->
    <section class="space-ptb">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <!-- blog-detail -->
            <div class="blog-detail">
              <!-- blog-post -->
              <div class="blog-post pb-4">
                <div class="blog-post-image mb-4">
                  <img class="img-fluid" src="News/<?php echo $news['image']; ?>" alt="" style="height: 500px;">
                </div>
                <div class="blog-post-content py-0">
                  <div class="blog-post-details">
                    <h6 class="blog-post-title"><a href="blog-detail.html"><?php echo $news['title']; ?></a></h6>
                    <div class="blog-post-meta">
                      <div class="blog-post-author">
                        <span> By <a href="#">&nbsp;<b><?php echo $news['firstname']." ".$news['lastname']; ?></b></a></span>
                      </div>
                      <div class="blog-post-time">
                        <a href="#"><i class="far fa-clock text-primary"></i><?php echo substr($news['date'],0,10); ?></a>
                      </div>
                    </div>
                    <div class="blog-post-description">
                      <p><?php echo $news['bio']; ?></p>
                      
                    </div>
                    <blockquote class="blockquote bg-light mb-5">
                      <div class="blockquote-content">
                        <div class="blockquote-quote"><i class="flaticon-left-quote"></i></div>
                        <p>This is the first step of the process! Key: Notice how you felt excited and optimistic when you did this? The reason is simple. It’s the life you are designing instead of the one that was given you and that you have lived with less intention and purpose to date.</p>
                        <div class="blockquote-author">
                          <div class="blockquote-name">
                            <h6>Harry Russell</h6>
                            <span class="text-muted">- Vice President</span>
                          </div>
                        </div>
                      </div>
                    </blockquote>
                    <div class="blog-post-list mb-5">
                      <ul class="list-unstyled">
                        <li class="mb-3 d-flex"><i class="far fa-plus-square pr-2 text-primary mt-1"></i>For those of you who are serious about having more.</li>
                        <li class="mb-3 d-flex"><i class="far fa-plus-square pr-2 text-primary mt-1"></i>There are a million distractions in every facet of our lives.</li>
                        <li class="mb-3 d-flex"><i class="far fa-plus-square pr-2 text-primary mt-1"></i>The sad thing is the majority of people have no clue about what they truly want.</li>
                        <li class="mb-3 d-flex"><i class="far fa-plus-square pr-2 text-primary mt-1"></i>Once you have a clear understanding of what you want</li>
                        <li class="mb-3 d-flex"><i class="far fa-plus-square pr-2 text-primary mt-1"></i>Focus is having the unwavering attention to complete what you set out to do.</li>
                      </ul>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="blog-post-info">
                          <div class="blog-post-like"><a href="#"><i class="far fa-heart"></i>25</a></div>
                          <div class="blog-post-view"><a href="#"><i class="far fa-eye"></i>34</a></div>
                          <div class="blog-post-comment"><a href="#"><i class="far fa-comments"></i>43</a></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <!-- Social -->
                        <div class="blog-post-social justify-content-sm-end">
                          <span>Share this post :</span>
                          <ul class="list-unstyled">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                          </ul>
                        </div>
                        <!-- Social -->
                      </div>
                    </div>

                  </div>
                </div>
                <div class="blog-post-navigation mb-5">
                  <nav class="navigation post-navigation">
                    <div class="nav-link">
                      <div class="nav-previous">
                        <a href="#">
                          <i class="fas fa-chevron-left"></i>
                          <span class="pagi-text">Previous Post</span>
                          <span class="nav-title">Making a decision to do...</span>
                        </a>
                      </div>
                      <div class="nav-next">
                         <a href="#">
                          <i class="fas fa-chevron-right"></i>
                          <span class="pagi-text">Next Post</span>
                          <span class="nav-title">For those of you who are...</span>
                        </a>
                      </div>
                    </div>
                  </nav>
                </div>
              </div>
              <!-- blog-post -->

              <!-- Related Post -->
              <div class="row mt-4 mt-md-5">
                <div class="col-md-12">
                  <h3>Related Post</h3>
                  <!-- Owl-carousel -->
                  <div class="owl-carousel blog-post-carousel" data-nav-dots="true" data-nav-arrow="false" data-items="2" data-md-items="2" data-sm-items="2" data-xs-items="2" data-xx-items="1" data-space="30" data-autoheight="true">
					  <?php foreach($post as $p){ 
              
              
               $title = str_replace(' ','-',$p['title']); 

              ?>
                      <div class="item">
                        <!-- Blog-01 START -->
                        <div class="blog-post blog-post-01">
                          <div class="blog-post-image mb-4">
                            <img class="img-fluid" src="News/<?php echo $p['image']; ?>" alt="">
                          </div>
                          <div class="blog-post-content py-0">
                            <div class="blog-post-details">
                              <h6 class="blog-post-title"><a href="Latest-News?News=<?php echo $title ?>"><?php echo substr($p['title'],0,30); ?>..</a></h6>
                              <div class="blog-post-meta">
                                
                                <div class="blog-post-time">
                                  <a href="#"><i class="far fa-clock text-primary"></i><?php echo substr($p['date'],0,10); ?></a>
                                </div>
                              </div>
                              <div class="blog-post-description">
                                <p><?php echo substr($p['bio'],0,97); ?>..</p>
                                <a href="Latest-News?News=<?php echo $title ?>" class="btn btn-link mb-2">Read More</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Blog-01 END -->
                      <?php } ?>

                    
                  </div>
                  <!-- Owl-carousel -->
                </div>
              </div>
              <!-- Related Post -->

              <!-- Comments -->
              <div class="row mt-4 mt-md-5">
                <div class="col-12">
                  <!-- Comments-01 START -->
                  <div class="comments-01">
                    <div class="comment-author">
                      <img src="images/avatar/09.jpg" alt="">
                    </div>
                    <div class="comment-content">
                      <div class="reviews">
                        <p class="meta">
                          <strong>Michael Bean </strong>October 8, 2020
                        </p>
                        <a class="port-social" href="#"><i class="fas fa-reply pr-2"></i>Reply</a>
                      </div>
                      <p>The best way is to develop and follow a plan. Start with your goals in mind and then work backwards to develop the plan. What steps are required to get you to the goals? Make the plan as detailed as possible. Try to visualize and then plan for, every possible setback. Commit the plan to paper and then keep it with you at all times.</p>
                    </div>
                  </div>
                  <!-- Comments-01 END -->

                  <!-- Comments-02 START -->
                  <div class="comments-02">
                    <div class="comment-author">
                      <img src="images/avatar/05.jpg" alt="">
                    </div>
                    <div class="comment-content">
                      <div class="reviews">
                        <p class="meta">
                          <strong>Anne Smith </strong>October 8, 2020
                        </p>
                        <a class="port-social" href="#"><i class="fas fa-reply pr-2"></i>Reply</a>
                      </div>
                      <p>Review it regularly and ensure that every step takes you closer to your Vision and Goals.</p>
                    </div>
                  </div>
                  <!-- Comments-02 END -->

                  <!-- Comments-03 START -->
                  <div class="comments-02">
                    <div class="comment-author">
                      <img src="images/avatar/05.jpg" alt="">
                    </div>
                    <div class="comment-content">
                      <div class="reviews">
                        <p class="meta">
                          <strong>Anne Smith </strong>October 8, 2020
                        </p>
                        <a class="port-social" href="#"><i class="fas fa-reply pr-2"></i>Reply</a>
                      </div>
                      <p>Along with your plans, you should consider developing an action orientation that will keep you motivated to move forward at all times.</p>
                    </div>
                  </div>
                  <!-- Comments-03 END -->

                  <!-- Comments-04 START -->
                  <div class="comments-01">
                    <div class="comment-author">
                      <img src="images/avatar/09.jpg" alt="">
                    </div>
                    <div class="comment-content">
                      <div class="reviews">
                        <p class="meta">
                          <strong>Michael Bean </strong>October 8, 2020
                        </p>
                        <a class="port-social" href="#"><i class="fas fa-reply pr-2"></i>Reply</a>
                      </div>
                      <p>This requires a little self-discipline, but is a crucial component to achievement of any kind. Before starting any new activity, ask yourself if that activity will move you closer to your goals.</p>
                    </div>
                  </div>
                  <!-- Comments-04 END -->
                  <div class="leave-reply-form mt-4 mt-md-5">
                    <div class="mb-4 mb-md-5">
                      <h4>Leave a reply</h4>
                    </div>
                    <!-- form -->
                    <form class="form-row mt-4 align-items-center">
                      <div class="form-group col-sm-6">
                        <input type="text" class="form-control" placeholder="Website URL">
                      </div>
                      <div class="form-group col-sm-6">
                        <input type="email" class="form-control" placeholder="Your Name">
                      </div>
                      <div class="form-group col-sm-6">
                        <input type="text" class="form-control" placeholder="Email">
                      </div>
                      <div class="form-group col-sm-6">
                        <input type="email" class="form-control" placeholder="Phone Number">
                      </div>
                      <div class="form-group col-sm-12">
                        <div class="form-group">
                          <textarea class="form-control" rows="5" id="comment" placeholder="Message"></textarea>
                        </div>
                      </div>
                      <a class="btn btn-outline-primary" href="#"> Submit </a>
                    </form>
                    <!-- form -->
                  </div>
                </div>
              </div>
              <!-- Comments -->
            </div>
            <!-- blog-detail -->
          </div>

          <div class="col-lg-4 mt-lg-0 mt-5">
            <!-- blog-sidebar -->
            <div class="sidebar">
              <!-- search -->
              <div class="widget">
                <div class="search">
                  <i class="fas fa-search"></i>
                  <input type="text" class="form-control" placeholder="Search">
                </div>
              </div>
              <!-- search -->

              <!-- Recent Post -->
              <div class="widget">
                <div class="widget-title">
                  <h4>Recent Post</h4>
                </div>
                <!-- Recent-Post-01 START -->
				  <?php foreach($post as $value){ 
            
            $title = str_replace(' ','-',$value['title']);
            
            ?>
                <div class="d-flex mb-4 align-items-start">
                  <div class="avatar avatar-md">
                    <img class="img-fluid " src="News/<?php echo $value['image']; ?>" alt="" style="height: 60px;">
                  </div>
                  <div class="ml-3 recent-posts">
                    <a href="Latest-News?News=<?php echo $title ?>"><b><?php echo $value['title']; ?></b></a>
                    <a class="d-block date" href="#"><i class="far fa-clock text-primary pr-2"></i><?php echo substr($value['date'],0,10); ?></a>
                  </div>
                </div>
				  <?php } ?>
                <!-- Recent-Post-01 END -->

              </div>
              <!-- Recent Post -->

              <!-- Categories -->
              <div class="widget">
                <div class="widget-title">
                  <h4>Categories</h4>
                </div>
                <div class="widget-categories">
                  <ul class="list-unstyled list-style list-style-underline mb-0">
                    <li><a href="#">Finance</a></li>
                    <li><a href="#">Marketing</a></li>
                    <li><a href="#">Operations</a></li>
                    <li><a href="#">Strategy</a></li>
                    <li><a href="#">People</a></li>
                    <li><a href="#">Jobs</a></li>
                    <li><a href="#">Marketing</a></li>
                  </ul>
                </div>
              </div>
              <!-- Categories -->

              <!-- Contact Info -->
              <div class="widget">
                <div class="widget-title">
                  <h4>Contact Info</h4>
                </div>
                <div class="widget-contact-info">
                  <ul class="list-unstyled list-style mb-0">
                    <li><i class="fas fa-map-marker-alt text-primary"></i><span>Fairground St. North Bergen, NJ</span></li>
                    <li><i class="fas fa-phone-alt text-primary"></i><span>+91 123 456 7890</span></li>
                    <li><i class="fas fa-envelope-open-text text-primary"></i><span>test123@test.com</span></li>
                  </ul>
                </div>
              </div>
              <!-- Contact Info -->

              <!-- Follow on -->
              <div class="widget">
                <div class="widget-title">
                  <h4>Follow on</h4>
                </div>
                <div class="widget-follow">
                  <ul class="list-unstyled">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                  </ul>
                </div>
              </div>
              <!-- Follow on -->

            </div>
            <!-- blog-sidebar -->
          </div>
        </div>
      </div>
    </section>
    <!--=================================
    Blog-detail->





<?php }else { ?>
<!--=================================
    Blog-->
    <section class="space-ptb">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="section-title center-divider text-center">
              <span>Check out our</span>
              <h2>Latest news & blogs</h2>
              <p class="mb-0">Meanwhile, the man who bought that farm found a large and “interesting looking” stone in a stream that ran through the property.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Blog-01 START -->
          <?php $fun->News(''); ?>
          <!-- Blog-01 END -->

          
        </div>

        <!-- Pagination -->
        <div class="row">
          <div class="col-12 text-center mt-2 mt-md-4 mt-lg-5">
            <ul class="pagination justify-content-center mb-0">
              <li class="page-item"> <span class="page-link b-radius-none">Previous</span> </li>
              <li class="page-item active" aria-current="page"><span class="page-link active">1 </span> <span class="sr-only">(current)</span></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"> <a class="page-link" href="#">Next</a> </li>
            </ul>
          </div>
        </div>
        <!-- Pagination -->

      </div>
    </section>
    <!--=================================
    Blog-->

<?php } require_once "footer.php"; ?>