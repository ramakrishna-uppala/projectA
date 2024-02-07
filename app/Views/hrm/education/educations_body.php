<?
/**
 * @package HRM
 * Education Body View
 */

$keywords = isset($params['keywords']) ? $params['keywords'] : '' ;
//$page_no = isset($params['page_no']) ? $params['page_no'] : '' ;
//$sort_by = isset($params['sort_by']) ? $params['sort_by'] : '';
//$sort_order = isset($params['sort_order']) ? $params['sort_order'] : '';
//$rows = isset($params['rows']) ? $params['rows'] : '';
//$total_educations = sizeof($education);

?>
<div>
    <div class="float-start d-flex align-items-center">
        <div class="me-1">
            <input class="form-control form-control-sm me-1 " type="text" id="keywords" name="keywords" value="<?= $keywords; ?>" placeholder="Search here">
        </div>
    </div>
    <button type="button" class="btn btn-sm btn-success" name="search" id="search" onclick="educationBody()"><i class="bi bi-search"></i></button>
    <button type="button" class="btn btn-sm btn-primary"  name="search" id="search"><i class=" bi bi-arrow-clockwise"></i>
    </button>
    <div class="mt-2">
       <p>[Records: <?= $total_educations; ?>]</p>
   </div>
    <div class="float-end me-1">
        <button  type="button" href="javascript:void(0)" class="btn btn-success btn-sm" onclick="addEducation()"><i class="bi bi-plus-square"></i>&nbsp;Add Education</button>
    </div>
<table class="table table-bordered mt-1">
    <thead>
        <tr>
            <th width="2%">S.No</th>
            <th>Name</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>            
    </thead>
    <tbody>
        <? $i = 1; ?>
        <? foreach ($education as $edu): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $edu['name'] ?></td>
                <td><? if ($edu['status'] == 1): ?>
                <span class="badge rounded-pill text-bg-success">Enabled</span>
            <? else:?>
                <span class="badge rounded-pill text- bg-warning">Disabled</span>
            <? endif;?>
                    
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary" href="javascript:void(0)" onclick="editEducation(<?= $edu['id']; ?>)"><i class="bi bi-pencil-square "></i></button>
                    <button type="button" class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="deleteEducation(<?= $edu['id']; ?>)"><i class="bi bi-trash"></i></button>
                 
                    <? if ($edu['status'] == '1') { ?>
                    <button type="button" class="btn btn-sm " onclick="changeStatus(<?= $edu['id']; ?>, '0')" style="background-color:orange;"><i class="bi bi-x"></i></button>
                <? } else {?>
                    <button type="button" class="btn btn-sm btn-success" onclick="changeStatus(<?= $edu['id']; ?>, '1')"><i class="bi bi-check"></i></button>
                <? } ?>

                </td>
            </tr>
        <? endforeach; ?>
    </tbody>
</table>
</div>        

