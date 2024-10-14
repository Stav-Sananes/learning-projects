#ifndef M_PI
#define M_PI 3.14159265358979323846
#endif
#include "ScientificOperations.h"
#include "factorial.h"
#include <iostream>
#include <cmath>

using namespace std;

void scientificOperations(int choice) {
	double num, num2, result;

	switch (choice) {
	case 1: // Exponent
		cout << "Enter base and exponent (x^y): ";
		cin >> num >> num2;
		result = pow(num, num2);
		cout << "Result: " << result << endl;
		break;
	case 2: // Square Root
		cout << "Enter a number (√x): ";
		cin >> num;
		if (num < 0) {
			cout << "Error: Cannot take the square root of a negative number." << endl;
		}
		else {
			result = sqrt(num);
			cout << "Result: " << result << endl;
		}
		break;
	case 3: // Logarithm
		cout << "Enter a number for logarithm (log base 10, ln): ";
		cin >> num;
		if (num <= 0) {
			cout << "Error: Logarithm undefined for non-positive values." << endl;
		}
		else {
			cout << "Log base 10: " << log10(num) << endl;
			cout << "Natural Log (ln): " << log(num) << endl;
		}
		break;
	case 4: // Modulus
		cout << "Enter two numbers for modulus: ";
		cin >> num >> num2;
		result = fmod(num, num2);
		cout << "Result: " << result << endl;
		break;
	case 5: // Factorial
		int n;
		cout << "Enter an integer for factorial (n!): ";
		cin >> n;
		if (n < 0) {
			cout << "Error: Factorial is not defined for negative numbers." << endl;
		}
		else {
			cout << "Factorial: " << factorial(n) << endl;
		}
		break;
	case 6: // Exponential
		cout << "Enter a number for exponential (e^x): ";
		cin >> num;
		result = exp(num);
		cout << "Result: " << result << endl;
		break;
	case 7: // Trigonometric
		cout << "Enter a number for trigonometric functions (angle in degrees): ";
		cin >> num;
		num = num * (M_PI / 180); 
		cout << "sin(x): " << sin(num) << endl;
		cout << "cos(x): " << cos(num) << endl;
		cout << "tan(x): " << tan(num) << endl;
		break;
	default:
		cout << "Invalid choice." << endl;
	}
}
