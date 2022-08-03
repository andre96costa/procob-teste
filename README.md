# Teste pratico Procob
+ Laravel 8
+ PHP 7.4
+ Mysql 8
## Instruções
1 - Clonar o projeto

2 - Executar o compando
```php
    composer installl
```
Para instalar as dependencias do laravel.

3 - Renomear o arquivo .env.example para .env, mudar as configurações de acesso ao banco de dados.

4 - Executar o compando 
```php
    php artisan migrate
```
para gerar todas as tabelas do banco de dados.

5 - Execute o compando 
```php
    php artisan db:seed
``` 
para popular o banco com alguns dados default, ira criar alguns produtos, clientes e um pedido.


# Rest API

## Contatos

### Listar usuários [GET]
`GET /api/usuarios`

+ Request (application/json)

+ Response 200 (application/json)

  - Body

        [
            {
                "id": 1,
                "nome": "Andre",
                "email": "andre@andre.com",
                "status": 1,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 2,
                "nome": "Carlos",
                "email": "carlos@carlos.com",
                "status": 1,
                "created_at": null,
                "updated_at": null
            }
        ]

### Buscar usuário [GET]
`GET /api/usuarios/{id}`

+ Request (application/json)

    + Parameters
         + id (required, number, `1`) - Id do usuário

+ Response 200 (application/json)

  - Body

        
        {
            "id": 1,
            "nome": "Andre",
            "email": "andre@andre.com",
            "status": 1,
            "created_at": null,
            "updated_at": null
        }
        

### Adicionar Usuario [POST]
`POST /api/usuarios`


#### Dados para envio no POST
| Parâmetro | Descrição |
|---|---|
| `nome` | nome do usuário  (string, required) - limite 150 caracteres|
| `email` | email do usuário  (email, required, unique) - limite 150 caracteres. |
| `status` | Identifica se o usuário está ativo no sistema  (boolean) - 1 ativo - 0 inativo |

+ Request (application/json)
    - Body

            [
                {
                    "nome": "Antonio",
                    "email": "ped1o@pedro.com",
                    "status": 0
                }
            ]

+ Response 201 (application/json)

  - Body

        [
            {
               "nome": "Antonio",
                "email": "ped1o@pedro.com",
                "status": 0,
                "updated_at": "2022-08-02T22:18:35.000000Z",
                "created_at": "2022-08-02T22:18:35.000000Z",
                "id": 3
            }
        ]

+ Response 422 (application/json)

  - Body

        
        {
            "message": "The given data was invalid.",
            "errors": {
                "nome": [
                    "O campo nome e obrigatorio"
                ],
                "email": [
                    "O email informado ja esta sendo utilizado"
                ]
            }
        }

### Atualizar Usuario [PUT]
`PUT /api/usuarios/{id}`

+ Request (application/json)

    + Parameters
         + id (required, number, `1`) - Id do usuário

#### Dados para atualização no PUT
| Parâmetro | Descrição |
|---|---|
| `nome` | nome do usuário  (string, required) - limite 150 caracteres|
| `email` | email do usuário  (email, required, unique) - limite 150 caracteres. |
| `status` | Identifica se o usuário está ativo no sistema  (boolean) - 1 ativo - 0 inativo |

+ Request (application/json)
    - Body

            [
                {
                    "nome": "Antonio",
                    "email": "ped1o@pedro.com",
                    "status": 0
                }
            ]

+ Response 200 (application/json)

  - Body

        
        {
            "id": 3,
            "nome": "Antonio",
            "email": "ano@antonio.com",
            "status": 1,
            "created_at": "2022-08-02T22:18:35.000000Z",
            "updated_at": "2022-08-02T22:26:54.000000Z"
        }
        

+ Response 422 (application/json)

  - Body

        
        {
            "message": "The given data was invalid.",
            "errors": {
                "nome": [
                    "O campo nome e obrigatorio"
                ],
                "email": [
                    "O email informado ja esta sendo utilizado"
                ]
            }
        }

### Inativar Usuario [DELETE]
`DELETE /api/usuarios/{id}`

+ Request (application/json)

    + Parameters
         + id (required, number, `1`) - Id do usuário

+ Response 200 (application/json)

  - Body

        []

+ Response 404 (application/json)

  - Body

        []

## Produtos

### Listar produtos [GET]
`GET /api/produtos`

+ Request (application/json)

+ Response 200 (application/json)

  - Body

        [
            {
                "id": 1,
                "descricao": "Iphone X",
                "valor": "3000.00",
                "status": 1,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 2,
                "descricao": "Apple watch",
                "valor": "2500.00",
                "status": 1,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 3,
                "descricao": "Air pods",
                "valor": "1700.00",
                "status": 1,
                "created_at": null,
                "updated_at": null
            }
        ]


### Buscar produtos [GET]
`GET /api/produtos/{id}`

+ Request (application/json)

    + Parameters
         + id (required, number, `1`) - Id do produto

+ Response 200 (application/json)

  - Body

        
        {
            "id": 1,
            "descricao": "Iphone X",
            "valor": "3000.00",
            "status": 1,
            "created_at": null,
            "updated_at": null
        }

+ Response 404 (application/json)

  - Body

        
        []

### Adicionar Protudo [POST]
`POST /api/produtos`


#### Dados para envio no POST
| Parâmetro | Descrição |
|---|---|
| `descricao` | descricao do produto  (required) - limite 250 caracteres|
| `valor` | valor do produto  (required, numeric) |
| `status` | Identifica se o produto está ativo no sistema  (boolean) - 1 ativo - 0 inativo |

+ Request (application/json)
    - Body

            
            {
                "descricao": "Apple TV",
                "valor": "8000.00",
                "status": 1
            }
        

+ Response 201 (application/json)

  - Body

        
            {
                "descricao": "Apple TV",
                "valor": "8000.00",
                "status": 1,
                "updated_at": "2022-08-02T22:44:05.000000Z",
                "created_at": "2022-08-02T22:44:05.000000Z",
                "id": 4
            }
        

+ Response 422 (application/json)

  - Body

        
        {
            "message": "The given data was invalid.",
            "errors": {
                "valor": [
                    "O campo valor e obrigatorio"
                ]
            }
        }

### Atualizar Produto [PUT]
`PUT /api/produtos/{id}`

+ Request (application/json)

    + Parameters
         + id (required, number, `1`) - Id do produto

#### Dados para atualização no PUT
| Parâmetro | Descrição |
|---|---|
| `descricao` | descricao do produto  (required) - limite 250 caracteres|
| `valor` | valor do produto  (required, numeric) |
| `status` | Identifica se o produto está ativo no sistema  (boolean) - 1 ativo - 0 inativo |

+ Request (application/json)
    - Body

            {
                "descricao": "Apple TV",
                "valor": "8000.00",
                "status": 1
            }

+ Response 200 (application/json)

  - Body

        
        {
            "id": 4,
            "descricao": "Apple TV",
            "valor": "300.00",
            "status": 1,
            "created_at": "2022-08-02T22:44:05.000000Z",
            "updated_at": "2022-08-02T22:47:28.000000Z"
        }
        

+ Response 422 (application/json)

  - Body

        
        {
            "message": "The given data was invalid.",
            "errors": {
                "nome": [
                    "O campo nome e obrigatorio"
                ],
                "email": [
                    "O email informado ja esta sendo utilizado"
                ]
            }
        }

### Inativar Usuario [DELETE]
`DELETE /api/produtos/{id}`

+ Request (application/json)

    + Parameters
         + id (required, number, `1`) - Id do produto

+ Response 200 (application/json)

  - Body

        []

+ Response 404 (application/json)

  - Body

        []

## Pedidos

### Listar pedidos [GET]
`GET /api/pedidos`

+ Request (application/json)

+ Response 200 (application/json)

  - Body

        [
           {
                "id": 1,
                "numero_do_pedido": 43,
                "status_pedido": 1,
                "usuario_id": 1,
                "created_at": null,
                "updated_at": null,
                "usuario": {
                    "id": 1,
                    "nome": "Andre",
                    "email": "andre@andre.com",
                    "status": 1,
                    "created_at": null,
                    "updated_at": null
                },
                "produtos": [
                    {
                        "id": 1,
                        "descricao": "Iphone X",
                        "valor": "3000.00",
                        "status": 1,
                        "created_at": null,
                        "updated_at": null,
                        "pivot": {
                            "pedido_id": 1,
                            "produto_id": 1
                        }
                    },
                    {
                        "id": 2,
                        "descricao": "Apple watch",
                        "valor": "2500.00",
                        "status": 1,
                        "created_at": null,
                        "updated_at": null,
                        "pivot": {
                            "pedido_id": 1,
                            "produto_id": 2
                        }
                    }
                ]
            }
        ]

### Buscar pedido [GET]
`GET /api/pedidos/{id}`

+ Request (application/json)

    + Parameters
         + id (required, number, `1`) - Id do pedido

+ Response 200 (application/json)

  - Body

        
        {
            "id": 1,
            "numero_do_pedido": 43,
            "status_pedido": 1,
            "usuario_id": 1,
            "created_at": null,
            "updated_at": null,
            "usuario": {
                "id": 1,
                "nome": "Andre",
                "email": "andre@andre.com",
                "status": 1,
                "created_at": null,
                "updated_at": null
            },
            "produtos": [
                {
                    "id": 1,
                    "descricao": "Iphone X",
                    "valor": "3000.00",
                    "status": 1,
                    "created_at": null,
                    "updated_at": null,
                    "pivot": {
                        "pedido_id": 1,
                        "produto_id": 1
                    }
                },
                {
                    "id": 2,
                    "descricao": "Apple watch",
                    "valor": "2500.00",
                    "status": 1,
                    "created_at": null,
                    "updated_at": null,
                    "pivot": {
                        "pedido_id": 1,
                        "produto_id": 2
                    }
                }
            ]
        }

+ Response 404 (application/json)

  - Body

        
        []

### Adicionar Pedido [POST]
`POST /api/pedidos`


#### Dados para envio no POST
| Parâmetro | Descrição |
|---|---|
| `numero_do_pedido` | numero do pedido (required, numeric)|
| `status_pedido` | Identifica se o produto está ativo no sistema (required, boolean)  - 1 ativo - 0 inativo |
| `usuario_id` | Identificador do usuário deste pedido (required)|

+ Request (application/json)
    - Body

            
            {
                "numero_do_pedido": 120,
                "status_pedido": 1,
                "usuario_id": 2
            }
        

+ Response 201 (application/json)

  - Body

        
            {
                "numero_do_pedido": 120,
                "status_pedido": 1,
                "usuario_id": 2,
                "updated_at": "2022-08-02T22:59:57.000000Z",
                "created_at": "2022-08-02T22:59:57.000000Z",
                "id": 2
            }
        

+ Response 422 (application/json)

  - Body

        
        {
            "message": "The given data was invalid.",
            "errors": {
                "usuario_id": [
                    "O campo usuario id e obrigatorio"
                ]
            }
        }

### Atualizar Pedido [PUT]
`PUT /api/pedidos/{id}`

#### Dados para envio no PUT
| Parâmetro | Descrição |
|---|---|
| `status_pedido` | Identifica se o produto está ativo no sistema (required, boolean)  - 1 ativo - 0 inativo |

+ Request (application/json)
    - Body

            
            {
                "status_pedido": 0,
            }
        

+ Response 201 (application/json)

  - Body

        
            {
                "id": 1,
                "numero_do_pedido": 43,
                "status_pedido": 0,
                "usuario_id": 1,
                "created_at": null,
                "updated_at": "2022-08-02T23:04:24.000000Z"
            }
        

+ Response 422 (application/json)

  - Body

        
        {
            "message": "The given data was invalid.",
            "errors": {
                "status_pedido": [
                    "Esse campo precisa ser do tipo verdadeiro ou falso"
                ]
            }
        }

### Inativar Pedido [DELETE]
`DELETE /api/pedidos/{id}`

+ Request (application/json)

    + Parameters
         + id (required, number, `1`) - Id do pedido

+ Response 200 (application/json)

  - Body

        []

+ Response 404 (application/json)

  - Body

        []

## Pedido_Produtos

### Adicionar pedido_produtos [POST]
`POST /api/pedido_produtos`


#### Dados para envio no POST
| Parâmetro | Descrição |
|---|---|
| `pedido_id` | id do pedido (required)|
| `produto_id` | id do produto (required) 

+ Request (application/json)
    - Body

            
            {
                "pedido_id": 1,
                "produto_id": 2
            }
        

+ Response 201 (application/json)

  - Body

        
            {
                "pedido_id": 1,
                "produto_id": 2,
                "updated_at": "2022-08-02T23:13:08.000000Z",
                "created_at": "2022-08-02T23:13:08.000000Z",
                "id": 3
            }
        

+ Response 404 (application/json)

  - Body

        []

### Deletar Pedido_Produtos [DELETE]
`DELETE /api/pedido_produtos/{id}`

+ Request (application/json)

    + Parameters
         + id (required, number, `1`) - Id do pedido_produtos

+ Response 200 (application/json)

  - Body

        []

+ Response 404 (application/json)

  - Body

        []