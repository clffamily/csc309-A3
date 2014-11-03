csc309-A3
=========
This is just an initial layout for the assignment:

Taskbar
There should be a consistent taskbar that appears throughout the site that will link to inventory, shopping cart, create an account, and provide user name and password fields. If the user is logged in normally, then additionally, there is a link to the checkout page. If the user is logged in as admin, then there is a link to the admin page in addition to a link to the checkout.

So to be clear, if a user is anonymous they only see links to a shopping cart, inventory, creat and account and there are two input fields, one for username the other for password. If a user is a customer, then instead of the two input fields, and the link to create an account, they get a link to the checkout. If a user is admin, then instead of two input fields, and the link to create an account, they see link to the admin page and checkout.

Pages
1. Welcome Page - this essentially introduces the user to the site. Have some sort of baseball-ish theme or message. All users see the same page.

2. Inventory - see a list of all cards with the ability to adjust quantity and select those that they want to add to their shopping cart. 
3. Shopping Cart - see all items added to the cart. be able to edit quantities, delete items, see total.
4. Checkout - takes/validates credit card info, expiration date, customer profile info (name, address, ... etc.) and then has some printable receipt. In the background the order is then submitted to the database with all personal info and item info.
5. Create an account - takes/validates - unique username, password 6 characters long, address info, this is then added to the database.
6. Admin
a. Admin Inventory - This will look similar to Inventory, but with just image, name, price of cards with links to edit, delete, or add.
i. Edit - A single page to edit the card
ii. Add - A single page with fields for adding a card
b. Display Orders and customer users, with the ability to delete order/customers. I would imagine this to be two seperate lists, and then they have some delete button next to each of them.
