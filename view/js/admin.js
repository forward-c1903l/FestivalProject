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
    $(`.edit-religions img:nth-child(1)`).click(function(){
        $('.alert-delete-form').css({'opacity':'0.9',"transition":"0.8s","top": "45vh"});
    });
    $(".wrap-btn button:nth-child(2)").click(function(){
        $('.alert-delete-form').css({'opacity':'0',"top": "10%","transition":"0.5s"});
    })
})