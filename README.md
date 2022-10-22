<h3>Customer and admin</h3>
Creating dashboard to admin to see the customers that have been registered and can delete or update or deactivate their account. Customer can register and login but if the admin deactivate his account he can't login.

<h3>What has been done</h3>
1-Make authentication for both admin and customer by using laravel/ui package each one has his own guard by adding guards in config/auth.php <br>
2-Use Authenticate.php and RedirectIfAuthenticated.php middlewares. <br>
3-Make the routes according to the authentication of every role. <br>
4-For admin authentication, admin can login, update, delete, activated and deactivate customers account. <br>
5-For customer authentication, customer can register and see his data. <br>
6-If you try to open any link while you aren't logged in so you will be redirected to the log in page. <br>
7-If customer try to log in while the admin deactivated his account, customer will be notified that his account is deactivated. <br>
8-Make migration for admin and customer.
9-Use seeders to add random data for customer and admin data. <br>
10-You can be log out in any role. <br>
11-There is middleware to prevent get back to log in page if you are logged in. <br>

<h3>Admin credentials</h3>
Email: admin@admin.com <br>
Password: admin123
