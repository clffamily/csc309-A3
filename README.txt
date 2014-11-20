CSC309-A3


******************************************
**********  CDF accounts:   **************
******************************************
g2jarmst, c4cailio



******************************************
***********   General Info   *************
******************************************
1. AMI ID: ami-faf96992
2. Location within AMI: /var/www/html/estore
3. Browser: Latest version of Chrome or Safari
4. Screen/Window size: 1280 x 800

******************************************
***********   Description   **************
******************************************

1. Catalogue
	This section displays all the products of the shop. The user can either add to cart or remove from cart. The product name, price and description(displayed when mouseover the picture) are displayed.

2. Shopping Cart
	1. Cart Inventory
		The cart inventory will display the products the user selects. The user will be able to modify the quantity of the products in the inventory. The total price will be shown.
	2. Checkout
		The user has to login before checkout. After checking out, an email will be sent to the user email.

3. Create New Account
	Click the button on the task bar and creation process is easy to use. 

4. Admin User
	1. There is an admin user pre-set in the ami.
		*************************************
		*  username:admin password:testing  *
		*************************************
	2. The functionalities of the admin will be visible once the admin user logins in. The admin drop-down menu will show in the taskbar. It contains:
		1. Add products
			Admin can add new products.
		2. Edit products
			Display all products. Admin can modify product information.
		3. Remove orders
			Display all orders. Admin can remove orders.
		4. Remove users
			Display all users. Admin can remove users except self.

5. Email
	Please fill in the email account and password (and other configuration, if not gmail) in the email_helper.php, which is located in estore/application/helpers/email_helper.php.
