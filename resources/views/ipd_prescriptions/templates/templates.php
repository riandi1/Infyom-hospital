<script id="ipdPrescriptionActionTemplate" type="text/x-jsrender">
   <a title="<?php echo __('messages.common.edit'); ?>" class="btn action-btn btn-success btn-sm edit-prescription-btn" data-id="{{:id}}">
            <i class="fa fa-edit action-icon"></i>
   </a>
   <a title="<?php echo __('messages.common.delete'); ?>" class="btn action-btn btn-danger btn-sm delete-prescription-btn" data-id="{{:id}}">
            <i class="fa fa-trash action-icon"></i>
   </a>
</script>

<script id="ipdPrescriptionItemTemplate" type="text/x-jsrender">
    <tr>
        <td class="text-center prescription-item-number">1</td>
        <td>
            <select class="form-control categoryId select2Selector" name="category_id[]" placeholder="Select Category" data-id="{{:uniqueId}}" required>
                <option selected="selected" value >Select Category</option>
                {{for medicineCategories}}
                    <option value="{{:key}}">{{:value}}</option>
                {{/for}}
            </select>
        </td>
        <td>
            <select class="form-control medicineId select2Selector" name="medicine_id[]" data-medicine-id="{{:uniqueId}}" disabled></select>
        </td>
        <td>
            <input class="form-control dosage" name="dosage[]" type="text" required>
        </td>
        <td>
            <textarea class="form-control instruction" name="instruction[]" rows="4" required></textarea>
        </td>
        <td class="text-center">
            <i class="fa fa-trash text-danger deleteIpdPrescription pointer" data-edit="0"></i>
        </td>
    </tr>
</script>

<script id="editIpdPrescriptionItemTemplate" type="text/x-jsrender">
    <tr>
        <td class="text-center edit-prescription-item-number" data-item-number="{{:uniqueId}}">1</td>
        <td>
            <select class="form-control categoryId select2Selector" name="category_id[]" placeholder="Select Category" data-id="{{:uniqueId}}" required>
                <option selected="selected" value>Select Category</option>
                {{for medicineCategories}}
                    <option value="{{:key}}">{{:value}}</option>
                {{/for}}
            </select>
        </td>
        <td>
            <select class="form-control medicineId select2Selector" name="medicine_id[]" data-medicine-id="{{:uniqueId}}" disabled></select>
        </td>
        <td>
            <input class="form-control" name="dosage[]" type="text" data-dosage-id="{{:uniqueId}}" required>
        </td>
        <td>
            <textarea class="form-control" name="instruction[]" rows="4" data-instruction-id="{{:uniqueId}}" required></textarea>
        </td>
        <td class="text-center">
            <i class="fa fa-trash text-danger deleteIpdPrescriptionOnEdit pointer" data-edit="1"></i>
        </td>
    </tr>
</script>
