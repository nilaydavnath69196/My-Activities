/*
TOPIC: C++ - Calculator
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE : 10/28/2024
*/
#include<iostream>
using namespace std;
class calculator
{
public:
    void display();
};
void calculator::display()
{
float num1, num2;
    char op;

    cout << "Enter two numbers: ";
    cin >> num1 >> num2;

    cout << "Enter operator (+, -, *, /): ";
    cin >> op;

    switch(op) {
        case '+':
            cout << "Result: " << num1 + num2 << endl;
            break;
        case '-':
            cout << "Result: " << num1 - num2 << endl;
            break;
        case '*':
            cout << "Result: " << num1 * num2 << endl;
            break;
        case '/':
            if(num2 != 0)
                cout << "Result: " << num1 / num2 << endl;
            else
                cout << "Cannot divide by zero!" << endl;
            break;
        default:
            cout << "Invalid operator!" << endl;
    }

}
int main()
{

    calculator obj;
    obj.display();
    return 0;
}
