#include "BasicOperations.h"
#include <iostream>
#include <cmath>

using namespace std;

void basicArithmetic(int choice) {
    double num1, num2, result;

    cout << "Enter two numbers: ";
    cin >> num1 >> num2;

    switch (choice) {
    case 1: // Add
        result = num1 + num2;
        cout << "Result: " << result << endl;
        break;
    case 2: // Minus
        result = num1 - num2;
        cout << "Result: " << result << endl;
        break;
    case 3: // Division
        if (num2 == 0) {
            cout << "Error: Division by zero." << endl;
        }
        else {
            result = num1 / num2;
            cout << "Result: " << result << endl;
        }
        break;
    case 4: // Modulus
        result = fmod(num1, num2);
        cout << "Result: " << result << endl;
        break;
    case 5: // Multiplication
        result = num1 * num2;
        cout << "Result: " << result << endl;
        break;
    default:
        cout << "Invalid choice." << endl;
    }
}
