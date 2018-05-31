<?php

namespace TestDeveloper\Http\Controllers\Api\V1\Admin;


use TestDeveloper\Http\Controllers\Controller;
use TestDeveloper\Repositories\SessionRepository;

class SessionsController extends Controller
{

    /**
     * @var SessionRepository
     */
    private $repository;

    public function __construct(SessionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository
            ->skipPresenter(false)
            ->all();
    }

    public function edit($id)
    {
        return $this->repository
            ->skipPresenter(false)
            ->find($id);
    }
}