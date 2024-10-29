/*
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC - TO CHECK eligible to Vote or Not
DATE: 10/28/2024
*/

#include <iostream>
using namespace std;

class vote
{
public:
    void result();
};
void vote::result()

{
   int age;

    cout << "Enter your age: ";
    cin >> age;
    if (age >= 18) {
        cout << "You are eligible to vote." << endl;
    } else {
        cout << "You are not eligible to vote." << endl;
    }

}
int main() {
   vote obj;
   obj.result();
    return 0;
}

