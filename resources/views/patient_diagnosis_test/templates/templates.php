<script id="patientDiagnosisTestActionTemplate" type="text/x-jsrender">
   <a title="<?php echo __('messages.common.edit'); ?>" class="btn action-btn btn-success btn-sm" href="{{:url}}">
            <i class="fa fa-edit action-icon"></i>
   </a>
   <a title="<?php echo __('messages.common.delete'); ?>" class="btn action-btn btn-danger btn-sm delete-btn" data-id="{{:id}}">
            <i class="fa fa-trash action-icon"></i>
   </a>



</script>

<script id="patientDiagnosisTestTemplate" type="text/x-jsrender">
<tr>
    <td class="text-center item-number">1</td>
     <td>
        <input class="form-control diagnosis-name" name="property_name[]" type="text" data-id="{{:uniqueId}}">
    </td>
    <td>
        <input class="form-control diagnosis-value" name="property_value[]" type="text">
    </td>
    </td>
    <td class="text-center">
        <i class="fa fa-trash text-danger delete-diagnosis pointer"></i>
    </td>
</tr>



</script>
