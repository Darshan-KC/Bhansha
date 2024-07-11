## BHANSHA
Bhansha is a resturant management system. In, bhansha we can get all the food items that are available in the resturant.

# BHANSHA

## Project Description
**Bhansha** is a comprehensive restaurant management system designed to streamline the process of managing food items and orders in a restaurant. With Bhansha, users can view and manage all available food items, place orders, and process payments using the eSewa payment gateway.

## Table of Contents
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)

## Features
- **Food Item Management**: Add, update, delete, and view all food items available in the restaurant.
- **Order Management**: Place, update, and track customer orders.
- **Payment Integration**: Seamless payment processing through the eSewa payment gateway.
- **User Authentication**: Secure user authentication and authorization.

## Technologies Used
- **Backend**: Laravel
- **Frontend**: jQuery, HTML, CSS
- **Payment Gateway**: eSewa

## Installation

### Prerequisites
- PHP >= 8.0
- Composer
- Node.js & npm
- MySQL

## Steps / Configuration
1. **Clone the repository:**
   ```bash
   git clone https://github.com/Darshan-KC/bhansha.git
   cd bhansha
   ```

2. **Install Dependencies:**
    ```bash
    composer install
    npm install
    ```

3. **Environment Setup:**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Database migration:**
    ```bash
    php artisan migrate --seed
    ```

5. **Serve the application:**
    ```bash
    php artisan serve
    ```
## Uses
- **Access the application**: Open your browser and navigate to http://localhost:8000 to access Bhansha.
- **Admin Panel**: Use the admin panel to manage food items and view orders.
- **User Interface**: Users can browse food items, place orders, and make payments using eSewa.
