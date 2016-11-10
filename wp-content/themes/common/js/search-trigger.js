$(document).ready(function() {
    $('.search-trigger').click(function() {
        $('.main-search').toggleClass('active');
        $(this).toggleClass('hidden');
    });
    $('.main-search .cancel-button').click(function() {
        $('.main-search').toggleClass('active');
        $('.search-trigger').toggleClass('hidden');
        var input = $(this).parent().find('input');
        input.val('');
    });

    $('.search-section .cancel-button').click(function() {
        var input = $(this).parent().find('input');
        input.val('');
    });
});