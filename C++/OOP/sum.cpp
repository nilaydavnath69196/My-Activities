/*
NILAY DAV NATH
TOPIC - C++ - SUM TWO NUMBERS
DATE: 8/09/2024
*/
#include<iostream>
using namespace std;
class addition
{
public:
    void result();

};
void addition :: result()
{
    int a,b,c;
    cout << "Enter two number: "<<endl;
    cin >> a >>b;
    c = a+b;
    cout << "Sum = "<<c<<endl;
}
main()
{
    addition obj;
    obj.result();
}
