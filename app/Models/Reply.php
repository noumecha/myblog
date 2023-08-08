<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
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
    public function getContent() {
        return $this->attributes['content'];
    }
    /**
     * @inheritdoc
     */
    public function setContent($content) {
        $this->attributes['content'] = $content;
    }    /**
    * @inheritdoc
    */
    public function getCommentId() {
        return $this->attributes['comment_id'];
    }
    /**
     * @inheritdoc
     */
    public function setCommentId($commentId) {
        $this->attributes['comment_id'] = $commentId;
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
    public function setUserId($userId) {
        $this->attributes['user_id'] = $userId;
    }
}
