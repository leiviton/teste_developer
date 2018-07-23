<?php

namespace TestDeveloper\Http\Controllers\Api\V1\Admin;

use TestDeveloper\Http\Controllers\Controller;
use TestDeveloper\Http\Requests\AdminRequest;
use TestDeveloper\Http\Requests\Request;
use TestDeveloper\Repositories\ParticipantRepository;
use TestDeveloper\Services\ParticipantService;

class ParticipantsController extends Controller
{

    /**
     * @var ParticipantRepository
     */
    private $repository;
    /**
     * @var ParticipantService
     */
    private $service;

    public function  __construct(ParticipantRepository $repository, ParticipantService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        $user = \Auth::guard('api')->user();

        return $this->repository->skipPresenter(false)->scopeQuery(function($query) use($user){
            return $query->where('user_id',$user->id);
        })->paginate();
    }

    public function edit($id)
    {
        $result = $this->repository->skipPresenter(false)->find($id);
        return $result;
    }

    public function store(AdminRequest $request)
    {
        $user = \Auth::guard('api')->user();

        $data = $request->all();

        $data['user_id'] = $user->id;

        $o = $this->service->create($data);
        
        return $this->repository
            ->skipPresenter(false)
            ->find($o->id);
    }

    public function update($id, Request $request)
    {
        $user = \Auth::guard('api')->user();

        $data = $request->all();

        $data['user_id'] = $user->id;

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