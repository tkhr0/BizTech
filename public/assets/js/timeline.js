$(function(){
  // 応援ボタンが押された時の処理
  initCheerButton();
  pushedCheeringButton();
  pushedHackButton();
});

//ボタンの初期状態を設定
var ininCheerButton = function(){
  cheerForms = $(".cheer-form");
  $.each(cheerForms, function(){
    $this = $(this);
    count = $this.find("input[name=cheer-status]").val();
    if(count > 0){
      $this.find("input[type=submit]").val("応援しました！！").attr("disabled", "disabled");
    }
  });
};

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
      url: "http://" + location.host + "/sukima/cheer/" + targetId + "/" + typeId,
      success: function(msg){
        //バッジに書き込み
        badge.text(msg);
        }
        });
    //submitのデフォルト機能のキャンセル
    return false;
  });
};

var pushedHackButton = function(){
  // hackだよ
  $(".hack-form").submit(function(){
    $this = $(this);

    //hiddenから必要な情報の抽出
    targetId = $this.find("input[name=target-id]").val();
    typeId = $this.find("input[name=type-id]").val();

    //$this.find("input[type=submit]").val("応援しました！！").attr("disabled", "disabled");
    //var parent = $this.parent();
    $("#select_goals").css("display","block");
    $this.find("input[type=submit]").val("応援しました！！").attr("disabled", "disabled");
    /*
    $.ajax({
      type: "POST",
      url: "http://" + location.host + "/sukima/cheer/" + targetId + "/" + typeId,
      success: function(msg){
        //バッジに書き込み
        badge.text(msg);
        }
    });
    */
  });
    //submitのデフォルト機能のキャンセル
    return false;
};
