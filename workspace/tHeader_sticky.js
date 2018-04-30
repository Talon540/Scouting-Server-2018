$(function(){
    $("#mainTable").tablesorter({
        sortList: [[12,1]]
    });
    $("#mainTable").sticky();
});

$('#mainTable').floatThead({
    position: 'absolute'
});

var rows = $('#mainTable tbody tr');
$('#search').keyup(function() {
    var input = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

    rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(input);
    }).hide();
});

$('.clickable').click( function() {
    window.location = $(this).find('a').attr('href');
}).hover( function() {
    $(this).toggleClass('hover');
});
