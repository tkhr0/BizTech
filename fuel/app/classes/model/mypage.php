<? php 

Class Model_Mypage extends \Model_Crud{
	
	
	public function action_select(){
		 //データベース接続
   		$query = DB::select()->from('users')->execute()->as_array();
   		$data = array("query" => $query);
   		//データベース情報の引き渡し
   		//return Response::forge(View_Smarty::forge('sample1/content.tpl', $data));
	
		
	}
}
