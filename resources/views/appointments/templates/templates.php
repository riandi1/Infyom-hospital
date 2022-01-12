<script id="appointmentActionTemplate" type="text/x-jsrender">
 {{if isDoctor}}
   <a title="<?php echo __('messages.common.edit'); ?>" class="btn action-btn btn-success btn-sm" href="{{:url}}">
            <i class="fa fa-edit action-icon"></i>
   </a>
 {{/if}}
   <a title="<?php echo __('messages.common.view'); ?>" class="btn action-btn btn-primary btn-sm" href="{{:viewUrl}}">
            <i class="fa fa-eye action-icon"></i>
   </a>
   <a title="<?php echo __('messages.common.delete'); ?>" class="btn action-btn btn-danger btn-sm delete-btn" data-id="{{:id}}">
            <i class="fa fa-trash action-icon"></i>
   </a>


</script>

<script id="appointmentStatusTemplate" type="text/x-jsrender">
    <div class="custom-control custom-checkbox ml-2">
        <input type="checkbox" class="custom-control-input status" value="0" data-id="{{:id}}"  id="customControlAutosizing{{:id}}" {{:checked}} />
        <label class="custom-control-label" for="customControlAutosizing{{:id}}"></label>
    </div>

</script>
