# Laravel 10 Store Management Project

Este é um projeto desenvolvido como parte de um teste de desenvolvimento. Consiste em uma aplicação simples com API para gerenciamento de lojas e livros.

## Definições Técnicas

- **Laravel Version**: 10.48.10
- **PHP Version**: 8.3.6
- **MySQL Version**: 8.0.36
- **Composer Version**: 2.7.6
- **Sail Version**: sail-8.3

## Configuração do Ambiente de Desenvolvimento

Este projeto utiliza Laravel Sail para gerenciar o ambiente de desenvolvimento com Docker. Siga as instruções abaixo para configurar o ambiente localmente:

**Tenha certeza de que você possui composer e php instalados em sua máquina, para executar o: composer install; Onde será gerada as configurações do Docker. Caso você não queira utilizá-lo, basta apenas trocar o sail por php ou composer eventualmente.**

1. Clone o repositório do projeto:

   ~~~bash
   git clone https://github.com/seu-usuario/project_stores_books.git
   ~~~

2. Navegue até o diretório do projeto:

   ~~~bash
   cd project_stores_books
   ~~~

3. Copie o arquivo `.env.example` para `.env`:

   ~~~bash
   cp .env.example .env
   ~~~

4. Execute o container Sail:

   ~~~bash
   ./vendor/bin/sail up -d
   ~~~

5. Instale as dependências do Composer:

   ~~~bash
   ./vendor/bin/sail composer install
   ~~~

6. Gere a chave de aplicativo do Laravel:

   ~~~bash
   ./vendor/bin/sail artisan key:generate
   ~~~

7. Execute as migrações do banco de dados e os seeds:

   ~~~bash
   ./vendor/bin/sail artisan migrate --seed
   ~~~

## Documentação da API

Para visualizar e testar as requisições da API, consulte a documentação no Postman:

[Link para a coleção no Postman](https://www.postman.com/research-astronomer-54954197/workspace/cursos/collection/29902406-52593204-4150-4ef8-a947-be9870fde5f3?action=share&creator=29902406)
