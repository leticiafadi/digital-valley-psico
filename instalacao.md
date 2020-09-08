# Manual de Instalação Fênix

## 1. Requesitos

1. PHP 5.6
2. MySQL >= 5.7
3. PHPMyAdmin: Versão Compatível com PHP 5.6
4. Composer: Versão Atualizada
5. NPM: Versão Atualizada

## 2. Utilizando Docker

> Para usar o ambiente com Docker recomendo usar ambiente pronto [Laradock](https://github.com/laradock/laradock).
> Com ele apenas é necessário configurar as variáveis de ambiente conforme os requisitos necessários do projeto.

### 2.1. Clonar o repositório do Laradock

```sh
git clone https://github.com/laradock/laradock.git
```

### 2.2. Copiar Arquivo das Variáveis

> Fazer uma copia do arquivo env-example no repositório clonado e renomeá-lo para .env

### 2.3. Alterar as Variáveis do arquivo .env

```env
PHP_VERSION=5.6

APACHE_DOCUMENT_ROOT={LOCAL_DO_PROJETO}

MYSQL_VERSION=8
MYSQL_DATABASE=psicologiaUfc
MYSQL_USER=default
MYSQL_PASSWORD=secret
MYSQL_ROOT_PASSWORD=root
```

### 2.4. Criação e Ativação do Ambiente

```sh
docker-compose up -d --build workspace apache2 mysql phpmyadmin
```

### 2.5. Desativar o Ambiente

```sh
docker-compose down
```

### 2.6. Entrar no Terminal do Ambiente

```sh
docker-compose exec workspace bash
```

## 3. Variáveis de Ambiente do Projeto

### 3.1. Copiar Arquivo das Variáveis

> Fazer uma copia do arquivo .env.example na raiz do projeto e renomeá-lo para .env

### 3.2 Alterar as Variáveis do arquivo .env

```env
APP_DEBUG={se estiver usando para desenvolvimento (true) e (false) para produção}
APP_URL=URL_DO_SISTEMA

DB_HOST=IP_DO_SERVIDOR_DO_BD
DB_PORT=3306
DB_DATABASE=BANCO_DE_DADOS
DB_USERNAME=USUARIO
DB_PASSWORD=SENHA

MAIL_HOST=HOST_SMTP
MAIL_PORT=PORTA_SMPT
MAIL_USERNAME=USUARIO_SMTP
MAIL_PASSWORD=SENHA_SMTP
MAIL_ENCRYPTION=tls
```

### 3.3 Gerar APP KEY

```sh
php artisan key:generate
```

## 4. Desenvolvimento

### 4.1. Instalação das Bibliotecas PHP

```sh
composer install
```

### 4.2. Otimização do Autoload do Laravel

```sh
php artisan optimize
```

### 4.3. Inicialização do Banco

```sh
php artisan migrate --seed
```

### 4.4. Instalação das Bibliotecas JS

```sh
npm install
```

### 4.5. Servidor de Compilação dos assets para Desenvolvimento

```sh
npm run watch-poll
```

## 5. Produção

### 5.1. Instalação das Bibliotecas PHP

```sh
composer install
```

### 5.2. Otimização do Autoload do Laravel

```sh
php artisan optimize
```

### 5.3. Inicialização do Banco

```sh
php artisan migrate --seed
```

### 5.4. Instalação das Bibliotecas JS

```sh
npm install
```

### 5.5. Compilação dos assets para Produção

```sh
npm run production
```
