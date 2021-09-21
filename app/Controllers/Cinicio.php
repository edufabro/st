<?php

namespace App\Controllers;

class Cinicio extends BaseController
{
    public function index()
    {
        return view('index');
    }
    public function inicio($param1=null)
    {
		$data['param1'] = $param1;
		
        return view('Vinicial',$data);
    }
}
?>