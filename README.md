# Acme Widget Co - Sales System

## Overview

This project implements a sales system for Acme Widget Co using PHP. It supports product management, delivery charges based on order total, and a special offer on red widgets.

## Assumptions

- Products and prices are hardcoded.
- Only one offer is applied (Buy 1 Red Widget, get the second at half price).
- Delivery charges are based on total cost after discounts.

## Running the Project

1. **With Docker**:
   - Build and run the container:
     ```bash
     docker-compose up --build
     ```

2. **Without Docker**:
   - Install dependencies:
     ```bash
     composer install
     ```
   - Run the tests:
     ```bash
     vendor/bin/phpunit
     ```

## Testing

Run the unit tests to validate the basket functionality.
 ```vendor/bin/phpunit --configuration phpunit.xml

## Code Quality

- PHPStan is used for static analysis. Run it with:
  ```bash
  vendor/bin/phpstan analyse


  
