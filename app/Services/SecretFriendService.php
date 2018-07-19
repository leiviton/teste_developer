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

    public function update(array $data,$id){
        return $this->repository->update($data, $id);
    }

    public function create(array $data){
        \DB::beginTransaction();

        try {
            $vehicle = $this->vehicleRepository->create($data['veiculo']);
            $data['vehicle_id'] = $vehicle->id;
            $result = $this->repository->create($data);
            \DB::commit();
            return $result;
        } catch (\Exception $e){
            \DB::rollback();
            throw $e;
        }
    }
}