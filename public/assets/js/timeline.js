$(function(){
  // 応援ボタンが押された時の処理
  pushedCheeringButton();
});

// 応援ボタンが押された時の処理
var pushedCheeringButton = function(){
  $(".cheer-form").submit(function(){
    $this = $(this);

    //hiddenから必要な情報の抽出
    targetId = $this.find("input[name=target-id]").val();
    typeId = $this.find("input[name=type-id]").val();

    //変更するバッジ
    badge = $this.parent().find(".badge");

    $this.find("input[type=submit]").val("応援しました！！").attr("disabled", "disabled");
    $.ajax({
      type: "POST",
      url: "http://192.168.56.10/sukima/cheer/" + targetId + "/" + typeId,
      success: function(msg){
        //バッジに書き込み
        badge.text(msg);
        }
        });
    //submitのデフォルト機能のキャンセル
    return false;
  });
};
