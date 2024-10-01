#include <iostream>
#include <string>
using namespace std;
enum RockPaperScissorsActions :int {
	Rock,
	Paper,
	Scissors,
	RockPaperScissorsCount
};
int main() {
	int choice = 0;
	string player1;
	string player2;
	int divisor = static_cast<int>(RockPaperScissorsActions::RockPaperScissorsCount);
	cout << "\nRock Paper Scissors\n";
	cout << "1. Play\n";
	cout << "2. Exit Game\n";
	cout << "Enter your choice: ";
	while (true) {
		cin >> choice;
		while (choice != 1 && choice != 2) {
			cout << "Invalid Choice Please Enter Try Again" << endl;
			cout << "Enter your choice: 1.Play Or 2. To Exit Game:";
			cin.clear();
			cin.ignore(numeric_limits<streamsize>::max(), '\n');
			cin >> choice;
		}
		if (choice == 2) {
			cout << "Exiting Game!" << endl;
			break;
		}
		else {
			string player1Action;
			srand(time(NULL));
			RockPaperScissorsActions player2Action = RockPaperScissorsActions(rand() % divisor);
			cin.ignore();
			cout << "Enter Player1 Action: 0 - Rock  1 - Paper  2 - Scissors:" << endl;
			cin >> player1Action;
			cin.ignore();
			while (player1Action != "0" && player1Action != "1" && player1Action != "2") {
				cout << "Invalid Pick Please Enter Valid Action: 0 - Rock 1 - Paper 2 - Scissors:" << endl;
				cin >> player1Action;
				cin.clear();
				cin.ignore(numeric_limits<streamsize>::max(), '\n');
			}
			int player1ActionInteger = stoi(player1Action);
			if (player1ActionInteger == player2Action) {
				cout << "Player 1 Action is:" << player1ActionInteger << " Player 2 Action is:" << player2Action << endl;
				cout << "Draw between two players" << endl;
				break;
			}

			else if (player1ActionInteger == Paper && player2Action == Rock) {
				cout << "Player 1 Choosed Paper and Player 2 Choosed Rock, Player 1 wins!" << endl;
				break;
			}
			else if (player1ActionInteger == Rock && player2Action == Scissors) {
				cout << "Player 1 Choosed Rock and Player 2 Choosed Scissors, Player 1 wins!" << endl;
				break;
			}
			else if (player1ActionInteger == Scissors && player2Action == Paper) {
				cout << "Player 1 Choosed Scissors and Player 2 Choosed Paper, Player 1 wins!" << endl;
				break;
			}
			else if (player1ActionInteger == Scissors && player2Action == Rock) {
				cout << "Player 1 Choosed Scissors and Player 2 Choosed Rock, Player 2 wins!" << endl;
				break;
			}
			else if (player1ActionInteger == Paper && player2Action == Scissors) {
				cout << "Player 1 Choosed Paper and Player 2 Choosed Scissors, Player 2 wins!" << endl;
				break;
			}
			else if (player1ActionInteger == Rock && player2Action == Paper) {
				cout << "Player 1 Choosed Rock and Player 2 Choosed Paper, Player 2 wins!" << endl;
				break;
			}

		}
	}
	return 0;
}