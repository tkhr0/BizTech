$(function(){
  // フォローボタンが押された時の処理
  pushedFollowingButton();
});

// 応援ボタンが押された時の処理
var pushedFollowingButton = function(){
  $(".follow-form").submit(function(){
    $this = $(this);

    //hiddenから必要な情報の抽出
    userId = $this.find("input[name=user-id]").val();
    followerId = $this.find("input[name=follow-id]").val();

    //変更するバッジ
    badge = $this.parent().find(".badge");

    $this.find("input[type=submit]").val("フォロー済み").attr("disabled", "disabled");
    $.ajax({
      type: "POST",
      url: "http://192.168.56.10/dammy/follower/" + userId + "/" + followerId,
      success: function(msg){
        //バッジに書き込み
        badge.text(msg);
        }
        });
    //submitのデフォルト機能のキャンセル
    return false;
  });
};
