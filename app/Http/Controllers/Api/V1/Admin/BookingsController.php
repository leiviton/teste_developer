<?php

namespace TestDeveloper\Http\Controllers\Api\V1\Admin;

use TestDeveloper\Http\Controllers\Controller;
use TestDeveloper\Http\Requests\Request;
use TestDeveloper\Repositories\BookingRepository;
use TestDeveloper\Services\BookingService;

class BookingsController extends Controller
{

    /**
     * @var BookingRepository
     */
    private $repository;
    /**
     * @var BookingService
     */
    private $service;

    public function  __construct(BookingRepository $repository, BookingService $service)
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