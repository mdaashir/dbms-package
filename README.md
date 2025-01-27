# dbms-package

Full Stack Application for Restaurant using PHP and PostgreSQL

[![PHP Composer](https://github.com/mdaashir/dbms-package/actions/workflows/php.yml/badge.svg?branch=main)](https://github.com/mdaashir/dbms-package/actions/workflows/php.yml)

## Table of Contents
- [Project Overview](#project-overview)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)
- [Functionality](#functionality)
- [Known Issues](#known-issues)
- [Contributing](#contributing)
- [License](#license)

## Project Overview

The **dbms-package** is a full-stack web application designed for restaurant management. It allows users to view menus, manage orders, and provide feedback. The application is built using PHP for the backend and PostgreSQL for the database.

## Features

- User authentication and role management
- Menu management (CRUD operations)
- Cart functionality for users
- Bill generation and management
- Feedback submission from users
- Responsive design for mobile and desktop

## Technologies Used

- **Frontend**: HTML, CSS, Bootstrap, JavaScript
- **Backend**: PHP
- **Database**: PostgreSQL
- **Package Manager**: Composer

## Installation

To set up the project locally, follow these steps:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/mdaashir/dbms-package.git
   ```

2. **Navigate to the project directory**:
   ```bash
   cd dbms-package
   ```

3. **Install the dependencies**:
   ```bash
   composer install
   composer update
   ```

4. **Set up your database**:
   - Create a PostgreSQL database and import the necessary schema and data.

5. **Configure your database connection**:
   - Update the database connection settings in the `inc/connect.inc.php` file.

## Usage

To run the application, use the following command:

```bash
composer start
```

Visit `http://localhost:your_port` in your web browser to access the application.

## Functionality

The application includes the following functionalities:

- **Menu Management**: Admins can add, edit, or delete menu items.
- **User  Management**: Users can register, log in, and manage their profiles.
- **Cart Management**: Users can add items to their cart and proceed to checkout.
- **Bill Management**: Users can view their bills after placing orders.
- **Feedback System**: Users can submit feedback about their experience.

## Known Issues

- Some features are still under development, including:
  - Advanced search functionality for menu items.
  - User profile management enhancements.
  - Improved error handling and validation.

## Contributing

Contributions are welcome! Please follow these steps to contribute:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/YourFeature`).
3. Make your changes and commit them (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature/YourFeature`).
5. Open a pull request.
