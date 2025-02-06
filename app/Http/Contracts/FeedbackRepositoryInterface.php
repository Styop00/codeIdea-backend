<?php

namespace App\Http\Contracts;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Collection;

interface FeedbackRepositoryInterface
{
    public function all(): Collection;

    public function find(int $id): Feedback|null;

    public function create(array $data): Feedback;

    public function update(array $data, int $id): bool;

    public function delete(int $id): bool;
}
