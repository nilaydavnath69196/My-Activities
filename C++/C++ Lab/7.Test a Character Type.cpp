//7. Program to Test a Character Type
#include <iostream>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 char ch;
 cout << "Enter a character: ";
 cin >> ch;

 if (isalpha(ch)) {
 cout << "It is an alphabetic character" << endl;
 } else if (isdigit(ch)) {
 cout << "It is a digit" << endl;
 } else if (isupper(ch)) {
 cout << "It is an uppercase letter" << endl;
 } else if (islower(ch)) {
 cout << "It is a lowercase letter" << endl;
 } else {
 cout << "It is a special character" << endl;
 }
}
int main() {
 output obj;
 obj.display();
 return 0;
}
