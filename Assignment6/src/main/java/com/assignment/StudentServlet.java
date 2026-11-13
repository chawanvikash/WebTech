package com.assignment;

import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;

import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

@WebServlet("/register")
public class StudentServlet extends HttpServlet {

    private static final String DB_URL =
            "jdbc:mysql://localhost:3306/student_db";
    private static final String DB_USER = "root";

    // Change this to your own MySQL password.
    private static final String DB_PASSWORD = "Vikash@2006";

    @Override
    protected void doPost(HttpServletRequest request,
                          HttpServletResponse response)
            throws ServletException, IOException {

        request.setCharacterEncoding("UTF-8");

        String name = request.getParameter("name");
        String email = request.getParameter("email");
        String department = request.getParameter("department");

        if (name == null || name.isBlank()
                || email == null || email.isBlank()
                || department == null || department.isBlank()) {
            request.setAttribute("message",
                    "Registration failed: Please fill in all fields.");
            request.setAttribute("success", false);
            request.getRequestDispatcher("/result.jsp")
                   .forward(request, response);
            return;
        }

        String sql = "INSERT INTO students (name, email, department) "
                   + "VALUES (?, ?, ?)";

        try {
            Class.forName("com.mysql.cj.jdbc.Driver");

            try (Connection con = DriverManager.getConnection(
                         DB_URL, DB_USER, DB_PASSWORD);
                 PreparedStatement ps = con.prepareStatement(sql)) {

                ps.setString(1, name.trim());
                ps.setString(2, email.trim());
                ps.setString(3, department);

                int rows = ps.executeUpdate();

                if (rows > 0) {
                    request.setAttribute("message",
                            "Student registered successfully!");
                    request.setAttribute("success", true);
                } else {
                    request.setAttribute("message",
                            "Registration failed. No record was inserted.");
                    request.setAttribute("success", false);
                }
            }
        }  catch (ClassNotFoundException | SQLException e) {

            e.printStackTrace();

            getServletContext().log("Student registration error", e);

            request.setAttribute("message",
            "Registration failed: " + e.getMessage());

            request.setAttribute("success", false);
}

                request.getRequestDispatcher("/result.jsp")
               .forward(request, response);
    }
}
