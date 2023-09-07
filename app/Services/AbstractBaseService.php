<?php

namespace App\Services;


abstract class AbstractBaseService
{
    protected $repository;

    public function __construct()
    {
        $this->makeRepositoryService();
    }

    abstract public function repository();

    public function makeRepositoryService()
    {
        $repository = app($this->repository());
        return $this->repository = $repository;
    }

    public function listService($input)
    {
        return $this->repository->listRepository($input);
    }

    public function insertService($input)
    {
        return $this->repository->insertRepository($input);
    }

    public function updateService($input)
    {
        return $this->repository->updateRepository($input);
    }

    public function destroyService($input)
    {
        return $this->repository->deleteRepository($input);
    }

    public function deleteService($input)
    {
        $this->repository->deleteRepository($input);
    }

    public function findService($input)
    {
        return $this->repository->findRepository($input);
    }

    public function showWithFailService($input)
    {
        return $this->repository->showWithFailRepository($input);
    }

    public function showService($input)
    {
        return $this->repository->showRepository($input);
    }

    public function updateOrCreateService($input)
    {
        $this->repository->updateOrCreateRepository($input);
    }
}
