<?php
class Images extends Eloquent {
	protected $table = 'images';

	public function album(){
		return $this->belongsTo('Album','album_id');
	}
}