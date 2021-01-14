$(document).ready(function() {
    $('#button').click(function () {
        alert($('#getId').val())
        //ajaxFindId($('#getId').val());
    });
});


function ajaxFindId(id) {
    $.ajax({
        type: 'POST',
        url: 'notification/delCategory.php',
        data: {id:id},
        success: function (){
            alert("Видалено: " + id);
        }
    })
}