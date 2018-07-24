<?php

namespace TestDeveloper\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use TestDeveloper\Models\SecretFriendParticipant;

class SecretFriendParticipantRepositoryEloquent extends BaseRepository implements SecretFriendParticipantRepository
{
    protected $skipPresenter = true;

    public function getRandom($id)
    {
        return $this->model->where('secret_friend_id',$id)->orderByRaw('RAND()')->get();
    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SecretFriendParticipant::class;
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
        return \TestDeveloper\Presenters\SecretFriendParticipantPresenter::class;
    }
}
