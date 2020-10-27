<?php $__env->startSection('content'); ?>
<section class="login-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12">
                        <div class="login-form">
                            <div class="login-icon"><i class="fa fa-user"></i></div>
                            
                            <div class="section-borders">
                                <span></span>
                                <span class="black-border"></span>
                                <span></span>
                            </div>
                            
                            <div class="login-title text-center"><?php echo e($lang->signin); ?></div>

                            <form action="<?php echo e(route('user-login-submit')); ?>" method="POST">
                            	<?php echo e(csrf_field()); ?>

                                <?php echo $__env->make('includes.form-error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            	<?php echo $__env->make('includes.form-success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-envelope"></i>
                                  </div>
                                  <input name="email" class="form-control" placeholder="<?php echo e($lang->sie); ?>" type="email" required="">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                        <i class="fa fa-unlock-alt"></i>
                                    </div>
                                  <input class="form-control" name="password" placeholder="<?php echo e($lang->spe); ?>" type="password" required="">
                                </div>
                              </div>
                              <div class="form-group text-center">
                                    <button type="submit" class="btn login-btn" name="button"><?php echo e($lang->signin); ?></button>
                              </div>
                              <div class="form-group text-center">
                                    <a href="<?php echo e(route('user-forgot')); ?>"><?php echo e($lang->fpw); ?></a>
                                    <br>
                                    <a href="<?php echo e(route('user-register')); ?>"><?php echo e($lang->cn); ?></a>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>