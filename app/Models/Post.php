<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    protected $with=['author','category'];
   protected $fillable=[
       'title',
       'slug',
       'user_id',
       'category_id',
       'excerpt',
       'body'
   ];
   public function scopeFilter($query ,array $filter){

       $query->when($filter['search']??false,
       fn($query,$search)=>
       $query->where(
           fn($query)=>
           $query
               ->where('title','like','%'.$search.'%')
               ->orwhere('body','like','%'.$search.'%'))

       );
       $query->when($filter['category']??false,
           fn($query,$category)=>$query->whereHas('category',fn($query)=>$query->where('slug',$category))
);
       $query->when($filter['author']??false,
        fn($query,$id)=>$query->whereHas('author',fn($query)=>$query->where('id',$id)

       ));

   }

   function author(){
       return $this->belongsTo(User::class,"user_id");
   }
   function category(){
      return $this->belongsTo(Category::class);
   }
}
