function reloadData(){
    $.get("../table9.php").then(
        function(response){
            $("#ajaxLoad").html(response)
        }
    )
}
$(document).ready(function(){
    reloadData();
});


function aaa(){
    alart("aaaaa")
};