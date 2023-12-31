<?php

namespace App\Repositories\EloquentORM;

use App\DTO\Supports\{
    CreateSupportDTO,
    UpdateSupportDTO
};
use App\Models\Support;
use App\Repositories\PaginationInterface;
use App\Repositories\Presenter\PaginationPresenter;
use App\Repositories\SupportRepositoryInterface;
use stdClass;

class SupportRepository implements SupportRepositoryInterface
{
    public function __construct(protected Support $model)
    {
    }

    public function paginate(int $page = 1, int $perPage = 15, string $filter = null): PaginationInterface
    {
        $result = $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('subject', 'like', '%' . $filter . '%');
                    $query->orWhere('body', 'like', '%' . $filter . '%');
                }
            })
            ->paginate($perPage, ['*'], 'page', $page);

        return new PaginationPresenter($result);
    }

    public function getAll(string $filter = null): array
    {
        return $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('subject', 'like', '%' . $filter . '%');
                    $query->orWhere('body', 'like', '%' . $filter . '%');
                }
            })
            ->get()
            ->toArray();
    }

    public function findOne(string $id): stdClass | null
    {
        $support = $this->model->find($id);

        if (!$support) return null;

        return (object) $support->toArray();
    }

    public function new(CreateSupportDTO $data): stdClass
    {
        $support = $this->model->create((array) $data);

        return (object) $support->toArray();
    }

    public function update(UpdateSupportDTO $data): stdClass | null
    {
        $support = $this->model->find($data->id);

        if (!$support) return null;

        $support->update((array) $data);

        return (object) $support->toArray();
    }
    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }
}
