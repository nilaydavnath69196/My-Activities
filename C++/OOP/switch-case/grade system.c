
/*
TOPIC: C++ - Grade System
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE : 10/28/2024
*/
#include<iostream>
using namespace std;

class GradingSystem {
public:
    void displayGrade();
};

void GradingSystem::displayGrade() {
    int marks;

    cout << "Enter your marks (0-100): ";
    cin >> marks;

    // Ensure valid marks range
    if (marks < 0 || marks > 100) {
        cout << "Invalid input. Marks should be between 0 and 100." << endl;
        return;
    }

    // Determine grade using switch case
    switch(marks / 10) {
        case 10: // for marks = 100
            cout << "Grade: A+" << endl;
            break;
        case 9:
            if (marks >= 95) {
                cout << "Grade: A+" << endl;
            } else {
                cout << "Grade: A" << endl;
            }
            break;
        case 8:
            cout << "Grade: B" << endl;
            break;
        case 7:
            cout << "Grade: C" << endl;
            break;
        case 6:
            cout << "Grade: D" << endl;
            break;
        case 5:
            cout << "Grade: E" << endl;
            break;
        default:
            cout << "Grade: F" << endl; // For marks less than 50
    }
}

int main() {
    GradingSystem obj;
    obj.displayGrade();
    return 0;
}

