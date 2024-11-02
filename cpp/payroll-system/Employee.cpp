#include "Employee.h"

Employee::Employee(int id, const std::string& name, const std::string& position, double salary, double benefits)
    : id(id), name(name), position(position), salary(salary), benefits(benefits) {}

int Employee::getId() const { return id; }
std::string Employee::getName() const { return name; }
std::string Employee::getPosition() const { return position; }
double Employee::getSalary() const { return salary; }
double Employee::getBenefits() const { return benefits; }

void Employee::setName(const std::string& name) { this->name = name; }
void Employee::setPosition(const std::string& position) { this->position = position; }
void Employee::setSalary(double salary) { this->salary = salary; }
void Employee::setBenefits(double benefits) { this->benefits = benefits; }
