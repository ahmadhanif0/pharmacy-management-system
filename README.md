# Complete pharmacy management system

# Features

1. Dashboard
2. Categories
3. Products
    > Products
    > Add Product
    > Out-Stock
    > Expired
4. Purchase
    > Purchase
    > Add Purchase
5. Sales
6. Returns
    > Returns
    > Select Sale
7. Exchanges
    > Exchanges
    > Select Sale
8. Supplier
    > Supplier
    > Add Supplier
9. Reports
    > Reports
10. Access Control
    > Permissions
    > Roles
11. Users
12. Profile
13. Settings (Application settings)
14. Logout (Button in the end of sidebar)
15. Application backup
16. Stock notifications

## 🛠️ Tech Stack

- **Backend**: Laravel
- **Frontend**: Blade, Bootstrap, JavaScript
- **Database**: MySQL
- **Email Service**: Mailtrap / Gmail
- **Auth**: Laravel Breeze / Laravel UI (depending on implementation)





## 🧪 Setup Instructions

### 1. Clone the repo
```
https://github.com/ahmadhanif0/pharmacy-management-system.git

```
2. Go to project directory

```
cd Pharmacy-management-system

```

3. Install dependencies

```
composer install
npm install && npm run dev

```
5. Create your database 

6. Rename .env.example to .env Or copy it and paste at project root directory and name the file .env You can also use this command.

```
cp .env.example ./.env

```
7. Generate app key with this command
```
php artisan key:generate

```

8. Set database connection to your database in the .env file.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=

```
9. Import full database sql file in the database folder, or run migrations
Use this command to run migrations

```
php artisan migrate --seed

```
10. Start the local server and browser to your app.
This command will start the development server
```
php artisan serve

```

11. Open the address in the terminal in your browser.Usually address is usually like this:
```
http://127.0.0.1:8000

```
12. Enjoy and make sure to star the repo :).Report bugs,features and also send your pull requests.

# admin login credentials

```
 email: admin@gmail.com
 password: admin1
```

📘 Usage Guide
This section explains how to use the key modules in the Pharmacy Management System.

👤 Profile
Each user has a personal profile page.

Click the Edit button to update your name, email, or other details.

To change your password, go to the Password tab. Enter your current password followed by your new password and confirm it.

👥 Users
View a list of all registered users.

Add a new user by clicking the Add User button.

Edit user details by clicking the Edit button next to a user.

Delete a user using the Delete button.

Export or print user data using the Export Data dropdown menu.

🔐 Access Control
Manage user roles and permissions from this section.

Each user is assigned a role, and each role has specific permissions.

Create a new role by clicking Add Role, entering a name, and selecting the desired permissions.

You can also edit or delete existing roles as needed.

🚚 Suppliers
Displays a list of all your product suppliers.

Add a new supplier via the Add Supplier button (also available in the sidebar).

Edit supplier details using the Edit button.

Remove suppliers with the Delete button.

💵 Sales
Shows all sales records within the system.

Add a new sale by clicking the Add Sale button.

Delete a sale using the Delete button.

Export or print sales data using the Export Data dropdown at the top of the page.

🛒 Purchases
View all product purchases — the core of your inventory system.

Add a purchase via the Add New button or from the sidebar.

Fill out the form with purchase details and submit.

Edit purchases using the Edit button.

Delete purchases with the Delete button.

Export or print purchase data via the Export Data dropdown menu.

📦 Products
Contains a list of all products currently in your inventory.

Add new products via the Add Product button on the page or from the sidebar.

Update product details using the Edit button.

Delete products using the Delete button.

🔴 Out of Stock
Automatically lists all products with zero quantity (not updated after being sold).

No need to manually add or delete — the system tracks these automatically.

Export or print out-of-stock data if needed.

⚠️ Expired Products
Automatically lists all products past their expiry date.

No manual action is required — the system moves expired products here.

You can also export or print this list.

🗂️ Categories
Manage product categories from this section.

Add new categories using the Add Category button.

Edit existing categories using the Edit button.

Remove categories with the Delete button.

<p>
<img width="934" height="549" alt="login" src="https://github.com/user-attachments/assets/71dc26a5-9bf9-4ee9-b0ae-dd56d7d83819" />
<img width="1349" height="615" alt="Dashboard" src="https://github.com/user-attachments/assets/f37b7fc0-4c3d-4a8f-b555-590bdc4fe749" />
<img width="1349" height="615" alt="All Products" src="https://github.com/user-attachments/assets/44fd4712-e6d3-4ab4-9914-798d5df73c06" />
<img width="1349" height="615" alt="All Sales" src="https://github.com/user-attachments/assets/475ca425-2683-420e-93b2-9360cd5c0ebf" />
</p>


## 📄 License

This project is open-source. You can modify it for academic or personal use.

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
