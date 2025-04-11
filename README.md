# Delivery Fee Calculator Service

A simple Laravel service that calculates delivery fees for an e-commerce platform based on destination, weight, and delivery type (standard/express).

## Requirements

- PHP 8.0 or higher
- Composer
- Laravel 10.x or higher

## Installation

1. **Clone the repository**:
   If you haven't cloned the repository yet, run the following command:
   ```bash
   git clone https://github.com/bombadilx/delivery-fee-calculator.git
   cd delivery-fee-calculator
   ```

2. **Install dependencies**:
   Use Composer to install all packages.
   ```bash
   composer install
   ```

3. **You can set up your environment**:
   Copy the `.env.example` file to `.env`:
   ```bash
   cp .env.example .env
   ```

4. **Generate application key**:
   Laravel requires an application key to be set in your `.env` file. Run the following command:
   ```bash
   php artisan key:generate
   ```

## Running the Application

1. **Start the local development server**:
   To run the application locally, use Laravel's built-in server:
   ```bash
   php artisan serve
   ```

   By default, the application will be accessible at `http://localhost:8000`.

2. **Testing the API endpoint**:
   You can test the Delivery Fee API endpoint using tools like Postman or cURL.

   Endpoint: `POST /api/calculate-delivery-fee`

   Example request:
   ```json
   {
     "destination": "kyiv",
     "weight": 3.5,
     "delivery_type": "express"
   }
   ```

   Example response:
   ```json
   {
     "fee": 103.5
   }
   ```

3. **Run tests**:
   You can run the test suite to ensure everything works as expected:
   ```bash
   php artisan test
   ```

## Project Structure

- **app/Services**: Contains the service classes for calculating the delivery fee.
- **app/Strategies**: Contains strategy classes for the different delivery types (standard, express).
- **app/Http/Controllers**: Contains the controller for handling API requests.
- **tests/Feature**: Contains tests for the business logic.
