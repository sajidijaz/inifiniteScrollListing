
# Task Description

The goal of this project is to create a real estate listings list with infinite scroll. The listing details that must be displayed in the list include the address, price, and size of the properties. The list should also be sortable and have filters for price and size to enhance the user experience.

## Configuration
1. Locate the `env.example` file in your project directory. This file contains sample environment variable settings.
2. Rename or copy the `env.example` file to a new file named `.env`:

    - **Rename**: Right-click on the file and select "Rename." Ensure that the file is named exactly `.env`, including the dot at the beginning.

    - **Copy**: Alternatively, you can make a copy of `env.example` and name the copy `.env`.

3. Open the newly created `.env` file in a text editor and configure it with the actual environment variables, secrets, and settings needed for your project. This file is where you store sensitive information, such as API keys, database credentials, and other configuration details.

4. Your application or development environment should be configured to read and use the values from the `.env` file. Many frameworks and libraries automatically load environment variables from this file when the application starts.

## Setup

This project utilizes Docker for containerization. Ensure you have Docker installed on your system before proceeding.

You can access the repository URL for cloning [here](https://github.com/sajidijaz/inifiniteScrollListing).

Replace "<repository_url>" with the actual repository URL, and users can choose between SSH and HTTPS for cloning as per their preference.

1. Clone the repository to your local machine:
```bash
  git clone <repository_url>
```
2. Navigate to the project directory:
```bash
  cd <project_directory>
```

3. In the configuration step, please rename the `.env.example` file to `.env`.


4. Build and run the Docker containers:
```bash
  docker-compose up -d
```
5. Access the application by opening a web browser and navigating to http://localhost:8083/immoheld. You should see the CodeIgniter application running.




## Framework and Database

**Framework:** CodeIgniter 3

**Database:**  PostgreSQL

## Accessing the Database Using pgAdmin

[pgAdmin](https://www.pgadmin.org/) is a popular open-source administration and management tool for PostgreSQL and other database systems. You can use pgAdmin to interact with your Dockerized PostgreSQL database. Follow these steps to access the database using pgAdmin:

### Steps

1. **Launch pgAdmin**: Using this http://localhost:8082/browser/ than you need to put the login credentials.
	- Username: admin@pgadmin.com
	- Password: admin

2. **Connect to the Database**:
	- Open pgAdmin and click the "Add New Server" icon
	- In the "General" tab:
		- Enter a name for the server in the "Name" field (e.g., My Database).
	- In the "Connection" tab:
		- Host name/address: Use the IP address or hostname of your Docker container running the PostgreSQL database. This could be the container's IP i.e. `172.19.0.2` if you've mapped the ports accordingly.
		- Port: Use the port number you mapped when starting the Docker container (default is 5432 for PostgreSQL).
		- Maintenance database: Use the name of your database (e.g., immoheld).
		- Username: Enter the username you configured for your Docker container (e.g., myuser).
		- Password: Enter the password you configured for your Docker container (e.g., mypassword).

3. **Save Connection**: Click the "Save" button to save the connection settings.

4. **Connect**: Select the server you just added from the left sidebar and click the "Connect" icon (it looks like a plug).

5. You should now be connected to your Dockerized PostgreSQL database using pgAdmin. You can use pgAdmin's graphical interface to manage your database, run SQL queries, and perform various database tasks.

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


