"use strict"

$(window).on("load", function() {
    $('.btn-forget').on('click',function(e){
        e.preventDefault();
       $('.form-items','.form-content').addClass('hide-it');
       $('.form-sent','.form-content').addClass('show-it');
       $('.website-logo').addClass('opacity_nill');
    });
    $('.btn-tab-next').on('click',function(e){
        e.preventDefault();
        $('.nav-tabs .nav-item > .active').parent().next('li').find('a').trigger('click');
    });
     
    

});

function re_login(){

    $('.btn-login').on('click',function(e){
        e.preventDefault();

        $('.form-items','.form-content').removeClass('hide-it');
        $('.form-sent','.form-content').removeClass('show-it');

        $('.website-logo').removeClass('opacity_nill');
        
       $('.form-items','.form-content').addClass('show-it');
       $('.form-sent','.form-content').addClass('hide-it');



    });
    
    
   
   
}




