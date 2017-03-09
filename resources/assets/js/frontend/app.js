
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('../components/frontend/Example.vue'));

const app = new Vue({
    el: '#app'
});

(function($){
    $( document ).ready(function() {
    console.log( "ready!" );
    
    $("#newproducttype").on('click',function(){
        $.get( "product-types/create", function( data ) {
            console.log(data);
        $( ".modal-body" ).html( data );
        
        });
    });
    
    
    $('.update_product_type').on('click',function(){
        url = $(this).attr('data-url');
        $.get( url, function( data ) {
            //console.log(data);
        $( ".modal-body" ).html( data );
        
        });
    });
    
    $("#newproduct").on('click',function(){
        $.get( "products/create", function( data ) {
            console.log(data);
        $( ".modal-body" ).html( data );
        
        });
    });
    $("#newattribute").on('click',function(){
        $.get( "attribute/create", function( data ) {
            console.log(data);
        $( ".modal-body" ).html( data );
        
        });
    });
    $(".update_product").on('click',function(){
        url = $(this).attr('data-url');
        $.get( url, function( data ) {
            console.log(data);
        $( ".modal-body" ).html( data );
        
        });
    });
    
    $(".edit_attribute").on('click',function(){
        url = $(this).attr('data-url');
        $.get( url, function( data ) {
            console.log(data);
        $( ".modal-body" ).html( data );
        
        });
    });
    
});
})(jQuery);