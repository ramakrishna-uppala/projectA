<?
/**
 * @package HRM
 * ProfileStatus Body View
 */
$keywords = isset($params['keywords']) ? $params['keywords'] :'';
$page_no = isset($params['page_no']) ? $params['page_no'] : 1;
$sort_by = isset($params['sort_by']) ? $params['sort_by'] : 'name';
$sort_order = isset($params['sort_order']) ? $params['sort_order'] : 'ASC';
$rows = isset($params['rows']) ? $params['rows'] : 10;
$total_pages = ceil($total_profiles/$rows);

?>
<div class="clearfix">
    <div class="float-start d-flex align-items-center">
        <div class="me-1">
	     <input type="text" class="form-control form-control-sm" name="keywords" id="keywords" placeholder="Search here..." value="<? print $keywords; ?>">
	    </div>
        <div class="me-1">
	        <div>
	            <button type="button" class="btn btn-sm btn-success" name="search" id="search" onclick="profileBody('<? print $rows; ?>', '<? print $page_no; ?>', '<? print $sort_by ?>', '<? print $sort_order; ?>')"><i class="bi bi-search"></i></button>
	        </div>
        </div>
                <button type="button" class="btn btn-sm btn-primary" name="search" id="search"><i class=" bi bi-arrow-clockwise"></i></button>
        <div class="mt-2">
	         <p>[Records: <?= $total_profiles;?>]</p>
        </div>
    </div>
    <div class="float-end d-flex align-items-center">
    	<div class="me-1">
    		<div>

	            <button type="button" href="javascript:void(0)" class="btn btn-success btn-sm"  onclick="addStatus()"><i class="bi bi-plus-square "></i>&nbsp;Add Status</button>
	        </div>
        </div>
        
    </div>
</div>

<table class="table table-bordered mt-1">
	<thead>
		<tr>
		    <th width="2%">S.No</th>
	        <th>Name</th>
	        <th>Status</th>
	        <th>Position</th>
	        <th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<? $i = 1; ?>
		<? foreach($profilestatus as $profile): ?>
			<tr>
			    <td><?= $i++;?></td>
			    <td><?= $profile['name'];?></td>
			    <td><? if($profile['status'] == 1) : ?>
				<span class="badge rounded-pill text-bg-success">Enabled</span>
			<? else:?>
				<span class="badge rounded-pill text- bg-warning">Disabled</span>
			<? endif;?>
		        </td>
		        <td>
                <button type="button" class="btn btn-sm btn-primary" onclick="movePositionUp(<?= $profile['id']; ?>, <?= $profile['position']; ?>)">Up</button>
                <button type="button" class="btn btn-sm btn-secondary" onclick="movePositionDown(<?= $profile['id']; ?>, <?= $profile['position']; ?>)">Down</button></td>
                <td>
				    <button type="button" class="btn btn-sm btn-primary" href="javascript:void(0)" onclick="editStatus(<?= $profile['id'];?>)"><i class="bi bi-pencil-square"></i></button>
				    <button type="button" class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="deleteStatus(<?= $profile['id'];?>)"><i class="bi bi-trash"></i></button>

	  	        <? if($profile['status'] == '1') { ?>
				    <button type="button" class="btn btn-sm" onclick="changeStatus(<?= $profile['id']; ?>,'0')" style="background-color:orange;"><i class="bi bi-x"></i></button>
					<? } else {?>
				    <button type="button" class="btn btn-sm btn-success" onclick="changeStatus(<?= $profile['id']; ?>, '1')"><i class="bi bi-check"></i></button>
					<? } ?>
					
				</td>
			</tr>
	        <?endforeach;?>
	</tbody>
</table>