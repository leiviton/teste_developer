<?php

namespace TestDeveloper\Services;

use TestDeveloper\Repositories\SecretFriendRepository;

class SecretFriendService
{

    /**
     * @var SecretFriendRepository
     */
    private $repository;

    public function __construct(SecretFriendRepository $repository)
    {
        $this->repository = $repository;
    }

    public function get()
    {
        return $this->repository->skipPresenter(false)->paginate();
    }

    public function update(array $data,$id)
    {
        \DB::beginTransaction();

        try{

            $result = $this->repository->update($data, $id);
            \DB::commit();
            return $result;
        } catch (\Exception $e){
            throw $e;
        }
    }

    public function create(array $data){
        \DB::beginTransaction();

        try {
            $participants = $data['participants'];

            $result = $this->repository->create($data);

            foreach ($participants as $item){
                $result->participants()->create($item);
            }
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