//21. Program to Calculate the Length of a String
#include <iostream>
#include <string>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 string str;
 cout << "Enter a string: ";
 getline(cin, str);

 cout << "Length of the string is: " << str.length() << endl;
}
int main() {
 output obj;
 obj.display();
 return 0;
}
