
# Sobre o projeto

Projeto de API desenvolvido com o Laravel 9.

Essa API comunica com a API do github e traz as informações detalhadas e ordenadas

Caso queira, há um arquivo chamado `insomnia.json` na raiz do projeto e você poderá importar as requisições no insomnia.

OBS: Apesar do Token de autenticação ser opcional no Headers, recomendamos a utilização que o mesmo seja enviado, pois o github limita o número de requisições caso não esteja autenticado.
## Gerar o Token de autenticação

```
1. Faça login em sua conta do GitHub.
2. Clique na sua imagem de perfil no canto superior direito da tela e selecione "Settings" (Configurações).
3. Na barra lateral esquerda, selecione "Developer settings" (Configurações de desenvolvedor).
4. Selecione "Personal access tokens" (Tokens de acesso pessoal).
5. Clique em "Generate new token" (Gerar novo token).
6. Dê um nome descritivo ao seu token e selecione as permissões necessárias. As permissões que você selecionar determinarão o que você pode fazer com o token.
7. Clique em "Generate token" (Gerar token).
8. Copie o token gerado e armazene-o em um local seguro. Não compartilhe este token com ninguém.
```

## Executando o projeto 

Existem duas maneiras executar o projeto. 

### 1. Sem o Docker

>__Requisitos__
>- php ^8.1
>- composer

execute o comando:

```bash
composer install && composer dump-autoload
```

Para executar o projeto digite:
```bash
php artisan serve
```

Após execução, a api estará disponível através do host
```bash
localhost:8000
```
### 2. Com o Docker

>__Requisitos__
> - Docker v23

Para executar o projeto execute o comando:
```bash
docker compose up -d
```

Após execução, a api estará disponível através do host
```bash
localhost:81
```

# Documentação da API
## Buscar usuário

### GET

### /api/users/`:userName`
### __Header__

| Campo             | Tipo | Descrição |
| :---------------- | :--- | :------- |
| Authorization _(Opcional)_ | str  | token + `github_token` |

### __HTTP response Status__

| Status code | Description | 
| :-- | :-- | 
| 200 | OK  |
```bash
curl --request GET \
  --url 'http://localhost:81/api/users/guirangel08'
```

### __Resposta Sucesso__ 
> **200** OK

```response:200
{
	"login": "GuiRangel08",
	"id": 28784054,
	"node_id": "MDQ6VXNlcjI4Nzg0MDU0",
	"avatar_url": "https://avatars.githubusercontent.com/u/28784054?v=4",
	"gravatar_id": "",
	"url": "https://api.github.com/users/GuiRangel08",
	"html_url": "https://github.com/GuiRangel08",
	"followers_url": "https://api.github.com/users/GuiRangel08/followers",
	"following_url": "https://api.github.com/users/GuiRangel08/following{/other_user}",
	"gists_url": "https://api.github.com/users/GuiRangel08/gists{/gist_id}",
	"starred_url": "https://api.github.com/users/GuiRangel08/starred{/owner}{/repo}",
	"subscriptions_url": "https://api.github.com/users/GuiRangel08/subscriptions",
	"organizations_url": "https://api.github.com/users/GuiRangel08/orgs",
	"repos_url": "https://api.github.com/users/GuiRangel08/repos",
	"events_url": "https://api.github.com/users/GuiRangel08/events{/privacy}",
	"received_events_url": "https://api.github.com/users/GuiRangel08/received_events",
	"type": "User",
	"site_admin": false,
	"name": "Guilherme Rangel",
	"company": null,
	"blog": "",
	"location": null,
	"email": "groliveiranet@Hotmail.com",
	"hireable": null,
	"bio": null,
	"twitter_username": null,
	"public_repos": 6,
	"public_gists": 0,
	"followers": 4,
	"following": 4,
	"created_at": "2017-05-18T13:47:40Z",
	"updated_at": "2023-03-06T19:08:21Z",
	"private_gists": 0,
	"total_private_repos": 2,
	"owned_private_repos": 2,
	"disk_usage": 8257,
	"collaborators": 0,
	"two_factor_authentication": false,
	"plan": {
		"name": "free",
		"space": 976562499,
		"collaborators": 0,
		"private_repos": 10000
	}
}
```
# Buscar detalhes do usuário

## GET

## /api/users/`:userName`/details
### __Header__

| Campo             | Tipo | Descrição |
| :---------------- | :--- | :------- |
| Authorization _(Opcional)_ | str  | token + `github_token` |
### __Parâmetros__

| Campo             | Tipo | Disponíveis |
| :---------------- | :--- | :------- |
| sort _(Opcional)_ | str  | Define o campo pelo qual os repositórios serão ordenados. Valor padrão: `star`. Os valores disponíveis são: `star`, `name`, `created_at` e `updated_at`. |
| direction _(Opcional)_   | str  | Define a direção da ordenação. Valor padrão: `desc`. Os valores disponíveis são: `asc` e `desc`|

### __HTTP response Status__

| Status code | Description | 
| :-- | :-- | 
| 200 | OK  |
```bash
curl --request GET \
  --url 'http://localhost:81/api/users/GuiRangel08/details?sort=star&direction=asc'
```

### __Resposta Sucesso__ 
> **200** OK

```response:200
{
	"followers": 4,
	"following": 4,
	"avatar_url": "https://avatars.githubusercontent.com/u/28784054?v=4",
	"email": "groliveiranet@Hotmail.com",
	"bio": null,
	"repositories": [
		{
			"name": "contato_seguro_api",
			"description": null,
			"stargazers_count": 0,
			"language": "PHP",
			"repository_url": "https://github.com/GuiRangel08/contato_seguro_api"
		},
		{
			"name": "desafio_ikatec",
			"description": null,
			"stargazers_count": 0,
			"language": "PHP",
			"repository_url": "https://github.com/GuiRangel08/desafio_ikatec"
		},
		{
			"name": "Django3",
			"description": "Aula de django3",
			"stargazers_count": 0,
			"language": "JavaScript",
			"repository_url": "https://github.com/GuiRangel08/Django3"
		},
		{
			"name": "marvel-dialogue-nlp",
			"description": "A machine learning project that will use Natural Language Processing (NLP) to classify who says a line of dialogue",
			"stargazers_count": 0,
			"language": null,
			"repository_url": "https://github.com/GuiRangel08/marvel-dialogue-nlp"
		},
		{
			"name": "register_optin",
			"description": "Register Optin",
			"stargazers_count": 0,
			"language": "Python",
			"repository_url": "https://github.com/GuiRangel08/register_optin"
		},
		{
			"name": "marvel-project",
			"description": null,
			"stargazers_count": 1,
			"language": "JavaScript",
			"repository_url": "https://github.com/GuiRangel08/marvel-project"
		}
	]
}
```
# Buscar repositório (todos os dados)

## GET

## /api/users/`:userName`/repos
### __Header__

| Campo             | Tipo | Descrição |
| :---------------- | :--- | :------- |
| Authorization _(Opcional)_ | str  | token + `github_token` |
### __Parâmetros__

| Campo             | Tipo | Disponíveis |
| :---------------- | :--- | :------- |
| sort _(Opcional)_ | str  | Define o campo pelo qual os repositórios serão ordenados. Valor padrão: `star`. Os valores disponíveis são: `star`, `name`, `created_at` e `updated_at`. |
| direction _(Opcional)_   | str  | Define a direção da ordenação. Valor padrão: `desc`. Os valores disponíveis são: `asc` e `desc`|

### __HTTP response Status__

| Status code | Description | 
| :-- | :-- | 
| 200 | OK  |

```bash
curl --request GET \
  --url 'http://localhost:81/api/users/guirangel08/repos?sort=name&direction=asc'
```

### __Resposta Sucesso__ 
> **200** OK

```response:200
[
	{
		"id": 607873482,
		"node_id": "R_kgDOJDtpyg",
		"name": "contato_seguro_api",
		"full_name": "GuiRangel08/contato_seguro_api",
		"private": false,
		"owner": {
			"login": "GuiRangel08",
			"id": 28784054,
			"node_id": "MDQ6VXNlcjI4Nzg0MDU0",
			"avatar_url": "https://avatars.githubusercontent.com/u/28784054?v=4",
			"gravatar_id": "",
			"url": "https://api.github.com/users/GuiRangel08",
			"html_url": "https://github.com/GuiRangel08",
			"followers_url": "https://api.github.com/users/GuiRangel08/followers",
			"following_url": "https://api.github.com/users/GuiRangel08/following{/other_user}",
			"gists_url": "https://api.github.com/users/GuiRangel08/gists{/gist_id}",
			"starred_url": "https://api.github.com/users/GuiRangel08/starred{/owner}{/repo}",
			"subscriptions_url": "https://api.github.com/users/GuiRangel08/subscriptions",
			"organizations_url": "https://api.github.com/users/GuiRangel08/orgs",
			"repos_url": "https://api.github.com/users/GuiRangel08/repos",
			"events_url": "https://api.github.com/users/GuiRangel08/events{/privacy}",
			"received_events_url": "https://api.github.com/users/GuiRangel08/received_events",
			"type": "User",
			"site_admin": false
		},
		"html_url": "https://github.com/GuiRangel08/contato_seguro_api",
		"description": null,
		"fork": false,
		"url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api",
		"forks_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/forks",
		"keys_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/keys{/key_id}",
		"collaborators_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/collaborators{/collaborator}",
		"teams_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/teams",
		"hooks_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/hooks",
		"issue_events_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/issues/events{/number}",
		"events_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/events",
		"assignees_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/assignees{/user}",
		"branches_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/branches{/branch}",
		"tags_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/tags",
		"blobs_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/git/blobs{/sha}",
		"git_tags_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/git/tags{/sha}",
		"git_refs_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/git/refs{/sha}",
		"trees_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/git/trees{/sha}",
		"statuses_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/statuses/{sha}",
		"languages_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/languages",
		"stargazers_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/stargazers",
		"contributors_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/contributors",
		"subscribers_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/subscribers",
		"subscription_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/subscription",
		"commits_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/commits{/sha}",
		"git_commits_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/git/commits{/sha}",
		"comments_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/comments{/number}",
		"issue_comment_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/issues/comments{/number}",
		"contents_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/contents/{+path}",
		"compare_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/compare/{base}...{head}",
		"merges_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/merges",
		"archive_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/{archive_format}{/ref}",
		"downloads_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/downloads",
		"issues_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/issues{/number}",
		"pulls_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/pulls{/number}",
		"milestones_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/milestones{/number}",
		"notifications_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/notifications{?since,all,participating}",
		"labels_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/labels{/name}",
		"releases_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/releases{/id}",
		"deployments_url": "https://api.github.com/repos/GuiRangel08/contato_seguro_api/deployments",
		"created_at": "2023-02-28T21:09:16Z",
		"updated_at": "2023-02-28T21:13:16Z",
		"pushed_at": "2023-03-06T05:05:50Z",
		"git_url": "git://github.com/GuiRangel08/contato_seguro_api.git",
		"ssh_url": "git@github.com:GuiRangel08/contato_seguro_api.git",
		"clone_url": "https://github.com/GuiRangel08/contato_seguro_api.git",
		"svn_url": "https://github.com/GuiRangel08/contato_seguro_api",
		"homepage": null,
		"size": 5768,
		"stargazers_count": 0,
		"watchers_count": 0,
		"language": "PHP",
		"has_issues": true,
		"has_projects": true,
		"has_downloads": true,
		"has_wiki": true,
		"has_pages": false,
		"has_discussions": false,
		"forks_count": 0,
		"mirror_url": null,
		"archived": false,
		"disabled": false,
		"open_issues_count": 0,
		"license": null,
		"allow_forking": true,
		"is_template": false,
		"web_commit_signoff_required": false,
		"topics": [],
		"visibility": "public",
		"forks": 0,
		"open_issues": 0,
		"watchers": 0,
		"default_branch": "master",
		"permissions": {
			"admin": true,
			"maintain": true,
			"push": true,
			"triage": true,
			"pull": true
		}
	}
]
```
# Buscar detalhes do repositório

## GET

## /api/users/`:userName`/repos/`:repository`/details
### __Header__

| Campo             | Tipo | Descrição |
| :---------------- | :--- | :------- |
| Authorization _(Opcional)_ | str  | token + `github_token` |
### __Parâmetros__

| Campo             | Tipo | Disponíveis |
| :---------------- | :--- | :------- |
| sort _(Opcional)_ | str  | Define o campo pelo qual os repositórios serão ordenados. Valor padrão: `star`. Os valores disponíveis são: `star`, `name`, `created_at` e `updated_at`. |
| direction _(Opcional)_   | str  | Define a direção da ordenação. Valor padrão: `desc`. Os valores disponíveis são: `asc` e `desc`|

### __HTTP response Status__

| Status code | Description | 
| :-- | :-- | 
| 200 | OK  |

```bash
curl --request GET \
  --url 'http://localhost:81/api/users/GuiRangel08/repos/contato_seguro_api/details'
```

### __Resposta Sucesso__ 
> **200** OK

```response:200
{
    "name": "contato_seguro_api",
    "description": null,
    "stargazers_count": 0,
    "language": "PHP",
    "repository_url": "https://github.com/GuiRangel08/contato_seguro_api"
}
```