<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
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
    public function getName() {
        return $this->attributes['name'];
    }
    /**
     * @inheritdoc
     */
    public function setName($name) {
        $this->attributes['name'] = $name;
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
     * this function helps us validate input entry
     */
    public static function validate($request) {
        $request->validate([
            "name" => "required|max:255",
        ]);
    }
}

