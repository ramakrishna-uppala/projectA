<?php
/**
 * Event_Body
 * Table List
 */
$keywords = isset($params['keywords']) ? $params['keywords'] : '';
$pageno = isset($params['pageno']) ? $params['pageno'] : '';
$sort_by = ($params['sort_by']);
$sort_order_alt = ($params['sort_order'] == 'asc') ? 'desc' : 'asc';
$sort_order = ($params['sort_order'] == 'asc') ? 'asc' : 'desc';
$rows = $params['rows'];
?>

<div class="float-start">
    <div class="me-1">
        <input class="form-control form-control-sm me-1" type="text" id="keywords" name="keywords" value="<?= $keywords; ?>" placeholder="Search Keywords...">
    </div>
</div>
<button type="button" class="btn btn-sm btn-success" name="search" id="search" onclick="eventBody('<?= $rows; ?>', '<?= $pageno; ?>', '<?= $sort_by; ?>', '<?= $sort_order; ?>')"><i class="bi bi-search"></i></button>

<button type="button" class="btn btn-sm btn-primary" name="search" id="reset" onclick="resetEventBody()"><i class="bi bi-arrow-clockwise"></i></button>
<div class="float-end me-1">
    <button class="btn btn-success btn-sm" onclick="addEvent()"><i class="bi bi-plus-square"></i>&nbsp;Add Event</button>
</div>
<table class="table table-bordered mt-2">
    <thead>
        <tr>
            <th width="1">S.No</th>
            <th>
                <a href="javascript:void(0)" onclick="eventBody('<?php echo $rows; ?>', '1', 'name', '<?php echo $sort_order_alt; ?>')">Name</a>
            </th>
            <th>
                <a href="javascript:void(0)" onclick="eventBody('<?php echo $rows; ?>', '1', 'status','<?php echo $sort_order_alt; ?>')">Status</a>
            </th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($events as $event) :
        ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $event['name']; ?></td>
            <td>
                <?php if ($event['status'] == '1') { ?>
                    <span class="badge text-bg-success"><i class="bi bi-check"></i>Enabled</span>
                <?php } else { ?>
                    <span class="badge text-bg-warning"><i class="bi bi-x"></i>Disabled</span>
                <?php } ?>
            </td>
            <td>
                <button class="btn btn-sm btn-primary" onclick="editEvent(<?= $event['id']; ?>)">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <button class="btn btn-sm btn-danger" onclick="deleteEvent(<?= $event['id']; ?>)">
                    <i class="bi bi-trash"></i>
                </button>
                <?php if ($event['status'] == '1') { ?>
                    <button class="btn btn-sm btn-warning" onclick="changeStatusEvent(<?= $event['id']; ?>, '0')">
                        <i class="bi bi-x"></i>
                    </button>
                <?php } else { ?>
                    <button class="btn btn-sm btn-success" onclick="changeStatusEvent(<?= $event['id']; ?>, '1')">
                        <i class="bi bi-check"></i>
                    </button>
                <?php } ?>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php if (empty($events)){?>
            <tr>
                <td colspan="3" class="bg bg-warning">No Records Found</td>
            </tr>
        <?php } ?>
    </tbody>
</table>
