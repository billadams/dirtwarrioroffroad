<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = ['title', 'body'];
//    private $id;
//    private $title;
//    private $body;
//
//    public function getID()
//    {
//        return $this->id;
//    }
//    public function setID($value)
//    {
//        $this->id = $value;
//    }
//    public function getTitle()
//    {
//        return $this->title;
//    }
//    public function setTitle($value)
//    {
//        $this->title = $value;
//    }
//    public function getBody()
//    {
//        return $this->body;
//    }
//    public function setBody($value)
//    {
//        $this->body = $value;
//    }

    public function isPosted()
    {
        return false;
    }
}
