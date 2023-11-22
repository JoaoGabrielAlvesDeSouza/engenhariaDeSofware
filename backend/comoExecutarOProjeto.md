<h1> Como executar o projeto </h1>

Você precisará de ter um banco de dados no postgre que esteja vazio. As credenciais deverão sem inclusas num .env seguindo o padrão do .env.example e ambos devem estar na raíz do projeto. Após isso execute os passos abaixo.

Na raíz do backend execute : 

```bash
composer update
php -S localhost:8000
```

Se você não tiver o postgresql no computador terá que usar o docker. Para isso na raíz do backend execute os comando abaixo : 

```bash
docker compose up --build
composer update
php -S localhost:8000
```

<h1> Como executar os testes </h1>

Execute : 

```bash
php ./vendor/bin/phpunit src/caminhoDoTeste/teste.php --colors
```

<h1> Rotas da api </h1>

<h1> Criar usuário </h1>

Método : POST

Json a ser enviado

```bash
{
    "userEmail" : "user@email.com",
    "userPassword" : "12345678",
    "userName" : "user"
}
```

Reponse em caso de sucesso : 

```bash
{
    "response" : "user created successfully"
}
```

Reponse em caso de erro : 

```bash
{
    "response" : "credentials invalid or null"
}
```

<h1> Fazer login </h1>

Método : POST

Json a ser enviado

```bash
{
    "userEmail" : "user@email.com",
    "userPassword" : "12345678",
}
```

Reponse em caso de sucesso : 

```bash
{
    "userEmail" : "user@email.com",
    "userPassword" : "12345678",
    "userName" : "user"
}
```

Reponse em caso de erro : 

```bash
{
    "response" : "credentials invalid, null or user dont exists"
}
```