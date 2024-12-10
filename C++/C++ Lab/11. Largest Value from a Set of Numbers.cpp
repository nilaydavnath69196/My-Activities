/*
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC: C++ Program to Find the Largest Value from a Set of Numbers
DATE: 12/12/2024
*/
#include <iostream>
#include <climits>
using namespace std;

class LargestFinder {
public:
    void findLargest();
};

void LargestFinder::findLargest() {
    int n;
    cout << "Enter number of elements: ";
    cin >> n;

    if (n <= 0) {
        cout << "Invalid input! Number of elements must be greater than 0." << endl;
        return;
    }

    int max_val = 0;
    for (int i = 0; i < n; i++) {
        int num;
        cout << "Enter number " << i + 1 << ": ";
        cin >> num;

        if (num > max_val) {
            max_val = num;
        }
    }

    cout << "Largest value: " << max_val << endl;
}

int main() {
    LargestFinder obj;
    obj.findLargest();
    return 0;
}
