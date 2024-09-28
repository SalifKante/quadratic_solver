# Quadratic Equation Solver

This project is a **Quadratic Equation Calculator** built using the Laravel framework. It allows users to solve quadratic equations of the form:

\[
ax^2 + bx + c = 0
\]

## Features

-   Solves quadratic equations with real and complex roots.
-   Displays solutions and stores a history of previous calculations.
-   Pagination for browsing the solution history.
-   Delete functionality for removing past calculations.

## Technologies Used

-   **Laravel**: PHP framework for backend development.
-   **MySQL**: Database for storing equation solutions.
-   **Bootstrap 5**: For responsive design and styling.
-   **Docker**: To create a consistent development environment.

## Setup Instructions

1. Clone the repository:

    ```bash
    git clone https://github.com/SalifKante/quadratic_solver.git
    cd quadratic_solver
    ```

2. Install the dependencies:

    ```bash
    composer install
    ```

3. Set up the environment:

    - Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

    - Generate the application key:

    ```bash
    php artisan key:generate
    ```

4. Configure the database in the `.env` file with your own credentials:

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=your-database-host
    DB_PORT=3306
    DB_DATABASE=your-database-name
    DB_USERNAME=your-username
    DB_PASSWORD=your-password
    ```

5. Run migrations:

    ```bash
    php artisan migrate
    ```

6. Serve the application:

    ```bash
    php artisan serve
    ```

7. Visit `http://localhost:8000` in your browser to access the app.

## Additional Information

-   **Docker**: You can use Docker to run the project in a containerized environment.
-   After running the migrations, please configure the database credentials in the `.env` file according to your setup to ensure proper connection to the database.
