#include "Payroll.h"
#include <iostream>

void Payroll::addEmployee(const Employee& employee) {
    employees.push_back(employee);
}

double Payroll::calculateNetSalary(const Employee& employee) const {
    double grossSalary = employee.getSalary();
    double deductions = 0.2 * grossSalary;
    double netSalary = grossSalary - deductions + employee.getBenefits();
    return netSalary;
}

void Payroll::generateReport() const {
    std::cout << "Payroll Report:\n";
    for (const auto& employee : employees) {
        std::cout << "ID: " << employee.getId()
            << ", Name: " << employee.getName()
            << ", Net Salary: " << calculateNetSalary(employee) << "\n";
    }
}
