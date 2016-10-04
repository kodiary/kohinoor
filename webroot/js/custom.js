$(function(){
   $('.side-menu .parentnav').click(function(){
    $(this).parent().find('.child_menu').toggle('slow');
   }); 
});