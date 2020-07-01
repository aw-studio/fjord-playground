# Fjord Playground

Fjord playground is an example project for fjord. It gives an overview of the functions and the possibility to try them out. You can simply visit the project on [demo.fjord-admin.com](demo.fjord-admin.com) or install it locally.

## Install

### Step 1. Clone

Clone the project via **git**:

```shell
git clone https://github.com/aw-studio/fjord-playground.git
```

### Step 2. Setup

Create a `.env` file.

```shell
cp .env.example .env
```

Setup a database connection.

### Step 3. Install

Run all seeders using `fjord-playground:install`

```shell
php artisan fjord-playground:install
```
