<?php

namespace App\Services;

use App\Helpers\ApiRequester;
use App\Helpers\ArrayHelper;

use Illuminate\Http\Response;

class GithubUserService
{
    protected $validSorts = [
        'name', 
        'stars', 
        'created_at', 
        'updated_at'
    ];
    protected $validDirections = [
        'asc', 
        'desc'
    ];
    protected $apiRequester;
    protected $baseUrl = 'https://api.github.com/';

    public function __construct()
    {
        $this->apiRequester = new ApiRequester($this->baseUrl);   
    }

    public function userData($userName) 
    {
            $userData = $this->apiRequester->makeRequest("/users/$userName", 'GET');

            return $userData;
    }

    public function userDataDetails($userData)
    {
        $userDataDetails = [
            "followers" => $userData['followers'],
            "following" => $userData['following'],
            "avatar_url" => $userData['avatar_url'],
            "email" => $userData['email'],
            "bio" => $userData['bio']
        ];

        return json_encode($userDataDetails, JSON_UNESCAPED_SLASHES);
    }

    public function userReposData($userName, $sort = 'star', $direction = 'desc', $headers = null)
    {
        try {
            $userReposData = $this->apiRequester->makeRequest("users/$userName/repos", 'GET', $headers);

            $userReposData = json_decode($userReposData, true);

            if (
                !in_array($sort, $this->validSorts) 
                || $sort === 'star'
                ) {
                    $sort = 'stargazers_count';
                }

                if (!in_array($direction, $this->validDirections)) {
                    $direction = 'desc';
                }

                $sortedUserReposData = $this->sortUserRepos($userReposData, $sort, $direction);
                return json_encode($sortedUserReposData, JSON_UNESCAPED_SLASHES);
        } catch (\Exception $e) {
            return response()
                ->json([
                    'success' => false,
                    'message' => 'Ocorreu um erro na requisição: ' . $e->getMessage()
                ])
                ->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function userReposDataDetails($userName, $repository, $headers = null)
    {
        try {
            $userReposData = $this->apiRequester->makeRequest("repos/$userName/$repository", 'GET', $headers);

            $userReposDataDetails = [
                "name" => $userReposData['name'],
                "description" => $userReposData['description'],
                "stargazers_count" => $userReposData['stargazers_count'],
                "language" => $userReposData['language'],
                "repository_url" => $userReposData['html_url']
            ];

            return json_encode($userReposDataDetails, JSON_UNESCAPED_SLASHES);
        } catch (\Exception $e) {
            return json_encode([
                'success' => 'false',
                'message' => 'Ocorreu um erro na requisição: ' . $e->getMessage()
            ]); 
        }
    }

    private function sortUserRepos($data, $key, $direction) {
        usort($data, function($a, $b) use ($key, $direction) {
            $result = ($direction == 'asc') ? 1 : -1;

            if ($a[$key] == $b[$key]) {
                return 0;
            }

            if ($key === 'name') {
                return ArrayHelper::compareStrings($a, $b, $key) * $result;
            } elseif ($key === 'stargazers_count') {
                return ArrayHelper::compareIntegers($a, $b, $key) * $result;
            }
            return ArrayHelper::compareDates($a, $b, $key) * $result;
        });

        return $data;
    }

    public function getHeaders($headers) {
        if (isset($headers['Authorization'])) {
            $headers = [
                'Authorization' => $headers('Authorization')
            ];
            return $headers;
        }

        return null;
    }
}