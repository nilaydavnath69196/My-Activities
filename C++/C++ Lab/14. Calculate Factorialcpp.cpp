//14. Program to Calculate Factorial of a Number
#include <iostream>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 int n;
 cout << "Enter a number: ";
 cin >> n;

 long long fact = 1;
 for (int i = 1; i <= n; i++) {
 fact *= i;
 }

 cout << "Factorial: " << fact << endl;
}
int main() {
 output obj;
 obj.display();
 return 0;
}

