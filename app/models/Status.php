<?php
class Status extends Eloquent {
	protected $table = 'status';

	public function user(){
		return $this->belongsTo('Users','user_id');
	}
	public function like(){
		return $this->hasMany('Likes','status_id');
	}
	public function comment(){
		return $this->hasMany('Comments','status_id');
	}
}