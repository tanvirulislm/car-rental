# Car Rental Web Application

## Project Overview
This is a Car Rental Web Application built using **Laravel** as part of the Final Exam Week Assignment. The application allows users to browse available cars, make bookings, and view their rental history. It includes an **Admin Dashboard** for managing cars, rentals, and customers, and a **Frontend** interface for user interactions. The system supports role-based access control, email notifications for rentals, and a robust database design.

## Features

### Admin Dashboard
- **Manage Cars**: Add, edit, and delete car details (Name, Brand, Model, Year, Car Type, Daily Rent Price, Availability, Image).
- **Manage Rentals**: View and manage (CRUD) all rentals, including Rental ID, Customer Name, Car Details, Start/End Dates, Total Cost, and Status (Ongoing, Completed, Canceled).
- **Manage Customers**: View and manage (CRUD) customer details (Name, Email, Phone Number, Address, Rental History).
- **Dashboard Overview**: Displays statistics like total cars, available cars, total rentals, and total earnings.

### Frontend (User Interface)
- **Browse Cars**: View available cars with filters for car type, brand, and daily rent price.
- **Make a Booking**: Select a car, choose rental dates, and book it (ensures car availability for the selected period).
- **Manage Bookings**: Logged-in users can view current/past bookings and cancel bookings (if not started).
- **User Authentication**: Sign up, log in, and log out functionality with protected routes using middleware.

### Email System
- Sends rental details to the customer's email upon booking.
- Notifies the admin via email when a car is rented, including customer details.

### Technical Details
- **Framework**: Laravel
- **Database**: MySQL with tables for `users`, `cars`, and `rentals` as specified.
- **Controllers**:
  - Admin: `CarController`, `RentalController`, `CustomerController`
  - Frontend: `PageController`, `CarController`, `RentalController`
- **Models**:
  - `User`: Includes `isAdmin()`, `isCustomer()`, and `rentals()` (hasMany).
  - `Car`: Includes `rentals()` (hasMany).
  - `Rental`: Includes `car()` (belongsTo) and `user()` (belongsTo).
- **Payment**: By Cash mode (no payment system implemented).

## Database
The database schema includes:
- **users**: id, name, email, password, role, created_at, updated_at
- **cars**: id, name, brand, model, year, car_type, daily_rent_price, availability, image, created_at, updated_at
- **rentals**: id, user_id, car_id, start_date, end_date, total_cost, created_at, updated_at

The database SQL file is included in the project's main directory as `database.sql`.

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/tanvirulislm/car-rental.git
   ```
2. Navigate to the project directory:
   ```bash
   cd car-rental
   ```
3. Install dependencies:
   ```bash
   composer install
   npm install
   ```
4. Copy the `.env.example` file to `.env`:
   ```bash
   cp .env.example .env
   ```
5. Configure the `.env` file with your database and mail server settings.
6. Generate an application key:
   ```bash
   php artisan key:generate
   ```
7. Run migrations and seed the database:
   ```bash
   php artisan migrate --seed
   ```
8. Start the development server:
   ```bash
   php artisan serve
   ```
9. Access the application at `http://localhost:8000`.

## Project Presentation
A video demonstrating all functionalities of the application (within 3-3.5 minutes) is available here:  
[Insert Google Drive Link to Presentation Video]

## Database SQL File
The `database.sql` file is located in the project's main directory. It contains the database schema and sample data for testing.

## Folder Structure
The repository contains only Laravel's standard folders and files, as per the guidelines. Refer to the [demo image](https://drive.google.com/file/d/1HNlQr9zixCLHealyqQLbftPg88G18Suu/view) for the expected structure.

## Notes
- Ensure you have PHP, Composer, and Node.js installed.
- The email system requires a configured mail driver in the `.env` file (e.g., SMTP, Mailtrap).
- Routes are protected using Laravel middleware to ensure only authenticated users can access booking-related features.
- The project adheres to the specified naming conventions for controllers, models, and database tables.
