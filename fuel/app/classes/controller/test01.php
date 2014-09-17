<?php 

class Controller_Test01 extends Controller
{

    public function action_index()
    {
        //値
        $data = array(
            'msg' => 'SmartyとFuelPHPの連携テスト'
        );

        //テンプレート呼び出し
        return Response::forge(View_Smarty::forge('test01', $data));
    }

}
