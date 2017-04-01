<link rel="stylesheet" type="text/css" href="<?= BASE_URL;?>/packages/c5_entities_with_yaml_mapping_custom_location/single_pages/dashboard/example/css/typeaheadstyles.css" />
<script>
    var baseUrl = "<?= BASE_URL;?>";
</script>
<div data-search-element="wrapper">
    <form role="form" action="<?=$controller->action('submit')?>" class="form-inline ccm-search-fields">
        <div class="ccm-search-fields-row">
        <div class="form-group">
            <div class="ccm-search-main-lookup-field">
                    <i class="fa fa-search"></i>
                    <input id="typeahead" type="search" name="term" value="" placeholder="<?= t('Search');?>" class="form-control ccm-input-search">
            </div>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.js"></script>
        <script type="text/javascript" src="<?= BASE_URL;?>/packages/c5_entities_with_yaml_mapping_custom_location/single_pages/dashboard/example/js/typeaheadsearch.js"></script>
    </form>
</div>