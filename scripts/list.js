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

    $(".all, .rated, .unrated").on("click", function(){
        var value = $(this).attr('class');

        if(value == "unrated"){
            $(".rating").filter(function(){
                $(this).parent().toggle($(this).text() == "")
            });
        }else if(value == "rated"){
            $(".rating").filter(function(){
                $(this).parent().toggle($(this).text() != "")
            });
        }else{
            $("tr").show();
        }
    });
});