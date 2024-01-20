<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
//use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Post extends Model
{
    use HasFactory;
    //use HasRichText;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'PostTitle',
        'PostDescription',
        'PostPublishedDate',
        'PostMedia',
        'PostMediaType',
        'PostThumb',
        'PostModifiedDate',
        'categoryId',
        'Slug'
    ];

    //protected $richTextFields = ['PostDescription'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'PostPublishedDate' => 'datetime',
        'PostModifiedDate' => 'datetime',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'PostId';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId', 'Id');
    }
}
