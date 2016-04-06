<?php
class Users extends Eloquent {
	protected $table = 'users';

	public function album(){
		return $this->hasMany('Albums','user_id');
	}
	public function status(){
		return $this->hasMany('Status','user_id');
	}
	public function blog(){
		return $this->hasMany('Blogs','user_id');
	}
	public function like(){
		return $this->hasMany('Likes','user_like');
	}
	public function comment(){
		return $this->hasMany('Likes','user_comment');
	}
}