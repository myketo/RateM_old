$(function() {
    $(".list-table").tablesorter({
        sortList: [[0,0]],
        emptyTo: "none",
        headers: {
            '.interest, .delete, .edit': {
                sorter: false
            }
        }
    });
});

$(document).ready(function(){
    $(".search").on("keyup", function(){
        var value = $(this).val().toLowerCase();
        $(".list-table-body tr").filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});