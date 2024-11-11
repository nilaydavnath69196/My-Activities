/*
TOPIC: Function with No Argument and No Return Value
(Triangle Area (Fixed Base and Height))
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE : 11/11/2024
*/
#include <iostream>
using namespace std;

class Triangle {
public:
    void calculateArea();
};
void Triangle::calculateArea()
 {
        double base = 10.0, height = 5.0;
        cout << "Triangle Area: " << 0.5 * base * height << endl;
    }
int main() {
    Triangle obj;
    obj.calculateArea();
    return 0;
}
