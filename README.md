# E-Commerce Project (E-Shop)

A semestral Laravel e-commerce application for an electronics store.

---

## Tech Stack

| Layer    | Technology |
|----------|------------|
| Backend  | PHP 8.3, Laravel 12 |
| Database | PostgreSQL 16 |
| Frontend | Bootstrap 5.3, Blade templates |
| Storage  | Laravel public disk (images) |

---

## Local Setup

### 1. Clone & install dependencies
```bash
git clone <repo-url> e-commerce-project
cd e-commerce-project
composer install
npm install
```

### 2. Environment
```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` and set your PostgreSQL credentials:
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=eshop
DB_USERNAME=your_user
DB_PASSWORD=your_password
```

### 3. Database
```bash
# Create the database first (psql or pgAdmin), then:
php artisan migrate
php artisan db:seed
```

Default seeded accounts:

| Role  | Email           | Password |
|-------|-----------------|----------|
| Admin | admin@eshop.com | password |
| User  | user@eshop.com  | password |

### 4. Storage link
```bash
php artisan storage:link
```

### 5. Run
```bash
php artisan serve
```

---

## Project Structure

```
app/
  Http/
    Controllers/
      ProductController.php          # Client: listing, detail, search
      CartController.php             # Client: cart & checkout
      Auth/AuthController.php        # Register / login / logout
      Admin/ProductController.php    # Admin: product CRUD
    Middleware/
      AdminMiddleware.php            # Protects /admin/* routes
  Models/
    User.php          # is_admin flag, relationships
    Category.php
    Product.php       # scopeSearch, relationships
    ProductImage.php
    Cart.php          # getTotal(), resolves guest/user cart
    CartItem.php
    Order.php
    OrderItem.php
database/
  migrations/         # All table schemas (see below)
  seeders/            # Sample categories, products, admin user
resources/
  views/
    layouts/app.blade.php            # Bootstrap layout with navbar
    welcome.blade.php                # Homepage
    products/index.blade.php         # Product listing + filters
    products/show.blade.php          # Product detail + add-to-cart
    products/search.blade.php        # Full-text search results
    cart/index.blade.php             # Cart view
    cart/checkout.blade.php          # Checkout form
    auth/login.blade.php
    auth/register.blade.php
    admin/products/index.blade.php
    admin/products/create.blade.php
    admin/products/edit.blade.php
    admin/products/_form.blade.php   # Shared product form partial
routes/web.php        # All routes (client + admin)
```

---

## Database Schema

```
users              — id, name, email, password, is_admin, phone, address
categories         — id, name, slug, description
products           — id, category_id, name, slug, description, price, stock, brand, color, is_active
product_images     — id, product_id, path, is_primary, sort_order
carts              — id, user_id (nullable), session_token (nullable, for guests)
cart_items         — id, cart_id, product_id, quantity
orders             — id, user_id (nullable), first_name, last_name, email, phone, address,
                     city, postal_code, transport, payment, total, status
order_items        — id, order_id, product_id, product_name, unit_price, quantity
```

---

## Routes

| Method | URI | Name | Description |
|--------|-----|------|-------------|
| GET | `/` | `home` | Homepage |
| GET | `/search` | `products.search` | Full-text product search |
| GET | `/category/{slug}` | `products.index` | Product listing (filter/sort/paginate) |
| GET | `/category/{slug}/{product}` | `products.show` | Product detail |
| GET | `/cart` | `cart.index` | Shopping cart |
| POST | `/cart/add/{product}` | `cart.add` | Add to cart |
| PATCH | `/cart/update/{item}` | `cart.update` | Update qty |
| DELETE | `/cart/remove/{item}` | `cart.remove` | Remove item |
| GET | `/cart/checkout` | `cart.checkout` | Checkout form |
| POST | `/cart/checkout` | `cart.place-order` | Place order |
| GET | `/register` | `register` | Registration form |
| POST | `/register` | — | Handle registration |
| GET | `/login` | `login` | Login form |
| POST | `/login` | — | Handle login |
| POST | `/logout` | `logout` | Logout |
| GET | `/admin/products` | `admin.products.index` | Admin product list |
| GET | `/admin/products/create` | `admin.products.create` | New product form |
| POST | `/admin/products` | `admin.products.store` | Create product |
| GET | `/admin/products/{id}/edit` | `admin.products.edit` | Edit form |
| PUT | `/admin/products/{id}` | `admin.products.update` | Update product |
| DELETE | `/admin/products/{id}` | `admin.products.destroy` | Delete product |
| DELETE | `/admin/products/{id}/images/{img}` | `admin.products.images.destroy` | Delete image |

---

## What's Left to Implement

All controllers have stubbed methods with `// TODO` comments guiding the implementation.
Below is the full checklist of work remaining:

### Client — Product Listing (`ProductController::index`)
- [ ] Build Eloquent query with `when()` for filters (brand, color, price range)
- [ ] Apply sort order (price asc/desc, name, newest)
- [ ] Paginate with `paginate(12)`
- [ ] Pass `$categories`, `$brands`, `$colors` to view for filter dropdowns
- [ ] Uncomment and wire up `products/index.blade.php`

### Client — Product Detail (`ProductController::show`)
- [ ] Load product with `images` and `category`
- [ ] Uncomment `products/show.blade.php`

### Client — Search (`ProductController::search`)
- [ ] Use `Product::search($request->q)` scope, paginate
- [ ] Uncomment `products/search.blade.php`

### Client — Cart (`CartController`)
- [ ] Implement `resolveCart()` (guest session token vs. auth user)
- [ ] Implement `add`, `update`, `remove`, `checkout`, `placeOrder`
- [ ] On `placeOrder`: validate delivery data, create `Order` + `OrderItems`, clear cart
- [ ] Uncomment `cart/index.blade.php` and `cart/checkout.blade.php`

### Client — Auth (`Auth\AuthController`)
- [ ] Implement `register`, `login`, `logout`
- [ ] Implement `mergeGuestCart()` — on login, find guest cart by session token and reassign to user (or merge items)
- [ ] Uncomment views

### Admin — Products (`Admin\ProductController`)
- [ ] Implement all CRUD methods (comments present in every method)
- [ ] Validate that at least 2 images are uploaded on create
- [ ] Store images using `Storage::disk('public')`, delete physically on remove
- [ ] Uncomment admin views and wire `_form.blade.php` category dropdown

### Homepage
- [ ] Create a `HomeController` that passes `$categories` to `welcome.blade.php`
- [ ] Add featured products section

### Navigation
- [ ] Add category links to navbar
- [ ] Show cart item count badge

### Validation
- [ ] Add Form Request classes for cleaner validation (optional but recommended)

---

## Key Design Decisions

**Cart portability**: Guests get a UUID cart token stored in the session. On login/register, `mergeGuestCart()` finds the guest `Cart` by that token and either reassigns it to the user or merges items into the user's existing cart.

**Admin protection**: The `admin` middleware alias (`AdminMiddleware`) checks `user->isAdmin()` and aborts with 403 otherwise. All `/admin/*` routes require `['auth', 'admin']`.

**Image storage**: Images are stored in `storage/app/public/products/` and served via the public symlink. Physical deletion is done in `destroyImage` and `destroy` via `Storage::disk('public')->delete()`.

**Search**: The `Product::scopeSearch()` uses PostgreSQL `ILIKE` for case-insensitive matching across `name`, `description`, and `brand`.
