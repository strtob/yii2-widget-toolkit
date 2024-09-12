$(document).ready(function () {

    console.log('formTabCounter.js will be loaded...');

    updateTabCounters();

    // PJAX event handler for refreshing tab counters
    $(document).on('pjax:success', function () {
        updateTabCounters();
    });

});

var updateTabCounters = function ()
{
    var elements = $(".tabCounterValue");

    elements.each(function () {

        var value = $(this).attr("value");

        // find tab id
        var tabPaneId = $(this).closest('.tab-pane').attr('id');

        // Find the corresponding tab by ID
        var tab = $('a[href="#' + tabPaneId + '"]');

        // Set the value within the span tag of the badge
        tab.find('.badge').text(value);

    });
}