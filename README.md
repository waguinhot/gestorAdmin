# GestorAdmin

Este é um projeto para um sistema de gestão de administração, desenvolvido em PHP. O projeto está disponível no GitHub, no seguinte link: https://github.com/waguinhot/gestorAdmin.git

## Requisitos

Para instalar e executar o projeto, você precisará ter os seguintes requisitos instalados em seu computador:

- [Composer](https://getcomposer.org/)
- [PHP 8.1](https://www.php.net/releases/8.1/en.php)
- Um banco de dados (MySQL, PostgreSQL, SQLite ou outro suportado pelo Laravel)

## Instalação

Para instalar o projeto, siga os passos abaixo:

1. Clone o repositório para sua máquina local:

git clone https://github.com/waguinhot/gestorAdmin.git

2. Configure o arquivo `.env`. Faça uma cópia do arquivo `.env.example` e renomeie para `.env`. Em seguida, abra o arquivo `.env` e configure as informações de conexão com o banco de dados.

3. Instale as dependências do projeto usando o Composer:

composer install

4. Execute as migrações e popule o banco de dados com dados iniciais:

php artisan migrate --seed

5. Instale as dependências do Node.js usando o NPM:

npm install

6. Compile os ativos do projeto:

npm run dev

## Executando o projeto

Se tudo correu bem durante a instalação, você pode iniciar o servidor local usando o seguinte comando:

php artisan serve

O projeto estará disponível em http://localhost:8000/

## Contribuindo

Se você quiser contribuir com o projeto, sinta-se à vontade para criar uma pull request. Certifique-se de seguir as diretrizes de contribuição descritas no arquivo CONTRIBUTING.md.

## Licença

Este projeto está licenciado sob a licença MIT. Consulte o arquivo LICENSE.md para obter mais informações.
