$(function(){
  makeGoalListener();
});

var makeGoalListener = function(){
  var USER_ID = $.cookie("user_id");
  $(".hack-reg-form").submit(function(){
    $this = $(this);
    //目標を新規作成
    var goalName = $this.find("input[name=goal]").val();
    if(isFilledGoalName($this, goalName)){
      $.ajax({
        type: "POST",
        url: "/sukima/make_goal/" + goalName + "/" + USER_ID + "/",
        success: function(){
          //終了時処理
          $(location).attr("href", "/sukima/timeline");
        }
      });
    }
  });
  return false;
}

//新規目標名が入力されているかどうかを判定
var isFilledGoalName = function(form, goalName){
  if(goalName == ""){
    return false;
  }else{
    return true;
  }
};

//選択されている目標IDを取得
var getSelectedId = function(){
  return form.find("select option:selected").val();
}


