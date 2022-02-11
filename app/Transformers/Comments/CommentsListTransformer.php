<?php


namespace App\Transformers\Comments;


use App\Transformers\BaseTransformer;

class CommentsListTransformer extends BaseTransformer
{

    /**
     * @param array $data
     *
     * @return array
     */
    public function Transform($data = []):array
    {
        if (!$data) {
            return [];
        }

        foreach ($data as $comment) {
            $commentObject = new CommentObject();
            $commentObject->setId($comment->id);
            $commentObject->setBody($comment->body);
            $commentObject->setAuthorName($comment->author_name);
            $commentObject->setVote($comment->vote);
            $commentObject->setCreatedAt($comment->created_at);

            $this->response[] = $commentObject;
        }

        return $this->response;
    }
}