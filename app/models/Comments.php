<?php
class Comments extends Eloquent {
	protected $table = 'comments';

	public function user(){
		return $this->belongsTo('Users','user_comment');
	}
}