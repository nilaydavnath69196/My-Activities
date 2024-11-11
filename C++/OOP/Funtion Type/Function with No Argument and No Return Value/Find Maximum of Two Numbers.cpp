
/*
TOPIC: Function with No Argument but Return Value:(Find Maximum of Two Numbers)
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE : 11/11/2024
*/
#include <iostream>
using namespace std;

class MaxValue {
public:
    int findMax();
};
MaxValue::findMax() {
    int num1 = 20, num2 = 10;
    return (num1 > num2) ? num1 : num2;
}

int main() {
    MaxValue maxObj;
    cout << "Maximum value: " << maxObj.findMax() << endl;
    return 0;
}
