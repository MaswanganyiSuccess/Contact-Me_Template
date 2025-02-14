# Contact-Me_Template

This project is a contact form implementation using PHPMailer and Dotenv to send emails securely from a website. The form collects user inputs such as name, email, telephone, subject, and message. Upon submission, the data is processed via a POST request, and an email is sent to a specified recipient (in this case, Successfull Maswanganyi).

Key Features:

PHPMailer: Utilized to send emails through a secure SMTP server. The configuration (SMTP host, username, password, port, and security) is fetched from environment variables for security. Dotenv: Loads environment variables from a .env file to keep sensitive data like SMTP credentials secure. HTML Email Content: The email body is formatted using HTML, displaying user-submitted data in a structured way. Error Handling: The script provides feedback to the user through JavaScript alerts if the email is successfully sent or if an error occurs during the process.
