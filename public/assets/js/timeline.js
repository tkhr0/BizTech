$(function(){
  // 応援ボタンが押された時の処理
  initCheerButton();
  pushedCheeringButton();
  // やるぞボタン(hack)をおしたとき
  pushedHackButton();
});

var fixedFooter = function(){
  var footer = $("#footer");
    var pos = footer.position();
    var height = $(window).height();
    height = height - pos.top;
    height = height - footer.height();
    if (height > 0) {
      footer.css({
        'margin-top': height + 'px'
      });
  }
}
//ボタンの初期状態を設定
var initCheerButton = function(){
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

    var goals_elem = $("#select_goals");
    //goals_elem.css("display","block");
    //var goals_select = goals_elem.find("ul");
    goals_elem.css("display","block");
    var goals_select = goals_elem;
    $this.find("input[type=submit]").val("やるぜ！").attr("disabled", "disabled");
    // ユーザID
    var user_id = 1;
    $.ajax({
      type: "POST",
      url: "http://" + location.host + "/sukima/goals/" + user_id +"/",
      success: function(msg){
        // jqueryデータを受け取る
        // 目標として表示する
        var datas = $.parseJSON(msg);
        for(var i=0; i<datas.length; i++){
          var opt = "<li role='presentation' class='dropdown-header' value="+i+">"+datas[i].name+"</li>";
          $(opt).appendTo(goals_select);
        }
      }
    });
    //submitのデフォルト機能のキャンセル
    return false;
  });
};

