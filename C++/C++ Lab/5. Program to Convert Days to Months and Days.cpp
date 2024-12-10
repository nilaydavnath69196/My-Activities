/*
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC: C++ Program to Convert Days to Months and Days
DATE: 12/12/2024
*/
#include <iostream>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 int days;
 cout << "Enter number of days: ";
 cin >> days;

 int months = days / 30;
 int remaining_days = days % 30;

 cout << months << " months and " << remaining_days << " days" << endl;
}
int main() {
 output obj;
 obj.display();
 return 0;
}

