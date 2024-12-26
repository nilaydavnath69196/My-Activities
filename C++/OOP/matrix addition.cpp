/*
NILAY DAV NATH
TOPIC - MATRIX ADDITION
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE: 26/12/2024
*/
#include <iostream>
using namespace std;

class Addition {
public:
    void display();
};

void Addition::display() {
    int row, col;
    int a[10][10], b[10][10], c[10][10];

    cout << "Enter the number of rows (m) and columns (n): ";
    cin >> row >> col;

    cout << "Enter elements for matrix A (" << row << "x" << col << "):\n";
    for (int i = 0; i < row; i++) {
        for (int j = 0; j < col; j++) {
            cout << "a[" << i << "][" << j << "] = ";
            cin >> a[i][j];
        }
    }

    cout << "Enter elements for matrix B (" << row << "x" << col << "):\n";
    for (int i = 0; i < row; i++) {
        for (int j = 0; j < col; j++) {
            cout << "b[" << i << "][" << j << "] = ";
            cin >> b[i][j];
        }
    }

    // Perform addition of matrices
    for (int i = 0; i < row; i++) {
        for (int j = 0; j < col; j++) {
            c[i][j] = a[i][j] + b[i][j];
        }
    }

    // Display the resultant matrix
    cout << "Matrix A + Matrix B =\n";
    for (int i = 0; i < row; i++) {
        for (int j = 0; j < col; j++) {
            cout << c[i][j] << " ";
        }
        cout << "\n";
    }
}

int main() {
    Addition obj;
    obj.display();
    return 0;
}
