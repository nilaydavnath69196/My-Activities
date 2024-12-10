/*
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC: C++ Program to Convert Fahrenheit to Celsius
DATE: 12/12/2024
*/
#include <iostream>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 double fahrenheit;
 cout << "Enter temperature in Fahrenheit: ";
 cin >> fahrenheit;

 double celsius = (fahrenheit - 32) * 5 / 9;
 cout << "Temperature in Celsius: " << celsius << endl;
}
int main() {
 output obj;
 obj.display();
 return 0;
}
