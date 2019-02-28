Alumni Database

******* New Alumni Database Setup *******

1. Unzip the alumni_final.zip file to htdocs folder (For example D:\xampp\htdocs). This will be refered to as the root for the remainder of the document.  
   
2. Create a mySQL database (let us call it as "alumni") and import the structure file alumniDB.sql located in the dataFiles folder of the root directory.  

3. Update the following parameters in the “db_configuration.php” file located in the root directory. 

   
 
   DEFINE('DATABASE_DATABASE', ‘alumni’);
  
   DEFINE('DATABASE_USER', ‘root’);
   
   DEFINE('DATABASE_PASSWORD', ‘’);
	
4. Once the database structure has been created, open a web browser and navigate to the instance of the site, i.e; localhost\root

   There was a default Admin user account created with the import. The credentials are:
   Username: admin@ams.com
   Password: 12345

   Login as the Admin
   On the list view of the alumni tab, click "Register Alumni" to add a new alumni user.
   Go to index.php click the upload button to upload as many images as you'd like and it          will also appear in the carasoul. 

   Then on the alumni tab, click view button to see information about any alumni users and        click update button to upload images or update any information on alumni.
   Look on the navigation bar for Report Alumni to see a grid view of all of the alumni users.
  
   Alumni users can be remove by clicking the "Delete" button in the row the alumni user is       located at to be deleted. 

5. New users can be created by clicking "Login/SignUp" tab and then "sign up". By default the user is created as type "alumni".