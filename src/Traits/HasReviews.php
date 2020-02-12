<?php

declare(strict_types=1);

/*
 * This file is part of Skeleton.
 *
 * (c) KodeKeep <hello@kodekeep.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KodeKeep\Reviewable\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasReviews
{
    public function reviews(): MorphMany
    {
        return $this->morphMany(config('laravel-reviewable.models.review'), 'reviewable');
    }

    public function createReview($data, Model $author, Model $parent = null): bool
    {
        return $this->getReviewModel()->createReview($this, $data, $author);
    }

    public function updateReview($id, $data, Model $parent = null): bool
    {
        return $this->getReviewModel()->updateReview($id, $data);
    }

    public function deleteReview($id): bool
    {
        return $this->getReviewModel()->deleteReview($id);
    }

    public function getRating(): float
    {
        return round($this->reviews()->avg('rating'));
    }

    protected function getReviewModel(): Model
    {
        $model = config('laravel-reviewable.models.review');

        return new $model();
    }
}
