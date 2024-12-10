/*
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC: C++ Program to Calculate Matrix Addition
DATE: 12/12/2024
*/
#include <iostream>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 int r, c;
 cout << "Enter rows and columns for matrices: ";
 cin >> r >> c;

 int matrix1[r][c], matrix2[r][c], sum[r][c];

 cout << "Enter elements for matrix 1:\n";
 for (int i = 0; i < r; i++) {
 for (int j = 0; j < c; j++) {
 cin >> matrix1[i][j];
 }
 }

 cout << "Enter elements for matrix 2:\n";
 for (int i = 0; i < r; i++) {
 for (int j = 0; j < c; j++) {
 cin >> matrix2[i][j];
 }
 }

 for (int i = 0; i < r; i++) {
 for (int j = 0; j < c; j++) {
 sum[i][j] = matrix1[i][j] + matrix2[i][j];
 }
 }

 cout << "Resulting matrix after addition:\n";
 for (int i = 0; i < r; i++) {
 for (int j = 0; j < c; j++) {
 cout << sum[i][j] << " ";
 }
 cout << endl;
 }
}
int main() {
 output obj;
 obj.display();
 return 0;
}

