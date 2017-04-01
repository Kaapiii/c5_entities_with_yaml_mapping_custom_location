<div class="ccm-dashboard-content">
    <?php include dirname(__FILE__).'/../ui/typeahead.php';?>
    <form role="form" action="<?=$controller->action('submitEdit')?>" class="ccm-search-fields" method="post">
        <?= $form->hidden('id', $entity->getId());?>
        <fieldset>
            <legend><?= $entity->getName();?> - (ID: <?= $entity->getId(); ?>)</legend>
        </fieldset>
        <fieldset>
            <legend>Angaben</legend>
            <div class="form-group">
                <label class="control-label">Name</label>
                <?= $form->text('name', $entity->getName());?>
            </div>
            <div class="form-group">
                <label class="control-label"><?= t('activ')?>: </label>
                <?= $form->checkbox('active', '1', $entity->isActive());?>
            </div>
        </fieldset>
        <div class="ccm-search-fields-submit">
            <button type="submit" class="btn btn-primary pull-right"><?= t('Save'); ?></button>
        </div>
    </form>
</div>
<?php include dirname(__FILE__).'/../ui/deleteUI.php'; ?>
<div class="ccm-dashboard-header-buttons">
    <button data-dialog="delete-entity" data-entity-name="<?= t('Entity'); ?>" data-entity-id="<?= $entity->getId();?>" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
</div>

