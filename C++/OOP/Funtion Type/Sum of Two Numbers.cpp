/*
TOPIC: Function with No Argument and No Return Value
(Sum of Two Numbers (Fixed Numbers))
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE : 11/11/2024
*/
#include <iostream>
using namespace std;

class Sum {
public:
    void calculateSum();
};
void Sum::calculateSum()
{
        int a = 5, b = 3;
        cout << "Sum: " << a + b << endl;
    }
int main() {
    Sum obj;
    obj.calculateSum();
    return 0;
}

