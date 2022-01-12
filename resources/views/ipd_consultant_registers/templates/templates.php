<script id="ipdConsultantRegisterActionTemplate" type="text/x-jsrender">
   <a title="<?php echo __('messages.common.edit'); ?>" class="btn action-btn btn-success btn-sm edit-consultant-btn" data-id="{{:id}}">
            <i class="fa fa-edit action-icon"></i>
   </a>
   <a title="<?php echo __('messages.common.delete'); ?>" class="btn action-btn btn-danger btn-sm delete-consultant-btn" data-id="{{:id}}">
            <i class="fa fa-trash action-icon"></i>
   </a>



</script>

<script id="ipdConsultantInstructionItemTemplate" type="text/x-jsrender">
    <tr>
        <td class="text-center item-number consultant-table-td">1</td>
        <td class="consultant-table-td position-relative">
            <input class="form-control appliedDate" name="applied_date[]" type="text" autocomplete="off" required>
        </td>
        <td class="consultant-table-td">
            <select class="form-control doctorId select2Selector" name="doctor_id[]" placeholder="Select Doctor" data-id="{{:uniqueId}}" required>
                <option selected="selected" value=0">Select Doctor</option>
                {{for doctors}}
                    <option value="{{:key}}">{{:value}}</option>
                {{/for}}
            </select>
        </td>
        <td class="consultant-table-td position-relative">
            <input class="form-control instructionDate" name="instruction_date[]" type="text" autocomplete="off" required>
        </td>
        <td class="consultant-table-td">
            <textarea class="form-control" name="instruction[]" rows="4" required></textarea>
        </td>
        <td class="text-center consultant-table-td">
            <i class="fa fa-trash text-danger deleteIpdConsultantInstruction pointer"></i>
        </td>
    </tr>



</script>
