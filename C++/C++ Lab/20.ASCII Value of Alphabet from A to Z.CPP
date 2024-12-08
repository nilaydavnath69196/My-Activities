//20. Program to Calculate ASCII Value of Alphabet from A to Z
#include <iostream>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 for (char ch = 'A'; ch <= 'Z'; ch++) {
 cout << "ASCII value of " << ch << " is " << int(ch) << endl;
 }
}
int main() {
 output obj;
 obj.display();
 return 0;
}
