jQuery(document).ready(function(){
    var baseUrl = window.location.origin;
    window.onload = function(){
        jQuery('body').attr("outer-width", jQuery(window).width());
    }

    var CUSTOM_FUNCTIONS = {
        // Helps To Make height of all the specific divs equals
        makeEqualHeight : function(ele,ele_class){
            var maxHeight   =   0;
            var temp_width  =   jQuery('body').attr("outer-width");
            var w_width     =   jQuery(window).width();
            jQuery(ele).each(function() {
                if(temp_width > w_width){
                    maxHeight   =    Math.min(maxHeight, jQuery(this).outerHeight());
                }else{
                    maxHeight   =    Math.max(maxHeight, jQuery(this).outerHeight());
                }
            });
            jQuery(ele_class).css("min-height", maxHeight);
            jQuery('body').attr("outer-width", w_width);
        },
    }

    // make all the div element height equal in responsive
    var card_class  =   '.service-section-card';
    var get_cards   =   jQuery('.service-section-card');
    function repeatFn(){
        CUSTOM_FUNCTIONS.makeEqualHeight(get_cards,card_class);
    }
    setInterval(repeatFn, 10);

    // When user click on next btn of service now section
    jQuery('.custom-carousel-next').click(function(){
        var next_slide      =   jQuery(this).attr('next-data-slide');
        var prev_slide      =   jQuery('.custom-carousel-prev').attr('prev-data-slide');
        var slide_items     =   jQuery('.service-section-card');
        jQuery(slide_items).each(function(){        //  Looping all slides
            var slide_attr  =   jQuery(this).attr('data-slide');
            var next_data_slide,prev_data_slide;
            
            // If next slide value match with a slide then make it visible and set prev and next btn value
            if(next_slide == slide_attr){

                // If next slide value reached to last element then set next btn slide value to 1 else iincrease by +1
                if(next_slide == slide_items.length){
                    next_data_slide = 1;
                }else{
                    next_data_slide = +next_slide+1;
                }

                // If prev slide value reached to first element then set prev btn slide value to last element or If prev value reached to last element set prev btn value to 1 or increase prev btn value by +1
                if(prev_slide == 1){
                    prev_data_slide = slide_items.length;
                }if(prev_slide == slide_items.length){
                    prev_data_slide = 1;
                }else{
                    prev_data_slide = +prev_slide+1;
                }

                jQuery('.custom-carousel-next').attr('next-data-slide',next_data_slide);
                jQuery('.custom-carousel-prev').attr('prev-data-slide',prev_data_slide);
                jQuery(this).attr('target_ele','active');
            }else{
                jQuery(this).attr('target_ele','inactive');
            }
        }) 
    });

    jQuery('.custom-carousel-prev').click(function(){
        var prev_slide      =   jQuery(this).attr('prev-data-slide');
        var next_slide      =   jQuery('.custom-carousel-next').attr('next-data-slide');
        var slide_items     =   jQuery('.service-section-card');
        jQuery(slide_items).each(function(){
            var slide_attr  =   jQuery(this).attr('data-slide');
            var prev_data_slide,next_data_slide;

            // If Prev slide equals to a slide then set prev btn slide value and next btn slide value
            if(prev_slide == slide_attr){

                // If prev slide equals to fiirst element then set prev btn slide value to 3 or decrease it by 1
                if(prev_slide == 1){
                    prev_data_slide = 3;
                }else{
                    prev_data_slide = +prev_slide-1;
                }

                // If next slide equals to first element then set next btn slide value by decrease it by 1
                if(next_slide == 1){
                    next_data_slide = slide_items.length;
                }else{
                    next_data_slide = +next_slide-1;
                }
                jQuery('.custom-carousel-prev').attr('prev-data-slide',prev_data_slide);
                jQuery('.custom-carousel-next').attr('next-data-slide',next_data_slide);
                jQuery(this).attr('target_ele','active');
            }else{
                jQuery(this).attr('target_ele','inactive');
            }
        }) 
    })

});