/*
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC: C++ Program to Calculate the Length of a String
DATE: 12/12/2024
*/
#include <iostream>
#include <string>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 string str;
 cout << "Enter a string: ";
 getline(cin, str);

 cout << "Length of the string is: " << str.length() << endl;
}
int main() {
 output obj;
 obj.display();
 return 0;
}
