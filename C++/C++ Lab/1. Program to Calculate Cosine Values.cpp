//1. Program to Calculate Cosine Values
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

