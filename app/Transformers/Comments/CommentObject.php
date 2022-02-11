<?php


namespace App\Transformers\Comments;


class CommentObject
{
    public $id;
    public $body;
    public $author_name;
    public $vote;
    public $created_at;

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body): void
    {
        $this->body = $body;
    }

    /**
     * @param mixed $author_name
     */
    public function setAuthorName($author_name): void
    {
        $this->author_name = $author_name;
    }

    /**
     * @param mixed $vote
     */
    public function setVote($vote): void
    {
        $this->vote = $vote;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }


}