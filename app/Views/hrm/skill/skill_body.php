<?php
/**
 * skill_body
 * Table View
 */
$keywords = isset($params['keywords']) ? $params['keywords'] : '' ;
$totalSkills = sizeof($skills);

?>
<div>
    <div class="float-start align-items-center">
        <div class="me-1">
            <input  type="text" id="keywords" name="keywords" value="<?= $keywords; ?>" placeholder="Search here...">
        </div>
    </div>
    <button type="button" class="btn btn-sm btn-success"  name="search" id="search" onclick="skillBody()"><i class="bi bi-search"></i>
    </button>
    <div class="mt-2">
       <p>{Records: <?= $totalSkills; ?>}</p>
   </div>
    <div class="float-end me-1">
        <a href="javascript:void(0)" class="btn btn-success btn-sm" onclick="addSkill()"><i class=" bi-plus-square"></i>&nbsp;Add Skill</a>
    </div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th width="1%">S.No</th>
            <th>Name</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>            
    </thead>
    <tbody>
        <? $i = 1; ?>
        <? foreach ($skills as $skill): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $skill['name'] ?></td>
                <td>
                        <? if ($skill['status'] == 1): ?>
                            <span class="badge bi-check text-bg-success">Enable</span>
                        <? else: ?>
                            <span class="badge bi-x text-bg-warning">Disabled</span>
                        <? endif; ?>
                    </td>
                <td>
                    <a class="btn btn-sm btn-primary" href="javascript:void(0)" onclick="editSkill(<?= $skill['id']; ?>)"><i class="bi-pencil-square"></i></a>
                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="deleteSkill(<?= $skill['id']; ?>)"><i class=" bi-trash"></i></a>
                 
                     <? if ($skill['status'] == '1') { ?>
                    <button class="btn btn-sm btn-warning" onclick="changeSkillStatus(<?= $skill['id']; ?>, '0')"><i class="bi-x"></i></button>
                <? } else {?>
                    <button class="btn btn-sm btn-success" onclick="changeSkillStatus(<?= $skill['id']; ?>, '1')"><i class="bi-check"></i></button>
                <? } ?>

                </td>
            </tr>
        <? endforeach; ?>
    </tbody>
</table>
</div>        
