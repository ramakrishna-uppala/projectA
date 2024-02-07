<?php
/**
 * @package HRM
 * Profiles body
 */
$keywords = isset($params['keywords']) ? $params['keywords'] : '';
$pageno = isset($params['pageno']) ? $params['pageno'] : '';
$sort_by = isset($params['sort_by']) ? $params['sort_by'] : 'fname';
$sort_order = ($params['sort_order'] == 'asc') ? 'asc' : 'desc';
$sort_order_alt = $sort_order === 'asc' ? 'desc' : 'asc';
$rows = isset($params['rows']) ? $params['rows'] : 10;
$trecords = $trecords;

$fname_val = isset($_POST['fname']) ? $_POST['fname'] : '';
$profileCode_val = isset($params['code']) ? $params['code'] : '';
$mobile_val = isset($params['mobile']) ? $params['mobile'] : '';
$experience_val = isset($params['experience']) ? $params['experience'] : '';
$created_val = isset($params['created_at']) ? $params['created_at'] : '';
$edu_val = isset($params['edu']) ? $params['edu'] : 0;
$status_val = isset($params['profile']) ? $params['profile'] : 0;
$dept_val = isset($params['department']) ? $params['department'] : 0;
$job_val = isset($params['job']) ? $params['job'] : 0;
$skill_val = isset($params['skill']) ? $params['skill'] : 0;

// Calculating the total pages
$total_pages = ceil($trecords / $rows);

// Calculate the offset 
$offset = ($pageno - 1) * $rows;
?>

<div class="clearfix">
    <div class="float-start d-flex align-items-center">
        <div class="me-1">
            <input type="text" class="form-control form-control-sm" id="keywords" placeholder="Search ..." name="keywords" value="<?= $keywords; ?>">
        </div>
        <div class="me-1">
            <select name="dept_val" class="selectpicker form-control-sm" aria-label="Departments" data-live-search="true" id="dept_val">
                <option value="0" <?= $dept_val == "0" ? "selected" : ""; ?>>Departments</option>
                <?php foreach ($departments as $department) { ?>
                    <option <?= $edu_val == $department['id'] ? "selected" : ""; ?> value="<?= $department['id']; ?>"><?= $department['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="me-1">
            <select name="job_val" class="selectpicker form-control-sm" aria-label="Jobs" data-live-search="true" id="job_val">
                <option value="0" <?= $job_val == "0" ? "selected" : ""; ?>>Jobs</option>
                <?php foreach ($jobs as $job) { ?>
                    <option <?= $job_val == $job['id'] ? "selected" : ""; ?> value="<?= $job['id']; ?>"><?= $job['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="me-1">
            <select name="skill[]" id="skill" class="selectpicker form-control-sm" aria-label="Skills" data-live-search="true" multiple>
                <? foreach ($skills as $skill) { ?>
                    <option <? if (is_array($skill_val) && in_array($skill['id'], $skill_val)) { echo "selected"; } ?> value="<?= $skill['id']; ?>"><?= $skill['name']; ?></option>
                <? } ?>
            </select>
        </div>
        <div class="me-1">
            <button type="button" class="btn btn-sm btn-success" name="search" id="search" onclick="profileBody('<?= $params['rows']; ?>', '<?= $params['pageno']; ?>', '<?= $params['sort_by']; ?>', '<?= $params['sort_order']; ?>')">
                <i class="bi bi-search"></i>
            </button>
            <button class="btn btn-sm btn-warning" onclick="resetprofileBody()"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="me-0">
            <strong>(&nbsp;<?= $trecords; ?> Records&nbsp;)</strong>
        </div>
    </div>
    <div class="float-end d-flex align-items-center">
        <div class="me-1">
            <button class="btn btn-success btn-sm" onclick="AddProfile()">
                <i class="bi bi-plus-square"></i>&nbsp;Add Profile
            </button>
        </div>
        <div class="me-1">
            <select class="form-select form-select-sm" name="rows" id="rows" onchange="profileBody(this.value, '1', 'fname', 'asc')">
                <option value="10" <?= $rows == 10 ? 'selected="selected"' : ''; ?>>10 Records</option>
                <option value="20" <?= $rows == 20 ? 'selected="selected"' : ''; ?>>20 Records</option>
                <option value="50" <?= $rows == 50 ? 'selected="selected"' : ''; ?>>50 Records</option>
                <option value="100" <?= $rows == 100 ? 'selected="selected"' : ''; ?>>100 Records</option>
            </select>
        </div>
        <div class="me-0">
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-sm mb-0">
                    <?php if ($pageno == 1) { ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="javascript:void(0);"><i class="bi bi-chevron-double-left"></i></a>
                        </li>
                        <li class="page-item disabled">
                            <a class="page-link" href="javascript:void(0);"><i class="bi bi-chevron-left"></i></a>
                        </li>
                    <?php } else { ?>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);" onclick="profileBody('<?= $rows; ?>','1','<?= $sort_by; ?>','<?= $sort_order; ?>')"><i class="bi bi-chevron-double-left"></i></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);" onclick="profileBody('<?= $rows; ?>','<?= $pageno - 1; ?>','<?= $sort_by; ?>','<?= $sort_order; ?>')"><i class="bi bi-chevron-left"></i></a>
                        </li>
                    <?php } ?>
                    <li class="page-item active" aria-current="page">
                        <span class="page-link p-0 text-white inv-tracking-select">
                            <select class="form-select form-select-sm" name="rows" onchange="profileBody('<?= $rows; ?>', this.value, '<?= $sort_by; ?>', '<?= $sort_order; ?>', document.getElementById('edu_val').value)">
                                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                    <option value="<?= $i; ?>" <?= $i == $pageno ? 'selected="selected"' : ''; ?>><?= $i . '/' . $total_pages; ?></option>
                                <?php } ?>
                            </select>
                        </span>
                    </li>
                    <?php if ($pageno == $total_pages) { ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="javascript:void(0);"><i class="bi bi-chevron-right"></i></a>
                        </li>
                        <li class="page-item disabled">
                            <a class="page-link" href="javascript:void(0);"><i class="bi bi-chevron-double-right"></i></a>
                        </li>
                    <?php } else { ?>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);" onclick="profileBody('<?= $rows; ?>','<?= $pageno + 1; ?>','<?= $sort_by; ?>','<?= $sort_order; ?>')"><i class="bi bi-chevron-right"></i></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);" onclick="profileBody('<?= $rows; ?>','<?= $total_pages; ?>','<?= $sort_by; ?>','<?= $sort_order; ?>')"><i class="bi bi-chevron-double-right"></i></a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
</div>

<div class="table-responsive candidate-table">
    <table class="table table-bordered mt-2">
        <thead>
            <tr>
                <th>
                    <a href="javascript:void(0)" onclick="profileBody('<?= $rows; ?>', '<?= $pageno; ?>', 'fname', '<?= $sort_order_alt; ?>')">Profile Name
                        <? if($sort_by == 'fname') { echo ($sort_order == 'asc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="profileBody('<?= $rows; ?>','<?= $pageno; ?>','code','<?= $sort_order_alt; ?>')">Profile Code
                        <?if($sort_by =='code') { echo ($sort_order == 'asc') ? '<i class=" bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="profileBody('<?= $rows; ?>','<?= $pageno; ?>','mobile','<?= $sort_order_alt; ?>')">Mobile
                        <?if($sort_by =='mobile') { echo ($sort_order == 'asc') ? '<i class=" bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="profileBody('<?= $rows; ?>','<?= $pageno; ?>','education','<?= $sort_order_alt; ?>')">Education
                        <?if($sort_by =='education') {echo ($sort_order =='asc') ? '<i class="bi-arrow-down"></i>' : '<i class="bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="profileBody('<?= $rows; ?>','<?= $pageno; ?>','experience','<?= $sort_order_alt; ?>')">Experience
                        <?if($sort_by == 'experience') { echo ($sort_order == 'asc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi-arrow-up"></i>';}?>
                    </a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="profileBody('<?= $rows; ?>','<?= $pageno; ?>','created_at','<?= $sort_order_alt; ?>')">Created_Data
                        <?if($sort_by == 'created_at') { echo ($sort_order == 'asc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi-arrow-up"></i>';}?>
                    </a>
                </th>
                <th class="text-center">
                    <a href="javascript:void(0)" onclick="profileBody('<?= $rows; ?>','<?= $pageno; ?>','status','<?= $sort_order_alt; ?>')">Status
                        <?if($sort_by == 'status') { echo ($sort_order == 'asc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi-arrow-up"></i>';}?>
                    </a>
                </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input type="text" class="form-control form-control-sm" name="fname" id="fname_val" value="<?= $fname_val; ?>" placeholder=" Profile Name ">
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" id="profileCode_val" value="<?= $profileCode_val; ?>" name="profileCode" placeholder="Profile Code">
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" id="mobile_val" value="<?= $mobile_val; ?>" name="mobile" placeholder="Mobile">
                </td>
                <td>
                    <select name="edu_val" class="selectpicker form-control-sm" aria-label="Education" data-live-search="true" id="edu_val">
                        <option value="0" <?= $edu_val == "0" ? "selected" : ""; ?>>All</option>
                        <?php foreach ($education as $edu) { ?>
                            <option <?= $edu_val == $edu['id'] ? "selected" : ""; ?> value="<?= $edu['id']; ?>"><?= $edu['name']; ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" id="experience_val" value="<?= $experience_val; ?>" name="experience" placeholder="Experience">
                </td>
                <td>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control form-control-sm" id="created_val" value="<?= $created_val; ?>" name="created_at" placeholder="DD-MM-YYYY">
                        <span class="input-group-text"><i class="bi bi-calendar4-week"></i></span>
                    </div>
                </td>
                <td class="text-center">
                    <select name="status_val" class="selectpicker form-control-sm" aria-label="Status" data-live-search="true" id="status_val">
                        <option value="0" <?= $status_val == "0" ? "selected" : ""; ?>>All</option>
                        <?php foreach ($profilestatus as $profile) { ?>
                            <option <?= $status_val == $profile['id'] ? "selected" : ""; ?> value="<?= $profile['id']; ?>"><?= $profile['name']; ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-success" name="search" id="search" onclick="profileBody('<?= $params['rows']; ?>', '<?= $params['pageno']; ?>', '<?= $params['sort_by']; ?>', '<?= $params['sort_order']; ?>')">
                        <i class="bi bi-search"></i>
                    </button>
                    <button class="btn btn-sm btn-warning" onclick="resetprofileBody()"><i class="bi bi-arrow-clockwise"></i></button>
                </td>
            </tr>
            <?php
            $i = $params['rows'] * ($params['pageno'] - 1) + 1;
            foreach ($profiles as $profile) :
            ?>
                <tr>
                    <!-- <td><?= $profile['fname']; ?></td> -->
                    <td>
                        <a href="javascript:void(0)" onclick="viewProfile(<?= $profile['id']; ?>)">
                            <div class="d-flex align-items-center">
                                <div class="candidate-icon avatars-w-50">
                                    <div class="no-img rounded-circle avatar-shadow me-3">
                                        <?= strtoupper(substr($profile['fname'], 0, 1)) . strtoupper(substr($profile['lname'], 0, 1)); ?>
                                    </div>
                                </div>
                                <div class="candidate-details">
                                    <h5><?= $profile['fname'] . ' ' . $profile['lname']; ?></h5>
                                    <p><?= $profile['email']; ?></p>
                                </div>
                            </div>
                        </a>
                    </td>
                    <td><?= $profile['code']; ?></td>
                    <td><?= $profile['mobile']; ?></td>
                    <td><?= $profile['education_name']; ?></td>
                    <td><?= $profile['experience']; ?></td>
                    <td nowrap><?= displayDate($profile['created_at']); ?></td>
                    <td class="text-center"><?= $profile['status_name']; ?></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="actions_btn" data-bs-toggle="dropdown" aria-expanded="false">Actions</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="viewProfile(<?= $profile['id']; ?>)"><i class="bi bi-eye"></i>&nbsp;View Profile</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="EditProfile(<?= $profile['id']; ?>)"><i class="bi bi-pencil-square"></i>&nbsp;Edit Profile</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="viewSkills(<?= $profile['id']; ?>)"><i class= "bi bi-gear"></i>&nbsp;Manage Skills</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($profiles)) { ?>
                <tr>
                    <td colspan="10" class="bg bg-warning">No Such Records Found</td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>
<!-- Datepicker Initialization Script -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#created_val').datepicker({ format: 'dd-mm-yyyy', endDate: 'today', autoHide: true });
        // $('.selectpicker').selectpicker({
        //     placeholder: "Select"
        // });
    });
    $(function () {
        $('.selectpicker').selectpicker();
    });
</script>