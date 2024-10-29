/*
TOPIC: C++ - Leap year
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE : 10/28/2024
*/
#include<iostream>
using namespace std;
class leap_year
{
public:
    void display();
};
void leap_year::display()
{
    int year;
cout<<"Enter a year: ";
cin>> year;

switch ((year%4==0 && year%100!=0) || year%400==0)
{
case 1:
    cout<<year<< " is a leap year";
    break;
    case 0:
    cout<<year<< " is not a leap year";
    break;
    default:
    cout<<year<<"invalid input";

}
}
int main()
{
    leap_year obj;
    obj.display();
    return 0;
}
