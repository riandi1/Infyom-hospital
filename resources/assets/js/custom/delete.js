'use strict';

window.deleteItem = function (url, tableId, header, callFunction = null) {
    swal({
            title: 'Delete !',
            text: 'Are you sure want to delete this "' + header + '" ?',
            type: 'warning',
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            confirmButtonColor: '#5cb85c',
            cancelButtonColor: '#d33',
            cancelButtonText: 'No',
            confirmButtonText: 'Yes',
        },
        function () {
            deleteItemAjax(url, tableId, header, callFunction = null)
        })
};

function deleteItemAjax(url, tableId, header, callFunction = null) {
    $.ajax({
        url: url,
        type: 'DELETE',
        dataType: 'json',
        success: function (obj) {
            if (obj.success) {

                if ($(tableId).DataTable().data().count() == 1) {
                    $(tableId).DataTable().page('previous').draw('page');
                } else {
                    $(tableId).DataTable().ajax.reload(null, false);
                }
            }
            swal({
                title: 'Deleted!',
                text: header + ' has been deleted.',
                type: 'success',
                timer: 2000,
            });
            if (callFunction) {
                eval(callFunction)
            }
        },
        error: function (data) {
            swal({
                title: '',
                text: data.responseJSON.message,
                type: 'error',
                timer: 5000,
            })
        },
    })
}
