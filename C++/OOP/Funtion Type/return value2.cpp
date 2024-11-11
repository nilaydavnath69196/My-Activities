/*
NILAY DAV NATH
TOPIC - return value
DATE: 08/11/2024
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
*/
#include<iostream>
using namespace std;
class area
{
public:
    float result(int a, int b);
};
float area::result(int a, int b)
{
    float c;
    c = 0.5* a* b;
    return c;
}
main()
{
    float m;
    area obj;
    m = obj.result(5,7);
    cout <<"The area of triangle is : "<<m;
}
