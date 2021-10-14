$(document).ready(function () {
    $.get($('#box-gold').data('url'), function (data) {
        $('#box-gold').html(data);
    }, 'html');

    $.get($('#box-coin').data('url'), function (data) {
        $('#box-coin').html(data);
    }, 'html');

    let  category = $('ul li .category_article').parent().prev();
    // console.log(category)
    category.addClass('active');
});
