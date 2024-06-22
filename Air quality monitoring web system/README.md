Here is the guide to help you build your own system of your preffed sensor system

# DIT Air Quality Monitoring Center

## Table of Contents
1. [Introduction](#introduction)
2. [Features](#features)
3. [Installation Guide](#installation-guide)
    - [Prerequisites](#prerequisites)
    - [Installing XAMPP](#installing-xampp)
    - [Setting up the Database](#setting-up-the-database)
    - [Running the Project](#running-the-project)
4. [API Documentation](#api-documentation)
    - [Postman Usage](#postman-usage)
    - [API Endpoints](#api-endpoints)
5. [Contributing](#contributing)
6. [License](#license)

## Introduction
Welcome to the DIT Air Quality Monitoring Center project. This web application is designed to monitor air quality data, visualize it, and provide insights into air pollution levels. The project includes a user-friendly interface for viewing data and an API for interacting with the data programmatically.

## Features
- Real-time air quality monitoring
- Data visualization
- API for accessing and manipulating air quality data
- User authentication and authorization
- sensor Mapping and Tracking

## Installation Guide

### Prerequisites
- XAMPP (for Apache and MySQL)
- Git
- Postman (for API testing)
- leaflet API

### Installing XAMPP
1. **Download XAMPP**
    - Download XAMPP from the [official website](https://www.apachefriends.org/index.html).

2. **Install XAMPP**
    - Run the installer and follow the installation instructions.

3. **Start Apache and MySQL**
    - Open the XAMPP Control Panel.
    - Start the Apache and MySQL modules.

### Setting up the Database
1. **Create the Database**
    - Open your browser and go to `http://localhost/phpmyadmin`.
    - Click on "New" to create a new database.
    - Name your database `air_quality` and click "Create".

2. **Import the SQL Script**
    - Select the `air_quality` database.
    - Go to the "Import" tab.
    - Choose the SQL file provided in the project (`air_quality.sql`) and click "Go".

### Running the Project
1. **Clone the Repository**
    - Open your terminal or command prompt.
    - Navigate to the directory where you want to clone the project.
    - Run the following command:
      ```bash
      git clone https://github.com/your-username/air-quality-monitoring-center.git
      ```

2. **Configure the Project**
    - Copy the project files to the `htdocs` directory of your XAMPP installation (usually `C:\xampp\htdocs` on Windows or `/opt/lampp/htdocs` on Linux).
    - Update the `db.php` file with your database connection details:
      ```php
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "air_quality";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      ?>
      ```

3. **Run the Project**
    - Open your browser and go to `http://localhost/air-quality-monitoring-center`.

## API Documentation

### Postman Usage
1. **Install Postman**
    - Download and install Postman from the [official website](https://www.postman.com/downloads/).

2. **Import the Postman Collection**
    - Open Postman.
    - Click on "Import" and select the Postman collection file provided in the project (`AirQualityAPI.postman_collection.json`).

### API Endpoints
- **Get All Sensor Readings**
  - **Endpoint:** `/api/sensor_readings`
  - **Method:** `GET`
  - **Description:** Retrieves all sensor readings from the database.

- **Get Sensor Reading by ID**
  - **Endpoint:** `/api/sensor_readings/{id}`
  - **Method:** `GET`
  - **Description:** Retrieves a sensor reading by its ID.

- **Create Sensor Reading**
  - **Endpoint:** `/api/sensor_readings`
  - **Method:** `POST`Here is the guide to help you build your own system of your preffed sensor system

# DIT Air Quality Monitoring Center

## Table of Contents
1. [Introduction](#introduction)
2. [Features](#features)
3. [Installation Guide](#installation-guide)
    - [Prerequisites](#prerequisites)
    - [Installing XAMPP](#installing-xampp)
    - [Setting up the Database](#setting-up-the-database)
    - [Running the Project](#running-the-project)
4. [API Documentation](#api-documentation)
    - [Postman Usage](#postman-usage)
    - [API Endpoints](#api-endpoints)
5. [Contributing](#contributing)
6. [License](#license)

## Introduction
Welcome to the DIT Air Quality Monitoring Center project. This web application is designed to monitor air quality data, visualize it, and provide insights into air pollution levels. The project includes a user-friendly interface for viewing data and an API for interacting with the data programmatically.

## Features
- Real-time air quality monitoring
- Data visualization
- API for accessing and manipulating air quality data
- User authentication and authorization

## Installation Guide

### Prerequisites
- XAMPP (for Apache and MySQL)
- Git
- Postman (for API testing)

### Installing XAMPP
1. **Download XAMPP**
    - Download XAMPP from the [official website](https://www.apachefriends.org/index.html).

2. **Install XAMPP**
    - Run the installer and follow the installation instructions.

3. **Start Apache and MySQL**
    - Open the XAMPP Control Panel.
    - Start the Apache and MySQL modules.

### Setting up the Database
1. **Create the Database**
    - Open your browser and go to `http://localhost/phpmyadmin`.
    - Click on "New" to create a new database.
    - Name your database `air_quality` and click "Create".

2. **Import the SQL Script**
    - Select the `air_quality` database.
    - Go to the "Import" tab.
    - Choose the SQL file provided in the project (`air_quality.sql`) and click "Go".

### Running the Project
1. **Clone the Repository**
    - Open your terminal or command prompt.
    - Navigate to the directory where you want to clone the project.
    - Run the following command:
      ```bash
      git clone https://github.com/your-username/air-quality-monitoring-center.git
      ```

2. **Configure the Project**
    - Copy the project files to the `htdocs` directory of your XAMPP installation (usually `C:\xampp\htdocs` on Windows or `/opt/lampp/htdocs` on Linux).
    - Update the `db.php` file with your database connection details:
      ```php
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "air_quality";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      ?>
      ```

3. **Run the Project**
    - Open your browser and go to `http://localhost/air-quality-monitoring-center`.

## API Documentation

### Postman Usage
1. **Install Postman**
    - Download and install Postman from the [official website](https://www.postman.com/downloads/).

2. **Import the Postman Collection**
    - Open Postman.
    - Click on "Import" and select the Postman collection file provided in the project (`AirQualityAPI.postman_collection.json`).

### API Endpoints
- **Get All Sensor Readings**
  - **Endpoint:** `/api/sensor_readings`
  - **Method:** `GET`
  - **Description:** Retrieves all sensor readings from the database.

- **Get Sensor Reading by ID**
  - **Endpoint:** `/api/sensor_readings/{id}`
  - **Method:** `GET`
  - **Description:** Retrieves a sensor reading by its ID.

- **Create Sensor Reading**
  - **Endpoint:** `/api/sensor_readings`
  - **Method:** `POST`
  - **Description:** Creates a new sensor reading.
  - **Body Parameters:**
    - `pollutant_name` (string)
    - `sensor_name` (string)
    - `standard_concentration` (float)
    - `actual_concentration` (float)
    - `aqhi` (int)
    - `state` (string)

- **Update Sensor Reading**
  - **Endpoint:** `/api/sensor_readings/{id}`
  - **Method:** `PUT`
  - **Description:** Updates an existing sensor reading by its ID.
  - **Body Parameters:**
    - `pollutant_name` (string)
    - `sensor_name` (string)
    - `standard_concentration` (float)
    - `actual_concentration` (float)
    - `aqhi` (int)
    - `state` (string)

- **Delete Sensor Reading**
  - **Endpoint:** `/api/sensor_readings/{id}`
  - **Method:** `DELETE`
  - **Description:** Deletes a sensor reading by its ID.

## Contributing
We welcome contributions from the community. To contribute to this project, please follow these steps:
1. Fork the repository.
2. Create a new branch (`git checkout -b feature/your-feature-name`).
3. Make your changes.
4. Commit your changes (`git commit -m 'Add some feature'`).
5. Push to the branch (`git push origin feature/your-feature-name`).
6. Create a new Pull Request.

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

This README should help users set up and interact with your project. Feel free to customize any part of it to better fit your project's specific needs.
  - **Description:** Creates a new sensor reading.
  - **Body Parameters:**
    - `pollutant_name` (string)
    - `sensor_name` (string)
    - `standard_concentration` (float)
    - `actual_concentration` (float)
    - `aqhi` (int)
    - `state` (string)

- **Update Sensor Reading**
  - **Endpoint:** `/api/sensor_readings/{id}`
  - **Method:** `PUT`
  - **Description:** Updates an existing sensor reading by its ID.
  - **Body Parameters:**
    - `pollutant_name` (string)
    - `sensor_name` (string)
    - `standard_concentration` (float)
    - `actual_concentration` (float)
    - `aqhi` (int)
    - `state` (string)

- **Delete Sensor Reading**
  - **Endpoint:** `/api/sensor_readings/{id}`
  - **Method:** `DELETE`
  - **Description:** Deletes a sensor reading by its ID.

## Contributing
We welcome contributions from the community. To contribute to this project, please follow these steps:
1. Fork the repository.
2. Create a new branch (`git checkout -b feature/your-feature-name`).
3. Make your changes.
4. Commit your changes (`git commit -m 'Add some feature'`).
5. Push to the branch (`git push origin feature/your-feature-name`).
6. Create a new Pull Request.

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

This README should help users set up and interact with your project. Feel free to customize any part of it to better fit your project's specific needs.
