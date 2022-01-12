<script id="ipdPaymentActionTemplate" type="text/x-jsrender">
{{if !isPaymentModeStripe }} 
 <a title="<?php echo __('messages.common.edit'); ?>"  class="btn action-btn btn-success btn-sm ipdpayment-edit-btn" data-id="{{:id}}">
            <i class="fa fa-edit action-icon"></i>
   </a>
{{/if}}
   <a title="<?php echo __('messages.common.delete'); ?>" class="btn action-btn btn-danger btn-sm ipdpayment-delete-btn" data-id="{{:id}}">
            <i class="fa fa-trash action-icon"></i>
   </a>




</script>
