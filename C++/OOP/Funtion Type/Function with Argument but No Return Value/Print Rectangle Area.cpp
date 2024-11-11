/*
TOPIC: Function with Argument but No Return Value(Print Rectangle Area)
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE : 11/11/2024
*/
#include <iostream>
using namespace std;

class Rectangle {
public:
    void calculateArea(double length, double width);
};
void Rectangle::calculateArea(double length, double width) {
    cout << "Area of the rectangle: " << length * width << endl;
}

int main() {
    Rectangle rect;
    rect.calculateArea(10.0, 5.0);
    return 0;
}
