<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowRequest extends Model
{
    use HasFactory;
    protected $fillable=['id','number_of_days','book_name','user_name','status','user_id','Too','book_id'];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function book(){
        return $this->belongsTo('App\Models\Book');
    }
    public function getStatus(){
        return $this->status==1?"Yes":"No";
    }


}
