<?php $__env->startSection('content'); ?>
    <div class="donors-profile-top-bg overlay text-center wow fadeInUp"
         style="background-image: url(<?php echo e(asset('assets/images/'.$gs->bgimg)); ?>); visibility: visible; animation-name: fadeInUp;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="ut"><?php echo e($user->name); ?></h2>
                    <p><?php echo e($lang->bg); ?> <?php echo e($user->category->cat_name); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="donors-profile-wrap wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <div class="container">

            <div class="row">
                <?php echo $__env->make('includes.form-success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger validation">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        <ul class="text-left">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="col-md-8">
                    <?php if($user->status != 1): ?>
                        <?php if($user->active != 1): ?>
                            <?php if($user->featured != 1): ?>
                                <?php if($gs->np == 0): ?>

                                    <div class="profile-description-box margin-bottom-30 text-center">
                                        <a href="<?php echo e(route('user-publish')); ?>" class="boxed-btn blog"
                                           style="width: 160px;"><?php echo e($lang->ppr); ?></a>
                                    </div>

                                <?php else: ?>
                                    <div class="profile-description-box margin-bottom-30 text-center">
                                        <button class="boxed-btn blog" type="button" data-toggle="modal"
                                                data-target="#ModalAll" style="width: 160px;"><?php echo e($lang->ppr); ?></button>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>

                    <?php elseif($user->is_featured != 1): ?>
                        <?php if($user->featured != 1): ?>
                            <?php if($gs->fp == 0): ?>
                                <div class="profile-description-box margin-bottom-30 text-center">
                                    <a href="<?php echo e(route('user-feature')); ?>" class="boxed-btn blog"
                                       style="width: 160px;"><?php echo e($lang->fpr); ?></a>
                                </div>

                            <?php else: ?>

                                <div class="profile-description-box margin-bottom-30 text-center">
                                    <button class="boxed-btn blog" type="button" data-toggle="modal"
                                            data-target="#ModalFeature" style="width: 160px;"><?php echo e($lang->fpr); ?></button>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="profile-description-box margin-bottom-30">
                        <h2 class="ut"><?php echo e($lang->dopd); ?></h2>
                        <hr>
                        <p><?php echo $user->description; ?></p>
                    </div>

                    <?php if($user->special != null): ?>
                        <div class="other-description-box margin-bottom-30">
                            <h2 class="ut">Categorías</h2>
                            <hr>
                            <div class="table-responsive" style="overflow: hidden;">
                                <?php 
                                    $categories = explode(',', $user->category_id);
                                 ?>
                                <ul class="row">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="col-md-6 col-sm-6"><?php echo e(\app\User::getCategoryName($category)); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>


                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($user->special != null): ?>
                        <div class="other-description-box margin-bottom-30">
                            <h2 class="ut"><?php echo e($lang->doo); ?></h2>
                            <hr>
                            <div class="table-responsive" style="overflow: hidden;">
                                <?php 
                                    $specials = explode(',', $user->special);
                                 ?>
                                <ul class="row">
                                    <?php $__currentLoopData = $specials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $special): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="col-md-6 col-sm-6"><?php echo e($special); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>


                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="other-description-box margin-bottom-30">
                        <h2 class="ut"><?php echo e($lang->binfo); ?></h2>
                        <hr>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th><?php echo e($lang->dol); ?></th>
                                    <td><?php echo e($user->language); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e($lang->doe); ?></th>
                                    <td><?php echo e($user->education); ?></td>
                                </tr>
                                <?php if($user->title!=null && $user->details!=null): ?>

                                    <?php $__currentLoopData = array_combine($title,$details); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ttl => $dtl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><?php echo e($ttl); ?></th>
                                            <td><?php echo e($dtl); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--                         <div class="add-area margin-bottom-30">
                                                <img src="assets/img/add.jpg" alt="Ad. Image">
                                            </div> -->

                </div>
                <div class="col-md-4">
                    <div class="profile-right-side">
                        <div class="profile-img">
                            <img width="130px" height="90px" id="adminimg"
                                 src="<?php echo e($user->photo ? asset('assets/images/'.$user->photo):'http://fulldubai.com/SiteImages/noimage.png'); ?>"
                                 alt="" id="adminimg">
                        </div>

                        <div class="profile-contact-info">
                            <h2><?php echo e($lang->doci); ?></h2>
                            <hr>

                            <p><i class="fa fa-home fa-1x"></i>&nbsp;<?php echo e($user->address); ?></p>
                            <?php if($user->fax != null): ?>
                                <p><i class="fa fa-fax fa-1x"></i>&nbsp;<?php echo e($user->fax); ?></p>
                            <?php endif; ?>
                            <p><i class="fa fa-phone fa-1x"></i>&nbsp;<?php echo e($user->phone); ?></p>
                            <p><i class="fa fa-envelope fa-1x"></i>&nbsp;<?php echo e($user->email); ?></p>
                            <?php if($user->web != null): ?>
                                <p><i class="fa fa-globe fa-1x"></i>&nbsp;<?php echo e($user->web); ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="share-profile-info">
                            <h2><?php echo e($lang->dosp); ?></h2>
                            <hr>
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                <a class="a2a_dd" href=""></a>
                                <a class="a2a_button_facebook" href=""></a>
                                <a class="a2a_button_twitter" href=""></a>
                                <a class="a2a_button_google_plus" href=""></a>
                                <a class="a2a_button_linkedin" href=""></a>
                            </div>
                            <script async src="https://static.addtoany.com/menu/page.js"></script>
                        </div>
                        <hr>
                        <div class="add-area margin-bottom-30">
                            <iframe
                                    width="340"
                                    height="350"
                                    frameborder="0" style="border:0"
                                    src="https://www.google.com/maps/embed/v1/place?key=<?php echo e($gs->map_key); ?>&q=<?php echo e($user->address == null ? '@':$user->address); ?>"
                                    allowfullscreen>
                            </iframe>
                        </div>
                        <!--                             <div class="add-area">
                                                    <img src="assets/img/ad1.jpg" alt="Ad. Image">
                                                </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade-scale" id="ModalAll" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Publish Your Profile</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h4 id="cost" class="cost"></h4>
                            <h4>Select Premium Features</h4>
                            <form class="paypal" action="<?php echo e(route('payment.submit')); ?>" method="post" id="payment_form">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="cmd" value="_xclick"/>
                                <input type="hidden" name="no_note" value="1"/>
                                <input type="hidden" name="lc" value="UK"/>
                                <input type="hidden" name="currency_code" value="USD"/>
                                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest"/>
                                <div class="form-group col-md-8 col-md-offset-2">
                                    <select name="featured" class="form-control" id="opt" required>
                                        <option value="">Select Option</option>
                                        <option value="no">Normal Profile</option>
                                        <option value="yes">Featured Profile</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-8 col-md-offset-2">
                                    <select class="form-control" onChange="meThods(this)" id="formac" name="method"
                                            required>
                                        <option value="Paypal" selected>Paypal</option>
                                        <option value="Stripe">Credit Card</option>
                                    </select>
                                </div>
                                <input type="hidden" name="userid" value="<?php echo e($user->id); ?>"/>

                                <div id="stripes" class="col-md-8 col-md-offset-2" style="display: none;">
                                    <img class="pull-right" src="<?php echo e(url('/assets/images')); ?>/creditcards.png">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="card" placeholder="Card">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="cvv" placeholder="Cvv">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="month" placeholder="Month">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="year" placeholder="Year">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="submit" name="submit" id="pay" class="boxed-btn blog" value="Pay Now"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade-scale" id="ModalFeature" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Feature Your Profile</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h4>Make Your Profile Featured</h4>
                            <h4 class="cost">Total Cost: <?php echo e($gs->fp); ?>$</h4>
                            <form class="paypal" action="<?php echo e(route('payment.submit')); ?>" method="post" id="payment_form2">
                                <?php echo e(csrf_field()); ?>


                                <div class="form-group col-md-8 col-md-offset-2">
                                    <select class="form-control" onChange="meThods2(this)" id="formac" name="method"
                                            required>
                                        <option value="Paypal" selected>Paypal</option>
                                        <option value="Stripe">Credit Card</option>
                                    </select>
                                </div>
                                <input type="hidden" name="cmd" value="_xclick"/>
                                <input type="hidden" name="no_note" value="1"/>
                                <input type="hidden" name="lc" value="UK"/>
                                <input type="hidden" name="currency_code" value="USD"/>
                                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest"/>
                                <input type="hidden" name="featured" value="yes"/>
                                <input type="hidden" name="userid" value="<?php echo e($user->id); ?>"/>

                                <div id="stripes2" class="col-md-8 col-md-offset-2" style="display: none;">
                                    <img class="pull-right" src="<?php echo e(url('/assets/images')); ?>/creditcards.png">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="card" placeholder="Card">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="cvv" placeholder="Cvv">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="month" placeholder="Month">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="year" placeholder="Year">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="submit" name="submit" id="pay2" class="boxed-btn blog"
                                           value="Pay Now"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>

        $("#opt").change(function () {

            var opt = $("#opt").val();

            if (opt == "yes") {
                $("#cost").html("Total Cost: <?php echo e($gs->fp+$gs->np); ?>$");
            } else {
                $("#cost").html("Total Cost: <?php echo e($gs->np); ?>$");
            }

        });
        //    $('#pay').click(function(e) {
        //
        //        var opt = $("#opt").val();
        //        if(opt !=""){
        //
        //            $('#ModalAll').modal('toggle'); //or  $('#IDModal').modal('hide');
        //        }
        //    });
        //    $('#pay2').click(function(e) {
        //        $('#ModalFeature').modal('toggle'); //or  $('#IDModal').modal('hide');
        //    });

        function meThods(val) {
            var action1 = "<?php echo e(route('payment.submit')); ?>";
            var action2 = "<?php echo e(route('stripe.submit')); ?>";
            if (val.value == "Paypal") {
                $("#payment_form").attr("action", action1);
                $("#stripes").hide();
                $("#stripes").find("input").attr('required', false);
            }
            if (val.value == "Stripe") {
                $("#payment_form").attr("action", action2);
                $("#stripes").show();
                $("#stripes").find("input").attr('required', true);
            }
        }

        function meThods2(val) {
            var action1 = "<?php echo e(route('payment.submit')); ?>";
            var action2 = "<?php echo e(route('stripe.submit')); ?>";
            if (val.value == "Paypal") {
                $("#payment_form2").attr("action", action1);
                $("#stripes2").hide();
                $("#stripes2").find("input").attr('required', false);
            }
            if (val.value == "Stripe") {
                $("#payment_form2").attr("action", action2);
                $("#stripes2").show();
                $("#stripes2").find("input").attr('required', true);
            }
        }

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>