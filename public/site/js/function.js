$(document).ready(function () {

    $('.btn-reponsive').click(function () {
        $('.nav-responsive').toggle();
    });
    $('#university-edu').click(function () {
        $(this).addClass('documents__containers__tabs__active');
        $('#general-edu, #technical-edu').removeClass('documents__containers__tabs__active');
        $('.university-edu').show();
        $('.general-edu, .technical-edu').hide();

    });
    $('#technical-edu').click(function () {
        $(this).addClass('documents__containers__tabs__active');
        $('#general-edu, #university-edu').removeClass('documents__containers__tabs__active');
        $('.technical-edu').show();
        $('.general-edu, .university-edu').hide();

    });
    $('#general-edu').click(function () {
        $(this).addClass('documents__containers__tabs__active');
        $('#technical-edu, #university-edu').removeClass('documents__containers__tabs__active');
        $('.general-edu').show();
        $('.technical-edu, .university-edu').hide();

    });
    $('#signup').click(function () {
        $('.popups__signin').hide();
        $('.popups__signup').show(100);

    });
    $('#signin, #signin2, #signin0').click(function () {
        $('.popups__signup').hide();
        $('.popups__forget-password').hide();
        $('.popups__signin').show(100);

    });
    $('#forget-password').click(function () {

        $('.popups__forget-password').show(100);
        $('.popups__signin').hide();

    });
    $('.studentsignup').click(function () {
        $(this).addClass('popups__active');
        $('.professionalsignup').removeClass('popups__active');
        $('.popups__professional').hide();
        $('.popups__student').show(200);


    });
    $('.professionalsignup').click(function () {
        $(this).addClass('popups__active');
        $('.studentsignup').removeClass('popups__active');
        $('.popups__student').hide();
        $('.popups__professional').show();

    });
    $('#signbtn').click(function () {
        $('.dropdown-menu').toggle();

    });
    $('.combobox').combobox();


    var slider = new MasterSlider();
    slider.setup('masterslider', {
        width: 600,
        height: 300,
        space: 10,
        loop: true,
        autoplay: true,
        view: 'prtialwave'
    });
    slider.control('arrows');
    slider.control('slideinfo', {insertTo: "#partial-view-1", autohide: false});
    slider.control('circletimer', {color: "#FFFFFF", stroke: 9});


});