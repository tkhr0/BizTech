$(function(){
  // フォローボタンが押された時の処理
  pushedFollowingButton();
  followButtonInitialize();
});

// フォローボタンが押された時の処理
var pushedFollowingButton = function(){
  $('.follow-form').submit(function(){
    $this = $(this);

    // hiddenから必要な情報の抽出
    userId = $this.find("input[name=user-id]").val();
    followerId = $this.find("input[name=follow-id]").val();

    $this.find("input[type=submit]").val("フォロー済み").attr("disabled", "disabled");
    $.ajax({
      type: "POST",
      url: "http://192.168.56.10/sukima/follower/" + userId + "/" + followerId,
      success: function(msg){
        }
        });
    //submitのデフォルト機能のキャンセル
    return false;
  });
};

// フォローボタンの初期状態を指定
var followButtonInitialize = function(){
  // hiddenから必要な情報の抽出
  var followable = $(".follow-btn").eq(0).find("input[name=followable]").val();
  if(followable == '0'){
    $(".follow-btn").eq(0).find("input[type=submit]").val("フォロー済み").attr("disabled", "disabled");
  }
};

