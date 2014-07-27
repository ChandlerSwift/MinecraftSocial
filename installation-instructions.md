Installation Instructions: MinecraftSocial
==========================================

### Prerequisites: ###

* Web Server with LAMP stack or similar. MinecraftSocial requries MySQL, PHP,
  and a web server like Apache.
* Please, please, please, get an HTTPS certificate! All the secure coding we
  can do will be for nothing protecting your users if you transmit their password
  information in plaintext!
* The use of .htaccess files must be enabled on your Web Server. We use these
  for denying permission to our included files, and for making our pretty indices.

### Installation: ###

1. Download the code! Either you can download the entire development version
   [here](https://github.com/ChandlerSwift/MinecraftSocial/archive/master.zip),
   or you can go to [MinecraftSocial.ChandlerSwift.com](http://minecraftsocial.chandlerswift.com/download/)
   for an easier-to-install copy.
2. If you haven't already, get a web host. [GoDaddy](http://godaddy.com) has
   domain names and hosting, but they're not exactly free. We haven't tried
   any free web hosts yet, but if anyone has any luck with them let us know
   so that we can update this page.
3. Copy over the files to your server's directory. At the moment they have to
   be in the root of the site (something like chandlerswift.com/[files] as
   opposed to chandlerswift.com/[folder]/[files]. Subdomains, however work (so
   mcsocial.chandlerswift.com/[files] would work).
4. Navigate to [yoursite]/install.php to configure the database. It can share
   a database with another program as long as the other programs do not have a
   table with a conflicting name (members, announcements, bulletinboard, or
   login_attempts).
5. Configure your site title (This doesn't have to be the URL), your database
   settings, and your administrative user credentials.
6. Voila! You've got a working site! Now start sending users over to register!
7. Contact us for any questions:
  * [Email](mailto:chandler@chandlerswift.com?subject=MinecraftSocial)
  * [Web](http://minecraftsocial.chandlerswift.com)
  * [GitHub](https://github.com/ChandlerSwift/MinecraftSocial)
