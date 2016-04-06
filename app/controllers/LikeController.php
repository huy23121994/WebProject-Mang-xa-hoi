<?php

class LikeController extends BaseController{

	public function postCreate(){
		$data=Input::all();
		$old_like=Likes::where('status_id',$data['id'])->where('user_like',Session::get('user')['id'])->first();
		if (!$old_like) {
			$like=new Likes;
			$like['user_like']=Session::get('user')['id'];
			$like['status_id']=$data['id'];
			$like->save();
			if ($like) {
				echo "like";
			}
		}else{
			$old_like->delete();
			if ($old_like) {
				echo "unlike";
			}
		}
		
	}
}