<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="<?php echo e($seo->meta_keys); ?>">
        <meta name="author" content="GeniusOcean">
        <title><?php echo e($gs->title); ?></title>

        <link href="<?php echo e(asset('assets/front/css/bootstrap.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/front/css/font-awesome.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/front/css/owl.carousel.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/front/css/slicknav.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/front/css/animate.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
        <link href="<?php echo e(asset('assets/front/css/style.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/front/css/responsive.css')); ?>" rel="stylesheet">
        <link rel="icon" type="image/png" href="<?php echo e(asset('assets/images/'.$gs->favicon)); ?>">
        <?php echo $__env->make('styles.design', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('styles'); ?>
    <style type="text/css">
        .profile-contact-info {
            margin-top: 15px;
        }
        .ut {
            font-size: 20px;
        }
    </style>
    <?php if(Auth::guard('user')->check()): ?>
<style type="text/css">
@media  only screen and (min-width: 767px) { 
    .mid-break-9 {
        width: 85%;
    }
    .mid-break-3 {
        width: 15%;
    }

    }
@media  only screen and (min-width: 991px) and (max-width: 1199px) { 
    .mid-break-9 {
        width: 87%;
    }
    .mid-break-3 {
        width: 13%;
    }

    }
.mainmenu li ul {
    width: 150px;
}
</style>
    <?php endif; ?>
    </head>
    <body>
    <div id="cover"></div>
        <!-- Starting of Header area -->
        <div class="header-top-area">
            <div class="container">

                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="top-column-left">
                            <ul>
                                <li>
                                    <i class="fa fa-envelope"></i> <?php echo e($gs->email); ?>

                                </li>
                                <li>
                                    <i class="fa fa-phone"></i> <?php echo e($gs->phone); ?>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="top-column-right">
                            <ul class="top-social-links">
                                <li class="top-social-links-li">
                                    <?php if($sl->f_status == 1): ?>
                                    <a href="<?php echo e($sl->facebook); ?>"><i class="fa fa-facebook"></i></a>
                                    <?php endif; ?>
                                    <?php if($sl->t_status == 1): ?>
                                    <a href="<?php echo e($sl->twitter); ?>"><i class="fa fa-twitter"></i></a>
                                    <?php endif; ?>
                                    <?php if($sl->l_status == 1): ?>
                                    <a href="<?php echo e($sl->linkedin); ?>"><i class="fa fa-linkedin"></i></a>
                                    <?php endif; ?>
                                    <?php if($sl->g_status == 1): ?>
                                    <a href="<?php echo e($sl->gplus); ?>"><i class="fa fa-google"></i></a>
                                    <?php endif; ?>
                                </li>
                         <?php if(Auth::guard('user')->check()): ?>   
                         <?php else: ?>
                                <li><a href="<?php echo e(route('user-login')); ?>"><?php echo e($lang->signin); ?></a></li>
                                <li><a href="<?php echo e(route('user-register')); ?>"><?php echo e($lang->signup); ?></a></li>
                        <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-area-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-md-3 col-lg-3 mid-break-3">
                        <div class="logo">
                            <a href="<?php echo e(route('front.index')); ?>">
                                <img src="<?php echo e(asset('assets/images/'.$gs->logo)); ?>" alt="">
                            </a>
                        </div>
                        <div id="mobile-menu-wrap"></div>
                    </div>
                    <div class="col-sm-9 col-md-9 col-lg-9 mid-break-9">
                        <div class="mainmenu">

                            <ul id="menuResponsive">
                                <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e($lang->home); ?></a></li>
                                <li><a href="<?php echo e(route('front.featured')); ?>"><?php echo e($lang->fh); ?></a></li>
                                <li><a href="<?php echo e(route('front.users')); ?>"><?php echo e($lang->h); ?></a></li>

                                <?php if($ps->a_status == 1): ?>
                                <li><a href="<?php echo e(route('front.about')); ?>"><?php echo e($lang->about); ?></a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo e(route('front.blog')); ?>"><?php echo e($lang->blog); ?></a></li>
                                <?php if($ps->f_status == 1): ?>
                                <li><a href="<?php echo e(route('front.faq')); ?>"><?php echo e($lang->faq); ?></a></li>
                                <?php endif; ?>
                                <?php if($ps->c_status == 1): ?>
                                <li><a href="<?php echo e(route('front.contact')); ?>"><?php echo e($lang->contact); ?></a></li>
                                <?php endif; ?>
                         <?php if(Auth::guard('user')->check()): ?>  


                                <li class="menuLi"><a style="cursor: pointer;">PROFILE <i class="fa fa-angle-down"></i></a>
                                    <ul class="menuUl">
                                        <li><a href="<?php echo e(route('user-dashboard')); ?>"><?php echo e($lang->dashboard); ?></a></li>
                                        <li><a href="<?php echo e(route('user-profile')); ?>"><?php echo e($lang->edit); ?></a></li>
                                        <li><a href="<?php echo e(route('user-reset')); ?>"><?php echo e($lang->reset); ?></a></li>
                                        <li><a href="<?php echo e(route('user-logout')); ?>"><?php echo e($lang->logout); ?></a></li>
                                    </ul>
                                </li>                             
                         <?php endif; ?>
                            </ul>
 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ending of Header area -->

        <!-- Starting of Hero area -->
        <?php echo $__env->yieldContent('content'); ?>

        <!-- starting of subscribe newsletter area -->
        <div class="subscribe-newsletter-wrapper">
            <div class="container"> 
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="subscribe-newsletter-area">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                    <h4><?php echo e($lang->ston); ?></h4>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                    <form action="<?php echo e(route('front.subscribe.submit')); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="email" name="email" placeholder="<?php echo e($lang->supl); ?>" required>
                                        <button type="submit" class="btn"><?php echo e($lang->s); ?></button>
                                    </form>
                                    <p>
                                    <?php if(Session::has('subscribe')): ?>
                                        <?php echo e(Session::get('subscribe')); ?>

                                    <?php endif; ?>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($error); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ending of subscribe newsletter area -->
        <!-- starting of footer area -->
        <footer class="section-padding footer-area-wrapper wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-footer-area">
                            <div class="footer-title"><?php echo e($lang->about); ?></div>
                            <div class="footer-content">
                                <p>
                                    <?php  
                                        echo isset($gs->about) ? $gs->about:'';
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-footer-area">
                            <div class="footer-title"><?php echo e($lang->fl); ?></div>
                            <div class="footer-content">
                                <ul class="about-footer">
                                    <li><a href="<?php echo e(route('front.index')); ?>"><i class="fa fa-caret-right"></i> &nbsp;<?php echo e($lang->home); ?></a></li>
                                <?php if($ps->a_status == 1): ?>
                                    <li><a href="<?php echo e(route('front.about')); ?>"><i class="fa fa-caret-right"></i> &nbsp;<?php echo e($lang->about); ?></a></li>
                                <?php endif; ?>
                                <?php if($ps->f_status == 1): ?>
                                    <li><a href="<?php echo e(route('front.faq')); ?>"><i class="fa fa-caret-right"></i> &nbsp;<?php echo e($lang->faq); ?></a></li>
                                <?php endif; ?>
                                <?php if($ps->c_status == 1): ?>
                                    <li><a href="<?php echo e(route('front.contact')); ?>"><i class="fa fa-caret-right"></i> &nbsp;<?php echo e($lang->contact); ?></a></li>
                                <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-footer-area">
                            <div class="footer-title"><?php echo e($lang->lns); ?></div>
                            <div class="footer-content">
                                <ul class="latest-tweet">
                                    <?php $__currentLoopData = $lblogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lblog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <img src="<?php echo e(asset('assets/images/'.$lblog->photo)); ?>" alt="">
                                        <span><a href="<?php echo e(route('front.blogshow',$lblog->id)); ?>"><?php echo e($lblog->title); ?></a></span>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-6 col-xs-12">
                        <div class="single-footer-area">
                            <div class="footer-title"><?php echo e($lang->contact); ?></div>
                            <div class="footer-content">
                                <div class="contact-info">
                                <?php if($gs->street != null): ?>                                    
                                  <p class="contact-info">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <?php echo e($gs->street); ?>

                                    </p>
                                <?php endif; ?>
                                <?php if($gs->phone != null): ?>   
                                    <p class="contact-info">
                                         <i class="fa fa-phone" aria-hidden="true"></i>
                                        <a href="tel:<?php echo e($gs->phone); ?>"><?php echo e($gs->phone); ?></a>
                                    </p>
                                <?php endif; ?>
                                <?php if($gs->email != null): ?>   
                                    <p class="contact-info">
                                         <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <a href="mailto:<?php echo e($gs->email); ?>"><?php echo e($gs->email); ?></a>
                                    </p>
                                <?php endif; ?>
                                <?php if($gs->site != null): ?>   
                                    <p class="contact-info">
                                        <i class="fa fa-globe" aria-hidden="true"></i>
                                        <a href="<?php echo e($gs->site); ?>"><?php echo e($gs->site); ?></a>
                                    </p>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="footer-copyright-area">
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6">
                      <p class="copy-right-side">
                        <?php echo $gs->footer; ?>

                      </p>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="footer-social-links">
                        <ul>
                            <?php if($sl->f_status == 1): ?>
                            <li><a class="facebook" href="<?php echo e($sl->facebook); ?>">
                                <i class="fa fa-facebook"></i>
                            </a></li>
                            <?php endif; ?>
                            <?php if($sl->g_status == 1): ?>
                            <li><a class="google" href="<?php echo e($sl->gplus); ?>">
                                <i class="fa fa-google"></i>
                            </a></li>
                            <?php endif; ?>
                            <?php if($sl->t_status == 1): ?>
                            <li><a class="twitter" href="<?php echo e($sl->twitter); ?>">
                                <i class="fa fa-twitter"></i>
                            </a></li>
                            <?php endif; ?>
                            <?php if($sl->l_status == 1): ?>
                            <li><a class="tumblr" href="<?php echo e($sl->linkedin); ?>">
                                <i class="fa fa-linkedin"></i>
                            </a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </footer>
        <!-- Ending of footer area -->


        

        <script src="<?php echo e(asset('assets/front/js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/front/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/front/js/owl.carousel.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/front/js/wow.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/front/js/jquery.slicknav.min.js')); ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
        <script src="<?php echo e(asset('assets/front/js/main.js')); ?>"></script>
        <?php echo $seo->google_analytics; ?>

        <script type="text/javascript">
        $(window).load(function(){
            setTimeout(function(){
                $('#cover').fadeOut(1000);
            },1000)
        });
        </script>

        <?php echo $__env->yieldContent('scripts'); ?>

    </body>
</html>
