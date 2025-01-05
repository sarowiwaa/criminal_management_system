# Criminal Management System

The **Criminal Management System** is a robust and efficient software application designed to manage, record, and track criminal cases and offender profiles. It is tailored to streamline the processes of law enforcement agencies by providing a centralized system for data management.

## Features

- **Offender Profiles:**
  - Add, edit, and manage detailed records of offenders, including personal details, criminal history, and biometric data.
- **Case Management:**
  - Record and update information on ongoing and past criminal cases.
- **Search Functionality:**
  - Quickly search for offenders or cases using multiple filters such as case number, name, or date.
- **User Roles:**
  - Admin and regular users with role-specific privileges.
- **Reports and Analytics:**
  - Generate detailed reports and analyze crime trends.
- **Secure Login System:**
  - Role-based access control to protect sensitive data.
- **Automated Notifications:**
  - Reminders for case hearings and updates via email or SMS.

## Technologies Used

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL
- **Framework:** Laravel (Optional, if applicable)
- **Other Tools:** Bootstrap for responsive UI

## Prerequisites

Before installing the application, ensure you have the following:

- PHP >= 7.4
- MySQL >= 5.7
- Composer (for dependency management)
- A local or remote server (e.g., XAMPP, WAMP, or Apache)

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/your-repository/criminal-management-system.git
   ```

2. Navigate to the project directory:
   ```bash
   cd criminal-management-system
   ```

3. Install dependencies (if using Laravel):
   ```bash
   composer install
   ```

4. Configure the `.env` file:
   - Copy the `.env.example` file and rename it to `.env`.
   - Update the database credentials:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=criminal_management
     DB_USERNAME=root
     DB_PASSWORD=yourpassword
     ```

5. Run database migrations:
   ```bash
   php artisan migrate
   ```

6. Serve the application:
   ```bash
   php artisan serve
   ```

7. Access the application in your browser at:
   ```
   http://localhost:8000
   ```

## Usage

1. Log in using your credentials.
2. Navigate through the dashboard to manage cases, offenders, and reports.
3. Use the search bar for quick access to records.
4. Generate reports and analyze crime trends via the analytics section.

## Future Enhancements

- Integration with biometric devices for offender identification.
- Mobile application for remote access.
- AI-based crime prediction and prevention system.
- Integration with government databases for real-time data sharing.

## Contact Information

For inquiries, issues, or contributions, please contact:

- **Developer:** Ken Sarowiwa
- **Email:** [sarowiwaken001@gmail.com](mailto:sarowiwaken001@gmail.com)
- **Phone:** +254 740868638
- **Portfolio:** [Ken Sarowiwa's Portfolio](#) *( https://sarowiwaa.github.io/myportfolio./)*

---

### License
This project is licensed under the MIT License. See the LICENSE file for details.
