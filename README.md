# Promet Source Login Exercise

Promet Source Login is a simple login form in Bootstrap 4 that is split into 3 tiers: 

-data tier with MySQL;\
-business logic tier with entities and controllers;\
-presentation layer with HTML and CSS

## Installation

Configure Apache to point to the web folder and make sure to have PHP installed. Restore the database to a MySQL server and in the /web/businessLogic/controllers/baseController.php file in getData function adjust the connections string to connect to the previously restored database.