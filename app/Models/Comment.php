<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
    * @inheritdoc
    */
    public function getId() {
        return $this->attributes['id'];
    }
    /**
    * @inheritdoc
    */
    public function setId($id) {
        $this->attributes['id'] = $id;
    }
    /**
     * @inheritdoc
     */
    public function getParentId() {
        return $this->attributes['parent_id'];
    }
    /**
     * @inheritdoc
     */
    public function setParentId($parentId) {
        $this->attributes['parent_id'] = $parentId;
    }
    /**
    * @inheritdoc
    */
    public function getArticleId() {
        return $this->attributes['article_id'];
    }
    /**
    * @inheritdoc
    */
    public function setArticleId($articleId) {
       $this->attributes['article_id'] = $articleId;
    }
    /**
    * @inheritdoc
    */
    public function getUserId() {
        return $this->attributes['user_id'];
    }
    /**
    * @inheritdoc
    */
    public function setUserId($UserId) {
       $this->attributes['user_id'] = $UserId;
    }
    /**
    * @inheritdoc
    */
    public function getContent() {
        return $this->attributes['content'];
    }
    /**
    * @inheritdoc
    */
    public function setContent($content) {
        $this->attributes['content'] = $content;
    }
    /**
    * @inheritdoc
    */
    public function getCreatedAt() {
        return $this->attributes['created_at'];
    }
    /**
    * @inheritdoc
    */
    public function setCreatedAt($createdAt) {
        $this->attributes['created_at'] = $createdAt;
    }
    /**
    * @inheritdoc
    */
    public function getUpdatedAt() {
        return $this->attributes['updated_at'];
    }
    /**
    * @inheritdoc
    */
    public function setUpdatedAt($updatedAt) {
        $this->attributes['updated_at'] = $updatedAt;
    }
    /**
     * @inheritdoc
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
    /**
     * @inheritdoc
     */
    public function replies() {
        return $this->hasMany(Comment::class, 'parent_id');
    }
    /**
     * @inheritdoc
     */
    public static function validate($request) {
        $request->validate([
            "content" => "required",
        ]);
    }
}
