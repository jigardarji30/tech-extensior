<?php

namespace App\Repositories\User;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

interface UserInterface
{

    /**
     * @param
     *
     * @return mixed
     */
    public function index();

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function storeData($data);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getUser($id);

    /**
     * @param array $data
     * @param $id
     *
     * @return mixed
     */
    public function updateData($data, $id);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function deleteData($id);
}
