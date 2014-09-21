$(function(){
  searchFormListner();
  followButtonListner();
});

var searchFormListner = function(){
  $(".search-form").submit(function(){
    $this = $(this);
    query = $this.find("input[name=query]").val();
    console.log(query);
    search(query);
    return false;
  });
};

var search = function(query){
  $.ajax({
    type: "POST",
    url: "/community/search_communities/" + query + "/",
    success: function(result){
      //終了処理
      clearResult();
      $("#result").append(result);
    }
  });
};

var clearResult = function(){
  $("#result").find(".community").remove();
};

var following = function(community_id){
  $.ajax({
    type: "POST",
    url: "/community/to_belong/" + community_id + "/",
    success: function(result){
      //終了処理
    }
  });
  return false;
};

var followButtonListner = function(){
  $(".follow-form").submit(function(){
    $this = $(this);
    community_id = $this.find("input[name=target_id]").val();
    type = $this.find("input[name=type-id]").val();
    console.log(query);
    search(query);
    return false;
  });
};
