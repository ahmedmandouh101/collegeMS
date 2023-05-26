# College Management System

The College Management System is a web-based application designed to streamline administrative tasks, facilitate communication, and enhance collaboration within a college environment. This system supports three user roles: admin, doctor, and student. It enables CRUD operations, allowing the admin to manage subjects, generate user accounts, while doctors can upload files for their subjects, and students can access and download those files.

## Features

- **User Roles:** The system supports three user roles: admin, doctor, and student. Each role has specific privileges and access levels tailored to their responsibilities.

- **Subject Management:** The admin can create, edit, delete, and view subjects. This feature allows for easy organization and administration of subjects offered by the college.

- **User Account Generation:** The admin can generate user accounts for doctors and students. This feature automates the account creation process and ensures secure access for authorized individuals.

- **File Upload and Access:** Doctors can upload files related to their subjects, such as lecture notes or study materials. Students can view and download these files, promoting seamless information sharing and collaboration.

- **CRUD Operations:** The system supports Create, Read, Update, and Delete (CRUD) operations, enabling efficient management of subjects, user accounts, and files.

## Installation

To set up the College Management System locally, follow these steps:

1. Clone the repository: ```git clone https://github.com/ahmedmandouh101/collegeMS```
2. Install the necessary dependencies: ```npm install```
3. Set up the database. Make sure you have MySQL installed and create the required database schema by running the `schema.sql` file:```mysql -u <username> -p <database-name> < schema.sql```
4. Configure the application. Update the configuration files or environment variables to match your database and application settings.

5. Start the application:```npm start```
6. Access the College Management System through the provided URL or `http://localhost:your-port`.

## Usage

1. Log in to the system using your credentials based on your assigned role.

2. Admin Role:
   - Create, edit, delete, and view subjects.
   - Generate user accounts for doctors and students.

3. Doctor Role:
   - Upload files related to your subjects.
   - View and manage files uploaded for your subjects.

4. Student Role:
   - Access subject files uploaded by doctors.
   - Download files for studying and reference.
   - register his subjects.

5. Perform CRUD operations as required to manage subjects, user accounts, and files.

## Technologies Used

- Front-end: HTML, CSS, JavaScript
- Back-end: PHP, Laravel
- Database: MySQL

## Contributing

Contributions to this project are welcome. To contribute, follow these steps:

1. Fork the repository.

2. Create a new branch for your feature or bug fix:```git checkout -b feature/your-feature```.
3. Make the necessary changes and commit them:
```git commit -m "Add your commit message here"```
4. Push your changes to your forked repository:
```git push origin feature/your-feature```
5. Open a pull request in the main repository, explaining the purpose and benefits of your changes.


## Contact

For any questions or feedback, please feel free to contact me at [ahmedmandouh101@gmail.com]









