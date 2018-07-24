<?php

namespace TestDeveloper\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use TestDeveloper\Models\SecretFriend;

class SecretFriendRepositoryEloquent extends BaseRepository implements SecretFriendRepository
{
    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SecretFriend::class;
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
        return \TestDeveloper\Presenters\SecretFriendPresenter::class;
    }
}
