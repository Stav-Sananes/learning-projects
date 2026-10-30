#pragma once
#ifndef EMPLOYEE_H
#define EMPLOYEE_H

#include <string>

class Employee {
private:
    int id;
    std::string name;
    std::string position;
    double salary;
    double benefits;

public:
    Employee(int id, const std::string& name, const std::string& position, double salary, double benefits);
    int getId() const;
    std::string getName() const;
    std::string getPosition() const;
    double getSalary() const;
    double getBenefits() const;
    void setName(const std::string& name);
    void setPosition(const std::string& position);
    void setSalary(double salary);
    void setBenefits(double benefits);
};

#endif 
