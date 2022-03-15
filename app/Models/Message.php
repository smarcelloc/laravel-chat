<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $content
 * @property int $user_from_id
 * @property int $user_to_id
 * @property int $created_at
 * @property int $updated_at
 */
class Message extends Model
{
    use HasFactory, Uuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['content', 'user_from_id', 'user_to_id'];
}
