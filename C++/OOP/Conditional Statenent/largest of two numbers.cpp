/*
NILAY DAV NATH
DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC: largest of two numbers
DATE: 10/29/2024
*/
#include <iostream>
using namespace std;

class LargestNumber
{
public:
    void display();
};

void LargestNumber::display()
{
  {
      int a,b;
      cout<<"Enter Two Number: ";
      cin>>a>>b;
        if (a > b)
            cout << a << " is larger.\n";
        else
            cout << b << " is larger.\n";
    }
}
int main()
{
    LargestNumber obj;
    obj.display();
    return 0;
}
