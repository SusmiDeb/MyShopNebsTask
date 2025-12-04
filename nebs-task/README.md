# 📦 Laravel Project 11 (Laravel Breeze + Spatie Roles & Permissions)

এই প্রজেক্টটি Laravel ভিত্তিক একটি সম্পূর্ণ Authentication ও Role-Based Access Control সিস্টেম।  
এখানে **Laravel Breeze** ব্যবহার করা হয়েছে লগইন/রেজিস্ট্রেশনের জন্য এবং  
**Spatie Laravel Permission** ব্যবহার করা হয়েছে Role ও Permission ম্যানেজমেন্টের জন্য।

---

## 🚀 Features

- ✔️ Laravel Breeze Authentication (Login, Register, Forgot Password)
- ✔️ Admin / User Role Management
- ✔️ Spatie Role & Permission Integration
- ✔️ Middleware Protected Routes
- ✔️ Admin can manage resources (products, users, orders )
- ✔️ Normal users have limited access
- ✔️ Responsive UI
- ✔️ Clean code structure

---

## 🛠️ Technologies Used

- **Laravel 11**
- **Laravel Breeze**
- **Spatie Laravel Permission**
- **MySQL Database**
- **Bootstrap / Tailwind**
- **PHP 8.2+**

---

## 📥 Installation Guide

### 1️⃣ Clone the repository
```bash
git clone https://github.com/SusmiDeb/MyShopNebsTask
cd project-name
```

### 2️⃣ Install dependencies
```bash
composer install
npm install
npm run build
```

### 3️⃣ Copy `.env` file
```bash
cp .env.example .env
```

### 4️⃣ Generate app key
```bash
php artisan key:generate
```

### 5️⃣ Setup database
`.env` ফাইলে ডাটাবেস ইনফো দিন:

```
DB_DATABASE=nebs_task
DB_USERNAME=root
DB_PASSWORD=
```

### 6️⃣ Run migrations
```bash
php artisan migrate
```

### 7️⃣ Seed Roles & Admin User (যদি Seeder থাকে)
```bash
php artisan db:seed
```

 অথবা নির্দিষ্ট Seeder থাকলে:

```bash
php artisan db:seed --class=CreateAdminUserSeeder
```

---

## 👥 Role & Permission Setup

এই প্রজেক্টে Spatie Permission প্যাকেজ ব্যবহার করা হয়েছে।

### Installation Command (Already Done)
```bash
composer require spatie/laravel-permission
```

### Publish & Migrate
```bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
```

### Example Usage:
```php
// Assign Role
$user->assignRole('admin');

// Give Permission
$user->givePermissionTo('edit product');
```

---

## 🔐 Authentication (Laravel Breeze)

Laravel Breeze ইনস্টল করা হয়েছে Authentication এর জন্য।

### Breeze Install Command (Already Done)
```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install
npm run build
```

---

## 🔒 Route Protection Example

### Admin Only Route
```php
Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('products', ProductController::class);
});
```

### User Route
```php
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth']);
```

---

## 📂 Project Structure

```
app/
  ├── Http/
  │    ├── Controllers/
  │    ├── Middleware/
  │
  ├── Models/
  ├── Policies/

routes/
  ├── web.php
  ├── api.php

resources/
  ├── views/
  ├── js/
  └── css/
```

---

## 🧪 Testing (if required)

```bash
php artisan test
```

---

## ▶️ Run the project

```bash
php artisan serve
```

---
## ▶️ Project Login Password
  Admin
  name: Admin User
  email:admin@example.com
  password: password123
  

  Example user
  name: General User
  email:susmi@gmail.com
  password:12345678   (You can also login using this example user. Or you can registration e new user and login)


## 👨‍💻 Developer

**Your Name**  
📧 Email: susmita.debnath.cse@gmail.com 
🌐 https://github.com/SusmiDeb/MyShopNebsTask

---

