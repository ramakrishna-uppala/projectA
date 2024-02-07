<?php
/**
 * Add Event
 */
?>
<div class="modal-dialog">
    <div class="modal-content">
        <form method="post" id="add_event" onsubmit="return false">
            <?= csrf_field(); ?>
            <div class="modal-header">
                <h5 class="modal-title fs-5">Add Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <label for="name" class="col-sm-3 col-form-label text-end">Event&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="name" id="name" value="<?= set_value('name'); ?>">
                        <span class="text-danger"><small><?= validation_show_error('name') ?></small></span>
                    </div>
                </div>   
            </div>
            <div class="modal-footer">
                <button type="submit" onclick="insertEvent()" class="btn btn-success btn-sm"><i class="bi bi-plus-square"></i>&nbsp;Add</button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>&nbsp;Close</button>
            </div>
        </form>
    </div>
</div>
