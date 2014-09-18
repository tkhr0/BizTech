$(function(){
  $(".cheer-form").submit(function(){
	  $this = $(this);
      console.log("test");
      // hiddenから必要な情報の抽出
      targetId = $this.find("input[name=target-id]").val();
      typeId = $this.find("input[name=target-id]").val();
      //変更するバッジ
      badge = $this.parent().find(".badge");
      $.ajax({
        type: "POST",
        url: "http://192.168.56/10/dammy/chaeering/" + targetId + "/" + typeId,
        success: function(msg){
          badge.text(msg);
          $this.find("input[type=submit]").val("応援しました！！").attr("disabled", "disabled");
        }
      });
      return false;
  });
});
