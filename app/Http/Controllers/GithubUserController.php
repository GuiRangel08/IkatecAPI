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

    public function userData(Request $request, $userName) 
    {

        $headers = $this->githubUserService->getHeaders($request->header());

        return $this->githubUserService->userData($userName, $headers);
    }

    public function userDataDetails(Request $request, $userName) 
    {
        $headers = $this->githubUserService->getHeaders($request->header());

        $userData = $this->userData($request, $userName);
        
        $userReposData = $this->userReposData($request, $userName);

        $preparedUserReposData = $this->githubUserService->prepareJsonReposData($userReposData, $headers);

        $userDataDetails = $this->githubUserService->userDataDetails($userData, $headers);

        $mergedUserDataAndRepositories = $this->githubUserService->mergeUserDataAndRepositories($userDataDetails, $preparedUserReposData);

        return $mergedUserDataAndRepositories;
    }

    public function userReposData(Request $request, $userName)
    {
        $headers = $this->githubUserService->getHeaders($request->header());

        $sort = $request->input('sort');
        $direction = $request->input('direction');

        return $this->githubUserService->userReposData($userName, $sort, $direction, $headers);
    }

    public function userReposDataDetails(Request $request, $userName, $repository) 
    {
        $headers = $this->githubUserService->getHeaders($request->header());

        return $this->githubUserService->userReposDataDetails($userName, $repository, $headers);
    }
}
