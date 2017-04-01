<div style="display: none">
    <div id="ccm-dialog-delete-entity" class="ccm-ui">
        <form method="post" class="form-stacked" action="<?= $view->action('submitDelete')?>">
            <?= $token->output('delete'); ?>
            <?= $form->hidden('entityId', ''); ?>
            
            <p><?= t('Soll <strong id="entity-title-show">Eintrag</strong> mit der id <strong id="entity-id-show"></strong> gelöscht werden?'); ?></p>
            <p id="dialog-additional-info"></p>
            <p><?= t('Dieser Schritt kann nicht rückgängig gemacht werden.'); ?></p>
        </form>
        <div class="dialog-buttons">
            <button class="btn btn-default pull-left" onclick="jQuery.fn.dialog.closeTop()"><?= t('Cancel'); ?></button>
            <button class="btn btn-danger pull-right" onclick="$('#ccm-dialog-delete-entity form').submit(); "><?=t('Delete')?></button>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo BASE_URL; ?>/packages/c5_entities_with_yaml_mapping_custom_location/single_pages/dashboard/example/js/deleteUI.js"></script>
