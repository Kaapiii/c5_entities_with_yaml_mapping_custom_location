<div class="ccm-dashboard-content">
    <form role="form" action="<?=$controller->action('submitAdd')?>" class="ccm-search-fields" method="post">
        <fieldset>
            <legend>Slider</legend>
            <div class="form-group">
                <label class="control-label">Slidername</label>
                <?php echo $form->text('name');?>
            </div>
            <div class="form-group">
                <label class="control-label">aktiv: </label>
                <?php echo $form->checkbox('active', '1', true);?>
            </div>
        </fieldset>
        <div class="ccm-search-fields-submit">
            <button type="submit" class="btn btn-primary pull-right">Speichern</button>
        </div>
    </form>
</div>

