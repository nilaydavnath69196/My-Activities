//22. Program to Access a Variable Using a Pointer
#include <iostream>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 int num = 10;
 int* ptr = &num;

 cout << "Value of num: " << num << endl;
 cout << "Address of num: " << ptr << endl;
 cout << "Value pointed to by ptr: " << *ptr << endl;
}
int main() {
 output obj;
 obj.display();
 return 0;
}
