//24. Program to Calculate Matrix Multiplication
#include <iostream>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 int r1, c1, r2, c2;
 cout << "Enter rows and columns for matrix 1: ";
 cin >> r1 >> c1;
 cout << "Enter rows and columns for matrix 2: ";
 cin >> r2 >> c2;

 if (c1 != r2) {
 cout << "Matrix multiplication not possible!" << endl;
 return;
 }

 int matrix1[r1][c1], matrix2[r2][c2], result[r1][c2];

 cout << "Enter elements of matrix 1: \n";
 for (int i = 0; i < r1; i++) {
 for (int j = 0; j < c1; j++) {
 cin >> matrix1[i][j];
 }
 }

 cout << "Enter elements of matrix 2: \n";
 for (int i = 0; i < r2; i++) {
 for (int j = 0; j < c2; j++) {
 cin >> matrix2[i][j];
 }
 }

 for (int i = 0; i < r1; i++) {
 for (int j = 0; j < c2; j++) {
 result[i][j] = 0;
 for (int k = 0; k < c1; k++) {
 result[i][j] += matrix1[i][k] * matrix2[k][j];
 }
 }
 }

 cout << "Resulting matrix: \n";
 for (int i = 0; i < r1; i++) {
 for (int j = 0; j < c2; j++) {
 cout << result[i][j] << " ";
 }
 cout << endl;
 }
}
int main() {
 output obj;
 obj.display();
 return 0;
}
