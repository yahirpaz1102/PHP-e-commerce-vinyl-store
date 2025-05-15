

# 🎵 Laravel E-Commerce Shopping Cart - Vinyl Store

This is a web-based e-commerce shopping cart application built using **Laravel (PHP)** and **PostgreSQL**. The store focuses on selling **record vinyls** and includes full product management, shopping cart functionality, and checkout process. An **admin provider account (ID = 1)** manages products, while regular users can register, log in, and purchase vinyls.

## 📦 Features

### ✅ Product Management (Provider Only)
- Add, edit, and delete vinyl products
- Manage:
  - SKU
  - Album name
  - Description
  - Price
  - Cover image
  - Audio snippet (preview)
- Admin panel for managing products

### 🛒 Shopping Cart (Customer)
- Browse all available vinyls (Product Listing Page)
- View detailed product information (Product Detail Page)
- Add vinyls to the cart
- Update quantity or remove items from the cart
- One cart per user session

### 🧾 Checkout & Orders
- Collects basic shipping information
- Creates an order from the current cart
- Empties the cart after checkout
- Displays user’s past orders (Order Listing Page)


## 🛠 Technologies Used

- **PHP** (Laravel 10)
- **PostgreSQL**
- **Blade Templates** for frontend
- **Laravel Eloquent ORM**
- **Laravel Seeders** for initial data
- **Bootstrap** (or your chosen CSS framework)


