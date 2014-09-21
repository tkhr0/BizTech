USER_ID = $.cookie("user_id");
RELOAD_NUM = 10;
console.log("userID: " + USER_ID);
$(function(){
  initCheerButton();
  initState();
  // 応援ボタンが押された時の処理
  cheeringButtonListner();
  // 達成ボタン
  achievedButtonListener();
  autoLoader();
});

var autoLoader = function(){
  $(window).bottom({proximity: 0.1});
  $(window).bind("bottom", function() {
    var obj = $(this);
    if (!obj.data("loading")) {
      obj.data("loading", true);

      //$('#timeline').append('<p>Loading...</p>');
      var offset = $("#timeline").find(".activity").length;
      $('#timeline').append('<p>NOW LOADING...</p>');
      setTimeout(function() {
        $('#timeline p:last').remove();
        //タイムラインを追加でリロード
        reloadAddTimeline(offset, RELOAD_NUM);
        obj.data("loading", false);
      }, 1000);
    }
  });
}

//ボタンの初期状態を設定
var initCheerButton = function(){
  console.log("init CheerButton");
  cheerForms = $(".cheer-form");
  $.each(cheerForms, function(){
    $this = $(this);
    count = $this.find("input[name=cheer-status]").val();
    if(count > 1000){ // テスト用に制限解除
      $this.find("input[type=submit]").val("応援しました！！").attr("disabled", "disabled");
    }
  });
};

//ボタン状態の初期化
var initState = function(){
  $this = $(this);
  form = $(".hack-form");
  achieve = $(".achieve-form");
  state = form.find("input[name=state]").val();
  console.log("init button state: " + state);
  if(state == 0){
    form.find("input[name=hack]").val("やるぞ！");
    achieve.find("input[name=achieve]").hide();
  }else if(state == 1){
    form.find("input[name=hack]").val("やるぞ！");
    form.find("input[name=state]").val(0);
    achieve.find("input[name=achieve]").hide();
  }else if(state == 2){
    form.find("input[name=hack]").val("やったぞ！");
  }
};

// 応援ボタンが押された時の処理
var cheeringButtonListner = function(){
  $(".cheer-form").submit(function(){
    $this = $(this);

    //hiddenから必要な情報の抽出
    targetId = $this.find("input[name=target-id]").val();
    typeId = $this.find("input[name=type-id]").val();

    //変更するバッジ
    badge = $this.parent().find(".badge");

    // テスト用に制限解除
    //$this.find("input[type=submit]").val("応援しました！！").attr("disabled", "disabled");
    $.ajax({
      type: "POST",
      url: "/sukima/cheer/" + targetId + "/" + typeId,
      success: function(msg){
        //バッジに書き込み
        badge.text(msg);
      }
    });
    //submitのデフォルト機能のキャンセル
    return false;
  });
};

var achievedButtonListener = function(){
  $(".achieve-form").submit(function(){
    console.log("achieved button was pushed");
    pushedAchievedButton($this);
    return false;
  });
};

var pushedAchievedButton = function(form){
  console.log("pushed achieved button");

  $.ajax({
    type: "POST",
    url: "/sukima/to_achieved/" + USER_ID + "/",
    success: function(goal_id){
        //終了時処理
        console.log("goal_id "+goal_id);
        form.find("input[name=hack]").val("やるぞ！");
        form.find("input[name=state]").val(0);
        $.ajax({
          type: "POST",
          url: "/sukima/hack_achieved/" + goal_id + "/",
          success: function(goal_id){
          //終了時処理
          var goals_elem = $("#select_goals");
          goals_elem.css("display","block");
          //timelineにリダイレクト
          $(location).attr("href", "/sukima/timeline");     
        }
      });
    }
  });

};

