# Library Management System

A modern, robust Library Management System built with Laravel 11, Vue 3, Inertia.js, and Tailwind CSS. This system focuses on a clean, professional UI/UX, modular components, and secure data handling.

## Tech Stack

*   **Backend:** Laravel 11 (PHP 8.2+)
*   **Frontend:** Vue 3 (Composition API) + Inertia.js
*   **Styling:** Tailwind CSS

## Requirements

Make sure you have the following installed on your local environment:
*   PHP >= 8.2
*   Composer
*   Node.js & npm
*   MySQL

## Installation & Setup

Follow these steps to set up the project locally:

**1. Clone the repository**
```bash
git clone <repository-url>
cd library-management-system
```

**2. Install PHP dependencies**
```bash
composer install
```

**3. Install JavaScript dependencies**
```bash
npm install
```

**4. Set up environment variables**
Copy the example environment file and configure your database credentials:
```bash
cp .env.example .env
```
*Open the `.env` file and update the `DB_*` variables with your database connection details.*

**5. Generate application key**
```bash
php artisan key:generate
```

**6. Run database migrations**
Create the necessary tables in your database:
```bash
php artisan migrate
```

**7. Build frontend assets**
Compile the Tailwind CSS and Vue components for production:
```bash
npm run build
```
*(For local development with hot-reloading, you can use `npm run dev` instead).*

## Creating an Administrator Account

This project includes a custom Artisan command to securely create an admin user directly from the terminal.

Run the following command:
```bash
php artisan app:create-admin
```

You will be prompted to enter the administrator's details:
*   **Name:** The full name of the admin.
*   **Email:** A unique email address.
*   **Password:** Must be at least 8 characters.
*   **Password Confirmation:** Type the password again.

If validation passes, the account will be created with administrator privileges (`is_admin = true`).

## Local Development Server

To start the local development server, run:
```bash
php artisan serve
```
The application will be accessible at `http://localhost:8000`.
