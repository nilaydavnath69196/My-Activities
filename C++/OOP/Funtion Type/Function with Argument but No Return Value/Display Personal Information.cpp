/*
TOPIC: Function with Argument but No Return Value
(Display Personal Information)
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE :11/11/2024
*/
#include <iostream>
using namespace std;

class Person {
public:
    void displayInfo(string name, int age);
};
void Person::displayInfo(string name, int age) {
    cout << "Name: " << name << ", Age: " << age << endl;
}

int main() {
    Person person;
    person.displayInfo("John Doe", 25);
    return 0;
}

