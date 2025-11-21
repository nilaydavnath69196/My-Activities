#include <iostream>
#include <cmath>
using namespace std;
double f(double x) {
    return x*x*x - x - 2;
}
int main() {
    double L, R, mid, tol;
    int maxIter;
    cout << "Enter left(L), right(R), tolerance, maxIter: ";
    cin >> L >> R >> tol >> maxIter;
    if (f(L)*f(R) >= 0) {
        cout << "Invalid Interval!" << endl;
        return 0;
    }
    for (int i = 1; i <= maxIter; i++) {
        mid = (L + R) / 2.0;
        double fm = f(mid);
        cout << "Iter " << i << "  Mid = " << mid << "  f(mid)=" << fm << endl;
        if (fabs(fm) < tol)
            break;
        if (f(L) * fm < 0)
            R = mid;
        else
            L = mid;}
    cout << "Approx Root = " << mid << endl;
    return 0;
}

