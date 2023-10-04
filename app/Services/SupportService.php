<?php

namespace App\Services;

use App\DTO\Supports\{
    CreateSupportDTO,
    UpdateSupportDTO
};
use App\Repositories\PaginationInterface;
use App\Repositories\SupportRepositoryInterface;
use stdClass;

class SupportService
{
    public function __construct(protected SupportRepositoryInterface $repository)
    {
    }

    public function paginate(int $page = 1, int $perPage = 15, string $filter = null): PaginationInterface
    {
        return $this->repository->paginate($page, $perPage, $filter);
    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string|int $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function new(CreateSupportDTO $data): stdClass
    {
        return $this->repository->new($data);
    }

    public function update(UpdateSupportDTO $data): stdClass|null
    {
        return $this->repository->update($data);
    }

    public function delete(string|int $id): void
    {
        $this->repository->delete($id);
    }
}
