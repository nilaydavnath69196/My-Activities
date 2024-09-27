/*
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC - SETW() AND ENDL
DATE - 27/09/2024
*/

#include<iostream>
#include<iomanip>
using namespace std;

class word {
public:
    void display();
};

void word::display() {
    cout << setw(20) << "Hello" << endl;// it print 20 space before Hello
    cout << setw(10) << "World!" << endl; //it print 10 space before WORLD
}

int main() {
    word m;
    m.display();
    return 0;
}

