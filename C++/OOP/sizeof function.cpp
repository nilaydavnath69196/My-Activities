/*
NILAY DAV NATH
C++ - TO DETERMINE THE SIZE OF DIFFERENT DATA TYPE
DATE: 09/09/2024
*/

#include<iostream>
using namespace std;
class size
{
public:
    void display();
};
void size::display()
{
    int i;
    float f;
    double d;
    char c;
    cout << "The Size of integer is: "<<sizeof(i) << " bytes" <<endl;
    cout << "The Size of float is: "<<sizeof(f) << " bytes" <<endl;
    cout << "The Size of double is: "<<sizeof(d) << " bytes" <<endl;
    cout << "The Size of character is: "<<sizeof(c) << " bytes" <<endl;
}
int main()
{
    size obj;
    obj.display();

}
