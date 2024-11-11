
/*
TOPIC: Function with Argument and Return Value(Find Power of a Number)
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE : 11/11/2024
*/
#include <iostream>
using namespace std;

class Power {
public:
    double calculatePower(double base, int exponent);
};
double Power::calculatePower(double base, int exponent) {
    double result = 1;
    for (int i = 1; i <= exponent; i++) {
        result *= base;
    }
    return result;
}

int main() {
    Power powerObj;
    cout << "Result: " << powerObj.calculatePower(2, 3) << endl;
    return 0;
}
