<?php

namespace App\Services\User;


use App\Repositories\User\UserInterface;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserServices
{
    /**
     * @var \App\Services\User\userRepo
     */
    private $userRepo;

    /**
     * UserServices constructor.
     *
     * @param \App\Repositories\User\UserInterface $userRepo
     */
    public function __construct(UserInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * @param
     *
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function index()
    {
        return $this->userRepo->index();
    }

    /**
     * @param array $data
     *
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeData($data)
    {
        return $this->userRepo->storeData($data);
    }

    /**
     * @param $id
     *
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getUser($id)
    {
        return $this->userRepo->getUser($id);
    }

    /**
     * @param array $data
     * @param $id
     *
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateData($data, $id)
    {
        return $this->userRepo->updateData($data, $id);
    }

    /**
     * @param $id
     *
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteData($id)
    {
        return $this->userRepo->deleteData($id);
    }
}
