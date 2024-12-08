//17. Program to Sort a Sequence of Numbers
#include <iostream>
#include <algorithm>
using namespace std;
class output {
public:
 void display();
};
void output::display() {
 int n;
 cout << "Enter the number of elements: ";
 cin >> n;

 int arr[n];
 cout << "Enter the elements: ";
 for (int i = 0; i < n; i++) {
 cin >> arr[i];
 }

 sort(arr, arr + n);
 cout << "Sorted sequence: ";
 for (int i = 0; i < n; i++) {
 cout << arr[i] << " ";
 }
 cout << endl;
}
int main() {
 output obj;
 obj.display();
 return 0;
}
