<script id="issuedItemStatusTemplate" type="text/x-jsrender">
    <a title="{{:statusText}}" href="javascript:void(0)" class="btn action-btn btn-{{:statusBadge}} btn-sm changes-status-btn text-white" data-id="{{:id}}" data-status="{{:status}}">
         {{:statusText}}
    </a>


</script>

<script id="issuedItemActionTemplate" type="text/x-jsrender">
    <a title="<?php echo __('messages.common.delete'); ?>" class="btn action-btn btn-danger btn-sm delete-btn" data-id="{{:id}}">
         <i class="fa fa-trash action-icon"></i>
    </a>


</script>
