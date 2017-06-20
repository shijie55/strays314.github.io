<?php

namespace App\Repositories;

use App\Comment;

class CommentRepository
{
    public function create(array $attribute)
    {

    	$comments = Comment::create($attribute);

    	if ($comments) {
    		$model = $attribute['commentable_type'];
    		$id = $attribute['commentable_id'];
            $model::where('id', $id)->increment('comments_count');
        }	

        return $comments;
    }

   
}