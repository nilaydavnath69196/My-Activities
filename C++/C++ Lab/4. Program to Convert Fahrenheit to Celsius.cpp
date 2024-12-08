//4. Program to Convert Fahrenheit to Celsius
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
