<div class="container">
   <!-- Include Flash Data File -->
   <?php $this->load->view('_Alerts/alert.php') ?>
   <div class="card bg-light">
      <div class="row align-items-center">
         <article class="card-body mx-auto" style="max-width: 400px;">
            <!-- Page Name -->
            <h4 class="card-title mt-3 text-center">Login to the Account</h4>
            <?=form_open() ?>
            <!-- Username -->
            <div class="form-group input-group mb-2">
               <div class="input-group-prepend">
                  <span style="font-size: 1.5em;" class="input-group-text"> <i class="fa fa-user-circle-o"></i> </span>
               </div>
               <input name="username" value="<?=set_value('username'); ?>" class="form-control <?=(form_error('username') == "" ? '' : 'is-invalid') ?>" placeholder="Username" type="text">
               <?=form_error('username'); ?>
            </div>
            <!-- Password -->
            <div class="form-group input-group mb-2">
               <div class="input-group-prepend">
                  <span style="font-size: 1.5em;" class="input-group-text"> <i class="fa fa-lock"></i> </span>
               </div>
               <input name="password" value="<?=set_value('password'); ?>" class="form-control <?=(form_error('password') == "" ? '' : 'is-invalid') ?>" placeholder="Create Password" type="password">
               <?=form_error('password'); ?>
            </div>
            <!-- Button -->                                      
            <div class="text-center mb-2">
               <button type="submit" class="btn btn-primary btn-block" name="login"> Login  </button>
            </div>
            <!-- Login Link -->      
            <p class="text-center">New User? <a href="<?php echo base_url('auth/register'); ?>">Create Account</a> </p>
            <?=form_close() ?>
            <!-- form end -->
         </article>
         <!-- article end -->
      </div>
   </div>
   <!-- card end -->
</div>
<!--container end-->