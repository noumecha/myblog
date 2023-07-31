<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //use HasFactory;

    /**
     * products getters & setters
     */
    public function getId() {
        return $this->attributes['id'];
    }
    public function setId($id) {
        $this->attributes['id'] = $id;
    }
    public function getTitle() {
        return $this->attributes['title'];
    }
    public function setTitle($title) {
        $this->attributes['title'] = $title;
    }
    public function getImage() {
        return $this->attributes['image'];
    }
    public function setImage($image) {
        $this->attributes['image'] = $image;
    }
    public function getContent() {
        return $this->attributes['content'];
    }
    public function setContent($content) {
        $this->attributes['content'] = $content;
    }
    public function getCreatedAt() {
        return $this->attributes['created_at'];
    }
    public function setCreatedAt($createdAt) {
        $this->attributes['created_at'] = $createdAt;
    }
    public function getUpdatedAt() {
        return $this->attributes['updated_at'];
    }
    public function setUpdatedAt($updatedAt) {
        $this->attributes['updated_at'] = $updatedAt;
    }
    public static function validate($request) {
        $request->validate([
            "title" => "required|max:255",
            "content" => "required",
            "image" => "image",
        ]);
    }
}
