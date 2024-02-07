<?php
/**
 * department_body
 * Table List
 */
$keywords = isset($params['keywords']) ? $params['keywords'] : '';
$pageno = isset($params['pageno']) ? $params['pageno'] : '';
$sort_by = isset($params['sort_by']) ? $params['sort_by'] : '';
$sort_order = isset($params['sort_order']) ? $params['sort_order'] : '';
$rows = isset($params['rows']) ? $params['rows'] : '';
?>
<div>
    <div class="float-start">
        <div class="me-1">
            <input class="form-control form-control-sm me-1" type="text" id="keywords" name="keywords" value="<?= $keywords; ?>" placeholder="Search here...">
        </div>
    </div>
    <button type="button" class="btn btn-sm btn-success"  name="search" id="search" onclick="departmentBody('<?= $rows; ?>', '<?= $pageno; ?>', '<?= $sort_by; ?>', '<?= $sort_order; ?>')"><i class="bi bi-search"></i></button>
    <button type="button" class="btn btn-sm btn-primary" name="search" id="reset" onclick="resetDepartmentBody()"><i class="bi bi-arrow-clockwise"></i></button>

    <strong>(<?= $tRecords; ?> Records)</strong>
    <div class="float-end me-1">
        <button class="btn btn-success btn-sm" onclick="addDepartment()"><i class="bi bi-plus-square"></i>&nbsp;Add Department</button>
    </div>
    <table class="table table-bordered mt-2">
        <thead>
            <tr>
                <th width="1">S.No</th>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>            
        </thead>
        <tbody>
        <?php
            $i = 1;
            foreach ($departments as $department) :
        ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $department['name']; ?></td>
            <td><?php if ($department['status'] == '1') { ?>
                    <span class="badge text-bg-success"><i class="bi bi-check"></i>Enabled</span>
                <?php } else {?>
                    <span class="badge text-bg-warning"><i class="bi bi-x"></i>Disabled</span>
                <?php } ?>
            <td>
                <button class="btn btn-sm btn-primary" onclick="editDepartment(<?= $department['id']; ?>)"><i class="bi bi-pencil-square"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteDepartment(<?= $department['id']; ?>)"><i class="bi bi-trash"></i></button>

                <?php if ($department['status'] == '1') { ?>
                    <button class="btn btn-sm btn-warning" onclick="changeStatusDepartment(<?= $department['id']; ?>, '0')"><i class="bi bi-x"></i></button>
                <?php } else {?>
                    <button class="btn btn-sm btn-success" onclick="changeStatusDepartment(<?= $department['id']; ?>, '1')"><i class="bi bi-check"></i></button>
                <?php } ?>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php if (empty($departments)){?>
            <tr>
                <td colspan="3" class="bg bg-warning">No Records Found</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
