# Event Management System

## Table of Contents

- [Event Management System](#event-management-system)
  - [Table of Contents](#table-of-contents)
  - [1. Project Overview](#1-project-overview)
  - [2. Features](#2-features)
  - [3. Installation](#3-installation)
    - [Prerequisites](#prerequisites)
    - [Steps](#steps)
  - [4. Database Setup](#4-database-setup)
  - [5. Running the Application](#5-running-the-application)
  - [6. Technologies Used](#6-technologies-used)
  - [7. Contributing](#7-contributing)
  - [8. License](#8-license)
    - [Authors](#authors)
    - [Acknowledgments](#acknowledgments)

---

## 1. Project Overview

This project is an Event Management System designed to simplify venue booking and event organization. It provides users with the ability to book venues and register for upcoming events through a user-friendly platform. Key features include account management, venue and event listing, booking management, event registration, feedback mechanisms, and security measures such as data encryption and session timeout.

---

## 2. Features

- **User Account Management**: Create, login, logout, reset password, delete accounts.
- **Profile Management**: Update profile details, manage notification settings.
- **Customized Dashboards**: Separate views for Owners and Users to manage bookings and events.
- **Venue Management**: Owners can list venues, manage availability, approve/reject booking requests.
- **Event Management**: Staff can list events with details, users can browse, register, provide feedback.
- **Notifications**: Automated notifications for booking requests, approvals, event registrations, and updates.
- **Security**: Data encryption, session timeout.

---

## 3. Installation

### Prerequisites

Before starting, ensure you have the following installed:

- [XAMPP](https://www.apachefriends.org/index.html) - Apache, MySQL, PHP, and Perl environment.

### Steps

1. Clone the repository:

   ```bash
   git clone https://github.com/Ade0luwa/Waterloo_Team_1_S_24.git
   cd Waterloo_Team_1_S_24
   ```

---

## 4. Database Setup

1. **Start XAMPP**:

   - Launch XAMPP control panel and start Apache and MySQL services.

2. **Access phpMyAdmin**:
   - Open your web browser and go to `http://localhost/phpmyadmin`.
3. **Create Database**:

   - Create a new database named `eventdb`.

4. **Import Database Schema**:
   - Import the database schema from `database/schema.sql` into your `eventdb` database. This file contains the necessary tables and initial data structure for the application.

---

## 5. Running the Application

1. **Start the Server**:
   - Place your project folder in the `htdocs` directory of XAMPP (e.g., `C:\xampp\htdocs\Waterloo_Team_1_S_24`).
   - Open your web browser and navigate to `http://localhost/Waterloo_Team_1_S_24/login.php` to go to the main app login page.
   - OR
   - Open your web browser and navigate to `http://localhost/Waterloo_Team_1_S_24/admin/login.php` to go to the admin app login page.

---

## 6. Technologies Used

- Frontend:
  - HTML5, CSS, JavaScript, React, Bootstrap
- Backend:
  - PHP
- Database:
  - MySQL
- Tools:
  - Visual Studio Code (IDE), Git (Version Control), GitHub (Code Hosting), Jira (Project Management)
- Testing:
  - Manual, JMeter (Performance Testing)

---

## 7. Contributing

We welcome contributions to improve the Event Management System. To contribute:

- Fork the repository
- Create your feature branch (`git checkout -b feature/YourFeature`)
- Commit your changes (`git commit -am 'Add some feature'`)
- Push to the branch (`git push origin feature/YourFeature`)
- Create a new Pull Request

---

## 8. License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

### Authors

- [Maryam Farooq]()
- [Promila Rani](https://github.com/promilarani)
- [Edikan Ekanem](https://github.com/EdisCode)
- [Adeoluwatomiwa Adegbesan](https://github.com/Adeoluwatomi)
- [Harsh Kirtibhai Patel](https://github.com/HarshPatel777)
- [Mohammed Shadaab Uddi](https://github.com/shady-afkk)
- [Zaid]()
- [Rahi patel](https://github.com/Rahipatel11)
- [Nishant Dadwal]()
- [Nkechi Emmanuel](https://github.com/emmanuelnkechi)
- [Vansh Palkhiwala](https://github.com/Vansh1009)
- [Ajay Ajay]()

---

### Acknowledgments

- We acknowledge our great professor [Akshay Chadha](https://github.com/akshaychadhaconestoga)

---
