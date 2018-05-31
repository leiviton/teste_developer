<?php

namespace TestDeveloper\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use TestDeveloper\Models\Seat;

class SeatRepositoryEloquent extends BaseRepository implements SeatRepository
{
    protected $skipPresenter = true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Seat::class;
    }
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return \TestDeveloper\Presenters\SeatPresenter::class;
    }
}
