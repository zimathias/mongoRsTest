<?php
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document */
class User
{
    /** @ODM\Id */
    public $id;

    /** @ODM\String */
    public $name;

    /** @ODM\String */
    public $email;

    /** @ODM\ReferenceMany(targetDocument="BlogPost", cascade="all") */
    public $posts = array();

}
