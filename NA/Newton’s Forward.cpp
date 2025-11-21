#include <iostream>
using namespace std;
int factorial(int n) {
    int fact = 1;
    for(int i = 2; i <= n; i++)
        fact *= i;
    return fact;
}
int main() {
    int n;
    cout << "Enter number of points: ";
    cin >> n;
    double x[20], y[20][20];
    cout << "Enter x values:\n";
    for(int i = 0; i < n; i++) cin >> x[i];
    cout << "Enter y values:\n";
    for(int i = 0; i < n; i++) cin >> y[i][0];
    for(int j = 1; j < n; j++)
        for(int i = 0; i < n - j; i++)
            y[i][j] = y[i+1][j-1] - y[i][j-1];
    double xp;
    cout << "Enter value of x to interpolate: ";
    cin >> xp;
    double h = x[1] - x[0];
    double t = (xp - x[0]) / h;
    double sum = y[0][0];
    double p = 1;
    for(int i = 1; i < n; i++) {
        p *= (t - (i - 1));
        sum += (p * y[0][i]) / factorial(i);
    }
    cout << "Interpolated value = " << sum << endl;

    return 0;
}
