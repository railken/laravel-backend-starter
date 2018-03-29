<?php

namespace Api\Http\Controllers\User;

use Api\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Core\User\UserManager;

class UserController extends Controller
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
     * Display current user
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->initialize($request);
        return $this->success(['data' => [
            'resource' => $this->manager->serializer->serialize(
                $this->getUser(),
                collect([
                    'id',
                    'avatar',
                    'username',
                    'email',
                    'password',
                    'created_at'
                ])
            )->all()
        ]]);
    }
}
