<?php

namespace App\Models;

use App\Models\Traits\UsedFunctions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Characteristic;

class Product extends Model
{
    use UsedFunctions;

    protected $guarded = [];

    protected $casts = [
        'add_info' => 'array',
        'add_images' => 'array',
    ];

    public function getAllImages()
    {
        return array_merge([$this->image], $this->add_images);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function characteristics(): BelongsToMany
    {
        return $this->belongsToMany(Characteristic::class, 'product_characteristic', 'product_id', 'characteristic_id')
            ->withPivot('value');
    }

    public function activeCharacteristics(): BelongsToMany
    {
        return $this->belongsToMany(Characteristic::class, 'product_characteristic', 'product_id', 'characteristic_id')
            ->withPivot('value')
            ->whereIn('characteristic_id', function($query) {
                $query->select('characteristic_id')
                    ->from('category_characteristic')
                    ->whereIn('category_id', $this->category?->getSelfAndAllParentIds())
                    ->where('is_active', true);
            });
    }

    public function getAllCategoryParentIds(): array
    {
        if (!$this->category) {
            return [];
        }

        $categoryIds = [];
        $currentCategory = $this->category;

        $categoryIds[] = $currentCategory->id;

        while ($currentCategory->parent) {
            $currentCategory = $currentCategory->parent;
            $categoryIds[] = $currentCategory->id;
        }

        return $categoryIds;
    }

    public function similars(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'product_similars',
            'product_id',
            'similar_id'
        )->where('is_active', true);
    }

    public function getSimilars()
    {
        $similars = $this->similars;

        if ($similars->isEmpty()) {

            $similars = self::query()
                ->with('category')
                ->where('category_id', $this->category_id)
                ->where('id', '!=', $this->id)
                ->where('is_active', true)
                ->where('price', '>', 0)
                ->inRandomOrder()
                ->limit(6)
                ->get();
        }

        return $similars;
    }

    public function hasDiscount(): bool
    {
        if (empty($this->old_price)) {
            return false;
        }

        return ($this->old_price - $this->price) > 0;
    }

    public function isCategoriesActive(): bool
    {
        if (!$this->category) {
            return false;
        }

        $category = $this->category;

        if ($category->isFirstLevel()) {
            return $category->is_active;
        }

        if ($category->isSecondLevel()) {
            return $category->parent?->is_active;
        }

        if ($category->isThirdLevel()) {
            return $category->parent?->parent?->is_active;
        }

        return false;
    }
}
