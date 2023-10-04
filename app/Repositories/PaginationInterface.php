<?php

namespace App\Repositories;

interface PaginationInterface
{
    /**
     * @return stdClass[]
     */
    public function items(): array;
    public function total(): int;
    public function currentPage(): int;
    public function isFirstPage(): int;
    public function isLastPage(): int;
    public function getNumberNextPage(): int;
    public function getNumberPreviousPage(): int;
}
