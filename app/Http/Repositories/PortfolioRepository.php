<?php

namespace App\Http\Repositories;

use App\Http\Contracts\Article;
use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Collection;

class PortfolioRepository implements \App\Http\Contracts\PortfolioRepositoryInterface
{

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Portfolio::all();
    }

    /**
     * @param int $id
     * @return Portfolio|null
     */
    public function find(int $id): Portfolio
    {
        return Portfolio::query()->where('id', $id)->first();

    }

    /**
     * @param array $data
     * @return Portfolio
     */
    public function create(array $data): Portfolio
    {

            return Portfolio::query()->create([
                'title' => $data["title"],
                'about' => $data["about"],
                'color' => $data['color'],
                'img_url'=>$data['img_url']

            ]);


    }

    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function update(array $data, int $id): bool
    {
        return Portfolio::query()->where('id',$id)->update($data);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return Portfolio::query()->where('id',$id)->delete();

    }

}
