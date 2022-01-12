<script id="opdPatientActionTemplate" type="text/x-jsrender">
   <a title="<?php echo __('messages.common.delete'); ?>" class="btn action-btn btn-danger btn-sm delete-btn" data-id="{{:id}}">
            <i class="fa fa-trash action-icon"></i>
   </a>




</script>

<script id="opdVisitsActionTemplate" type="text/x-jsrender">
   <a title="<?php echo __('messages.common.edit'); ?>" href="{{:url}}" class="btn action-btn btn-success btn-sm edit-opd-patient-btn">
       <i class="fa fa-edit action-icon"></i>
   </a>
   <a title="<?php echo __('messages.common.delete'); ?>" class="btn action-btn btn-danger btn-sm delete-visit-btn" data-id="{{:id}}">
            <i class="fa fa-trash action-icon"></i>
   </a>

</script>
