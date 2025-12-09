/**
 * FormTabWidget Script
 * Initializes tab-specific functionality for File, Calendar and Knowledge Base tabs
 */

// Define the function BEFORE calling it (fix hoisting issue)
var initFormTabListener = function() {
    // File Tab
    $('[aria-controls="tabFile<?=$uid?>"]')
        .on('click', function() {
            if (typeof isInitFile<?=$uid?> === 'undefined') {
                console.log('Update File Tab <?=$uid?>');
                if (typeof initFile<?=$uid?> === 'function') {
                    initFile<?=$uid?>();
                }
            }
            isInitFile<?=$uid?> = true;
        });

    // Calendar Tab
    $('[aria-controls="tabCalendar<?=$uid?>"]')
        .on('click', function() {
            if (typeof isInitCal<?=$uid?> === 'undefined') {
                console.log('Update Calendar Tab <?=$uid?>');
                if (typeof initCalendarUpcomingEvents === 'function') {
                    initCalendarUpcomingEvents();
                }
                if (typeof initCalendar === 'function') {
                    initCalendar();
                }
            }
            if (typeof calendar !== 'undefined') {
                calendar.updateSize();
            }
            isInitCal<?=$uid?> = true;
        });

    // Knowledge Base Tab
    $('[aria-controls="tabKnowledgeBase<?=$uid?>"]')
        .on('click', function() {
            if (typeof isInitKb<?=$uid?> === 'undefined') {
                console.log('Update Knowledge Base Tab <?=$uid?>');
                if (typeof initKnowledgeBase === 'function') {
                    initKnowledgeBase();
                }
            }
            isInitKb<?=$uid?> = true;
        });
};

// Now call the function after it's defined
$(document).ready(function() {
    console.log('widgets/formTab/views/_script.js loaded for uid: <?=$uid?>');
    initFormTabListener();
});
