jQuery(document).ready(function(){
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