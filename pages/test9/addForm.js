$(document).ready(function () {
    $("#form2").submit(function (event) {
        $(".form-group").removeClass("has-error");
        $(".help-block").remove();
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
            } else {
                $("#title9").append(
                    '<div class="alert alert-success help-block" style="color: lime">' + data.message + "</div>"
                );
/*                $("#players_list").html(
                   "<?php include 'table9.php' ?>"
                );*/
            }
        });
        event.preventDefault();
    });
});



jQuery(function($){
//入力時のイベント
$('#name2').on('input', function(){
    //文字数を取得
    var cnt = $(this).val().length;
    //現在の文字数を表示
    $('.now_cnt').text(cnt);
})

/*    if(cnt > 0 && 140 > cnt){
        //1文字以上かつ140文字以内の場合はボタンを有効化＆黒字
        $('#addButton').prop('disabled', false);
        $('.cnt_area').removeClass('cnt_danger');
    }else{
        //0文字または140文字を超える場合はボタンを無効化＆赤字
        $('#addButton').prop('disabled', true);
        $('.cnt_area').addClass('cnt_danger');
    }*/



});

/*//リロード時に初期文字列が入っていた時の対策
$('.sample').trigger('input');

//ボタンクリック時　実運用時はsubmit送信などを行うと思います
$('.sample_btn').click(function(){
alert('送信できる状態です！');
});
});*/
