var YELLOW = "#e4d351";

$(function(){
  // フォローボタンの初期化
  followButtonInitialize();
  // フォローボタンが押された時の処理
  pushedFollowingButton();
  //応援ボタンのリスナ
  cheerButtonListner();
});

// フォローボタンが押された時の処理
var pushedFollowingButton = function(){
  $('.follow-form').submit(function(){
    $this = $(this);
    console.log("pushed follow button");
    // hiddenから必要な情報の抽出
    userId = $this.find("input[name=user-id]").val();
    followerId = $this.find("input[name=follow-id]").val();
    followable = $(".follow-btn").eq(0).find("input[name=followable]").val();
    
    if(followable == 1){
      $.ajax({
        type: "POST",
        url: "/sukima/set_follow/" + followerId + "/" + userId,
        success: function(msg){
          console.log("following");
          $this.find("input[type=submit]").val("フォロー解除").removeClass("label-success").addClass("label-danger");
          $(".follow-btn").eq(0).find("input[name=followable]").val(0); 
        }
      });     
    }else{
      $this.find("input[type=submit]").val("フォロー").removeClass("label-danger").addClass("label-success");
      $.ajax({
        type: "POST",
        url: "/sukima/remove_follow/" + followerId + "/" + userId,
        success: function(msg){
          console.log("unfollowing");
          $(".follow-btn").eq(0).find("input[name=followable]").val(1);
        }
      });    
    }

    //submitのデフォルト機能のキャンセル
    return false;
  });
};

// フォローボタンの初期状態を指定
var followButtonInitialize = function(){
  // hiddenから必要な情報の抽出
  var followable = $(".follow-btn").eq(0).find("input[name=followable]").val();
  if(followable == '0'){
    $(".follow-form").find("input[type=submit]").val("フォロー解除").removeClass("label-success").addClass("label-danger");
  }
};

// 応援ボタンのリスナを設定
var cheerButtonListner = function(){
  $('.cheer-form').submit(function(){
    $this = $(this);
    console.log("pushed cheer button");
    // hiddenから必要な情報の抽出
    userId = $this.find("input[name=user-id]").val();
    targetId = $this.find("input[name=target-id]").val();
    typeId = $this.find("input[name=type-id]").val();
    badge = $this.parent().find(".badge");

    $.ajax({
      type: "POST",
      url: "/sukima/cheer/" + targetId + "/" + typeId,
      success: function(msg){
	var ret = jQuery.parseJSON(msg);
        var count = ret.count;
        console.log("応援！");
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
	    $this.parent().find(".cheerer_list").append("<li><a href='" + url + "'><img width='20px 'src='" + path  + "' /></\
a></li>");
	}
      }
    });
    //submitのデフォルト機能のキャンセル
    return false;
  });  
}