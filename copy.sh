#!/bin/sh
# Database
scp -r ./database/factories/*  server818748@server818748.nazwa.pl:~/m2m3/database/factories/
scp -r ./database/migrations/*  server818748@server818748.nazwa.pl:~/m2m3/database/migrations/
scp -r ./database/seeders/*  server818748@server818748.nazwa.pl:~/m2m3/database/seeders/
# Controllers
scp -r ./app/Http/Controllers/*  server818748@server818748.nazwa.pl:~/m2m3/app/Http/Controllers/
#Models
scp -r ./app/Models/*  server818748@server818748.nazwa.pl:~/m2m3/app/Models/
#Routes
scp -r ./routes/ server818748@server818748.nazwa.pl:~/m2m3/routes/
