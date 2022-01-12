<script id="ipdPatientActionTemplate" type="text/x-jsrender">
 {{if !bill_status}}
   <a title="<?php echo __('messages.common.edit'); ?>" href="{{:url}}" class="btn action-btn btn-success btn-sm edit-ipd-patient-btn" data-id="{{:id}}">
            <i class="fa fa-edit action-icon"></i>
   </a>
   {{/if}}
   <a title="<?php echo __('messages.common.delete'); ?>" class="btn action-btn btn-danger btn-sm delete-btn" data-id="{{:id}}">
            <i class="fa fa-trash action-icon"></i>
   </a>



</script>
