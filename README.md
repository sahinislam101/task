# task
# ✅ Laravel + Vue.js Todo App

A simple CRUD Todo App built with:

- Laravel 11 (Backend)
- Vue 3 + Inertia.js (Frontend)
- TailwindCSS (Styling)
- UUID & Slug-based Todo Management

## 🚀 Features
- Create, Edit, Delete, and View Todos
- Status filtering (Active / Inactive)
- Responsive and modern UI
- Secure with CSRF & Auth

 Clone the repository

```bash
git clone https://github.com/sahinislam101/task.git
cd task

composer install
npm install && npm run dev

cp .env.example .env
php artisan key:generate

php artisan serve
npm run dev
