/*
NILAY DAV NATH
TOPIC - return value
DATE: 08/11/2024
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
*/
#include<iostream>
#include<cmath>
using namespace std;

class Distance
{
public:
    float result();
};

float Distance::result()
{
    float x1 = 1, y1 = 2;
    float x2 = 4, y2 = 6;

    float dist = sqrt(pow(x2 - x1, 2) + pow(y2 - y1, 2));
    return dist;
}

int main()
{
    Distance obj;
    float d = obj.result();
    cout << "The distance between the points is: " << d << endl;
    return 0;
}

