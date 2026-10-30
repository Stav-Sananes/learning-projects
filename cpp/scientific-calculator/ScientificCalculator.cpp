
#include <iostream>
#include <cmath> 
#include <math.h>
#include "BasicOperations.h"
#include "ScientificOperations.h"

using namespace std;

// Declration of functions
void basicArithmetic(int choice);
void scientificOperations(int choice);
int factorial(int n);

int main() {
	int choice = 0;
	int userChoices;

	cout << "Scientific Calculator\n";
	cout << "1. Start Basic Arithmetic Operations Calculating\n";
	cout << "2. Start Scientific Operations Calculating\n";
	cout << "3. Exit Calculator\n";
	cout << "Enter your choice: ";
	cin >> choice;

	if (cin.fail() || (choice != 1 && choice != 2 && choice != 3)) {
		cout << "You should enter a number based on the menu" << endl;
		return 1;
	}

	if (choice == 3) {
		cout << "Exiting Scientific Calculator" << endl;
		return 0;
	}

	if (choice == 1) {
		cout << "Choose Operation:\n";
		cout << "1. Addition (+)\n";
		cout << "2. Subtraction (-)\n";
		cout << "3. Division (/)\n";
		cout << "4. Modulus (%)\n";
		cout << "5. Multiplication (*)\n";
		cout << "Enter your choice: ";
		cin >> userChoices;
		if (cin.fail() || (userChoices < 1 || userChoices > 5)) {
			cout << "Please enter a valid choice for arithmetic operation." << endl;
			return 1;
		}
		basicArithmetic(userChoices);
	}
	else {
		cout << "Choose Operation:\n";
		cout << "1. Exponentiation (x^y)\n";
		cout << "2. Square root (√x)\n";
		cout << "3. Logarithms (log base 10, ln)\n";
		cout << "4. Modulus (%)\n";
		cout << "5. Factorial (n!)\n";
		cout << "6. Exponential (e^x)\n";
		cout << "7. Trigonometric Functions (sin, cos, tan)\n";
		cout << "Enter your choice: ";
		cin >> userChoices;
		if (cin.fail() || (userChoices < 1 || userChoices > 7)) {
			cout << "Please enter a valid choice for scientific operation." << endl;
			return 1;
		}
		scientificOperations(userChoices);
	}

	return 0;
}

