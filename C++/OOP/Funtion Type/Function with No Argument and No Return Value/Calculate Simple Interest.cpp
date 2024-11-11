/*
TOPIC: CFunction with No Argument but Return Value(Calculate Simple Interest)
NILAY DAV NATH
DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE : 11/11/2024
*/
#include <iostream>
using namespace std;

class Interest {
public:
    double calculateInterest();  // Declaration of the function
};

// Correct the function definition by adding the return type 'double'
double Interest::calculateInterest() {
    double principal = 1000.0, rate = 5.0, time = 3.0;
    return (principal * rate * time) / 100;
}

int main() {
    Interest interestObj;
    cout << "Simple Interest: " << interestObj.calculateInterest() << endl;
    return 0;
}
