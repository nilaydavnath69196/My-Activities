#include <iostream>
using namespace std;

double det2(double a, double b, double c, double d) {
    return a*d - b*c;
}
int main() {
    double a1,b1,c1,a2,b2,c2;
    cout << "Enter coefficients of equations:\n";
    cin >> a1 >> b1 >> c1;
    cin >> a2 >> b2 >> c2;
    double D  = det2(a1,b1,a2,b2);
    double Dx = det2(c1,b1,c2,b2);
    double Dy = det2(a1,c1,a2,c2);

    if (D == 0) {
        cout << "No unique solution" << endl;
        return 0;
    }
    cout << "x = " << Dx/D << endl;
    cout << "y = " << Dy/D << endl;

    return 0;
}

