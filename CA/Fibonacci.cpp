#include <iostream>
using namespace std;

int main() {
    int n;
    cout << "Enter term count: ";
    cin >> n;

    long long a = 0, b = 1;

    cout << "Fibonacci Series: ";
    for(int i = 1; i <= n; i++) {
        cout << a << " ";
        long long next = a + b;
        a = b;
        b = next;
    }
    return 0;
}

