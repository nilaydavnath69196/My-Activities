/*
TOPIC: Function with No Argument and No Return Value
(Rectangle Perimeter (Fixed Length and Width))
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE : 11/11/2024
*/
#include <iostream>
using namespace std;

class Rectangle {
public:
    void calculatePerimeter();
};
void Rectangle::calculatePerimeter()
{
        int length = 8, width = 5;
        cout << "Rectangle Perimeter: " << 2 * (length + width) << endl;
    }
int main() {
    Rectangle obj;
    obj.calculatePerimeter();
    return 0;
}

