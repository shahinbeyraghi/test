<?php


namespace App\Transformers\Products;


class ProductObject
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $comment_status;
    public $vote;
    public $average_rate;
    public $comment_count;

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @param mixed $comment_status
     */
    public function setCommentStatus($comment_status): void
    {
        $this->comment_status = $comment_status;
    }

    /**
     * @param mixed $vote
     */
    public function setVote($vote): void
    {
        $this->vote = $vote;
    }

    /**
     * @param mixed $average_rate
     */
    public function setAverageRate($average_rate): void
    {
        $this->average_rate = $average_rate;
    }

    /**
     * @param mixed $comment_count
     */
    public function setCommentCount($comment_count): void
    {
        $this->comment_count = $comment_count;
    }


}