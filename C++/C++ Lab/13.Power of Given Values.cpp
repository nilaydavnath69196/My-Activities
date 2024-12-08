//13. Program to Calculate the Power of Given Values
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
