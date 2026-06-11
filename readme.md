# Bistro – Restaurant Web Application

Web aplikácia pre reštauráciu s rezervačným systémom, menu a admin panelom.

## Požiadavky

- PHP 8.0+
- MySQL 8.0+ alebo MariaDB 10.3+
- Composer
- Node.js + npm (len pre úpravu CSS/Tailwind)
- Apache s mod_rewrite (alebo ekvivalentný webserver)

## Inštalácia

### 1. Klonuj repozitár

```bash
git clone <url-repozitara>
cd bistro
```

### 2. Nainštaluj PHP závislosti

```bash
composer install
```

### 3. Nastav prostredie

Skopíruj `.env.example` na `.env` a vyplň hodnoty:

```bash
cp .env.example .env
```

Uprav `.env`:

```
DB_HOST=localhost
DB_PORT=3306
DB_NAME=bistro
DB_USER=tvoj_db_user
DB_PASS=tvoje_db_heslo
ADMIN_PASSWORD_HASH=
```

### 4. Vygeneruj hash pre admin heslo

```bash
php -r "echo password_hash('tvoje_heslo', PASSWORD_BCRYPT) . PHP_EOL;"
```

Skopíruj výstup do `ADMIN_PASSWORD_HASH` v `.env`.

### 5. Vytvor databázu

Prihlás sa do MySQL a spusti schému:

```bash
mysql -u root -p < schema.sql
```

Alebo manuálne:

```sql
SOURCE /cesta/k/projektu/schema.sql;
```

### 6. Nastav webserver

**Apache** – dokument root nastav na `public/`. Súbor `.htaccess` je už pripravený.

**MAMP / XAMPP / Laragon** – nastav document root na `public/` priečinok projektu.

**PHP built-in server** (na vývoj):

```bash
cd public
php -S localhost:8000
```

bistro/
├── public/ # Vstupný bod aplikácie (document root)
│ ├── index.php
│ ├── .htaccess
│ ├── css/
│ ├── scripts/
│ └── assets/
├── src/
│ ├── Controllers/ # Controllery (MVC)
│ ├── config/ # Konfigurácia databázy a routes
│ ├── Database.php
│ ├── Router.php
│ ├── Helpers.php
│ └── functions.php
├── views/ # PHP šablóny
├── vendor/ # Composer závislosti
├── schema.sql # SQL schéma databázy
├── composer.json
├── package.json
├── tailwind.config.js
└── .env.example # Vzorový konfiguračný súbor

```

## Admin panel

Admin panel je dostupný na `/admin-login`.

Prihlasovacie heslo sa nastavuje cez `ADMIN_PASSWORD_HASH` v `.env` (pozri krok 4).
```
