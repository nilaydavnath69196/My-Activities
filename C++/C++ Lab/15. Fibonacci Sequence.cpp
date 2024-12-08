//15. Program to Generate Fibonacci Sequence
#include <iostream>
using namespace std;

class Fibonacci {
public:
    void display();
};

void Fibonacci::display() {
    int n, first = 0, second = 1, next, sum = 0;
    cout << "Enter the number of terms of the Fibonacci Series: ";
    cin >> n;

    if (n <= 0) {
        cout << "Number of terms must be greater than 0!" << endl;
        return;
    }

    cout << "Fibonacci Series: ";

    for (int i = 0; i < n; i++) {
        if (i <= 1)
            next = i;
        else {
            next = first + second;
            first = second;
            second = next;
        }
        cout << next << " ";
        sum += next;
    }

    cout << endl << "Sum of the series: " << sum << endl;
}

int main() {
    Fibonacci obj;
    obj.display();
    return 0;
}
