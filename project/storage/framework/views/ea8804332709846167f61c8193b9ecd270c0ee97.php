<?php $__env->startSection('styles'); ?>
<style type="text/css">
    /* Hide the list on focus of the input field */
datalist {
    display: none;
}
/* specifically hide the arrow on focus */
input::-webkit-calendar-picker-indicator {
    display: none;
}

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
       <div class="hero-area overlay" style="background-image: url(<?php echo e(asset('assets/images/'.$gs->bgimg)); ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-lg-push-6 col-md-6 col-md-push-6 col-sm-6 col-sm-push-6 col-xs-12 col-xs-push-0">
                        <div class="hero-form">
                            <div class="hero-form-header">
                                <h3><?php echo e($lang->ss); ?></h3>
                                <hr>
                            </div>
                            <div class="hero-form-wrapper">
                                <form action="<?php echo e(route('user.search')); ?>" method="GET">

                                    <div class="form-group">
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                              <i class="fa fa-fw fa-home"></i>
                                          </div>
 
                                         <input list="cities" type="search" name="search" id="country" class="form-control" placeholder="<?php echo e($lang->ec); ?>" required=""
                                         style="">

                                        <datalist id="cities">
                                    <?php if($cities != null): ?>
                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($city); ?>">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                        </datalist> 
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                              <i class="fa fa-fw fa-cog"></i>
                                          </div>
                                          <select name="group" id="blood_grp" class="form-control" required>
                                              <option value=""><?php echo e($lang->sbg); ?></option>
                                            <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->cat_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group text-center">
                                            <input type="submit" class="btn btn-block hero-btn" name="button" value="<?php echo e($lang->search); ?>">
                                      </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-lg-pull-6 col-md-6 col-md-pull-6 col-sm-6 col-sm-pull-6 col-xs-12 col-xs-pull-0">
                        <h1><?php echo e($gs->bg_title); ?></h1>
                        <p><?php echo e($gs->bg_text); ?></p>
                        <a href="<?php echo e($gs->bg_link); ?>" class="hero-btn"><?php echo e($lang->vd); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ending of Hero area -->


        <!-- Starting of All - sectors area -->
        <div class="section-padding all-sectors-wrap wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title pb_50 text-center">
                            <h2><?php echo e($lang->bgs); ?></h2>

                            <div class="section-borders">
                                <span></span>
                                <span class="black-border"></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                        <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<style type="text/css">
                                .single-campaignCategories-area span img{
                                    background-color: <?php echo e($cat->colors); ?>;
                                    padding: 30px;
                                    border-radius: 50%;
                                    display: block;
                                }
                                .single-campaignCategories-area span img:hover{
                                    border:5px solid #fff;
                                    transition: border 1s;
                                }

							
							
							
							
							
							
							</style>
                    <div class="col-md-3 col-sm-4 col-xs-6">
                        <a href="<?php echo e(route('front.types',$cat->cat_slug)); ?>">
                            <div class="single-campaignCategories-area change<?php echo e($cat->id); ?> text-center">
                            <span><img src="<?php echo e(asset('assets/images/'.$cat->photo)); ?>" alt="Category"></span>
                            <h4><?php echo e($cat->cat_name); ?></h4>
                        </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                </div>
            </div>
        </div>
        <!-- Ending of All - sectors area -->

        <!-- Starting of Team area -->
        <section class="section-padding team_section team_style2 wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title pb_50 text-center">
                            <h2><?php echo e($lang->rds); ?></h2>

                            <div class="section-borders">
                                <span></span>
                                <span class="black-border"></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php $__currentLoopData = $rusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ruser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="team_common">
                            <div class="member_img img-responsive">
                                <a href="<?php echo e(route('front.user',$ruser->id)); ?>"><img src="<?php echo e($ruser->photo ? asset('assets/images/'.$ruser->photo):'http://fulldubai.com/SiteImages/noimage.png'); ?>" alt="member image"></a>
                            </div>
                            <div class="member_info text-center pos_relative">
                                <div class="overlay1"></div>
                                <div class="overlay2"></div>
                                <div class="content">
                                    <a href="<?php echo e(route('front.user',$ruser->id)); ?>" class="d_inline fw_600"><?php echo e($ruser->name); ?></a>
                                    <span class="d_block transition_3s"><?php echo e($lang->bg); ?> <?php echo e($ruser->category->cat_name); ?></span>
                                    <ul class="social_contact pt_10" style="padding-left: 0px;">
                                        <?php if($ruser->f_url != null): ?>
                                    	<?php 
                                    		$url = parse_url('https://example.org');
											if($url['scheme'] == 'https'){
											   // is https;
											}
                                    	 ?>
                                        <li>
                                        <a href="<?php echo e($ruser->f_url ? $ruser->f_url:'https://www.facebook.com/'); ?>" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if($ruser->t_url != null): ?>
                                        <li>
                                        <a href="<?php echo e($ruser->t_url ? $ruser->t_url:'https://twitter.com/'); ?>" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if($ruser->l_url != null): ?>
                                        <li>
                                        <a href="<?php echo e($ruser->l_url ? $ruser->l_url:'https://www.linkedin.com/'); ?>" title="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if($ruser->g_url != null): ?>
                                        <li>
                                        <a href="<?php echo e($ruser->g_url ? $ruser->g_url:'https://www.instagram.com/'); ?>" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <!--member-2-->

                </div>
                <div class="text-center">
                    <a href="<?php echo e(route('front.featured')); ?>" class="boxed-btn blog"><?php echo e($lang->vdn); ?></a>
                </div>
            </div>
        </section>
        <!-- Ending of Team area -->
    
        <!-- Starting of Testimonial Area -->
        <div class="section-padding testimonial-wrapper mb_50 overlay" style="background-image: url(<?php echo e(asset('assets/images/'.$gs->bgimg)); ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title pb_50 text-center">
                            <h2><?php echo e($lang->hcs); ?></h2>

                            <div class="section-borders">
                                <span></span>
                                <span class="black-border"></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel t_carousel10">
                            <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single_testimonial text-center">
                                <div class="border_extra mb_50 pos_relative">
                                    <div class="author_info">
                                        <h4><?php echo e($ad->client); ?></h4>
                                        <span><?php echo e($ad->designation); ?></span>
                                        <p class="author_comment color_66"><?php echo e($ad->review); ?></p>
                                    </div>
                                </div>
                                <div class="author_img radius_100p pos_relative"><img src="<?php echo e(asset('assets/images/'.$ad->photo)); ?>" class="radius_100p" alt="author"></div>
                            </div>                        
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ending of Testimonial Area -->

        <!-- Starting of blog area -->
        <div class="section-padding blog-area-wrapper wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title pb_50 text-center">
                            <h2><?php echo e($lang->lns); ?></h2>

                            <div class="section-borders">
                                <span></span>
                                <span class="black-border"></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                     <div class="col-md-12">
                         <div class="owl-carousel blog-area-slider">
                            <?php $__currentLoopData = $lblogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lblog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <a href="<?php echo e(route('front.blogshow',$lblog->id)); ?>" class="single-blog-box">
                               <div class="blog-thumb-wrapper">
                                   <img src="<?php echo e(asset('assets/images/'.$lblog->photo)); ?>" alt="Blog Image">
                               </div>
                                <div class="blog-text">
                                    <p class="blog-meta"><?php echo e(date('d M, Y , H:i a',strtotime($lblog->created_at))); ?>

                                    </p>
                                    <h4><?php echo e($lblog->title); ?></h4>
                                    <p class="blog-meta-text"><?php echo e(substr(strip_tags($lblog->details),0,250)); ?></p>
                                    <span class="boxed-btn blog"><?php echo e($lang->vd); ?></span>
                                </div>
                            </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </div>
                     </div>
                </div>
            </div>
        </div>
        <!-- Ending of blog area -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>