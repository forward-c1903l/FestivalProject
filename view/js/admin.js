$(document).ready(function(){
    $('.main-name-nav').click(function(){
        let dataId = parseInt($(this).attr("data-id"));
        $(this).toggleClass('nav-item-active');
        $(`.title-name-menu .wrap-title-nav:nth-child(${dataId}) .child-menu-nav`).slideToggle("slow");
    });
    $('.nav-toggle-click').click(function(){
        $(this).toggleClass('nav-active');
        $(".container-menu-dashboard").toggleClass("container-nav-active");
    });
    $('table tr td:nth-child(5) button').click(function(){
        $(".alert-delete-form").css({"opacity":"1","transition": "0.6s","top": "20vh"})
    });
    $(".wrap-btn button:nth-child(2)").click(function(){
        $(".alert-delete-form").css({"opacity":"0","transition": "0.6s","top": "2%"})
    })
})