<?php

namespace TestDeveloper\Http\Controllers\Api\V1\Admin;

use TestDeveloper\Http\Controllers\Controller;
use TestDeveloper\Http\Requests\AdminRequest;
use TestDeveloper\Http\Requests\SecretFriendRequest;
use TestDeveloper\Mail\SendSecretFriend;
use TestDeveloper\Models\Participant;
use TestDeveloper\Repositories\ParticipantRepository;
use TestDeveloper\Repositories\SecretFriendParticipantRepository;
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
    /**
     * @var ParticipantRepository
     */
    private $participantRepository;
    /**
     * @var SecretFriendParticipantRepository
     */
    private $secretFriendParticipantRepository;

    public function  __construct(SecretFriendRepository $repository, SecretFriendService $service,
                                 ParticipantRepository $participantRepository,
                                 SecretFriendParticipantRepository $secretFriendParticipantRepository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->participantRepository = $participantRepository;
        $this->secretFriendParticipantRepository = $secretFriendParticipantRepository;
    }

    public function index()
    {
        $user = \Auth::guard('api')->user();

        return $this->repository->skipPresenter(false)->scopeQuery(function($query) use($user){
            return $query->where('user_id',$user->id);
        })->paginate();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $result = $this->repository->skipPresenter(false)->find($id);
        return $result;
    }

    /**
     * @param AdminRequest $request
     * @return mixed
     */
    public function store(AdminRequest $request)
    {
        $user = \Auth::guard('api')->user();
        $data = $request->all();
        $data['user_id'] = $user->id;
        $o = $this->service->create($data);
        
        return $this->repository->skipPresenter(false)->find($o->id);
    }

    /**
     * @param $id
     * @param SecretFriendRequest $request
     * @return mixed
     */
    public function update($id, SecretFriendRequest $request)
    {
        $data = $request->all();

        $result = $this->service->update($data,$id);

        return $this->repository
            ->skipPresenter(false)
            ->find($result->id);
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        $result = $this->service->delete($id);

        return $result;
    }

    /**
     * @param $id
     */
    public function lottery($id)
    {
        $participants = $this->repository->find($id)->participants;

        $rand = $this->secretFriendParticipantRepository->getRandom($id);

        foreach ($participants as $participant){
            foreach ($rand as $ra){
               \Mail::to($participant->participant->email)->send(new SendSecretFriend($participant->participant, $ra->participant));
            }
        }

        return $rand;

    }
}