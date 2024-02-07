    <?
    /**
     * Profile details
     */
    ?>
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <!--<h5 class="modal-title">Profile details - #<? //echo $profile['code'];?></h5>-->
                <?php if (isset($profile)): ?>
                <h5 class="modal-title">Profile details - #<?= $profile['code'];?></h5>
                <?php endif; ?>


                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="candidate-details-header">
                    <div class="mb-3 d-flex justify-content-between align-items-center" style="background-color: #f9fbff;padding: 1.5rem;border: 1px solid #e4e7ec;border-radius: 0.5rem;">
                        <div class="d-flex align-items-center">
                            <div class="candidate-icon avatars-w-50">
                                 <?php if (isset($profile)): ?>
                                <div class="no-img rounded-circle avatar-shadow me-3"><?= strtoupper(substr($profile['fname'], 0, 1)) . strtoupper(substr($profile['lname'], 0, 1));?> 
                                </div> 
                            </div>
                            <div class="candidate-details">
                                <h5><?= $profile['fname'] . ' ' . $profile['lname'];?> </h5>
                               
                                <p class="text-muted mb-0"><?= $profile['email']; ?></p> 
                                <p class="text-muted mb-0"><?= $profile['code']; ?></p>
                            <?php endif;?>
                            </div>
                        </div>
                        
                        <!-- Profile status details-->
                        
                        <div class="d-flex align-items-center" id="change-status">
                              <?php if (isset($profile)): ?>
                            <div class="status status-2 me-1"<? echo $profile['status']; ?> style="padding: 11px 15px;"><? echo $profile['profile_status_name']; ?></div>
                            

                            
                            <div class="dropdown">
                                <a href="#" class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Change Status</a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <?
                                    foreach($profile_status as $p_key => $p_status){
                                        $dis_class = '';
                                        if(!empty($profile_status_history)){
                                            if (in_array($p_status['id'],$profile_status_history)){
                                                $dis_class = 'disabled';
                                            }
                                        }


                                    ?>
                                            <li class="">
                                                <a class="dropdown-item d-flex align-items-center"<? echo $dis_class;?> href="javascript:void(0)" onclick="changeProfileStatus(<? print $profile['id']; ?>,<? print $p_status['id']; ?>)">
                                                <span class="fs-5 mdi mdi-star-circle-outline"></span>&nbsp;<? echo $p_status['name']; ?></a>    
                                            </li>
                                    <?php } ?>
                                </ul>
                            
                        
                            </div>
                        
                        </div>
                    </div>
                </div>
                <!-- change status profile-->
                        <form id="status-note-form">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="note-card mb-2">
                                        <div class="row mb-3">
                                            <label for="notes" class="col-sm-4 col-form-label d-flex align-items-center justify-content-end">Add Notes&nbsp;</label>
                                           <div class="col-sm-8">
                                            <textarea class="form-control" id="notes" name="notes" class="" placeholder="Add notes here"></textarea>
                                            <div id="note-alert"></div>
                                            <input type="hidden" name="pid" id="pid" value="<?php echo isset($params['pid']) ? $params['pid'] : ''; ?>">
                                            <input type="hidden" name="sid" id="sid" value="<?php echo isset($params['sid']) ? $params['sid'] : ''; ?>">

                                           </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-end">
                                            <button type="button" class="btn btn-sm btn-primary" onclick="updateProfileStatus()"><span class="mdi mdi-plus"></span>&nbsp;Update</button>
                                            <button type="button" class="btn btn-sm btn-warning" onclick="cancelStatusUpdate()"><span class="mdi mdi-close"></span>&nbsp;Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true"> Profile Details</button>
                        <button class="nav-link" id="nav-attachment-tab" data-bs-toggle="tab" data-bs-target="#nav-attachment" type="button" role="tab" aria-controls="nav-attachment" aria-selected="false">Attachments</button>
                        <button class="nav-link" id="nav-note-tab" data-bs-toggle="tab" data-bs-target="#nav-note" type="button" role="tab" aria-controls="nav-note" aria-selected="false"> Notes</button>
                        <button class="nav-link" id="nav-event-tab" data-bs-toggle="tab" data-bs-target="#nav-event" type="button" role="tab" aria-controls="nav-event" aria-selected="false">Events</button>
                        <button class="nav-link" id="nav-timeline-tab" data-bs-toggle="tab" data-bs-target="#nav-timeline" type="button" role="tab" aria-controls="nav-timeline" aria-selected="false">Timeline</button>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                        <? //if($profile) {
                         ?>
                            <div class="row">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <div class="table-responsive candidate-table" style="background-color: #f9fbff;">
                                        <table class="table">
                                            <tbody>

                                                <tr>
                                                    <td class="text-muted width-150">Name</td>
                                                    <td width="1%">:</td> 
                                                    <td><? echo (isset($profile['fname']) ? $profile['fname'] : 'N/A') .' '. (isset($profile['lname']) ? $profile['lname']: '') ?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>Email</td>
                                                    <td>:</td>
                                                    <td><? echo isset($profile['email']) ? $profile['email'] : 'N/A'; ?></td>
                                                </td>
                                                </tr>
                                                <tr>
                                                    <td>Gender</td>
                                                    <td>:</td>
                                                    <td><? echo isset($profile['gender']) ? $profile['gender'] : 'N/A'; ?></td>
                                                </td>
                                                </tr>
                                                <tr>
                                                    <td>Date of birth</td>
                                                    <td>:</td>
                                                    <td><? echo isset($profile['dob']) ? displaydate($profile['dob']) : 'N/A'; ?>
                                                    
                                                    </td>

                                                </tr>
                   
                                                <tr>
                                                    <td>Mobile No</td>
                                                    <td>:</td>
                                                    <td><? echo isset($profile['mobile']) ? $profile['mobile'] : 'N/A'; ?></td>
                                                </td>
                                                </tr>
                                                <tr>
                                                    <td> Alt.Mobile No</td>
                                                    <td>:</td>
                                                    <td><? echo isset($profile['mobile2']) ? $profile['mobile2'] : 'N/A'; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                    <td>Education</td>
                                                    <td>:</td>
                                                    <td><? if (isset($profile['education_name'])) {
                                                        echo $profile['education_name'];
                                                    } else {
                                                        echo 'N/A';
                                                    }
                                                    ?>
                                                </td>
                                                </tr>
                                                <tr>
                                                    <td>Experience</td>
                                                    <td>:</td>
                                                    <td><? echo isset($profile['experience']) ? $profile['experience'] : 'N/A';?></td>
                                                </tr>

                                                
                                                <tr>
                                                   <td>Department</td>
                                                   <td>:</td>
                                                   <td><?  echo isset($profile['department_name']) ? $profile['department_name'] : 'N/A';
                                                    ?>
                                                        
                                                    </td>

                                                </tr>

                                                <tr>
                                                   <td>Job Category</td>
                                                   <td>:</td>
                                                   <td>
                                                   <?
                                                   echo isset($profile['job_category_name']) ? $profile['job_category_name']:'N/A';?>
                                                
                                                   </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted width-150">Attachment</td>
                                                    <td>:</td>
                                            

                                                    </tr>

                                                        
                                                        


                                                <tr>
                                                    <td>Created_by</td>
                                                    <td>:</td>
                                                    <td><?
                                                        if(isset($profile['created_by']) and !empty($profile['created_by'])) {
                                                            echo date('d-m-Y', strtotime($profile['created_by']));
                                                        }
                                                        else {
                                                            echo 'N/A';
                                                        }
                                                        ?>
                                                            
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Status</td>
                                                    <td>:</td>
                                                    <td>
                                                    <?
                                                if (isset($profile['profile_status_name'])) {
                                                   echo $profile['profile_status_name'];
                                                } else {
                                                echo 'N/A';
                                                }
                                                ?>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?
                       // }
                        ?>
                    </div>
                    <div class="tab-pane fade" id="nav-attachment" role="tabpanel" aria-labelledby="nav-attachment-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="nav-note" role="tabpanel" aria-labelledby="nav-note-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="nav-event" role="tabpanel" aria-labelledby="nav-event-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="nav-timeline" role="tabpanel" aria-labelledby="nav-timeline-tab" tabindex="0">
                    <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                        <div id="pf-timeline">
                            <?php
                                //print "<pre>"; print_r($profile_timeline); print "</pre>";
                                if(isset($profile_timeline)) {
                                    foreach($profile_timeline as $key => $line_item) {
                                        // print_r($line_item);
                                        ?>
                                        <div class="dot-success vertical-timeline-element">
                                            <div>
                                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                                <div class="vertical-timeline-element-content bounce-in">
                                                    <p><?php echo date('d-m-Y H:i:s', strtotime($line_item['created_at']));?></p>
                                                    <p><?php echo $line_item['name'];?></p>

                                                    <h4 class="timeline-title"><?php echo $line_item['note']; ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><span class="bi bi-x-lg"></span>&nbsp;Close</button>
            </div>
        </div>
    </div>
<style type="text/css">
      .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        background-color: #ebeffe !important;
        border-color: #4466f2 !important;
        color: #4466f2 !important;
    }
    .nav-tabs .nav-link {
        border-bottom: 2px solid transparent;
        border-bottom-color: transparent;
        height: 100%;
        border-top: none;
        border-left: none;
        border-right: none;
        border-radius: 0rem;
        color: #000000;
    }
    .width-150 {
        width: 150px !important;
    }
    .nav-tabs {
        border-bottom: 1px solid #f0f2f5;
    }
</style>
<?php endif; ?>


