//10. Program to Count the Number of Boys Whose Height > 65 Inches and Weight > 68 Kg
#include <iostream>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 int n;
 cout << "Enter number of boys: ";
 cin >> n;

 int count = 0;
 for (int i = 0; i < n; i++) {
 double height, weight;
 cout << "Enter height and weight of boy " << i + 1 << ": ";
 cin >> height >> weight;

 if (height > 65 && weight > 68) {
 count++;
 }
 }

 cout << "Number of boys with height > 65 inches and weight > 68 kg: " << count << endl;
}
int main() {
 output obj;
 obj.display();
 return 0;
}

