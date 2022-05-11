
jQuery(function($){
//入力時のイベント
$('.sample').on('input', function(){
    //文字数を取得
    var cnt = $(this).val().length;
    //現在の文字数を表示
    $('.now_cnt').text(cnt);
/*    if(cnt > 0 && 140 > cnt){
        //1文字以上かつ140文字以内の場合はボタンを有効化＆黒字
        $('.sample_btn').prop('disabled', false);
        $('.cnt_area').removeClass('cnt_danger');
    }else{
        //0文字または140文字を超える場合はボタンを無効化＆赤字
        $('.sample_btn').prop('disabled', true);
        $('.cnt_area').addClass('cnt_danger');
    }*/
})});

/*
//リロード時に初期文字列が入っていた時の対策
$('.sample').trigger('input');

//ボタンクリック時　実運用時はsubmit送信などを行うと思います
$('.sample_btn').click(function(){
alert('送信できる状態です！');
});
});*/
