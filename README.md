<p align="center">
  <a href="https://laravel.com"><img src="https://img.shields.io/badge/Laravel-10.x-red?logo=laravel" alt="Laravel"></a>
  <a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/badge/License-MIT-yellow.svg" alt="License: MIT"></a>
  <a href="https://www.php.net/"><img src="https://img.shields.io/badge/PHP-%3E=8.1-blue?logo=php" alt="PHP"></a>
  <a href="https://herd.laravel.com/"><img src="https://img.shields.io/badge/Herd-Used-green?logo=laravel" alt="Herd"></a>
</p>

# Laravel Blog & Comments API

This project is a simple Laravel-based API for managing blog posts and their comments. It demonstrates user authentication, CRUD operations for posts and comments, and relationship handling using Eloquent ORM. The API is designed for learning and as a starting point for more advanced Laravel applications.

## Features

-   User registration and authentication
-   Create, read, update, and delete blog posts
-   Each post can have multiple comments
-   Only the post owner can update or delete their posts
-   API endpoints for posts and comments
-   Validation using Form Requests
-   Welcome email sent to new users

## Installation Requirements

-   PHP >= 8.1
-   Composer
-   MySQL or SQLite
-   [Herd](https://herd.laravel.com/) (recommended; used for constructing this application)
-   Node.js & npm (for frontend assets, optional)
-   [XAMPP](https://www.apachefriends.org/) or similar local server (optional)
-   [Postman](https://www.postman.com/) (for testing API endpoints)

## Installation Steps

1. **Clone the repository:**
    ```bash
    git clone <your-repo-url>
    cd my-app
    ```
2. **Install PHP dependencies:**
    ```bash
    composer install
    ```
3. **Copy and configure environment file:**
    ```bash
    cp .env.example .env
    # Edit .env to set your database credentials
    ```
4. **Generate application key:**
    ```bash
    php artisan key:generate
    ```
5. **Run migrations and seeders:**
    ```bash
    php artisan migrate --seed
    ```
6. **(Optional) Install frontend dependencies:**
    ```bash
    npm install && npm run dev
    ```
7. **Start the development server:**
    ```bash
    herd start
    # or, if you prefer the built-in Laravel server:
    php artisan serve
    ```

## API Functionality

-   **User Registration & Login:**
    -   `POST /api/signup` — Register a new user and receive a welcome email
    -   `POST /api/login` — Login and receive an authentication token
    -   `POST /api/logout` — Logout the authenticated user
-   **Posts:**
    -   `GET /api/post` — List all posts
    -   `POST /api/post` — Create a new post (auth required)
    -   `GET /api/post/{id}` — Get a single post
    -   `PUT /api/post` — Update a post (auth & ownership required)
    -   `DELETE /api/post/{id}` — Delete a post (auth & ownership required)
    -   `GET /api/post/{id}/comments` — List all comments for a post
-   **Comments:**
    -   `GET /api/comment` — List all comments
    -   `POST /api/comment` — Create a comment (auth required)
    -   `GET /api/comment/{id}` — Get a single comment
    -   `PUT /api/comment` — Update a comment (auth & ownership required)
    -   `DELETE /api/comment/{id}` — Delete a comment (auth & ownership required)
