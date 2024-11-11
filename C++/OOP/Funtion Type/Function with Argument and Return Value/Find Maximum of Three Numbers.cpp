/*
TOPIC: Function with Argument and Return Value(Find Maximum of Three Numbers)
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE : 11/11/2024
*/
#include <iostream>
using namespace std;

class MaxValue {
public:
    int findMax(int num1, int num2, int num3);
};
MaxValue::findMax(int num1, int num2, int num3) {
    return (num1 > num2) ? ((num1 > num3) ? num1 : num3) : ((num2 > num3) ? num2 : num3);
}

int main() {
    MaxValue maxObj;
    cout << "Maximum value: " << maxObj.findMax(10, 20, 15) << endl;
    return 0;
}
