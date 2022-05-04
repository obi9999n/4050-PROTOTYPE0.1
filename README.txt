database info:
	- users table: 
		- user_type: 
			- customer: 0 
			- admin: 1
			- vendor: 2
	- orders table:
		in_store: 0 - online; 1 - in-store
		fulfilled: 0 - not fulfilled; 1 - fulfilled. vendor changes flag using manage inventory.
		
in order to run:
	- download and start XAMPP
	- download the folder and put it in htdocs folder of XAMPP
	- go to 'localhost:8080/phpmyadmin' and create a database called 'project'
	- in your new database called 'project', drag the 'project.sql' file into 'project' database and refresh
	- then, type in 'http://localhost:8080/4050-PROTOTYPE0.1/home.php' to get to the home page
	- in order to see logins, just go to the users table or create your own account
	- for registration code from signup page, the code will not be sent to your email, the code will be in the link of the registration page

note:
	- can only access certain pages with certain accounts
		- for example:
			- a user with user_type 0 will not have access to admin.php, vendor.php, etc.
			- a user with user_type 1 will have access to everything as they are admin
			- a user with user_type 2 will not have access to admin.php
	- emails do not send as we had errors trying to figure it out
	- credit/debit card information is not saved
	- cart is not real, orders will not be fufilled
