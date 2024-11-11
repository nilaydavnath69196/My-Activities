/*
TOPIC: Function with Argument and Return Value(Calculate Factorial of a Number)
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE : 11/11/2024
*/
#include <iostream>
using namespace std;

class Factorial {
public:
    int calculateFactorial(int num);
};
Factorial::calculateFactorial(int num) {
    int fact = 1;
    for (int i = 1; i <= num; i++) {
        fact *= i;
    }
    return fact;
}

int main() {
    Factorial factObj;
    cout << "Factorial of the number: " << factObj.calculateFactorial(5) << endl;
    return 0;
}
