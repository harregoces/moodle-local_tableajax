/**
 * Setting js for local_tableajax.
 *
 * @module     local_tableajax
 * @copyright  2021 Hernan Arregoces <harregoces@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define(['jquery',
    'core/ajax',
    'core/notification',
    'core/templates',
    'core/loadingicon'
], function(
    $,
    ajax,
    notification,
    templates,
    LoadingIcon
) {

    var ACTIONS = {
        PREVIOUS: '[data-action="previous"]',
        NEXT: '[data-action="next"]'
    };
    var table_body = document.getElementById('table_tableajax_body');
    var limit = document.getElementById('limit');
    var offset = document.getElementById('offset');

    var TableActions = function() {
        this.registerEvents();
    };

    var loadingData = function(limit, offset) {
        if (parseInt(offset) > 0) {
            $(ACTIONS.PREVIOUS).removeAttr('disabled');
        } else {
            $(ACTIONS.PREVIOUS).attr('disabled', 'disabled');
        }
        var promise = ajax.call([{
            methodname: 'local_tableajax_get_data',
            args: {
                limit: limit,
                offset: offset
            }
        }])[0];
        $(table_body).empty();
        LoadingIcon.addIconToContainerRemoveOnCompletion(table_body, promise);
        promise.done(function(data) {
            templates.render('local_tableajax/table_body', {'data': data})
                .then(function(html, js) {
                    return templates.replaceNodeContents(table_body, html, js);
                }).fail(notification.exception);
        });
        promise.fail(notification.exception);
    };

    TableActions.prototype.registerEvents = function() {

        $(ACTIONS.PREVIOUS).click(function() {
            offset.value = parseInt(offset.value) - 10;
            loadingData(parseInt(limit.value),parseInt(offset.value));
        });

        $(ACTIONS.NEXT).click(function(){
            offset.value = parseInt(offset.value) + 10;
            loadingData(parseInt(limit.value),parseInt(offset.value));
        });
    };

    return {
        init: function() {
            return new TableActions();
        }
    };
});