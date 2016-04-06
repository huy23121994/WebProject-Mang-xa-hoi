<?php

class ViewController extends BaseController {

	public function getIndex(){
		if (Session::has('user')) {
			$data['status']=Status::where('public','public')->orderBy('updated_at','desc')->get();
			$data['current_status']=Status::where('user_id',Session::get('user')['id'])->orderBy('created_at','desc')->first();
			$data['comments']=Comments::all();
			$data['like']=Likes::all();
			return View::make('frontend/index',$data);
		}
		return View::make('frontend/signin_signup/login');
	}
}
