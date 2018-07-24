<?php

namespace TestDeveloper\Services;


use TestDeveloper\Repositories\UserRepository;

class UserService
{
    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create($data)
    {
        \DB::beginTransaction();

        try {

            $data['password'] = bcrypt($data['password']);

            $data['remember_token'] = md5(123456);

            $data['role'] = 'admin';

            $user = $this->repository->create($data);

            \DB::commit();

            return $user;
        } catch (\Exception $e){
            \DB::rollback();
            throw $e;
        }
    }

    public function update($data,$id)
    {
        \DB::beginTransaction();

        try {

            $user = $this->repository->find($id);

            if($data['password'] && $data['password'] != null && $data['password'] != '')
            {
                $data['password'] = bcrypt($data['password']);
            }else{
                $data['password'] = $user->password;
            }

            $user = $this->repository->update($data,$id);

            \DB::commit();

            return $user;

        } catch (\Exception $e){
            \DB::rollback();
            throw $e;
        }
    }
}