# demo-assignment 

**Cakephp 3.4** 

**Requirements - ** 
- PHP 5.6 
- Cakephp 3.x 

**Installation** 
- Clone the repo & Create a app.php file in the config directory 
- Update composer (composer creates vendor, tmp, logs directory and given the correct permission) 
- Run SQL file on local database (/DB/db.sql) 
- You can create a virtual host or use cake bin server (./Bin cake server) 
- First of all, you have to create a user for login (/users/add) 
- There have 2 roles (doctor, patient), after login with specific rule, you can see only a few pages, patient can see the booking appointment page and listing.
- There have 2 roles (doctor, patient), after login with specific rule, you can see only a few pages, patient can see the booking appointment page and listing page, Doctor can see only his appointment/booking list. 
- Now I added a bootstrap theme to the UI
- If the patient is trying to book same slot using (date, doctor, booking from & booking to) then it's restricted to do this, there have checked exist booking conditions on that column. Actually there should have check between condition also from query side (most of the work do from query side & check via Ajax but it does not developed in that test 
- Email sending functionality is not developed... I created event for this and display a message in listener after booking a slot, you can see in debug.log file.
