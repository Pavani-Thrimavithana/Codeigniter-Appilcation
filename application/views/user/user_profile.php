<div class="container-fluid">
   <!-- Include Flash Data File -->
   <?php $this->load->view('_Alerts/alert.php') ?>
   <h4 class="card-title mt-1 text-center">User Profiles</h4>
   <div class="row">
      <!-- Logged Username -->
      <div class="col-sm">
         <h5 class="card-title mt-1 text-left">Welcome <?= $this->session->userdata('USER_NAME') ?></h5>
      </div>
      <!-- Logout  -->
      <div class="col-sm">
         <div class="card-title text-right">
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-outline-dark ">Logout</a>
         </div>
      </div>
   </div>
   <!-- table -->
   <table class="table table-striped table-condensed table-responsive">
      <thead style="font-size: 0.9em;">
         <tr>
            <th style="width: 10%">User ID</th>
            <th  style="width: 10%">Title</th>
            <th  style="width: 10%">First Name</th>
            <th  style="width: 10%">Last Name</th>
            <th  style="width: 10%">Email Address</th>
            <th  style="width: 10%">Phone Number</th>
            <th  style="width: 10%">Job Type</th>
            <th style="width: 10%">User Name</th>
            <th style="width: 10%">Password</th>
            <th style="width: 10%">Registered Date</th>
         </tr>
      </thead>
      <!-- load the data to the tabele body -->
      <tbody style="font-size: 0.8em;">
         <?php $i=1;
            foreach($data as $row){
            	echo "<tr>";
            	echo "<td>".$row->user_id."</td>";
            	echo "<td>".$row->title."</td>";
            	echo "<td>".$row->first_name."</td>";
            	echo "<td>".$row->last_name."</td>";
            	echo "<td>".$row->email_address."</td>";
            	echo "<td>".$row->phone_number."</td>";
            	echo "<td>".$row->job_type."</td>";
            	echo "<td>".$row->username."</td>";
            	echo "<td>".$row->password."</td>";
            	echo "<td>".$row->registered_date."</td>";
            	echo "</tr>";
            	$i++;
            }
            ?>
      </tbody>
   </table>
</div>