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