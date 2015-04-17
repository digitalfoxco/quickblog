<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Posts extends Model implements SluggableInterface
{
	use SluggableTrait;
	
	protected $table = 'post';
	
	protected $sluggable = array(
		'build_from' => 'title',
		'save_to'    => 'slug',
	);

}
