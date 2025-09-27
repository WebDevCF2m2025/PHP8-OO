<?php

interface CrudInterface
{
    public function create(AbstractMapping $data);
    public function readById(int $id): bool|AbstractMapping;
    public function readAll(bool $orderDesc=true): array;
    public function update(int $id, AbstractMapping $data);
    public function delete(int $id);
}