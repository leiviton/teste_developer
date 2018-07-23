<?php

namespace TestDeveloper\Services;

use TestDeveloper\Repositories\ParticipantRepository;

class ParticipantService
{

    /**
     * @var ParticipantRepository
     */
    private $repository;

    public function __construct(ParticipantRepository $repository)
    {
        $this->repository = $repository;
    }

    public function get($id)
    {
        return $this->repository->skipPresenter(false)->allParticipant($id);
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