


$(document).ready(function () {

    console.log('widgets/formTab/views/_script.js will be loaded...');

    initFormTabListener();

});


var initFormTabListener = function ()
{
    // File
    $('[aria-controls="tabFile<?=$uid?>"]')
            .on('click', function () {
               
                if (typeof isInitFile<?=$uid?> === 'undefined') {
                    console.log('Update File Tab <?=$uid?>');
                   initFile<?=$uid?>();
                }               

                isInitFile<?=$uid?> = true;

            });

    // Calendar
    $('[aria-controls="tabCalendar<?=$uid?>"]')
            .on('click', function () {
             
                if (typeof isInitCal<?=$uid?> === 'undefined') {
                     console.log('Update Calendar Tab <?=$uid?>' );
                    initCalendarUpcomingEvents();
                    initCalendar();
                }              

                calendar.updateSize();

                isInitCal<?=$uid?> = true;

            });


    // Knowledge Base    
    $('[aria-controls="tabKnowledgeBase<?=$uid?>"]')
            .on('click', function () {
              
                if (typeof isInitKb<?=$uid?> === 'undefined') {
                      console.log('Update Knowledge Base Tab <?=$uid?>');

                   initKnowledgeBase();
                }
                
                isInitKb<?=$uid?> = true;
            });

}