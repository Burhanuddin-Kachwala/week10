# BookSaw - E-commerce Bookstore

BookSaw is a feature-rich e-commerce platform built with Laravel, designed for selling books online. It provides user authentication, book browsing, order management, and admin functionalities to manage the store efficiently.

## 🚀 Technologies Used
- **Backend**: Laravel (PHP Framework)
- **Frontend**: Blade Templates, Tailwind CSS, jQuery
- **Database**: MySQL
- **Other Tools**: AJAX, JavaScript, Composer, Laravel Artisan, Mailosaur

## 📦 Installation Steps

### Prerequisites:
Ensure you have the following installed:
- PHP (>=8.0)
- Laravel (>=12)
- Composer
- MySQL
- Node.js & NPM (for frontend assets)

### Steps to Install and Run:

1. **Clone the Repository**
   ```sh
   git clone https://github.com/Burhanuddin-Kachwala/week10.git
   cd booksaw
   ```

2. **Install Dependencies**
   ```sh
   composer install
   npm install
   ```

3. **Setup Environment**
   - Copy the `.env.example` file to `.env`:
     ```sh
     cp .env.example .env
     ```
   - Generate the application key:
     ```sh
     php artisan key:generate
     ```

4. **Configure Database**
   - In `.env`, update the following with your database details:
     ```env
     DB_DATABASE=booksaw_db
     DB_USERNAME=root
     DB_PASSWORD=yourpassword
     ```
   - Run migrations and seed the database:
     ```sh
     php artisan migrate --seed
     ```

5. **Run the Application**
   ```sh
   composer run dev
   ```
   or

   ```sh
   php artisan serve
   ```
   
  
   The project will be accessible at `http://127.0.0.1:8000/`

6. **Compile Assets (If Needed)**
   ```sh
   npm run dev
   ```

## 📧 Setting Up Mailosaur for Email Testing
Mailosaur is used for email testing in the application.

1. **Create a Mailosaur Account**
   - Sign up at [Mailosaur](https://mailosaur.com/) and create a new project.

2. **Update Environment Variables**
   - In `.env`, add the following Mailosaur settings:
     ```env
     MAIL_MAILER=smtp
     MAIL_HOST=smtp.mailosaur.net
     MAIL_PORT=587
     MAIL_USERNAME=your-mailosaur-server-id
     MAIL_PASSWORD=your-mailosaur-api-key
     MAIL_ENCRYPTION=tls
     MAIL_FROM_ADDRESS=no-reply@yourdomain.com
     MAIL_FROM_NAME="BookSaw"
     ```

3. **Test Email Sending**
   - Run the Laravel queue worker:
     ```sh
     php artisan queue:work
     ```
   - Send a test email using:
     ```sh
     php artisan tinker
     >>> Mail::raw('This is a test email', function ($message) {
     >>>     $message->to('test@yourmailosaurserver.mailosaur.net')->subject('Test Email');
     >>> });
     ```

4. **Verify Emails in Mailosaur Dashboard**
   - Log in to your Mailosaur account and check the inbox of your test server.

## 🎯 Features
- User authentication (login, register, reset password)
- Browse books by categories
- Add books to cart and checkout
- Order management for users and admins
- Admin panel to manage books, orders, and users
- Email testing with Mailosaur

---
**Note**: Ensure proper permissions for the `storage` and `bootstrap/cache` directories:
```sh
chmod -R 777 storage bootstrap/cache
```

Enjoy using **BookSaw**! 📚

