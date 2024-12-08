//8. Program to Test the Correctness of Input Data
#include <iostream>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 int x;
 cout << "Enter a positive integer: ";
 cin >> x;

 if (x <= 0) {
 cout << "Invalid input" << endl;
 } else {
 cout << "Valid input" << endl;
 }
}
int main() {
 output obj;
 obj.display();
 return 0;
}
