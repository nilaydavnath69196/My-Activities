/*
TOPIC: C++
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE : 11/11/2024
*/
#include <iostream>
using namespace std;

class Rectangle {
public:
    double calculatePerimeter();
};
double Rectangle::calculatePerimeter() {
    double length = 10.0, width = 5.0;
    return 2 * (length + width);
}

int main() {
    Rectangle rect;
    cout << "Perimeter of the rectangle: " << rect.calculatePerimeter() << endl;
    return 0;
}
