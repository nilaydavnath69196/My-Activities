/*
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC: C++ Program to Calculate the Power of Given Values
DATE: 12/12/2024
*/
#include <iostream>
#include <cmath>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 double base;
 int exponent;
 cout << "Enter base and exponent: ";
 cin >> base >> exponent;

 double result = pow(base, exponent);
 cout << "Result: " << result << endl;
}
int main() {
 output obj;
 obj.display();
 return 0;
}
