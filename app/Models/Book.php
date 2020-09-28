<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function PHPUnit\Framework\assertGreaterThan;

class Book extends Model
{
    use HasFactory;
    protected $fillable=['id','name','title','photo','found','description','category_id','user_id'];
    public function category(){
        return $this ->belongsTo('App\Models\Category');
    }

    public function borrowRequests(){
        return $this->hasMany('App\Models\BorrowRequest');
    }

    public function getFound(){
        return $this->found==1?"Founded":"Not Founded";
    }
    public function getPhotoAttribute($q){
        return ($q!==null)?asset('assests/images/books/'.$q):"";
    }

}
