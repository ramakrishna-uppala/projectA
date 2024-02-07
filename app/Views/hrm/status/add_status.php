<?
/**
 * add status
 */
?>
<div class="modal-dialog">
	<div class="modal-content">
		<form method="post" id="addStatusForm" onsubmit="return false">
			<div class="modal-header">
				<h5 class="modal-title fs-5">Add Status</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<label for="name">Name <span class="text-danger">*</span>:</label>
					<div class="col-sm-7">
						<input type="text" name="name" id="name" value="<?= set_value('name');?>">
					</div>
					<small><span class="text-danger"><?= validation_show_error('name') ?></span></small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" onclick="createStatus()" class="btn btn-success btn-sm"><i class="bi bi-plus-square"></i>Add</button>
				<button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>&nbsp;Close</button>
            </div>
        </form>
    </div>
</div>



				




