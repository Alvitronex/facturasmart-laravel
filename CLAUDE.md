# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

FacturaSmart is a Laravel 10 invoicing/billing application. Currently a fresh installation with Sanctum API authentication configured and Vite for frontend asset compilation.

## Common Commands

```bash
# Development
php artisan serve          # Start local dev server
npm run dev                # Start Vite dev server (hot reload)

# Database
php artisan migrate        # Run migrations
php artisan migrate:fresh --seed  # Reset and seed database
php artisan db:seed        # Run seeders only

# Code generation
php artisan make:model ModelName -mcr   # Model + migration + controller (resource)
php artisan make:controller Name --api  # API controller

# Testing
php artisan test                          # Run all tests
php artisan test --filter=TestClassName  # Run a specific test class
php artisan test tests/Feature/MyTest.php  # Run a specific file

# Code style
./vendor/bin/pint          # Fix code style (Laravel Pint)
./vendor/bin/pint --test   # Check without fixing

# Build
npm run build              # Compile frontend assets for production
```

## Architecture

**Stack**: Laravel 10, PHP 8.1+, MySQL, Sanctum (API tokens), Vite 5

**API Authentication**: Laravel Sanctum — API routes under `routes/api.php` use `auth:sanctum` middleware.

**Route structure**:
- `routes/web.php` — Blade/web routes (session-based auth)
- `routes/api.php` — API routes, prefixed with `/api`, throttled via `api` middleware group

**Service Providers** (all in `app/Providers/`): `AppServiceProvider` is the place for custom bindings; `RouteServiceProvider` configures rate limiting and loads route files.

**Middleware groups**:
- `web` — sessions, CSRF, cookies
- `api` — stateless, rate-limited

**Frontend**: Vite compiles `resources/css/app.css` and `resources/js/app.js`. Blade views live in `resources/views/`.

**Default migrations**: users, password_reset_tokens, failed_jobs, personal_access_tokens (Sanctum).
