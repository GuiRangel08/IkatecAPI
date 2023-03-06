<?php

namespace App\Http\Controllers;

use App\Services\GithubUserService;

class GithubUserController extends Controller
{

    protected $githubUserService;

    public function __construct(GithubUserService $githubUserService)
    {
        $this->githubUserService = $githubUserService;
    }

    public function userData($userName) 
    {
        return $this->githubUserService->userData($userName);
    }

    public function userDataDetails($userName) 
    {
        return $this->githubUserService->userDataDetails($userName);
    }
}
