/*
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC: C++ Program to Test the Correctness of Input Data
DATE: 12/12/2024
*/
#include <iostream>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 int x;
 cout << "Enter a positive integer: ";
 cin >> x;

 if (x <= 0) {
 cout << "Invalid input" << endl;
 } else {
 cout << "Valid input" << endl;
 }
}
int main() {
 output obj;
 obj.display();
 return 0;
}
