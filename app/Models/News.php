<?php

namespace App\Models;

use App\Models\Traits\UsedFunctions;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Модель News
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $desc
 * @property Carbon|null $date
 * @property string|null $h1
 * @property string|null $content
 * @property string|null $image
 * @property int $pos
 * @property boolean $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class News extends Model
{
    use UsedFunctions;

    protected $guarded = [];

    protected $casts = [
        'date' => 'date',
        'is_active' => 'boolean',
    ];

    /**
     * Получить отформатированную дату для отображения
     */
    public function getFormattedDateAttribute(): string
    {
        return $this->date ? $this->date->locale('ru')->translatedFormat('j F Y') : '';
    }
}
