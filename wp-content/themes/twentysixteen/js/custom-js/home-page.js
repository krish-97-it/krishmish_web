jQuery(document).ready(function(){
    // if(jQuery.trim(jQuery("#main-content").html())==''){
    //     console.log("no content");
    //     jQuery('.custom-footer').addClass('navbar-fixed-bottom');
    // }else{
    //     console.log("else");
    //     jQuery('.custom-footer').removeClass('navbar-fixed-bottom');
    // }
    jQuery('li.dropdown-submenu a[data-toggle="dropdown"]').on('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        jQuery('li.dropdown-submenu').not(jQuery(this).parent()).removeClass('open');
        jQuery(this).parent().toggleClass('open');
    });
    var baseUrl = window.location.origin;
    console.log(baseUrl);
    jQuery.ajax({
        type     :   "GET",
        url      :   baseUrl+"/wordpress-basics-learning/wp-json/custom-api/v1/get_data",
        datatype :   "JSON",
        success  :   function (response){
            // var res_data= jQuery.parseJSON(response);
           console.log(response);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
        }
    }); 
})