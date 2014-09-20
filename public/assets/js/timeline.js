$(function(){
  initCheerButton();
  // 応援ボタンが押された時の処理
  pushedCheeringButton();
  // やるぞボタン(hack)をおしたとき
  pushedHackButton();
  //fixedFooter();
  fixedHackBtn();
});

var fixedHackBtn = function(){
  console.log("loaded HackBtn");
  var btn = $("#hacka_btn");
  var pos = btn.position();
  var height = $(window).height();
  var width = $(window).width();
  var xpos = (height - btn.height());
  var ypos = (width - btn.width())/2.0;
  btn.css("position","fixed");
  btn.css("bottom","0");
/*
  btn.css({
    "position":"absolute",
    "left":xpos+"px",
    "bottom":0+"px"
  });*/
};
var fixedFooter = function(){
  var footer = $("#footer");
  var pos = footer.position();
  var height = $(window).height();
  var width = $(window).width();
  height = height - pos.top;
  height = height - footer.height();
  width  = width - pos.left;
  width  = width - footer.width()/2.0;
  console.log(height);
  if (height > 0) {
    footer.css({
      //'margin-top': height + 'px'
      'top': height + 'px'
    });
    footer.css({
      //'margin-left': width + 'px'
      'left': width + 'px'
    });
  }
};
//ボタンの初期状態を設定
var initCheerButton = function(){
  cheerForms = $(".cheer-form");
  $.each(cheerForms, function(){
    $this = $(this);
    count = $this.find("input[name=cheer-status]").val();
    if(count > 1000){ // テスト用に制限解除
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

    // テスト用に制限解除
    //$this.find("input[type=submit]").val("応援しました！！").attr("disabled", "disabled");
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
