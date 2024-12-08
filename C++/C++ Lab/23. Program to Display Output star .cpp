//23. Program to Display Output * ** *** **** ******
#include <iostream>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 for (int i = 1; i <= 5; i++) {
 for (int j = 1; j <= i; j++) {
cout<<"*";
 }
 cout << endl;
 }
}
int main() {
 output obj;
 obj.display();
 return 0;
}
