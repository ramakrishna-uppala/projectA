<?

$id_val = isset($edu['id']) ? $edu['id'] : (isset($_POST['id']) ? $_POST['id'] :'');

$name_val = isset($edu['name']) ? $edu['name'] : set_value('name');

?>

<div class='modal-dialog'>
	<div class='modal-content'>
		<form method='post' id='editEducationForm' onsubmit="return false">
			<input type='hidden' name='id' value=<?= $id_val; ?>>
			<div class='modal-header'>
				<h5 class="modal-title fs-5">Edit Education</h5>
				<button type="button" class='btn-close' data-bs-dismiss ='modal' aria-label='close'></button>
			</div>
			<div class='modal-body'> 
				<div class='row'>
					<label for="name">Name<span class='text-danger'>*</span></label>
					<div class='col-sm-7'>
						<input type="text" name='name' id='name' value="<?= $name_val;?> ">						<span class='text-danger'><small><?= validation_show_error('name') ?></small></span>
					</div>
				</div>
			</div>
			<div class='modal-footer'>
				<button type='submit' onclick='updateEducation()' class='btn btn-success btn-sm'>Update</button>
				<button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>&nbsp;Close</button>
			</div>
		</form>
	</div>
</div>


