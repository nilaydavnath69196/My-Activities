/*
NILAY DAV NATH
DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC: ODD-EVEN
DATE: 10/29/2024
*/
#include <iostream>
using namespace std;

class NumberCheck
{
public:
    void display();
};

void NumberCheck::display()
{
    int num;
    cout << "Enter any number: ";
    cin >> num;
    if(num % 2 == 0){
        cout << num << " is even.\n";
    }
    else{
        cout << num << " is odd.\n";
    }
}

int main()
{
    NumberCheck obj;
    obj.display();
    return 0;
}
