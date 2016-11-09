$(document).ready(function() {
    $('#order-popup').on('show.bs.modal', function (event) {
        var trigger = $(event.relatedTarget);
        var thumbnail = trigger.data('thumbnail');
        var title = trigger.data('title');
        var excerpt = trigger.data('excerpt');
        var duration = trigger.data('duration');
        var modal = $(this);
        modal.find('.order-image').html('<img src="' + thumbnail + '" alt="order image"/>');
        modal.find('.order-title').text('Заказать тур "' + title + '"');
        modal.find('.order-excerpt').text(excerpt);
        modal.find('.order-duration').text('Продолжительность: ' + duration);
    });
});
