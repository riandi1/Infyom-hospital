<script id="billActionTemplate" type="text/x-jsrender">
   <a title="<?php echo __('messages.common.edit'); ?>" class="btn action-btn btn-success btn-sm" href="{{:url}}">
            <i class="fa fa-edit action-icon"></i>
   </a>
   <a title="<?php echo __('messages.common.delete'); ?>" class="btn action-btn btn-danger btn-sm delete-btn" data-id="{{:id}}">
            <i class="fa fa-trash action-icon"></i>
   </a>


</script>

<script id="billItemTemplate" type="text/x-jsrender">
<tr>
    <td class="text-center item-number">1</td>
    <td class="table__item-desc">
        <input class="form-control itemName" required="" name="item_name[]" type="text">
    </td>
    <td class="table__qty">
        <input class="form-control qty quantity" required="" name="qty[]" type="number">
    </td>
    <td>
        <input class="form-control price-input price" required="" name="price[]" type="text">
    </td>
    <td class="amount text-right itemTotal">
    </td>
    <td class="text-center">
        <i class="fa fa-trash text-danger delete-invoice-item pointer"></i>
    </td>
</tr>
</script>
