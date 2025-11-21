#include <iostream>
#include <cmath>
using namespace std;
double f(double x) {
    return x*x*x - 2*x - 5;
}
double df(double x) {
    return 3*x*x - 2;
}

int main() {
    double x, x1, tol;
    int maxIter;

    cout << "Enter initial guess, tolerance, maxIter: ";
    cin >> x >> tol >> maxIter;

    for (int i = 1; i <= maxIter; i++) {
        x1 = x - f(x)/df(x);
        cout << "Iter " << i << "  x = " << x1 << endl;

        if (fabs(x1 - x) < tol)
            break;
        x = x1; }
    cout << "Approx Root = " << x1 << endl;
    return 0;  }

