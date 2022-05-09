<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>jQuery TIPS</title>
</head>
<body>
<form>
    <div>
        <label for="keyword">キーワード：</label>
        <input id="keyword" type="text" size="20" />
        <input id="search" type="button" value="検索" />
    </div>
    <ul id="result" class="ajax"></ul>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $(function() {
        // ［検索］ボタンクリックで検索開始
        $('#search').click(function() {
            // .phpファイルへのアクセス
            $.ajax('get.php',
                {
                    type: 'get',
                    data: { query: $('#keyword').val() },
                    dataType: 'xml'
                }
            )
                // 検索成功時にはページに結果を反映
                .done(function(data) {
                    // 結果リストをクリア
                    $('#result').empty();
                    // <Question>要素（個々の質問情報）を順番に処理
                    $('Question', data).each(function() {
                        // <Url>（詳細ページ）、<Content>（質問本文）を基にリンクリストを生成
                        $('#result').append(
                            $('<li></li>').append(
                                $('<a></a>')
                                    .attr({
                                        href: $('Url', this).text(),
                                        target: '_blank'
                                    })
                                    .text($('Content', this).text().substring(0, 255) + '...')
                            )
                        );
                    });
                })
                // 検索失敗時には、その旨をダイアログ表示
                .fail(function() {
                    window.alert('正しい結果を得られませんでした。');
                });
        });
    });
</script>
</body>
</html>