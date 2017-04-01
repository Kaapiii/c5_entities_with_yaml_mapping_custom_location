/*
 * Example how to make a custom search for custom entity list
 * typeaheadsearch.js 1.1
 * 
 * Author: Markus Liechti
 * License: Licensed MIT
 */
$(document).ready(function () {

    var articles = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        limit: 8,
        prefetch: {
            //url: 'http://localhost/newmbt/dashboard/products/articles/json',
            url: baseUrl + '/index.php/dashboard/api/example/entities',
            ttl: 10800000 // 3 hours
        }/*,
         filter:function(respData){
         var data = respData.data;
         return data;
         },*/
    });


    articles.initialize();

    var typeaheadsearch = $('#typeahead').typeahead({
        highlight: true
    },
    {
        name: 'label',
        displayKey: 'value',
        source: articles.ttAdapter(),
        templates: {
            header: '<h3 class="tt-dataset-header">Entity</h3>',
            empty: ['<div class="tt-empty-message">No results found</div>'].join('\n'),
            suggestion: Handlebars.compile(
                    '<div class="tt-suggestion-container">' +
                    '<a class="detail-link" href="{{url}}" class="">' +
                    '<div class="tt-suggestion-info">' +
                    '<span class="tt-suggestion-title">{{value}}</span>' +
                    '<div>' +
                    '</a>' +
                    '<div>')
        }
    });

    /**
     * Register to the typeahead event "selected" an go to the link
     */
    typeaheadsearch.on('typeahead:selected', function (event, obj) {
        var url = obj.url;
        if (url) {
            window.location.href = url;
        } else {
            //console.log('Url is no set');
        }
    });
});