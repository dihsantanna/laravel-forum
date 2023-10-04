<?php

namespace App\Repositories;

use App\DTO\Supports\{
    CreateSupportDTO,
    UpdateSupportDTO
};
use stdClass;

interface SupportRepositoryInterface
{
    public function paginate(int $page = 1, int $perPage = 15, string $filter = null): PaginationInterface;
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass | null;
    public function new(CreateSupportDTO $data): stdClass;
    public function update(UpdateSupportDTO $data): stdClass | null;
    public function delete(string $id): void;
}
