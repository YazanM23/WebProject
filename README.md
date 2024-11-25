
# PAODT (Patient and Organ Donor Tracker)

**PAODT** is a web-based project developed as part of a web development course. The project aims to assist hospitals and individuals in need of organ transplantation by facilitating the search for organ donors and matching the required specifications for patients.

---

## Key Features

- **Donor Registration**:
  - Enables individuals to register as organ donors by providing relevant details.
- **Patient Matching**:
  - Matches patients with registered organ donors based on their medical specifications.
- **Hospital Integration**:
  - Allows hospitals to manage donor and patient data effectively.
- **User-Friendly Interface**:
  - Built using HTML, CSS, and JavaScript for a responsive and interactive design.
- **Database Management**:
  - Uses MySQL for data storage and management.

---

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL

---

## Getting Started

### Prerequisites

- **PHP** >= 7.4
- **MySQL** >= 5.7
- **Apache/Nginx** web server

---

### Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/YazanM23/PAODT
   cd PAODT
   ```

2. **Set up the database**:
   - Create a database named `paodt`.
   - Import the `paodt.sql` file into your MySQL database.

3. **Configure database connection**:
   Update the `config.php` file with your database credentials:
   ```php
   <?php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'your-username');
   define('DB_PASSWORD', 'your-password');
   define('DB_NAME', 'paodt');
   ?>
   ```

4. **Start the server**:
   - Place the project files in the appropriate web directory (e.g., `/var/www/html` for Apache).
   - Alternatively, use PHP's built-in server:
     ```bash
     php -S localhost:8000
     ```

5. **Access the application**:
   Open your browser and navigate to `http://localhost:8000`.

---

## File Structure

- **`index.php`**: Entry point of the application.
- **`config.php`**: Contains database connection settings.
- **`assets/`**: Contains CSS and JavaScript files.
- **`templates/`**: Includes reusable UI components.
- **`functions/`**: Contains helper functions for database operations.

---

## Customization

- Modify `config.php` to update database credentials.
- Add new pages or features in the `templates/` and `functions/` directories.
- Enhance styles by editing the CSS files in the `assets/css/` directory.

---

## License

This project is open-source and available under the [MIT License](LICENSE).

---

## Contact

For queries or feedback, reach out:

- **Name**: Yazan Mansour
- **Email**: Yazan.mansour2003@gmail.com
