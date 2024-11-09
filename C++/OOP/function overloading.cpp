/*
NILAY DAV NATH
TOPIC - Function Overloading
DATE: 08/11/2024
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
*/
#include<iostream>
using namespace std;
class overlod
{
public:
    void area();
    float area(int a,int b);
};
void overlod::area()
{
    int a,area;
    cout<<"enter the value of square: "<<endl;
    cin>>a;
    area = a*a;
    cout<<"The area of square is: "<<area<<endl;

}
float overlod::area(int a, int b)
{
    float area;
    area = 0.5*a*b;
    cout<<"The area of triangle is: "<<area<<endl;

}
main()
{    overlod obj;
    obj.area();
    obj.area(5,7);

}
