<?php

require 'vendor/autoload.php';

use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

AnnotationDriver::registerAnnotationClasses();

require 'models/User.php';
require 'models/BlogPost.php';

$config = new Configuration();
$config->setProxyDir('./proxies');
$config->setProxyNamespace('Proxies');
$config->setHydratorDir('./hydrators');
$config->setHydratorNamespace('Hydrators');
$config->setMetadataDriverImpl(AnnotationDriver::create('./models'));

$dm = DocumentManager::create(new Connection(), $config);

// create user
$user = new User();
$user->name = 'Bulat S.';
$user->email = 'email@example.com';

// tell Doctrine 2 to save $user on the next flush()
$dm->persist($user);

// create blog post
$post = new BlogPost();
$post->title = 'My First Blog Post';
$post->body = 'MongoDB + Doctrine 2 ODM = awesomeness!';
$post->createdAt = new DateTime();

array_push($user->posts, $post);

// store everything to MongoDB
$dm->flush();
