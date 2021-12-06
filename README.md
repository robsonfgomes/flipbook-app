## Instalação
Criar o arquivo de configuração e preencher com as credenciais de acesso ao banco de dados MySql:
```
cp .env.example .env
```
Instalar dependências do PHP:
```php
composer install
```
Criar o banco de dados do projeto:
```
php artisan db:create  
```
Criar a estrutura de tabelas:
```
php artisan migrate  
```
Popular o banco de dados com o admin **Severino**:
```
php artisan db:seed 
```
Gerar a chave da aplicação:
```
php artisan key:generate
```
Instalar das dependências do front-end:
```
npm install
```
Compilar os arquivos estáticos do projeto:
```
npm run dev
```
Iniciar o servidor da aplicação:
```
php artisan serve
```

Agora você está pronto para começar :) acesse a aplicação com as seguintes credenciais:

- **Usuário:** severino@flipbook.com.br
- **Senha:** 123456
