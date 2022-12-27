<?php

namespace App\Http\Controllers;

use Hash;
use Throwable;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Services\User\UserServices;
use App\Http\Controllers\BaseController;

class UserController extends BaseController
{
    /**
     * @var \App\Services\User\userServices
     */
    private $userServices;

    /**
     * UserController constructor.
     *
     * @param \App\Services\User\UserServices $userServices
     */
    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = $this->userServices->index();
            return $this->sendResponse($users, trans('response.user_index'));
        } catch (Throwable $ex) {
            return $this->sendError($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {

            $requestData = $request->all();
            $requestData['password'] = Hash::make($request->password);
            $users = $this->userServices->storeData($requestData);
            return $this->sendResponse($users, trans('response.user_store'));
        } catch (Throwable $ex) {
            return $this->sendError($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $users = $this->userServices->getUser($id);
            return $this->sendResponse($users, trans('response.user_index'));
        } catch (Throwable $ex) {
            return $this->sendError($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $users = $this->userServices->getUser($id);
            return $this->sendResponse($users, trans('response.user_index'));
        } catch (Throwable $ex) {
            return $this->sendError($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        try {

            $users = $this->userServices->updateData($request->except('_method'), $id);
            return $this->sendResponse($users, trans('response.user_update'));
        } catch (Throwable $ex) {
            return $this->sendError($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $this->userServices->deleteData($id);
            return $this->sendResponse('', trans('response.user_destroy'));
        } catch (Throwable $ex) {
            return $this->sendError($ex->getMessage(), $ex->getCode());
        }
    }
}
