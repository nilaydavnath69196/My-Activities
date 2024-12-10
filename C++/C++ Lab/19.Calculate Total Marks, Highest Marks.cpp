/*
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC: C++ Program to Calculate Total Marks, Highest Marks in Each Subject, and Highest Total Marks
DATE: 12/12/2024
*/
#include <iostream>
#include <climits>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 int numStudents, numSubjects;
 cout << "Enter number of students: ";
 cin >> numStudents;
 cout << "Enter number of subjects: ";
 cin >> numSubjects;

 int marks[numStudents][numSubjects];
 int totalMarks[numStudents] = {0};
 int highestMarks[numSubjects] = {INT_MIN};
 int rollNoForHighest[numSubjects];

 for (int i = 0; i < numStudents; i++) {
 cout << "Enter marks for student " << i + 1 << ": ";
 for (int j = 0; j < numSubjects; j++) {
 cin >> marks[i][j];
 totalMarks[i] += marks[i][j];
 if (marks[i][j] > highestMarks[j]) {
 highestMarks[j] = marks[i][j];
 rollNoForHighest[j] = i + 1;
 }
 }
 }

 for (int i = 0; i < numStudents; i++) {
 cout << "Total marks for student " << i + 1 << ": " << totalMarks[i] << endl;
 }

 for (int j = 0; j < numSubjects; j++) {
 cout << "Highest marks in subject " << j + 1 << ": " << highestMarks[j]
 << ", obtained by student " << rollNoForHighest[j] << endl;
 }

 int highestTotal = INT_MIN, bestStudent;
 for (int i = 0; i < numStudents; i++) {
 if (totalMarks[i] > highestTotal) {
 highestTotal = totalMarks[i];
 bestStudent = i + 1;
 }
 }

 cout << "The student with the highest total marks is student " << bestStudent
 << " with " << highestTotal << " marks." << endl;
}
int main() {
 output obj;
 obj.display();
 return 0;
}
