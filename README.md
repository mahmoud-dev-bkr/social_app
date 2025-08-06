## README.md
# Social App

A Laravel-based social application with JWT authentication, AdminLTE dashboard, real-time notifications, and daily reporting.

## Requirements
- PHP >= 8.1
- Composer
- MySQL
- Node.js & NPM
- Pusher account for real-time notifications
- Mailtrap or similar for email testing

## Installation
1. Clone the repository:
```bash
git clone [repository-url]
cd laravel-social-app
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Copy .env.example to .env and configure:
```bash
cp .env.example .env
```

4. Generate application key:
```bash
php artisan key:generate
```

5. Configure database, JWT, Pusher, and mail settings in .env:
```
DB_DATABASE=social_app
DB_USERNAME=root
DB_PASSWORD=
JWT_SECRET=your_jwt_secret
PUSHER_APP_ID=your_pusher_id
PUSHER_APP_KEY=your_pusher_key
PUSHER_APP_SECRET=your_pusher_secret
PUSHER_APP_CLUSTER=your_pusher_cluster
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
```

6. Run the custom installation command:
```bash
php artisan install:project SocialApp
```

7. Serve the application:
```bash
php artisan serve
```

## Running Tests
```bash
php artisan test
```

## API Documentation
Import `postman_collection.json` into Postman to test the APIs. Available endpoints:
- POST /api/register
- POST /api/login
- GET /api/posts
- POST /api/posts

## Admin Panel
Access at `/admin` with admin credentials (default: admin@socialapp.com/password). Requires is_admin = true in users table.

## Daily Report
A daily report job runs at midnight, emailing the admin with new users and posts count.

## Database Dump
The database dump is included in `social_app_dump.sql` after running the seeder.

## Notes
- Telescope is installed for logging all actions and errors (access at /telescope)
- Uses AdminLTE for admin panel UI
- Real-time notifications via Pusher for new posts
- Follows SOLID principles with repository pattern and dependency injection
- Includes unit tests for API endpoints
