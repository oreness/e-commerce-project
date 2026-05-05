# UML Class Diagram

This diagram shows the core application entities and their main relationships.

```mermaid
classDiagram
    class User {
      +id
      +name
      +email
      +is_admin
      +password
    }

    class Category {
      +id
      +name
      +slug
    }

    class Product {
      +id
      +category_id
      +name
      +brand
      +description
      +price
      +image_url
      +primary_image_url
    }

    class ProductImage {
      +id
      +product_id
      +path
      +sort_order
    }

    class Cart {
      +id
      +user_id
      +items
    }

    class Order {
      +id
      +user_id
      +order_number
      +status
      +shipping_name
      +shipping_address
      +shipping_city
      +shipping_method
      +payment_method
      +total_price
    }

    class OrderItem {
      +id
      +order_id
      +product_id
      +quantity
      +unit_price
    }

    Category "1" --> "many" Product : has many
    Product "1" --> "many" ProductImage : has many
    User "1" --> "0..1" Cart : has one
    User "1" --> "many" Order : places
    Order "1" --> "many" OrderItem : contains
    Product "1" --> "many" OrderItem : referenced by
```

## Notes

- `ProductImage` stores the gallery images for each product.
- `Product.primary_image_url` keeps the storefront views compatible with the older single-image setup.
- `Cart.items` is stored as JSON for authenticated users.
