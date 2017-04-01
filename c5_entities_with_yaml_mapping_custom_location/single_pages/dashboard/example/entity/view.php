<div class="ccm-dashboard-content-full">
    <?php include dirname(__FILE__).'/../ui/typeahead.php';?>
    <div data-search-element="results">
        <table border="0" cellspacing="0" cellpadding="0" class="ccm-search-results-table">
            <thead>
                <tr>
                    <th><span class="ccm-search-results-checkbox"><input type="checkbox" data-search-checkbox="select-all" class="ccm-flat-checkbox"></span>
                    </th>
                    <th class="false">
                        <a href=""><?= t('Id'); ?></a>
                    </th>
                    <th class="false">
                        <a href=""><?= t('Active'); ?></a>
                    </th>
                    <th class="false">
                        <a href=""><?= t('Name'); ?></a>
                    </th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(count($entities) > 0){
                    foreach($entities as $entity){
                        $link = $url.'/edit/'.$entity->getId();
                        ?>
                    <tr>
                        <td>
                            <span class="ccm-search-results-checkbox">
                                <input type="checkbox" class="ccm-flat-checkbox" data-article-id="1" data-search-checkbox="individual" value="1">
                            </span>
                        </td>
                        <td>
                            <?= $entity->getId();?>
                        </td>
                        <td>
                            <?php 
                            if($entity->isActive()):?>
                                <i class="fa fa-check-circle-o" style="color:#47A447;"></i>
                            <?php else:?>
                                <i class="fa fa-minus-circle" style="color:#D9534F;"></i>
                            <?php endif;?>
                        </td>
                        <td>
                            <a href="<?= URL::to($link, '', '')?>"><?= $entity->getName();?></a>
                        </td>
                        <td>
                            <button data-dialog="delete-entity" data-entity-name="<?= t('Entity'); ?>" data-dialog-additional-info="<?= t('Do you want to delete this entry?');?>" data-entity-id="<?= $entity->getId();?>" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                <?php
                    }
                }else{    
                ?>
                    <tr>
                        <td></td>
                        <td colspan="5"><?= t('Keine Resultate gefunden'); ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <?php include dirname(__FILE__).'/../ui/deleteUI.php'; ?>
        <?php // include dirname(__FILE__).'/elements/paging.php';?>
    </div>
</div>
<div class="ccm-dashboard-header-buttons">
    <a href="<?php echo View::url('/dashboard/example/entity/add') ?>" class="btn btn-primary"><?= t("New Entity") ?></a>
</div>