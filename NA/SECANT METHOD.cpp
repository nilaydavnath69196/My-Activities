#include <iostream>
#include <cmath>
using namespace std;
double f(double x) {
    return x*x - 4*x - 10;  }
int main() {
    double x0, x1, x2, tol;
    int maxIter;
    cout << "Enter x0, x1, tolerance, maxIter: ";
    cin >> x0 >> x1 >> tol >> maxIter;
    for (int i = 1; i <= maxIter; i++) {
        double f0 = f(x0);
        double f1 = f(x1);

        if (fabs(f1 - f0) < 1e-10) {
            cout << "Math Error!" << endl;
            return 0; }
        x2 = x1 - (f1 * (x1 - x0)) / (f1 - f0);
        cout << "Iter " << i << "  x = " << x2 << endl;
        if (fabs(x2 - x1) < tol)
            break;
        x0 = x1;
        x1 = x2;
    }

    cout << "Approx Root = " << x2 << endl;
    return 0;
}

