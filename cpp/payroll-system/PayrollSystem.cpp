#include "Employee.h"
#include "Payroll.h"
#include "DatabaseHandler.h"
#include <iostream>
#include <limits>

void displayMenu() {
    std::cout << "\nPayroll System Menu:\n";
    std::cout << "1. Add Employee\n";
    std::cout << "2. Remove Employee\n";
    std::cout << "3. Calculate Salary\n";
    std::cout << "4. List All Employees\n";
    std::cout << "5. Find Employee\n";
    std::cout << "6. Generate Payroll Report\n";
    std::cout << "7. Exit\n";
    std::cout << "Choose an option: ";
}

int main() {
    DatabaseHandler dbHandler;
    Payroll payroll;
    dbHandler.loadEmployees(); // Load existing employees
    int choice;

    do {
        displayMenu();
        std::cin >> choice;

        switch (choice) {
        case 1: {
            // Add an employee
            int id;
            std::string name, position;
            double salary, benefits;
            std::cout << "Enter Employee ID: ";
            std::cin >> id;
            std::cout << "Enter Name: ";
            std::cin.ignore(); // To ignore the leftover newline character
            std::getline(std::cin, name);
            std::cout << "Enter Position: ";
            std::getline(std::cin, position);
            std::cout << "Enter Salary: ";
            std::cin >> salary;
            std::cout << "Enter Benefits: ";
            std::cin >> benefits;
            dbHandler.addEmployee(Employee(id, name, position, salary, benefits));
            break;
        }
        case 2: {
            // Remove an employee
            int id;
            std::cout << "Enter Employee ID to remove: ";
            std::cin >> id;
            dbHandler.removeEmployee(id);
            break;
        }
        case 3: {
            // Calculate salary for an employee
            int id;
            std::cout << "Enter Employee ID: ";
            std::cin >> id;
            Employee* employee = dbHandler.findEmployee(id);
            if (employee) {
                double netSalary = payroll.calculateNetSalary(*employee);
                std::cout << "Net Salary for " << employee->getName() << ": " << netSalary << "\n";
            }
            else {
                std::cout << "Employee not found!\n";
            }
            break;
        }
        case 4:
            // List all employees
            dbHandler.listAllEmployees();
            break;
        case 5: {
            // Find an employee
            int id;
            std::cout << "Enter Employee ID: ";
            std::cin >> id;
            Employee* employee = dbHandler.findEmployee(id);
            if (employee) {
                std::cout << "Employee Found: " << employee->getName()
                    << ", Position: " << employee->getPosition()
                    << ", Salary: " << employee->getSalary() << "\n";
            }
            else {
                std::cout << "Employee not found!\n";
            }
            break;
        }
        case 6:
            // Generate payroll report
            payroll.generateReport();
            break;
        case 7:
            std::cout << "Exiting the Payroll System. Goodbye!\n";
            break;
        default:
            std::cout << "Invalid option. Please try again.\n";
            break;
        }

        // Clear input buffer if there are any errors
        if (std::cin.fail()) {
            std::cin.clear();
            std::cin.ignore(std::numeric_limits<std::streamsize>::max(), '\n');
        }
    } while (choice != 7);

    return 0;
}
