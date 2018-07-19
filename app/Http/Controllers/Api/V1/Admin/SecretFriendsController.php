<?php

namespace TestDeveloper\Http\Controllers\Api\V1\Admin;

use TestDeveloper\Http\Controllers\Controller;
use TestDeveloper\Http\Requests\Request;
use TestDeveloper\Repositories\SecretFriendRepository;
use TestDeveloper\Services\SecretFriendService;

class SecretFriendsController extends Controller
{

    /**
     * @var SecretFriendRepository
     */
    private $repository;
    /**
     * @var SecretFriendService
     */
    private $service;

    public function  __construct(SecretFriendRepository $repository, SecretFriendService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->get();
    }

    public function edit($id)
    {
        $result = $this->repository->skipPresenter(false)->find($id);
        return $result;
    }

    public function store(AdminDriverRequest $request)
    {
        $request->validate([
            'seat' => 'required'
        ]);

        $data = $request->all();


        $o = $this->service->create($data);
        
        return $this->repository
            ->skipPresenter(false)
            ->find($o->id);
    }

    public function update($id, Request $request)
    {
        $data = $request->all();

        $result = $this->service->update($data,$id);

        return $this->repository
            ->skipPresenter(false)
            ->find($result->id);
    }
}