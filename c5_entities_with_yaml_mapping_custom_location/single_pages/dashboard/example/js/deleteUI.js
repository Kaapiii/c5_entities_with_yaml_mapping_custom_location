
$(document).ready(function () {
    $('button[data-dialog=delete-entity]').on('click', function(evt) {
        var target = $(this);
        var entityId = target.data('entityId');
        var entityName = target.data('entityName');
        var dialogTitle = target.data('dialogTitle');
        var dialogAdditionalInfo = target.data('dialog-additional-info');
        
        jQuery.fn.dialog.open({
            element: '#ccm-dialog-delete-entity',
            modal: true,
            width: 320,
            title: dialogTitle,
            height: 'auto',
            open: function(event, ui){
                // Update formvalues after open the dialog
                $('#entity-id-show').text(entityId);
                $('#entityId').val(entityId);
                $('#entity-title-show').text(entityName);
                $('#dialog-additional-info').text(dialogAdditionalInfo);
            }
        });
    });
});
