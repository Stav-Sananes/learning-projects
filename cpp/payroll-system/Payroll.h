#pragma once
#ifndef PAYROLL_H
#define PAYROLL_H

#include "Employee.h"
#include <vector>

class Payroll {
private:
    std::vector<Employee> employees;

public:
    // Add an employee to the payroll system
    void addEmployee(const Employee& employee);

    // Calculate and return the salary for an employee
    double calculateNetSalary(const Employee& employee) const;

    // Generate payroll report
    void generateReport() const;
};

#endif 
