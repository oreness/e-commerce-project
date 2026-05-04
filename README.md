# E-commerce Project (Laravel SSR)

Semester project e-shop with client storefront and admin zone.

## Tech stack

- Backend SSR: Laravel (PHP)
- Database: MySQL (configured in [.env](.env))
- Frontend: Blade + Bootstrap 5

## Setup

1. Install dependencies
	 - `composer install`
	 - `npm install`
2. Configure environment
	 - copy `.env.example` to `.env` (or use existing `.env`)
	 - set DB credentials
3. Generate key (if needed)
	 - `php artisan key:generate`
4. Run migrations + seeders
	 - `php artisan migrate --seed`
5. Run app
	 - `php artisan serve`

## Seeded admin account

- Email: `admin@electrohub.local`
- Password: `Admin12345!`

## Implemented use cases

### Client part

- Product list from selected category
	- filtering by category, brand, price range
	- ordering by price asc/desc
	- pagination
- Product detail
	- add to cart with quantity
- Full-text search over product name/description
- Cart
	- item list
	- quantity update
	- item removal
	- checkout form with shipping/payment + validation
	- order completion
	- guest checkout supported
	- cart portability for logged-in users (session + DB merge)
- Customer authentication
	- registration, login, logout

### Admin section

- Admin-only access using `is_admin` role flag
- Admin login/logout (standard auth login with admin role check)
- Product list in admin
- Create product
	- name, brand, description, category (select), price
	- upload at least 2 images
- Edit product
	- update attributes
	- upload additional images
	- image list with remove option
- Delete product
	- physical image deletion for uploaded files

## Data model note

Implemented entities include `users`, `categories`, `products`, `product_images`, `carts`, `orders`, `order_items`.

## Design decisions

- Admin role implemented with `users.is_admin` (simple and explicit for course scope).
- Product gallery implemented with separate `product_images` table.
- Legacy `products.image_url` retained as a compatible primary image reference.
- Cart portability implemented by persisting cart JSON for authenticated users and merging on login.