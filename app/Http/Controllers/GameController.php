<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GameHistory;

class GameController extends Controller
{
    public function index() {
        return view('newGame', [
            'numbers' => $this->getNumbers()
        ]);
    }

    public function create(Request $request) {
        GameHistory::create([
            'username' => $request->username,
            'guesses' => $request->userGuesses
        ]);
    }

    private function getNumbers() {
        $firstConditionDigitArray = [];
        $secondConditionDigitArray = [];
        $digit1Positon = false;
        $digit8Positon = false;
        $digit4Positon = false;
        $digit5Positon = false;
        $numbers = range(1, 9);
      
        shuffle($numbers);

        $numbers = array_slice($numbers, 0, 4);

        foreach ($numbers as $position => $number) {
            switch ($number) {
                case 1:
                    $digit1Positon = $position;
                    break;
                case 4:
                    $digit4Positon = $position;
                    break;
                case 5:
                    $digit5Positon = $position;
                    break;
                case 8:
                    $digit8Positon = $position;
                    break;
              }
        }

        if ($digit1Positon !== false && $digit8Positon !== false) {
            $firstDigitPosition = min($digit1Positon, $digit8Positon);
            $lastDigitPosition = max($digit1Positon, $digit8Positon);
            $firstDigit = $numbers[$firstDigitPosition];
            $lastDigit = $numbers[$lastDigitPosition];

            unset($numbers[$lastDigitPosition]);            

            $numbers = array_values($numbers);

            for ($i = 0; $i < count($numbers); $i++) {
                $firstConditionDigitArray[] = $numbers[$i];

                if ($numbers[$i] === $firstDigit) {
                    $firstConditionDigitArray[] = $lastDigit;
                }
            }

            $numbers = $firstConditionDigitArray;

            if ($digit4Positon !== false && $digit5Positon !== false) {
                foreach ($numbers as $position => $number) {
                    switch ($number) {
                        case 4:
                            $digit4Positon = $position;
                            break;
                        case 5:
                            $digit5Positon = $position;
                            break;
                      }
                }
            }
        }

        if ($digit4Positon !== false && $digit5Positon !== false) {
            $digitsToAdd = [4, 5];

            shuffle($digitsToAdd);

            unset($numbers[$digit4Positon]);
            unset($numbers[$digit5Positon]);

            $numbers = array_values($numbers);

            for ($i = 0; $i < count($numbers); $i++) {
                if ($i === 0 || (count($secondConditionDigitArray) % 2 !== 0 && !empty($digitsToAdd) && end($secondConditionDigitArray) !== 1)) {
                    $secondConditionDigitArray[] = $digitsToAdd[0];

                    unset($digitsToAdd[0]);

                    $digitsToAdd = array_values($digitsToAdd);
                }

                $secondConditionDigitArray[] = $numbers[$i];
            }

            if (!empty($digitsToAdd)) {
                $secondConditionDigitArray[] = $digitsToAdd[0];
            }

            $numbers = $secondConditionDigitArray;

        }

        return $numbers;
    }
}