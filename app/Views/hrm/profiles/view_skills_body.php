<?php
/**
 * Manage skill List
 */
// temp condition
$profileId = (empty($profileId)) ? $id : $profileId;

// Skill array preparation
$skills_data = array();
foreach ($skills as $row) {
    $skills_data[$row['id']] = $row['name'];
}
?>
<div class="profile-sub-title mb-2"><h3>Assigned Skills&nbsp;:</h3></div>
<div class="row">
    <!-- Assigned Skills -->
    <?php if (isset($assignedSkills) && !empty($assignedSkills)) {
        foreach ($assignedSkills as $id => $data) { ?>
            <div class="col-md-4 col-sm-6">
                <span class="badge rounded-pill text-bg-danger badge-skill manage-skill-badge">
                    <!-- <span class="mdi mdi-school"></span>&nbsp;Python&nbsp;
                    <a href="javascript:void(0)" title="Remove" onclick="removeProfileSkill(60,2)" class="text-white"><span class="mdi mdi-close-outline"></span></a> -->
                    <span class="bi bi-mortarboard-fill">&nbsp;</span>&nbsp;<?= $data['skill_name']; ?>&nbsp;
                    <a href="javascript:void(0)" onclick="removeSkills(<?= $profileId; ?>, <?= $data['id']; ?>)"><i class="bi bi-x-lg"></i></a>
                </span>
            </div>
        <?php }
    } else { ?>
        <div class="col-sm-12">
            <div class="alert alert-warning">No Records Found</div>
        </div>
    <?php } ?>
</div>
<div class="hr1"></div>
<div class="profile-sub-title mb-2"><h3>Skills&nbsp;:</h3></div>
<div class="row">
    <!-- Skills -->
    <?php
    $skillsFound = false; // flag to check if any skills are found

    foreach ($skills_data as $id => $name) {
        // check if the skill is already assigned
        $isAssigned = false;

        foreach ($assignedSkills as $assignedSkill) {
            if ($assignedSkill['skill_name'] === $name) {
                $isAssigned = true;
                break;
            }
        }

        if (!$isAssigned) {
            $skillsFound = true; // set the flag to true if at least one skill is found
            ?>
            <div class="col-md-4 col-sm-6">
                <span class="badge rounded-pill text-bg-success badge-skill manage-skill-badge">
                <span class="bi bi-mortarboard-fill">&nbsp;</span>&nbsp;<?= $name ?>&nbsp;
                <!-- Adding a link to the addSkills function with the skill ID -->
                <a href="javascript:void(0)" onclick="addSkills(<?= $profileId; ?>, <?= $id; ?>)"><i class="bi bi-plus-lg"></i></a>
            </div>
        <?php }
    }

    if (!$skillsFound) { // displaying a message if there are no skills are found
        ?>
        <div class="col-sm-12">
            <div class="alert alert-warning">No Skills Found</div>
        </div>
    <?php } ?>
</div>


