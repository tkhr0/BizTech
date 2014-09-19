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
      url: "http://" + location.host + "/sukima/cheer/" + targetId + "/" + typeId,
      success: function(msg){
        //バッジに書き込み
        badge.text(msg);
        }
        });
    //submitのデフォルト機能のキャンセル
    return false;
  });
  // hackだよ
  $(".hack-form").submit(function(){
    $this = $(this);

    //hiddenから必要な情報の抽出
    targetId = $this.find("input[name=target-id]").val();
    typeId = $this.find("input[name=type-id]").val();

    //$this.find("input[type=submit]").val("応援しました！！").attr("disabled", "disabled");
    //var parent = $this.parent();
    //$("#select_goals").css("display","block");
    var goals_elem = $("#select_goals");
    goals_elem.css("display","block");
    var goals_select = goals_elem.find("select").eq(0);
    $this.find("input[type=submit]").val("やるぜ！").attr("disabled", "disabled");
    $.ajax({
      type: "POST",
      url: "http://" + location.host + "/sukima/goals/" + "1/",
      success: function(msg){
        //jqueryデータを受け取る
        var datas = $.parseJSON(msg);
        for(var i=0; i<datas.length; i++){
          var opt = "<option value="+i+">"+datas[i].name+"</option>";
          goals_select.append(opt);
        }
      }
    });
  });
    //submitのデフォルト機能のキャンセル
    return false;
};
