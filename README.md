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


### O que não foi feito?

Finalização da arquitetura hexagonal em autenticação e usuários.

Tratamento de algumas exceções
