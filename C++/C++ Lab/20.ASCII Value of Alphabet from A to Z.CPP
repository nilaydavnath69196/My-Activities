/*
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC: C++ Program to Calculate ASCII Value of Alphabet from A to Z
DATE: 12/12/2024
*/
#include <iostream>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 for (char ch = 'A'; ch <= 'Z'; ch++) {
 cout << "ASCII value of " << ch << " is " << int(ch) << endl;
 }
}
int main() {
 output obj;
 obj.display();
 return 0;
}
