# Phone Number Validation

This project is a **server-rendered Laravel 12 application** that lists, categorizes, and validates customer phone numbers using a provided **SQLite database**.

It Contains:
- Laravel backend skills
- Clean code and OOP principles
- Server-side filtering and pagination
- Data validation without external libraries

---

## 📌 Features

- ✅ Uses the **provided SQLite database** without modification  
- ✅ Categorizes phone numbers by:
  - Country
  - Country code
  - Valid / Not valid state
- ✅ Phone number validation using **regular expressions**
- ✅ **Server-side filtering** by country and validation state
- ✅ **Paginated results** with preserved filters
- ✅ Clean **Bootstrap 5 UI**

---

## 🛠 Tech Stack

- **Laravel 12**
- **PHP 8.2+**
- **SQLite 3**
- **Blade Templates**
- **Bootstrap 5 (CDN)**

---

## 📂 Database

The application uses a **provided SQLite database** file:

```

database/sqlite/sample.db

````

### Table Schema

```sql
customer (
  id INT,
  name VARCHAR(50),
  phone VARCHAR(50)
)
````

> ⚠️ The database is treated as **read-only**.  
> No migrations or schema changes are applied.


## 🧠 Architecture Highlights

*   **Service Layer**  
    All phone number validation and classification logic is encapsulated in a dedicated service:
    app/Services/PhoneNumberService.php

*   **Configuration-driven validation**  
    Country rules are centralized in:
    config/countries.php

*   **Separation of Concerns**
    *   Controllers handle HTTP and pagination
    *   Services handle business logic
    *   Views handle presentation only

***

## 🔍 Filtering

*   Filtering by **country** and **validity state**
*   Displays a friendly message when no results are found

***

## ▶️ Setup Instructions

### 1️⃣ Requirements

*   PHP **8.2+**
*   Composer
*   SQLite extension enabled

### 2️⃣ Installation

```bash
git clone https://github.com/ahmedsafroot/axon-task.git
cd project-folder
composer install
```

### 3️⃣ Environment Configuration

Create a `.env` file:

```env
DB_CONNECTION=sqlite
DB_DATABASE=database/sqlite/sample.db
SESSION_DRIVER=file
```

> File-based sessions are used to avoid modifying the SQLite database.

### 4️⃣ Run the App

```bash
php artisan serve
```

Open:

    http://127.0.0.1:8000

***





