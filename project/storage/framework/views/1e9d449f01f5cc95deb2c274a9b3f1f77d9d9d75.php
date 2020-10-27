<?php if(Session::has('success')): ?>
      
      <div class="alert alert-success validation">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <p class="text-left"><?php echo e(Session::get('success')); ?></p> 
      </div>

<?php endif; ?>

<?php if(Session::has('unsuccess')): ?>
      
      <div class="alert alert-danger validation">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <p class="text-left"><?php echo e(Session::get('unsuccess')); ?></p> 
      </div>

<?php endif; ?>

<?php if(session('message')==='f'): ?>
      <div class="alert alert-danger validation">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <p>Credentials doesn't match.</p>
      </div>
<?php endif; ?>    