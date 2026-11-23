#  Art Gallery | E-Commerce Web Application

A full-stack e-commerce web application developed using **PHP, MySQL, JavaScript, HTML, and CSS**, designed to provide an online platform for showcasing, browsing, and purchasing artworks.

The platform enables artists to display their creations and allows customers to explore artworks across different categories, manage shopping carts, and place orders. An administrative interface supports artwork, category, and order management.

## Key Features

### User Features
- **User Registration & Login:** Account creation and session-based authentication.
- **Artwork Catalogue:** Browse available artworks across different categories.
- **Artwork Details:** View individual artwork information.
- **Shopping Cart:** Add artworks to the cart and manage selected items.
- **Checkout System:** Place orders through a dedicated checkout workflow.
- **Order Processing:** Store customer orders and purchase details in the database.

### Admin Features
- **Admin Dashboard:** Manage core application operations.
- **Artwork Management:** Add, update, view, and delete artwork listings.
- **Category Management:** Organize artworks into categories.
- **Order Management:** View and manage customer orders.
- **Database Management:** Perform CRUD operations on application data.

## Technology Stack

| Category | Technologies |
|---|---|
| Frontend | HTML5, CSS3, JavaScript |
| Backend | PHP |
| Database | MySQL |
| Web Server | Apache |
| Development Environment | XAMPP / WAMP |
| Version Control | Git & GitHub |

## Application Workflow

1. **User Registration:** New customers create an account to access the platform.
2. **Artwork Exploration:** Users browse available artworks organized by category.
3. **Product Selection:** Customers view artwork details and add items to their cart.
4. **Cart Management:** Users review their selections before proceeding to checkout.
5. **Order Placement:** Customer and order details are processed and stored in MySQL.
6. **Administration:** Administrators maintain artwork listings, categories, and orders.

## Installation & Setup

### Prerequisites

Ensure the following are installed:

- XAMPP or WAMP Server
- PHP
- MySQL
- Git
- A modern web browser

### Step 1: Clone the Repository

```bash
git clone https://github.com/edwin007-dev/art-gallery.git
```

### Step 2: Move the Project

For XAMPP, place the cloned project inside:

```text
C:\xampp\htdocs\art-gallery
```

For WAMP, use its configured `www` directory.

### Step 3: Start the Server

Open the XAMPP or WAMP control panel and start:

- Apache
- MySQL

### Step 4: Configure the Database

1. Open `http://localhost/phpmyadmin`.
2. Create a database matching the project's configuration.
3. Import the project's `.sql` database file, if provided.
4. Locate the project's PHP database connection configuration.
5. Update the database hostname, username, password, and database name as required.

### Step 5: Run the Application

Open your browser and navigate to:

```text
http://localhost/art-gallery/
```

Adjust the URL if your project folder or entry point uses a different name.

🗄️## Database Integration

The application uses **MySQL** for persistent data storage and PHP for server-side database operations.

The database supports:
- User account information
- Artwork and category records
- Shopping cart operations
- Customer orders and order details
- Administrative operations

🎯## Project Objectives

- Develop a functional e-commerce application using core web technologies.
- Implement backend functionality using PHP and MySQL.
- Design relational database structures for customer, artwork, and order management.
- Build authentication, shopping cart, and checkout workflows.
- Gain practical experience in CRUD operations, session management, and full-stack web development.

## What I Learned

Through this project, I gained hands-on experience in:

- Server-side web development using PHP
- Relational database design and SQL queries
- Connecting PHP applications with MySQL
- Implementing user authentication and session handling
- Managing shopping cart and checkout operations
- Building administrative CRUD functionality
- Understanding full-stack application architecture

## Future Enhancements

- Online payment gateway integration
- Advanced artwork search and filtering
- Customer reviews and ratings
- Wishlist functionality
- Improved mobile responsiveness
- Enhanced order tracking and notifications

## Author

**[Edwin Benson](https://github.com/edwin007-dev)**

BCA Graduate | Software Developer

Developed as an academic project to demonstrate practical knowledge of full-stack web development, database management, and e-commerce application workflows.

---

⭐ If you find this project useful, consider giving the repository a star!
