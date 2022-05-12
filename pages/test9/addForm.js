$(document).ready(function () {
    $("#form2").submit(function (event) {
        $(".form-group").removeClass("has-error");
        $(".help-block").remove();
        $(".help-block2").remove();
        var formData = {
            name2: $("#name2").val(),
            no2: $("#no2").val(),
            team2: $("#team2").val(),
        };

        $.ajax({
            type: "POST",
            url: "regist9.php",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function (data) {
            console.log(data);
            if (!data.success) {
                if (data.errors.name2) {
                    $("#name-group").addClass("has-error");
                    $("#name-group").append(
                        '<div class="help-block" style="color: lime">' + data.errors.name2 + "</div>"
                    );
                }

                if (data.errors.no2) {
                    $("#no-group").addClass("has-error");
                    $("#no-group").append(
                        '<div class="help-block" style="color: lime">' + data.errors.no2 + "</div>"
                    );
                }

                if (data.errors.team2) {
                    $("#team-group").addClass("has-error");
                    $("#team-group").append(
                        '<div class="help-block" style="color: lime">' + data.errors.team2 + "</div>"
                    );
                }
            } else  {
                /*window.location.reload();*/
                $("#title9").append(
                    '<div class="alert alert-success help-block" style="color: lime">' + data.message + "</div>"
                );

                $.ajax({
                    type: "POST",
                    url: "table9.php",
                    data: {val:"table9"},
                    dataType: "json",
                    encode: true,
                }).done(function (data) {
                $("#players_list").html(data);
                })
            }
        });
        event.preventDefault();
    });
});

//Length Check
jQuery(function($){
//入力時のイベント
    $('#name2').keyup(function(){
        $(".help-block3").remove();
/*        console.log($('#name2').val().length > 12);*/
        //文字数を取得
        var cnt = $(this).val().length;
        //現在の文字数を表示
        $('.now_cnt').text(cnt);
    if (cnt > 12){
        $("#name-group").append(
            '<div class="alert alert-success help-block3" style="color: lime">' + "字数が超えてるよ 😢" + "</div>");
    }
    })
});