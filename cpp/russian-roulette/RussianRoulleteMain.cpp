#include <iostream>
#include <string>
using namespace std;

int main() {
	srand(time(NULL));
	int playerChoice;
	int computerChoice = (rand() % 7) + 1;
	int choice = 0;
	int goToMainMenu = 0; // 0 = no, 1 = yes
	int isPlayerDead = 0; // 0 = alive, 1 = dead
	cout << "Welcome to Russian Roulette!" << endl;
	cout << "1. Play" << endl;
	cout << "2. Exit" << endl;
	cout << "Enter your choice: ";
	while (true) {
		cin >> choice;
		if (choice == 1) {
			computerChoice = (rand() % 7) + 1;
			cout << "You chose to play!" << endl;
			cout << "Loading game..." << endl;
			cout << "Please choose a number between 1-7:" << endl;
			while (true)
			{
				cin >> playerChoice;
				if (playerChoice < 1 || playerChoice > 7) {
					cout << "Invalid choice. Please choose a number between 1-7." << endl;
				}
				else {
					break;
				}
			}
			cout << "You chose: " << playerChoice << endl;
			while (playerChoice != computerChoice) {
				cout << "Click! You survived!" << endl;
				cout << "Please choose a number between 1-7:" << endl;
				while (true)
				{
					cin >> playerChoice;
					if (playerChoice < 1 || playerChoice > 7) {
						cout << "Invalid choice. Please choose a number between 1-7." << endl;
					}
					else {
						break;
					}
				}
				cout << "You chose: " << playerChoice << endl;
			}
			cout << "Bang! You are dead!" << endl;
			isPlayerDead = 1;
			while (true)
			{
				cout << "Go To Main Menu ?" << endl;
				cout << "If yes enter 1 else enter 0" << endl;
				cout << "Please enter your choice: ";
				cin >> goToMainMenu;
				if (goToMainMenu < 0 || goToMainMenu > 1) {
					cout << "Invalid choice. Please choose 0 to exit or 1 to play again." << endl;
				}
				else {
					break;
				}
			}
			if (isPlayerDead == 1 && goToMainMenu == 0) {
				cout << "Exiting the game." << endl;
				break;
			}
			isPlayerDead = 0;
			cout << "Enter your choice: " << endl;
			cout << "1. Play" << endl;
			cout << "2. Exit" << endl;
		}
		else if (choice == 2) {
			cout << "Exiting the game." << endl;
		}
		else {
			cout << "Invalid choice. Please try again." << endl;
			cout << "1. Play" << endl;
			cout << "2. Exit" << endl;
			cout << "Enter your choice: ";
		}
	}
	return 0;
}