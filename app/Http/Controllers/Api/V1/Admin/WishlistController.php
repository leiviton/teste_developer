<?php

namespace TestDeveloper\Http\Controllers\Api\V1\Admin;

use TestDeveloper\Http\Controllers\Controller;
use TestDeveloper\Http\Requests\Request;
use TestDeveloper\Repositories\WishlistRepository;
use TestDeveloper\Services\WishlistService;

class WishlistController extends Controller
{

    /**
     * @var WishlistRepository
     */
    private $repository;
    /**
     * @var WishlistService
     */
    private $service;

    public function  __construct(WishlistRepository $repository, WishlistService $service)
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

    public function store(Request $request)
    {
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

    public function delete($id)
    {
        $result = $this->service->delete($id);

        return $result;
    }
}