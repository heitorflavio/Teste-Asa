<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Sobre o Projeto

Este projeto utiliza o framework Laravel, um dos mais populares para desenvolvimento web em PHP. Ele fornece uma sintaxe elegante e ferramentas poderosas para criar aplicações modernas e escaláveis.

O projeto foi desenvolvido seguindo as diretrizes da documentação disponível em [GitHub](https://github.com/BeeCoffee/teste-tecnico-php-laravel), com a adição dos seguintes módulos extras:

-   **Dashboard**
-   **Testes de integração**
-   **CRUD de usuários**

## Configuração e Execução com Laravel Sail

Este projeto utiliza o Laravel Sail, uma solução leve baseada em Docker para rodar aplicações Laravel sem necessidade de configurar um ambiente local manualmente.

### Pré-requisitos

-   [Docker e Docker Compose](https://docs.docker.com/get-docker/) instalados na máquina.
-   Git instalado para clonar o repositório.
-   [Laravel Sail](https://laravel.com/docs/11.x/sail) 

### Passos para rodar o projeto

1.  **Clone o repositório:**

    ```sh
    git clone https://github.com/heitorflavio/Teste-Asa.git
    cd Teste-Asa

    ```

2.  **Copie o arquivo de configuração:**

    ```sh
    cp .env.example .env

    ```

3.  **Instale as dependências:**

    ```sh
    ./vendor/bin/sail composer install

    ```

[Composer Install Docker](https://laravel.com/docs/11.x/sail#installing-composer-dependencies-for-existing-projects).

4.  **Inicialize o Laravel Sail:**

    ```sh
    ./vendor/bin/sail up -d

    ```

    Isso irá iniciar os containers do Docker em modo background.

5.  **Gere a chave da aplicação:**

    ```sh
    ./vendor/bin/sail artisan key:generate

    ```

6.  **Execute as migrações do banco de dados:**

    ```sh
    ./vendor/bin/sail artisan migrate --seed

    ```

7.  **Acesse o projeto no navegador:** O Laravel estará disponível em [http://localhost](http://localhost/).

### Comandos Úteis

-   **Parar os containers:**

    ```sh
    ./vendor/bin/sail down

    ```

-   **Acessar o terminal dentro do container:**

    ```sh
    ./vendor/bin/sail shell

    ```

-   **Rodar testes:**

    ```sh
    ./vendor/bin/sail test

    ```

-   **Rodar PhpStan**

    ```sh
    ./vendor/bin/phpstan analyse --memory-limit=2G

    ```

## Contribuindo

Contribuições são bem-vindas! Para contribuir, siga as diretrizes no [guia de contribuição do Laravel](https://laravel.com/docs/contributions).

## Licença

Este projeto é open-source e licenciado sob a [licença MIT](https://opensource.org/licenses/MIT).
