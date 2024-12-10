/*
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC: C++  Program to Calculate the Average of N Numbers
DATE: 12/12/2024
*/
#include <iostream>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 int n;
 cout << "Enter number of elements: ";
 cin >> n;
 int sum = 0, num;

 for (int i = 0; i < n; i++) {
 cin >> num;
 sum += num;
 }

 cout << "Average: " << sum / n << endl;
}
int main() {
 output obj;
 obj.display();
 return 0;
}

