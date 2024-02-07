<?php
/**
 *  To Edit & Update Profile
 */
$id_val = (isset($profile['id'])) ? $profile['id'] : (isset($_POST['id']) ? $_POST['id'] : '');
$fname_val = (isset($profile['fname'])) ? $profile['fname'] : set_value('fname');
$lname_val = (isset($profile['lname'])) ? $profile['lname'] : set_value('lname');
$gender_val = (isset($profile['gender'])) ? $profile['gender'] : set_value('gender');
$dob_val = (isset($profile['dob'])) ? $profile['dob'] : set_value('dob');
$mobile_val = (isset($profile['mobile'])) ? $profile['mobile'] : set_value('mobile');
$mobile2_val = (isset($profile['mobile2'])) ? $profile['mobile2'] : set_value('mobile2');
$email_val = (isset($profile['email'])) ? $profile['email'] : set_value('email');
$education_val = (isset($profile['education'])) ? $profile['education'] : set_value('education');
$department_val = (isset($profile['department'])) ? $profile['department'] : set_value('department');
$experience_val = (isset($profile['experience'])) ? $profile['experience'] : set_value('experience');
$job_category_val = (isset($profile['job_category'])) ? $profile['job_category'] : set_value('job_category');
?>

<!-- 
var_dump($fname_val);
print_r($lname_val);

echo "<pre>";
print_r($profile);
echo "</pre>";
?> -->

<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Edit Profile</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>

		<form id="update_profile" method="post"  onsubmit="UpdateProfile()">

              <?= csrf_field() ?>

			<div class="modal-body">
				<div class="row mb-3">
					<label for="fname" class="col-sm-3 col-form-label text-end">First Name&nbsp;:</label>
					<div class="col-sm-8">
						<input class="form-control form-control-sm" type="text" name="fname" value="<?= $fname_val; ?>" placeholder="Enter FirstName">
						<span class="text-danger"><?= validation_show_error('fname'); ?></span>
					</div>
				</div>
				<div class="row mb-3">
					<label for="lname" class="col-sm-3 col-form-label text-end">Last Name&nbsp;:</label>
					<div class="col-sm-8">
						<input class="form-control form-control-sm" type="text" name="lname" value="<?= $lname_val; ?>" placeholder="Enter lastname">
						<span class="text-danger"><?= validation_show_error('lname'); ?></span>
					</div>
				</div>
				<div class="row mb-3">
					<label for="gender" class="col-sm-3 col-form-label text-end">Gender&nbsp;:</label>
					<div class="col-sm-8">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" value="male" <? if($gender_val == "male"){ echo "checked"; }?> id="male">
						  	<label class="form-check-label fw-normal" for="male">Male</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" value="female" <? if($gender_val == "female"){ echo "checked"; }?> id="female">
						  	<label class="form-check-label fw-normal" for="female">Female</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" value="others" <? if($gender_val == "others"){ echo "checked"; }?> id="others">
						  	<label class="form-check-label fw-normal" for="others">Others</label>
						</div>						
						<span class="text-danger"><?= validation_show_error('gender'); ?></span>
					</div>
				</div>
				<div class="row mb-3">
					<label for="dob" class="col-sm-3 col-form-label text-end">Date of Birth&nbsp;:</label>
					<div class="col-sm-8">
						<div class="input-group input-group-sm">
			        		    	<input class="form-control form-control-sm validatess" type="date" id="dob" name="dob" autocomplete="off" placeholder="DD-MM-YYYY" value="<?= $dob_val; ?>">
			        		    	<span class="input-group-text"><span class="mdi mdi-calendar-month-outline"></span></span>
	        		    		</div>
						<span class="text-danger"><?= validation_show_error('dob'); ?></span>
	        			</div>
				</div>
				<div class="row mb-3">
					<label for="mobile" class="col-sm-3 col-form-label text-end">Mobile&nbsp;:</label>
					<div class="col-sm-8">
						<input class="form-control form-control-sm" type="text" name="mobile" value="<?= $mobile_val; ?>" placeholder="Enter Mobile No.">
						<span class="text-danger"><?= validation_show_error('mobile'); ?></span>
					</div>
				</div>
				<div class="row mb-3">
					<label for="alternatemobile" class="col-sm-3 col-form-label text-end">Alternate Mobile&nbsp;:</label>
					<div class="col-sm-8">
						<input class="form-control form-control-sm" type="text" name="mobile2" value="<?= $mobile2_val; ?>" minlength="10" maxlength="10" placeholder="Enter Alternative Mobile No.">
						<span class="text-danger"><?= validation_show_error('mobile2'); ?></span>
					</div>
				</div>
				<div class="row mb-3">
					<label for="email" class="col-sm-3 col-form-label text-end">Email&nbsp;:</label>
					<div class="col-sm-8">
						<input class="form-control form-control-sm" type="text" name="email" value="<?= $email_val; ?>" placeholder="Enter Email Address">
						<span class="text-danger"><?= validation_show_error('email'); ?></span>
					</div>
				</div>
				<div class="row mb-3">
					<label for="education" class="col-sm-3 col-form-label text-end">Education&nbsp;:</label>
					<div class="col-sm-8">
						<select name="education" class="form-select form-select-sm">
							<option value="">Select</option>
							<?
							foreach($education as $key => $value){
								?>
								<option value="<?= $value['id']; ?>" <? if($value['id'] == $education_val) { echo "selected"; }?>><?= $value['name']; ?></option>
							<?}?>
						</select>
						<span class="text-danger"><?= validation_show_error('education'); ?></span>
					</div>
				</div>
			  	<div class="row mb-3">
					<label for="experience" class="col-sm-3 col-form-label text-end">Experience&nbsp;:</label>
					<div class="col-sm-8">
						<div class="input-group input-group-sm">
							<input class="form-control" type="text" name="experience" value="<?= $experience_val; ?>" placeholder="Enter Experience">
							<span class="input-group-text">In Years</span>
						</div>
						<span class="text-danger"><?= validation_show_error('experience'); ?></span>
					</div>
				</div>
				<div class="row mb-3">
					<label for="department" class="col-sm-3 col-form-label text-end">Department&nbsp;:</label>
					<div class="col-sm-8">
						<select name="department" class="form-select form-select-sm">
							<option value="">Select</option>
							<?
							foreach ($departments as $key => $value) {
								?>
								<option value="<?= $value['id'];?>" <? if($department_val == $value['id']) { echo "selected"; }?>><?= $value['name']; ?></option>
							<?}
							?>
						</select>
						<span class="text-danger"><?= validation_show_error('department'); ?></span>
					</div>
				</div>
				<div class="row mb-3">
					<label for="job_category" class="col-sm-3 col-form-label text-end">Job Category&nbsp;:</label>
					<div class="col-sm-8">
						<select name="job_category" class="form-select form-select-sm">
							<option value="">Select</option>
							<?
							foreach($job_category as $key => $value){
								?>
								<option value="<?= $value['id']; ?>" <? if($job_category_val == $value['id']) { echo "selected"; }?>><?= $value['name']; ?></option>
							<?}
							?>
						</select>
						<span class="text-danger"><?= validation_show_error('job_category'); ?></span>
					</div>
				</div>
            	<input type="hidden" name="id" value="<?= $id_val; ?>">
			</div>
			<div class="modal-footer">
              		<button type="submit" class="btn btn-success btn-sm"><span class="bi bi-plus"></span>&nbsp;Update</button>
        			<button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><span class="bi bi-x"></span>&nbsp;Close</button>
            	</div>
		</form>
	</div>
</div>