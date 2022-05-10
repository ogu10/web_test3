// 画面を更新する処理
function appendList(data) {
    $.each(data, function(num, data) {
        $('#list ul').append('' + "名前:" + data.name + "年齢:" + data.age + '');
    });
}
// エラー処理
function error(error) {
    $('#list').empty();
    $('#error').append(error);
}
var jqueryParam = {
    type: "POST",
    url: "doc/sample.json",
    dataType: 'json'
};

$.ajax(jqueryParam)
    .done(function (data, testStatus, jqXHR) {
        appendList(data.forms);
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        error(jqXHR.responseText);
    });

$(document).ready(function(){
    $("input").focus(function(){
        $(this).css("background-color", "yellow");
    });
    $("input").blur(function(){
        $(this).css("background-color", "green");
    });
});