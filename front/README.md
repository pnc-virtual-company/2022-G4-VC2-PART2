# I. Front End
### Step 1: Install Dependency Packages
- [x] cd /front
> <code> npm install **or** npm i </code>

### Step 2: Update Environment Variables
- [x] Update <code>env.production</code> and <code>env.development</code> with IP Address of your Backend server

#### Example for <code>production </code> file:
```
VUE_APP_MODE=production
VUE_APP_API_URL=http://localhost:8000/api
```

#### Example for <code>developement</code> file:
```
VUE_APP_MODE=development
VUE_APP_API_URL=http://localhost:8000/api
```
### Step 3: Running Application
- [x] If you are in the development environment (Compiles and hot-reloads for development)
> <code>npm run serve </code> (Normal Vue JS)

- [x] If you are in the production environment (Compiles and minifies for production)
- Normal Vue JS:
> <code>npm run serve </code>

# II. Backend
### Step 1: Install the Packages
- [x] cd /back
> <code> composer install **or** composer i </code>

### Step 2: Update the Environment Variables
- [x] copy <code>.env.example </code> file to the <code>.env </code> file
  
```
DB_DATABASE= student_follow_up
DB_USERNAME= YOUR_DB_USERNAME
DB_PASSWORD= YOUR_DB_PASSWORD
```
### Step 3: Generate Application Key
> <code> php artisan key:generate </code>

### Step 4: Migrate migrateion table to database
> <code> php artisan migrate </code>

### Step 5: Migrate default admin user to database with seeder
> <code> php artisan db:seed </code>

### Step 6: Running Application
- [x] If you are in local development environments
> <code> php artisan serve </code> --port=YOUR_PORT (port is optional) 

- [x] If you are in production environments

> <code> http://YOUR_IP_ADDRESS/PROJECT/back/public </code>

- [x] If you are configured <code>VHOST </code> environment variable  with Apache configuration point to public folder in project so you can type:
> <code> http://YOUR_IP_ADDRESS </code>

