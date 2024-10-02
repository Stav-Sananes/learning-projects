#include <iostream>
#include <string>
#include "Game.h"
using namespace std;

DifficultyLevelGuesses numberOfGuesses;
MaxRandomNumberOptions maxRandomNumber;
int Game::getNumberOfGuesses() {
	return numberOfGuesses;
}
int Game::getMaxRandomNumber() {
	return maxRandomNumber;
}
void Game::SetDifficultyLevel(int level) {
	if (level == 1) { //! Easy
		numberOfGuesses = EasyNumberOfGuesses;
		maxRandomNumber = Easy;
	}
	else if (level == 2) { //! Medium
		numberOfGuesses = MediumNumberOfGuesses;
		maxRandomNumber = Medium;
	}
	else { //! Hard
		numberOfGuesses = HardNumberOfGuesses;
		maxRandomNumber = Hard;
	}
}
int Game::playGame() {
	int randomNumber = rand() % maxRandomNumber;
	int player1Guess = numberOfGuesses;
	int player1ChosenNumber = 0;
	int tries = player1Guess;
	while (tries != 0) {
		cout << "Please enter a number between 0-" << maxRandomNumber << ": " << endl;
		cin >> player1ChosenNumber;
		if (cin.fail() || player1ChosenNumber < 0 || player1ChosenNumber > maxRandomNumber) {
			cin.clear();
			cin.ignore(numeric_limits<streamsize>::max(), '\n');
			cout << "Not valid input." << endl;
			tries--;
			cout << "Tries left: " << tries << endl;
			continue;
		}
		if (player1ChosenNumber == randomNumber) {
			cout << "You are correct, You Won!, Exiting Game" << endl;
			return 1;
		}
		else if (player1ChosenNumber > randomNumber) {
			cout << "The number you choose is to high" << endl;
		}
		else {
			cout << "The number you choose is to small" << endl;
		}
		tries--;
		cout << "Tries left: " << tries << endl;
	}
	cout << "No Tries Left, You Lost. Exiting Game" << endl;
	return 0;
}
