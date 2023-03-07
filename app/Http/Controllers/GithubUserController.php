<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $userData = $this->userData($userName);

        return $this->githubUserService->userDataDetails($userData);
    }

    public function userReposData(Request $request, $userName)
    {
        $sort = $request->input('sort');
        $direction = $request->input('direction');

        $headers = $this->githubUserService->getHeaders($request->header());

        return $this->githubUserService->userReposData($userName, $sort, $direction, $headers);
    }

    public function userReposDataDetails(Request $request, $userName, $repository) 
    {
        $headers = $this->githubUserService->getHeaders($request->header());

        return $this->githubUserService->userReposDataDetails($userName, $repository, $headers);
    }
}
