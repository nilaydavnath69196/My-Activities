//9. Program to Print a Character and a String
#include <iostream>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 char ch;
 string str;
 cout << "Enter a character: ";
 cin >> ch;
 cout << "Enter a string: ";
 cin >> str;

 cout << "Character: " << ch << endl;
 cout << "String: " << str << endl;
}
int main() {
 output obj;
 obj.display();
 return 0;
}

