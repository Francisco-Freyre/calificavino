$(function (){
    'use strict';
    $('.tinto').hide();
    $('.rosa').hide();
    $('.blanco').hide();
    $('.espuma').hide();
    $("#colorNegro").on('click', function (){
        $('.tinto').show();
        $('.rosa').hide();
        $('.blanco').hide();
        $('.espuma').hide();
    });

    $("#colorAzul").on('click', function (){
        $('.rosa').show();
        $('.tinto').hide();
        $('.blanco').hide();
        $('.espuma').hide();
    });
    
    $("#colorBlanco").on('click', function (){
        $('.blanco').show();
        $('.tinto').hide();
        $('.rosa').hide();
        $('.espuma').hide();
    });

    $("#colorEspuma").on('click', function (){
        $('.espuma').show();
        $('.blanco').hide();
        $('.tinto').hide();
        $('.rosa').hide();
    });

    $("#calif4").on('change', function () {
        $("#select4").text($(this).val());
    });

    $("#calif3").on('change', function () {
        $("#select3").text($(this).val());
    });

    $("#calif2").on('change', function () {
        $("#select2").text($(this).val());
    });

    $("#calif1").on('change', function () {
        $("#select1").text($(this).val());
    });
});