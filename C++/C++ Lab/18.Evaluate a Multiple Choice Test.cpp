/*
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC: C++ Program to Evaluate a Multiple Choice Test
DATE: 12/12/2024
*/
#include <iostream>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 int totalQuestions = 5;
 char correctAnswers[5] = {'A', 'B', 'C', 'D', 'A'};
 char userAnswers[5];
 int score = 0;

 cout << "Enter your answers (A, B, C, D): \n";
 for (int i = 0; i < totalQuestions; i++) {
 cout << "Question " << i + 1 << ": ";
 cin >> userAnswers[i];
 }

 for (int i = 0; i < totalQuestions; i++) {
 if (userAnswers[i] == correctAnswers[i]) {
 score++;
 }
 }

 cout << "Your score: " << score << " out of " << totalQuestions << endl;
}
int main() {
 output obj;
 obj.display();
 return 0;
}

