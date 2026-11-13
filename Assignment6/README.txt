ASSIGNMENT-6: JSP AND SERVLET
Student Registration System with MySQL Database Connectivity

REQUIREMENTS
- JDK 17
- Apache Tomcat 10.1
- MySQL 8.0
- Maven
- Eclipse IDE (or another Java IDE)

PROJECT CONTENTS
- index.jsp: Student registration form (client side)
- StudentServlet.java: Receives form data and inserts it into MySQL
- result.jsp: Displays the server response
- database.sql: Creates the database and table
- pom.xml: Maven dependencies and WAR packaging
- WEB-INF/web.xml: Welcome page configuration

SETUP
1. Create the database:
   - Open MySQL Workbench.
   - Open database.sql and execute it.

2. Configure the database password:
   - Open src/main/java/com/assignment/StudentServlet.java.
   - Replace YOUR_MYSQL_PASSWORD with your MySQL root password.
   - If your MySQL username is not root, update DB_USER too.

3. Build the project:
   - Open a terminal in this project folder.
   - Run: mvn clean package
   - The WAR file will be generated in the target folder.

4. Deploy on Tomcat 10.1:
   - Copy target/StudentRegistration.war into Tomcat's webapps folder.
   - Start Tomcat.
   - Open: http://localhost:8080/StudentRegistration/

5. Test:
   - Enter a student's name, email and department.
   - Click Register.
   - A success/failure message should appear.
   - In MySQL Workbench, run: SELECT * FROM student_db.students;

IMPORTANT COMPATIBILITY NOTE
This project uses Jakarta Servlet 6.0 (jakarta.servlet.*), so use Tomcat 10.1.
It is not intended for Tomcat 9, which uses the older javax.servlet namespace.

ASSIGNMENT AIM
To develop a web application using JSP and Java Servlet to establish client-server
communication and optionally connect the application to a MySQL database.

EXPECTED FLOW
Browser -> index.jsp -> HTTP POST -> StudentServlet -> JDBC -> MySQL
        <- result.jsp <- Servlet forwards the request with a status message
