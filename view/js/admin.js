$(document).ready(function(){
    $('.toggle-click').click(function(){
        let dataId = parseInt($(this).attr("data-id"));
        $(this).toggleClass('nav-item-active');
        $(`.title-name-menu .wrap-title-nav:nth-child(${dataId}) .child-menu-nav`).slideToggle("slow");
    });
    $('.nav-toggle-click').click(function(){
        $(this).toggleClass('nav-active');
    })
})