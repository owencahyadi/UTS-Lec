$(document).ready(function(){

    /*FILTER/CARDS PAGES JS************************************/
        var filterBtns = $('.filter-btn');
        var cards = $('.card');
        filterBtns.click(function(event){
            /*Takes care of highlighting current filter*/
            event.preventDefault();
            $('.selected').removeClass('selected');
            $(this).addClass('selected');
    
            /*Takes care of showing correct cards*/
            var currentFilter = $(this).attr('data-filter');
            if(currentFilter === 'all'){
                jQuery.each(cards, function(i, v){
                    $(this).show();
                });
            }
            else{
                jQuery.each(cards, function(i, v){
                    /*If statement checks if any of the filters are in the currentFilter*/
                    if(v.getAttribute('data-filter').indexOf(currentFilter) >= 0){
                        $(this).show();
                    }
                    else{
                        $(this).hide();
                    }
                });
            }
        });
});