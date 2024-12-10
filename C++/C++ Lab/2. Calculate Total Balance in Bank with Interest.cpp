/*
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC: C++ Program to Calculate Total Balance in Bank with Interest
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
 double principal, rate, time;
 cout << "Enter amount to be invested: ";
 cin >> principal;
 cout << "Enter profit rate: " ;
 cin >> rate;
 cout << "Enter period of investment (years): ";
 cin >> time;

 double total = principal * pow(1 + rate / 100, time);
 cout << "Total balance after " << time << " years: " << total << endl;
}
int main() {
 output obj;
 obj.display();
 return 0;
}
