```
### O que foi feito?

Projeto Laravel com Arquitetura Hexagonal (Ports and Adapters) e estruturação de pastas modular.
Design Patterns empregados: Controller, Dto, Mapper, Repository, UseCase, DomainServices, Fluent Interface.
Princípios SOLIDS aplicados: SRP=Princípio de Responsabilidade única, OCP=Princípio de Aberto e Fechado, DIP=Princípio de Inversão de Dependência.

### Estruturação das pastas (Modular)
Modules
  Adapter
    Controller
    Dto
    Mapper
    Repository
    UseCase
  Domain
    Entity
    Services
  Port
    Interfaces de Adaptadores
Shared

### Para rodar o projeto, utilize PHP 8.1 e Mysql

1-Efetuar o download do código fonte
2-Rodar composer install
3-Clonar arquivo .env.example e renomear para .env
4-Alterar configurações de conexão da base de dados de acordo com ambiente local

DB_HOST=laradock_mysql_1 // Ex: Host do banco de dados. Ex: localhost
DB_PORT=3306 // Porta do banco de dados
DB_DATABASE=anc // Nome do banco de dados
DB_USERNAME=root // usuario de acesso
DB_PASSWORD=root // senha de acesso

Autenticação jwt não foi finalizada no frontend
Caso queira testar autenticação com insomnia ou postman, altere o atributo AUTH= para AUTH=jwt

5-Criar base de dados com o nome definido na configuração acima do banco. por padrão é anc
6-Rodar php artisan migrate para criar tabelas
7-Rodar php artisan serve para rodar projeto

### 8- Login padrão de acesso: adm@msn.com, senha: adm123

### O que não foi feito?

Finalização da arquitetura hexagonal em autenticação e usuários.
Tratamento de algumas exceções

### Endpoints
* [GET]/ping
* [GET]/clear-cache
* [GET]/auth/login

{
"email": "l@msn.com",
"password": "adm123"
}

* [POST]/auth/register

{
	"name": "Leonam",
	"email": "leonamjlima88@gmail.com",
	"password": "adm123",
	"password_confirmation": "adm123"
}

* [POST]/auth/me
* [POST]/auth/logout


* [GET]/stock/product
* [POST]/stock/product/query

{
  "page": {
    "isPaginate": true,
    "limit": 10,
    "current": 1,
    "columns": [] // array de string
  },
  "filter": {
    "orderBy": [ // array de orderBy
      {
        "fieldName": "product.name",
        "direction": "asc" // desc, asc
      }
    ],
    "where": [ // array de where
      {
        "fieldName": "product.id",
        "operator": "likeAnywhere", // equal, greater, less, greaterOrEqual, lessOrEqual, different, likeInitial, likeFinal, likeAnywhere, likeEqual
        "fieldValue": [ // array de string
          "ou"
        ]
      },
    ],
    "orWhere": [ // array de where
      {
        "fieldName": "product.id",
        "operator": "likeAnywhere", // equal, greater, less, greaterOrEqual, lessOrEqual, different, likeInitial, likeFinal, likeAnywhere, likeEqual
        "fieldValue": [ // array de string
          "ou"
        ]
      },
    ]
  }
}

* [GET]/stock/product/3
* [POST]/stock/product

{
	"name": "Teste",
	"description": "Descrição de teste",
	"sku": "6",
	"price": "150.99"
}

* [PUT]/stock/product/6

{
	"name": "Teste edittt",
	"description": "Descrição de teste",
	"sku": "6",
	"price": 15023.95
}

* [DELETE]/stock/product/2

```

Link script banco de dados: https://drive.google.com/file/d/19EbgD6Re9osl88PKasPTz-IrPYbNVTVS/view?usp=sharing
Link endpoints insomnia: https://drive.google.com/file/d/1JWsIBBKs2gk8kw_mQI83ZkPETK0uR36c/view?usp=sharing
