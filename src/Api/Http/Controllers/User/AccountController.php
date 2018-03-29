<?php

namespace Api\Http\Controllers\User;

use Api\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Core\User\UserManager;

class AccountController extends Controller
{

    /**
     * @var \Core\User\UserManager
     */
    protected $manager;
    
    /**
     * Construct
     */
    public function __construct(UserManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Change user password
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function password(Request $request)
    {
        $result = $this->manager->changePassword($this->getUser(), $request->input('password_old'), $request->input('password'));

        if (!$result->ok()) {
            return $this->error(['errors' => $result->getSimpleErrors()]);
        }

        return $this->success();
    }


    /**
     * Change user email
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function email(Request $request)
    {
        $us = new \App\User\UserService();

        $result = $us->requestChangeEmail($this->getUser(), $request->input('email'));

        if (!$result->ok()) {
            return $this->error(['errors' => $result->getSimpleErrors()]);
        }

        return $this->success();
    }

    /**
     * Delete account
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $result = $this->manager->delete($this->getUser(), $request->input('password', ''));

        if (!$result->ok()) {
            return $this->error(['errors' => $result->getSimpleErrors()]);
        }

        return $this->success();
    }

    /**
     * Change user username
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function username(Request $request)
    {
        $result = $this->manager->update($this->getUser(), new \Railken\Bag(['name' => $request->input('name')]));

        if (!$result->ok()) {
            return $this->error(['errors' => $result->getSimpleErrors()]);
        }

        return $this->success();
    }
}