/*
TOPIC: Function with Argument but No Return Value
(Check If a Number Is Even or Odd)
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE : 11/11/2024
*/
#include <iostream>
using namespace std;

class Number {
public:
    void checkEvenOdd(int num);
};
void Number::checkEvenOdd(int num) {
    if (num % 2 == 0)
        cout << num << " is even." << endl;
    else
        cout << num << " is odd." << endl;
}

int main() {
    Number num;
    num.checkEvenOdd(10);
    return 0;
}
