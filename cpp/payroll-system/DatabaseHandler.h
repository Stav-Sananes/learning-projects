#pragma once
#ifndef DATABASEHANDLER_H
#define DATABASEHANDLER_H

#include "Employee.h"
#include <vector>
#include <string>

class DatabaseHandler {
public:
    // Load employees from the database
    std::vector<Employee> loadEmployees();

    // Save employees to the database
    void saveEmployees(const std::vector<Employee>& employees);

    // Add a new employee to the database
    void addEmployee(const Employee& employee);

    // Remove an employee from the database by ID
    void removeEmployee(int id);

    // Find an employee by ID
    Employee* findEmployee(int id);

    // List all employees
    void listAllEmployees() const;

private:
    std::vector<Employee> employeeDatabase; // Simulated database using a vector
};

#endif 
