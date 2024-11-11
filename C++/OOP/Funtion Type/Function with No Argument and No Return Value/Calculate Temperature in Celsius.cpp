
/*
TOPIC: CFunction with No Argument but Return Value(Calculate Temperature in Celsius)
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE : 11/11/2024
*/
#include <iostream>
using namespace std;

class Temperature {
public:
    double convertToCelsius();
};
double Temperature::convertToCelsius() {
    double fahrenheit = 98.6;
    return (fahrenheit - 32) * 5 / 9;
}

int main() {
    Temperature tempObj;
    cout << "Temperature in Celsius: " << tempObj.convertToCelsius() << endl;
    return 0;
}
