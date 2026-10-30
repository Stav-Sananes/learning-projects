#include <iostream>
#include <string>
#include "Game.h"
using namespace std;
int main() {
	int choice = 0;
	int difficultyLevel;
	Game GameObject;
	cout << "\nCasino Number Guessing Game\n";
	cout << "1. Play\n";
	cout << "2. Exit Game\n";
	cout << "Enter your choice: ";
	cin >> choice;
	if (cin.fail() || choice != 1 && choice != 2) {
		cout << "You should enter a number based on the menu" << endl;
		return 1;
	}
	if (choice == 2) {
		cout << "Exiting Game" << endl;
		return 0;
	}
	cout << "Choose Difficulty Level:" << endl;
	cout << "1. Easy\n";
	cout << "2. Medium\n";
	cout << "3. Hard\n";
	cout << "Enter your choice: ";
	cin >> difficultyLevel;
	if (cin.fail() || difficultyLevel != 1 && difficultyLevel != 2 && difficultyLevel != 3) {
		cout << "Difficulty Level should be entered based on the menu" << endl;
		return 1;
	}
	GameObject.SetDifficultyLevel(difficultyLevel);
	GameObject.playGame(); // 1 - Win 0 - Lose;

	return 0;
}

