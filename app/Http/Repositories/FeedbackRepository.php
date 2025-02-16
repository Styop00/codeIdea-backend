<?php

namespace App\Http\Repositories;

use App\Http\Contracts\FeedbackRepositoryInterface;
use App\Models\Feedback;
use Illuminate\Database\Eloquent\Collection;

class FeedbackRepository implements FeedbackRepositoryInterface
{
    /**
     * @param Feedback $feedback
     */
    public function __construct(protected Feedback $feedback)
    {
    }


    /**
     * @param array $relations
     * @return Collection
     */
    public function all(array $relations = []): Collection
    {
        return $this->feedback->with($relations)->get();
    }

    /**
     * @param int $id
     * @return Feedback|null
     */
    public function find(int $id): Feedback|null
    {
        return $this->feedback->find($id);
    }

    /**
     * @param array $data
     * @return Feedback
     */
    public function create(array $data): Feedback
    {
        return $this->feedback->create($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function update(array $data, int $id): bool
    {
        return $this->feedback->where('id', $id)->update($data);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->feedback->destroy($id);
    }
}
