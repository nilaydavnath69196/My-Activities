#include <iostream>
using namespace std;
long long factorial(int n) {
    long long f = 1;
    for(int i=2; i<=n; i++)
        f *= i;
    return f;  }
int main() {
    int n;
    cout << "Enter number of points: ";
    cin >> n;
    double x[20], y[20][20];
    cout << "Enter x values:\n";
    for(int i=0; i<n; i++) cin >> x[i];
    cout << "Enter y values:\n";
    for(int i=0; i<n; i++) cin >> y[i][0];
    for(int j=1; j<n; j++)
        for(int i=n-1; i>=j; i--)
            y[i][j] = y[i][j-1] - y[i-1][j-1];
    double xp;
    cout << "Enter x to interpolate: ";
    cin >> xp;
    double h = x[1] - x[0];
    double t = (xp - x[n-1]) / h;
    double sum = y[n-1][0];
    double p = 1;
    for(int i=1; i<n; i++) {
        p *= (t + (i-1));
        sum += (p * y[n-1][i]) / factorial(i);
    }

    cout << "Interpolated value = " << sum << endl;

    return 0;
}
