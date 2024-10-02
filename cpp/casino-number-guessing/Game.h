#pragma once
#ifndef Game_H
#define Game_H
#include "GameEnums.h"
class Game {
private:
	DifficultyLevelGuesses numberOfGuesses;
	MaxRandomNumberOptions maxRandomNumber;
public:
	int getNumberOfGuesses();
	int getMaxRandomNumber();
	void SetDifficultyLevel(int);
	int playGame();
};
#endif

