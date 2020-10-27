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
                    <div class="col-md-12">
                        <h1 class="donors-header text-center"><?php echo e($lang->fht); ?></h1>
                        <div class="hero-form">
                            <div class="hero-form-wrapper inline">
                                <form action="<?php echo e(route('user.search')); ?>" method="GET">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                  <i class="fa fa-fw fa-home"></i>
                                              </div>
                                         <input list="cities" type="search" name="search" id="country" class="form-control" placeholder="<?php echo e($lang->ec); ?>" required="">

                                        <datalist id="cities">
                                    <?php if($cities != null): ?>
                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($city); ?>">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                        </datalist> 
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="input-group">
                                                  <div class="input-group-addon">
                                                      <i class="fa fa-fw fa-cog"></i>
                                                  </div>
                                                  <select name="group" id="blood_grp" class="form-control" required="">
                                                      <option value=""><?php echo e($lang->sbg); ?></option>
 													<?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->cat_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                  </select>
                                                </div>
                                              </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group text-center">
                                                <input class="btn btn-block hero-btn" name="button" value="<?php echo e($lang->search); ?>" type="submit">
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
<div class="section-padding all-donors-wrap team_section team_style2 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <div class="container">
    <?php $__currentLoopData = $users->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userChunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row">
                	<?php $__currentLoopData = $userChunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="team_common">
                            <div class="member_img">
                                <a href="<?php echo e(route('front.user',$user->id)); ?>"><img src="<?php echo e($user->photo ? asset('assets/images/'.$user->photo):'http://fulldubai.com/SiteImages/noimage.png'); ?>" alt="member image"></a>
                            </div>
                            <div class="member_info text-center pos_relative">
                                <div class="overlay1"></div>
                                <div class="overlay2"></div>
                                <div class="content">
                                    <a href="<?php echo e(route('front.user',$user->id)); ?>" class="d_inline fw_600"><?php echo e($user->name); ?></a>
                                    <span class="d_block transition_3s"><?php echo e($lang->bg); ?> <?php echo e($user->category->cat_name); ?></span>
                                    <ul class="social_contact pt_10" style="padding-left: 0px;">
                                        <?php if($user->f_url != null): ?>
                                        <li>
                                        <a href="<?php echo e($user->f_url ? $user->f_url:'https://www.facebook.com/'); ?>" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if($user->t_url != null): ?>
                                        <li>
                                        <a href="<?php echo e($user->t_url ? $user->t_url:'https://twitter.com/'); ?>" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if($user->l_url != null): ?>
                                        <li>
                                        <a href="<?php echo e($user->l_url ? $user->l_url:'https://www.linkedin.com/'); ?>" title="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if($user->g_url != null): ?>
                                        <li>
                                        <a href="<?php echo e($user->g_url ? $user->g_url:'https://www.instagram.com/'); ?>" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
                    <div class="text-center">
                    <?php echo $users->links(); ?>                 
                    </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>