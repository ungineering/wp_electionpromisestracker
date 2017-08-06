# wp_electionpromisestracker

## Setup Guide

Here are the steps to setup EPT on your local (this one is for Linux):

1. Clone the GIT repository from: git@github.com:ungineering/wp_electionpromisestracker.git
   I preferably do it in my home folder. This becomes your local repository.

2. Create a new folder with the name electionpromisestracker (or anything you feel like) inside your web development folder (which is generally /var/www/html). This is your development folder. Here we assumed that you have apache (or an equivalent web server) is installed in your system.

3. Copy the entire code from your local repository to the development folder you created in step 2.
   NOTE: Some people may clone the repository directly in the development folder and may have the local repository and the development folder as the same. But I prefer otherwise. It helps me visualize the changes done by others in the team and let me do less mistakes in overwriting those changes.

4. Setting local DNS. Map www.electionpromisestracker.in to point to your own machine. 
   Open the file - /etc/hosts
   Add the following as the first line in the file:
   127.0.0.1  www.electionpromisestracker.in
   NOTE: By doing this, whenever you will open www.electionpromisestracker.in on your browser you will get the local version of the website. To get the original website, you will have to comment this line in the hosts file by putting a # at the beginning (#127.0.0.1  www.electionpromisestracker.in). We could have used some other domain name also to avoid this swapping. But since there are a few things in Wordpress which are very domain specific, using some other domain name may not open those things as expected.

5. Set virtual host:
  Go to the folder - /etc/apache2/sites-enabled
  Create a new file with the name - ept.conf
  Add the following content in the file:
    <VirtualHost *:80 >
        AllowEncodedSlashes On
        ServerAdmin your@email.com
        ServerName www.electionpromisestracker.in
        DocumentRoot /var/www/html/electionpromisestracker/
        <Directory /var/www/html/electionpromisestracker/>
            AllowOverride All
            Options FollowSymLinks
        </Directory>
        CustomLog /var/log/apache2/ept/access.log common
        ErrorLog /var/log/apache2/ept/error.log
    </VirtualHost>

6. Create the log folder:
  Go to the folder - /var/log/apache2
  Create a folder with the name - ept

7. Restart Apache
  sudo service apache2 restart

8. Create Database:
  We have a backup of the database stored along with our codebase in the git repository with the name ept.sql. You will find it in the root folder itself.
  First, create a new database with the name ept.
  Then import the mentioned database file. You can do so from your terminal with the following command: 
  mysql -u username -p ept < ept.sql
