<?php
/**
 *  Add Profile
 */
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add New Profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" id="add_profile" name="add_profile" onsubmit="insertProfile()">
          <?= csrf_field() ?>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="fname" class="col-sm-3 col-form-label text-end">First Name&nbsp;:</label>
                    <div class="col-sm-8">
                        <input class="form-control form-control-sm" type="text" name="fname" id="fname" value="<?= set_value('fname'); ?>" placeholder="Enter Firstname">
                        <small class="text-danger"><?= validation_show_error('fname'); ?></small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="lname" class="col-sm-3 col-form-label text-end">Last Name&nbsp;:</label>
                    <div class="col-sm-8">
                        <input class="form-control form-control-sm" type="text" name="lname" id="lname" value="<?= set_value('lname'); ?>" placeholder="Enter Lastname">
                        <small class="text-danger"><?= validation_show_error('lname'); ?></small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="gender" class="col-sm-3 col-form-label text-end">Gender&nbsp;:</label>
                    <div class="col-sm-8">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" <? if(set_value('gender') == "male"){?> checked ="checked"<?}?> value="male">
                            <label class="form-check-label fw-normal" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" <? if(set_value('gender') == "female"){?> checked ="checked"<?}?> value="female">
                            <label class="form-check-label fw-normal" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender"<? if (set_value('gender')=="others"){?> checked = "checked"<?}?> value= "female">
                            <label class="form-check-label fw-normal" for="others">Others</label>
                        </div>
                        <small class="text-danger"><?= validation_show_error('gender'); ?></small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="dob" class="col-sm-3 col-form-label text-end">Date of Birth&nbsp;:</label>
                    <div class="col-sm-8">
                        <div class="input-group input-group-sm">   
                            <input type="text" class="form-control form-control-sm" id="dob" name="dob" autocomplete="off" placeholder="DD-MM-YYYY" value="<?= set_value('dob') ?>" aria-label="dob">
                            <span class="input-group-text"><span class="bi bi-calendar4-week"></span></span>
                        </div>
                        <small class="text-danger"><?= validation_show_error('dob'); ?></small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="mobile" class="col-sm-3 col-form-label text-end">Mobile&nbsp;:</label>
                    <div class="col-sm-8">
                        <input class="form-control form-control-sm" type="text" name="mobile" id="mobile" value="<?= set_value('mobile'); ?>" maxlength="10" placeholder="Enter Mobile No.">
                        <small class="text-danger"><?= validation_show_error('mobile'); ?></small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fname" class="col-sm-3 col-form-label text-end">Alternate Mobile&nbsp;:</label>
                    <div class="col-sm-8">
                        <input class="form-control form-control-sm" type="text" name="mobile2" id="mobile2" value="<?= set_value('mobile2'); ?>" maxlength="10" placeholder="Enter Alternative Mobile No.">
                        <small class="text-danger"><?= validation_show_error('mobile2'); ?></small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label text-end">Email&nbsp;:</label>
                    <div class="col-sm-8">
                        <input class="form-control form-control-sm" type="text" name="email" id="email" value="<?=set_value('email'); ?>" placeholder="Enter Email">
                        <small class="text-danger"><?= validation_show_error('email'); ?></small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="education" class="col-sm-3 col-form-label text-end">Education&nbsp;:</label>
                    <div class="col-sm-8">
                        <select class="form-select form-select-sm" name="education" id="education">
                            <option value="">Select</option>
                            <?
                            foreach($education as $key => $value){
                                ?>
                                <option <?if(set_value('education') == $value['id']) {?> selected="selected"<?}?>value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                            <?}?>
                        </select>
                        <small class="text-danger"><?= validation_show_error('education'); ?></small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="experience" class="col-sm-3 col-form-label text-end">Experience&nbsp;:</label>
                    <div class="col-sm-8">
                        <div class="input-group input-group-sm">
                            <input class="form-control" type="text" name="experience" id="experience" value="<?= set_value('experience'); ?>" placeholder="Enter Experience">
                            <span class="input-group-text">In Years</span>
                        </div>
                        <small class="text-danger"><?= validation_show_error('experience'); ?></small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="document" class="col-sm-3 col-form-label text-end">Document&nbsp;:</label>
                    <div class="col-sm-8">
                        <input class="form-control form-control-sm" type="file" name="document" id="document" value="<?= set_value('document'); ?>"> 
                        <div class="form-text">.pdf, .doc, .docx files are allowed.</div>
                        <small class="text-danger"><?= validation_show_error('document'); ?></small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="department" class="col-sm-3 col-form-label text-end">Department&nbsp;:</label>
                    <div class="col-sm-8">
                        <select class="form-select form-select-sm" name="department" id="department">
                            <option value="">Select</option>
                            <?
                            foreach ($departments as $key => $value) {
                                ?>
                                <option <?if(set_value('department') == $value['id']) {?> selected="selected"<?}?> value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                            <?}?>
                        </select>
                        <small class="text-danger"><?= validation_show_error('department'); ?></small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="job_category" class="col-sm-3 col-form-label text-end">Job Category&nbsp;:</label>
                    <div class="col-sm-8">
                        <select class="form-select form-select-sm" name="job_category" id="job_category">
                            <option value="">Select</option>
                            <?
                            foreach($job_category as $key => $value) {
                                ?>
                                <option <?if(set_value('job_category') == $value['id']) {?> selected="selected"<?}?> value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                                <?
                            }
                            ?>
                        </select>
                        <small class="text-danger"><?= validation_show_error('job_category'); ?></small>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-sm"><span class="bi bi-plus"></span>&nbsp;Add</button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><span class="bi bi-x"></span>&nbsp;Close</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#dob').datepicker({
            format: 'yyyy-mm-dd',
            endDate: 'today', 
            autoclose: true
        });
    });
</script>
