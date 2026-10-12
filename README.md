# 🚀 Task Manager API

A RESTful API backend for managing tasks and users, with token-based authentication and automated email notifications. Built with **Laravel** and **MySQL**.

---

## ✨ Features

- **Task management:** full CRUD for tasks, including status updates and user assignment.
- **User management:** users can be created, updated, and linked to their tasks.
- **Authentication & security:** protected routes with token-based access control.
- **Email notifications:** automated emails sent over SMTP using Laravel Mailables when tasks are updated or assigned.
- **Request validation:** strict server-side validation to keep data consistent and safe.
- **Eloquent ORM & migrations:** a structured MySQL schema with relationships between users and tasks.
- **Consistent JSON responses:** a standard request/response format across all endpoints.
- **Automated tests:** PHPUnit test setup for the API.

---

## 🛠️ Tech Stack

| Layer          | Technology                     |
| -------------- | ------------------------------ |
| Framework      | Laravel (PHP 8.2+)             |
| Database       | MySQL                          |
| Email          | SMTP via Laravel Mailables     |
| API testing    | Postman / Thunder Client       |
| Unit testing   | PHPUnit                        |

---

## 📋 Prerequisites

- PHP >= 8.2
- Composer
- MySQL Server

---

## ⚙️ Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/SaifAlkhatib/Task_Manager.git
   cd Task_Manager
   ```

2. **Install dependencies**

   ```bash
   composer install
   ```

3. **Set up the environment file**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure the database and mail settings** in `.env`

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=task_manager
   DB_USERNAME=your_username
   DB_PASSWORD=your_password

   MAIL_MAILER=smtp
   MAIL_HOST=your_smtp_host
   MAIL_PORT=587
   MAIL_USERNAME=your_smtp_username
   MAIL_PASSWORD=your_smtp_password
   MAIL_FROM_ADDRESS=noreply@example.com
   MAIL_FROM_NAME="Task Manager"
   ```

5. **Run the migrations**

   ```bash
   php artisan migrate
   ```

6. **Start the development server**

   ```bash
   php artisan serve
   ```

   The API will be available at `http://127.0.0.1:8000`.

---

## 🧪 API Testing

Ready-made request collections are included in the repository:

- `postman/` and `.postman/` for Postman
- `thunder-collection_postman_api auth.json` for Thunder Client (VS Code)

Import one of them into your client, then register or log in to get a token and send it with protected requests:

```
Authorization: Bearer <your_token>
```

Run the automated tests with:

```bash
php artisan test
```

---

## 📁 Project Structure

```
app/          Application code (models, controllers, mail classes)
config/       Configuration files
database/     Migrations, factories, and seeders
routes/       API route definitions
tests/        Automated tests
postman/      API request collections
```

---

## 🤝 Contributing

Contributions, issues, and feature requests are welcome. Feel free to open an issue or submit a pull request.

---

## 👤 Author

**Saif Alkhatib**
GitHub: [@SaifAlkhatib](https://github.com/SaifAlkhatib)
