<?php
class Blogs extends Eloquent {
	protected $table = 'blogs';

	public function user(){
		return $this->belongsTo('Users','user_id');
	}
	public function like(){
		return $this->hasMany('Likes','blog_id');
	}
	public function comment(){
		return $this->hasMany('Comments','blog_id');
	}
}