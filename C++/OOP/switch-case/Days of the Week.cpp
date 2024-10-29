/*
TOPIC: C++ - Days of the week
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE : 10/28/2024
*/
#include<iostream>
using namespace std;
class week
{
public:
    void display();
};
void week::display()
{
    int day;
    cout << "Enter a number (1-7): ";
    cin >> day;

    switch(day) {
        case 1:
            cout << "Saturday" << endl;
            break;
        case 2:
            cout << "Sunday" << endl;
            break;
        case 3:
            cout << "Monday" << endl;
            break;
        case 4:
            cout << "Tuesday" << endl;
            break;
        case 5:
            cout << "Wednesday" << endl;
            break;
        case 6:
            cout << "Thursday" << endl;
            break;
        case 7:
            cout << "Friday" << endl;
            break;
        default:
            cout << "Invalid input!" << endl;
    }

}
int main()
{

    week obj;
    obj.display();
    return 0;
}
