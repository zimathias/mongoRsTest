<?php
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document */
class BlogPost
{
    /** @ODM\Id */
    public $id;

    /** @ODM\String */
    public $title;

    /** @ODM\String */
    public $body;

    /** @ODM\Date */
    public $createdAt;

}
