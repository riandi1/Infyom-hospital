<script id="enquiryActionTemplate" type="text/x-jsrender">
   <a title="<?php echo __('messages.common.view'); ?>" class="btn action-btn btn-primary btn-sm" href="{{:url}}">
       <i class="fa fa-eye action-icon"></i>
   </a>

</script>

<script id="enquiryStatusTemplate" type="text/x-jsrender">
    <label class="switch switch-label switch-outline-primary-alt swich-center">
         <input name="status" data-id="{{:id}}" class="switch-input status" type="checkbox" value="1" {{:checked}} >
          <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
    </label>


</script>
