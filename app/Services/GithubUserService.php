<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GithubUserService
{

    public function userData($userName) 
    {
        try {
            $userData = Http::get("https://api.github.com/users/$userName");
        
            if (!$userData->ok()) {
                throw new \Exception("Ocorreu um erro na requisição: " . $userData->status());
            }

            return $userData;
        } catch (\Exception $e) {
            return json_encode([
                    'success' => 'false',
                    'message' => 'Ocorreu um erro ao processar os dados: ' . $e->getMessage()
            ]);
        }     
    }

    public function userDataDetails($userName)
    {

        $userData = $this->userData($userName);

        $userDataDetails = [
            "avatar_url" => $userData['avatar_url'],
            "followers" => $userData['followers'],
            "following" => $userData['following'],
            "email" => $userData['email'],
            "bio" => $userData['bio']
        ];

        return json_encode($userDataDetails, JSON_UNESCAPED_SLASHES);
    }

}