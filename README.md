# E-commerce Project

Laravel SSR semester project with a customer storefront and protected admin area.

## Stack

- Backend: Laravel / PHP
- Database: MySQL
- Frontend: Blade + Bootstrap 5

## Setup

1. Install dependencies: `composer install` and `npm install`
2. Copy `.env.example` to `.env` and set database credentials
3. Generate the app key: `php artisan key:generate`
4. Create tables and seed demo data: `php artisan migrate --seed`
5. Run the app: `php artisan serve`

## Demo account

- Admin email: `admin@electrohub.local`
- Admin password: `Admin12345!`

## Main features

### Storefront

- Product catalog with category, brand, and price filters
- Sorting by price ascending or descending
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

- Admin access uses a boolean role flag for simplicity.
- Product galleries use a separate table so a product can have multiple images.
- The cart is stored in session for guests and synced to the database for logged-in users.
- Orders are stored separately from carts so checkout history stays available.

## Submission notes

- Keep `.env` out of the repository; use `.env.example` as the template.
- Put screenshots in [screenshots/](screenshots) and include the storefront, cart, checkout, account, orders, and admin pages.
- Include the UML diagram in [UML_CLASS_DIAGRAM.md](UML_CLASS_DIAGRAM.md); export it as an image only if your teacher specifically asks for that format.

