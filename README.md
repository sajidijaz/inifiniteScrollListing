
# Task Description

The goal of this project is to create a real estate listings list with infinite scroll. The listing details that must be displayed in the list include the address, price, and size of the properties. The list should also be sortable and have filters for price and size to enhance the user experience.

## Setup

This project utilizes Docker for containerization. Ensure you have Docker installed on your system before proceeding.



1. Clone the repository to your local machine:
```bash
  git clone <repository_url>
```
2. Navigate to the project directory:
```bash
  cd <project_directory>
```
3. Build and run the Docker containers:
```bash
  docker-compose up -d
```
4. Access the application by opening a web browser and navigating to http://localhost:8083/immoheld. You should see the CodeIgniter application running.




## Framework and Database

**Framework:** CodeIgniter 3

**Database:**  PostgreSQL



## Migration

Database migration allows you to version and manage your database schema. In CodeIgniter 3, you can use migration files to define changes to the database schema over time. Here's how to run migrations:

```bash
http://localhost:8083/immoheld/migrate
```
This will execute all migrations.

## Seeding

Seeding allows you to populate your database with initial data for testing and development purposes. In CodeIgniter 3, we don't have any built-in package for running the seeds via command line, so created the Controller and defined in the routes. Here's how to run seeders:

```bash
http://localhost:8083/immoheld/seed
```
## Additional Resources

- [CodeIgniter 3 User Guide](https://codeigniter.com/userguide3/) Refer to the official CodeIgniter 3 user guide for more information on database migration and model.
- [PostgreSQL Documentation](https://www.postgresql.org/docs/) Explore the PostgreSQL documentation for information on setting up and working with PostgreSQL databases.

