<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function getId() {
        return $this->attributes['id'];
    }
    public function setId($id) {
        $this->attributes['id'] = $id;
    }
    public function getName() {
        return $this->attributes['names'];
    }
    public function setName($name) {
        $this->attributes['names'] = $name;
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
