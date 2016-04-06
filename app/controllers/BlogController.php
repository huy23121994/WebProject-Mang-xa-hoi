<?php

class BlogController extends BaseController{

	public function postCreate(){
		$data=Input::all();
		if ($data['content']!=null) {
			$status=new Status;
			$status['content']=$data['content'];
			$status['user_id']=Session::get('user')['id'];
			$status['public']=$data['public'];
			$status->save();
			if ($status) {
				echo $status['id'];
			}
		}else{
			echo "null";
		}
	}

	public function postEdit(){
		
	}

	public function postDelete(){
		
	}
}