
/*
TOPIC: C++ - Temparature coversion
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE : 10/28/2024
*/
#include<iostream>
using namespace std;

class TemperatureConverter {
public:
    void convertTemperature();
};

void TemperatureConverter::convertTemperature() {
    int choice;
    float temperature, convertedTemp;

    cout << "Temperature Conversion Menu:\n";
    cout << "1. Convert Celsius to Fahrenheit\n";
    cout << "2. Convert Fahrenheit to Celsius\n";
    cout << "Enter your choice: ";
    cin >> choice;

    switch (choice) {
        case 1:
            cout << "Enter temperature in Celsius: ";
            cin >> temperature;
            convertedTemp = (temperature * 9/5) + 32;
            cout << "Temperature in Fahrenheit: " << convertedTemp << "°F" << endl;
            break;

        case 2:
            cout << "Enter temperature in Fahrenheit: ";
            cin >> temperature;
            convertedTemp = (temperature - 32) * 5/9;
            cout << "Temperature in Celsius: " << convertedTemp << "°C" << endl;
            break;

        default:
            cout << "Invalid choice. Please select 1 or 2." << endl;
    }
}

int main() {
    TemperatureConverter obj;
    obj.convertTemperature();
    return 0;
}
