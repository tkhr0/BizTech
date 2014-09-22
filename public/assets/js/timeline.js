var USER_ID = $.cookie("user_id");
console.log(USER_ID);
var RELOAD_NUM = 10;
console.log("userID: " + USER_ID);
$(function(){
  initCheerButton();
  initState();
  // 応援ボタンが押された時の処理
  cheeringButtonListner();
  // やるぞボタン(hack)をおしたとき
  mainButtonListner();
  achievedButtonListener();
  // タイムラインの自動追加読み込み
  autoLoader();
});

var autoLoader = function(){
  $(window).bottom({proximity: 0.1});
  $(window).bind("bottom", function() {
    var obj = $(this);
    if (!obj.data("loading")) {
      obj.data("loading", true);

      var offset = $("#timeline").find(".activity").length;
      $('#timeline').append('<p>NOW LOADING...</p>');
      setTimeout(function() {
        $('#timeline p:last').remove();
        //タイムラインを追加でリロード
        reloadAddTimeline(offset, RELOAD_NUM);
        obj.data("loading", false);
      }, 800);
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
  var goal_select = form.find("select");
  var goal_input = form.find("input[name=goal]");
  achieve = $(".achieve-form");
  state = $(".state-holder").find("input[name=state]").val();
  console.log("init button state: " + state);

  //目標一覧を更新
  $.ajax({
    type: "POST",
    url: "/sukima/goals/" + USER_ID + "/",
    success: function(msg){
      //jqueryデータを受け取る
      console.log("select is loaded");
      var datas = $.parseJSON(msg);
      for(var i = 0; i < datas.length; i++){
	  $(".hack-form select").append("<option value=" + datas[i].id + (i == 0 ? " selected" : "") + ">" + datas[i].name + "</option>");
      }
    }
  });


  if(state == 0){
    $(".modal-title").text("目標を登録しましょう！");
    form.find("input[name=hack]").val("開始");//.attr("disabled", "disabled");
    achieve.find("input[name=achieve]").hide();
  }else if(state == 2){
    $(".modal-title").text("おめでとうございます！");
    form.find("input[name=hack]").val("やったぞ！");
    form.find("h4").text("活動終了！");
    goal_select.hide();
    goal_input.hide();
  }
};

// 応援ボタンが押された時の処理
var cheeringButtonListner = function(){
  $(".cheer-form").unbind().submit(function(){
    var $this = $(this);

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
        var ret = jQuery.parseJSON(msg);
        var count = ret.count;
        badge.text(count);
	console.log(msg);
                
        badge.addClass("background-yellow");
        setTimeout(function(){
          badge.removeClass("background-yellow");
        }, 130);

        var user = ret.user;
        if(user){
	    console.log("first cheer");
          var path = user.thumbnail;
          var name = user.name;
          var url = user.url;
	  $this.parent().find(".cheerer_list").append("<li><a href='" + url + "'><img width='20px' src='" + path  + "' /></a></li>");
        }
      }
    });
    //submitのデフォルト機能のキャンセル
    return false;
  });
};

//メインボタンが押された時の処理(状態によって分岐)
var mainButtonListner = function(){
    console.log("mainButtonListner set");
  $(".hack-form").submit(function(){
    console.log("pushed main button ->");
    $this = $(this);
    state = $(".state-holder").find("input[name=state]").val();
    console.log(state);
    //ボタンを状態毎に場合分け
    if(state == 0){
      pushedMainButtonForHackStart($this); //開始ボタン #timelineにリダイレクト
    }else if(state == 2){
      pushedMainButtonForHackEnd($this);   //やったぞボタン
    }
     //submitのデフォルト機能のキャンセル
    return false;
  });
};

//ユーザが非アクティブの時のボタン
var pushedMainButtonForSelect = function(form){
  console.log("pushed main button for select");
  //hiddenから必要な情報の抽出
  targetId = form.find("input[name=target-id]").val();
  typeId = form.find("input[name=type-id]").val();

  form.css("display","block");
  var goals_select = form.find("select");
  form.find("select").removeClass("display-none");
  form.find("input[name=goal]").removeClass("display-none");
  form.find("input[name=hack]").val("開始");
  //$(".state-holder").find("input[name=state]").val(2);
  //console.log("status 2 set");
};


//ユーザが活動を開始するボタン
var pushedMainButtonForHackStart = function(form){
  console.log("pushed main button for hack start");

  form.css("display","block");
  form.find("select").eq(0);
  form.find("input[name=goal]").addClass("display-none");
  form.find("select").addClass("display-none");
  //form.find("input[name=hack]").val("やったぞ！");
  $(".state-holder").find("input[name=state]").val(2);
  goalName = form.find("input[name=goal]").val();

  //選択されている目標IDを取得
  var getSelectedId = function(){
    return form.find("select option:selected").val();
  }

  //新規目標名が入力されているかどうかを判定
  var isFilledGoalName = function(form, goalName){
    if(goalName == ""){
	return false;
    }else{
	return true;
    }
  };

  //活動開始をするための通信
  var ajaxForStartActivity = function(goal_id){
    $.ajax({
      type: "POST",
      url: "/sukima/hack_start/" + goal_id + "/",
      success: function(msg){
        //終了時処理
        //timelineにリダイレクト
        $(location).attr("href", "/sukima/timeline");
      }
    });
  };

  //目標を新規作成
  if(isFilledGoalName(form, goalName)){
    console.log("make new goal");
    $.ajax({
      type: "POST",
      url: "/sukima/make_goal/" + goalName + "/" + USER_ID + "/",
      success: function(new_goal_id){
        //終了時処理
        ajaxForStartActivity(new_goal_id);
      }
    });
  }else{
    console.log("not make new goal");
    selected = getSelectedId();
    ajaxForStartActivity(selected);
    console.log("GoalID: " + selected + " is selected");
  }
};

var pushedMainButtonForHackEnd = function(form){
  console.log("pushed main button for hack end");

  //hiddenから必要な情報の抽出
  targetId = form.find("input[name=target-id]").val();
  typeId = form.find("input[name=type-id]").val();

  var goals_elem = $("#select_goals");
  goals_elem.css("display","block");
  var goals_select = goals_elem.find("select").eq(0);
  //form.find("input[name=hack]").val("やるぞ！");
  $(".state-holder").find("input[name=state]").val(0);

  //活動している目標のIDを取得し，その成功後，そのIDでコンテナを生成
  $.ajax({
    type: "POST",
    url: "/sukima/active_id/" + USER_ID + "/",
    success: function(goal_id){
      //終了時処理
        $.ajax({
          type: "POST",
          url: "/sukima/hack_end/" + goal_id + "/",
          success: function(goal_id){
          //終了時処理
          //timelineにリダイレクト
          $(location).attr("href", "/sukima/timeline");
        }
      });
    }
  });
};

var reloadAddTimeline = function($offset, $num){
  $.ajax({
    type: "POST",
    url: "/sukima/timeline_add/" + $offset + "/" + $num,
    success: function(add_timeline){
      //終了時処理
      $("#timeline").append(add_timeline);
      console.log($("#timeline"));
      cheeringButtonListner();
    }
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
        //form.find("input[name=hack]").val("やるぞ！");
        $(".state-holder").find("input[name=state]").val(0);
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
