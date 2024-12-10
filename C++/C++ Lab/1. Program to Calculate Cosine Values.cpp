/*
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC: C++ Program to Calculate Cosine Values
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
 int angle = 0;
 while (angle <= 180) {
 cout << "cos(" << angle << ") = " << cos(angle * M_PI / 180) << endl;
 angle += 10;
 }
}
int main() {
 output obj;
 obj.display();
 return 0;
}

