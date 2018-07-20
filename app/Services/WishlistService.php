<?php

namespace TestDeveloper\Services;

use TestDeveloper\Repositories\WishlistRepository;

class WishlistService
{

    /**
     * @var WishlistRepository
     */
    private $repository;

    public function __construct(WishlistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function get()
    {
        return $this->repository->skipPresenter(false)->paginate();
    }

    public function update(array $data,$id){
        return $this->repository->update($data, $id);
    }

    public function create(array $data){
        \DB::beginTransaction();

        try {
            $result = $this->repository->create($data);
            \DB::commit();
            return $result;
        } catch (\Exception $e){
            \DB::rollback();
            throw $e;
        }
    }

    public function delete($id)
    {
        \DB::beginTransaction();
        try {
            $result = $this->repository->delete($id);
            \DB::commit();
            return $result;
        } catch (\Exception $e){
            \DB::rollback();
            throw $e;
        }
    }
}