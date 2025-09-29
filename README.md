
# BlogPwd: Laravel 12 Blog & Category Management

A full-stack web application featuring a Laravel 12 backend and a simple HTML/JS frontend for managing articles, categories, and user authentication.

---

## Project Features

- **Frontend (`app/`):**
   - Minimal HTML/JavaScript UI for category management (list, add, delete)
   - Uses Bootstrap and FontAwesome for styling
   - Communicates with backend API for CRUD operations
   - Token-based authentication

- **Backend (`blog/`):**
   - Laravel 12 (PHP 8.2+) RESTful API for categories and articles
   - User authentication with Laravel Sanctum
   - Article management with Blade templates
   - Web interface for articles, categories, and authentication
   - Uses Vite, Tailwind, and Bootstrap for frontend assets

---

## Project Structure

```
├── app/           # Frontend (HTML/JS/CSS)
│   ├── index.html
│   ├── css/
│   ├── js/
│   └── webfonts/
└── blog/          # Backend (Laravel 12)
    ├── app/
    ├── routes/
    ├── resources/views/
    ├── public/
    ├── database/
    ├── composer.json
    ├── package.json
    └── ...
```

---

## Frontend (`app/`)

- **index.html**: Main UI for category management (list, add, delete).
- Uses Bootstrap for styling and FontAwesome for icons.
- Communicates with the backend API at `http://localhost:8000/api/categories`.
- Requires a valid API token for authentication (see backend setup).

### Running the Frontend
Just open `app/index.html` in your browser. Make sure the backend is running and accessible at `http://localhost:8000`.

---

## Backend (`blog/`)

- **Laravel 12** application (PHP 8.2+ required)
- Provides:
  - RESTful API for categories (`/api/categories`)
  - User authentication (Laravel Sanctum)
  - Article management (Blade templates in `resources/views/articles/`)
  - Web interface for articles, categories, and authentication
- Uses Vite, Tailwind, Bootstrap for frontend assets

### Setup Instructions

1. **Install PHP dependencies:**
   ```bash
   cd blog
   composer install
   ```
2. **Install Node.js dependencies:**
   ```bash
   npm install
   ```
3. **Environment setup:**
   - Copy `.env.example` to `.env` and configure your database and other settings.
   - Generate application key:
     ```bash
     php artisan key:generate
     ```
4. **Run migrations:**
   ```bash
   php artisan migrate
   ```
5. **Start the development servers:**
   ```bash
   npm run dev
   php artisan serve
   ```
   Or use the combined script:
   ```bash
   composer run dev
   ```

### API Authentication
- The API uses Laravel Sanctum for authentication.
- Obtain a token by sending a POST request to `/api/login` with email and password.
- Use the token as a Bearer token in API requests (see `app/index.html` for example usage).

### Running Tests
```bash
php artisan test
```

---

## Additional Notes
- The backend also includes Blade templates for articles and authentication (see `resources/views/`).
- The frontend (`app/`) is a minimal example and can be extended as needed.
- For more details on Laravel, see the [official documentation](https://laravel.com/docs). 