<?php
/**
 * Manage skills
 */
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Manage Profile Skills</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- <form name="manage_skills_form" id="manage_skills_form" method="post" onsubmit="manageSkills()"> -->

            <div class="modal-body" id="view_skills_body">
                <?= view('hrm/profiles/view_skills_body'); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><span class="bi bi-x"></span>&nbsp;Close</button>
            </div>
        </form>
    </div>
    </div>
</div>

<script type="text/javascript">
function removeSkills(profileId, skillId) {
    $.post(WEBROOT + 'hrm/profiles/removeSkills', { "profile_id": profileId, "skill_id": skillId }, function (data) {
        $("#view_skills_body").html(data);
    });
}

function addSkills(profileId, skillId) {
    $.post(WEBROOT + 'hrm/profiles/addSkills', { "profile_id": profileId, "skill_id": skillId }, function (data) {
        $("#view_skills_body").html(data);
    });
}
</script>