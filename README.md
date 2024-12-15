# Laravel Project Setup

Follow the steps below to set up and run this Laravel application.

## Requirements
- PHP >= 8.2
- Composer
- MySQL or any supported database

---

## Installation Steps

1. **Clone the Repository**
   ```bash
   git clone https://github.com/rajentrivedi/school-management.git
   cd school-management
   ```
2. **Install the Application Dependencies**
      ```bash
      composer install
      ```
2. **Copy the `.env` file**
   ```bash
   cp .env.example .env
   ```

3. **Generate the Application Key**
   ```bash
   php artisan key:generate
   ```

4. **Update Database Credentials**
   - Open the `.env` file and update the following database settings:
     ```dotenv
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_database_user
     DB_PASSWORD=your_database_password
     ```

5. **Run Migrations and Seeders**
   ```bash
   php artisan migrate --seed
   ```

6. **Start the Development Server**
   ```bash
   php artisan serve
   ```

7. **Access the Application**
   - Admin Panel: http://localhost:8000/admin
   - Admin Credentials: admin@school.com / AdminPassword123!
   - Teacher Panel: http://localhost:8000/teacher
   - Teacher Credentials: teacher@school.com / TeacherPassword123!

---

