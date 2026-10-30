#include "DatabaseHandler.h"
#include <iostream>

std::vector<Employee> DatabaseHandler::loadEmployees() {
    std::cout << "Loading employees from the database...\n";
    employeeDatabase = {
        Employee(1, "Stav Sananes", "Software Engineer", 75000, 5000),
        Employee(2, "Stav Stav", "Software Engineer2", 65000, 4000)
    };
    return employeeDatabase;
}

void DatabaseHandler::saveEmployees(const std::vector<Employee>& employees) {
    std::cout << "Saving employees to the database...\n";
    employeeDatabase = employees;
}

void DatabaseHandler::addEmployee(const Employee& employee) {
    employeeDatabase.push_back(employee);
    std::cout << "Employee added successfully!\n";
}

void DatabaseHandler::removeEmployee(int id) {
    for (auto it = employeeDatabase.begin(); it != employeeDatabase.end(); ++it) {
        if (it->getId() == id) {
            employeeDatabase.erase(it);
            std::cout << "Employee with ID " << id << " removed successfully!\n";
            return;
        }
    }
    std::cout << "Employee with ID " << id << " not found!\n";
}

Employee* DatabaseHandler::findEmployee(int id) {
    for (auto& employee : employeeDatabase) {
        if (employee.getId() == id) {
            return &employee;
        }
    }
    return nullptr;
}

void DatabaseHandler::listAllEmployees() const {
    std::cout << "Listing all employees:\n";
    for (const auto& employee : employeeDatabase) {
        std::cout << "ID: " << employee.getId()
            << ", Name: " << employee.getName()
            << ", Position: " << employee.getPosition()
            << ", Salary: " << employee.getSalary()
            << ", Benefits: " << employee.getBenefits() << "\n";
    }
}
