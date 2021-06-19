<div class="container">
   <!-- Include Flash Data File -->
   <?php $this->load->view('_Alerts/alert.php') ?>
   <div class="card bg-light">
      <div class="row align-items-center">
         <article class="card-body mx-auto" style="max-width: 400px;">
            <!-- Page Name -->
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <?=form_open() ?>
            <!-- Title Dropdown-->
            <div class="form-group input-group mb-2">
               <div class="input-group-prepend">
                  <span style="font-size: 1.5em;" class="input-group-text"> <i class="fa fa-user"></i> </span>
               </div>
               <select name="title" class="form-control" >
                  <option>Select Title</option>
                  <option value="Mr" <?= set_select('title','Mr'); ?>>Mr</option>
                  <option value="Miss" <?=set_select('title','Miss'); ?>>Miss</option>
                  <option value="Mrs" <?=set_select('title','Mrs'); ?>>Mrs</option>
                  <option value="Dr" <?=set_select('title','Dr'); ?>>Dr</option>
               </select>
            </div>
            <!-- First Name-->
            <div class="form-group input-group mb-2">
               <div class="input-group-prepend">
                  <span style="font-size: 1.5em;" class="input-group-text"> <i class="fa fa-user fa-xs"></i> </span>
               </div>
               <input name="fname" value="<?=set_value('fname'); ?>" class="form-control <?=(form_error('fname') == "" ? '' : 'is-invalid') ?>" placeholder="First Name" type="text">
               <?=form_error('fname'); ?>
            </div>
            <!-- Last Name-->
            <div class="form-group input-group mb-2">
               <div class="input-group-prepend">
                  <span style="font-size: 1.5em;" class="input-group-text"> <i class="fa fa-user"></i> </span>
               </div>
               <input name="lname" value="<?=set_value('lname'); ?>" class="form-control <?=(form_error('lname') == "" ? '' : 'is-invalid') ?>" placeholder="Last Name" type="text">
               <?=form_error('lname'); ?>
            </div>
            <!-- Email Address-->
            <div class="form-group input-group mb-2">
               <div class="input-group-prepend">
                  <span style="font-size: 1.5em;" class="input-group-text" > <i class="fa fa-envelope"></i></span>
               </div>
               <input name="email" value="<?=set_value('email'); ?>" class="form-control <?=(form_error('email') == "" ? '' : 'is-invalid') ?>" placeholder="Email Address" type="email">
               <?=form_error('email'); ?>
            </div>
            <!-- Phone Number -->
            <div class="form-group input-group mb-2">
               <div class="input-group-prepend">
                  <span style="font-size: 1.5em;" class="input-group-text"> <i class="fa fa-phone"></i> </span>
               </div>
               <input name="phone" value="<?=set_value('phone'); ?>" class="form-control <?=(form_error('phone') == "" ? '' : 'is-invalid') ?>" placeholder="Phone Number" type="text">
               <?=form_error('phone'); ?>
            </div>
            <!-- Job Type -->
            <div class="form-group input-group mb-2">
               <div class="input-group-prepend">
                  <span style="font-size: 1.5em;" class="input-group-text"> <i class="fa fa-building"></i> </span>
               </div>
               <input name="jtype" value="<?=set_value('jtype'); ?>" class="form-control" placeholder="Job Type" type="text">
            </div>
            <!-- Username -->
            <div class="form-group input-group mb-2">
               <div class="input-group-prepend">
                  <span style="font-size: 1.5em;" class="input-group-text"> <i class="fa fa-user-circle-o"></i> </span>
               </div>
               <input name="username" value="<?=set_value('username'); ?>" class="form-control <?=(form_error('username') == "" ? '' : 'is-invalid') ?>" placeholder="Username" type="text">
               <?=form_error('username'); ?>
            </div>
            <!-- Create Password -->
            <div class="form-group input-group mb-2">
               <div class="input-group-prepend">
                  <span style="font-size: 1.5em;" class="input-group-text"> <i class="fa fa-lock"></i> </span>
               </div>
               <input name="password" value="<?=set_value('password'); ?>" class="form-control <?=(form_error('password') == "" ? '' : 'is-invalid') ?>" placeholder="Create Password" type="password">
               <?=form_error('password'); ?>
            </div>
            <!-- Confirm Password/ -->
            <div class="form-group input-group mb-2">
               <div class="input-group-prepend">
                  <span style="font-size: 1.5em;" class="input-group-text"> <i class="fa fa-lock"></i> </span>
               </div>
               <input name="cpassword" value="<?=set_value('cpassword'); ?>" class="form-control <?=(form_error('cpassword') == "" ? '' : 'is-invalid') ?>" placeholder="Confirm Password" type="password">
               <?=form_error('cpassword'); ?>
            </div>
            <!-- Button -->                                      
            <div class="text-center mb-2">
               <button type="submit" class="btn btn-primary btn-lg btn-block" name="register"> Create Account  </button>
            </div>
            <!-- Login Link -->      
            <p class="text-center">Have an account? <a href="<?php echo base_url('auth/login'); ?>">Log In</a> </p>
            <?=form_close() ?>
            <!-- form end -->
         </article>
         <!-- article end -->
      </div>
   </div>
   <!-- card end -->
</div>
<!--container end-->