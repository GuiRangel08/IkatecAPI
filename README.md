

# Minha API

## Obter detalhes do usuário

Obtenha informações detalhadas sobre um usuário específico.

**URL**: `/users/:id`

**Método**: `GET`

**Parâmetros de URL**:
- `id` [inteiro]: ID do usuário a ser recuperado.

**Resposta de sucesso**:
- **Código**: `200`
- **Conteúdo**:
<div style="overflow: auto; height: 200px;">

```json
{
    "data": [
        {
            "id": 1,
            "name": "João"
        },
        {
            "id": 2,
            "name": "Maria"
        },
        {
            "id": 2,
            "name": "Maria"
        },
        {
            "id": 2,
            "name": "Maria"
        },
        {
            "id": 2,
            "name": "Maria"
        },
        {
            "id": 2,
            "name": "Maria"
        },
        {
            "id": 2,
            "name": "Maria"
        },
        {
            "id": 2,
            "name": "Maria"
        },
        {
            "id": 2,
            "name": "Maria"
        },
        {
            "id": 2,
            "name": "Maria"
        },
        {
            "id": 2,
            "name": "Maria"
        }
    ]
}
```
</div>