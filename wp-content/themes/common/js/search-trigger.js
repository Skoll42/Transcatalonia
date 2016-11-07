$(document).ready(function() {
    $('.search-trigger').click(function() {
        $('.main-search').toggleClass('active');
        $(this).toggleClass('hidden');
    });
    $('.main-search .cancel-button').click(function() {
        $('.main-search').toggleClass('active');
        $('.search-trigger').toggleClass('hidden');
    });
});