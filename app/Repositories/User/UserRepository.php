<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\User\UserInterface;

class UserRepository implements UserInterface
{

    /**
     * @var \App\Models\User
     */
    public $user;

    /**
     * UserRepository constructor.
     *
     * @param \App\Models\User $smallUser
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param
     *
     * @return mixed
     */
    public function index()
    {
        return $this->user->get();
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function storeData($data)
    {
        return $this->user->create($data);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getUser($id)
    {
        return $this->user->where('id', $id)->first();
    }

    /**
     * @param array $data
     * @param $id
     *
     * @return mixed
     */
    public function updateData($data, $id)
    {
        return $this->user->where('id', $id)->update($data);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function deleteData($id)
    {
        return $this->user->where('id', $id)->delete();
    }
}
