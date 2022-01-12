<script id="invoiceActionTemplate" type="text/x-jsrender">
   <a title="<?php echo __('messages.common.edit'); ?>" class="btn action-btn btn-success btn-sm" href="{{:url}}">
            <i class="fa fa-edit action-icon"></i>
   </a>
   <a title="<?php echo __('messages.common.delete'); ?>" class="btn action-btn btn-danger btn-sm delete-btn" data-id="{{:id}}">
            <i class="fa fa-trash action-icon"></i>
   </a>

</script>

<script id="invoiceItemTemplate" type="text/x-jsrender">
<tr>
    <td class="text-center item-number">1</td>
    <td class="table__item-desc">
        <select class="form-control accountId" name="account_id[]" placeholder="Select Account" id="enquiry-account-id_{{:uniqueId}}" data-id="{{:uniqueId}}" required>
            <option selected="selected" value=0">Select Account</option>
            {{for accounts}}
                <option value="{{:key}}">{{:value}}</option>
            {{/for}}
        </select>
    </td>
    <td>
        <input class="form-control" name="description[]" type="text">
    </td>
    <td class="table__qty">
        <input class="form-control qty" required="" name="quantity[]" type="number" min="1">
    </td>
    <td>
        <input class="form-control price-input price" required="" name="price[]" type="text">
    </td>
    <td class="amount text-right item-total">
    </td>
    <td class="text-center">
        <i class="fa fa-trash text-danger delete-invoice-item pointer"></i>
    </td>
</tr>

</script>
