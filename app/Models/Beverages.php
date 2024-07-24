<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Beverages extends Model
{
    use HasFactory;
       /**
     * The attributes that are mass assignable.
     *
    * @var array<int, string>
    */
   protected $fillable = [
       'bname',
       'price',
       'descrip',
       'category_id',
       'special',
       'published',
       'image'
       
   ];
     /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
      return [
          'beverage_date' => 'datetime',
      ];
  }
   public function category(): BelongsTo {
    return $this->belongsTo(Categories::class);
   }
}