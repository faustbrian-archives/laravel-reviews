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

namespace KodeKeep\Reviewable\Concerns;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use KodeKeep\Reviewable\Models\Review;

trait HasReviews
{
    public function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function getRating(): float
    {
        return round($this->reviews()->avg('rating'));
    }
}
