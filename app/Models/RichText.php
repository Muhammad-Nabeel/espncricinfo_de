<?php

// app\Models\RichText.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RichText extends Model
{
    protected $table = 'rich_texts';

    protected $fillable = ['field', 'record_id', 'record_type', 'body'];

    // Other model configurations, relationships, etc.
}
