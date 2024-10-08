# Laravel Employee Management App

This application is an employee leave request system built using Laravel. With this application, employees can submit leave requests online. 

https://github.com/user-attachments/assets/c49aad2f-79ca-48fe-8904-e11c0e5ca3ad



## Table of Contents

1. [Database Schema](#database-schema)
1. [Setup](#setup)
    - [Composer and NPM Installation](#composer-and-npm-installation)
    - [Environment Configuration](#environment-configuration)
    - [Generate Application Key](#generate-application-key)
    - [Database Migration and Seeding](#database-migration-and-seeding)
    - [Running the Application](#running-the-application)
1. [Routing Information](#routing-information)
1. [Usage](#usage)
    - [Register Credentials](#register-credentials)
    - [Complete User Information](#complete-user-information)
    - [Login Credentials](#login-credentials)
    - [Dashboard](#dashboard)

## Database Schema

### Users

| id       | name   | email | email_verified_at | password | remember_token | birth_place | sex | birth_date | status | join_date | dept | job_title | created_at | updated_at |
| -------- | ------ | ----- | ----------------- | -------- | -------------- | ----------- | --- | ---------- | ------ | --------- | ---- | --------- | ---------- | ---------- |
| BIGINT   | VARCHAR| VARCHAR| TIMESTAMP         | VARCHAR  | VARCHAR        | VARCHAR     | VARCHAR | VARCHAR   | VARCHAR | VARCHAR  | VARCHAR | VARCHAR  |  TIMESTAMP  | TIMESTAMP  |

### Leave Requests

| id            | user_id       | start_date | end_date   | days_requested | created_at | updated_at |
| ------------- | ------------- | ---------- | ---------- | -------------- | ---------- | ---------- |
| BIGINT        | BIGINT        | DATE       | DATE       | INT            | TIMESTAMP  | TIMESTAMP  |

## Setup

### Git Clone

1. Clone the repository:
  ```bash
  git clone git@github.com:ardhisaif/employee-management-app.git
  cd employee-management-app
  ```

### Composer and NPM Installation

2. Install the dependencies:
  ```bash
  composer install
  npm install
  ```

### Environment Configuration

3. Copy the `.env.example` file to `.env`:
  ```bash
  cp .env.example .env
  ```

Update the `.env` file with your MySQL database configuration.

### Generate Application Key

4. Generate the application key:
  ```bash
  php artisan key:generate
  ```

5. Configure your database settings in the `.env` file.


### Database Migration and Seeding

## Migration

Run the database migrations:
```bash
php artisan migrate
```

## Seeding

Seed the database with initial data:
```bash
php artisan db:seed
```

### Running the Application

Run the following command to start the Laravel development server:

```bash
php artisan serve
```

Make sure to run the npm command separately, in another terminal:

```bash
npm run dev
```

Visit `http://localhost:8000` in your browser to see the application.

## Installation

1. Clone the repository:
  ```bash
  git clone git@github.com:ardhisaif/employee-management-app.git
  cd employee-management-app/
  ```

2. Install the dependencies:
  ```bash
  composer install
  ```

3. Copy the `.env.example` file to `.env`:
  ```bash
  cp .env.example .env
  ```

4. Generate the application key:
  ```bash
  php artisan key:generate
  ```

5. Configure your database settings in the `.env` file.

## Migration

Run the database migrations:
```bash
php artisan migrate
```

## Seeding

Seed the database with initial data:
```bash
php artisan db:seed
```

## Running the Application

Start the local development server:
```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser to see the application.

## Routing Information

| Method | Route        | User Type  | Action                          |
| ------ | ------------ | ---------- | ------------------------------- |
| GET    | /            | Guest      | Display the home page.          |
| GET    | /dashboard   | Auth       | Display the dashboard.          |
| GET    | /user-info   | Auth       | Display the user info form.     |
| POST   | /user-info   | Auth       | Store user info.                |
| GET    | /profile     | Auth       | Display the profile edit form.  |
| PATCH  | /profile     | Auth       | Update the profile.             |
| DELETE | /profile     | Auth       | Delete the profile.             |
| POST   | /leave       | Auth       | Submit a leave request.         |
| GET    | /register    | Guest      | Display the registration form.  |
| POST   | /register    | Guest      | Process the registration.       |

## Usage

### Register Credentials

To log in as a regular user, use the following credentials:

-   Email: testing@gmail.com
-   Password: rahasia123

![Register](/demo/register.png)

### Complete User Information

Fill in your complete personal information

![UserInfo](/demo/userInfo.png)

### Login Credentials

To log in as a regular user, use the following credentials:

-   Email: anggameidianto@gmail.com
-   Password: rahasia123

![Login](/demo/login.png)

### Dashboard

The dashboard provides an overview of the user's information and leave management. It includes the following sections:

- **User Information**: Displays the user's personal details such as name, email, department, and job title.
- **Leave Quota**: Shows the total number of leave days allocated to the user for the current year.
- **Leave Balance**: Displays the remaining leave days available for the user.
- **Leave History**: Lists all the leave requests submitted by the user, including the status of each request (approved, pending, or rejected).
- **Leave Request**: Allows the user to submit a new leave request by specifying the start date, end date, and reason for the leave.

![Dashboard](/demo/dashboard.png)

#### Leave Request

![LeaveRequest](/demo/leaveRequest.png)

#### Validation Leave Request

![ValidationLeaveRequest](/demo/validation.png)
