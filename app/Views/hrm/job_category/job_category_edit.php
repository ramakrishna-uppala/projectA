<?php
/**
 * Edit Job Category
 */
$id_val = isset($job['id']) ? $job['id'] : (isset($_POST['id']) ? $_POST['id'] : '');
$name_val = isset($job['name']) ? $job['name'] : set_value('name');
?>

<div class="modal-dialog">
    <div class="modal-content">
        <form method="post" id="edit_job" onsubmit="return false">
            <?= csrf_field(); ?>
            <input type="hidden" name="id" value="<?= $id_val; ?>">
            <div class="modal-header">
                <h5 class="modal-title fs-5">Edit Job Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row"> 
                    <label for="name" class="col-sm-3 col-form-label text-end">Name<span class="text-danger">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="name" id="name" value="<?= $name_val; ?>">
                        <span class="text-danger"><small><?= validation_show_error('name') ?></small></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" onclick="updateJob()" class="btn btn-success btn-sm"><i class="bi bi-check-square"></i>&nbsp;Update</button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>&nbsp;Close</button>
            </div>
        </form>
    </div>
</div>
