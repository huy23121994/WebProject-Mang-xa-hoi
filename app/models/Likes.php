<?php
class Likes extends Eloquent {
	protected $table = 'likes';

	public function user(){
		return $this->belongsTo('Users','user_like');
	}
	public function status(){
		return $this->belongsTo('Status','status_id');
	}
}