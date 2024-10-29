/*
NILAY DAV NATH
DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC: uppercase and lowercase
DATE: 10/29/2024
*/
#include <iostream>
using namespace std;

class UpperLower
{
public:
    void display();
};

void UpperLower::display()
{
    char ch;
    cout<<"Enter any character: ";
    cin>>ch;
  if (ch >= 'A' && ch <= 'Z')
            cout << ch << " is uppercase.\n";
        else if (ch >= 'a' && ch <= 'z')
            cout << ch << " is lowercase.\n";
        else
            cout << ch << " is neither uppercase nor lowercase.\n";
}
int main()
{
    UpperLower obj;
    obj.display();
    return 0;
}
