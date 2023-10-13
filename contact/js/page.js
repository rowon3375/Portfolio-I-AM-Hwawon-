$(document).ready(function() {
    // 入力が変更された際に実行されるイベントリスナーを追加
    $('.rq').on('input', function() {
        if ($(this).val() !== '') {
            $(this).removeClass('error'); // 入力がある場合はエラークラスを削除
        }
    });

    $('form').submit(function(event) {
        var valid = true;

        // エラーメッセージがあれば一旦削除
        $('.error-message').remove();

        // class="rq"を持つ要素をループで処理
        $('.rq').each(function() {
            if ($(this).val() == '') {
                valid = false;
                $(this).addClass('error'); // エラーがある場合はクラスを追加
            } else {
                // 入力がある場合はエラークラスを削除
                $(this).removeClass('error');

                if ($(this).attr('name') == 'tel') {
                    // 電話番号の正規表現パターン
                    var telPattern = /^[0-9-]+$/;

                    if (!telPattern.test($(this).val())) {
                        valid = false;
                        $(this).addClass('error'); // エラーがある場合はクラスを追加
                    }
                } else if ($(this).attr('name') == 'email') {
                    // メールアドレスの正規表現パターン
                    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailPattern.test($(this).val())) {
                        valid = false;
                        $(this).addClass('error'); // エラーがある場合はクラスを追加
                    }
                }
            }
        });

        if (!valid) {
            event.preventDefault(); // フォームの送信を防止
            var headerHeight = $('header').outerHeight();

            $('html, body').animate({
                scrollTop: $('.error').first().offset().top - headerHeight
            }, 1000);
        } else {
            $('input[type="submit"]').prop('disabled', true); // エラーがない場合、送信ボタンを無効化
        }
    });
});



//全角を半角に自動変更
$(function(){
    $(".js-characters-change").blur(function(){
        charactersChange($(this));
    });
  
    charactersChange = function(ele){
        var val = ele.val();
        var han = val.replace(/[Ａ-Ｚａ-ｚ０-９]/g,function(s){return String.fromCharCode(s.charCodeAt(0)-0xFEE0)});
  
        if(val.match(/[Ａ-Ｚａ-ｚ０-９]/g)){
            $(ele).val(han);
        }
    }
  });