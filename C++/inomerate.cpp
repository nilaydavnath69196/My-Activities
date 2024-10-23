/*
NILAY DAV NATH
DATE: 23/10/2024
*/
#include <iostream>
using namespace std;

class Inomarate {
public:
    void display();
};

void Inomarate::display() {
    enum Shape { circle, rectangle, triangle };

    int code;
    cout << "Enter a shape code (0 for circle, 1 for rectangle, 2 for triangle): ";
    cin >> code;

    if (code >= circle && code <= triangle) {
        switch (code) {
            case circle:
                cout << "The shape is circle" << endl;
                break;
            case rectangle: // Changed ';' to ':'
                cout << "The shape is rectangle" << endl;
                break;
            case triangle: // Changed ';' to ':'
                cout << "The shape is triangle" << endl;
                break;
        }
    } else {
        cout << "Invalid shape code!" << endl; // Handle invalid input
    }
}

int main() {
    Inomarate obj; // Corrected class name capitalization
    obj.display();
    return 0; // Added return statement
}
