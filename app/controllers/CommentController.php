<?php

class CommentController extends BaseController{

	public function postCreate(){
		$data=Input::all();
		$comment=new Comments;
		$comment['user_comment']=Session::get('user')['id'];
		$comment['content']=$data['comment'];
		$comment['status_id']=$data['status_id'];
		$comment->save();
		if ($comment) {
			echo "success";
		}
	}

	public function postEdit(){
		
	}

	public function postDelete(){
		
	}
}