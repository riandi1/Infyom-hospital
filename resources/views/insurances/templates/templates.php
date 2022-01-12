<script id="insuranceActionTemplate" type="text/x-jsrender">
   <a title="<?php echo __('messages.common.edit'); ?>" class="btn action-btn btn-success btn-sm" href="{{:url}}">
            <i class="fa fa-edit action-icon"></i>
   </a>
   <a title="<?php echo __('messages.common.delete'); ?>" class="btn action-btn btn-danger btn-sm delete-btn" data-id="{{:id}}">
            <i class="fa fa-trash action-icon"></i>
   </a>


</script>

<script id="insuranceStatusTemplate" type="text/x-jsrender">
    <label class="switch switch-label switch-outline-primary-alt swich-center">
         <input name="status" data-id="{{:id}}" class="switch-input status" type="checkbox" value="1" {{:checked}} >
          <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
    </label>


</script>

<script id="insuranceDiseaseTemplate" type="text/x-jsrender">
<tr>
    <td class="text-center item-number">1</td>
     <td>
        <input class="form-control disease-name" required="" name="disease_name[]" type="text" data-id="{{:uniqueId}}">
    </td>
    <td>
        <input class="form-control disease-charge price-input" required="" name="disease_charge[]" type="text">
    </td>
    </td>
    <td class="text-center">
        <i class="fa fa-trash text-danger delete-disease pointer"></i>
    </td>
</tr>

</script>
