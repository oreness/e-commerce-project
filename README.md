# E-commerce Project

Laravel SSR semester project with a customer storefront and protected admin area.

## Stack

- Backend: Laravel / PHP
- Database: MySQL
- Frontend: Blade + Bootstrap 5

## Programming environment

- Development environment: Linux workstation with the standard Laravel toolchain.
- Dependencies were installed through Composer and npm.
- The project was developed as a Laravel Blade SSR application.

## Setup

1. Install dependencies: `composer install` and `npm install`
2. Copy `.env.example` to `.env` and set database credentials
3. Generate the app key: `php artisan key:generate`
4. Create tables and seed demo data: `php artisan migrate --seed`
5. Run the app: `php artisan serve`

## Demo account

- Admin email: `admin@electrohub.local`
- Admin password: `Admin12345!`

## Phase 1 → Phase 2 justification

Phase 1 contained a broader e-commerce data model with `ProductAttribute`, `Review`, `Wishlist`, richer user fields, and product-specific fields such as `stock_quantity` and `specs`. For phase 2, the implementation was narrowed to the rubric requirements so the final project is easier to defend, easier to test, and focused on the marked functionality.

### What changed and why

- `User` was simplified to `name`, `email`, `is_admin`, and `password` because phase 2 only needs a customer/admin distinction, not a full role/permission system.
- `Product` was simplified to the fields needed for the storefront and admin flows: category, brand, description, price, and images.
- `ProductImage` was kept as a separate table so the admin can upload multiple images and delete individual images physically.
- `Cart` was added because phase 2 explicitly requires cart portability for guests and logged-in users.
- `Order` and `OrderItem` remain because checkout and order history are part of the client flow.
- `ProductAttribute`, `Review`, and `Wishlist` were not carried forward because they are outside the phase 2 rubric and would add complexity without earning points.
- `stock_quantity` and `specs` were left out because the phase 2 checklist does not require inventory management or attribute-rich product specs.

## Main features

### Storefront

- Product catalog with category, brand, and price filters
- Sorting by price ascending or descending
- Pagination on catalog and admin list pages
- Product detail page with image gallery and add-to-cart form
- Search by product name or description
- Cart with update and remove actions
- Checkout flow with shipping and payment validation
- Guest checkout support
- Cart persistence for logged-in users

### Admin

- Admin-only access via `is_admin`
- Product list, create, edit, and delete
- Multiple images per product with image removal
- Minimum two images required for new products

## Rubric mapping

### Client section

- Product list, filtering, sorting, and pagination
- Product detail with gallery and add-to-cart
- Search results page
- Cart update/remove and checkout flow
- Guest checkout and account login/logout

### Admin section

- Admin access protection
- Admin product listing
- Product creation with categories and multiple images
- Product editing and image management
- Product deletion with file cleanup

### Documentation

- Project description
- Database schema summary
- Design decisions and setup notes
- Screenshot list

## Database schema

- `users` — authentication and admin flag
- `categories` — product categories
- `products` — catalog items
- `product_images` — gallery images per product
- `carts` — saved carts for logged-in users
- `orders` — customer orders
- `order_items` — products per order

## Design decisions

- Admin access uses a boolean role flag for simplicity instead of a more complex permission package.
- Product galleries use a separate table so a product can have multiple images.
- The cart is stored in session for guests and synced to the database for logged-in users.
- Orders are stored separately from carts so checkout history stays available.

## Key use cases to explain

### 1. Login, registration, logout

The authentication flow is handled by the controllers under `app/Http/Controllers/Auth/`. Registration creates the user, login starts the session, and logout ends it.

### 2. Searching the catalog

The search form sends a `GET` request to the catalog controller. The controller checks `search`, `category`, `brand`, `min_price`, `max_price`, and `sort`, then returns paginated results.

### 3. Adding a product to the cart

The product detail page submits the selected quantity to the cart controller. The controller stores the product in session and, if the user is logged in, saves the cart to the database as well.

### 4. Changing quantity in the cart

The cart view sends a `PATCH` request with the new quantity. The controller updates the session data, recalculates totals, and syncs the result for authenticated users.

### 5. Pagination and basic filtering

The product catalog uses Laravel pagination and keeps query parameters in the links. Filtering by category, brand, price, and sort order happens in the same controller method.

### 6. Checkout and order creation

Checkout validates shipping and payment data, creates the order, creates order items, and clears the cart after the order is placed.


## Screenshots

Screenshots are already present in [screenshots/](screenshots) for:

- Homepage
- Product list
- Product detail
- Shopping cart
- Checkout
- Order confirmation
- Account
- Orders
- Admin products
- Admin create/edit form



