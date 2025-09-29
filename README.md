
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
   - Copy `.env.example` to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Edit `.env` to set your database connection and other environment variables as needed.
   - Generate application key:
     ```bash
     php artisan key:generate
     ```
4. **Run database migrations:**
   ```bash
   php artisan migrate
   ```
5. **(Optional) Seed the database:**
   ```bash
   php artisan db:seed
   ```
6. **Start the development servers:**
   - For assets (Vite):
     ```bash
     npm run dev
     ```
   - For the API and web (Laravel):
     ```bash
     php artisan serve
     ```
   Or use the combined script:
   ```bash
   composer run dev
   ```
7. **Access the backend:**
   - API: `http://localhost:8000/api/`
   - Web: `http://localhost:8000/`


---

## API Setup & Usage

- **Base URL:** `http://localhost:8000/api/`
- **Authentication:** Laravel Sanctum (token-based)

### Main Endpoints

| Method | Endpoint              | Description                |
|--------|----------------------|----------------------------|
| POST   | /api/login           | User login, returns token  |
| POST   | /api/register        | User registration          |
| GET    | /api/categories      | List categories            |
| POST   | /api/categories      | Create category            |
| DELETE | /api/categories/{id} | Delete category            |
| GET    | /api/articles        | List articles              |
| POST   | /api/articles        | Create article             |
| ...    | ...                  | ...                        |

### Authentication Flow
1. Register or login to obtain an API token:
   - `POST /api/login` with `{ email, password }`
   - Response: `{ token: "..." }`
2. Use the token as a Bearer token in the `Authorization` header for all protected API requests:
   ```http
   Authorization: Bearer YOUR_TOKEN_HERE
   ```
3. See `app/index.html` for example usage in JavaScript.

---


### Running Tests
```bash
php artisan test
```

---

## Additional Notes
- The backend also includes Blade templates for articles and authentication (see `resources/views/`).
- The frontend (`app/`) is a minimal example and can be extended as needed.
- For more details on Laravel, see the [official documentation](https://laravel.com/docs).

---

## Quickstart
1. Follow the backend setup steps above.
2. Open `app/index.html` in your browser for the frontend UI.
3. Use the API endpoints for integration or testing.