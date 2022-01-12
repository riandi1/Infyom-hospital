<script id="bedActionTemplate" type="text/x-jsrender">
   <a title="<?php echo __('messages.common.edit'); ?>" class="btn action-btn btn-success btn-sm edit-btn" data-id="{{:id}}">
            <i class="fa fa-edit action-icon"></i>
   </a>
   <a title="<?php echo __('messages.common.delete'); ?>" class="btn action-btn btn-danger btn-sm delete-btn" data-id="{{:id}}">
            <i class="fa fa-trash action-icon"></i>
   </a>




</script>
<script id="bulkBedActionTemplate" type="text/x-jsrender">
    <tr>
        <td class="text-center item-number">1</td>
        <td>
            <input name="name[]" type="text" class="form-control bedName" required>
        </td>
        <td>
            <select class="form-control bedType" name="bed_type[]" placeholder="Select Bed Type" id="bulk-bed-id_{{:uniqueId}}" data-id="{{:uniqueId}}" required>
                <option selected="selected" value >Select Bed Type</option>
                {{for bedTypes}}
                    <option value="{{:key}}">{{:value}}</option>
                {{/for}}
            </select>
        </td>
        <td>
            <input name="charge[]" type="text" class="form-control charge price-input" required>
        </td>
        <td>
            <textarea name="description[]" type="text" class="form-control description" rows="3"></textarea>
        </td>
        <td class="text-center">
            <i class="fa fa-trash text-danger delete-invoice-item pointer"></i>
        </td>
    </tr>





</script>
