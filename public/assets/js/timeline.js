  USER_ID = $.cookie("user_id");
console.log("userID: " + USER_ID);
$(function(){
  // 応援ボタンが押された時の処理
  initCheerButton();
  initState();
  pushedCheeringButton();
  pushedMainButton();
});

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
  state = form.find("input[name=state]").val();
  console.log("init button state: " + state);
  if(state == 0){
    form.find("input[type=submit]").val("やるぞ！");
  }else if(state == 1){
    form.find("input[type=submit]").val("やるぞ！");    
    form.find("input[name=state]").val(0);    
  }else if(state == 2){
    form.find("input[type=submit]").val("やったぞ！");    
  }
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
        badge.animate({ 
          width: "+=4px",
          height: "+=4px",
          width: "+=4px",
          height: "+=4px",
          "mergin-left": "-=4px",
          "mergin-top": "-=4px",
          fontSize: "+=1px", 
          }, 100 , function(){
            badge.animate({
              width: "-=4px",
              height: "-=4px",
              "mergin-left": "+=3px",
              "mergin-top": "+=3px",
              fontSize: "-=1px",
            }, 100);
          }            
        );
      }
    });
    //submitのデフォルト機能のキャンセル
    return false;
  });
};


//メインボタンが押された時の処理(状態によって分岐)
var pushedMainButton = function(){
  $(".hack-form").submit(function(){
    console.log("pushed main button ->");
    $this = $(this);
    state = $this.find("input[name=state]").val();

    //ボタンを状態毎に場合分け
    if(state == 0){
      pushedMainButtonForSelect($this);    //やるぞボタン     
    }else if(state == 1){
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
  form.find("input[type=submit]").val("開始");
  form.find("input[name=state]").val(1);
  
  //目標一覧を更新
  $.ajax({
    type: "POST",
    url: "http://" + location.host + "/sukima/goals/" + USER_ID + "/",
    success: function(msg){
      //jqueryデータを受け取る
      var datas = $.parseJSON(msg);
      for(var i = 0; i < datas.length; i++){
        goals_select.append("<option value=" + datas[i].id + (i == 0 ? " selected" : "") + ">" + datas[i].name + "</option>");
      }
    }
  });
  reloadAddTimeline(0, 10);
};


//ユーザが活動を開始するボタン
var pushedMainButtonForHackStart = function(form){
  console.log("pushed main button for hack start");

  form.css("display","block");
  form.find("select").eq(0);
  form.find("input[name=goal]").addClass("display-none");
  form.find("select").addClass("display-none");
  form.find("input[type=submit]").val("やったぞ！");
  form.find("input[name=state]").val(2);
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
      url: "http://" + location.host + "/sukima/hack_start/" + goal_id + "/",
      success: function(msg){
        //終了時処理
        //timelineにリダイレクト
        $(location).attr("href", "/sukima/timeline");      }
    });
  };

  //目標を新規作成
  if(isFilledGoalName(form, goalName)){
    console.log("make new goal");
    $.ajax({
      type: "POST",
      url: "http://" + location.host + "/sukima/make_goal/" + goalName + "/" + USER_ID + "/",
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
  form.find("input[type=submit]").val("やるぞ！");
  form.find("input[name=state]").val(0);
  
  //活動している目標のIDを取得し，その成功後，そのIDでコンテナを生成
  $.ajax({
    type: "POST",
    url: "http://" + location.host + "/sukima/active_id/" + USER_ID + "/",
    success: function(goal_id){
      //終了時処理
        $.ajax({
          type: "POST",
          url: "http://" + location.host + "/sukima/hack_end/" + goal_id + "/",
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
    url: "http://" + location.host + "/sukima/timeline_add/" + $offset + "/" + $num,
    success: function(add_timeline){
      //終了時処理
      $("#timeline").append(add_timeline);
      console.log($("#timeline"));
    }
  });
}