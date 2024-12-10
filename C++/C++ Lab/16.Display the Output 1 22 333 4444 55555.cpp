/*
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC: C++ Program to Display the Output 1 22 333 4444 55555
DATE: 12/12/2024
*/
#include <iostream>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 for (int i = 1; i <= 5; i++) {
 for (int j = 1; j <= i; j++) {
 cout << i;
 }
 cout << endl;
 }
}
int main() {
 output obj;
 obj.display();
 return 0;
}
